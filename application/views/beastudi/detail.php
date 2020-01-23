<!-- Begin Page Content -->
<div class="container">
	<div class="card" style="width: 18rem;">
		<div class="card-header">
			Featured
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Cras justo odio</li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Vestibulum at eros</li>
		</ul>
	</div>
	<div class="row mt-4">
		<div class="col md-3">
			<h3>Detail Mahasiswa Beastudi</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<th scope="col">Nama Mahasiswa</th>
					<th scope="col"><?= $beastudi['nama_mh']; ?></th>
				</tr>
				<tr>
					<th scope="col">PIC</th>
					<th scope="col"><?= $beastudi['pic_id']; ?></th>
				</tr>
				<tr>
					<th scope="col">Jenis Kelamin</th>
					<th scope="col"><?= $beastudi['jk']; ?></th>
				</tr>
				<tr>
					<th scope="col">Program Studi</th>
					<th scope="col"><?= $beastudi['programstudi_id']; ?></th>
				</tr>
				<tr>
					<th scope="col">Semester</th>
					<th scope="col"><?= $beastudi['semester_id']; ?></th>
				</tr>
				<tr>
					<th scope="col">Angkatan</th>
					<th scope="col"><?= $beastudi['angkatan']; ?></th>
				</tr>
				<tr>
					<th scope="col">Kontribusi</th>
					<th scope="col"><?= $beastudi['kontribusi_id']; ?></th>
				</tr>
				<tr>
					<th scope="col">Keterangan</th>
					<th scope="col"><?= $beastudi['keterangan']; ?></th>
				</tr>
			</table>
			<a href="" class="btn btn-success">Edit</a>
			<a href="" class="btn btn-danger" onclick="return confirm('yakin menghapus data?');">delete</a>
			<a href="<?= base_url(); ?>beastudi/" class="btn btn-primary">Kembali</a>
		</div>
	</div>
</div>
</div>
