<!-- jQuery -->
<script src="{{asset('public/backend-assets/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/backend-assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('public/backend-assets/assets/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/backend-assets/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/backend-assets/assets/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend-assets/assets/js/pages/dashboard3.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/backend-assets/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
<script>
    $(function () {
      $('.select2').select2()
    });
</script>
@toastr_js
@toastr_render