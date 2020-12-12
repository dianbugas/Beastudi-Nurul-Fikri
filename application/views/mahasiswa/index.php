<!-- https://www.mynotescode.com/import-excel-codeigniter-phpexcel/ -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="table-responsive">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h3 class="h3 mb-0 text-gray-800"><?= $title; ?></h3>
						<div class="col-6">
							<a href="#" class="btn btn-primary rata-kanan jr" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
							<a href="<?= base_url() . 'mahasiswa/form' ?>" class="btn btn-danger rata-kanan jr"><i class="fas fa-download fa-sm text-white-50"></i> Upload File</a>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<?= form_error('beastudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Email</th>
								<th scope="col">Nim</th>
								<th scope="col">No HP</th>
								<th scope="col">Kontribusi</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($mahasiswa as $mhs) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $mhs['nama']; ?></td>
									<td><?= $mhs['email']; ?></td>
									<td><?= $mhs['nim']; ?></td>
									<td><?= $mhs['telp']; ?></td>
									<td>
										<?php foreach ($kontribusi as $s) { ?>
										<?php if ($s->id == $mhs['kontribusi_id']) {
												echo $s->kontribusi;
											}
										} ?>
									</td>
									<th>
										<a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs['id']; ?>" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url(); ?>mahasiswa/delete/<?= $mhs['id']; ?>" class="btn btn-danger btn-circle btn-sm">
											<i class="fas fa-trash"></i>
										</a>
									</th>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Tambah Data Mahasiswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('mahasiswa/insert'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" name="email" id="email" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" max="10" placeholder="Nim" name="nim" id="nim" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" max="15" placeholder="No HP" name="telp" id="telp" />
					</div>
					<div class="form-group">
						<select class="form-control" id="kontribusi_id" name="kontribusi_id">
							<option class="hidden" selected disabled>Pilih Jenis Kontribusi</option>
							<?php foreach ($kontribusi as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->kontribusi ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('kontribusi_id'); ?></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('mahasiswa/do_upload');
			?>
			<input type="hidden" id="email" name="email" value="<?= $user['email']; ?>">
			<div class="modal-body">
				<div class="file-loading">
					<div class="col-12">
						<input type="file" class="custom-file-input" id="gambar" name="gambar">
						<label class="custom-file-label" for="customFile"><?= $user['gambar']; ?></label>
						<span>
							File yang akan Anda Upload sebaiknya memiliki berukuran tidak lebih dari 2MB
						</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="<?= base_url("index.php/mahasiswa/lakukan_download") ?>" class="btn btn-danger"><i class="fas fa-download fa-sm text-white-50"></i> Download</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
				<button type="submit" class="btn btn-primary" title="Your custom upload logic">Simpan</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
