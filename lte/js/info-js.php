
<!-- jQuery -->
<script src="lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="lte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="lte/plugins/moment/moment.min.js"></script>
<script src="lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="lte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="lte/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="lte/plugins/jszip/jszip.min.js"></script>
<script src="lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(document).ready(function () {
    $("#tab_basic").DataTable({
      "scrollY": 200,
      "scrollX": true
    }).buttons().container().appendTo('#tab_basic_wrapper .col-md-6:eq(0)');

  });
</script>
<script>
  $(document).ready(function () {
    $("#tab_full").DataTable({
      "scrollY": 200,
      "scrollX": true,
      
      "buttons": [
        {
            extend: 'pdf',
            text: 'Pdf',
            title: '<center>Data Anggota DPRD</center>',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
        {
            extend: 'excel',
            text: 'Excel',
            title: 'Data Anggota DPRD',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
        {
            extend: 'copy',
            text: 'Copy',
            title: 'Data Anggota DPRD',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
        {

            extend: 'print',
            text: 'Print',
            title: 'Data Anggota DPRD',
            autoPrint: true
          
        }]
    }).buttons().container().appendTo('#tab_full_wrapper .col-md-6:eq(0)');

    $("#tab_full_detail").DataTable({
  
      "buttons": [
        {
            extend: 'pdf',
            text: 'Pdf',
            title: '<center>Data Rincian Belanja Sub Kegiatan</center>',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
        {
            extend: 'excel',
            text: 'Excel',
            title: 'Data Rincian Belanja Sub Kegiatan',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
        {
            extend: 'copy',
            text: 'Copy',
            title: 'Data Rincian Belanja Sub Kegiatan',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
        {

            extend: 'print',
            text: 'Print',
            title: 'Data Rincian Belanja Sub Kegiatan',
            autoPrint: true
          
        }]
    }).buttons().container().appendTo('#tab_full_detail_wrapper .col-md-6:eq(0)');

  });
</script>