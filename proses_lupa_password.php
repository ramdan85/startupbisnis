<?php

//code untuk menghilangkan pesan error
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//session_start();

include "knk.php";

$email = mysqli_real_escape_string($konek, $_POST['email']);

//echo $noid;

$queryuser = mysqli_query ($konek, "SELECT * FROM tbl_usr WHERE email='$email'");
$user = mysqli_fetch_array ($queryuser);
$aktif = $user['aktif'];

if($user){
		if ($aktif=='0'){
		    echo "

            <script type='text/javascript'>
                window.location.replace('index.php?notif=6&#login-daftar');
            </script>
            
            ";
			//header ("Location:index.php?notif=6&#login-daftar");
		}
		else{
			$email = $user['email'];
			$password = $user['kunci'];

					date_default_timezone_set('Etc/UTC');
					require 'PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer;
					$mail->isSMTP();
					$mail->SMTPDebug = 1;
					$mail->Host = 'smtp.gmail.com';
					//$mail->Host = 'mail.pjp.umi.ac.id';
					$mail->Port = 587;
					//$mail->Port = 465;
					$mail->SMTPSecure = 'tls';
					//$mail->SMTPSecure = 'ssl';
					$mail->SMTPAuth = true;
					$mail->Username = 'pjpumi@umi.ac.id';
					$mail->Password = 'Makassar2019';
					$mail->setFrom('pjpumi@umi.ac.id', 'Admin Sistem');
					$mail->addAddress($email, $email);
					$mail->Subject = 'Informasi akun Anda';
					$content = "<b>INFORMASI AKUN ANDA:</b> <br> 
								--------------------------------------------------- <br>
								Email: ".$email."<br>
								Password: ".$password."<br>
								--------------------------------------------------- <br>";
					$mail->MsgHTML($content);
					if (!$mail->send()) {
					        echo "
                            <script type='text/javascript'>
                                window.location.replace('index.php?notif=4&#login-daftar');
                            </script>
                            
                            ";
							//header ("Location:index.php?notif=4&#login-daftar");
					} else {
					        echo "
                            <script type='text/javascript'>
                                window.location.replace('index.php?notif=8&#login-daftar');
                            </script>
                            
                            ";
		    				//header ("Location:index.php?notif=8&#login-daftar");
					}

		}
	}
?>
