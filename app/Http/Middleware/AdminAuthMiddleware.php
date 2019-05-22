<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use \Illuminate\Support\Facades\Route;
use Request;
use App\Models\Menu;
use App\Models\Permission;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/admin/login');
            }
        }

        //获取当前用户角色下的所有权限,一个角色对应多个权限
        $permissions = auth('admin')->user()->roles->toPermissions;
        //提取所有权限路由,丢给newRoutes
        $newRoutes = [];
        foreach ($permissions as $permission) {
            $routes = $permission->routes;
            $newRoutes=array_merge($newRoutes,$routes);
        }
        array_unique($newRoutes);
        if(!in_array(Route::current()->uri,$newRoutes)){
            abort(403);
        }

        //判断当前登录用户是否处于锁屏状态
        if (Cookie::get('lock-' . auth('admin')->user()->id) == 'locking-' . auth('admin')->user()->username) {
            return redirect()->route('admin.locking');
        }
        return $next($request);
    }


}
