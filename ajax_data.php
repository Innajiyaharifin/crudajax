<?php 
  //menampilkan data mysqli
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($db,"SELECT * FROM peserta");
  while($r=mysqli_fetch_array($modal)){
  $no++;
       
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['id']; ?></td>
      <td><?php echo  $r['nama_peserta']; ?></td>
      <td><?php echo  $r['alamat']; ?></td>
      <td><?php echo  $r['no_handphone']; ?></td>
            <td><?php echo  $r['email']; ?></td>

      <td><?php echo  $r['status_member']; ?></td>
      <td>
         <a href="javascript:void(0)" class='open_modal' id='<?php echo  $r['id']; ?>'>Edit</a>
         <a href="javascript:void(0)" class="delete_modal" data-id='<?php echo  $r['id']; ?>'>Delete</a>
      </td>
  </tr>
<?php } ?>