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

## 请求(不想用这个请求方法可以自行用ajax)

```javascript
var data = {id:1};//参数
myRequest("/admin/config/add","post",data,function(res){
    //请求成功回调
    layer.msg("提示信息");//弹出提示
    //15秒后刷新父页面
    setTimeout(function(){
        parent.location.reload();
    },1500)
});
```

> 请求失败回调默认封装了取消loading层的操作，如果想自定义请求失败的回调的话，自行修改public/assets/js/common.js文件中的myRequest方法

## 表单不为空验证

input添加`require`class

```html
 <div class="form-group" id="string">
    <label >* 测试</label>
    <input type="text" name="test" class="form-control require"  placeholder="">
</div>
```

```js
check = checkForm();//验证表单，如果带有require的input为空，则边框变为红色并弹出提示
if(!check){
    return false;
}
```



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