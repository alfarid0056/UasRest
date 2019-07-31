<?php
//$koneksi1 = mysqli_connect("localhost","root","","food");
$koneksi1 = mysqli_connect("localhost","root",'',"ekskul");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
