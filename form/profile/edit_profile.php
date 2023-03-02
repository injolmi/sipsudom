<?php
include('../../config/koneksi.php');

$npak   =$_POST['npak'];
$nama_pegawai   =$_POST['nama_pegawai'];
$no_telepon   =$_POST['no_telepon'];
$username   =$_POST['username'];
$password   =$_POST['password'];


$query	= mysqli_query ($koneksi,"UPDATE pegawai SET nama_pegawai='$nama_pegawai', no_telepon='$no_telepon', username='$username', password='$password' WHERE npak='$npak'");

if($query){
echo "<script>alert('DATA BERHASIL DI UBAH');
window.location='profile.php'</script>";
}else{

echo "<script>alert('GAGAL MENGUBAH DATA');
window.location='profile.php'</script>";
		}

?>