<div class="container-fluid">
	<!-- <div class="row mt-4"> -->
	<div class="row col-mb-12">
		<?php if ($_SESSION['role_id'] == 1) : ?>
			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-4 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kontribusi</a>
								</div>
								<div>
									<?php
									$i = 0;
									$jumlah = 0;
									?>
									<?php foreach ($beastudi as $bs) : ?>
										<?php $i++; ?>
									<?php endforeach; ?>
									<a href="<?= base_url(); ?>beastudi/" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $jumlah = $i; ?>
										Beastudi
									</a>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-4 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>pic/" class="text-xs font-weight-bold text-warning text-uppercase mb-1">PIC</a>
								</div>
								<div>
									<a href="<?= base_url(); ?>pic/" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $total_pic; ?>
										PIC
									</a>
								</div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url(); ?>pic/">
									<i class="fas fa-comments fa-2x text-gray-300"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-info text-uppercase mb-1">Report</a>
								</div>
								<div>
									<?php
									$i = 0;
									$jumlah = 0;
									?>
									<?php foreach ($beastudi as $bs) : ?>
										<?php $i++; ?>
									<?php endforeach; ?>
									<a href="<?= base_url('report/laporan_pdf') ?>" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $jumlah = $i; ?>
										Report
									</a>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php elseif ($_SESSION['role_id'] == 3) : ?>
			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kontribusi</a>
								</div>
								<div>
									<?php
									$i = 0;
									$jumlah = 0;
									?>
									<?php foreach ($beastudi as $bs) : ?>
										<?php $i++; ?>
									<?php endforeach; ?>
									<a href="<?= base_url(); ?>beastudi/" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $jumlah = $i; ?>
										Beastudi
									</a>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-info text-uppercase mb-1">Report</a>
								</div>
								<div>
									<?php
									$i = 0;
									$jumlah = 0;
									?>
									<?php foreach ($beastudi as $bs) : ?>
										<?php $i++; ?>
									<?php endforeach; ?>
									<a href="<?= base_url('report/laporan_pdf') ?>" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $jumlah = $i; ?>
										Report
									</a>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php elseif ($_SESSION['role_id'] == 2) : ?>
			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kontribusi</a>
								</div>
								<div>
									<?php
									$i = 0;
									$jumlah = 0;
									?>
									<?php foreach ($beastudi as $bs) : ?>
										<?php $i++; ?>
									<?php endforeach; ?>
									<a href="<?= base_url(); ?>beastudi/" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $jumlah = $i; ?>
										Beastudi
									</a>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div>
									<a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-info text-uppercase mb-1">Report</a>
								</div>
								<div>
									<?php
									$i = 0;
									$jumlah = 0;
									?>
									<?php foreach ($beastudi as $bs) : ?>
										<?php $i++; ?>
									<?php endforeach; ?>
									<a href="<?= base_url('report/laporan_pdf') ?>" class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $jumlah = $i; ?>
										Report
									</a>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php else : ?>
			<p>Data Kosong</p>
		<?php endif; ?>
	</div>
	<div class="card shadow mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">PIC</th>
								<th scope="col">Nama Mahasiswa</th>
								<th scope="col">Semester</th>
								<th scope="col">Angkatan</th>
								<th scope="col">Tgl Kontribusi</th>
								<th scope="col">Kelas</th>
								<th scope="col">Jenis Kontribusi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($beastudi as $bs) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?php foreach ($picc as $s) { ?>
										<?php if ($s->id == $bs['pic_id']) {
												echo $s->nama;
											}
										} ?></td>
									<td><?php foreach ($mahasiswa as $s) { ?>
										<?php if ($s->id == $bs['nama_id']) {
												echo $s->nama;
											}
										} ?></td>
									<td><?= $bs['semester_id']; ?></td>
									<td><?= $bs['angkatan']; ?></td>
									<td><?= $bs['tgl']; ?></td>
									<td>
										<?php foreach ($kelas as $s) { ?>
										<?php if ($s->id == $bs['kelas_id']) {
												echo $s->kelas;
											}
										} ?>
									</td>
									<td>
										<?php foreach ($kontribusi as $s) { ?>
										<?php if ($s->id == $bs['kontribusi_id']) {
												echo $s->kontribusi;
											}
										} ?>
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
<!-- End of Main Content -->
