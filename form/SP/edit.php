 <?php
 include('../../config/koneksi.php');

 if (isset($_POST['edit_data'])) {
 	$id_sp   =$_POST['id_sp'];
 	$no_sp   =$_POST['no_sp'];
 	$npm   =$_POST['npm'];
 	$npak   =$_POST['npak'];
 	$id_jurusan   =$_POST['id_jurusan'];
 	$id_prodi   =$_POST['id_prodi'];
 	$alasan   =$_POST['alasan'];
 	$no_surat_pemanggilan   =$_POST['no_surat_pemanggilan'];
 	$tgl_pengajuan   =$_POST['tgl_pengajuan'];
 	$status   =$_POST['status'];

	//ekstensi file yang boleh di upload
 	$ekstensi_diperbolehkan = array('pdf',NULL);
	$surat_pemanggilan = $_FILES['surat_pemanggilan_ortu']['name']; // untuk mendapatkan nama file yang diupload
	//nama_file.jpg
	$x = explode('.', $surat_pemanggilan);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['surat_pemanggilan_ortu']['size']; //untuk mendapatkan ukuran file yang akan di upload
	$file_tmp = $_FILES['surat_pemanggilan_ortu']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)

		//ekstensi file yang boleh di upload
	$ekstensi_diperbolehkan_1 = array('pdf',NULL);
	$berita_acara = $_FILES['berita_acara']['name']; // untuk mendapatkan nama file yang diupload
	//nama_file.jpg
	$x_1 = explode('.', $berita_acara);
	$ekstensi_1 = strtolower(end($x_1));
	$ukuran_1 = $_FILES['berita_acara']['size']; //untuk mendapatkan ukuran file yang akan di upload
	$file_tmp_1 = $_FILES['berita_acara']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)


		//uji jika ekstensi file yang diupload sesuai
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true and in_array($ekstensi_1, $ekstensi_diperbolehkan_1) === true){
			//boleh upload file
			//uji jika ukuran file dibawah 1mb
		if($ukuran < 1044070 and $ukuran_1 < 1044070){
				//jika ukuran sesuai
				//PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
			move_uploaded_file($file_tmp, '../dokumen/'.$surat_pemanggilan);
			move_uploaded_file($file_tmp, '../dokumen/'.$berita_acara);

				$edit = mysqli_query($koneksi, "UPDATE  
					surat_pengajuan set no_sp='$no_sp', npm='$npm', npak='$npak', id_prodi='$id_prodi', id_jurusan='$id_jurusan', alasan='$alasan', no_surat_pemanggilan='$no_surat_pemanggilan', tgl_pengajuan='$tgl_pengajuan', status='$status', surat_pemanggilan_ortu='$surat_pemanggilan', berita_acara='$berita_acara' WHERE id_sp='$id_sp'");
				if($edit){
					echo "<script>alert('DATA BERHASIL DI UBAH'); document.location='view.php'</script>";
				}else{
					echo "<script>alert('DATA GAGAL DI UBAH'); document.location='view.php'</script>";
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

