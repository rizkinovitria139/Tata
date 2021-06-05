		<!-- Begin Page Content -->
		<div class="container-fluid">

		    <!-- Page Heading -->
		    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		    <a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahtahunModal">Tambah Tahun</a>

		    <div class="col-lg">
		        <?= form_error('tahun_message'); ?>

		        <?= $this->session->flashdata('tahun_message') ?>


		        <div class="row">

		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th scope="col">#</th>
		                        <th scope="col">ID</th>
		                        <th scope="col">Tahun Akademik</th>
		                        <th scope="col">Action</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php $i = 1; ?>
		                    <?php foreach ($tahun as $t) : ?>
		                        <tr>
		                            <td><?= $i; ?></td>
		                            <td><?= $t['id_tahun_akademik']; ?></td>
		                            <td><?= $t['tahun']; ?></td>
		                            <td>
		                                <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#edittahunModal<?= $t['id_tahun_akademik']; ?>">
		                                    <i class="far fa-edit"></i>
		                                </button>
		                                <a class="btn btn-danger" href="<?= base_url('admin/delete_tahun/') . $t['id_tahun_akademik']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

		<!-- Tambah Tahun Modal -->
		<div class="modal fade" id="tambahtahunModal" tabindex="-1" aria-labelledby="tambahtahunModalLabel" aria-hidden="true">
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
		                <h5 class="modal-title" id="tambahtahunModalLabel">Tambah Kelas</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <form action="<?php echo base_url(); ?>admin/tambah_tahun" method="post">
		                <div class="modal-body">
		                    <span>Tahun Akademik</span>
		                    <div class="form-group">
		                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun Akademik">
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
		<!-- End Tambah Tahun Modal -->

		<!-- Edit Modal -->
		<?php foreach ($tahun as $t) : ?>
		    <div class="modal fade" id="edittahunModal<?= $t['id_tahun_akademik'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="edittahunModal<?= $t['id_tahun_akademik']; ?>Label" aria-hidden="true">
		        <div class="modal-dialog" kelas="document">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h5 class="modal-title" id="editMenuModal<?= $t['id_tahun_akademik'] ?>">Edit Tahun</h5>
		                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        <span aria-hidden="true">&times;</span>
		                    </buttond>
		                </div>
		                <form action="<?= base_url('admin/edit_tahun/' . $t['id_tahun_akademik']); ?>" method="post">
		                    <div class="modal-body">
		                        <div class="form-group">
		                            <span>ID Tahun</span>
		                            <input type="text" class="form-control" readonly value="<?= $t['id_tahun_akademik']; ?>" id="id_tahun_akademik" name="id_tahun_akademik" placeholder="ID Tahun">
		                        </div>
		                        <div class="form-group">
		                            <span>Tahun Akademik</span>
		                            <input type="text" class="form-control" value="<?= $t['tahun']; ?>" id="tahun" name="tahun" placeholder="Tahun Akademik">
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
		<!-- End Edit Modal -->