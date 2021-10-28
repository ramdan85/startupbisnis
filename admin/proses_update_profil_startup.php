<?php
include "../knk.php";

$kd_startup = mysqli_real_escape_string($konek, $_POST['kd_startup']);
$email = mysqli_real_escape_string($konek, $_POST['email']);
$nama_startup = mysqli_real_escape_string($konek, $_POST['nama_startup']);
$deskripsi_startup = mysqli_real_escape_string($konek, $_POST['deskripsi_startup']);
$alamat = mysqli_real_escape_string($konek, $_POST['alamat']);
$bidang = mysqli_real_escape_string($konek, $_POST['bidang']);
$website = mysqli_real_escape_string($konek, $_POST['website']);
$media_sosial = mysqli_real_escape_string($konek, $_POST['media_sosial']);
$jenis = 'startup';
$namafilefoto=$nama_startup.rand();


if($_POST['update']){


$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$nama_baru = $namafilefoto.'.'.$ekstensi;
$ukuran	= $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if ($ukuran==0){
					header("location:profil_startup.php?kd_startup=".$kd_startup."&notif=1");
				}
				//jika  ukurannya lebih besar dari 2MB
				else if($ukuran < 2097152){
					move_uploaded_file($file_tmp, 'ft/logo_startup/'.$nama_baru);
					mysqli_query($konek, "UPDATE tbl_startup SET nama_startup='$nama_startup',deskripsi_startup='$deskripsi_startup',alamat='$alamat',bidang='$bidang',website='$website',media_sosial='$media_sosial',foto='$nama_baru',jenis='$jenis',email='$email' WHERE kd_startup = '$kd_startup' and email = '$email'");
					header("location:profil_startup.php?kd_startup=".$kd_startup."&notif=5");
						
				}else{
					header("location:profil_startup.php?kd_startup=".$kd_startup."&notif=3");
				}
			}else{
				header("location:profil_startup.php?kd_startup=".$kd_startup."&notif=4");
			}

		}
?>