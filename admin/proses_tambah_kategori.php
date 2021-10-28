<?php
include "../knk.php";

$kd_startup = mysqli_real_escape_string($konek, $_POST['kd_startup']);
$kategori = mysqli_real_escape_string($konek, $_POST['kategori']);


if($_POST['simpan']){
			
	mysqli_query($konek, "INSERT INTO tbl_kategori_produk (kategori) VALUES ('$kategori')");
	header("location:produk.php?kd_startup=".$kd_startup."&notif=2");
				
}
?>