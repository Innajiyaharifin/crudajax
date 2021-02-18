<?php 

$peserta=['Kiki', 'Ina', 'Danny','Dewinta'];
$nilai = [90,80,70,50,60];
 ?>
 <center>
 <h1>Nama Nama Peserta Webhozz</h1>
 <p>Buat menggunakan Array dan Perulangan</p>
 <table border="1" cellpadding="20" cellspacing="" style="border-radius: 10px;">
 	<tr>
 		<th>No</th>
 		<th style="width: 300px;">Nama</th>
 		<th>Nilai</th>
 	</tr>
 	<?php 
 		for ($i=0; $i <sizeof($peserta); $i++) { 
 			# code...
 			$angka=$i+1;
 		?>
 		<tr>
 			<td><?php echo $angka?></td>
 			<td><?php echo $peserta[$i]?></td>
 			<?php if ($nilai[$i]>60)
 					{
 						?>
 						<td style = "background-color:white;color: black;" ><?php echo $nilai[$i]?></td>
 						<?php }
 						else
 							{
 						?>
 						<td style = "background-color: red;" ><?php echo $nilai[$i]?></td>
 					<?php } ?>
 		</tr>
 		<?php
 		}

 	 ?>
 </table>
 </center>