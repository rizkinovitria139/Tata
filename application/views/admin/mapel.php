		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahmapelModal">Tambah Mapel</a>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<form action="" method="POST">
							<select class="form-control" name="formal" onchange="location = this.value;">
								<option value="" selected>Filter </option>
								<?php foreach ($kelas as $k) { ?>
									<option value="<?= base_url('admin/get_mapel_by/' . $k['id_kelas']) ?>">
										<?php echo $k['nama_kelas'] . ' - ' . $k['tahun']; ?></option>
								<?php }; ?>

					</div>
					</select>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg">
			<?= form_error('mapel', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

			<?= $this->session->flashdata('mapel_message'); ?>

			<div class="row">

				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Mata Pelajaran</th>
							<th scope="col">Nilai KKM</th>
							<th scope="col">Kelas</th>
							<th scope="col">Semester</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($mapel as $m) : ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $m['nama_mapel']; ?></td>
								<td><?= $m['nilai_kkm']; ?></td>
								<td><?= $m['nama_kelas']; ?></td>
								<td><?= $m['semester']; ?></td>

								<td>
									<a class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editmapelModal<?= $m['id_mapel']; ?>">
										<i class="far fa-edit"></i>
									</a>
									<a class="btn btn-danger" href="<?= base_url('admin/delete_mapel/') . $m['id_mapel']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>

			</div>

		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

		<!-- Modal Tambah Mapel -->
		<div class="modal fade" id="tambahmapelModal" tabindex="-1" aria-labelledby="tambahmapelModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<?php
						if (validation_errors() != false) {
						?>
							<div class="alert alert-danger" role="alert">
								<?php echo validation_errors(); ?>
							</div>
						<?php
						}
						?>
						<h5 class="modal-title" id="tambahmapelModalLabel">Tambah Mapel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url(); ?>admin/tambah_mapel" method="post">
						<div class="modal-body">
							<!-- <span>ID Kelas</span>
							<div class="form-group">
								<input type="text" class="form-control" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas">
							</div> -->
							<span>Nama Mapel</span>
							<div class="form-group">
								<input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Masukkan Nama Mapel">
							</div>

							<span>Nilai KKM</span>
							<div class="form-group">
								<input type="text" class="form-control" id="nilai_kkm" name="nilai_kkm" placeholder="Masukkan Nilai KKM">
							</div>

							<div class="form-group">
								<span>Tingkat </span>
								<select class="form-control" name="kelas" id="kelas">
									<option value="" selected> </option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
								</select>
							</div>

							<span>Kelas</span>
							<div class="form-group">
								<select class="form-control" name="id_kelas" id="id_kelas">
									<option value="" selected></option>
									<?php foreach ($kelas as $k) { ?>
										<option value="<?= $k['id_kelas'] ?>">
											<?php echo $k['id_kelas'] . ' - ' . $k['nama_kelas']; ?></option>
									<?php }; ?>
								</select>
							</div>

							<div class="form-group">
								<span>Semester</span>
								<select class="form-control" name="semester" id="semester">
									<option value="" selected> </option>
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Modal Tambah Mapel -->

		<!-- Start Modal Edit Mapel -->
		<?php foreach ($mapel as $m) : ?>
			<div class="modal fade" id="editmapelModal<?= $m['id_mapel'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editmapelModal<?= $m['id_mapel']; ?>Label" aria-hidden="true">
				<div class="modal-dialog" kelas="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editMenuModal<?= $m['id_mapel'] ?>">Edit Mapel</h5>
							<buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</buttond>
						</div>
						<form action="<?= base_url('admin/edit_mapel/' . $m['id_mapel']); ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<span>ID Mapel</span>
									<input type="text" class="form-control" readonly value="<?= $m['id_mapel']; ?>" id="id_mapel" name="id_mapel" placeholder="Id mapel">
								</div>
								<div class="form-group">
									<span>Nama Mapel</span>
									<input type="text" class="form-control" value="<?= $m['nama_mapel']; ?>" id="nama_mapel" name="nama_mapel" placeholder="Nama Mapel">
								</div>
								<div class="form-group">
									<span>Nilai KKM</span>
									<input type="text" class="form-control" value="<?= $m['nilai_kkm']; ?>" id="nilai_kkm" name="nilai_kkm" placeholder="Nilai KKM">
								</div>

								<div class="form-group">
									<span>Tingkat </span>
									<select class="form-control" name="kelas" id="kelas">
										<option value="<?= $m['kelas']; ?>" selected><?= $m['kelas']; ?></option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
									</select>
								</div>

								<span>Kelas</span>
								<div class="form-group">
									<select class="form-control" name="id_kelas" id="id_kelas">
										<option value="<?= $m['id_kelas']; ?>" selected>
											<?php echo $m['id_kelas'] . ' - ' . $m['nama_kelas']; ?></option>
										<?php foreach ($kelas as $k) { ?>
											<option value="<?= $k['id_kelas'] ?>">
												<?php echo $k['id_kelas'] . ' - ' . $k['nama_kelas']; ?></option>
										<?php }; ?>
									</select>
								</div>

								<div class="form-group">
									<span>Semester</span>
									<select class="form-control" name="semester" id="semester">
										<option value="<?= $m['semester']; ?>" selected> <?= $m['semester']; ?></option>
										<option value="1">1</option>
										<option value="2">2</option>
									</select>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<!-- End Modal Edit Mapel -->