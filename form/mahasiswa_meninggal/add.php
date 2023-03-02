 <?php
 include('../../config/koneksi.php');

 if (isset($_POST['submit'])) {
 	$id   =$_POST['id'];
 	$id_jurusan   =$_POST['id_jurusan'];
 	$id_prodi   =$_POST['id_prodi'];
 	$npm   =$_POST['npm'];
 	$tgl_pendataan   =$_POST['tgl_pendataan'];

	//ekstensi file yang boleh di upload
 	$ekstensi_diperbolehkan = array('pdf');
	$akta_kematian = $_FILES['akta_kematian']['name']; // untuk mendapatkan nama file yang diupload
	//nama_file.jpg
	$x = explode('.', $akta_kematian);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['akta_kematian']['size']; //untuk mendapatkan ukuran file yang akan di upload
	$file_tmp = $_FILES['akta_kematian']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)

		//uji jika ekstensi file yang diupload sesuai
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			//boleh upload file
			//uji jika ukuran file dibawah 1mb
		if($ukuran < 1044070){
				//jika ukuran sesuai
				//PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
			move_uploaded_file($file_tmp, '../dokumen/'.$akta_kematian);

				//simpan data ke dalam database
			$simpan = mysqli_query($koneksi, "INSERT INTO 
				mahasiswa_meninggal (id,npm,id_jurusan,id_prodi,tgl_pendataan,akta_kematian)
				VALUES ('', '$npm','$id_jurusan','$id_prodi','$tgl_pendataan','$akta_kematian')");
			if($simpan){
				$edit	= mysqli_query ($koneksi, "UPDATE mahasiswa set  status_mhs='1' where npm='$npm'");
				echo "<script>alert('DATA BERHASIL DI UPLOAD'); document.location='view.php'</script>";
			}else{
				echo "<script>alert('GAGAL MENGUPLOAD DATA'); document.location='view.php'</script>";
			}

		}else{
				//ukuran tidak sesuai
			echo "<script>alert('UKURAN FILE TERLALU BESAR, MAX. 1MB'); document.location='view.php'</script>";
		}
	}else{
			//ektensi file yang di upload tidak sesuai
		echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DIPERBOLEHKAN'); document.location='view.php'</script>";
	}

}

?>

