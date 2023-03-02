<?php
include "../../config/koneksi.php";

//variabel nim yang dikirimkan form.php
$id_sp = $_GET['id_sp'];

//mengambil data
$query = mysqli_query($koneksi, "SELECT * from v_sp where id_sp='$id_sp'");
$mahasiswa = mysqli_fetch_array($query);

$data = array(
            'npm'      =>$mahasiswa['npm'],
            'id_prodi'   =>$mahasiswa['id_prodi'],);

//tampil data
echo json_encode($data);
?>