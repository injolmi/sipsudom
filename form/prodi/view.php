  <?php
  $no=1;
  include "../../config/koneksi.php";
  include "../../AdminLTE/sidebar.php";
  include "../../config/koneksi.php";
  $prodi= mysqli_query($koneksi, " select * from prodi ");

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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <title>SIPSUDOM | Prodi</title>
  </head>

  <!-- SWEETALERT KONFIRMASI HAPUS -->
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('.alert_notif').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: "Data Anda Tidak Dapat Dikembalikan ..",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus Data ini!',
          cancelButtonText: 'Tidak..',
        }).then((result) => {
          if (result.isConfirmed) {

            window.location.href = getLink
          }
        })
        return false;
      });
    });
  </script>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <div class="card">
        <div class="card-header">
        	<h1>Data Prodi</h1>
          <h3 class="card-title">Berikut merupakan data program studi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a data-toggle="modal" data-target="#modal-tambah" class="btn btn-success pull-right"><i class="fas fa-plus"></i><span>Tambah Data</span></a>
          <br></br>

          <table id="example2" class="table table-striped table-bordered" style="width:100%;" >

            <thead>
              <tr>
                <th>
                  <center>No</center>
                </th>

                <th>
                  <center>ID Prodi</center>
                </th>

                <th>
                  <center>Nama Prodi</center>
                </th>

                <th>
                  <center>Aksi</center>
                </th>
              </tr>
            </thead>




            <tbody>

              <?php foreach ($prodi as $data ): ?> 

                <tr>
                  <td>
                   <center><?php echo $no++;?></center>
                 </td>
                 <td>
                  <center><?php echo $data["id_prodi"] ?></center>
                </td>
                <td>
                  <center><?php echo $data["nama_prodi"] ?></center>
                </td>

                <td>
                  <center> 
                    <a data-toggle="modal" data-target="#modal-edit<?php echo $data["id_prodi"]; ?>" class="btn btn-primary"> Edit</a>
                    <a href="hapus.php?id_prodi=<?php echo $data["id_prodi"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?');"> Hapus</a>
                  </center>
                  
                  <!-- modal edit -->
                  <div class="modal fade" id="modal-edit<?php echo $data['id_prodi']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Prodi</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="edit.php">
                            <div class="form-group">
                              <label>ID Prodi</label>
                              <input name="id_prodi" type="text" class="form-control" id="id_prodi" value="<?php echo $data['id_prodi']; ?>" readonly />
                            </div>

                            <div class="form-group">
                              <label>Prodi</label>
                              <input name="nama_prodi" type="text" class="form-control" id="nama_prodi" value="<?php echo $data['nama_prodi']; ?>" required />
                            </div>

                          </div>

                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="edit" id="edit" class="btn btn-primary" name="edit">Save changes</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>


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

<!-- modal tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data prodi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="add" method="post" action="add.php" onsubmit="return validateForm()">
          <!-- <div class="form-row"> -->
            <div class="form-group">
              <input name="id_prodi" type="text" class="form-control" id="id_prodi" hidden="hidden">
            </div>

            <div class="form-group">
              <label>Nama Prodi</label>
              <input name="nama_prodi" type="text" class="form-control" id="nama_prodi">
            </div>
            <!-- </div> -->

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="tambah" class="btn btn-primary" id="tambah" name="submit">Save changes</button>
            </div>

          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>
</div>
<!-- End Modal Tambah -->

</body>
<script>
  function validateForm() {
    if (document.forms["add"]["nama_prodi"].value == "") {
      alert("Nama Prodi Tidak Boleh Kosong");
      document.forms["add"]["nama_prodi"].focus();
      return false;
    }
  }
</script>

<script src="../../AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
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