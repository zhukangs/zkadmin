<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class IndexController extends BaseController
{
    //后台首页
    public function index()
    {
//        $admin=auth('admin')->user();
//        $menus = $admin->getMenus();
//        return $menus;
        return view('admin.index.index');
    }

    /**
     * @Desc: 后台图片上传
     * @Author: woann <304550409@qq.com>
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $file = $request->file('image');
        $path = $request->input('path') . '/';
        if ($file) {
            if ($file->isValid()) {
                $size = $file->getSize();
                if ($size > 5000000) {
                    return $this->json(500, '图片不能大于5M！');
                }
                // 获取文件相关信息
                $ext = $file->getClientOriginalExtension(); // 扩展名
                if (!in_array($ext, ['png', 'jpg', 'gif', 'jpeg', 'pem'])) {
                    return $this->json(500, '文件类型不正确！');
                }
                $realPath = $file->getRealPath(); //临时文件的绝对路径
                // 上传文件
                $filename = $path . date('Ymd') . '/' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('admin')->put($filename, file_get_contents($realPath));
                if ($bool) {
                    return $this->json(200, '上传成功', ['filename' => '/uploads/' . $filename]);
                } else {
                    return $this->json(500, '上传失败！');
                }
            } else {
                return $this->json(500, '文件类型不正确！');
            }
        } else {
            return $this->json(500, '上传失败！');
        }
    }
    
    //锁屏页
    public function locking()
    {
        if(empty(auth('admin')->user()->id)) return redirect()->route('admin.login');
        return view('admin.index.locking');
    }

    //锁屏携带cookie
    public function lock()
    {
        return response(['code'=>200,'msg'=>'已锁屏！'])->cookie('lock-'.auth('admin')->user()->id, 'locking-'.auth('admin')->user()->username, 120);
    }

    //开锁
    public function openLock(Request $request)
    {
        if(!Hash::check($request->password,auth('admin')->user()->password)){
            return back()->with('error','密码错误！');
        }
        Cookie::queue(Cookie::forget('lock-'.auth('admin')->user()->id));
        return redirect()->route('admin.index');
    }

    //icon模态框
    public function icon()
    {
        return view('admin.index.icon');
    }
}
