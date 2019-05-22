@extends('admin.layout.modal')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="m-t-0 m-b-30">填写角色信息</h4>

                    <form class="form-horizontal" id="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">名称</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required" name="name" placeholder="名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">角色描述</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="introduction" placeholder="角色描述..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">选择权限</label>
                            <div class="col-md-10">
                                <div class="checkbox checkbox-primary col-md-12" style="float: left;margin-left: 20px;">
                                    <input id="checkbox2" type="checkbox" class="all">
                                    <label for="checkbox2">
                                        全选
                                    </label>
                                </div>
                                @foreach($permissions as $permission)
                                    <div class="checkbox checkbox-primary" style="float: left;margin-left: 20px;">
                                        <input id="checkbox2" type="checkbox" class="permission" value="{{ $permission->id }}">
                                        <label for="checkbox2">
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-sm-12">
                                <label class="col-md-2 control-label"></label>
                                <button type="button" onclick="cancel()" class="btn btn-warning waves-effect waves-light">取消</button>
                                <button type="button" onclick="commit()" style="margin-left: 20px;" class="btn btn-info waves-effect waves-light">提交</button>
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

        //ajax提交数据
        function commit(){
            if(!checkForm()){
                return false;
            }
            var data = $("#form").serializeObject();
            var permissions =  new Array();
            $('.permission:checked').each(function(index){
                permissions[index] = $(this).val();
            });
            data.permissions = permissions;
            myRequest("/admin/system/role/store","post",data,function(res){
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
    </script>

@endsection
