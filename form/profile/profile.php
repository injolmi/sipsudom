 <?php
 include '../../config/koneksi.php';
 include "../../AdminLTE/sidebar.php";
 $npak = $_SESSION['npak'];
 $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE npak = $npak ");
 $data = mysqli_fetch_assoc($pegawai);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
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

  <title>SIPSUDOM | Profile</title>
</head>
<body>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="../foto_pegawai/<?php echo $data['foto_pegawai']; ?>"
                  alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Foto Profile</h3>

                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="../foto_pegawai/<?php echo $data['ttd_pegawai']; ?>"
                  alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Tanda Tangan</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <div class="w3-dropdown-hover">
                      <div class="w3-dropdown-content w3-bar-block w3-card-4"> 
                       <a data-toggle="modal" data-target="#modal-edit<?php echo $data["npak"]; ?>" class="btn btn-primary btn-block"> Ubah</a>

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
                              <form method="POST" action="edit_foto.php" enctype="multipart/form-data">

                                <div class="form-group" hidden="">
                                  <label>NPAK</label>
                                  <input type="text" name="npak" class="form-control" value="<?php echo $data['npak'];?>" readonly>
                                </div>
                                <div class="form-group" hidden="">
                                  <label>Nama Pegawai</label>
                                  <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $data['nama_pegawai'];?>" >
                                </div>

                                <div class="form-group" hidden="">
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

                                <div class="form-group" hidden="">
                                  <label>No Telepon</label>
                                  <input type="text" name="no_telepon"  class="form-control" value="<?php echo $data['no_telepon'];?>">
                                </div>

                                <div class="form-group" hidden="">
                                  <label>Username</label>
                                  <input type="text" name="username" id="username1"  class="form-control" value="<?php echo $data['username'] ?>">
                                </div>

                                <div class="form-group" hidden="">
                                  <label>Password</label>
                                  <input type="text" name="password" class="form-control" value="<?php echo $data['password'];?>">
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
                </div>

              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- About Me Box -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Data Diri Anda</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" action="edit_profile.php" method="post">
                  <div class="form-group row">
                    <label for="npak" class="col-sm-2 col-form-label">NPAK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="npak" placeholder="NPAK" value="<?php echo $data['npak']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_wa" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $data['nama_pegawai']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_wa" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="jabatan" placeholder="Jabatan" value="<?php echo $data['jabatan']; ?>" readonly >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_wa" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no_telepon" placeholder="No Telepon" value="<?php echo $data['no_telepon']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $data['username']; ?>" readonly>
                      <span id="pesan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="myInput" name="password" placeholder="Password" value="<?php echo $data['password']; ?>" >
                        <input type="checkbox" onclick="myFunction()">Show Password
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <input type="submit" name="edit" class="btn btn-primary">
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include "../../AdminLTE/footer.php"; ?>
</body>
<script>

  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../AdminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../AdminLTE/plugins/moment/moment.min.js"></script>
<script src="../../AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../AdminLTE/dist/js/pages/dashboard.js"></script>
</html>
