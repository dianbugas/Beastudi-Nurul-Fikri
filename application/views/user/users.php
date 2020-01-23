<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg">
			<div class="card-body">
				<div class="table-responsive">
					<!-- untuk menampilkan erorr -->
					<?= form_error('dana', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					<?= $this->session->flashdata('message'); ?>
					<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newRoleModal">Tambah User</a>
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Email</th>
								<th scope="col">role</th>
								<th scope="col">Active</th>
								<th scope="col">Tanggal Daftar</th>
								<th scope="col">Image</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($users as $us) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $us['name']; ?></td>
									<td><?= $us['email']; ?></td>
									<td>
										<?php foreach ($role as $k) { ?>
										<?php if ($k->id == $us['role_id']) {
												echo $k->role;
											}
										} ?>
									</td>
									<td><?= $us['is_active']; ?></td>
									<td><?= date('d F Y', $user['date_created']); ?></td>
									<td><img src="<?= base_url('assets/img/profile/') . $us['image']; ?>" class="img-circle" alt="..." width="40" height="40"></td>
									<td>
										<a href="<?= base_url(); ?>admin/editusers/<?= $us['id']; ?>" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-edit"></i>
										</a>
										<a href="<?= base_url(); ?>admin/hapus/<?= $us['id']; ?>" class="btn btn-danger btn-circle btn-sm">
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
<!-- /.container-fluid -->
</div>

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Tambah Users</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- method="post" ketika input tidak terlihat di url -->
			<!-- action untuk mengarakan controller role -->
			<form action="<?= base_url('admin/tambahuser'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Nama User" name="name" id="name" />
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" name="email" id="email" />
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
					</div>
					<div class="form-group">
						<select name="role_id" id="role_id" class="form-control">
							<option class="hidden" selected disabled> -- Pilih Role User --</option>
							<?php
							$query = $this->db->query("SELECT * FROM user_role")->result();
							foreach ($query as $p) : ?>
								<option value="<?= $p->id; ?>"><?= $p->role; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
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
