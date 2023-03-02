  <?php
  include "../../config/koneksi.php";
  include "../../AdminLTE/sidebar.php";
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/summernote/summernote-bs4.min.css">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="../../AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

   <title>SIPSUDOM | Form Tambah Data Surat Keterangan</title>
   <style>
     div[id='tambah']{
      margin-left: 40px;
     }
   </style>
 </head>

 <body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <div class="card">
      <div class="card-header">
       <h1>Form Tambah Data Surat Keterangan</h1>
       <h3 class="card-title">Berikut merupakan Form Tambah data Surat Keterangan Drop Out</h3>
     </div>
     <!-- /.card-header -->
       <form name="add" method="post" action="add.php" onsubmit="return validateForm()">
        <!-- <div class="form-row"> -->
          <div id="tambah" class="card-body">
          <input type="text" name="id_sk" class="form-control" style="width: 700px;" hidden="hidden">

          <label>Id Surat Pengajuan</label>
          <select name="id_sp" id="id_sp" oninput="autofill()" class="form-control" style="width: 700px;">
            <option value="">--Id Surat Pengajuan--</option>
            <?php 
            $sql_nama = mysqli_query($koneksi, "SELECT * FROM v_sp where status='3' and status_mhs='2' ") or die (mysqli_error($koneksi));
            while ($data_nama = mysqli_fetch_array($sql_nama)) {
              echo '<option value ="'.$data_nama['id_sp'].'">'.$data_nama['id_sp'].'</option>';
            }
            ?>
          </select>

          <label>Nama Mahasiswa</label>
          <input type="text" name="npm" id="npm" readonly="" class="form-control" style="width: 700px;">

          <label>Program Studi</label>
          <input type="text" name="id_prodi" id="id_prodi" readonly="" class="form-control" style="width: 700px;">

          <input type="text" name="status"  hidden="hidden">

          <input type="date" name="no_sk"  class="form-control" hidden="hidden">

          <label>Tahun Akademik</label>
          <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control" style="width: 700px;">

          <label>Tanggal Surat Keterangan</label>
          <input type="date" name="tgl_sk" id="tgl_sk"  class="form-control" style="width: 700px;">

        </div>
        <div class="footer" style="margin-left: 560px">
          <a href="view.php" class="btn btn-primary">Kembali</a>
          <button type="tambah" class="btn btn-primary" id="tambah" name="submit">Save changes</button>
        </div>
      </form>
  </div>
</div>
</div>
<?php 
include "../../AdminLTE/footer.php";
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  function autofill(){
    var id_sp = $("#id_sp").val();
    $.ajax({
      url: 'ajax.php',
      data:"id_sp="+id_sp ,
    }).success(function (data) {
      var json = data,
      obj = JSON.parse(json);
      $('#npm').val(obj.npm);
      $('#id_prodi').val(obj.id_prodi);
    });
  }
</script>

</body>

<script>
  function validateForm() {
    if (document.forms["add"]["id_sp"].value == "") {
      alert("Id Surat Pengajuan Tidak Boleh Kosong");
      document.forms["add"]["id_sp"].focus();
      return false;
    }
    if (document.forms["add"]["tahun_akademik"].value == "") {
      alert("Tahun Akademik Harus Diisi");
      document.forms["add"]["tahun_akademik"].focus();
      return false;
    }
    if (document.forms["add"]["tgl_sk"].value == "") {
      alert("Tanggal Surat Keterangan Harus Diisi");
      document.forms["add"]["tgl_sk"].focus();
      return false;
    }
  }
</script>

<!-- jQuery -->

<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
<script src="../../AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>

</html>