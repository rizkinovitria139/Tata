		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<div class="row">
				<div class="col-lg-8">
					<?php echo form_open_multipart('admin/tambah_siswa') ?>
					<?= $this->session->flashdata('siswa_tambah'); ?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<span>NIS</span>
							<input type="text" class="form-control" id="nis" name="nis">
							<?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>NISN</span>
							<input type="text" class="form-control" id="nisn" name="nisn">
							<?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Nama</span>
							<input type="text" class="form-control" id="nama" name="nama">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Tempat Lahir</span>
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
							<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Tanggal Lahir</span>
							<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
							<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
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
							<span>Status dalam keluarga</span>
							<input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga">
							<?= form_error('status_dalam_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Anak Ke </span>
							<input type="text" class="form-control" id="anak_ke" name="anak_ke">
							<?= form_error('anak_ke', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Alamat Siswa </span>
							<input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa">
							<?= form_error('alamat_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Nomor Telepon Rumah</span>
							<input type="text" class="form-control" id="no_telp_rumah" name="no_telp_rumah">
							<?= form_error('no_telp_rumah', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Sekolah Asal</span>
							<input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal">
							<?= form_error('sekolah_asal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Diterima di kelas </span>
							<select name="diterima_di_kelas" id="diterima_di_kelas">
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
						</div>

						<div class="form-group">
							<span>Tanggal Diterima</span>
							<input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima">
							<?= form_error('tanggal_diterima', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Nama Ayah</span>
							<input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
							<?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group">
							<span>Nama Ibu</span>
							<input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
							<?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group">
							<span>Alamat Orang Tua</span>
							<input type="text" class="form-control" id="alamat_orangtua" name="alamat_orangtua">
							<?= form_error('alamat_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group">
							<span>Pekerjaan Ayah</span>
							<input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah">
							<?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Nama Wali</span>
							<input type="text" class="form-control" id="nama_wali" name="nama_wali">
							<?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group">
							<span>Alamat Wali</span>
							<input type="text" class="form-control" id="alamat_wali" name="alamat_wali">
							<?= form_error('alamat_wali', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group">
							<span>Pekerjaan Wali</span>
							<input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali">
							<?= form_error('pekerjaan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Nomor Telepon Wali</span>
							<input type="text" class="form-control" id="nomor_telp_wali" name="nomor_telp_wali">
							<?= form_error('nomor_telp_wali', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Email Siswa</span>
							<input type="text" class="form-control" id="email_siswa" name="email_siswa">
							<?= form_error('email_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Nomor Telepon Siswa</span>
							<input type="text" class="form-control" id="no_telp_siswa" name="no_telp_siswa">
							<?= form_error('no_telp_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Role</span>
							<select name="role_id" id="role_id">
								<option value="" selected></option>
								<?php foreach ($role as $r) { ?>
									<option value="<?= $r['id_role'] ?>"><?php echo $r['id_role'] . ' - ' . $r['nama']; ?></option>
								<?php }; ?>
							</select>

						</div>

						<div class="form-group">
							<span>Is Active</span>
							<input type="text" class="form-control" id="is_active" name="is_active">
							<?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Username</span>
							<input type="text" class="form-control" id="username" name="username">
							<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Password</span>
							<input type="text" class="form-control" id="password" name="password">
							<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<span>Kelas</span>
							<select name="id_kelas" id="id_kelas">
								<option value="" selected></option>
								<?php foreach ($kelas as $k) { ?>
									<option value="<?= $k['id_kelas'] ?>"><?php echo $k['nama_kelas'] . ' - ' . $k['tahun']; ?></option>
								<?php }; ?>
							</select>
						</div>

						<div class="form-group">
							<a type="button" class="btn btn-secondary" href="<?= base_url('admin/get_siswa'); ?>">Batal</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		</div>