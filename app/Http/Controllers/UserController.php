<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $adminCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Admin');
        })->count();
        $customerServiceCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Customer Service');
        })->count();
        $logisticManagerCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Logistic Manager');
        })->count();
        $purchasingManagerCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Purchasing Agent');
        })->count();
        $headManagerCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Head Manager');
        })->count();
        $cashierCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Cashier');
        })->count();
        $customerCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Customer');
        })->count();
        $employeeCount = User::whereHas('role', function ($query) {
            $query->where('role_name', '!=', 'Customer');
        })->count();
        
        return view('user.index', compact(
            'users', 
            'adminCount', 
            'customerServiceCount', 
            'logisticManagerCount', 
            'purchasingManagerCount', 
            'headManagerCount', 
            'cashierCount', 
            'customerCount',
            'employeeCount'
        ));
    }

    public function addUser()
    {
        $roles = Role::all();
        return view('user.add-user', compact('roles'));
    }

    public function store(Request $request)
    {
        $roles = Role::pluck('id')->toArray(); 

        $infoRole = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role_id' => 'required|in:' . implode(',', $roles),
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus dalam format email',
            'email.unique' => 'Email sudah digunakan',
            'role_id.required' => 'Role tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        try {
            $user = User::create([
                'name' => $infoRole['name'],
                'email' => $infoRole['email'],
                'role_id' => $infoRole['role_id'], // Ubah ke role_id
                'password' => bcrypt($infoRole['password']), // Hash password
            ]);

            return response()->json([
                'success' => 'User added successfully! Redirecting to dashboard...',
                'redirect' => '/manage-user'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function editUser($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all(); 

        return view('user.edit-user', compact('users','roles'));
    }

    public function update(Request $request, $id)
    {
        $roles = Role::pluck('id')->toArray(); 

        // Cari user berdasarkan ID, jika tidak ditemukan, akan memunculkan 404
        $user = User::findOrFail($id); 

        $infoRole = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|in:' . implode(',', $roles),
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string|max:15',
            'status' => 'nullable|boolean',
            'address' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Name tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus dalam format email',
            'email.unique' => 'Email sudah digunakan',
            'role_id.required' => 'Role tidak boleh kosong',
        ]);

        try {
            // Update data user
            $user->update([
                'name' => $infoRole['name'],
                'email' => $infoRole['email'],
                'role_id' => $infoRole['role_id'],
                'password' => $infoRole['password'] ? bcrypt($infoRole['password']) : $user->password,
                'phone' => $infoRole['phone'] ?? $user->phone,
                'status' => $infoRole['status'] ?? $user->status,
                'address' => $infoRole['address'] ?? $user->address,
            ]);

            return response()->json([
                'success' => 'User updated successfully! Redirecting to dashboard...',
                'redirect' => '/manage-user'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'User delete successfully.');
    }

}
