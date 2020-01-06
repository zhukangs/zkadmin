<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    //管理员列表页
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->paginate(10);
        return view('admin.administrator.index', compact('admins'));
    }

    //新增管理员表单页
    public function create()
    {
        $roles = Role::get();
        return view('admin.administrator.create', compact('roles'));
    }

    //新增管理员数据入库
    public function store(Request $request)
    {
        $data = [
            'role_id' => $request->role_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        if (!empty($request->avatar)) $data['avatar'] = $request->avatar;
        Admin::create($data);
        return $this->json(200, '新增成功！');
    }

    //管理员编辑表单页
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::get();
        return view('admin.administrator.edit', compact('admin','roles'));
    }

    //修改数据入库
    public function update(Request $request, $id)
    {
        $data = [
            'role_id' => $request->role_id,
            'username' => $request->username,
            'email' => $request->email,
        ];
        if (!empty($request->password)) $data['password'] = bcrypt($request->password);
        if (!empty($request->avatar)) $data['avatar'] = $request->avatar;
        Admin::where('id', $id)->update($data);
        return $this->json(200, '修改成功！');
    }

    //删除商户
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return $this->json(200, '删除成功！');
    }

    //主題切換
    public function systemColor()
    {
        $admin = Admin::findOrFail(auth('admin')->user()->id);
        if($admin->system_color==1){
            $admin->system_color=2;
        }else{
            $admin->system_color=1;
        }
        $admin->save();
        return $this->json(200, ['msg'=>'主題切換成功！','status'=>$admin->system_color]);
    }
}
