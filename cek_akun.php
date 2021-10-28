<?php
//memanggil lagi session untuk dimulai

session_start();

include "knk.php";

$email = mysqli_real_escape_string($konek,$_POST["email"]);
$pass = mysqli_real_escape_string($konek,$_POST["password"]);
$captcha = $_POST['g-recaptcha-response'];


if ($_POST){

	$queryuser = mysqli_query ($konek, "SELECT * FROM tbl_usr WHERE email='$email'");
	$user = mysqli_fetch_array ($queryuser);

	if($user){
	    //echo $user['level']."<br>";
	    //echo $user['kata_rahasia']."<br>";
	    //echo $user['aktif']."<br>"

		/*if (!$captcha) {
			echo "
                    	<script type='text/javascript'>
                        	window.location.replace('index.php?notif=3&#login-daftar');
                    	</script>
                	";
                	//echo "anda spam";
					//header ("Location: index.php?notif=3&#login-daftar");
				exit();
				}
			else {
  				$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddUAsbAAAAAHu8FU4_Wca5PJ3YDgP3Cfwob2Bz&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
  				if ($response.success != true) {
  					echo "
                    	<script type='text/javascript'>
                        	window.location.replace('index.php?notif=3&#login-daftar');
                    	</script>
						";
                    	//echo "anda spam";
                    	exit();
    					//header ("Location: index.php?notif=3&#login-daftar");
 				 }
				else {*/
    				if (password_verify($pass, $user["kunci_hash"])){
						if ($user['aktif']=='0'){
							 echo "
								<script type='text/javascript'>
									window.location.replace('index.php?notif=7&#login-daftar');
								</script>
							";
							//echo "user aktif 0";
							exit();
							//header ("location: index.php?notif=7&#login-daftar");
							}
						else if ($user['level'] == 'admin'){
							$_SESSION["nama_profil"] = 'Admin';
							$_SESSION["level"] = 'admin';
							$_SESSION["status"] = "login";
							$_SESSION["email"] = $email;
							//echo $_SESSION["nama_profil"]."<br>";
							//echo $_SESSION["level"]."<br>";
							//echo $_SESSION["status"]."<br>";
							echo "
                                  <script type='text/javascript'>
                                       window.location.replace('admin/index.php');
                                   </script>
                                   ";
                                  exit();
							//header ("Location: admin/index.php");
							}
						else if ($user['level'] == 'startup'){
							$_SESSION["nama_profil"] = 'Startup';
							$_SESSION["level"] = $user['level'];
							$_SESSION["status"] = "login";
							$_SESSION["email"] = $email;
							//echo $_SESSION["nama_profil"]."<br>";
							//echo $_SESSION["status"]."<br>";
							//echo $_SESSION["level"]."<br>";
							echo "
								<script type='text/javascript'>
									window.location.replace('admin/index.php');
								</script>
								";
							exit();
							//header ("Location: admin/index.php");
							}
						else if ($user['level'] == 'investor'){
							$_SESSION["nama_profil"] = 'Investor';
							$_SESSION["level"] = $user['level'];
							$_SESSION["status"] = "login";
							$_SESSION["email"] = $email;
							//echo $_SESSION["nama_profil"]."<br>";
							//echo $_SESSION["status"]."<br>";
							//echo $_SESSION["level"]."<br>";
							echo "
								<script type='text/javascript'>
									window.location.replace('admin/index.php');
								</script>
								";
							exit();
							//header ("Location: admin/index.php");
							}
						}
					else
						{
						echo "
							<script type='text/javascript'>
								window.location.replace('index.php?notif=2&#login-daftar');
							</script>
							";
						//echo "password salah";
						//header ("Location: index.php?notif=2&#login-daftar");
						exit();
						}
  				//}
			//}
		}
	else
	{
	echo "
            <script type='text/javascript'>
                window.location.replace('index.php?notif=1&#login-daftar');
            </script>
            ";
        //echo "email tdk ditemukan";
		//header ("Location: index.php?notif=1&#login-daftar");
	exit();
	}
}

?>
