 <?php
 include('../../config/koneksi.php');

 if (isset($_POST['edit'])) {
 	$id   =$_POST['id'];
 	$npm   =$_POST['npm'];
 	$id_jurusan   =$_POST['id_jurusan'];
 	$id_prodi   =$_POST['id_prodi'];
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
			$update = mysqli_query($koneksi, "UPDATE 
				mahasiswa_meninggal set npm='$npm', id_jurusan='$id_jurusan', id_prodi='$id_prodi',tgl_pendataan='$tgl_pendataan', akta_kematian='$akta_kematian' WHERE id='$id'");
			if($update){
				echo "<script>alert('DATA BERHASIL DI UBAH'); document.location='view.php'</script>";
			}else{
				echo "<script>alert('GAGAL MENGUBAH DATA'); document.location='view.php'</script>";
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

