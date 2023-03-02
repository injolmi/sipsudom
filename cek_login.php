<?php 
session_start();

include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username' AND password= '$password'");
$cek = mysqli_num_rows($login);



if($cek>0){
    $data = mysqli_fetch_assoc($login);
        $_SESSION['username']=$data['username'];
        $_SESSION['npak']= $data['npak'];
        $_SESSION['nama_pegawai']= $data['nama_pegawai'];
         $_SESSION['jabatan']= $data['jabatan'];
         $_SESSION['no_telepon']= $data['no_telepon'];
         $_SESSION['password']= $data['password'];
         $_SESSION['ttd_pegawai']= $data['ttd_pegawai'];
         $_SESSION['foto_pegawai']= $data['foto_pegawai'];
        header("location:form/halaman_utama/index.php");
}

else {
    header("location:login.php?pesan=gagal");
}
?>