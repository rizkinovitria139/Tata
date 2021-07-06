<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahnilaiKModal">Tambah Nilai</a>

    <div class="col-lg">
        <?= form_error('nilaikepribadian_message'); ?>

        <?= $this->session->flashdata('nilaikepribadian_message') ?>


        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelakuan</th>
                        <th scope="col">Kerajinan</th>
                        <th scope="col">Kerapian</th>
                        <th scope="col">Kebersihan</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($nilai_k as $k) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td width='100'><?= $k['nama']; ?></td>
                            <td><?= $k['kelakuan']; ?></td>
                            <td><?= $k['kerajinan']; ?></td>
                            <td><?= $k['kerapian']; ?></td>
                            <td><?= $k['kebersihan']; ?></td>
                            <td><?= $k['semester']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editnilaiKModal<?= $k['id_nilai_kepribadian']; ?>">
                                    <i class="far fa-edit"></i>
                                </button>
                                <a class="btn btn-danger" href="<?= base_url('wali_kelas/delete_nilaiK/') . $k['id_nilai_kepribadian']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

<!-- Tambah Nilai Kepribadian Modal -->
<div class="modal fade" id="tambahnilaiKModal" tabindex="-1" aria-labelledby="tambahnilaiKModalLabel" aria-hidden="true">
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
                <h5 class="modal-title" id="tambahnilaiKModalLabel">Tambah Nilai Kepribadian Diri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>wali_kelas/tambah_nilai_kepribadian" method="post">
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
                    <span>Nilai Kelakuan</span>
                    <div class="form-group">
                        <select class="form-control" name="kelakuan" id="kelakuan">
                            <option value=""> </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <span>Nilai Kerajinan</span>
                    <div class="form-group">
                        <select class="form-control" name="kerajinan" id="kerajinan">
                            <option value=""> </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <span>Nilai Kerapian</span>
                    <div class="form-group">
                        <select class="form-control" name="kerapian" id="kerapian">
                            <option value=""> </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <span>Nilai Kebersihan</span>
                    <div class="form-group">
                        <select class="form-control" name="kebersihan" id="kebersihan">
                            <option value=""> </option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
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
<!-- End Tambah Nilai Kepribadian Modal -->

<!-- Start Edit Nilai Kepribadian Modal -->
<?php foreach ($nilai_x as $indexvc => $xvc) { ?>
    <div class="modal fade" id="editnilaiKModal<?= $xvc['id_nilai_kepribadian'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editnilaiKModal<?= $xvc['id_nilai_kepribadian']; ?>Label" aria-hidden="true">
        <div class="modal-dialog" kelas="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModal<?= $xvc['id_nilai_kepribadian'] ?>">Edit Nilai Kepribadian</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('wali_kelas/edit_nilaiK/' . $xvc['id_nilai_kepribadian']); ?>" method="post">
                    <div class="modal-body">
                        <div class="modal-body">
                            <span>Siswa</span>
                            <div class="form-group">
                                <select class="form-control" name="nis" id="nis">
                                    <option value="<?= $xvc['nis'] ?>" selected><?= $xvc['nis'] . '-' . $xvc['nama'] ?> </option>
                                    <?php foreach ($siswa as $s) { ?>
                                        <option value="<?= $s['nis'] ?>">
                                            <?= $s['nis'] . ' - ' . $s['nama'] ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <span>Nilai Kelakuan</span>
                            <div class="form-group">
                                <select class="form-control" name="kelakuan" id="kelakuan">
                                    <option value="<?= $xvc['kelakuan'] ?>"> <?= $xvc['kelakuan'] ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>

                            <span>Nilai Kerajinan</span>
                            <div class="form-group">
                                <select class="form-control" name="kerajinan" id="kerajinan">
                                    <option value="<?= $xvc['kerajinan'] ?>"> <?= $xvc['kerajinan'] ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>

                            <span>Nilai Kerapian</span>
                            <div class="form-group">
                                <select class="form-control" name="kerapian" id="kerapian">
                                    <option value="<?= $xvc['kerapian'] ?>"> <?= $xvc['kelakuan'] ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>

                            <span>Nilai Kebersihan</span>
                            <div class="form-group">
                                <select class="form-control" name="kebersihan" id="kebersihan">
                                    <option value="<?= $xvc['kebersihan'] ?>"> <?= $xvc['kelakuan'] ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                            </td>

                            <span>Semester</span>
                            <div class="form-group">
                                <select class="form-control" name="id_semester" id="id_semester">
                                    <option value="<?= $xvc['id_semester'] ?>" selected> <?= $xvc['id_semester'] . ' - ' . $xvc['semester'] ?></option>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Edit Nilai Kepribadian Modal -->