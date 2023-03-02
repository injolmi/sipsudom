<?php
include "../../config/koneksi.php";
include "../../AdminLTE/sidebar.php";
$no=1;
$pegawai = mysqli_query($koneksi,"SELECT * FROM pegawai ORDER BY $no ASC ");
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
  <title>SIPSUDOM | Pegawai</title>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <div class="card">
      <div class="card-header">
        <h1>Data Pegawai</h1>
        <h3 class="card-title">Berikut merupakan data Pegawai</h3>
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
                <center>NPAK/NIDN</center>
              </th>

              <th>
                <center>Nama Pegawai</center>
              </th>

              <th>
                <center>Jabatan</center>
              </th>

              <th>
                <center>No Telepon</center>
              </th>

              <th>
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($pegawai as $data ): ?> 

              <tr>
                <td>
                 <center><?php echo $no++;?></center>
               </td>
               <td>
                <center><?php echo $data["npak"] ?></center>
              </td>
              <td>
                <center><?php echo $data["nama_pegawai"] ?></center>
              </td>

              <td>
                <center><?php echo $data["jabatan"] ?></center>
              </td>

              <td>
                <center><?php echo $data["no_telepon"] ?></center>
              </td>

              <td>
                <center> 
                  <a data-toggle="modal" data-target="#modal-edit<?php echo $data["npak"]; ?>" class="btn btn-primary"> Edit</a>
                  <a data-toggle="modal" data-target="#modal-detail<?php echo $data["npak"]; ?>" class="btn btn-warning">Detail</a>
                  <a href="hapus.php?npak=<?php echo $data["npak"]; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data?');" class="btn btn-danger"> Hapus</a>
                </center>

                <!-- modal edit -->
                <div class="modal fade" id="modal-edit<?php echo $data['npak']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Data Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="edit.php" enctype="multipart/form-data">

                          <div class="form-group">
                            <label>NPAK/NIDN</label>
                            <input type="number" name="npak" class="form-control" value="<?php echo $data['npak'];?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $data['nama_pegawai'];?>" >
                          </div>

                          <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control">
                              <option value="<?php echo $data['jabatan'] ?>"><?php echo $data ['jabatan'] ?></option>
                              <option>Administrator</option>
                              <option>Direktur</option>
                              <option>Ketua Jurusan TI</option>
                              <option>Ketua Jurusan TM</option>
                              <option>Ketua Jurusan TE</option>
                              <option>Koordinator TL</option>
                              <option>Koordinator TPPL</option>
                              <option>Koordinator PPA</option>
                              <option>Bagian Jurusan</option>
                              <option>Bagian Akademik</option>
                              <option>Bagian Umum</option>
                              <option>Bagian Keuangan</option>
                            </select>                          
                          </div>

                          <div class="form-group">
                            <label>No Telepon</label>
                            <input type="number" name="no_telepon"  class="form-control" value="<?php echo $data['no_telepon'];?>">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"  class="form-control" value="<?php echo $data['email'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username1"  class="form-control" value="<?php echo $data['username'] ?>">
                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $data['password'];?>">
                          </div>

                          <div class="form-group">
                            <label>Foto Pegawai</label>
                            <input type="file" name="foto_pegawai"  class="form-control" value="<?php echo $data['foto_pegawai'];?>">
                            <p style="color: red;">*Extensi File Harus .pdf, .jpg*</p>
                          </div>

                          <div class="form-group">
                            <label>Tanda Tangan Pegawai</label>
                            <input type="file" name="ttd_pegawai" class="form-control" value="<?php echo $data['ttd_pegawai'];?>">
                            <p style="color: red;">*Extensi File Harus .pdf, .jpg*</p>
                          </div>

                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="edit_data" class="btn btn-primary" name="edit_data">Save changes</button>
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


              <!-- modal Detail -->
              <div class="modal fade" id="modal-detail<?php echo $data['npak']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Detail Data Pegawai</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>NPAK/NIDN</b> <a class="float-right"><?php echo $data['npak'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Nama Pegawai</b> <a class="float-right"><?php echo $data['nama_pegawai'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Jabatan</b> <a class="float-right"><?php echo $data['jabatan'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>No Telepon</b> <a class="float-right"><?php echo $data['no_telepon'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Email</b> <a class="float-right"><?php echo $data['email'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Username</b> <a class="float-right"><?php echo $data['username'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Password</b> <a class="float-right"><?php echo $data['password'] ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Foto Pegawai</b><a class="float-right"><img src="../foto_pegawai/<?php echo $data['foto_pegawai']; ?>" width="100px" height="100px"></a>
                            </li>
                            <li class="list-group-item">
                              <b>Tanda Tangan</b><a class="float-right"><img src="../ttd_pegawai/<?php echo $data['ttd_pegawai']; ?>" width="100px" height="100px"></a>
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

<!-- modal tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="add" method="post" action="add.php" enctype="multipart/form-data" onsubmit="return validateForm()">
          <!-- <div class="form-row"> -->
            <div class="form-group">
              <label>NPAK/NIDN</label>
              <input type="number" name="npak" id="npak" class="form-control" >
            </div>

            <div class="form-group">
             <label>Nama Pegawai</label>
             <input type="text" name="nama_pegawai" id="nama_pegawai"  class="form-control" > 
           </div>
           <div class="form-group">
            <label>Jabatan</label>
            <select name="jabatan" class="form-control">
              <option value="">--Jabatan--</option>
              <option>Administrator</option>
              <option>Direktur</option>
              <option>Ketua Jurusan TI</option>
              <option>Ketua Jurusan TM</option>
              <option>Ketua Jurusan TE</option>
              <option>Koordinator TL</option>
              <option>Koordinator TPPL</option>
              <option>Koordinator PPA</option>
              <option>Bagian Jurusan</option>
              <option>Bagian Akademik</option>
              <option>Bagian Umum</option>
              <option>Bagian Keuangan</option>
            </select>
          </div>


          <div class="form-group">
            <label>No Telepon</label>
            <input type="number" name="no_telepon"  id="no_telepon" class="form-control" >
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"  id="email" class="form-control" >
          </div>

          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username"  class="form-control" >
            <span id="pesan2">
            </div>

            <div class="form-group">
             <label>Password</label>
             <input type="password" name="password" id="pasword" class="form-control" >
           </div>

           <div class="form-group">
             <label>Foto Pegawai</label>
             <input type="file" name="foto_pegawai"  class="form-control" >
             <h6 style="color: red;">*Ukuran File Max 1 MB dan Extensi File Harus .png/.jpg*</h6>
           </div>


           <div class="form-group">
             <label>Tanda Tangan Pegawai</label>
             <input type="file" name="ttd_pegawai" class="form-control" >
             <h6 style="color: red;">*Ukuran File Max 1 MB dan Extensi File Harus .png/.jpg*</h6>
           </div>

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


<script>
  function validateForm() {
    if (document.forms["add"]["npak"].value == "") {
      alert("NPAK/NIP Tidak Boleh Kosong");
      document.forms["add"]["npak"].focus();
      return false;
    }
    if (document.forms["add"]["nama_pegawai"].value == "") {
      alert("Nama Pegawai Tidak Boleh Kosong");
      document.forms["add"]["nama_pegawai"].focus();
      return false;
    }
    if (document.forms["add"]["jabatan"].value == "") {
      alert("Jabatan Harus Diisi");
      document.forms["add"]["jabatan"].focus();
      return false;
    }
    if (document.forms["add"]["no_telepon"].value == "") {
      alert("No Telepon Harus Diisi");
      document.forms["add"]["no_telepon"].focus();
      return false;
    }

    if (document.forms["add"]["email"].value == "") {
      alert("Email Harus Diisi");
      document.forms["add"]["email"].focus();
      return false;
    }

    if (document.forms["add"]["password"].value == "") {
      alert("Password Harus Diisi");
      document.forms["add"]["password"].focus();
      return false;
    }
  }
</script>


</body>
<?php
include '../../AdminLTE/footer.php';
?>   

<script src="jquery.js"></script>
<script>
  $(document).ready(function() {
    $('#username').blur(function() {
      $('#pesan2').html('<img style="margin-left:10px; width:10px" src="loading.gif">');
      var username = $(this).val();

      $.ajax({
        type: 'POST',
        url: 'proses2.php',
        data: 'username=' + username,
        success: function(data) {
          $('#pesan2').html(data);
        }
      })

    });
  });
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