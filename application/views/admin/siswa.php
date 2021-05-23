		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" href="<?= base_url('admin/tambah_siswa'); ?>">Tambah Siswa</a>
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
										<button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#detailsSiswaModal<?= $s['nis']; ?>">
											<i class="fas fa-info"></i>
										</button>
										<button type="button" class="btn btn-success btn-icon" href="" data-toggle="modal" data-target="#editSiswaModal<?= $s['nis']; ?>">
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

		<!-- Modal Details Siswa -->
		<?php foreach ($siswa as $s) : ?>
			<div class="modal fade" id="detailsSiswaModal<?= $s['nis'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="detailsSiswaModal<?= $s['nis']; ?>Label" aria-hidden="true">
				<div class="modal-dialog" kelas="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="detailsMenuModal<?= $s['nis'] ?>">Details Siswa</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<span>NIS</span>
								<input type="text" class="form-control" readonly value="<?= $s['nis']; ?>" id="nis" name="nis">
							</div>

							<div class="form-group">
								<span>NISN</span>
								<input type="text" class="form-control" readonly value="<?= $s['nisn']; ?>" id="nisn" name="nisn">
							</div>

							<div class="form-group">
								<span>Nama</span>
								<input type="text" class="form-control" readonly value="<?= $s['nama']; ?>" id="nama" name="nama">
							</div>

							<div class="form-group">
								<span>Tempat, Tanggal Lahir</span>
								<input type="text" class="form-control" readonly value="<?= $s['tempat_lahir'] . ', ' . $s['tanggal_lahir'] ?>" id="tempat_lahir" name="tempat_lahir">
							</div>

							<div class="form-group">
								<span>Jenis Kelamin</span>
								<input type="text" class="form-control" readonly value="<?= $s['jenis_kelamin']; ?>">
							</div>

							<div class="form-group">
								<span>Agama</span>
								<input type="text" class="form-control" readonly value="<?= $s['agama']; ?>">
							</div>

							<div class="form-group">
								<span>Status dalam keluarga</span>
								<input type="text" class="form-control" readonly value="<?= $s['status_dalam_keluarga']; ?>">
							</div>

							<div class="form-group">
								<span>Anak Ke</span>
								<input type="text" class="form-control" readonly value="<?= $s['anak_ke']; ?>">
							</div>

							<div class="form-group">
								<span>Alamat Siswa</span>
								<input type="text" class="form-control" readonly value="<?= $s['alamat_siswa']; ?>">
							</div>

							<div class="form-group">
								<span>Nomor Telepon Rumah</span>
								<input type="text" class="form-control" readonly value="<?= $s['no_telp_rumah']; ?>">
							</div>

							<div class="form-group">
								<span>Sekolah Asal</span>
								<input type="text" class="form-control" readonly value="<?= $s['sekolah_asal']; ?>">
							</div>

							<div class="form-group">
								<span>Diterima di kelas</span>
								<input type="text" class="form-control" readonly value="<?= $s['diterima_di_kelas']; ?>">
							</div>
							<div class="form-group">
								<span>Tanggal Diterima</span>
								<input type="text" class="form-control" readonly value="<?= $s['tanggal_diterima']; ?>">
							</div>
							<div class="form-group">
								<span>Nama Ayah</span>
								<input type="text" class="form-control" readonly value="<?= $s['nama_ayah']; ?>">
							</div>
							<div class="form-group">
								<span>Nama Ibu</span>
								<input type="text" class="form-control" readonly value="<?= $s['nama_ibu']; ?>">
							</div>
							<div class="form-group">
								<span>Alamat Orang Tua</span>
								<input type="text" class="form-control" readonly value="<?= $s['alamat_orangtua']; ?>">
							</div>
							<div class="form-group">
								<span>Pekerjaan Ayah</span>
								<input type="text" class="form-control" readonly value="<?= $s['pekerjaan_ayah']; ?>">
							</div>
							<div class="form-group">
								<span>Nama Wali</span>
								<input type="text" class="form-control" readonly value="<?= $s['nama_wali']; ?>">
							</div>
							<div class="form-group">
								<span>Alamat Wali</span>
								<input type="text" class="form-control" readonly value="<?= $s['alamat_wali']; ?>">
							</div>
							<div class="form-group">
								<span>Pekerjaan Wali</span>
								<input type="text" class="form-control" readonly value="<?= $s['pekerjaan_wali']; ?>">
							</div>
							<div class="form-group">
								<span>Nomor Telepon Wali</span>
								<input type="text" class="form-control" readonly value="<?= $s['nomor_telp_wali']; ?>">
							</div>
							<div class="form-group">
								<span>Email Siswa</span>
								<input type="text" class="form-control" readonly value="<?= $s['email_siswa']; ?>">
							</div>
							<div class="form-group">
								<span>Nomor Telepon Siswa</span>
								<input type="text" class="form-control" readonly value="<?= $s['no_telp_siswa']; ?>">
							</div>

							<div class="form-group">
								<span>Role</span>
								<input type="text" class="form-control" readonly value="<?= $s['nama_role']; ?>">
							</div>

							<div class="form-group">
								<span>Is Active</span>
								<input type="text" class="form-control" readonly value="<?= $s['is_active']; ?>">
							</div>

							<div class="form-group">
								<span>Username</span>
								<input type="text" class="form-control" readonly value="<?= $s['username']; ?>">
							</div>

							<div class="form-group">
								<span>Password</span>
								<input type="password" class="form-control" readonly value="<?= $s['password']; ?>">
							</div>

							<div class="form-group">
								<span>Kelas</span>
								<input type="text" class="form-control" readonly value="<?= $s['nama_kelas']; ?>">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<!-- End Modal Details Siswa -->

		<!-- Edit Modal Siswa -->
		<?php foreach ($siswa as $s) : ?>
			<div class="modal fade" id="editSiswaModal<?= $s['nis'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editSiswaModal<?= $s['nis']; ?>Label" aria-hidden="true">
				<div class="modal-dialog" kelas="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editMenuModal<?= $s['nis'] ?>">Edit Siswa</h5>
							<buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</buttond>
						</div>
						<form action="<?= base_url('admin/update_siswa/' . $s['nis']); ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<span>NIS</span>
									<input type="text" class="form-control" value="<?= $s['nis']; ?>" id="nis" name="nis">
								</div>

								<div class="form-group">
									<span>NISN</span>
									<input type="text" class="form-control" value="<?= $s['nisn']; ?>" id="nisn" name="nisn">
								</div>

								<div class="form-group">
									<span>Nama</span>
									<input type="text" class="form-control" value="<?= $s['nama']; ?>" id="nama" name="nama">
								</div>

								<div class="form-group">
									<span>Tempat Lahir</span>
									<input type="text" class="form-control" value="<?= $s['tempat_lahir'] ?>" id="tempat_lahir" name="tempat_lahir">
								</div>

								<div class="form-group">
									<span>Tanggal Lahir</span>
									<input type="date" class="form-control" value="<?= $s['tanggal_lahir'] ?>" id="tanggal_lahir" name="tanggal_lahir">
								</div>

								<div class="form-group">
									<span>Jenis Kelamin </span>
									<select name="jenis_kelamin" id="jenis_kelamin">
										<option value="<?= $s['jenis_kelamin'] ?>" selected> <?= $s['jenis_kelamin'] ?> </option>
										<option value="perempuan">Perempuan</option>
										<option value="lakilaki">Laki-laki</option>
										<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
									</select>
								</div>

								<div class="form-group">
									<span>Agama </span>
									<select class="form-control" name="agama" id="agama">
										<option value="<?= $s['agama'] ?>" selected> <?= $s['agama'] ?> </option>
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
									<span>Status dalam keluarga</span>
									<input type="text" class="form-control" value="<?= $s['status_dalam_keluarga']; ?>" id="status_dalam_keluarga" name="status_dalam_keluarga">
								</div>

								<div class="form-group">
									<span>Anak Ke</span>
									<input type="text" class="form-control" value="<?= $s['anak_ke']; ?>" id="anak_ke" name="anak_ke">
								</div>

								<div class="form-group">
									<span>Alamat Siswa</span>
									<input type="text" class="form-control" value="<?= $s['alamat_siswa']; ?>" id="alamat_siswa" name="alamat_siswa">
								</div>

								<div class="form-group">
									<span>Nomor Telepon Rumah</span>
									<input type="text" class="form-control" value="<?= $s['no_telp_rumah']; ?>" id="no_telp_rumah" name="no_telp_rumah">
								</div>

								<div class="form-group">
									<span>Sekolah Asal</span>
									<input type="text" class="form-control" value="<?= $s['sekolah_asal']; ?>" id="sekolah_asal" name="sekolah_asal">
								</div>

								<div class="form-group">
									<span>Diterima di kelas </span>
									<select class="form-control" name="diterima_di_kelas" id="diterima_di_kelas">
										<option value="<?= $s['diterima_di_kelas'] ?>" selected> <?= $s['diterima_di_kelas'] ?> </option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
									</select>
								</div>

								<div class="form-group">
									<span>Tanggal Diterima</span>
									<input type="date" class="form-control" value="<?= $s['tanggal_diterima']; ?>" id="tanggal_diterima" name="tanggal_diterima">
								</div>

								<div class="form-group">
									<span>Nama Ayah</span>
									<input type="text" class="form-control" value="<?= $s['nama_ayah']; ?>" id="nama_ayah" name="nama_ayah">
								</div>

								<div class="form-group">
									<span>Nama Ibu</span>
									<input type="text" class="form-control" value="<?= $s['nama_ibu']; ?>" id="nama_ibu" name="nama_ibu">
								</div>

								<div class="form-group">
									<span>Alamat Orang Tua</span>
									<input type="text" class="form-control" value="<?= $s['alamat_orangtua']; ?>" id="alamat_orangtua" name="alamat_orangtua">
								</div>

								<div class="form-group">
									<span>Pekerjaan Ayah</span>
									<input type="text" class="form-control" value="<?= $s['pekerjaan_ayah']; ?>" id="pekerjaan_ayah" name="pekerjaan_ayah">
								</div>

								<div class="form-group">
									<span>Nama Wali</span>
									<input type="text" class="form-control" value="<?= $s['nama_wali']; ?>" id="nama_wali" name="nama_wali">
								</div>

								<div class="form-group">
									<span>Alamat Wali</span>
									<input type="text" class="form-control" value="<?= $s['alamat_wali']; ?>" id="alamat_wali" name="alamat_wali">
								</div>

								<div class="form-group">
									<span>Pekerjaan Wali</span>
									<input type="text" class="form-control" value="<?= $s['pekerjaan_wali']; ?>" id="pekerjaan_wali" name="pekerjaan_wali">
								</div>

								<div class="form-group">
									<span>Nomor Telepon Wali</span>
									<input type="text" class="form-control" value="<?= $s['nomor_telp_wali']; ?>" id="nomor_telp_wali" name="nomor_telp_wali">
								</div>

								<div class="form-group">
									<span>Email Siswa</span>
									<input type="text" class="form-control" value="<?= $s['email_siswa']; ?>" id="email_siswa" name="email_siswa">
								</div>

								<div class="form-group">
									<span>Nomor Telepon Siswa</span>
									<input type="text" class="form-control" value="<?= $s['no_telp_siswa']; ?>" id="no_telp_siswa" name="no_telp_siswa">
								</div>

								<div class="form-group">
									<span>Role</span>
									<select class="form-control" name="role_id" id="role_id">
										<option value="<?= $s['role_id'] ?>" selected><?= $s['role_id'] . ' - ' . $s['nama_role'] ?></option>
										<?php foreach ($role as $r) { ?>
											<option value="<?= $r['id_role'] ?>"><?php echo $r['id_role'] . ' - ' . $r['nama_role']; ?></option>
										<?php }; ?>
									</select>

								</div>

								<div class="form-group">
									<span>Is Active</span>
									<input type="text" class="form-control" value="<?= $s['is_active']; ?>" id="is_active" name="is_active">
								</div>

								<div class="form-group">
									<span>Username</span>
									<input type="text" class="form-control" value="<?= $s['username']; ?>" id="username" name="username">
								</div>

								<div class="form-group">
									<span>Password</span>
									<input type="password" class="form-control" value="<?= $s['password']; ?>" id="password" name="password" readonly>
								</div>

								<div class="form-group">
									<span>Kelas</span>
									<select class="form-control" name="id_kelas" id="id_kelas">
										<option value="<?= $s['id_kelas'] ?>" selected><?= $s['id_kelas'] . ' - ' . $s['nama_kelas'] ?></option>
										<?php foreach ($kelas as $k) { ?>
											<option value="<?= $k['id_kelas'] ?>"><?php echo $k['nama_kelas'] . ' - ' . $k['tahun']; ?></option>
										<?php }; ?>
									</select>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<!-- End Edit Modal Siswa -->