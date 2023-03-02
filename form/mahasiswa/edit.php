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


$update	= mysqli_query ($koneksi, "UPDATE mahasiswa set nama_mahasiswa='$nama_mahasiswa' , id_prodi='$id_prodi' , id_jurusan='$id_jurusan', alamat='$alamat', jenis_kelamin='$jenis_kelamin', kelas='$kelas', semester='$semester', no_telepon='$no_telepon' , status_mhs='$status_mhs' where npm='$npm'");

if($update){

echo "<script>alert('DATA BERHASIL DI UBAH');
window.location='view.php'</script>";
}else{

echo "<script>alert('GAGAL MENGUBAH DATA');
window.location='view.php'</script>";
		}

?>