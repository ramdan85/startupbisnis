<?php 
// mengaktifkan session
session_start();

//unset ($_SESSION["no_id"]);
//unset ($_SESSION["nama"]);
//unset ($_SESSION["level"]);
//unset ($_SESSION["status"]);

//echo $_SESSION["no_id"]."<br>";
//echo $_SESSION["nama"]."<br>";
//echo $_SESSION["level"]."<br>";
//echo $_SESSION["status"]."<br>";

// menghapus semua session
session_unset();
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
//header("location:index.php?Err=5");
//exit();


/*echo "

            <script type='text/javascript'>
             window.location.replace('index.php?Err=5');
            </script>
                                            
";*/

header("location:../index.php?notif=9&#login-daftar");
?>