<?php
    include "koneksi.php";
 $id=$_GET['id'];
 $modal=mysqli_query($db,"SELECT * FROM peserta WHERE id='$id'");
 while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header">
        <h5 class="modal-title">Edit Data Peserta Webhozz (popup)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
         <form id="form-update" action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="Modal Name">Nama Peserta</label>
                    <input type="hidden" name="id" id="edit-id"  class="form-control" value="<?php echo $r['id']; ?>" />
         <input type="text" name="nama_peserta" id="edit-nama_peserta" class="form-control" value="<?php echo $r['nama_peserta']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="Description">Alamat</label>
         <textarea name="alamat" id="edit_alamat" class="form-control"><?php echo $r['alamat']; ?></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="Description">Email</label>
         <input type="email" name="email" id="edit_email" class="form-control"><?php echo $r['email']; ?>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="Description">No Handphone</label>
       <input type="number" name="no_handphone" id="edit-no_handphone" class="form-control"><?php echo $r['no_handphone']; ?>
                   </div>

                <div class="form-group" style="padding-bottom: 20px;">
                 <label for="Date">Status Member</label>       
         <select name="date"  class="form-control" id="edit_status_member"><option value="0">Non Member</option><option value="1">Member</option></select>
                </div>

             <div class="modal-footer">
                 <button class="btn btn-success" type="submit">
                     Update
                 </button>

                 <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                  Cancel
                 </button>
             </div>

             </form>

             <?php } ?>

            </div>

           
        </div>
    </div>