<?php
include "../knk.php";

$email = mysqli_real_escape_string($konek, $_POST['email']);
$nama_startup = mysqli_real_escape_string($konek, $_POST['nama_startup']);
$deskripsi_startup = mysqli_real_escape_string($konek, $_POST['deskripsi_startup']);
$alamat = mysqli_real_escape_string($konek, $_POST['alamat']);
$bidang = mysqli_real_escape_string($konek, $_POST['bidang']);
$website = mysqli_real_escape_string($konek, $_POST['website']);
$media_sosial = mysqli_real_escape_string($konek, $_POST['media_sosial']);
$jenis = 'startup';
$namafilefoto=$nama_startup.rand();


if($_POST['simpan']){
$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$nama_baru = $namafilefoto.'.'.$ekstensi;
$ukuran	= $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if ($ukuran==0){
					/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=1');
					    </script>                                  
					";*/
					header("location:startup.php?notif=1");
				}
				//jika  ukurannya lebih besar dari 2MB
				else if($ukuran < 2097152){
					move_uploaded_file($file_tmp, 'ft/logo_startup/'.$nama_baru);
					mysqli_query($konek, "INSERT INTO tbl_startup (nama_startup, deskripsi_startup, alamat, bidang, website, media_sosial, foto, jenis, email) VALUES ('$nama_startup', '$deskripsi_startup', '$alamat', '$bidang', '$website', '$media_sosial', '$nama_baru', '$jenis', '$email')");
					/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=2');
					    </script>                                  
					";*/
					header("location:startup.php?notif=2");
						
				}else{
					/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=3');
					    </script>                                  
					";*/
					header("location:startup.php?notif=3");
				}
			}else{
				/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=4');
					    </script>                                  
					";*/
				header("location:startup.php?notif=4");
			}
}
?>