		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahGuruModal">Tambah Guru</a>
			<div class="col-lg">
				<?= form_error('kelas', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

				<?= $this->session->flashdata('guru_message'); ?>

				<div class="row">

					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">NIP</th>
								<th scope="col">Nama</th>
								<th scope="col">Alamat</th>
								<th scope="col">No Telepon</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($guru as $g) : ?>
								<tr>
									<td><?= $g['nip']; ?></td>
									<td><?= $g['nama']; ?></td>
									<td><?= $g['alamat']; ?></td>
									<td><?= $g['no_telp']; ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $g['nip']; ?>">
											<i class="fas fa-info"></i>
										</button>
										<button type="button" class="btn btn-success btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $g['nip']; ?>">
											<i class="far fa-edit"></i>
										</button>
										<button type="button" class="btn btn-danger" href="<?= base_url('admin/deleteguru/') . $g['nip']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
											<i class="far fa-trash-alt"></i>
										</button>
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

		<!-- Tambah Kelas Modal -->
		<div class="modal fade" id="tambahGuruModal" tabindex="-1" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
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
						<h5 class="modal-title" id="tambahGuruModalLabel">Tambah Guru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url(); ?>admin/tambah_guru" method="post">
						<div class="modal-body">

							<div class="form-group">
								<span>NIP</span>
								<input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP Guru">
							</div>

							<div class="form-group">
								<span>Nama</span>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Guru">
							</div>

							<div class="form-group">
								<span>Tempat Lahir</span>
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
							</div>

							<div class="form-group">
								<span>Tanggal Lahir</span>
								<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
							</div>

							<div class="form-group">
								<span>Jenis Kelamin </span>
								<select name="jenis_kelamin" id="jenis_kelamin">
									<option value="" selected> </option>
									<option value="perempuan">Perempuan</option>
									<option value="lakilaki">Laki-laki</option>
									<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
								</select>
							</div>

							<div class="form-group">
								<span>Agama </span>
								<select name="agama" id="agama">
									<option value="" selected> </option>
									<option value="islam">Islam</option>
									<option value="kristen">Kristen</option>
									<option value="katolik">Katolik</option>
									<option value="hindu">Hindu</option>
									<option value="budha">Budha</option>
									<option value="konghucu">Konghucu</option>
								</select>
								<?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="form-group">
								<span>Alamat</span>
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
							</div>
							<div class="form-group">
								<span>Nomor Telepon</span>
								<input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon">
							</div>
							<div class="form-group">
								<span>Tanggal Masuk</span>
								<input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk">
							</div>
							<div class="form-group">
								<span>Email</span>
								<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Guru">
							</div>

							<div class="form-group">
								<span>Role</span>
								<select name="role_id" id="role_id">
									<option value="" selected></option>
									<?php foreach ($role as $r) { ?>
										<option value="<?= $r['id_role'] ?>">
											<?php echo $r['id_role'] . ' - ' . $r['nama_role']; ?></option>
									<?php }; ?>
								</select>

							</div>

							<div class="form-group">
								<span>Is Active</span>
								<input type="text" class="form-control" id="is_active" name="is_active" placeholder="Masukkan kode Is Active">
							</div>

							<div class="form-group">
								<span>Status </span>
								<select name="status" id="status">
									<option value="" selected> </option>
									<option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
									<option value="Guru BK">Guru BK</option>
									<option value="Staf TU">Staf TU</option>
								</select>
								<?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="form-group">
								<span>Username</span>
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username ">
							</div>
							<div class="form-group">
								<span>Password</span>
								<input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password
								">
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