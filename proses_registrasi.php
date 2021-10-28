<?php
include "knk.php";

$email = mysqli_real_escape_string($konek, $_POST['email']);
$password = mysqli_real_escape_string($konek, $_POST['password']);
$nama_startup_perusahaan = mysqli_real_escape_string($konek, $_POST['nama_startup_perusahaan']);
$profil_singkat_startup_perusahaan = mysqli_real_escape_string($konek, $_POST['profil_singkat_startup_perusahaan']);
$level= mysqli_real_escape_string($konek, $_POST['level']);
$hash_password	= password_hash($password, PASSWORD_DEFAULT);
$token = hash('sha256', md5(date('Y-m-d h:i:sa'))) ;

/*$content = "<b>INFORMASI AKUN ANDA:</b> <br> 
						--------------------------------------------------- <br>
						Email: ".$email."<br>
						Password: ".$password."<br>
						--------------------------------------------------- <br>
						Untuk mengaktifkan akun anda silahkan klik link di bawah ini<br>
						<a href='http://apps.pjp.umi.ac.id/sb/aktifasi_akun.php?t=$token'>$token</a>
						";
echo $content;*/

//cek peserta
	$query=mysqli_query($konek, "SELECT * FROM tbl_usr WHERE email = '$email' ");
	$data = mysqli_num_rows($query);
	if ($data<>0){
		//echo"<script>window.location.replace('index.php?notif=1&#login-daftar');</script>";
		header ("Location:index.php?notif=10&#login-daftar");
		exit();
	}
	else
	{
		//tambah akun
		mysqli_query($konek, "INSERT INTO tbl_usr(email, kunci, kunci_hash, level, token, aktif) VALUES ('$email','$password','$hash_password','$level','$token','0')");
		//tambah startup atau perusahaan
		mysqli_query($konek, "INSERT INTO tbl_startup(nama_startup, deskripsi_startup, alamat, bidang, website, media_sosial, foto, jenis, email) VALUES ('$nama_startup_perusahaan','$profil_singkat_startup_perusahaan','','','','','','','$email')");

		/*if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
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
			$mail->addAddress($email, $no_id);
			$mail->Subject = 'Konfirmasi akun Anda';
			$content = "<b>INFORMASI AKUN ANDA:</b> <br> 
						--------------------------------------------------- <br>
						Email: ".$email."<br>
						Password: ".$password."<br>
						--------------------------------------------------- <br>
						Untuk mengaktifkan akun anda silahkan klik link di bawah ini<br>
						<a href='http://apps.pjp.umi.ac.id/sb/aktifasi_akun.php?t=$token'>$token</a>
						";
			$mail->MsgHTML($content);
			if (!$mail->send()) {
			    echo "
                    <script type='text/javascript'>
                     window.location.replace('index.php?notif=4&#login-daftar');
                    </script>
                	";
			} else {
					mysqli_query($konek, "UPDATE tbl_dosen SET email='$email', kata_rahasia='$kunci_akun', kunci_rahasia='$hash_kunci_akun', level='$level', token='$token' WHERE nidn='$no_id' or nips='$no_id'");
					echo "
                    <script type='text/javascript'>
                     window.location.replace('index.php?notif=6&#login-daftar');
                    </script>
                    ";
    				//header ("Location:index.php?notif=6&#login-daftar");
			}
		}
		else 
		{
   		 echo "
             <script type='text/javascript'>
                window.location.replace('index.php?notif=4&#login-daftar');
             </script>
             ";
  		//header ("Location:index.php?notif=4&#login-daftar");
		}*/
	}

	//percobaan
		$content = "<b>INFORMASI AKUN ANDA:</b> <br> 
						--------------------------------------------------- <br>
						Email: ".$email."<br>
						Password: ".$password."<br>
						--------------------------------------------------- <br>
						Untuk mengaktifkan akun anda silahkan klik link di bawah ini<br>
						<a href='aktifasi_akun.php?t=$token'>$token</a>
						";
		echo $content;

?>