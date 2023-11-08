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
	<link rel="stylesheet" href="{{asset("AdminTheme/main-dark/css/vendors_css.css")}} ">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset("AdminTheme/main-dark/css/style.css")}} ">
	<link rel="stylesheet" href="{{asset("AdminTheme/main-dark/css/skin_color.css")}} ">

     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

    @include('layouts.admin_partials.header')

    @include('layouts.admin_partials.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
    @yield('content')

	
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->


  @include('layouts.admin_partials.footer')




</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->

	<link rel="stylesheet" href="{{asset("AdminTheme/main-dark/js/vendors.min.js")}} ">


	<link rel="stylesheet" href="{{asset("AdminTheme/assets/icons/feather-icons/feather.min.js")}} ">
	<link rel="stylesheet" href="{{asset("AdminTheme/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js")}} ">
	<link rel="stylesheet" href="{{asset("AdminTheme/assets/vendor_components/apexcharts-bundle/irregular-data-series.js")}} ">
	<link rel="stylesheet" href="{{asset("AdminTheme/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js")}} ">
{{--     
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	
	<script src="../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
	<script src="../assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	 --}}

	<link rel="stylesheet" href="{{asset("AdminTheme/main-dark/js/template.js")}} ">
	<link rel="stylesheet" href="{{asset("AdminTheme/main-dark/js/pages/dashboard.js")}} ">

	
</body>
</html>
