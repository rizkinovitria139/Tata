		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahjadwalModal">Tambah Jadwal</a>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<form action="" method="POST">
							<select class="form-control" name="formal" onchange="location = this.value;">
								<option value="" selected>Filter </option>
								<?php foreach ($kelas as $k) { ?>
									<option value="<?= base_url('admin/get_jadwal_by/' . $k['id_kelas']) ?>">
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

			<?= $this->session->flashdata('jadwal_message'); ?>

			<div class="row">

				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Kelas</th>
							<th scope="col">Mata pelajaran</th>
							<th scope="col">Hari</th>
							<th scope="col">Waktu Mulai</th>
							<th scope="col">Jam Mulai</th>
							<th scope="col">Waktu Berakhir</th>
							<th scope="col">Jam Berakhir</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($jadwal as $j) : ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $j['nama_kelas']; ?></td>
								<td><?= $j['nama_mapel']; ?></td>
								<td><?= $j['hari']; ?></td>
								<td><?= $j['waktu_mulai']; ?></td>
								<td><?= $j['jam_mulai']; ?></td>
								<td><?= $j['waktu_akhir']; ?></td>
								<td><?= $j['jam_akhir']; ?></td>
								<td>
									<a class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editjadwalModal<?= $j['id']; ?>">
										<i class="far fa-edit"></i>
									</a>
									<a class="btn btn-danger" href="<?= base_url('admin/delete_jadwal/') . $j['id']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

		<!-- Start Modal Tambah Jadwal -->
		<div class="modal fade" id="tambahjadwalModal" tabindex="-1" aria-labelledby="tambahjadwalModalLabel" aria-hidden="true">
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
						<h5 class="modal-title" id="tambahjadwalModalLabel">Tambah Jadwal</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url(); ?>admin/tambah_jadwal" method="post">
						<div class="modal-body">
							<!-- <span>Kelas</span>
		                    <div class="form-group">
		                        <select class="form-control" name="id_kelas" id="id_kelas">
		                            <option value="" selected></option>
		                            <?php foreach ($kelas as $k) { ?>
		                            <option value="<?= $k['id_kelas'] ?>">
		                                <?php echo $k['id_kelas'] . ' - ' . $k['nama_kelas']; ?></option>
		                            <?php }; ?>
		                        </select>
		                    </div> -->

							<span>Mata Pelajaran</span>
							<div class="form-group">
								<select class="form-control" name="id_mapel" id="id_mapel">
									<option value="" selected></option>
									<?php foreach ($mapel as $m) { ?>
										<option value="<?= $m['id_mapel'] ?>">
											<?php echo $m['id_mapel'] . ' - ' . $m['nama_mapel'] . '-' . $m['nama_kelas']; ?></option>
									<?php }; ?>
								</select>
							</div>

							<div class="form-group">
								<span>Hari</span>
								<select class="form-control" name="hari" id="hari">
									<option value="" selected> </option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jum'at">Jum'at</option>
									<option value="Sabtu">Sabtu</option>
									<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
								</select>
							</div>

							<div class="form-group">
								<span>Waktu Mulai</span>
								<select name="waktu_mulai" id="waktu_mulai" class="form-control">
									<option value="" selected></option>
									<option value="07.00 - 07.30">07.00 - 07.30</option>
									<option value="07.30 - 08.00">07.30 - 08.00</option>
									<option value="08.30 - 09.00">08.30 - 09.00</option>
									<option value="09.00 - 09.30">09.00 - 09.30</option>
									<option value="09.30 - 10.00">09.30 - 10.00</option>
									<option value="10.00 - 10.30">10,00 - 10.30</option>
									<option value="10.30 - 11.00">10.30 - 11.00</option>
									<option value="11.00 - 11.30">11.00 - 11.30</option>
									<option value="11.30 - 12.00">11.30 - 12.00</option>
									<option value="12.00 - 12.30">12.00 - 12.30</option>
									<option value="12.30 - 13.00">12.30 - 13.00</option>
									<option value="13.00 - 13.30">13.00 - 13.30</option>
									<option value="13.20 - 14.00">13.20 - 14.00</option>
								</select>
							</div>

							<div class="form-group">
								<span>Jam Mulai</span>
								<select name="jam_mulai" id="jam_mulai" class="form-control">
									<option value="" selected></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
								</select>
							</div>

							<div class="form-group">
								<span>Waktu Akhir</span>
								<select name="waktu_akhir" id="waktu_akhir" class="form-control">
									<option value="" selected></option>
									<option value="07.00 - 07.30">07.00 - 07.30</option>
									<option value="07.30 - 08.00">07.30 - 08.00</option>
									<option value="08.30 - 09.00">08.30 - 09.00</option>
									<option value="09.00 - 09.30">09.00 - 09.30</option>
									<option value="09.30 - 10.00">09.30 - 10.00</option>
									<option value="10.00 - 10.30">10,00 - 10.30</option>
									<option value="10.30 - 11.00">10.30 - 11.00</option>
									<option value="11.00 - 11.30">11.00 - 11.30</option>
									<option value="11.30 - 12.00">11.30 - 12.00</option>
									<option value="12.00 - 12.30">12.00 - 12.30</option>
									<option value="12.30 - 13.00">12.30 - 13.00</option>
									<option value="13.00 - 13.30">13.00 - 13.30</option>
									<option value="13.20 - 14.00">13.20 - 14.00</option>
								</select>
							</div>

							<div class="form-group">
								<span>Jam Akhir</span>
								<select name="jam_akhir" id="jam_akhir" class="form-control">
									<option value="" selected></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
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
		<!-- End Modal Tambah Jadwal -->

		<!-- Start Modal Edit Jadwal -->
		<?php foreach ($jadwal as $j) : ?>
			<div class="modal fade" id="editjadwalModal<?= $j['id'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editjadwalModal<?= $j['id']; ?>Label" aria-hidden="true">
				<div class="modal-dialog" kelas="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editMenuModal<?= $j['id'] ?>">Edit Jadwal</h5>
							<buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</buttond>
						</div>
						<form action="<?= base_url('admin/edit_jadwal/' . $j['id']); ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<span>ID Jadwal</span>
									<input type="text" class="form-control" readonly value="<?= $j['id']; ?>" id="id" name="id" placeholder="Id Jadwal">
								</div>

								<!-- <span>Kelas</span>
		                    <div class="form-group">
		                        <select class="form-control" name="id_kelas" id="id_kelas">
		                            <option value="<?= $m['id_kelas']; ?>" selected>
		                                <?php echo $m['id_kelas'] . ' - ' . $k['nama_kelas']; ?></option>
		                            <?php foreach ($kelas as $k) { ?>
		                            <option value="<?= $k['id_kelas'] ?>">
		                                <?php echo $k['id_kelas'] . ' - ' . $k['nama_kelas']; ?></option>
		                            <?php }; ?>
		                        </select>
		                    </div> -->

								<span>Mata Pelajaran</span>
								<div class="form-group">
									<select class="form-control" name="id_mapel" id="id_mapel">
										<option value="<?= $j['id_mapel'] . ' - ' . $j['nama_kelas']; ?>" selected>
											<?php echo $j['id_mapel'] . ' - ' . $j['nama_mapel']; ?></option>
										<?php foreach ($mapel as $m) { ?>
											<option value="<?= $m['id_mapel'] ?>">
												<?php echo $m['id_mapel'] . ' - ' . $m['nama_mapel'] . '-' . $m['nama_kelas']; ?></option>
										<?php }; ?>
									</select>
								</div>

								<div class="form-group">
									<span>Hari</span>
									<select class="form-control" name="hari" id="hari">
										<option value="<?= $j['hari']; ?>" selected><?= $j['hari']; ?></option>
										<option value="Senin">Senin</option>
										<option value="Selasa">Selasa</option>
										<option value="Rabu">Rabu</option>
										<option value="Kamis">Kamis</option>
										<option value="Jum'at">Jum'at</option>
										<option value="Sabtu">Sabtu</option>
										<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
									</select>
								</div>

								<div class="form-group">
									<span>Waktu Mulai</span>
									<select name="waktu_mulai" id="waktu_mulai" class="form-control">
										<option value="<?= $j['waktu_mulai']; ?>" selected><?= $j['waktu_mulai']; ?></option>
										<option value="07.00 - 07.30">07.00 - 07.30</option>
										<option value="07.30 - 08.00">07.30 - 08.00</option>
										<option value="08.30 - 09.00">08.30 - 09.00</option>
										<option value="09.00 - 09.30">09.00 - 09.30</option>
										<option value="09.30 - 10.00">09.30 - 10.00</option>
										<option value="10.00 - 10.30">10,00 - 10.30</option>
										<option value="10.30 - 11.00">10.30 - 11.00</option>
										<option value="11.00 - 11.30">11.00 - 11.30</option>
										<option value="11.30 - 12.00">11.30 - 12.00</option>
										<option value="12.00 - 12.30">12.00 - 12.30</option>
										<option value="12.30 - 13.00">12.30 - 13.00</option>
										<option value="13.00 - 13.30">13.00 - 13.30</option>
										<option value="13.20 - 14.00">13.20 - 14.00</option>
									</select>
								</div>

								<div class="form-group">
									<span>Jam Mulai</span>
									<select name="jam_mulai" id="jam_mulai" class="form-control">
										<option value="<?= $j['jam_mulai']; ?>" selected><?= $j['jam_mulai']; ?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
									</select>
								</div>

								<div class="form-group">
									<span>Waktu Akhir</span>
									<select name="waktu_akhir" id="waktu_akhir" class="form-control">
										<option value="<?= $j['waktu_akhir']; ?>" selected><?= $j['waktu_akhir']; ?></option>
										<option value="07.00 - 07.30">07.00 - 07.30</option>
										<option value="07.30 - 08.00">07.30 - 08.00</option>
										<option value="08.30 - 09.00">08.30 - 09.00</option>
										<option value="09.00 - 09.30">09.00 - 09.30</option>
										<option value="09.30 - 10.00">09.30 - 10.00</option>
										<option value="10.00 - 10.30">10,00 - 10.30</option>
										<option value="10.30 - 11.00">10.30 - 11.00</option>
										<option value="11.00 - 11.30">11.00 - 11.30</option>
										<option value="11.30 - 12.00">11.30 - 12.00</option>
										<option value="12.00 - 12.30">12.00 - 12.30</option>
										<option value="12.30 - 13.00">12.30 - 13.00</option>
										<option value="13.00 - 13.30">13.00 - 13.30</option>
										<option value="13.20 - 14.00">13.20 - 14.00</option>
									</select>
								</div>

								<div class="form-group">
									<span>Jam Akhir</span>
									<select name="jam_akhir" id="jam_akhir" class="form-control">
										<option value="<?= $j['jam_akhir']; ?>" selected><?= $j['jam_akhir']; ?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
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
		<!-- End Modal Edit Jadwal -->