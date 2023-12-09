<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="../js/adminlte/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/adminlte/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../js/adminlte/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte/dist/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="../js/adminlte/datatables/jquery.dataTables.min.js"></script>
<script src="../js/adminlte/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../js/adminlte/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../js/adminlte/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../js/adminlte/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../js/adminlte/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../js/adminlte/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../js/adminlte/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../js/adminlte/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../js/adminlte/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
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
  $(function() {
    bsCustomFileInput.init();
  });
</script>
<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFEvent) {
      imgPreview.src = oFEvent.target.result;
    }
  }
</script>
</body>

</html>