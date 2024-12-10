<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $infoLogin = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi!!',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        try {
            // Cek login
            if (Auth::attempt($infoLogin)) {
                // Regenerasi session
                $request->session()->regenerate();

                // Dapatkan role user yang login
                $userRole = Auth::user()->role->role_name;

                // Redirect berdasarkan role
                if ($userRole == 'Customer') {
                    return response()->json(['success' => 'Login successful! Redirecting to landing page...', 'redirect' => '/landing-page']);
                } else {
                    return response()->json(['success' => 'Login successful! Redirecting to dashboard...', 'redirect' => '/dashboard']);
                }
            } else {
                return response()->json([
                    'errors' => ['Password atau Email salah.']
                ], 401);
            }
        } catch (ValidationException $e) {
            // Tangani exception jika ada error pada validasi
            Log::error('An error occurred during authentication', ['exception' => $e]);
            return response()->json(['errors' => $e->validator->errors()->all()], 422);
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:20|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return response()->json(['success' => 'Berhasil mendaftar!!', 'redirect' => '/']);
        } catch (\Exception $e) {
            Log::error('An error occurred during authentication', ['exception' => $e]);
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
