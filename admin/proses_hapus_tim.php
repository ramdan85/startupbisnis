<?php

include "../knk.php";
//session_start();

$kd_startup = mysqli_real_escape_string($konek, $_GET['kd_startup']);
$id = mysqli_real_escape_string($konek, $_GET['id']);

$qk = mysqli_query ($konek, "SELECT * FROM tbl_tim_startup WHERE id = '$id' AND kd_startup = '$kd_startup'");
    while ($k = mysqli_fetch_array ($qk)){
    $foto = $k['foto'];
 }

$filedihapus='ft/foto_tim/'.$foto;

mysqli_query($konek, "DELETE FROM tbl_tim_startup WHERE id = '$id' AND kd_startup = '$kd_startup'");
unlink($filedihapus);
header("location:tim.php?kd_startup=".$kd_startup."&notif=6");

?>