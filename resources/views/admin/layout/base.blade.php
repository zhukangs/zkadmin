<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Appzia - Responsive Admin Dashboard Template</title>

    <link rel="shortcut icon" href="/vendor/admin/assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="/vendor/admin/assets/plugins/morris/morris.css">

    <link href="/vendor/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/admin/assets/css/icons.css" rel="stylesheet" type="text/css">
    {{--<link href="/vendor/admin/assets/css/style.css" rel="stylesheet" type="text/css">--}}
    @if(auth('admin')->user()->system_color==1)
        <link href="/vendor/admin/assets/css/style_black.css" rel="stylesheet" type="text/css">
    @else
        <link href="/vendor/admin/assets/css/style_white.css" rel="stylesheet" type="text/css">
    @endif
    @yield('css')

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    @include('admin.layout.top')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layout.left')
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->
    <div class="content-page">
        @yield('content')
        @include('admin.layout.footer')
    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


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

<!--Morris Chart-->
{{--<script src="/vendor/admin/assets/plugins/morris/morris.min.js"></script>--}}
<script src="/vendor/admin/assets/plugins/raphael/raphael-min.js"></script>

{{--<script src="/vendor/admin/assets/pages/dashborad.js"></script>--}}

<script src="/vendor/admin/assets/js/app.js"></script>
<script src="/vendor/admin/assets/layer/layer.js"></script>
<script src="/vendor/admin/assets/pages/common.js"></script>

<script>
    $('#admin-lock').click(function () {
        $.ajax({
            type:'get',
            url:'{{route("admin.lock")}}',
            success:function (res) {
                console.log(res);
                if(res.code==200){
                    location.href='{{route("admin.locking")}}';
                }
            }
        });
    });

    $('#system-color').click(function () {
        //删除操作
        myRequest("/admin/system/administrator/system_color","post",{},function(res){
            layer.msg(res.msg.msg);
            setTimeout(function(){
                window.location.reload();
            },1500)
        });


    });
</script>

@yield('js')

</body>
</html>