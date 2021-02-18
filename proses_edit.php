<?php
 include "koneksi.php";
$id = $_POST['id'];
$nama_peserta = $_POST['nama_peserta'];
$no_handphone = $_POST['no_handphone'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$status_member = $_POST['status_member'];
 $query=mysqli_query($db,"UPDATE peserta SET nama_peserta = '$nama_peserta',
 	alamat = '$alamat',
 	email = '$email' ,
 	no_handphone = '$no_handphone',
 	status_member = '$status_member'  
 	WHERE id = '$id'");
 
 if($query) // jika insert data berhasil
 {
  // fungsi untuk membuat format json
  header('Content-Type: application/json');
  // untuk load data yang sudah ada dari tabel
  $content = file_get_contents('http://localhost/webdesign/ajax_data.php', true);
  $data = array('status'=>'success', 'data'=> $content);
  echo json_encode($data);
 }
 else // jika insert data gagal
 {
  $data = array('status'=>'failed', 'data'=> null);
  echo json_encode($data);
 }
?>