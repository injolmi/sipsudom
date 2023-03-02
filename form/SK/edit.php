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


$update	= mysqli_query ($koneksi, "UPDATE surat_keterangan set id_sp='$id_sp', npm='$npm', id_prodi='$id_prodi', status='$status', no_sk='$no_sk', tahun_akademik='$tahun_akademik', tgl_sk='$tgl_sk' where id_sk='$id_sk'");

if($update){

echo "<script>alert('DATA BERHASIL DI UBAH');
window.location='view.php'</script>";
}else{

echo "<script>alert('GAGAL MENGUBAH DATA');
window.location='view.php'</script>";
		}

?>