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

   <title>SIPSUDOM | Surat Pengajuan</title>

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
    p[id='alasan']{
      color: red;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <!-- SWEETALERT KONFIRMASI HAPUS -->
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <div class="card">
      <div class="card-header">
       <h1>Data Surat Pengajuan</h1>
       <h3 class="card-title">Berikut merupakan data Surat Pengajuan Drop Out</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
      <?php if ($_SESSION['jabatan']=="Bagian Jurusan"){ ?>
        <a href="tambah.php" class="btn btn-success pull-right"><i class="fas fa-plus"></i><span>Tambah Data</span></a>
        <br>
      <?php }
      else{ 
        ?>
        <?php 
      } 
      ?>
      <br>
      <table id="example2" class="table table-striped table-bordered" style="width:100%;" >

        <thead>
          <tr>
            <th>
              <center>No</center>
            </th>

            <th>
              <center>ID Surat Pengajuan</center>
            </th>

            <th>
              <center>Nama Mahasiswa</center>
            </th>

            <th>
              <center>Jurusan</center>
            </th>

            <th>
              <center>Alasan</center>
            </th>

            <th>
              <center>Tanggal Pengajuan</center>
            </th>

            <th>
              <center>Status</center>
            </th>

            <th>
              <center>Aksi</center>
            </th>
          </tr>
        </thead>

        <tbody>
          <?php   
          $no=1;
          if ($_SESSION['jabatan']=="Bagian Jurusan") {
            $sqlGet = "SELECT * FROM v_sp";
            $query = mysqli_query($koneksi, $sqlGet);
          }else{
            $sqlGet = "SELECT * FROM v_sp where status=3 ";
            $query = mysqli_query($koneksi, $sqlGet);
          }


          while($data = mysqli_fetch_array($query)){

            if ($data['status'] == 0) {
              $status = 'Belum Diverifikasi';
              $warna = 'warning';
            }
            else if ($data['status'] == 1) {
              $status = 'Diverifikasi Ketua Jurusan';
              $warna = 'success';
            }else if ($data['status'] == 2) {
              $status = 'Menunggu Konfirmasi BAAK';
              $warna = 'warning';
            }
            else {
              $status = 'Pengajuan Diterima oleh BAAK';
              $warna = 'success';
            } 


            $t = substr($data['tgl_pengajuan'],0,4);
            $b = substr($data['tgl_pengajuan'],5,2);
            $h = substr($data['tgl_pengajuan'],8,2);

            if($b == "01"){
             $nm = "Januari";
           } elseif($b == "02"){
             $nm = "Februari";
           } elseif($b == "03"){
             $nm = "Maret";
           } elseif($b == "04"){
             $nm = "April";
           } elseif($b == "05"){
             $nm = "Mei";
           } elseif($b == "06"){
             $nm = "Juni";
           } elseif($b == "07"){
             $nm = "Juli";
           } elseif($b == "08"){
             $nm = "Agustus";
           } elseif($b == "09"){
             $nm = "September";
           } elseif($b == "10"){
             $nm = "Oktober";
           } elseif($b == "11"){
             $nm = "November";
           } elseif($b == "12"){
             $nm = "Desember";
           } 
           ?> 
           <tr>
            <td>
              <center><?= $no++?></center>
            </td>
            <td>
              <center><?php echo $data["id_sp"] ?></center>
            </td>
            <td>
              <center><?php echo $data["nama_mahasiswa"] ?></center>
            </td>
            <td>
              <center><?php echo $data["nama_jurusan"] ?></center>
            </td>
            <td>
              <center><?php echo $data["alasan"] ?></center>
            </td>
            <td>
              <center><?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></center>
            </td>
            <td>
              <center><span class="badge badge-<?php echo $warna ?>"><?php echo $status ?></span></center>
            </td>

            <td>

              <?php if ($_SESSION['jabatan']=="Bagian Jurusan"){ ?>

               <?php if ($data['status']=="0"){ ?>
                 <center>
                  <a href="form_edit.php?id_sp=<?php echo $data["id_sp"]; ?>" class="btn btn-primary">Edit</a>
                  <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sp"]; ?>" class="btn btn-warning" >Detail</a>
                  <a href="hapus.php?id_sp=<?php echo $data["id_sp"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
                </center>
              <?php }
              else{ 
                ?>
                <center> 
                  <a href="form_edit.php?id_sp=<?php echo $data["id_sp"]; ?>" class="btn btn-primary">Edit</a>
                  <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sp"]; ?>" class="btn btn-warning" >Detail</a>
                  <a href="hapus.php?id_sp=<?php echo $data["id_sp"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
                  <a href="../../sp.php?id_sp=<?php echo $data["id_sp"]; ?>" target="_blank" class="btn btn-success">Surat</a>
                </center>
                <?php 
              } 
              ?>
            <?php }
            elseif($_SESSION['jabatan']=="Bagian Akademik"){ 
              ?>
              <center>
                <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sp"]; ?>" class="btn btn-warning" >Detail</a>
                <a href="../../sp.php?id_sp=<?php echo $data["id_sp"]; ?>" target="_blank" class="btn btn-success">Surat</a>
              </center>
              <?php 
            }else{ 
              ?>
              <center>
                <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sp"]; ?>" class="btn btn-warning" >Detail</a>
              </center>

            <?php } ?>
            <!-- modal Detail -->
            <div class="modal fade" id="modal-detail<?php echo $data['id_sp']; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detail Data Surat Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="" action="" enctype="multipart/form-data">
                      <div class="form-group">
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Id</b> <a class="float-right"><?php echo $data['id_sp'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>No Surat Pengajuan</b> <a class="float-right"><?php echo $data['no_sp'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Nama Mahasiswa</b> <a class="float-right"><?php echo $data['nama_mahasiswa'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Jurusan</b> <a class="float-right"><?php echo $data['nama_jurusan'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Ketua / Koordinator Jurusan</b> <a class="float-right"><?php echo $data['nama_pegawai'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Program Studi</b> <a class="float-right"><?php echo $data['nama_prodi'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Alasan</b> <a class="float-right"><?php echo $data['alasan'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Tanggal Pengajuan</b> <a class="float-right"><?php echo $data['tgl_pengajuan'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Status</b> <span class="float-right badge badge-<?php echo $warna ?>"><?php echo $status ?></span>
                          </li>
                          <?php if($data['surat_pemanggilan_ortu']!='' and $data['berita_acara']==''){ ?>
                           <li class="list-group-item">
                            <b>No Surat Pemanggilan</b> <a class="float-right"><?php echo $data['no_surat_pemanggilan'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Surat Pemanggilan Orang Tua</b> <a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['surat_pemanggilan_ortu'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                          </li>
                        <?php }elseif($data['surat_pemanggilan_ortu']=='' and $data['berita_acara']!=''){ ?>
                          <li class="list-group-item">
                            <b>Berita Acara</b><a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['berita_acara'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                          </li>
                        <?php }else{ ?>
                          <li class="list-group-item">
                            <b>No Surat Pemanggilan</b> <a class="float-right"><?php echo $data['no_surat_pemanggilan'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Surat Pemanggilan Orang Tua</b> <a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['surat_pemanggilan_ortu'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                          </li>
                          <li class="list-group-item">
                            <b>Berita Acara</b><a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['berita_acara'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>

                  </div>

                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

        </td>
      </tr>

      <?php
    } 
    ?>
  </tbody>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.content-wrapper -->          

<?php
include '../../AdminLTE/footer.php';
?>               
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
  if (document.forms["add"]["id_jurusan"].value == "") {
    alert("Jurusan Harus Diisi");
    document.forms["add"]["id_jurusan"].focus();
    return false;
  }
  if (document.forms["add"]["id_prodi"].value == "") {
    alert("Program Studi Harus Diisi");
    document.forms["add"]["id_prodi"].focus();
    return false;
  }
  if (document.forms["add"]["npak"].value == "") {
    alert("Ketua / Kooordinator Jurusan Harus Diisi");
    document.forms["add"]["npak"].focus();
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
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
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







