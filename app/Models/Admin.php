<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function getMenus()
    {
        $role = $this->roles;
        $role = Role::find($role->id);
        $menus = ($role->toMenus)->filter(function ($item) {
            return $item->pid == 0;
        });

        foreach ($menus as $menu) {
            if ($menu->pid == 0) {
                $menu->children;
            }
        }
        return $menus;
    }

    public function getPermissionRoutes()
    {
        if ($this->hasSuperRole()) {
            $permissions = (new Collection(Container::getInstance()->routes->getRoutes()))
                ->filter(function ($route) {
                    $actions = $route->getAction();
                    return isset($actions['as']) && $actions['as'] === 'rbac';
                })
                ->map(function ($route) {
                    return $route->uri;
                });

        } else {
            $permissions = $this->roles->map(function ($role) {
                return $role->permissions;
            })
                ->collapse()
                ->map(function ($permission) {
                    return $permission->routes;
                })
                ->collapse();
        }
        return $permissions;
    }

    public function hasSuperRole()
    {
        $hasSuperRole = false;
        $this->roles->each(function ($role) use (&$hasSuperRole) {
            if ($role->id === 1) {
                $hasSuperRole = true;
                return false;
            }
        });
        return $hasSuperRole;
    }

}
