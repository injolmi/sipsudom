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

   <title>SIPSUDOM | Form Tambah Data Surat Pengajuan</title>
   <style>
    p[id='no_surat_pemanggilan']{
      color: red;
    }
    p[id='surat_pemanggilan_ortu']{
      color: red;
    }
    p[id='berita_acara']{
      color: red;
    }
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
       <h1>Data Surat Pengajuan</h1>
       <h3 class="card-title">Berikut merupakan data Surat Pengajuan Drop Out</h3>
     </div>
     <!-- /.card-header -->
     <form name="add" method="post" action="add.php" enctype="multipart/form-data" onsubmit="return validateForm()">
      <!-- <div class="form-row"> -->
        <input type="text" name="id_sp" class="form-control" hidden="hidden">

        <div id="tambah" class="card-body" align="">
          <label>Nomor Surat Pengajuan</label>
          <input type="text" name="no_sp" id="no_sp"  class="form-control" style="width: 700px;">

          <label>Nama Mahasiswa</label>
          <select name="npm" id="npm" oninput="autofill()" class="form-control" style="width: 700px;">
            <option value="">--Nama Mahasiswa--</option>
            <?php 
            $sql_nama = mysqli_query($koneksi, "SELECT * FROM mahasiswa where status_mhs='0' ") or die (mysqli_error($koneksi));
            while ($data_nama = mysqli_fetch_array($sql_nama)) {
              echo '<option value ="'.$data_nama['npm'].'">'.$data_nama['nama_mahasiswa'].'</option>';
            }
            ?>
          </select>

          <label>Jurusan</label>
          <input type="text" name="id_jurusan" id="id_jurusan"  readonly="" style="width: 700px;" class="form-control">

          <label>Ketua / Koorinator Jurusan</label>
          <input type="text" name="npak" id="npak" readonly="" style="width: 700px;"  class="form-control">

          <label>Program Studi</label>
          <input type="text" name="id_prodi" id="id_prodi"  readonly="" style="width: 700px;" class="form-control">

          <label>Alasan</label>
          <input type="text" name="alasan" id="alasan" class="form-control" style="width: 700px;">

          <label>No Surat Pemanggilan Orang Tua</label>
          <input type="text" name="no_surat_pemanggilan" id="no_surat_pemanggilan" class="form-control" style="width: 700px;">

          <label>Tanggal Pengajuan</label>
          <input type="date" name="tgl_pengajuan" id="tgl_pengajuan" class="form-control" style="width: 700px;">

          <input type="text" name="status"  hidden="hidden" class="form-control">

          <label>Surat Pemanggilan Orang Tua</label>
          <input type="file" name="surat_pemanggilan_ortu" class="form-control" value="" style="width: 700px;">
          <h7 style="color: red;">*Extensi File Harus .pdf*</h7>
          <p id="surat_pemanggilan_ortu">*Diisi jika dilakukan pemanggilan orang tua mahasiswa*</p>

          <label>Berita Acara</label>
          <input type="file" name="berita_acara" class="form-control" value="" style="width: 700px;">
          <h7 style="color: red;">*Extensi File Harus .pdf*</h7>
          <p id="berita_acara">*Diisi jika dilakukan rapat yudisium*</p>

        </div>
        <div class="footer" style="margin-left: 610px">
          <a href="view.php" class="btn btn-primary">Kembali</a>
          <button type="tambah" class="btn btn-primary" id="tambah" name="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<?php 
include "../../AdminLTE/footer.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  function autofill(){
    var npm = $("#npm").val();
    $.ajax({
      url: 'ajax.php',
      data:"npm="+npm ,
    }).success(function (data) {
      var json = data,
      obj = JSON.parse(json);
      $('#id_jurusan').val(obj.id_jurusan);
      $('#npak').val(obj.npak);
      $('#id_prodi').val(obj.id_prodi);
    });
  }
</script>

</body>


<script>
  function validateForm() {
    if (document.forms["add"]["no_sp"].value == "") {
      alert("Nomor Surat Pengajuan Harus Diisi");
      document.forms["add"]["no_sp"].focus();
      return false;
    }
    if (document.forms["add"]["npm"].value == "") {
      alert("Nama Mahasiswa Tidak Boleh Kosong");
      document.forms["add"]["npm"].focus();
      return false;
    }
    if (document.forms["add"]["alasan"].value == "") {
      alert("Alasan Harus Diisi");
      document.forms["add"]["alasan"].focus();
      return false;
    }
    if (document.forms["add"]["tgl_pengajuan"].value == "") {
      alert("Tanggal Pengajuan Harus Diisi");
      document.forms["add"]["tgl_pengajuan"].focus();
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