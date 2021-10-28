<?php
include "knk.php";
$token=$_GET['t'];

$queryuser = mysqli_query ($konek, "SELECT * FROM tbl_usr WHERE token='$token'");
$user = mysqli_fetch_array ($queryuser);

//echo $token."<br>";
//echo $user['aktif']."<br>";
//echo $user['token'];

if ($user['aktif']==1){
    header ("Location:index.php?notif=6&#login-daftar");
}
else{
         $sql_cek=mysqli_query($konek,"SELECT * FROM tbl_usr WHERE token='".$token."' and aktif<>'1'");
         $jml_data=mysqli_num_rows($sql_cek);
         if ($jml_data>0) {
             //update data users aktif
             mysqli_query($konek,"UPDATE tbl_usr SET aktif='1' WHERE token='".$token."' and aktif<>'1'");
             /*echo "
                <script type='text/javascript'>
                    window.location.replace('index.php?notif=6&#login-daftar');
                </script>
                ";*/
             header ("Location:index.php?notif=6&#login-daftar");
         }
    }

?>
