<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title"> <span class="badge badge-dark">{{auth('admin')->user()->roles->name}} </span></li>
                <li>
                    <a href="{{route('admin.index')}}" class="waves-effect"><i class="mdi mdi-home"></i><span> 控制台 </span></a>
                </li>

                @foreach($menuList as $key=>$menu)
                    @if(($menu->children)->isEmpty())
                        <li>
                            <a href="{{url($menu->url)}}" class="waves-effect"><i class="{{$menu->icon}}"></i><span> {{$menu->name}} </span></a>
                        </li>
                    @else
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="{{$menu->icon}}"></i> <span> {{$menu->name}} </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                @foreach($menu->children as $c_key=>$c_menu)
                                    <li @if(\Route::current()->uri===$c_menu->url) class="active" @endif><a @if(\Route::current()->uri===$c_menu->url) class="active" @endif href="{{url($c_menu->url)}}">{{$c_menu->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                    @endif
                @endforeach
                @if(auth('admin')->user()->id == 1)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i> <span> 系统设置 </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                        <ul class="list-unstyled">
                            <li @if(\Route::current()->uri==='admin/system/menu') class="active" @endif> <a @if(\Route::current()->uri==='admin/system/menu') class="active" @endif href="{{route('admin.menu.index')}}">菜单</a></li>
                            <li @if(\Route::current()->uri==='admin/system/permission') class="active" @endif><a @if(\Route::current()->uri==='admin/system/permission') class="active" @endif href="{{route('admin.permission.index')}}">权限</a></li>
                            <li @if(\Route::current()->uri==='admin/system/role') class="active" @endif><a @if(\Route::current()->uri==='admin/system/role') class="active" @endif href="{{route('admin.role.index')}}">角色</a></li>
                            <li @if(\Route::current()->uri==='admin/system/administrator') class="active" @endif><a @if(\Route::current()->uri==='admin/system/administrator') class="active" @endif href="{{route('admin.administrator.index')}}">管理员</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <div class="clearfix"></div>
        <div style="width: 100%;position: absolute;bottom: 85px;text-align: center;">
            @if(auth('admin')->user()->system_color==1)
                <i id="system-color" style="font-size: 36px;color: #2a323c;margin-right: 15px" class="mdi mdi-lightbulb"></i>
            @else
                <i id="system-color" style="font-size: 36px;color: #2a323c;margin-right: 15px" class="mdi mdi-lightbulb-outline"></i>
            @endif
        </div>
    </div> <!-- end sidebarinner -->
</div>