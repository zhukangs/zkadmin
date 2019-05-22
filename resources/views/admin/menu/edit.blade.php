@extends('admin.layout.modal')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="m-t-0 m-b-30">填写菜单信息</h4>

                    <form class="form-horizontal" id="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">菜单名称</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required" value="{{$menu->name}}" name="name" placeholder="名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">菜单链接</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required" value="{{$menu->url}}" name="url" placeholder="如:admin/orders">
                            </div>
                        </div>
                        <div class="form-group" id="icon-form-group">
                            <label class="col-md-2 control-label">菜单图标</label>
                            <div class="col-md-6">
                                <input type="text" id="icon-input" class="form-control required" value="{{$menu->icon}}" name="icon" placeholder="如:mdi mdi-access-point">
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="icon-view" class="btn btn-success waves-effect waves-light">预览</button>
                            </div>
                            <div class="col-md-2 align-content-center icon-div">
                                <button type="button" id="icon-view" class="btn btn-dark waves-effect waves-light"><i class="{{$menu->icon}}"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">权重</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required" value="{{$menu->sort}}" name="sort" placeholder="权重,值越大排序越靠前">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">上级菜单</label>
                            <div class="col-md-10">
                                <select class="form-control" name="pid">
                                    @if(!empty($p_menus))
                                        <option value="0">顶级菜单</option>
                                        @foreach($p_menus as $p_menu)
                                            <option @if($p_menu->id==$menu->pid) selected @endif value="{{$p_menu->id}}">{{$p_menu->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="0">顶级菜单</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">选择角色</label>
                            <div class="col-md-10">
                                <div class="checkbox checkbox-primary col-md-12" style="float: left;margin-left: 20px;">
                                    <input id="checkbox2" type="checkbox" class="all">
                                    <label for="checkbox2">
                                        全选
                                    </label>
                                </div>
                                @foreach($roles as $role)
                                    <div class="checkbox checkbox-primary" style="float: left;margin-left: 20px;">
                                        <input id="checkbox2" @if($role->checked) checked @endif type="checkbox" class="role" value="{{ $role->id }}">
                                        <label for="checkbox2">
                                            {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-sm-12">
                                <label class="col-md-2 control-label"></label>
                                <button type="button" onclick="cancel()" class="btn btn-warning waves-effect waves-light">取消</button>
                                <button type="button" onclick="commit({{$menu->id}})" style="margin-left: 20px;" class="btn btn-info waves-effect waves-light">提交</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- End row -->

@endsection

@section('js')
    <script>
        $('.all').on("click",function(){
            if(this.checked) {
                $("input[type='checkbox']").prop('checked',true);
            }else {
                $("input[type='checkbox']").prop('checked',false);
            }
        });

        //icon模态框
        $('#icon-view').click(function () {
            var page = layer.open({
                type: 2,
                title: 'Material Design Icons',
                shadeClose: true,
                shade: 0.8,
                area: ['70%', '90%'],
                content: '/admin/icon'
            });
        });
        //ajax提交数据
        function commit(id){
            if(!checkForm()){
                return false;
            }
            var data = $("#form").serializeObject();
            var roles =  new Array();
            $('.role:checked').each(function(index){
                roles[index] = $(this).val();
            });
            data.roles = roles;
            myRequest("/admin/system/menu/update/"+id,"post",data,function(res){
                console.log(res);
                layer.msg(res.msg);
                if(res.code == 200){
                    setTimeout(function(){
                        parent.location.reload();
                    },1500)
                }
            });
        }
        //重载
        function cancel() {
            parent.location.reload();
        }

        $('#icon-input').change(function () {
            var icon_value=$(this).val();
            var html='<div class="col-md-2 align-content-center icon-div">\n' +
                '<button type="button" id="icon-view" class="btn btn-dark waves-effect waves-light"><i class="'+icon_value+'"></i></button>\n' +
                '</div>';
            $('.icon-div').remove();
            $('#icon-form-group').append(html);
        });
    </script>
@endsection
