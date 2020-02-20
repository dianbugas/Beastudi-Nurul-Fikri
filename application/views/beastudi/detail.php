<!-- Begin Page Content -->
<div class="container">
	<div class="row mt-8">
		<div class="col md-12">
			<div class="card-deck">
				<div class="col-xl-7 col-md-8 mb-7">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="modal-body">
							<?php foreach ($beastudi1 as $bes) { ?>
								<form action="#" method='get'>
									<h3>Detail Data</h3>
									<hr>
									<input type="hidden" name="id" value="<?= $bes->id ?>">
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">PIC</label>
										<div class="col-sm-7">
											<select name="pic_id" id="pic_id" class="form-control" disabled>
												<?php
												$query = $this->db->query("SELECT * FROM pic")->result();
												foreach ($query as $p) : ?>
													<option <?php if ($p->id == $bes->pic_id) {
																echo 'selected';
															} ?> value="<?= $p->id; ?>"><?= $p->nama; ?>
													</option>
												<?php endforeach; ?>
											</select>
											<small class="form-text- text-danger"><?= form_error('menu_id'); ?></small>
										</div>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-12 col-form-label">Nama
											<a class="float-right"><?= $bes->nama_mh ?></a>
										</label>
									</div>
									<hr>
									<div class="form-group row">
										<label for="jk" class="col-sm-12 col-form-label">Jenis Kelamin
											<a class="float-right"><?= $beastudi['jk']; ?></a>
										</label>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Semester</label>
										<div class="col-sm-7">
											<select class="form-control" name="semester" id="semester" disabled>
												<?php foreach ($semester as $s) : ?>
													<option <?= $s->id == $bes->semester_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->semester; ?></option>
												<?php endforeach; ?>
											</select>
											<small class="form-text- text-danger"><?= form_error('semester'); ?></small>
										</div>
									</div>
									<div class="form-group row">
										<label for="menu" class="col-sm-12 col-form-label">Angkatan
											<a class="float-right"><?= $beastudi['angkatan']; ?></a>
										</label>
									</div>
									<hr>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
										<div class="col-sm-7">
											<select class="form-control" name="programstudi" id="programstudi" disabled>
												<?php foreach ($programstudi as $s) : ?>
													<option <?= $s->id == $bes->programstudi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->programstudi; ?></option>
												<?php endforeach; ?>
											</select>
											<small class="form-text- text-danger"><?= form_error('programstudi'); ?></small>
										</div>
									</div>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
										<div class="col-sm-7">
											<select class="form-control" name="kontribusi" id="kontribusi" disabled>
												<?php foreach ($kontribusi as $s) : ?>
													<option <?= $s->id == $bes->kontribusi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->kontribusi; ?></option>
												<?php endforeach; ?>
											</select>
											<small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
										</div>
									</div>
									<div class="form-group row">
										<label for="menu" class="col-sm-3 col-form-label">Keterangan</label>
										<div class="col-sm-7">
											<textarea class="form-control" rows="5" name="keterangan" id="keterangan" readonly><?= $bes->keterangan; ?></textarea>
										</div>
									</div>
									<div class=" form-file row justify-content-end">
										<div class="col-sm-9">
											<a href="<?= base_url(); ?>beastudi/" class="btn btn-primary">Kembali</a>
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
