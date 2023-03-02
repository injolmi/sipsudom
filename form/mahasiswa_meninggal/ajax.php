<?php
include "../../config/koneksi.php";

//variabel nim yang dikirimkan form.php
$npm = $_GET['npm'];

//mengambil data
$query = mysqli_query($koneksi, "SELECT * from v_mahasiswa where npm='$npm'");
$mahasiswa = mysqli_fetch_array($query);

$data = array(
            'id_jurusan'      =>$mahasiswa['id_jurusan'],
            'id_prodi'   =>$mahasiswa['id_prodi'],);

//tampil data
echo json_encode($data);
?>