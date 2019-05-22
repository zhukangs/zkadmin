<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    //菜单列表页
    public function index()
    {
        $menus = Menu::where('pid', 0)->orderBy('sort', 'desc')->paginate(10);
        return view('admin.menu.index', compact('menus'));
    }

    //新增菜单表单页
    public function create()
    {
        $p_menus = Menu::where('pid', 0)->get();
        $roles = Role::get();
        return view('admin.menu.create', compact('p_menus', 'roles'));
    }

    //新增菜单数据入库
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'sort' => $request->sort,
            'pid' => $request->pid,
        ];
        $menu = Menu::create($data);
        foreach ($request->roles as $roleId) {
            $role = Role::find($roleId);
            $menu->toRoles()->attach($role);
        }
        return $this->json(200, '新增成功！');
    }

    //菜单编辑表单页
    public function edit($id)
    {
        $menu = Menu::find($id);
        $p_menus = Menu::where('pid', 0)->get();
        $roles = Role::get();
        $roles->map(function ($role) use ($menu) {
            $role->checked = false;
            $menu->toRoles->each(function ($mRole) use ($menu, &$role) {
                if ($mRole->id === $role->id) {
                    $role->checked = true;
                    return false;
                }
            });
            return $role;
        });
        return view('admin.menu.edit', compact('menu', 'p_menus','roles'));
    }

    //修改数据入库
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'sort' => $request->sort,
            'pid' => $request->pid,
        ];
        $menu=Menu::find($id);
        $menu->fill($data);
        $menu->toRoles()->detach();
        foreach($request->roles as $roleId){
            $role=Role::find($roleId);
            $menu->toRoles()->attach($role);
        }
        $menu->save();
        return $this->json(200, '修改成功！');
    }

    //删除
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return $this->json(200, '删除成功！');
    }
}
