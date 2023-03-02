<?php
include "../../config/koneksi.php";

$id_sk = $_GET['id_sk'];

$query = mysqli_query($koneksi, "UPDATE surat_keterangan SET status='1' WHERE id_sk='$id_sk'");

if ($query){
    echo "<script>alert('Surat Keterangan Berhasil di verifikasi'); window.location = 'view.php'</script>";   
} else {
    echo "<script>alert('Surat Keterangan Gagal di verifikasi'); window.location = 'view.php'</script>";  
}

?>