# 欢迎使用zkadmin后台管理

![LOGO](https://test1-1256003521.cos.ap-guangzhou.myqcloud.com/static/zkadmin/logo.png)


[![Php Version](https://img.shields.io/badge/php-%3E=7.2-brightgreen.svg?maxAge=2592000)](https://secure.php.net/)
[![Laravel Version](https://img.shields.io/badge/laravel-%3E=5.8-brightgreen.svg?maxAge=2592000)](https://laravel.com/)

## 项目简介

zkadmin是一款基于laravel框架进行封装的后台管理系统,其中包含：

- rbac权限管理模块
- 完整的[[UI组件](http://zkms.zam9.com/)]
- 自定义配置管理
- 图片上传,网络请求等常用的js公共函数
- 项目弹出层引用了layer,可直接使用layer
- 持续维护中...



## 安装教程

- 克隆代码库`git clone https://github.com/zhukangs/zkadmin.git` 
- 进入项目 ` cd zkadmin`  ，复制一份配置文件 `cp .env.example .env` ，并填写数据库相关配置
- 然后执行命令 `composer install` 安装 laravel 框架，依赖库
- 生成密钥 `php artisan key:generate`
- 生成数据表以及部分初始数据 `php artisan migrate --seed` 
- 配置域名(按laravel项目正常配置即可,解析到public目录)
- 如发现权限相关问题 执行 chown -R 用户名:用户组 项目目录
- 访问后台域名：`http://zkadmin.test/admin`，默认管理员账号：`admin`，密码：`password`，登录即可进入管理系统
- 可能遇到的问题`Please provide a valid cache path.` ，解决：在`storage/framework/`下新建文件夹`views`




## 使用流程

以增加一个`用户管理`模块为例

- 新建控制器：`php artisan make:controller Admin/UserController`

- 新建模型：`User` 模型就不用新建了，已将默认 `User` 模型移入至 `Models` 文件夹下，直接使用就好了，若要新建，执行`php artisan make:model Models/User` 即可

- 新建路由：在 `routes/admin.php` 编写路由，放至在 `prefix` 为 `admin` 的分组下即可，如下：

  ```php
  Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>['auth.admin:admin'],],function($router){
    //其他模块
    .
    .
    //用户模块
    $router->get('user', 'UserController@index')->name('admin.user.index');
    $router->get('user/create', 'UserController@create')->name('admin.user.create');
    $router->post('user/store', 'UserController@store')->name('admin.user.store');
    $router->get('user/edit/{id}', 'UserController@edit')->name('admin.user.edit');
    $router->post('user/update/{id}', 'UserController@update')->name('admin.user.update');
    $router->post('user/del/{id}', 'UserController@delete')->name('admin.user.delete');

  });
  ```

  觉得写这么多路由比较麻烦的，可以根据自己的想法，运用资源路由，或者每个模块一个路由文件，然后引入进来也行。

- 新建控制器下的方法：`UserController`编写对应的方法，如：

  ```php
  //用户列表
  public function index()
  {
    //
  }

  //新增用户表单页
  public function create()
  {
    //
  }

  //新增用户数据入库
  public function store(Request $request)
  {
    //
  }

  //用户编辑表单页
  public function edit($id)
  {
    //
  }

  //修改数据入库
  public function update(Request $request, $id)
  {
    //
  }

  //删除用户
  public function delete($id)
  {
    //
  }
  ```

- 新建视图：在 `resources/views/admin/` 下新建 `user` 文件夹，然后新建对应的视图文件即可，具体可参考 `administrator` 下的。




## 部分截图

- 后台登录页

![后台登录页](https://test1-1256003521.cos.ap-guangzhou.myqcloud.com/static/zkadmin/login.png)

- 后台首页

![后台首页](https://test1-1256003521.cos.ap-guangzhou.myqcloud.com/static/zkadmin/index.jpg)

- 管理员列表

![管理员列表](https://test1-1256003521.cos.ap-guangzhou.myqcloud.com/static/zkadmin/admin_index.jpg)

- 权限编辑

![权限编辑](https://test1-1256003521.cos.ap-guangzhou.myqcloud.com/static/zkadmin/permission_edit.jpg)

- 锁屏页

![锁屏页](https://test1-1256003521.cos.ap-guangzhou.myqcloud.com/static/zkadmin/lock.jpg)





作者 [@zhukang][1]
2019 年 5月 22日    