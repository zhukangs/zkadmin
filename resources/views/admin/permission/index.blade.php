@extends('admin.layout.base')

@section('css')
    <style>
        .permission-tr > td{vertical-align:middle;}
    </style>

@endsection

@section('content')

    <!-- Start content -->
    <div class="content">

        <div class="">
            <div class="page-header-title">
                <h4 class="page-title">权限</h4>
            </div>
        </div>

        <div class="page-content-wrapper ">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-body">
                                <div class="">
                                    <h4 style="display: block;float: left;" class="m-t-0">权限列表</h4>
                                    <button onclick="create()" type="button" class="btn btn-default waves-effect waves-light pull-right">新增</button>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>权限名</th>
                                                        <th>路由</th>
                                                        <th>更新时间</th>
                                                        <th>创建时间</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($permissions as $permission)
                                                        <tr class="permission-tr">
                                                            <td>{{$permission->id}}</td>
                                                            <td style="min-width: 100px;">{{$permission->name}}</td>
                                                            <td>
                                                                @foreach($permission->routes as $route)
                                                                    <span style="margin-bottom: 10px;display: inline-block;" class="label label-primary">{{$route}}</span>
                                                                @endforeach
                                                            </td>
                                                            <td style="min-width: 180px;">{{$permission->updated_at}}</td>
                                                            <td style="min-width: 180px;">{{$permission->created_at}}</td>
                                                            <td style="min-width: 150px;">
                                                                <button type="button" onclick="edit({{$permission->id}})" class="btn btn-primary waves-effect waves-light">编辑</button>
                                                                <button type="button" onclick="del({{$permission->id}})" class="btn btn-danger waves-effect waves-light">删除</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="text-center">
                                                <div style="display: inline-block">
                                                    {!! $permissions->links() !!}
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
                title: '新增权限',
                shadeClose: true,
                shade: 0.8,
                area: ['70%', '90%'],
                content: '/admin/system/permission/create'
            });
        }
        //修改模态框
        function edit(id){
            var page = layer.open({
                type: 2,
                title: '编辑权限信息',
                shadeClose: true,
                shade: 0.8,
                area: ['70%', '90%'],
                content: '/admin/system/permission/edit/'+id
            });
        }
        //删除操作
        function del(id){
            myConfirm("删除操作不可逆,是否继续?",function(){
                myRequest("/admin/system/permission/del/"+id,"post",{},function(res){
                    layer.msg(res.msg);
                    setTimeout(function(){
                        window.location.reload();
                    },1500)
                });
            });
        }
    </script>

@endsection