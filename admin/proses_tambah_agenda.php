<?php
include "../knk.php";

$judul_agenda = mysqli_real_escape_string($konek, $_POST['judul_agenda']);
$tgl_agenda = mysqli_real_escape_string($konek, $_POST['tgl_agenda']);
$deskripsi_agenda = mysqli_real_escape_string($konek, $_POST['deskripsi_agenda']);
$kondisi = mysqli_real_escape_string($konek, $_POST['kondisi']);
$namafilefoto='fotoagenda'.rand();


if($_POST['simpan']){
$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$nama_baru = $namafilefoto.'.'.$ekstensi;
$ukuran	= $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if ($ukuran==0){
					/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=1');
					    </script>                                  
					";*/
					header("location:agenda.php?notif=1");
				}
				//jika  ukurannya lebih besar dari 2MB
				else if($ukuran < 2097152){
					move_uploaded_file($file_tmp, 'ft/agenda/'.$nama_baru);
					mysqli_query($konek, "INSERT INTO tbl_agenda (judul_agenda, tgl_agenda, deskripsi_agenda, foto, kondisi) VALUES ('$judul_agenda','$tgl_agenda','$deskripsi_agenda','$nama_baru','$kondisi')");
					/*echo "
					    <script type='text/javascript'>
					     window.location.replace('agenda.php?notif=2');
					    </script>                                  
					";*/
					header("location:agenda.php?notif=2");
						
				}else{
					/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=3');
					    </script>                                  
					";*/
					header("location:agenda.php?notif=3");
				}
			}else{
				/*echo "
					    <script type='text/javascript'>
					     window.location.replace('startup.php?notif=4');
					    </script>                                  
					";*/
				header("location:agenda.php?notif=4");
			}
}
?>