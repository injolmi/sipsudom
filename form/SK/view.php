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

    <title>SIPSUDOM | Surat Keterangan</title>
  </head>

  <body class="hold-transition sidebar-mini">
    <!-- SWEETALERT KONFIRMASI HAPUS -->
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <div class="card">
        <div class="card-header">
         <h1>Data Surat Keterangan</h1>
         <h3 class="card-title">Berikut merupakan data Surat Keterangan Drop Out</h3>
       </div>
       <!-- /.card-header -->
       <div class="card-body">
        <?php if ($_SESSION['jabatan']=="Bagian Akademik"){ ?>
          <a href="tambah.php" class="btn btn-success pull-right"><i class="fas fa-plus"></i><span>Tambah Data</span></a>
          <br></br>
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
                <center>ID Surat Keterangan</center>
              </th>

              <th>
                <center>ID Surat Pengajuan</center>
              </th>

              <th>
                <center>Nama Mahasiswa</center>
              </th>

              <th>
                <center>Program Studi</center>
              </th>

              <th>
                <center>Status</center>
              </th>

              <th>
                <center>Tanggal Surat Keterangan</center>
              </th>

              <th>
                <center>Aksi</center>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php if ($_SESSION['jabatan']=="Bagian Akademik") {
              $sqlGet = "SELECT * FROM v_sk";
              $query = mysqli_query($koneksi, $sqlGet);
            }elseif($_SESSION['jabatan']=="Ketua Jurusan TI"){   

              $sqlGet = "SELECT * FROM v_sk where status='1' and id_prodi='1' and no_sk!='' ";
              $query = mysqli_query($koneksi, $sqlGet);
            }elseif($_SESSION['jabatan']=="Ketua Jurusan TE"){   

              $sqlGet = "SELECT * FROM v_sk where status='1' and id_prodi='5' and no_sk!='' ";
              $query = mysqli_query($koneksi, $sqlGet);
            }elseif($_SESSION['jabatan']=="Ketua Jurusan TM"){   

              $sqlGet = "SELECT * FROM v_sk where status='1' and id_prodi='4' and no_sk!='' ";
              $query = mysqli_query($koneksi, $sqlGet);
            }elseif($_SESSION['jabatan']=="Koordinator TL"){   

              $sqlGet = "SELECT * FROM v_sk where status='1' and id_prodi='6' and no_sk!='' ";
              $query = mysqli_query($koneksi, $sqlGet);
            }elseif($_SESSION['jabatan']=="Koordinator TPPL"){   

              $sqlGet = "SELECT * FROM v_sk where status='1' and id_prodi='7' and no_sk!='' ";
              $query = mysqli_query($koneksi, $sqlGet);
            }elseif($_SESSION['jabatan']=="Koordinator PPA"){   

              $sqlGet = "SELECT * FROM v_sk where status='1' and id_prodi='8' and no_sk!='' ";
              $query = mysqli_query($koneksi, $sqlGet);
            }else{   

              $sqlGet = "SELECT * FROM v_sk where status='1'";
              $query = mysqli_query($koneksi, $sqlGet);
            }
            $no=1;
            while($data = mysqli_fetch_array($query)){

              if ($data['status'] == 0) {
                $status = 'Belum Diverifikasi';
                $warna = 'warning';
              }
              else if ($data['status'] == 1) {
                $status = 'Diverifikasi Oleh Direktur';
                $warna = 'success';
              }


              $t = substr($data['tgl_sk'],0,4);
              $b = substr($data['tgl_sk'],5,2);
              $h = substr($data['tgl_sk'],8,2);

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
                <center><?php echo $data["id_sk"] ?></center>
              </td>
              <td>
                <center><?php echo $data["id_sp"] ?></center>
              </td>
              <td>
                <center><?php echo $data["nama_mahasiswa"] ?></center>
              </td>
              <td>
                <center><?php echo $data["nama_prodi"] ?></center>
              </td>
              <td>
                <center><span class="badge badge-<?php echo $warna ?>"><?php echo $status ?></span></center>
              </td>
              <td>
                <center><?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></center>
              </td>

              <td>
                <?php if ($_SESSION['jabatan']=="Bagian Akademik"){ ?>

                 <?php if ($data['status']=="1" and $data['no_sk']!=''){ ?>
                  <center> 
                    <a href="form_edit.php?id_sk=<?php echo $data["id_sk"]; ?>" class="btn btn-primary">Edit</a>
                    <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sk"]; ?>" class="btn btn-warning" >Detail</a>
                    <a href="hapus.php?id_sk=<?php echo $data["id_sk"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
                    <a href="../../sk.php?id_sk=<?php echo $data["id_sk"]; ?>" target="_blank" class="btn btn-success">Surat</a>
                  </center>
                <?php }
                else{ 
                  ?>
                  <center>
                    <a href="form_edit.php?id_sk=<?php echo $data["id_sk"]; ?>" class="btn btn-primary">Edit</a>
                    <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sk"]; ?>" class="btn btn-warning" >Detail</a>
                    <a href="hapus.php?id_sk=<?php echo $data["id_sk"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?');">Hapus</a>
                  </center>
                  <?php 
                } 
                ?>
              <?php }
              else{ 
                ?>
                <center>
                  <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sk"]; ?>" class="btn btn-warning" >Detail</a>
                </center>
                <?php 
              }
              ?>
              <!-- modal Detail -->
              <div class="modal fade" id="modal-detail<?php echo $data['id_sk']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Detail Data Surat Keterangan Drop Out</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="" action="">
                        <div class="form-group">
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Id Surat Keterangan</b> <a class="float-right"><?php echo $data['id_sk'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Id Surat Pengajuan</b> <a class="float-right"><?php echo $data['id_sp'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Nama Mahasiswa</b> <a class="float-right"><?php echo $data['nama_mahasiswa'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Program Studi</b> <a class="float-right"><?php echo $data['nama_prodi'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>status</b> <a class="float-right"><?php echo $status ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>No Surat Keterangan</b> <a class="float-right"><?php echo $data['no_sk'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Tahun Akademik</b> <a class="float-right"><?php echo $data['tahun_akademik'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Tanggal Surat Keterangan</b> <a class="float-right"><?php echo $h." ". $nm. " ". $t ?></a>
                            </li>
                          </ul>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </div>

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
    if (document.forms["add"]["id_sp"].value == "") {
      alert("Id Surat Pengajuan Harus Diisi");
      document.forms["add"]["id_sp"].focus();
      return false;
    }
    if (document.forms["add"]["npm"].value == "") {
      alert("Nama Mahasiswa Harus Diisi");
      document.forms["add"]["npm"].focus();
      return false;
    }
    if (document.forms["add"]["id_prodi"].value == "") {
      alert("Program Studi Harus Diisi");
      document.forms["add"]["id_prodi"].focus();
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







