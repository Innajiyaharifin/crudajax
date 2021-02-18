<?php 

$nama=$_POST['nama_nasabah'];
$nik=md5($_POST['nik']);

echo "Nama Nasabah adalah $nama<br>";
echo "NIK Nasabah adalah $nik";

 
 ?>