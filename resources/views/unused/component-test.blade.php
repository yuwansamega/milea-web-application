<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/admin/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/css/admin/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/css/admin/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/css/admin/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/admin/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/css/admin/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/css/admin/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/css/admin/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <x-admin-navbar>
    {{-- <x-slot name="title"></x-slot> --}}
  </x-adminNavbar>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <x-admin-side-bar>
    {{-- <x-slot name="brand"></x-slot> --}}
    {{-- <x-slot name="adminName"></x-slot> --}}
  </x-admin-side-bar>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <x-content-header>
      {{-- <x-slot name="title"></x-slot> --}}
      {{-- <x-slot name="homeBreadcrumb"></x-slot> --}}
      {{-- <x-slot name="breadCrumb"></x-slot> --}}
      </x-content-header>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer -->
    <x-admin-footer></x-admin-footer>
  <!-- /Footer -->

</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="/js/admin/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/js/admin/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/admin/adminlte.min.js"></script>
</body>
</html>
