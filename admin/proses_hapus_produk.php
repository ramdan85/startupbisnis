<?php

include "../knk.php";
//session_start();

$kd_startup = mysqli_real_escape_string($konek, $_GET['kd_startup']);
$kd_produk = mysqli_real_escape_string($konek, $_GET['kd_produk']);

$qk = mysqli_query ($konek, "SELECT * FROM tbl_produk_startup WHERE kd_produk = '$kd_produk' AND kd_startup = '$kd_startup'");
    while ($k = mysqli_fetch_array ($qk)){
    $foto = $k['foto_produk'];
 }

$filedihapus='ft/galeri_produk/'.$foto;

mysqli_query($konek, "DELETE FROM tbl_produk_startup WHERE kd_produk = '$kd_produk' AND kd_startup = '$kd_startup'");
unlink($filedihapus);
header("location:produk.php?kd_startup=".$kd_startup."&notif=6");

?>