<?php
include('../../config/koneksi.php');

$id_jurusan   =$_POST['id_jurusan'];
$npak 	=$_POST['npak'];
$nama_jurusan   =$_POST['nama_jurusan'];

$update	= mysqli_query ($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan', npak='$npak' WHERE id_jurusan='$id_jurusan'");

if($update){

echo "<script>alert('DATA BERHASIL DI UBAH');
window.location='view.php'</script>";
}else{

echo "<script>alert('GAGAL MENGUBAH DATA');
window.location='view.php'</script>";
		}

?>