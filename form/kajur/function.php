<?php
include "../../config/koneksi.php";

$id_sp = $_GET['id_sp'];

$query = mysqli_query($koneksi, "UPDATE surat_pengajuan SET status='1' WHERE id_sp='$id_sp'");

if ($query){
    echo "<script>alert('Pengajuan Berhasil di verifikasi'); window.location = 'view.php'</script>";   
} else {
    echo "<script>alert('Pengajuan Gagal di verifikasi'); window.location = 'view.php'</script>";  
}

?>