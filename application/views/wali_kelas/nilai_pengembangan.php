<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahnilaiPModal">Tambah Nilai</a>

    <div class="col-lg">
        <?= form_error('nilaipengembangan_message'); ?>

        <?= $this->session->flashdata('nilaipengembangan_message') ?>


        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pengembangan Diri</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($nilai_p as $p) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['nama_pengembangan']; ?></td>
                            <td><?= $p['nilai_pengembangan']; ?></td>
                            <td><?= $p['semester']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editnilaiPModal<?= $p['id_nilai_pengembangan']; ?>">
                                    <i class="far fa-edit"></i>
                                </button>
                                <a class="btn btn-danger" href="<?= base_url('wali_kelas/delete_nilaiP/') . $p['id_nilai_pengembangan']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

<!-- Tambah Nilai Pengembangan Modal -->
<div class="modal fade" id="tambahnilaiPModal" tabindex="-1" aria-labelledby="tambahnilaiPModalLabel" aria-hidden="true">
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
                <h5 class="modal-title" id="tambahnilaiPModalLabel">Tambah Nilai Pengembangan Diri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>wali_kelas/tambah_nilai_pengembangan" method="post">
                <div class="modal-body">
                    <span>Siswa</span>
                    <div class="form-group">
                        <select class="form-control" name="nis" id="nis">
                            <option value="" selected> </option>
                            <?php foreach ($siswa as $p) { ?>
                                <option value="<?= $p['nis'] ?>">
                                    <?= $p['nis'] . ' - ' . $p['nama'] ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <span>Nama Pengembangan Diri</span>
                    <div class="form-group">
                        <select class="form-control" name="id_pengembangan" id="id_pengembangan">
                            <option value="" selected> </option>
                            <?php foreach ($pengembangan as $p) { ?>
                                <option value="<?= $p['id_pengembangan'] ?>">
                                    <?= $p['id_pengembangan'] . ' - ' . $p['nama_pengembangan'] ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <td>
                        <span>Nilai</span>
                        <div class="form-group">
                            <select class="form-control" name="nilai_pengembangan" id="nilai_pengembangan">
                                <option value=""> </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <span>Keterangan</span>
                        <div class="form-group">
                            <input class="form-control" type="text" name="keterangan" id="keterangan">
                        </div>
                    </td>

                    <span>Semester</span>
                    <div class="form-group">
                        <select class="form-control" name="id_semester" id="id_semester">
                            <option value="" selected> </option>
                            <?php foreach ($semesterData as $d) { ?>
                                <option value="<?= $d['id_semester'] ?>">
                                    <?= $d['id_semester'] . ' - ' . $d['semester'] ?></option>
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
<!-- End Tambah Nilai Pengembangan Modal -->

<!-- Start Edit Nilai Pengembangan Modal -->
<?php foreach ($nilai_p as $p) : ?>
    <div class="modal fade" id="editnilaiPModal<?= $p['id_nilai_pengembangan'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editnilaiPModal<?= $p['id_nilai_pengembangan']; ?>Label" aria-hidden="true">
        <div class="modal-dialog" kelas="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModal<?= $p['id_nilai_pengembangan'] ?>">Edit Pengembangan Diri</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('wali_kelas/edit_nilaiP/' . $p['id_nilai_pengembangan']); ?>" method="post">
                    <div class="modal-body">
                        <div class="modal-body">
                            <span>Siswa</span>
                            <div class="form-group">
                                <select class="form-control" name="nis" id="nis">
                                    <option value="<?= $p['nis'] ?>" selected><?= $p['nis'] . '-' . $p['nama'] ?> </option>
                                    <?php foreach ($siswa as $s) { ?>
                                        <option value="<?= $s['nis'] ?>">
                                            <?= $s['nis'] . ' - ' . $s['nama'] ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <span>Nama Pengembangan Diri</span>
                            <div class="form-group">
                                <select class="form-control" name="id_pengembangan" id="id_pengembangan">
                                    <option value="<?= $p['id_pengembangan'] ?>" selected><?= $p['id_pengembangan'] . ' - ' . $p['nama_pengembangan'] ?> </option>
                                    <?php foreach ($pengembangan as $pe) { ?>
                                        <option value="<?= $pe['id_pengembangan'] ?>">
                                            <?= $pe['id_pengembangan'] . ' - ' . $pe['nama_pengembangan'] ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <td>
                                <span>Nilai</span>
                                <div class="form-group">
                                    <select class="form-control" name="nilai_pengembangan" id="nilai_pengembangan">
                                        <option value="<?= $p['nilai_pengembangan'] ?>"> <?= $p['nilai_pengembangan'] ?></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <span>Keterangan</span>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?= $p['keterangan'] ?>">
                                </div>
                            </td>

                            <span>Semester</span>
                            <div class="form-group">
                                <select class="form-control" name="id_semester" id="id_semester">
                                    <option value="<?= $p['id_semester'] ?>" selected> <?= $p['id_semester'] . ' - ' . $p['semester'] ?></option>
                                    <?php foreach ($semesterData as $d) { ?>
                                        <option value="<?= $d['id_semester'] ?>">
                                            <?= $d['id_semester'] . ' - ' . $d['semester'] ?></option>
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
<!-- End Edit Nilai Pengembangan Modal -->