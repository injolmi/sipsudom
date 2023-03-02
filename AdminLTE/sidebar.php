<?php
include "rel.html";
include "script.html";
session_start();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIPSUDOM</title>
<style>
  p{
    color: white;
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../halaman_utama/index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../halaman_utama/index.php" class="brand-link">
      <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">|| SIPSUDOM ||</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-1 mb-1 d-flex">
        <div class="info">
          <p><?php echo $_SESSION['nama_pegawai'] ?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="../halaman_utama/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Kondisi untuk sidebar masing masing jabatan -->
          <?php if ($_SESSION['jabatan']=="Bagian Umum"){ ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../baup/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../SP/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../baup/no_sk.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Penomoran Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php }
          else if ($_SESSION['jabatan']=="Ketua Jurusan TI"){ 
            ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php } 
          else if ($_SESSION['jabatan']=="Bagian Jurusan"){
            ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../SP/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../mahasiswa_meninggal/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Mahasiswa Meninggal
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php } 
          else if ($_SESSION['jabatan']=="Bagian Keuangan") {
            ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../mahasiswa/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Mahasiswa
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../mahasiswa_meninggal/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Mahasiswa Meninggal
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php } 
          else if ($_SESSION['jabatan']=="Direktur") {
            ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../direktur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../direktur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php } 
          else if ($_SESSION['jabatan']=="Administrator") { 
            ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../prodi/view.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Data Prodi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../jurusan/view.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Data Jurusan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../mahasiswa/view.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Data Mahasiswa
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pegawai/view.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Data Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../mahasiswa_meninggal/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Mahasiswa Meninggal
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sp/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php } elseif ($_SESSION['jabatan']=="Ketua Jurusan TE"){ ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          <?php }  elseif ($_SESSION['jabatan']=="Ketua Jurusan TM")
          { 
            ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          <?php } elseif ($_SESSION['jabatan']=="Koordinator TL"){ ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          <?php } elseif ($_SESSION['jabatan']=="Koordinator TPPL"){ ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          <?php } elseif ($_SESSION['jabatan']=="Koordinator PPA"){ ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kajur/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          <?php } elseif($_SESSION['jabatan']=="Bagian Akademik") { ?>
            <li class="nav-item">
              <a href="../profile/profile.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../baak/verif.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Verifikasi Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sp/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Surat Pengajuan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../sk/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Surat Keterangan Drop Out
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../mahasiswa_meninggal/view.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Data Mahasiswa Meninggal
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          <?php }  else {?> 

          <?php } ?>


        </ul>
      </nav>
    </div>
  </aside>