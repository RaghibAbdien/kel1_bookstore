<?php

namespace App\Models;

use App\Models\RoleMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function role_menu()
    {
        return $this->hasMany(RoleMenu::class, 'menu_id');
    }
}
