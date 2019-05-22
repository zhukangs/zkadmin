<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['pid','name','url','icon','sort'];

    /**
     * 无限分级菜单，获取下一级菜单
     *
     */
    public function children()
    {
        return $this->hasMany(self::class, 'pid')->orderBy('sort','desc');
    }

    public function toRoles()
    {
        return $this->belongsToMany('App\Models\Role', 'menu_roles', 'menu_id', 'role_id');
    }
}
