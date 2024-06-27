<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="We are developing"/>
    <meta name="keywords" content="e library">
    <meta name="author" content="developer" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
{{--    <link rel="stylesheet" href="{{asset('css/fontawesome-all.org.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/fontawesome-all.org.css/fontawesome-all.org.min.css')}}">--}}

    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- notification css -->
    <link rel="stylesheet" href="{{asset('css/notification.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/data-tables/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/data-tables/css/dataTables.bootstrap4.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('style')

</head>
<body class="layout-6" style="background-image: url('{{asset("images/bg-images/bg1.jpg")}}'); background-size: cover;">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

<!-- [ Pre-loader ] End -->

@yield('content');



<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/vendor-all.min.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/pcoded.min.js')}}"></script>
<!-- amchart js -->
<script src="{{asset('js/amcharts.js')}}"></script>
<script src="{{asset('js/guage.js')}}"></script>
<script src="{{asset('js/serial.js')}}"></script>
<script src="{{asset('js/light.js')}}"></script>
<script src="{{asset('js/ammap.min.js')}}"></script>
<script src="{{asset('js/usaLow.js')}}"></script>
<script src="{{asset('js/radar.js')}}"></script>
<script src="{{asset('js/worldLow.js')}}"></script>
<script src="{{asset('plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/data-tables/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- notification Js -->
<script src="{{asset('js/bootstrap-growl.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    let major = @json($major);
    let bookCat = @json($bookCat);


</script>

@yield("script")

</body>
</html>
