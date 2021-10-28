<?php
		include "head.php";

		// Notif 
		$notif = "";
		if(isset ($_GET ["notif"]) && !empty ($_GET ["notif"])){
			switch ($_GET ["notif"]){
				case 1:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops.. file gambar error..!!!',text: ''});</script>";
				break;
				case 2:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'success', title: 'Proses simpan berhasil',text: ''});</script>";
				break;
				case 3:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'File gambar yang Anda upload tidak boleh melebihi 2MB',text: ''});</script>";
				break;
				case 4:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'error', title: 'Oops...Gagal upload foto, periksa kembali ekstensi file, yang diizinkan hanya JPG/JPEG/PNG',text: ''});</script>";
				break;
				case 5:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'success', title: 'Proses update berhasil',text: ''});</script>";
				break;
				case 6:
					$notif = "<script type='text/javascript'>Swal.fire({type: 'success', title: 'Proses hapus berhasil',text: ''});</script>";
				break;			
			}		
	}
		
	?>