  <?php
  include "../../config/koneksi.php";
  include "../../AdminLTE/sidebar.php";
  $no=1;
  $mahasiswa = mysqli_query($koneksi,"SELECT * FROM v_mahasiswa ");
  
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

    <title>SIPSUDOM | Mahasiswa</title>
    <style>
      p[name="status_mhs"]{
        color: red;
        font-size: 13px;
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
        	<h1>Data Mahasiswa</h1>
          <h3 class="card-title">Berikut merupakan data mahasiswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php if ($_SESSION['jabatan']=="Administrator"){ ?>
            <a data-toggle="modal" data-target="#modal-tambah" class="btn btn-success pull-right"><i class="fas fa-plus"></i><span>Tambah Data</span></a>
            <br></br>
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

                  <th>
                    <center>Aksi</center>
                  </th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($mahasiswa as $data ): 
                  if ($data['status_mhs'] == 0) {
                    $status_mhs = 'Mahasiswa Aktif';
                    $warna = 'success';
                  }else if ($data['status_mhs'] == 1){
                    $status_mhs = 'Mahasiswa Meninggal';
                    $warna = 'secondary';
                  }else if ($data['status_mhs'] == 2){
                    $status_mhs = 'Diajukan Drop Out';
                    $warna = 'warning';
                  }
                  else {
                    $status_mhs = 'Mahasiswa Drop Out';
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
                      <center> <span class="badge badge-<?php echo $warna ?>"><?php echo $status_mhs ?></span></center>
                    </td>

                    <td>  
                      <center> 
                        <a data-toggle="modal" data-target="#modal-edit<?php echo $data["npm"]; ?>" class="btn btn-primary" > Edit</a>
                        <a href="hapus.php?npm=<?php echo $data["npm"]; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data?');" class="btn btn-danger" > Hapus</a>
                      </center>

                      <!-- modal edit -->
                      <div class="modal fade" id="modal-edit<?php echo $data['npm']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Data Mahasiswa</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="edit.php" enctype="multipart/form-data">

                                <div class="form-group">
                                  <label>NPM</label>
                                  <input type="number" name="npm" class="form-control" value="<?php echo $data['npm'];?>" readonly>
                                </div>
                                <div class="form-group">
                                  <label>Nama Mahasiswa</label>
                                  <input type="text" name="nama_mahasiswa" class="form-control" value="<?php echo $data['nama_mahasiswa'];?>" >
                                </div>

                                <div class="form-group">
                                  <label>Program Studi</label>
                                  <select name="id_prodi" id="id_prodi" class="form-control" >
                                    <option value="<?php echo $data['id_prodi'] ?>"><?php echo $data ['nama_prodi']; ?></option>
                                    <?php 
                                    $sql_nama = mysqli_query($koneksi, "SELECT * FROM prodi") or die (mysqli_error($koneksi));
                                    while ($data_nama = mysqli_fetch_array($sql_nama)) {
                                      echo '<option value ="'.$data_nama['id_prodi'].'">'.$data_nama['nama_prodi'].'</option>';
                                    }
                                    ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Jurusan</label>
                                  <select name="id_jurusan" id="id_jurusan" class="form-control" >
                                    <option value="<?php echo $data ['id_jurusan'] ?>"><?php echo $data['nama_jurusan'] ?></option>
                                    <?php 
                                    $sql_nama = mysqli_query($koneksi, "SELECT * FROM jurusan") or die (mysqli_error($koneksi));
                                    while ($data_nama = mysqli_fetch_array($sql_nama)) {
                                      echo '<option value ="'.$data_nama['id_jurusan'].'">'.$data_nama['nama_jurusan'].'</option>';
                                    }
                                    ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Alamat</label>
                                  <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'];?>">
                                </div>

                                <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select name="jenis_kelamin" class="form-control">
                                    <option value="<?php echo $data['jenis_kelamin'] ?>"><?php echo $data['jenis_kelamin'] ?></option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                  </select>
                                </div>


                                <div class="form-group">
                                  <label>Kelas</label>
                                  <select name="kelas" class="form-control">
                                    <option value="<?php echo $data['kelas'] ?>"><?php echo $data['kelas'] ?></option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label>Semester</label>
                                  <input type="text" name="semester" class="form-control" value="<?php echo $data['semester'];?>">
                                </div>

                                <div class="form-group">
                                  <label>No Telepon</label>
                                  <input type="text" name="no_telepon" class="form-control" value="<?php echo $data['no_telepon'];?>">
                                </div>

                                <input type="text" name="status_mhs" hidden="" value="<?php echo $data['status_mhs'] ?>">

                              </select>

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

                </td>
              </tr>

              <?php
            endforeach; 
            ?>
          </tbody>
        </table>
      <?php } ?>
      <?php if ($_SESSION['jabatan']!="Administrator"){ ?>
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
            <?php 
            $mahasiswa = mysqli_query($koneksi,"SELECT * FROM v_mahasiswa where status_mhs='1' or status_mhs='3' ");
            foreach ($mahasiswa as $data ): 
              if ($data['status_mhs'] == 0) {
                $status_mhs = 'Mahasiswa Aktif';
                $warna = 'success';
              }else if ($data['status_mhs'] == 1){
                $status_mhs = 'Mahasiswa Meninggal';
                $warna = 'secondary';
              }else if ($data['status_mhs'] == 2){
                $status_mhs = 'Diajukan Drop Out';
                $warna = 'warning';
              }
              else {
                $status_mhs = 'Mahasiswa Drop Out';
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
                  <center> <span class="badge badge-<?php echo $warna ?>"><?php echo $status_mhs ?></span></center>
                </td>
              </tr>

              <?php
            endforeach; 
            ?>
          </tbody>
        </table>
      <?php } ?>


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
        <h4 class="modal-title">Tambah Data Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="add" method="post" action="add.php" onsubmit="return validateForm()">
          <!-- <div class="form-row"> -->

            <label>NPM</label>
            <input type="number" name="npm" id="npm" class="form-control" >

            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa"  class="form-control" >

            <label>Program Studi</label>
            <select name="id_prodi" id="id_prodi" class="form-control" >
              <option value="">--Program Studi--</option>
              <?php 
              $sql_nama = mysqli_query($koneksi, "SELECT * FROM prodi") or die (mysqli_error($koneksi));
              while ($data_nama = mysqli_fetch_array($sql_nama)) {
                echo '<option value ="'.$data_nama['id_prodi'].'">'.$data_nama['nama_prodi'].'</option>';
              }
              ?>
            </select>

            <label>Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control" >
              <option value="">--Jurusan--</option>
              <?php 
              $sql_nama = mysqli_query($koneksi, "SELECT * FROM jurusan") or die (mysqli_error($koneksi));
              while ($data_nama = mysqli_fetch_array($sql_nama)) {
                echo '<option value ="'.$data_nama['id_jurusan'].'">'.$data_nama['nama_jurusan'].'</option>';
              }
              ?>
            </select>

            <label>Alamat</label>
            <input type="text" name="alamat"  class="form-control" >

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
              <option value="">--Jenis Kelamin--</option>
              <option>Laki-Laki</option>
              <option>Perempuan</option>
            </select>

            <label>Kelas</label>
            <select name="kelas" class="form-control">
              <option value="">--Kelas--</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
            </select>

            <label>Semester</label>
            <input type="number" name="semester"  class="form-control" >

            <label>No Telepon</label>
            <input type="number" name="no_telepon"  class="form-control" >

            <input type="text" name="status_mhs" hidden="">

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
</body>


<script>
  function validateForm() {
    if (document.forms["add"]["npm"].value == "") {
      alert("NPM Tidak Boleh Kosong");
      document.forms["add"]["npm"].focus();
      return false;
    }
    if (document.forms["add"]["nama_mahasiswa"].value == "") {
      alert("Nama Tidak Boleh Kosong");
      document.forms["add"]["nama_mahasiswa"].focus();
      return false;
    }
    if (document.forms["add"]["id_prodi"].value == "") {
      alert("Prodi Harus Diisi");
      document.forms["add"]["id_prodi"].focus();
      return false;
    }
    if (document.forms["add"]["id_jurusan"].value == "") {
      alert("Jurusan Harus Diisi");
      document.forms["add"]["id_jurusan"].focus();
      return false;
    }
    if (document.forms["add"]["alamat"].value == "") {
      alert("Alamat Tidak Boleh Kosong");
      document.forms["add"]["alamat"].focus();
      return false;
    }

    if (document.forms["add"]["jenis_kelamin"].value == "") {
      alert("Jenis Kelamin Harus Diisi");
      document.forms["add"]["jenis_kelamin"].focus();
      return false;
    }


    if (document.forms["add"]["kelas"].value == "") {
      alert("Kelas Tidak Boleh Kosong");
      document.forms["add"]["kelas"].focus();
      return false;
    }
    if (document.forms["add"]["semester"].value == "") {
      alert("Semester Tidak Boleh Kosong");
      document.forms["add"]["semester"].focus();
      return false;
    }
    if (document.forms["add"]["no_telepon"].value == "") {
      alert("No Telepon Harus Diisi");
      document.forms["add"]["no_telepon"].focus();
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







