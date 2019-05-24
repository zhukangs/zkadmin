<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout','login']]);
    }

    protected $redirectTo = 'admin';
    //登录表单
    public function loginForm()
    {
        return view('admin.index.login');
    }

    //重写登录验证规则
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required'=>'账号不能为空',
            'password.required'=>'密码不能为空'
        ]);
    }

    //集成login方法,做错误返回
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }else{
            return back()->with('error','账号或密码错误！')->withInput();
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    //自定义认证驱动
    protected function guard()
    {
        return auth()->guard('admin');
    }

    //定义登录用户名字段
    public function username()
    {
        return 'username';
    }

    //退出系统重写
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }

}
