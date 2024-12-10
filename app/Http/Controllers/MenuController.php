<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    // public function index()
    // {
    //     $menus = Menu::all();
    //     return view('access.index', compact('menus'));
    // }

    public function addMenu()
    {
        return view('access.add-menu');
    }

    public function store(Request $request)
    {
        $infoRole = $request->validate([
            'menu_name' => 'required|unique:menus|string|max:255',
            'slug' => 'required|unique:menus|string|max:255',
        ], [
            'menu_name.required' => 'Menu name tidak boleh kosong',
            'menu_name.unique' => 'Menu name sudah ada, silakan gunakan yang lain',
            'menu_name.string' => 'Menu name harus berupa string',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.unique' => 'Slug sudah ada, silakan gunakan yang lain',
            'slug.string' => 'Slug harus berupa string',
        ]);

        try {
            $menu = Menu::create([
                'menu_name' => $infoRole['menu_name'],
                'slug' => $infoRole['slug'],
            ]);
            return response()->json([
                'success' => 'Menu created successfully! Redirecting to dashboard...',
                'redirect' => '/manage-role'
            ]);

        } catch (\Exception $e) {
            // Tangkap error umum lainnya (misalnya, DB error)
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    public function editMenu($id)
    {
        $menus = Menu::findOrFail($id);
        return view('access.edit-menu', compact('menus'));
    }

    public function update(Request $request, $id)
    {
        $infoRole = $request->validate([
            'menu_name' => 'required|string|max:255|unique:menus,menu_name,' . $id,
            'slug' => 'required|string|max:255|unique:menus,slug,' . $id,
        ], [
            'menu_name.required' => 'Menu name tidak boleh kosong',
            'menu_name.unique' => 'Menu name sudah ada, silakan gunakan yang lain',
            'menu_name.string' => 'Menu name harus berupa string',
            'slug.required' => 'Slug tidak boleh kosong',
            'slug.unique' => 'Slug sudah ada, silakan gunakan yang lain',
            'slug.string' => 'Slug harus berupa string',
        ]);

        try {
            $menu = Menu::findOrFail($id); // Cari role berdasarkan ID
            $menu->update([
                'menu_name' => $infoRole['menu_name'],
                'slug' => $infoRole['slug'],
            ]);

            return response()->json([
                'success' => 'Menu updated successfully! Redirecting to dashboard role...',
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
        $data = Menu::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Menu delete successfully.');
    }
}
