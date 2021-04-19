		<!-- Begin Page Content -->
		<div class="container-fluid">

		    <!-- Page Heading -->
		    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		    <a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahkelasModal">Tambah Jadwal</a>
		    <div class="col-lg">
		        <?= form_error('mapel', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

		        <!-- <?= $this->session->flashdata('message'); ?> -->

		        <div class="row">

		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th scope="col">#</th>
		                        <th scope="col">Kelas</th>
		                        <th scope="col">Mata pelajaran</th>
		                        <th scope="col">Hari</th>
		                        <th scope="col">Waktu</th>
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
		                            <td><?= $j['waktu']; ?></td>
		                            <td>
		                                <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editkelasModal<?= $j['id']; ?>">
		                                    <i class="far fa-edit"></i>
		                                </button>
		                                <button type="button" class="btn btn-danger" href="<?= base_url('admin/deletekelas/') . $j['id']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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