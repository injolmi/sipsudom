 <?php
 include('../../config/koneksi.php');

 if (isset($_POST['submit'])) {
 	$npak   =$_POST['npak'];
 	$nama_pegawai   =$_POST['nama_pegawai'];
 	$jabatan   =$_POST['jabatan'];
 	$no_telepon   =$_POST['no_telepon'];
 	 	$email   =$_POST['email'];
 	$username   =$_POST['username'];
 	$password   =$_POST['password'];

	//ekstensi file yang boleh di upload
 	$ekstensi_diperbolehkan = array('png', 'jpg',NULL);
	$foto_pegawai = $_FILES['foto_pegawai']['name']; // untuk mendapatkan nama file yang diupload
	//nama_file.jpg
	$x = explode('.', $foto_pegawai);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['foto_pegawai']['size']; //untuk mendapatkan ukuran file yang akan di upload
	$file_tmp = $_FILES['foto_pegawai']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)


	$ekstensi_diperbolehkan_ttd = array('png', 'jpg',NULL);
	$ttd_pegawai = $_FILES['ttd_pegawai']['name']; // untuk mendapatkan nama file yang diupload
	//nama_file.jpg
	$x_ttd = explode('.', $ttd_pegawai);
	$ekstensi_ttd = strtolower(end($x_ttd));
	$ukuran_ttd = $_FILES['ttd_pegawai']['size']; //untuk mendapatkan ukuran file yang akan di upload
	$file_tmp_ttd = $_FILES['ttd_pegawai']['tmp_name']; //untuk mendapatkan temporary file yang akan di upload (tmp)


		//uji jika ekstensi file yang diupload sesuai
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true and in_array($ekstensi_ttd, $ekstensi_diperbolehkan_ttd) === true){
			//boleh upload file
			//uji jika ukuran file dibawah 1mb
			if($ukuran < 1044070 and $ukuran_ttd < 1044070){
				//jika ukuran sesuai
				//PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
				move_uploaded_file($file_tmp, '../foto_pegawai/'.$foto_pegawai);
				move_uploaded_file($file_tmp_ttd, '../ttd_pegawai/'.$ttd_pegawai);

				//simpan data ke dalam database
				$simpan = mysqli_query($koneksi, "INSERT INTO 
					pegawai (npak,nama_pegawai,jabatan,no_telepon,email,username,password,foto_pegawai,ttd_pegawai)
					VALUES ('$npak', '$nama_pegawai','$jabatan','$no_telepon','$email','$username','$password','$foto_pegawai','$ttd_pegawai')");
				if($simpan){
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

