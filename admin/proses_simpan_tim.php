<?php
include "../knk.php";

$kd_startup = mysqli_real_escape_string($konek, $_POST['kd_startup']);
$id = mysqli_real_escape_string($konek, $_POST['id']);
$nama_tim = mysqli_real_escape_string($konek, $_POST['nama_tim']);
$alamat = mysqli_real_escape_string($konek, $_POST['alamat']);
$jabatan = mysqli_real_escape_string($konek, $_POST['jabatan']);
$no_telp = mysqli_real_escape_string($konek, $_POST['no_telp']);
$twiter = mysqli_real_escape_string($konek, $_POST['twiter']);
$fb = mysqli_real_escape_string($konek, $_POST['fb']);
$instagram = mysqli_real_escape_string($konek, $_POST['instagram']);
$linkedin = mysqli_real_escape_string($konek, $_POST['linkedin']);
$namafilefoto=$nama_tim.$id.$jabatan.$kd_startup;


if($_POST['simpan']){

/*echo $kd_startup."<br>";
echo $nama."<br>";
echo $alamat."<br>";
echo $jabatan."<br>";
echo $twiter."<br>";
echo $fb."<br>";
echo $instagram."<br>";
echo $linkedin."<br>";
echo $namafilefoto."<br>";*/

			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_FILES['foto']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$nama_baru = $namafilefoto.'.'.$ekstensi;
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if ($ukuran==0){
					header("location:tim.php?kd_startup=".$kd_startup."&notif=1");
				}
				//jika  ukurannya lebih besar dari 2MB
				else if($ukuran < 2097152){
					move_uploaded_file($file_tmp, 'ft/foto_tim/'.$nama_baru);
					mysqli_query($konek, "INSERT INTO tbl_tim_startup(kd_startup, id, nama, alamat, jabatan, no_telp, twiter, fb, instagram, linkedin, foto) VALUES ('$kd_startup', '$id','$nama_tim','$alamat','$jabatan', '$no_telp','$twiter','$fb','$instagram','$linkedin','$nama_baru')");
					header("location:tim.php?kd_startup=".$kd_startup."&notif=2");
						
				}else{
					header("location:tim.php?kd_startup=".$kd_startup."&notif=3");
				}
			}else{
				header("location:tim.php?kd_startup=".$kd_startup."&notif=4");
			}

		}
?>