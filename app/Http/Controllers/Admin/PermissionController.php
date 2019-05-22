<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PermissionController extends BaseController
{
    //权限列表页
    public function index()
    {
        $permissions = Permission::paginate(8);
        return view('admin.permission.index', compact('permissions'));
    }

    //新增权限表单页
    public function create()
    {
        //渲染页面
        $all_routes = new Collection(app()->routes->getRoutes());
        $routes = [];
        foreach ($all_routes as $route) {
            $actions = $route->getAction();
            if (in_array('auth.admin:admin', $actions['middleware'])) {
                $routes[] = $route;
            }
        }
        return view('admin.permission.create', compact('routes'));
    }

    //新增管理员数据入库
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'routes' => $request->routes,
        ];
        Permission::create($data);
        return $this->json(200, '新增成功！');
    }

    //管理员编辑表单页
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $all_routes = new Collection(app()->routes->getRoutes());
        $authRoutes = [];
        foreach ($all_routes as $route) {
            $actions = $route->getAction();
            if (in_array('auth.admin:admin', $actions['middleware'])) {
                $authRoutes[] = $route;
            }
        }
        $checkRoutes = $permission->routes;
        $uncheckRoutes = [];
        foreach ($authRoutes as $authRoute) {
            if (!in_array($authRoute->uri(), $checkRoutes)) {
                $uncheckRoutes[] = $authRoute->uri();
            }
        }
        return view('admin.permission.edit', compact('permission','checkRoutes','uncheckRoutes'));
    }

    //修改数据入库
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'routes' => $request->routes,
        ];
        $permission=Permission::find($id);
        $permission->fill($data);
        $permission->save();
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
