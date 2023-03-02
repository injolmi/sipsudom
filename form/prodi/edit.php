<?php
include('../../config/koneksi.php');

$id_prodi	=$_POST['id_prodi'];
$nama_prodi	=$_POST['nama_prodi'];


$update	= mysqli_query ($koneksi, "UPDATE prodi set nama_prodi='$nama_prodi' where id_prodi='$id_prodi'");

if($update){

echo "<script>alert('DATA BERHASIL DI UBAH');
window.location='view.php'</script>";
}else{

echo "<script>alert('GAGAL MENGUBAH DATA');
window.location='view.php'</script>";
		}

?>