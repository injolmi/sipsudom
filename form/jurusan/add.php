 <?php
include('../../config/koneksi.php');

$id_jurusan   =$_POST['id_jurusan'];
$nama_jurusan   =$_POST['nama_jurusan'];
$npak 	=$_POST['npak'];

$simpan = mysqli_query($koneksi,"INSERT INTO jurusan(id_jurusan,nama_jurusan,npak) values('','$nama_jurusan','$npak')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>