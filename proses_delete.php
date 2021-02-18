<?php
 include "koneksi.php";
 $id=$_POST['id'];
 $query=mysqli_query($db,"DELETE FROM peserta WHERE id='$id'");
 
 
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