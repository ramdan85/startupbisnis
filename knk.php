<?php
	
//$konek = mysqli_connect("localhost", "ramdansippbipa", "Ayomakancoto2021", "db_sippbipa2021");
$konek = mysqli_connect("localhost", "root", "", "db_startup_umi");
	
if(mysqli_connect_errno()){
	printf ("Gagal terkoneksi : ".mysqli_connect_error());
	exit();
}

/*$conn = mysqli_connect("localhost", "root", "", "db_startup_umi");
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil";
mysqli_close($conn);*/
	
?>
