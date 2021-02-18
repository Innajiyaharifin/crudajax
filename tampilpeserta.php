<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	.kontenform{
		display: none;
	}
</style>

</head>

<body>
<center>
	<table border="1" cellpadding="10">
		<tr>
			<th>No</th>
			<th>Nama Peserta</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>No Handphone</th>
			<th>Status Member</th>
			<th>Action</th>
		</tr>
		<?php 

			include "koneksi.php";
			$sql = "SELECT * FROM peserta";
			$execute = mysqli_query($db, $sql);
			$i=1;
			while ($datadb=mysqli_fetch_array($execute)) {
				$id=$datadb['id'];
				$nama=$datadb['nama_peserta'];
				$hp=$datadb['no_handphone'];
				$imels=$datadb['email'];
				$alamat=$datadb['alamat'];
				$status_member=$datadb['status_member'];
				if ($status_member==0) {
					$ket="Non Member";
				}
				else{
					$ket=" Member";
			
				}
			?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $nama ?></td>
				<td><?php echo $hp ?></td>
				<td><?php echo $imels ?></td>
				<td><?php echo $alamat ?></td>
				<td><?php echo $ket ?></td>
				<td><a href="formedit.php?id=<?php echo $id?>"><button>Edit</button></a><a href=""><button>Hapus</button></a></td>
			</tr>
			<?php
			}

		 ?>
	</table>
			<?php 
				//$idget=$_GET['id'];
				/*$sql1="SELECT * FROM peserta where id='$id'";
				$query = mysqli_query($db, $sql1);
				$dataedit = mysqli_fetch_array($sql1);
				$namaku=$dataedit['nama_peserta'];
*/
			 ?>
			<div class="kontenform">
			<form id="#formedit">
				<table>
					<tr>
						<td>Nama :</td>
						<td><input type="text" name="" value="<?php echo $namaku?>"></td>
					</tr>
				</table>
			</form>
			</div>


</center>
</body>
</html>