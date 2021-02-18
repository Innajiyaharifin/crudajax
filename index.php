<!doctype html>
<html lang="en">
<head>
<title>Webhozz</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="Aguzrybudy" name="author"/>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"> <!-- Font Awesome --> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> <!-- Datatable --> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>



</head>
<body>
 
<div class="container mt-5 mb-5">
  <h2>CRUD PHP MySQLi Modal Bootstrap</h2>
  <p class="text-right"><a href="javascript.void(0)" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a> <a href="datatable.php" class="btn btn-info" >Datatable</a></p>      

<table id="mytable" class="table table-bordered">
    <thead>
      <th>No</th>
      <th>Nama Peserta</th>
      <th>Alamat</th>
      <th>No Handphone</th>
      <th>Email</th>
      <th>Status Member</th>
      <th>Action</th>
    </thead>
 <tbody id="modal-data">
<?php 
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($db,"SELECT * FROM peserta");
  while($r=mysqli_fetch_array($modal)){
  $no++;
       
?>

  <tr>
      <td><?php echo $r['id']; ?></td>
      <td><?php echo  $r['nama_peserta']; ?></td>
      <td><?php echo  $r['alamat']; ?></td>
      <td><?php echo  $r['no_handphone']; ?></td>

      <td><?php echo  $r['email']; ?></td>
      <td><?php echo  $r['status_member']; ?></td>
      <td>
         <a href="javascript:void(0)" class='open_modal' id='<?php echo $r['id']; ?>'>Edit</a>
         <a href="javascript:void(0)" class="delete_modal" data-id='<?php echo $r['id']; ?>'>Delete</a>
      </td>
  </tr>
 

<?php } ?>
</tbody>
</table>
</div>

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

       <div class="modal-header">
        <h5 class="modal-title">Form Tambah Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <form id="form-save" action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Nama Peserta</label>
                <input type="text" name="nama_peserta"  id="nama_peserta" class="form-control" placeholder="Nam {eserta" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Description">Alamat</label>
                   <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required/></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">No Hanpdhone</label>
                  <input type="text"  id="no_handphone" name="no_handphone"  class="form-control" plcaceholder="Timestamp" required/>
                </div><div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Email</label>
                  <input type="text" name="email"  class="form-control" plcaceholder="Email"  id="email" required/>
                </div><div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Status Member</label>
                  <select name="status_member"  class="form-control"  id="status_member" >
                    <option value="0">Non Member</option>
                    <option value="1">Member</option>
                  </select>
                 
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Save
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>
   
<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
   
   <div class="modal-header">
        <h5 class="modal-title">Are you sure to delete this data ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <button type="button"class="btn btn-danger" id="delete_link">Delete</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
 $(document).ready(function () {
   $(".open_modal").click(function(e) {
       var m = $(this).attr("id");
     $.ajax({
       url: "modal_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
       $("#ModalEdit").html(ajaxData);
       $("#ModalEdit").modal('show',{backdrop: 'true'});
      }
   });
        });
    });
</script>


<!-- Ajax untuk menyimpan data--> 
<script type="text/javascript">
    $("#form-save").on('submit', function(e){
  e.preventDefault();
  $.ajax({
   method:  $(this).attr("method"), // untuk mendapatkan attribut method pada form
   url: $(this).attr("action"),  // untuk mendapatkan attribut action pada form
   data: { 
    nama_peserta: $('#nama_peserta').val(),
    no_handphone: $('#no_handphone').val(),
    email: $('#email').val(),
    alamat: $('#alamat').val(),
    status_member: $('#status_member').val(),
   },
   success:function(response){
    console.log(response);
    $("#modal-data").empty();
    $("#modal-data").html(response.data);
    $("#ModalAdd").modal('hide');
    $('#nama_peserta').val('');
    $('#no_handphone').val('');
    $('#alamat').val('');
    $('#email').val('');
    $('#status_member').val('');
   },
   error: function(e)
   {
    // Error function here
   },
   beforeSend:function(b){
    // Before function here
   }
  })
  .done(function(d) {
   // When ajax finished
  });
 });
</script>

<!-- Ajax untuk update data--> 
<script type="text/javascript">
    $('body').on('submit','#form-update', function(e){
  e.preventDefault();
  $.ajax({
   method:  $(this).attr("method"), // untuk mendapatkan attribut method pada form
   url: $(this).attr("action"),  // untuk mendapatkan attribut action pada form
   data: { 
    id: $('#edit-id').val(),
    nama_peserta: $('#edit-nama_peserta').val(),
    alamat: $('#edit_alamat').val(),
    email: $('#edit_email').val(),
    status_member: $('#edit_status_member').val(),
    no_handphone: $('#edit-no_handphone').val(),
   },
   success:function(response){
    console.log(response);
    $("#modal-data").empty();
    $("#modal-data").html(response.data);
    $("#ModalEdit").modal('hide');
   },
   error: function(e)
   {
    // Error function here
   },
   beforeSend:function(b){
    // Before function here
   }
  })
  .done(function(d) {
   // When ajax finished
  });
 });
</script>

<!-- Ajax untuk delete data--> 
<script type="text/javascript">
    $('body').on('click','.delete_modal', function(e){
  let id = $(this).data('id');
  $('#modal_delete').modal('show', {backdrop: 'static'});
  $("#delete_link").on("click", function(){
   e.preventDefault();
   $.ajax({
    method:  'POST', // untuk mendapatkan attribut method pada form
    url: 'proses_delete.php',  // untuk mendapatkan attribut action pada form
    data: { 
     id: id
    },
    success:function(response){
     console.log(response);
     $("#modal-data").empty();
     $("#modal-data").html(response.data);
     $("#modal_delete").modal('hide');
    },
    error: function(e)
    {
     // Error function here
    },
    beforeSend:function(b){
     // Before function here
    }
   })
   .done(function(d) {
    // When ajax finished
   });
  });
 });
</script>

</body>
</html>