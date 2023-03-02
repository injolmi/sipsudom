<?php
include('../../config/koneksi.php');

$npm   =$_POST['npm'];
$nama_mahasiswa   =$_POST['nama_mahasiswa'];
$id_prodi   =$_POST['id_prodi'];
$id_jurusan   =$_POST['id_jurusan'];
$alamat   =$_POST['alamat'];
$jenis_kelamin   =$_POST['jenis_kelamin'];
$kelas   =$_POST['kelas'];
$semester   =$_POST['semester'];
$no_telepon   =$_POST['no_telepon'];
$status_mhs   =$_POST['status_mhs'];

$simpan = mysqli_query($koneksi,"INSERT into mahasiswa (npm,nama_mahasiswa,id_prodi,id_jurusan,alamat,jenis_kelamin,kelas,semester,no_telepon,status_mhs) values('$npm','$nama_mahasiswa','$id_prodi','$id_jurusan','$alamat','$jenis_kelamin','$kelas','$semester','$no_telepon',0)");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>