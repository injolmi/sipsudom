<?php
include('../../config/koneksi.php');

$id_sk = $_POST['id_sk'];
$no_sk   =$_POST['no_sk'];

$npm = $_POST['npm'];



$update	= mysqli_query ($koneksi, "UPDATE surat_keterangan set  no_sk='$no_sk' where id_sk='$id_sk'");

if($update){
echo "<script>alert('DATA BERHASIL DI UBAH');
window.location='no_sk.php'</script>";
}else{

echo "<script>alert('GAGAL MENGUBAH DATA');
window.location='no_sk.php'</script>";
		}
		if ($no_sk !='') {
			$edit	= mysqli_query ($koneksi, "UPDATE mahasiswa set  status_mhs='3' where npm='$npm'");
		}

?>