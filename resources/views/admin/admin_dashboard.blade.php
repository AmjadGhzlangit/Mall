<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title> Admin Dashboard </title>

    <!-- admin/css/main_css -->
   @include('admin.css.main_css')
   <!-- partial -->
   
</head>
<body>
<div class="main-wrapper">

 <!-- admin/layouts/sidebar -->
   @include('admin.layouts.sidebar')
<!-- partial -->


    <div class="page-wrapper">

        <!-- admin/layouts/navbar -->
        @include('admin.layouts.navbar')
        <!-- partial -->


        <!-- page-content -->
        @yield('content')
        
        <!-- partial -->

        

        <!-- admin/layouts/footer -->
        @include('admin.layouts.footer')
        <!-- partial -->

    </div>
</div>

      <!-- admin/js/main_js -->
   @include('admin.js.main_js')
   <!-- partial -->

</body>
</html>
