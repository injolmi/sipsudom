<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<?php
include "../../config/koneksi.php";
$id_sk = $_GET['id_sk'];

$query = mysqli_query($koneksi, "DELETE FROM surat_keterangan WHERE id_sk='$id_sk'");
if($query){
  echo "<script>
swal({
    title: 'Berhasil',
    text: 'Data Surat Keterangan berhasil dihapus!',
    type: 'success'
}).then(function() {
    window.location = 'view.php';
});
  </script>";
} else {
  echo "<script>alert('Data Gagal dihapus'); window.location = 'view.php' </script>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/LICENSE"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/package.json"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/README.md"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/sweetalert2.d.ts"></script>
</body>
</html>