		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahkelasModal">Tambah Kelas</a>
			<div class="col-lg">
				<?= form_error('kelas', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

				<?php if ($this->session->flashdata('status')) : ?>
					<div class="alert alert-primary" role="alert">
						<?= $this->session->flashdata('status') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Kelas </th>
								<th scope="col">Wali Kelas</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($kelas as $k) : ?>
								<tr>
									<td><?= $k['id_kelas']; ?></td>
									<td><?= $k['nama_kelas']; ?></td>
									<td><?= $k['nama']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $k['id_kelas']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<button type="button" class="btn btn-danger" href="<?= base_url('admin/deletekelas/') . $k['id_kelas']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
											<i class="far fa-trash-alt"></i>
										</button>
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
							<?foreach ($kelas as $k ) : ?>

							<div class="form-group">
								<select class="form-control" id="status" name="nip_wali_kelas" id="nip_wali_kelas">
									<option selected>Pilih Wali Kelas </option>
									<option value="<?= $k['nip']; ?>"><?php echo $k['nip'] . ' - ' . $k['nama']; ?></option>
								</select>
							</div>
							<?php; ?>

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
						<form action="<?= base_url('admin/editkelas/' . $k['id_kelas']); ?>" method="post">
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
									<select class="form-control" id="status" name="nip_wali_kelas" id="nip_wali_kelas">
										<option selected>Pilih Wali Kelas </option>
										<option value="<?= $k['nip']; ?>"><?php echo $k['nip'] . ' - ' . $k['nama']; ?></option>
									</select>
								</div>
								<?php; ?>
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