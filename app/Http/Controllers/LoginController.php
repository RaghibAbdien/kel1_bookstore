<?php

namespace App\Http\Controllers;

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


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
