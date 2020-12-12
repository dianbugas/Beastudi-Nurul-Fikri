<div class="container-fluid">
	<div class="row mt-12">
		<div class="col md-5">
			<div class="card-deck">
				<div class="col-xl-12 col-md-8 mb-5">
					<div class="card border-left-primary shadow h-100 py-2">
						<!-- Page Heading -->
						<div class="row">
							<div class="col-lg-12">
								<div class="modal-body">
									<?php foreach ($mahasiswa as $bes) { ?>
										<h3 class="text-gray-800">Edit Data

										</h3>
										<hr>
										<form action="<?= base_url() . 'mahasiswa/update'; ?>" method='post'>
											<input type="hidden" name="id" value="<?= $bes->id ?>">
											<div class="form-group row">
												<label for="menu" class="col-sm-2 col-form-label">Nama</label>
												<div class="col-sm-10">
													<input type="text" name="nama" class="form-control" id="nama" value="<?= $bes->nama ?>">
													<small class="form-text- text-danger"><?= form_error('nama'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-2 col-form-label">email</label>
												<div class="col-sm-10">
													<input type="text" name="email" class="form-control" id="email" value="<?= $bes->email ?>">
													<small class="form-text- text-danger"><?= form_error('email'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-2 col-form-label">Nim</label>
												<div class="col-sm-10">
													<input type="text" name="nim" max="10" class="form-control" id="nim" value="<?= $bes->nim ?>">
													<small class="form-text- text-danger"><?= form_error('nim'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-2 col-form-label">No HP</label>
												<div class="col-sm-10">
													<input type="text" name="telp" max="15" class="form-control" id="telp" value="<?= $bes->telp ?>">
													<small class="form-text- text-danger"><?= form_error('telp'); ?></small>
												</div>
											</div>
											<div class="form-group row">
												<label for="menu" class="col-sm-2 col-form-label">Kontribusi</label>
												<div class="col-sm-10">
													<select class="form-control" name="kontribusi_id" id="kontribusi_id">
														<?php foreach ($kontribusi as $s) : ?>
															<option <?= $s->id == $bes->kontribusi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->kontribusi; ?></option>
														<?php endforeach; ?>
													</select>
													<small class="form-text- text-danger"><?= form_error('kontribusi_id'); ?></small>
												</div>
											</div>
											<div class="form-file row justify-content-end">
												<div class="col-sm-10">
													<button type="submit" name="edit" class="btn btn-primary">Edit</button>
												</div>
											</div>
										</form>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
