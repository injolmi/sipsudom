<?php
include "../../config/koneksi.php" ;
include "../../AdminLTE/sidebar.php" ;

$prodi = mysqli_query($koneksi,"SELECT * from prodi");
$prod = mysqli_num_rows($prodi);
$mahasiswa = mysqli_query($koneksi,"SELECT * from mahasiswa");
$mhs = mysqli_num_rows($mahasiswa);
$pegawai = mysqli_query($koneksi,"SELECT * from pegawai");
$peg = mysqli_num_rows($pegawai);
$jurusan = mysqli_query($koneksi,"SELECT * from jurusan");
$jur = mysqli_num_rows($jurusan);
$sp = mysqli_query($koneksi,"SELECT * from surat_pengajuan");
$peng = mysqli_num_rows($sp);
$sk =mysqli_query($koneksi,"SELECT * from surat_keterangan");
$ket = mysqli_num_rows($sk); 
$meninggal = mysqli_query($koneksi,"SELECT * from mahasiswa_meninggal");
$men = mysqli_num_rows($meninggal);

$mahasiswa_meninggal = mysqli_query($koneksi,"SELECT * from mahasiswa where status_mhs='1' or status_mhs='3'   ");
$mm = mysqli_num_rows($mahasiswa_meninggal);


$te = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='0' and id_jurusan='7' ");
$pengte = mysqli_num_rows($te);

$ti = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='0' and id_jurusan='5' ");
$pengti = mysqli_num_rows($ti);

$tm = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='0' and id_jurusan='8' ");
$pengtm = mysqli_num_rows($tm);

$tl = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='0' and id_jurusan='9' ");
$pengtl = mysqli_num_rows($tl);

$tppl = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='0' and id_jurusan='10' ");
$pengtppl = mysqli_num_rows($tppl);

$ppa = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='0' and id_jurusan='11' ");
$pengppa = mysqli_num_rows($ppa);



$te1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' and id_jurusan='7' ");
$pengte1 = mysqli_num_rows($te1);

$ti1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' and id_jurusan='5' ");
$pengti1 = mysqli_num_rows($ti1);

$tm1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' and id_jurusan='8' ");
$pengtm1 = mysqli_num_rows($tm1);

$tl1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' and id_jurusan='9' ");
$pengtl1 = mysqli_num_rows($tl1);

$tppl1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' and id_jurusan='10' ");
$pengtppl1 = mysqli_num_rows($tppl1);

$ppa1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' and id_jurusan='11' ");
$pengppa1 = mysqli_num_rows($ppa1);


$sp1 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='1'");
$peng1 = mysqli_num_rows($sp1);

$sp2 = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='2'");
$peng2 = mysqli_num_rows($sp2);

$spjadi = mysqli_query($koneksi,"SELECT * from surat_pengajuan where status='3' ");
$spj = mysqli_num_rows($spjadi);

$sk_dir =mysqli_query($koneksi,"SELECT * from surat_keterangan where status='0' ");
$direktur = mysqli_num_rows($sk_dir);

$skjadi =mysqli_query($koneksi,"SELECT * from surat_keterangan where status='1' ");
$skj = mysqli_num_rows($skjadi);

$nomor =mysqli_query($koneksi,"SELECT * from surat_keterangan where status='1' and no_sk='' ");
$no = mysqli_num_rows($nomor);


?> 
<!DOCTYPE html>
<html>
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
<head>
 <title></title>
</head>
<body>
 <?php if ($_SESSION['jabatan']=="Direktur"): ?>

  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $direktur ?></h3>

                  <p>Verifikasi Surat Keterangan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../direktur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $skj ?></h3>

                  <p>Data Surat Keterangan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../direktur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



<?php endif ?>


<?php if ($_SESSION['jabatan']=="Bagian Keuangan"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $mm ?></h3>
                  <p>Data Mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../mahasiswa/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $ket ?></h3>
                  <p>Data Surat Keterangan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../sk/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $men ?></h3>

                  <p>Data Mahasiswa Meninggal</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../mahasiswa_meninggal/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Bagian Akademik"): ?>
  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $peng2 ?></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../baak/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $ket ?><sup style="font-size: 20px"></sup></h3>

                  <p>Data Surat Keterangan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../sk/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $men ?></h3>

                  <p>Data Mahasiswa Meninggal</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../mahasiswa_meninggal/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Bagian Umum"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $peng1 ?></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../baup/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $no ?></h3>

                  <p>Penomoran Surat Keterangan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../baup/no_sk.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Bagian Jurusan"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $peng ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../sp/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $ket ?><sup style="font-size: 20px"></sup></h3>

                  <p>Data Surat Keterangan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../sk/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $men ?></h3>

                  <p>Data Mahasiswa Meninggal</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../mahasiswa_meninggal/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Ketua Jurusan TI"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengti ?><sup style="font-size: 20px"></sup></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../kajur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengti1 ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../kajur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Ketua Jurusan TE"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengte ?><sup style="font-size: 20px"></sup></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../kajur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengte1 ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../kajur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Ketua Jurusan TM"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengtm ?><sup style="font-size: 20px"></sup></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../kajur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengtm1 ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../kajur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Koordinator TL"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengtl ?><sup style="font-size: 20px"></sup></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../kajur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengtl1 ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../kajur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Koordinator TPPL"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengtppl ?><sup style="font-size: 20px"></sup></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../kajur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengtppl1 ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../kajur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Koordinator PPA"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pengppa ?><sup style="font-size: 20px"></sup></h3>

                  <p>Verifikasi Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../kajur/verif.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $pengppa1 ?></h3>

                  <p>Data Surat Pengajuan Drop Out</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../kajur/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php if ($_SESSION['jabatan']=="Administrator"): ?>


  <!-- Main content -->
  <section class="content">
    <div class="content-wrapper">
     <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <br>
          <h4>Selamat Datang <?php echo $_SESSION['nama_pegawai'] ?> di Halaman Dashboard</h4>
          <h4>Anda Login Sebagai <?php echo $_SESSION['jabatan'] ?></h4>
          <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $peg ?></h3>

                  <p>Jumlah Pegawai</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../pegawai/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $mhs ?><sup style="font-size: 20px"></sup></h3>

                  <p>Jumlah Mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../mahasiswa/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $prod ?></h3>

                  <p>Jumlah Prodi</p>
                </div>
                <div class="icon">
                  <i class="ion-usb"></i>
                </div>
                <a href="../prodi/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $jur ?><sup style="font-size: 20px"></sup></h3>

                  <p>Jumlah Jurusan</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="../jurusan/view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif ?>

<?php
include '../../AdminLTE/footer.php';
?>      
</body>
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
<script src="../../AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
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