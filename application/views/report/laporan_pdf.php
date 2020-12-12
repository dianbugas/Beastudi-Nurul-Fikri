 <!DOCTYPE html>
 <html lang="en">

 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<title>Document</title>
 </head>

 <body>
 	<table class="table table-hover">
 		<thead>
 			<tr>
 				<th scope="col">No</th>
 				<th scope="col">PIC</th>
 				<th scope="col">Nama Mahasiswa</th>
 				<th scope="col">Semester</th>
 				<th scope="col">Aksi</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php $i = 1; ?>
 			<?php foreach ($beastudi as $rp) : ?>
 				<tr>
 					<th scope="row"><?= $i++; ?></th>
 					<td><?= $rp['nama']; ?></td>
 					<td><?php foreach ($mahasiswa as $s) { ?>
 						<?php if ($s->id == $rp['nama_id']) {
									echo $s->nama;
								}
							} ?></td>
 					<td><?= $rp['semester']; ?></td>
 				</tr>
 			<?php endforeach; ?>
 		</tbody>
 	</table>
 </body>

 </html>
