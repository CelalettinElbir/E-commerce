<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">
    <title>Sunny Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('AdminTheme/main-dark/css/vendors_css.css') }} ">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('AdminTheme/main-dark/css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('AdminTheme/main-dark/css/skin_color.css') }} ">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Style-->
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('layouts.admin_partials.header')

        @include('layouts.admin_partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container-full">

                @yield('content')

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        @include('layouts.admin_partials.footer')

    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('AdminTheme/assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src=" {{ asset('AdminTheme/main-dark/js/pages/editor.js') }} "></script>
    <script src="{{ asset('AdminTheme/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>


    <script src="{{ asset('AdminTheme/main-dark/js/vendors.min.js') }} "></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('AdminTheme/assets/icons/feather-icons/feather.min.js') }} "></script>
    <script src="{{ asset('AdminTheme/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }} "></script>
    <script src="{{ asset('AdminTheme/assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }} "></script>
    <script src="{{ asset('AdminTheme/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }} "></script>


    <script src="{{ asset('AdminTheme/main-dark/js/template.js') }} "></script>
    <script src="{{ asset('AdminTheme/main-dark/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}">
    </script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>


    @stack('js')


</body>

</html>