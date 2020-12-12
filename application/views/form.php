<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Upload File</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>">

	<!-- multi -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
		<div class="container-fluid">
			<div class="card shadow mb-4 mt-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="table-responsive">
							<a class="btn btn-danger " href="<?php echo base_url("excel/format.xlsx"); ?>"><i class="fas fa-download fa-sm text-white-50"></i> Download Format</a>
							<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
							<form method="post" action="<?php echo base_url("Mahasiswa/form"); ?>" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="file-loading">
										<div class="form-group row">
											<div class="col-6">
												<input type="file" class="custom-file-input" id="file" name="file">
												<label class="custom-file-label" for="customFile"></label>
												<span>
													File yang akan Anda Upload sebaiknya memiliki berukuran tidak lebih dari 2MB
												</span>
											</div>
											<div class="col-2">
												<input class="btn btn-primary" type="submit" name="preview" value="Preview">
											</div>
										</div>
									</div>
								</div>
							</form>

							<?php
							if (isset($_POST['preview'])) {
								if (isset($upload_error)) {
									echo "<div style='color: red;'>" . $upload_error . "</div>";
									die;
								}
								echo "<form method='post' action='" . base_url("Mahasiswa/import") . "'>";
								echo "<div style='color: red;' id='kosong'>
									Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
									</div>";
								echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
						<thead>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Nim</th>
								<th>No HP</th>
								<th>Kontribusi</th>
							</tr>
						</thead>
						<tbody>";
								$numrow = 1;
								$kosong = 0;
								foreach ($sheet as $row) {
									$nama = $row['A'];
									$email = $row['B'];
									$nim = $row['C'];
									$telp = $row['D'];
									$kontribusi_id = $row['E'];
									if ($nama == "" && $email == "" && $telp == "" && $nim == "" && $kontribusi_id == "")
										continue;
									if ($numrow > 1) {
										$nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'";
										$email_td = (!empty($email)) ? "" : " style='background: #E07171;'";
										$nim_td = (!empty($nim)) ? "" : " style='background: #E07171;'";
										$telp_td = (!empty($telp)) ? "" : " style='background: #E07171;'";
										$kontribusi_id_td = (!empty($kontribusi_id)) ? "" : " style='background: #E07171;'";
										if ($nama == "" or $email == "" or $telp == "" or $nim == "" or $kontribusi_id == "") {
											$kosong++;
										}
										echo "<tr>";
										echo "<td" . $nama_td . ">" . $nama . "</td>";
										echo "<td" . $email_td . ">" . $email . "</td>";
										echo "<td" . $nim_td . ">" . $nim . "</td>";
										echo "<td" . $telp_td . ">" . $telp . "</td>";
										echo "<td" . $kontribusi_id_td . ">" . $kontribusi_id . "</td>";
										echo "</tr>";
									}
									$numrow++;
								}
								echo "</tbody></table>";
								if ($kosong > 0) {
							?>
									<script>
										$(document).ready(function() {
											$("#jumlah_kosong").html('<?php echo $kosong; ?>');
											$("#kosong").show();
										});
									</script>
							<?php
								} else {
									echo "<hr>";
									echo "<button class='btn btn-primary' type='submit' name='import'>Import</button> ";
									echo "<a class='btn btn-secondary	' href='" . base_url("Mahasiswa") . "'>Cancel</a>";
								}
								echo "</form>";
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	</div>
