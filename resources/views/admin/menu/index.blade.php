@extends('admin.layout.base')

@section('content')

    <!-- Start content -->
    <div class="content">

        <div class="">
            <div class="page-header-title">
                <h4 class="page-title">菜单</h4>
            </div>
        </div>

        <div class="page-content-wrapper ">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-body">
                                <div class="">
                                    <h4 style="display: block;float: left;" class="m-t-0">菜单列表</h4>
                                    <button onclick="create()" type="button" class="btn btn-default waves-effect waves-light pull-right">新增</button>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>权重</th>
                                                        <th>菜单名称</th>
                                                        <th>菜单链接</th>
                                                        <th>所属角色</th>
                                                        <th>更新时间</th>
                                                        <th>创建时间</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($menus as $menu)
                                                        <tr>
                                                            <td><span style="font-size: 16px;" class="badge">{{$menu->sort}}</span></td>
                                                            <td>
                                                                @if(count($menu->children))
                                                                    <i class="mdi mdi-menu-down menu-switch" id="{{$menu->id}}" state="on"></i>
                                                                @endif
                                                                <i class="{{$menu->icon}}"></i> {{$menu->name}}
                                                            </td>
                                                            <td>{{$menu->url}}</td>
                                                            <td>
                                                                @foreach($menu->toRoles as $role)
                                                                    <span style="margin-bottom: 10px;display: inline-block;" class="label label-primary">{{$role->name}}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>{{$menu->updated_at}}</td>
                                                            <td>{{$menu->created_at}}</td>
                                                            <td>
                                                                <button type="button" onclick="edit({{$menu->id}})" class="btn btn-primary waves-effect waves-light">编辑</button>
                                                                <button type="button" onclick="del({{$menu->id}})" class="btn btn-danger waves-effect waves-light">删除</button>
                                                            </td>
                                                        </tr>

                                                        @if(count($menu->children))
                                                            @foreach($menu->children as $child_menu)
                                                                <tr class="pid-{{ $menu->id }}">
                                                                    <td><span style="font-size: 8px;" class="badge  badge-dark">{{$child_menu->sort}}</span></td>
                                                                    <td>　　　　 {{$child_menu->name}}</td>
                                                                    <td>{{$child_menu->url}}</td>
                                                                    <td>
                                                                        @foreach($child_menu->toRoles as $role)
                                                                            <span style="margin-bottom: 10px;display: inline-block;" class="label label-primary">{{$role->name}}</span>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>{{$child_menu->updated_at}}</td>
                                                                    <td>{{$child_menu->created_at}}</td>
                                                                    <td>
                                                                        <button type="button" onclick="edit({{$child_menu->id}})" class="btn btn-primary waves-effect waves-light">编辑</button>
                                                                        <button type="button" onclick="del({{$child_menu->id}})" class="btn btn-danger waves-effect waves-light">删除</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="text-center">
                                                <div style="display: inline-block">
                                                    {!! $menus->links() !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div><!-- container -->
        </div> <!-- Page content Wrapper -->
    </div> <!-- content -->

@endsection

@section('js')

    <script>
        //新增模态框
        function create(){
            var page = layer.open({
                type: 2,
                title: '新增菜单',
                shadeClose: true,
                shade: 0.8,
                area: ['70%', '90%'],
                content: '/admin/system/menu/create'
            });
        }
        //修改模态框
        function edit(id){
            var page = layer.open({
                type: 2,
                title: '编辑菜单信息',
                shadeClose: true,
                shade: 0.8,
                area: ['70%', '90%'],
                content: '/admin/system/menu/edit/'+id
            });
        }
        //删除操作
        function del(id){
            myConfirm("删除操作不可逆,是否继续?",function(){
                myRequest("/admin/system/menu/del/"+id,"post",{},function(res){
                    layer.msg(res.msg);
                    setTimeout(function(){
                        window.location.reload();
                    },1500)
                });
            });
        }

        $('.menu-switch').click(function(){
            var id = $(this).attr('id');
            var state = $(this).attr('state');

            if(state == "on"){
                $('.pid-'+id).hide();
                $(this).attr("state","off");
                $(this).removeClass('mdi mdi-menu-down').addClass('mdi mdi-menu-right');
            }else{
                $('.pid-'+id).show();
                $(this).attr("state","on");
                $(this).removeClass('mdi mdi-menu-right').addClass('mdi mdi-menu-down');
            }
        })
    </script>

@endsection