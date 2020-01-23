<!-- Begin Page Content -->
<div class="container">
	<div class="row mt-4">
		<div class="col md-3">
			<h3>Detail Mahasiswa Beastudi</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<th class="w-25">Nama Mahasiswa</th>
					<th class="w-15"><?= $beastudi['nama_mh']; ?></th>
				</tr>
				<tr>
					<th scope=" col">PIC</th>
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
			<a href="<?= base_url(); ?>beastudi/" class="btn btn-primary">Kembali</a>
		</div>
	</div>
</div>
</div>
