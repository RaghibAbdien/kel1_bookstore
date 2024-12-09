<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    public function index()
    {
        // Ambil semua role beserta menus yang terkait
        $roles = Role::with('menus')->get(); // Mengambil semua role beserta menus yang terkait melalui relasi
        $menus = Menu::all();
        // Kirim data ke view
        return view('access.index', compact('roles', 'menus'));

    }

    public function addRole()
    {
        $menus = Menu::all();

        return view('access.add-role', compact('menus'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $infoRole = $request->validate([
            'role_name' => 'required|unique:roles|string|max:255',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id',
        ], [
            'role_name.required' => 'Role name tidak boleh kosong',
            'role_name.unique' => 'Role name sudah ada, silakan gunakan yang lain',
            'role_name.string' => 'Role name harus berupa string',
            'menu_id.required' => 'Pilih setidaknya satu menu',
            'menu_id.array' => 'Data menu tidak valid',
            'menu_id.*.exists' => 'Menu yang dipilih tidak valid',
        ]);
    
        try {
            // Buat role baru
            $role = Role::create([
                'role_name' => $infoRole['role_name'],
            ]);
    
            // Simpan menu_id ke tabel role_menus
            foreach ($infoRole['menu_id'] as $menuId) {
                RoleMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $menuId,
                ]);
            }
    
            return response()->json([
                'success' => 'Role created successfully! Redirecting to dashboard...',
                'redirect' => '/manage-role',
            ]);
        } catch (\Exception $e) {
            // Tangkap error
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function editRole($id)
    {
        $roles = Role::findOrFail($id);
        $menus = Menu::all();
        return view('access.edit-role', compact('roles', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $infoRole = $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name,' . $id,
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id', // Pastikan menu_id yang dipilih valid
        ], [
            'role_name.required' => 'Role name tidak boleh kosong',
            'role_name.unique' => 'Role name sudah ada, silakan gunakan yang lain',
            'role_name.string' => 'Role name harus berupa string',
            'menu_id.required' => 'Pilih setidaknya satu menu',
            'menu_id.array' => 'Data menu tidak valid',
            'menu_id.*.exists' => 'Menu yang dipilih tidak valid',
        ]);

        try {
            // Cari role berdasarkan ID
            $role = Role::findOrFail($id);

            // Update nama role
            $role->update([
                'role_name' => $infoRole['role_name'],
            ]);

            // Hapus relasi lama antara role dan menu
            $role->menus()->detach(); // Menghapus semua menu yang terhubung dengan role ini

            // Simpan menu_id ke tabel role_menus
            foreach ($infoRole['menu_id'] as $menuId) {
                RoleMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $menuId,
                ]);
            }

            return response()->json([
                'success' => 'Role updated successfully! Redirecting to dashboard role...',
                'redirect' => '/manage-role',
            ]);

        } catch (\Exception $e) {
            // Tangkap error
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage(),
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
