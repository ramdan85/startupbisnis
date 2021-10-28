<?php
		include "head.php";

		// Notif 
		$notif = "";
		if(isset ($_GET ["notif"]) && !empty ($_GET ["notif"])){
			switch ($_GET ["notif"]){
				case 1:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Email tidak terdaftar dalam sistem',text: ''});</script>";
				break;
				case 2:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Password salah',text: ''});</script>";
				break;
				case 3:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Terdeteksi sebagai Spam..!!!',text: ''});</script>";
				break;
				case 4:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Email Anda tidak benar, Periksa kembali Email Anda ...!!!',text: ''});</script>";
				break;
				case 5:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'success', title: 'Selamat Anda telah berhasil Registrasi, Silahkan aktifasi akun Anda melalui link yang telah kami kirimkan di Emal Anda',text: ''});</script>";
				break;
				case 6:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'success', title: 'Selamat akun Anda telah aktif, silahkan login sesuai akun Anda',text: ''});</script>";
				break;
				case 7:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'info', title: 'Oops...Akun Anda belum aktif, silahkan diaktifasi terlebih dahulu',text: ''});</script>";
				break;
				case 8:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'success', title: 'Informasi Akun Anda telah terkirim ke Email Anda',text: ''});</script>";
				break;
				case 9:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'info', title: 'Anda telah keluar dari sistem, silahkan login kembali',text: ''});</script>";
				break;
				case 10:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Email sudah terdaftar, silahkan menggunakan email yang lain',text: ''});</script>";
				break;
				case 11:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Anda belum login atau telah keluar dari sistem, silahkan login kembali',text: ''});</script>";
				break;
			}
		}
		
	?>