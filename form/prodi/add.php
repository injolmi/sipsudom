 <?php
include('../../config/koneksi.php');

$id_prodi   =$_POST['id_prodi'];
$nama_prodi   =$_POST['nama_prodi'];


$simpan = mysqli_query($koneksi,"INSERT INTO prodi(id_prodi,nama_prodi) values('','$nama_prodi')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>