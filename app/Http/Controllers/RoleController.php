<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function addRole()
    {
        return view('roles.add-role');
    }

    public function store(Request $request)
    {
        $infoRole = $request->validate([
            'role_name' => 'required|unique:roles|string|max:255',
        ], [
            'role_name.required' => 'Role name tidak boleh kosong',
            'role_name.unique' => 'Role name sudah ada, silakan gunakan yang lain',
            'role_name.string' => 'Role name harus berupa string',
        ]);

        try {
            $role = Role::create([
                'role_name' => $infoRole['role_name'],
            ]);
            return response()->json([
                'success' => 'Role created successfully! Redirecting to dashboard...',
                'redirect' => '/manage-role'
            ]);

        } catch (\Exception $e) {
            // Tangkap error umum lainnya (misalnya, DB error)
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function editRole($id)
    {
        $roles = Role::findOrFail($id);
        return view('roles.edit-role', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $infoRole = $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name,' . $id,
        ], [
            'role_name.required' => 'Role name tidak boleh kosong',
            'role_name.unique' => 'Role name sudah ada, silakan gunakan yang lain',
            'role_name.string' => 'Role name harus berupa string',
        ]);

        try {
            $role = Role::findOrFail($id); // Cari role berdasarkan ID
            $role->update([
                'role_name' => $infoRole['role_name'],
            ]);

            return response()->json([
                'success' => 'Role updated successfully! Redirecting to dashboard role...',
                'redirect' => '/manage-role'
            ]);

        } catch (\Exception $e) {
            // Tangkap error umum lainnya
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        $data = Role::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Role delete successfully.');
    }

}
