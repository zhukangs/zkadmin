<style>
    .dropdown-menu li:hover i{color: #04a2b3;}
</style>

<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.html" class="logo"><img src="/vendor/admin/assets/images/logo.png" alt="logo-img"></a>
            <a href="index.html" class="logo-sm"><img src="/vendor/admin/assets/images/logo_sm.png" alt="logo-img"></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="ion-navicon"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <form class="navbar-form pull-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-bar" placeholder="Search...">
                    </div>
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a title="全屏" href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="mdi mdi-fullscreen"></i></a>
                    </li>
                    <li class="hidden-xs">
                        <a title="锁屏" id="admin-lock" class="waves-effect waves-light notification-icon-box"><i class="mdi mdi-lock"></i></a>
                    </li>
                    <li>
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{auth('admin')->user()->avatar}}" alt="user-img" class="img-circle">
                            <span class="badge badge-xs badge-success" style="right: 65px;top: 45px;"></span>
                            <span style="height: 36px;line-height: 36px;display: inline-block;margin-left: 4px;" class="dropdown">
                                {{auth('admin')->user()->username}}
                            </span>
                            {{--<i class="ti-angle-down"></i>--}}
                        </a>
                        <ul class="dropdown-menu">
                            <li style="cursor:pointer"><a onclick="editMe({{auth('admin')->user()->id}})"> <i class="fa fa-edit"></i> 修改信息</a></li>
                            <li class="divider"></li>
                            <li style="cursor:pointer"><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i> 退出登录</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<script>
    //修改模态框
    function editMe(id){
        var page = layer.open({
            type: 2,
            title: '编辑管理员信息',
            shadeClose: true,
            shade: 0.8,
            area: ['70%', '90%'],
            content: '/admin/system/administrator/edit/'+id
        });
    }
</script>