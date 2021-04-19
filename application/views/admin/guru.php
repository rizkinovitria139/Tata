		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahkelasModal">Tambah Siswa</a>
			<div class="col-lg">
				<?= form_error('kelas', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

				<!-- <?= $this->session->flashdata('message'); ?> -->

				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Nama</th>
								<th scope="col">Alamat</th>
								<th scope="col">No Telepon</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($guru as $g) : ?>
								<tr>
									<td><?= $g['nama']; ?></td>
									<td><?= $g['alamat']; ?></td>
									<td><?= $g['no_telp']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $g['nip']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<button type="button" class="btn btn-danger" href="<?= base_url('admin/deleteguru/') . $g['nip']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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