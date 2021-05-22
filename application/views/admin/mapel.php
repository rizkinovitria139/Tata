		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahmapelModal">Tambah Mapel</a>
			<div class="col-lg">
				<?= form_error('mapel', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

				<?= $this->session->flashdata('mapel_message'); ?>

				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Mata Pelajaran</th>
								<th scope="col">Kelas</th>
								<th scope="col">Pengajar</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($mapel as $m) : ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $m['nama_mapel']; ?></td>
									<td><?= $m['nama_kelas']; ?></td>
									<td><?= $m['nama']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $m['id_mapel']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<button type="button" class="btn btn-danger" href="<?= base_url('admin/deletekelas/') . $m['id_mapel']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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
							<span>Pengajar</span>

							<div class="form-group">
								<select class="form-control" name="nip_pengajar" id="nip_pengajar">
									<option value="" selected></option>
									<?php foreach ($guru as $r) { ?>
										<option value="<?= $r['nip'] ?>">
											<?php echo $r['nip'] . ' - ' . $r['nama']; ?></option>
									<?php }; ?>
								</select>
							</div>

							<span>Kelas</span>
							<div class="form-group">
								<select class="form-control" name="id_kelas" id="id_kelas">
									<option value="" selected></option>
									<?php foreach ($kelas as $r) { ?>
										<option value="<?= $r['id_kelas'] ?>">
											<?php echo $r['id_kelas'] . ' - ' . $r['nama_kelas']; ?></option>
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
		<!-- End Modal Tambah Mapel -->