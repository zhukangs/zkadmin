<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Appzia - Responsive Admin Dashboard Template</title>

    <link rel="shortcut icon" href="/vendor/admin/assets/images/favicon.ico">

    <link href="/vendor/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/admin/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/vendor/admin/assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">

        <div class="panel-body">
            <h3 class="text-center m-t-0 m-b-15">
                <a href="index.html" class="logo"><img src="/vendor/admin/assets/images/logo_white.png" alt="logo-img"></a>
            </h3>

            <form class="form-horizontal m-t-20" action="{{route('admin.open.lock')}}" method="post">
                {{csrf_field()}}
                <div class="user-thumb text-center m-b-30">
                    <img src="{{auth('admin')->user()->avatar ?? '/uploads/avatar/default.png'}}" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
                    <h4 class="text-username">{{auth('admin')->user()->username ?? ''}}</h4>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit"><i class="mdi mdi-lock-open"></i> 解锁</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12 text-center">
                        <a href="{{route('admin.logout')}}" class="text-muted">Not you?</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



<!-- jQuery  -->
<script src="/vendor/admin/assets/js/jquery.min.js"></script>
<script src="/vendor/admin/assets/js/bootstrap.min.js"></script>
<script src="/vendor/admin/assets/js/modernizr.min.js"></script>
<script src="/vendor/admin/assets/js/detect.js"></script>
<script src="/vendor/admin/assets/js/fastclick.js"></script>
<script src="/vendor/admin/assets/js/jquery.slimscroll.js"></script>
<script src="/vendor/admin/assets/js/jquery.blockUI.js"></script>
<script src="/vendor/admin/assets/js/waves.js"></script>
<script src="/vendor/admin/assets/js/wow.min.js"></script>
<script src="/vendor/admin/assets/js/jquery.nicescroll.js"></script>
<script src="/vendor/admin/assets/js/jquery.scrollTo.min.js"></script>

<script src="/vendor/admin/assets/js/app.js"></script>
<script src="/vendor/admin/assets/layer/layer.js"></script>

@if(session('error'))
    <script>
        layer.msg('{{session('error')}}',{anim:6});
    </script>
@endif()


</body>
</html>