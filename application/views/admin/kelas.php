		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahkelasModal">Tambah Kelas</a>
			<div class="card-mb3">
				<div class="card-header bg-secondary text-white">
					Filter Data Kelas
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<form action="" method="POST">
									<select class="form-control" name="formal" onchange="location = this.value;">
										<option value="" selected>--Pilih Tahun Akademik--</option>
										<?php foreach ($tahun_akademik as $t) { ?>
											<option value="<?= base_url('admin/get_kelas_by/' . $t['id_tahun_akademik']) ?>">
												<?php echo $t['id_tahun_akademik'] . ' - ' . $t['tahun']; ?></option>
										<?php }; ?>
									</select>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<?php echo form_open('admin/search_kelas') ?>
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Search..." name="keyword" autocomplete="off" autofocus>
								<div class="input-group-append">
									<input type="submit" class="btn btn-primary" name="submit">
								</div>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg">
				<?= form_error('kelas_message'); ?>

				<?= $this->session->flashdata('kelas_message') ?>


				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Kelas </th>
								<th scope="col">Wali Kelas</th>
								<th scope="col">Tahun Akademik</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($kelas as $k) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $k['nama_kelas']; ?></td>
									<td><?= $k['nama']; ?></td>
									<td><?= $k['tahun']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $k['id_kelas']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<a class="btn btn-danger" href="<?= base_url('admin/delete_kelas/') . $k['id_kelas']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

		<!-- Tambah Kelas Modal -->
		<div class="modal fade" id="tambahkelasModal" tabindex="-1" aria-labelledby="tambahkelasModalLabel" aria-hidden="true">
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
						<h5 class="modal-title" id="tambahkelasModalLabel">Tambah Kelas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url(); ?>admin/tambah_kelas" method="post">
						<div class="modal-body">
							<!-- <span>ID Kelas</span>
							<div class="form-group">
								<input type="text" class="form-control" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas">
							</div> -->
							<span>Nama Kelas</span>
							<div class="form-group">
								<input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas">
							</div>
							<span>Wali Kelas</span>
							<div class="form-group">
								<select class="form-control" name="nip_wali_kelas" id="nip_wali_kelas">
									<option value="" selected></option>
									<?php foreach ($guru as $g) { ?>
										<option value="<?= $g['nip'] ?>">
											<?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
									<?php }; ?>
								</select>
							</div>

							<span>Tahun Akademik</span>
							<div class="form-group">
								<select class="form-control" name="id_tahun_akademik" id="id_tahun_akademik">
									<option value="" selected></option>
									<?php foreach ($tahun_akademik as $t) { ?>
										<option value="<?= $t['id_tahun_akademik'] ?>">
											<?php echo $t['id_tahun_akademik'] . ' - ' . $t['tahun']; ?></option>
									<?php }; ?>
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
		<!-- End Tambah Kelas Modal -->

		<!-- Edit Modal -->
		<?php foreach ($kelas as $k) : ?>
			<div class="modal fade" id="editkelasModal<?= $k['id_kelas'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editkelasModal<?= $k['id_kelas']; ?>Label" aria-hidden="true">
				<div class="modal-dialog" kelas="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editMenuModal<?= $k['id_kelas'] ?>">Edit kelas</h5>
							<buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</buttond>
						</div>
						<form action="<?= base_url('admin/edit_kelas/' . $k['id_kelas']); ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<span>Id Kelas</span>
									<input type="text" class="form-control" readonly value="<?= $k['id_kelas']; ?>" id="id_kelas" name="id_kelas" placeholder="Id Kelas">
								</div>
								<div class="form-group">
									<span>Nama Kelas</span>
									<input type="text" class="form-control" value="<?= $k['nama_kelas']; ?>" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas">
								</div>

								<div class="form-group">
									<select class="form-control" name="nip_wali_kelas" id="nip_wali_kelas">
										<option value="<?= $k['nip_wali_kelas']; ?>" selected><?php echo $k['nip_wali_kelas'] . ' - ' . $k['nama']; ?></option>
										<?php foreach ($guru as $g) { ?>
											<option value="<?= $g['nip'] ?>">
												<?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
										<?php }; ?>
									</select>
								</div>


								<div class="form-group">
									<span>Tahun Akademik</span>
									<select class="form-control" name="id_tahun_akademik" id="id_tahun_akademik">
										<option value="<?= $k['id_tahun_akademik']; ?>" selected><?php echo $k['id_tahun_akademik'] . ' - ' . $k['tahun']; ?></option>
										<?php foreach ($tahun_akademik as $t) { ?>
											<option value="<?= $t['id_tahun_akademik'] ?>">
												<?php echo $t['id_tahun_akademik'] . ' - ' . $t['tahun']; ?></option>
										<?php }; ?>
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
		<!-- End Edit Modal -->