<?php

include "../knk.php";
//session_start();

$kd_startup = mysqli_real_escape_string($konek, $_GET['kd_startup']);

$qk = mysqli_query ($konek, "SELECT * FROM tbl_startup WHERE kd_startup = '$kd_startup'");
    while ($k = mysqli_fetch_array ($qk)){
    $foto = $k['foto'];
    $filedihapus='ft/logo_startup/'.$foto;
    unlink($filedihapus);
    mysqli_query($konek, "DELETE FROM tbl_startup WHERE kd_startup = '$kd_startup'");
 }

 $qk = mysqli_query ($konek, "SELECT * FROM tbl_produk_startup WHERE kd_startup = '$kd_startup'");
    while ($k = mysqli_fetch_array ($qk)){
    $foto = $k['foto_produk'];
    $kd_produk = $k['kd_produk'];
    $filedihapus='ft/galeri_produk/'.$foto;
    unlink($filedihapus);
    mysqli_query($konek, "DELETE FROM tbl_produk_startup WHERE kd_produk = '$kd_produk' AND kd_startup = '$kd_startup'");
 }

$qk = mysqli_query ($konek, "SELECT * FROM tbl_tim_startup WHERE kd_startup = '$kd_startup'");
    while ($k = mysqli_fetch_array ($qk)){
    $foto = $k['foto'];
    $id = $k['id'];
    $filedihapus='ft/foto_tim/'.$foto;
    unlink($filedihapus);
    mysqli_query($konek, "DELETE FROM tbl_tim_startup WHERE id = '$id' AND kd_startup = '$kd_startup'");
 }

header("location:startup.php?notif=6");

?>