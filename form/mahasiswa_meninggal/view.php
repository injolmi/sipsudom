<?php
include "../../config/koneksi.php";
$no=1;
$surat = mysqli_query($koneksi, " SELECT * FROM v_mm");
  ?>
  <?php
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
    <title>SIPSUDOM | Mahasiswa Meninggal</title>
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <div class="card">
        <div class="card-header">
        	<h1>Data Mahasiswa Meninggal</h1>
          <h3 class="card-title">Berikut merupakan data mahasiswa meninggal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php if ($_SESSION['jabatan']=="Bagian Akademik"){ ?>
            <a href="tambah.php" class="btn btn-success pull-right"><i class="fas fa-plus"></i><span>Tambah Data</span></a><br></br>
          <?php }
          else{ 
            ?>
            <?php 
          } 
          ?>
          
          <table id="example2" class="table table-striped table-bordered" style="width:100%;" >

            <thead>
              <tr>
                <th>
                  <center>No</center>
                </th>

                <th>
                  <center>ID</center>
                </th>

                <th>
                  <center>Nama Mahasiswa</center>
                </th>

                <th>
                  <center>Jurusan</center>
                </th>

                <th>
                  <center>Program Studi</center>
                </th>

                <th>
                  <center>Tanggal Pendataan</center>
                </th>

                <th>
                  <center>Akta Kematian</center>
                </th>
                <th>
                  <center>Aksi</center>
                </th>
              </tr>
              
            </thead>

            <tbody>
              <?php foreach ($surat as $data ): 
                $t = substr($data['tgl_pendataan'],0,4);
                $b = substr($data['tgl_pendataan'],5,2);
                $h = substr($data['tgl_pendataan'],8,2);

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
                  <center><?php echo $data["id"] ?></center>
                </td>
                <td>
                  <center><?php echo $data["nama_mahasiswa"] ?></center>
                </td>

                <td>
                  <center><?php echo $data["nama_jurusan"] ?></center>
                </td>

                <td>
                  <center><?php echo $data["nama_prodi"] ?></center>
                </td>

                <td>
                  <center><?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></center>
                </td>

                <td>
                  <center> <a target="_blank" href="../dokumen/<?php echo $data["akta_kematian"] ?>"><img src="../../pdf.png" width="100px" height="50px"></a> </center>
                </td>

                <td>
                  <?php if ($_SESSION['jabatan']=="Bagian Akademik"){ ?>
                    <center> 
                      <a href="form_edit.php?id=<?php echo $data["id"]; ?>" class="btn btn-primary">Edit</a>
                      <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id"]; ?>" class="btn btn-warning" >Detail</a>
                      <a href="hapus.php?id=<?php echo $data["id"]; ?>" class="btn btn-danger alert_notif" onclick="return confirm('Apakah anda yakin akan menghapus data?');" > Hapus</a>
                    </center>
                  <?php }
                  else{ 
                    ?>
                    <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id"]; ?>" class="btn btn-warning" >Detail</a>
                    <?php 
                  } 
                  ?>

                  <!-- modal Detail -->
                  <div class="modal fade" id="modal-detail<?php echo $data['id']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Data Mahasiswa Meninggal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="" action="" enctype="multipart/form-data">
                            <div class="form-group">
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b>Id</b> <a class="float-right"><?php echo $data['id'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>NPM</b> <a class="float-right"><?php echo $data['npm'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Nama Mahasiswa</b> <a class="float-right"><?php echo $data['nama_mahasiswa'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Jurusan</b> <a class="float-right"><?php echo $data['nama_jurusan'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Program Studi</b> <a class="float-right"><?php echo $data['nama_prodi'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Jenis Kelamin</b> <a class="float-right"><?php echo $data['jenis_kelamin'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Alamat</b> <a class="float-right"><?php echo $data['alamat'] ?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Tanggal Pencatatan</b> <a class="float-right"><?php echo $h." ". $nm. " ". $t ?></a>
                                </li>
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
              endforeach;
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
      if (document.forms["add"]["npm"].value == "") {
        alert("Nama Mahasiswa Tidak Boleh Kosong");
        document.forms["add"]["npm"].focus();
        return false;
      }
      if (document.forms["add"]["tgl_pendataan"].value == "") {
        alert("Tanggal Pendataan Harus Diisi");
        document.forms["add"]["tgl_pendataan"].focus();
        return false;
      }
      if (document.forms["add"]["akta_kematian"].value == "") {
        alert("Akta Kematian Tidak Boleh Kosong");
        document.forms["add"]["akta_kematian"].focus();
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
  </html>