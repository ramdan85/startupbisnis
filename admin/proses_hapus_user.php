<?php

include "../knk.php";
//session_start();

$email = mysqli_real_escape_string($konek, $_GET['email']);

//echo "$email";

//hapus akun user
mysqli_query($konek, "DELETE FROM tbl_usr WHERE email = '$email'");

$qs = mysqli_query ($konek, "SELECT * FROM tbl_startup WHERE email = '$email'");
while ($s = mysqli_fetch_array ($qs)){

$kd_startup = $s['kd_startup'];
$fotos = $s['foto'];
$filedihapuss='ft/logo_startup/'.$fotos;
//echo "$kd_startup"."<br>";
//echo "$fotos"."<br>";
//echo "$filedihapuss"."<br>";
unlink($filedihapuss);
mysqli_query($konek, "DELETE FROM tbl_startup WHERE kd_startup = '$kd_startup' AND email = '$email'");
 

         $qp = mysqli_query ($konek, "SELECT * FROM tbl_produk_startup WHERE kd_startup = '$kd_startup'");
            while ($p = mysqli_fetch_array ($qp)){
            $fotop = $p['foto_produk'];
            $kd_produk = $p['kd_produk'];
            $filedihapusp='ft/galeri_produk/'.$fotop;
            //echo "$fotop"."<br>";
            //echo "$kd_produk"."<br>";
            //echo "$filedihapusp"."<br>";
            unlink($filedihapusp);
            mysqli_query($konek, "DELETE FROM tbl_produk_startup WHERE kd_produk = '$kd_produk' AND kd_startup = '$kd_startup'");
         }

        $qt = mysqli_query ($konek, "SELECT * FROM tbl_tim_startup WHERE kd_startup = '$kd_startup'");
            while ($t = mysqli_fetch_array ($qt)){
            $fotot = $t['foto'];
            $id = $t['id'];
            $filedihapust='ft/foto_tim/'.$fotot;
            //echo "$fotot"."<br>";
            //echo "$id"."<br>";
            //echo "$filedihapust"."<br>";
            unlink($filedihapust);
            mysqli_query($konek, "DELETE FROM tbl_tim_startup WHERE id = '$id' AND kd_startup = '$kd_startup'");
         }
}

header("location:user.php?notif=6");

?>