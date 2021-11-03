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
<script src="/js/admin/modul-materi.js"></script>
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