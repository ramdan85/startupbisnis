<?php
include "../knk.php";
//session_start();

$kd_startup = mysqli_real_escape_string($konek, $_POST['kd_startup']);
$kd_produk = mysqli_real_escape_string($konek, $_POST['kd_produk']);
$kd_kategori = mysqli_real_escape_string($konek, $_POST['kd_kategori']);
$nama_produk = mysqli_real_escape_string($konek, $_POST['nama_produk']);
$deskripsi_produk = mysqli_real_escape_string($konek, $_POST['deskripsi_produk']);
$harga_produk = mysqli_real_escape_string($konek, $_POST['harga_produk']);

/*echo $kd_startup."<br>";
echo $kd_produk."<br>";
echo $kd_kategori."<br>";
echo $nama_produk."<br>";
echo $deskripsi_produk."<br>";
echo $harga_produk."<br>";*/

if($_POST['simpan']){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_FILES['foto_produk']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$nama_baru = $kd_produk.'.'.$ekstensi;
			$ukuran	= $_FILES['foto_produk']['size'];
			$file_tmp = $_FILES['foto_produk']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if ($ukuran==0){
					header("location:produk.php?kd_startup=".$kd_startup."&notif=1");
				}
				//jika  ukurannya lebih besar dari 2MB
				else if($ukuran < 2097152){
					move_uploaded_file($file_tmp, 'ft/galeri_produk/'.$nama_baru);
					mysqli_query($konek, "INSERT INTO tbl_produk_startup(kd_startup, kd_produk, kd_kategori, nama_produk, deskripsi_produk, harga_produk, foto_produk) VALUES ('$kd_startup','$kd_produk','$kd_kategori','$nama_produk','$deskripsi_produk','$harga_produk','$nama_baru')");
					header("location:produk.php?kd_startup=".$kd_startup."&notif=2");
						
				}else{
					header("location:produk.php?kd_startup=".$kd_startup."&notif=3");
				}
			}else{
				header("location:produk.php?kd_startup=".$kd_startup."&notif=4");
			}
		}
?>