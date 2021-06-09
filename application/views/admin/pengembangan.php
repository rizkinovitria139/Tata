<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a class="btn btn-warning mb-3" data-toggle="modal" data-target="#tambahpengembanganModal">Tambah Pengembangan Diri</a>

    <div class="col-lg">
        <?= form_error('pengembangan_message'); ?>

        <?= $this->session->flashdata('pengembangan_message') ?>


        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pengembangan Diri</th>
                        <th scope="col">Pembimbing</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengembangan as $p) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $p['nama_pengembangan']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editpengembanganModal<?= $p['id_pengembangan']; ?>">
                                    <i class="far fa-edit"></i>
                                </button>
                                <a class="btn btn-danger" href="<?= base_url('admin/delete_pengembangan/') . $p['id_pengembangan']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

<!-- Tambah Pengembangan Modal -->
<div class="modal fade" id="tambahpengembanganModal" tabindex="-1" aria-labelledby="tambahpengembanganModalLabel" aria-hidden="true">
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
                <h5 class="modal-title" id="tambahpengembanganModalLabel">Tambah Pengembangan Diri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>admin/tambah_pengembangan" method="post">
                <div class="modal-body">
                    <span>Nama Pengembangan Diri</span>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_pengembangan" name="nama_pengembangan" placeholder="Masukkan Nama Pengembangan Diri">
                    </div>
                    <span>Pembimbing</span>
                    <div class="form-group">
                        <select class="form-control" name="nip_pembimbing" id="nip_pembimbing">
                            <option value="" selected></option>
                            <?php foreach ($guru as $g) { ?>
                                <option value="<?= $g['nip'] ?>">
                                    <?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
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
<!-- End Tambah Pengembangan Modal -->

<!-- Edit Modal -->
<?php foreach ($pengembangan as $p) : ?>
    <div class="modal fade" id="editpengembanganModal<?= $p['id_pengembangan'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editpengembanganModal<?= $p['id_pengembangan']; ?>Label" aria-hidden="true">
        <div class="modal-dialog" kelas="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModal<?= $p['id_pengembangan'] ?>">Edit Pengembangan Diri</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/edit_pengembangan/' . $p['id_pengembangan']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <span>ID Pengembangan</span>
                            <input type="text" class="form-control" readonly value="<?= $p['id_pengembangan']; ?>" id="id_pengembangan" name="id_pengembangan"">
                        </div>
                        <div class=" form-group">
                            <span>Nama Pengembangan</span>
                            <input type="text" class="form-control" value="<?= $p['nama_pengembangan']; ?>" id="nama_pengembangan" name="nama_pengembangan" placeholder="Nama Pengembangan">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="nip_pembimbing" id="nip_pembimbing">
                                <option value="<?= $p['nip_pembimbing']; ?>" selected><?php echo $p['nip_pembimbing'] . ' - ' . $p['nama']; ?></option>
                                <?php foreach ($guru as $g) { ?>
                                    <option value="<?= $g['nip'] ?>">
                                        <?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
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
<!-- End Edit Modal -->