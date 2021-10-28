<?php
include "../knk.php";

$kd_startup = mysqli_real_escape_string($konek, $_POST['kd_startup']);
$kd_kategori = mysqli_real_escape_string($konek, $_POST['kd_kategori']);
$kategori = mysqli_real_escape_string($konek, $_POST['kategori']);

if($_POST['ubah']){
	mysqli_query($konek, "UPDATE tbl_kategori_produk SET kategori ='$kategori' WHERE kd_kategori = '$kd_kategori' ");
	header("location:produk.php?kd_startup=".$kd_startup."&notif=5");
	}
?>