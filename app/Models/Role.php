<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($role) {
            if ($role->role_name === 'Admin') {
                throw new \Exception('Role "Admin" cannot be deleted.');
            }
        });
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'role_menus', 'role_id', 'menu_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }

}
