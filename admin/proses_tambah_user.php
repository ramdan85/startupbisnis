<?php
include "../knk.php";

$email = mysqli_real_escape_string($konek, $_POST['email']);
$password = mysqli_real_escape_string($konek, $_POST['kunci']);
$level= mysqli_real_escape_string($konek, $_POST['level']);
$hash_password	= password_hash($password, PASSWORD_DEFAULT);
$token = hash('sha256', md5(date('Y-m-d h:i:sa'))) ;


if($_POST['simpan']){
//tambah akun
mysqli_query($konek, "INSERT INTO tbl_usr(email, kunci, kunci_hash, level, token, aktif) VALUES ('$email','$password','$hash_password','$level','$token','1')");
header("location:user.php?notif=2");

}
?>