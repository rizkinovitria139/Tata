		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahpengajarModal">Tambah Pengajar</a>
			<div class="col-lg">
				<?= form_error('pengajar', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

				<?= $this->session->flashdata('pengajar_message'); ?>

				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Mata Pelajaran</th>
								<th scope="col">Pengajar</th>

							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($pengajar as $p) : ?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $p['nama_mapel']; ?></td>
									<td><?= $p['nama']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editpengajarModal<?= $p['id']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<a class="btn btn-danger" href="<?= base_url('admin/delete_pengajar/') . $p['id']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

		<!-- Start Modal Tambah Pengajar -->
		<div class="modal fade" id="tambahpengajarModal" tabindex="-1" aria-labelledby="tambahpengajarModalLabel" aria-hidden="true">
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
						<h5 class="modal-title" id="tambahpengajarModalLabel">Tambah Mapel</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url(); ?>admin/tambah_pengajar" method="post">
						<div class="modal-body">
							<span>Mata Pelajaran</span>
							<div class="form-group">
								<select class="form-control" name="id_mapel" id="id_mapel">
									<option value="" selected></option>
									<?php foreach ($mapel as $m) { ?>
										<option value="<?= $m['id_mapel'] ?>">
											<?php echo $m['id_mapel'] . ' - ' . $m['nama_mapel']; ?></option>
									<?php }; ?>
								</select>
							</div>

							<span>Guru Pengajar</span>
							<div class="form-group">
								<select class="form-control" name="id_guru" id="id_guru">
									<option value="" selected></option>
									<?php foreach ($guru as $g) { ?>
										<option value="<?= $g['nip'] ?>">
											<?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
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
		<!-- End Modal Tambah Pengajar -->

		<!-- Start Edit Modal Pengajar -->
		<?php foreach ($pengajar as $p) : ?>
			<div class="modal fade" id="editpengajarModal<?= $p['id'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editpengajarModal<?= $p['id']; ?>Label" aria-hidden="true">
				<div class="modal-dialog" kelas="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editMenuModal<?= $p['id'] ?>">Edit Jadwal</h5>
							<buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</buttond>
						</div>
						<form action="<?= base_url('admin/edit_pengajar/' . $p['id']); ?>" method="post">
							<div class="modal-body">
								<span>Mata Pelajaran</span>
								<div class="form-group">
									<select class="form-control" name="id_mapel" id="id_mapel">
										<option value="<?= $p['id_mapel']; ?>" selected><?= $p['id_mapel']  . ' - ' . $p['nama_mapel']; ?></option>
										<?php foreach ($mapel as $m) { ?>
											<option value="<?= $m['id_mapel'] ?>">
												<?php echo $m['id_mapel'] . ' - ' . $m['nama_mapel']; ?></option>
										<?php }; ?>
									</select>
								</div>

								<span>Guru Pengajar</span>
								<div class="form-group">
									<select class="form-control" name="id_guru" id="id_guru">
										<option value="<?= $p['id_guru']; ?>" selected><?php echo $p['id_guru'] . ' - ' . $p['nama']; ?></option>
										<?php foreach ($guru as $g) { ?>
											<option value="<?= $g['nip'] ?>">
												<?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
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
		<!-- End Edit Modal Pengajar -->