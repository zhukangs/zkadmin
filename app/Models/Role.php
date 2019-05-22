<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['name','introduction'];

    public function toPermissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permissions', 'role_id', 'permission_id');
    }

    public function toMenus()
    {
        return $this->belongsToMany('App\Models\Menu', 'menu_roles', 'role_id', 'menu_id')->orderBy('sort','desc');
    }
}
