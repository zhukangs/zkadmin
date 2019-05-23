@extends('admin.layout.modal')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="m-t-0 m-b-30">填写管理员信息</h4>

                    <form class="form-horizontal" id="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">账户</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required" name="username" placeholder="登录账户">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">邮箱</label>
                            <div class="col-md-10">
                                <input type="email" id="example-email" name="email" class="form-control required" placeholder="邮箱号">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">密码</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control required" name="password" placeholder="登陆密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">头像</label>
                            {{--<input type="file" class="form-control file-upload-default img-file" data-path="avatar">--}}
                            <input type="hidden" name="avatar" class="image-path" value="">
                            <div class="col-md-6">
                                <input type="file" class="form-control file-upload-default img-file" data-path="avatar">
                                <input type="hidden" class="form-control file-upload-info" disabled="" value="" placeholder="选择图片">
                                <span class="input-group-append" style="display: none;">
                                    <button class="file-upload-browse btn btn-gradient-primary" onclick="upload($(this))" type="button">上传</button>
                                </span>
                            </div>
                            <div class="col-md-4">*不上传将使用默认头像</div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2 img-yl" style="display: block;margin-top: 5px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">角色</label>
                            <div class="col-md-10">
                                <select class="form-control" name="role_id">
                                    @if(!empty($roles))
                                        <option value="0">-请选择</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="0">-请选择</option>
                                    @endif
                                </select>
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
        //ajax提交数据
        function commit(){
            if(!checkForm()){
                return false;
            }
            var data = $("#form").serializeObject();
            var roles =  new Array();
            $('.role:checked').each(function(index){
                roles[index] = $(this).val();
            });
            data.roles = roles;
            myRequest("/admin/system/administrator/store","post",data,function(res){
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
