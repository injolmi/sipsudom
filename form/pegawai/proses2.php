<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'sipsudom');

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$sql = "select * from pegawai where username = '$username'";
$process = mysqli_query($koneksi, $sql);
$num = mysqli_num_rows($process);
if($num == 0){
	echo " &#10004; username masih tersedia";
}else{
	echo " &#10060; username tidak tersedia";
}
