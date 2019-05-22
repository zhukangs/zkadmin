@extends('admin.layout.modal')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="m-t-0 m-b-30">填写权限信息</h4>

                    <form class="form-horizontal" id="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">名称</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required" name="name" id="name" placeholder="名称">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">路由</label>
                            <div class="col-md-10">
                                <select class="form-control" id="selectL" name="selectL" multiple="multiple" style="width:40%;height:200px;float: left;">
                                    @foreach($routes as $route)
                                        <option value="{{$route->uri}}">{{$route->uri}}</option>
                                    @endforeach
                                </select>
                                <button type="button" id="toright" class="btn btn-default btn-sm" style="margin-left: 50px;margin-top: 80px;"> <i class="mdi mdi-arrow-right"></i> </button>
                                <button type="button" id="toleft" class="btn btn-default btn-sm" style="margin-top: 80px;"> <i class="mdi mdi-arrow-left"></i> </button>
                                <select class="form-control" id="selectR" name="selectR" multiple="multiple" style="width:40%;height:200px;float: right;"></select>
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
            var selVal = [];
            rightSel.find("option").each(function(){
                selVal.push(this.value);
            });

            if (selVal.length === 0) {
                layer.msg('请选择路由', function(){});
            }
            var name = $("#name").val();
            if(name==""){
                layer.msg('您必须输入权限名称', function(){});
            }
            var data = {
                'name':name,
                'routes':selVal,
            };

            myRequest("/admin/system/permission/store","post",data,function(res){
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


        var leftSel = $("#selectL");
        var rightSel = $("#selectR");
        $("#toright").bind("click",function(){
            leftSel.find("option:selected").each(function(){
                $(this).remove().appendTo(rightSel);
            });
        });

        $("#toleft").bind("click",function(){
            rightSel.find("option:selected").each(function(){
                $(this).remove().appendTo(leftSel);
            });
        });

        leftSel.dblclick(function(){
            $(this).find("option:selected").each(function(){
                $(this).remove().appendTo(rightSel);
            });
        });
        rightSel.dblclick(function(){
            $(this).find("option:selected").each(function(){
                $(this).remove().appendTo(leftSel);
            });
        });
    </script>

@endsection
