<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
					<h3 class="h3 mb-0 text-gray-800"><?= $title; ?></h3>
					<a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
				</div>
				<div class="row mt-3">
					<div class="col-md-12">
						<?= form_error('beastudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
						<?= $this->session->flashdata('message'); ?>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Pic</th>
								<th scope="col">Nama Mahasiswa</th>
								<th scope="col">Semester</th>
								<th scope="col">Angkatan</th>
								<th scope="col">Tanggal Kontribusi</th>
								<th scope="col">Status</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($beastudi as $bs) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $bs['nama']; ?></td>
									<td><?php foreach ($mahasiswa as $s) { ?>
										<?php if ($s->id == $bs['nama_id']) {
												echo $s->nama;
											}
										} ?>
									</td>
									<td><?= $bs['semester_id']; ?></td>
									<td><?= $bs['angkatan']; ?></td>
									<td><?= $bs['tgl']; ?></td>
									<td><?= $bs['status']; ?></td>
									<td>
										<a href="<?= base_url(); ?>beastudi/detail/<?= $bs['beastudi_id']; ?>" class="btn btn-info btn-circle btn-sm">
											<i class="fas fa-info-circle"></i>
										</a>
										<a href="<?= base_url(); ?>beastudi/edit/<?= $bs['beastudi_id']; ?>" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url(); ?>beastudi/delete/<?= $bs['beastudi_id']; ?>" class="btn btn-danger btn-circle btn-sm">
											<i class="fas fa-trash"></i>
										</a>
									</td>
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

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="register-heading">Identitas Mahasiswa Beastudi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('beastudi/insert'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<select name="pic_id" id="pic_id" class="form-control">
							<option value="" selected disabled>Pilih PIC</option>
							<?php
							$query = $this->db->query("SELECT * FROM pic");
							foreach ($query->result() as $p) : ?>
								<option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
							<?php endforeach; ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<select class="form-control" name="nama_id" id="nama_id">
							<option class="hidden" selected disabled>Pilih Nama Mahasiswa</option>
							<?php foreach ($mahasiswa as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->nama ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('nama_id'); ?></small>
					</div>
					<div class="form-group">
						<label class="radio inline">
							<input type="radio" name="jk" value="Laki-Laki" checked>
							<span> Laki - Laki </span>
						</label>
						<label class="radio inline">
							<input type="radio" name="jk" value="Perempuan">
							<span> Perempuan </span>
						</label>
						<small class="form-text- text-danger"><?= form_error('jk'); ?></small>
					</div>
					<div class="form-group">
						<select class="form-control" id="kelas_id" name="kelas_id">
							<option class="hidden" selected disabled>Pilih Kelas</option>
							<?php foreach ($kelas as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->kelas ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('kelas'); ?></small>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" placeholder="Semester" id="semester" name="semester" />
						<small class="form-text- text-danger"><?= form_error('semester'); ?></small>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" placeholder="Angkatan (Tahun)" id="angkatan" name="angkatan" />
					</div>
					<div class="form-group">
						<select class="form-control" name="programstudi" id="programstudi">
							<option class="hidden" selected disabled>Pilih Program Studi</option>
							<?php foreach ($programstudi as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->programstudi ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('programstudi'); ?></small>
					</div>
					<div class="form-group">
						<select class="form-control" id="kontribusi" name="kontribusi">
							<option class="hidden" selected disabled>Pilih Jenis Kontribusi</option>
							<?php foreach ($kontribusi as $k) { ?>
								<option value="<?= $k->id ?>"> <?= $k->kontribusi ?></option>
							<?php } ?>
						</select>
						<small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
					</div>

					<div class="form-group">
						<label class="radio inline">
							<input type="radio" name="status" value="Sudah Kontribusi" checked>
							<span> Sudah Kontribusi </span>
						</label>
						<label class="radio inline">
							<input type="radio" name="status" value="Belum Kontribusi">
							<span> Belum Kontribusi </span>
						</label>
						<small class="form-text- text-danger"><?= form_error('jk'); ?></small>
					</div>
					<div class="form-group">
						<input name="tgl" id="tgl" class="form-control datepicker" type="text" placeholder="  Tanggal Kontribusi">
						<small class="form-text- text-danger"><?= form_error('tgl'); ?></small>
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="5" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
