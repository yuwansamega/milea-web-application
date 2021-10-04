<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/admin/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/css/admin/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/admin/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/admin/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/admin/adminlte.css">
</head>
<body class="hold-transition sidebar-mini">
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

    <!-- Main content -->
    <x-admin-table>
      
    </x-admin-table>

  
  </div>


  <!-- Footer -->
    <x-admin-footer></x-admin-footer>
  <!-- /Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/js/admin/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/js/admin/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/js/admin/jquery.dataTables.min.js"></script>
<script src="/js/admin/dataTables.bootstrap4.min.js"></script>
<script src="/js/admin/dataTables.responsive.min.js"></script>
<script src="/js/admin/responsive.bootstrap4.min.js"></script>
<script src="/js/admin/dataTables.buttons.min.js"></script>
<script src="/js/admin/buttons.bootstrap4.min.js"></script>
<script src="/js/admin/jszip.min.js"></script>
<script src="/js/admin/pdfmake.min.js"></script>
<script src="/js/admin/vfs_fonts.js"></script>
<script src="/js/admin/buttons.html5.min.js"></script>
<script src="/js/admin/buttons.print.min.js"></script>
<script src="/js/admin/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/admin/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/admin/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
