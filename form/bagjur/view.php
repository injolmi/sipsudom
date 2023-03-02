  <?php
  include "../../config/koneksi.php";
  include "../../AdminLTE/sidebar.php";
  $no=1;
  $mahasiswa = mysqli_query($koneksi,"SELECT * FROM v_mahasiswa where status='0' ");

  
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

    <title>SIPSUDOM | DATA MAHASISWA DROP OUT</title>
  </head>

  <body class="hold-transition sidebar-mini">
    <!-- SWEETALERT KONFIRMASI HAPUS -->
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <div class="card">
        <div class="card-header">
          <h1>Data Mahasiswa</h1>
          <h3 class="card-title">Berikut merupakan data mahasiswa drop out</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example" class="table table-striped table-bordered" style="width:100%;" >

            <thead>
              <tr>
                <th>
                  <center>No</center>
                </th>

                <th>
                  <center>NPM</center>
                </th>

                <th>
                  <center>Nama Mahasiswa</center>
                </th>

                <th>
                  <center>Program Studi</center>
                </th>

                <th>
                  <center>Jurusan</center>
                </th>

                <th>
                  <center>Alamat</center>
                </th>

                <th>
                  <center>Jenis Kelamin</center>
                </th>

                <th>
                  <center>Kelas</center>
                </th>

                <th>
                  <center>Semester</center>
                </th>

                <th>
                  <center>No Telepon</center>
                </th>

                <th>
                  <center>Status</center>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($mahasiswa as $data ): 
                if ($data['status'] == 1) {
                  $status = 'Aktif';
                  $warna = 'success';
                }else if ($data['status'] == 2){
                  $status = 'Mahasiswa Meninggal';
                  $warna = 'warning';
                }
                else {
                  $status = 'Mahasiswa Drop Out';
                  $warna = 'danger';
                }
                ?> 
                <tr>
                  <td>
                    <center><?= $no++?></center>
                  </td>
                  <td>
                    <center><?php echo $data["npm"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["nama_mahasiswa"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["nama_prodi"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["nama_jurusan"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["alamat"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["jenis_kelamin"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["kelas"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["semester"] ?></center>
                  </td>
                  <td>
                    <center><?php echo $data["no_telepon"] ?></center>
                  </td>
                  <td>
                    <center> <span class="badge badge-<?php echo $warna ?>"><?php echo $status ?></span></center>
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <script src="../../AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>

  </html>







