		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<!-- <a class="btn btn-warning mb-3" href="<?= base_url('admin/siswa_tambah'); ?>">Tambah Siswa</a> -->
			<div class="col-lg">
				<?= form_error('siswa', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

				<?= $this->session->flashdata('siswa_message'); ?>

				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">NIS</th>
								<th scope="col">Nama</th>
								<th scope="col">Alamat</th>
								<th scope="col">No Telepon</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($siswa as $s) : ?>
								<tr>
									<td><?= $s['nis']; ?></td>
									<td><?= $s['nama']; ?></td>
									<td><?= $s['alamat_siswa']; ?></td>
									<td><?= $s['no_telp_rumah']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $s['nis']; ?>">
											<i class="fas fa-info"></i>
										</button>
										<button type="button" class="btn btn-success btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $s['nis']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<a class="btn btn-danger" href="<?= base_url(); ?>admin/delete_siswa/<?= $s['nis']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
											<i class="far fa-trash-alt"></i>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

				</div>

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->