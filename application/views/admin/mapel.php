		<!-- Begin Page Content -->
		<div class="container-fluid">

		    <!-- Page Heading -->
		    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		    <a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahkelasModal">Tambah Mapel</a>
		    <div class="col-lg">
		        <?= form_error('mapel', '<div class="alert alert-danger" kelas="alert">', '</div>'); ?>

		        <!-- <?= $this->session->flashdata('message'); ?> -->

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