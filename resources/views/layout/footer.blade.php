<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="https://adminlte.io">Minidev.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
<!-- Tempusdominus Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- jQuery -->
<script src="{{ asset('template_admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template_admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('template_admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('template_admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('template_admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('template_admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template_admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('template_admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('template_admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template_admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template_admin/dist/js/demo.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('template_admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('template_admin/plugins/toastr/toastr.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('template_admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template_admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('template_admin/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["colvis"]
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
@stack('custom-script')

</html>
