<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2019/5/15
 * Time: 17:06
 */

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function($router){
    $router->get('login', 'LoginController@loginForm')->name('admin.login.form');
    $router->post('login', 'LoginController@login')->name('admin.login');
    $router->get('locking', 'IndexController@locking')->name('admin.locking');
    $router->post('open_lock', 'IndexController@openLock')->name('admin.open.lock');
});

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>['auth.admin:admin'],],function($router){
    $router->get('/', 'IndexController@index')->name('admin.index');
    $router->get('logout', 'LoginController@logout')->name('admin.logout');

    $router->get('lock', 'IndexController@lock')->name('admin.lock');
    $router->get('icon', 'IndexController@icon')->name('admin.icon');

    //图片上传
    $router->post('upload', 'IndexController@upload');

    //系统设置
    Route::group(['prefix' => 'system',],function($router){
        //管理员模块
        $router->get('administrator', 'AdminController@index')->name('admin.administrator.index');
        $router->get('administrator/edit/{id}', 'AdminController@edit')->name('admin.administrator.edit');
        $router->post('administrator/update/{id}', 'AdminController@update')->name('admin.administrator.update');
        $router->get('administrator/create', 'AdminController@create')->name('admin.administrator.create');
        $router->post('administrator/store', 'AdminController@store')->name('admin.administrator.store');
        $router->post('administrator/del/{id}', 'AdminController@delete')->name('admin.administrator.delete');
        $router->post('administrator/system_color', 'AdminController@systemColor')->name('admin.administrator.systemColor');
        //角色模块
        $router->get('role', 'RoleController@index')->name('admin.role.index');
        $router->get('role/create', 'RoleController@create')->name('admin.role.create');
        $router->post('role/store', 'RoleController@store')->name('admin.role.store');
        $router->get('role/edit/{id}', 'RoleController@edit')->name('admin.role.edit');
        $router->post('role/update/{id}', 'RoleController@update')->name('admin.role.update');
        $router->post('role/del/{id}', 'RoleController@delete')->name('admin.role.delete');
        //菜单模块
        $router->get('menu', 'MenuController@index')->name('admin.menu.index');
        $router->get('menu/create', 'MenuController@create')->name('admin.menu.create');
        $router->post('menu/store', 'MenuController@store')->name('admin.menu.store');
        $router->get('menu/edit/{id}', 'MenuController@edit')->name('admin.menu.edit');
        $router->post('menu/update/{id}', 'MenuController@update')->name('admin.menu.update');
        $router->post('menu/del/{id}', 'MenuController@delete')->name('admin.menu.delete');
        //权限模块
        $router->get('permission', 'PermissionController@index')->name('admin.permission.index');
        $router->get('permission/create', 'PermissionController@create')->name('admin.permission.create');
        $router->post('permission/store', 'PermissionController@store')->name('admin.permission.store');
        $router->get('permission/edit/{id}', 'PermissionController@edit')->name('admin.permission.edit');
        $router->post('permission/update/{id}', 'PermissionController@update')->name('admin.permission.update');
        $router->post('permission/del/{id}', 'PermissionController@delete')->name('admin.permission.delete');
    });


});