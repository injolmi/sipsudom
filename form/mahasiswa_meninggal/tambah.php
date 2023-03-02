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

   <title>SIPSUDOM | Form Tambah Data Mahasiswa Meninggal</title>
   <style>
     div[id='tambah']{
      margin-left: 40;
     }
   </style>
 </head>

 <body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <div class="card">
      <div class="card-header">
       <h1>Form Tambah Data Mahasiswa Meninggal</h1>
       <h3 class="card-title">Berikut merupakan Form Tambah Data Mahasiswa Meninggal</h3>
     </div>
     <!-- /.card-header -->
     
      <form name="add" method="post" action="add.php" enctype="multipart/form-data" onsubmit="return validateForm()">
        <!-- <div class="form-row"> -->
          <div id="tambah" class="card-body">
          
            <input name="id" type="text" class="form-control" style="width: 700px" hidden="hidden">
          
            <label>Nama Mahasiswa</label>
            <select name="npm" id="npm" oninput="autofill()" class="form-control" style="width: 700px">
              <option value="">--Nama Mahasiswa--</option>
              <?php 
              $sql_nama = mysqli_query($koneksi, "SELECT * FROM mahasiswa where status_mhs='0'") or die (mysqli_error($koneksi));
              while ($data_nama = mysqli_fetch_array($sql_nama)) {
                echo '<option value ="'.$data_nama['npm'].'">'.$data_nama['nama_mahasiswa'].'</option>';
              }
              ?>
            </select>
          
            <label>Jurusan</label>
            <input  name="id_jurusan" type="text" readonly="" id="id_jurusan" style="width: 700px" class="form-control">
          
            <label>Program Studi</label>
            <input  name="id_prodi" type="text" readonly="" id="id_prodi" style="width: 700px" class="form-control">
          
            <label>Tanggal Pendataan</label>
            <input  name="tgl_pendataan" type="date" id="tgl_pendataan" style="width: 700px" class="form-control">
          
            <label>Akta Kematian</label>
            <input  name="akta_kematian" type="file" id="akta_kematian" style="width: 700px" class="form-control">
            <p style="color: red;">*Extensi File Harus .pdf*</p>
          </div>
          <!-- </div> -->

          <div class="footer" style="margin-left: 570px">
            <a href="view.php" class="btn btn-primary">Kembali</a>
            <button type="tambah" class="btn btn-primary" id="tambah" name="submit">Save changes</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<?php 
include "../../AdminLTE/footer.php";
?>

</body>

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
      $('#id_prodi').val(obj.id_prodi);
    });
  }
</script>


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