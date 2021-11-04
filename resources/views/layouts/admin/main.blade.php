<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>{{ $title }}</title>

  @yield('head')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @yield('navbar')

  @yield('content')
  
  @yield('footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('script')
@include('sweetalert::alert')
</body>
</html>
