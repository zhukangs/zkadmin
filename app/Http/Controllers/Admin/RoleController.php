<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    //角色列表页
    public function index()
    {
        $roles=Role::paginate(8);
        return view('admin.role.index',compact('roles'));
    }

    //新增管理员表单页
    public function create()
    {
        $permissions=Permission::get();
        return view('admin.role.create',compact('permissions'));
    }

    //新增管理员数据入库
    public function store(Request $request)
    {
        $data=[
            'name'=>$request->name,
            'introduction'=>$request->introduction,
        ];
        $role=Role::create($data);
        foreach($request->permissions as $permissionId){
            $permission=Permission::find($permissionId);
            $role->toPermissions()->attach($permission);
        }
        return $this->json(200, '新增成功！');
    }

    //管理员编辑表单页
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions=Permission::get();
        $permissions->map(function ($permission) use ($role) {
            $permission->checked = false;
            $role->toPermissions->each(function ($rPermission) use ($role, &$permission) {
                if ($rPermission->id === $permission->id) {
                    $permission->checked = true;
                    return false;
                }
            });
            return $permission;
        });
        return view('admin.role.edit', compact('role','permissions'));
    }

    //修改数据入库
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'introduction' => $request->introduction,
        ];
        //return $this->json(200, $request->permissions);
        $role=Role::find($id);
        $role->fill($data);
        $role->toPermissions()->detach();
        foreach($request->permissions as $permissionId){
            $permission=Permission::find($permissionId);
            $role->toPermissions()->attach($permission);
        }
        $role->save();
        return $this->json(200, '修改成功！');
    }

    //删除商户
    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return $this->json(200, '删除成功！');
    }
}
