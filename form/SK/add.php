<?php
include('../../config/koneksi.php');

$id_sk   =$_POST['id_sk'];
$id_sp   =$_POST['id_sp'];
$npm   =$_POST['npm'];
$id_prodi   =$_POST['id_prodi'];
$status   =$_POST['status'];
$no_sk   =$_POST['no_sk'];
$tahun_akademik   =$_POST['tahun_akademik'];
$tgl_sk   =$_POST['tgl_sk'];

$query2 = mysqli_query($koneksi, "SELECT npm FROM surat_keterangan WHERE npm = '$npm'"); 
$query = mysqli_query($koneksi, "SELECT id_sp FROM surat_keterangan WHERE id_sp = '$id_sp'"); 
if($query->num_rows > 0 and $query2->num_rows > 0) {
	echo "<script>alert('Surat Keterangan Sedang Di Proses!!!'); document.location='view.php'</script>";
} else {
	$simpan = mysqli_query($koneksi,"INSERT into surat_keterangan (id_sk,id_sp,npm,id_prodi,status,no_sk,tahun_akademik,tgl_sk) values('$id_sk','$id_sp','$npm','$id_prodi',0,'','$tahun_akademik','$tgl_sk')");

	if($simpan){

		echo "<script>alert('Data Berhasil Disimpan');
		window.location='view.php'</script>";
	}else{

		echo "<script>alert('Data Gagal Disimpan');
		window.location='view.php'</script>";
	}
}


?>

