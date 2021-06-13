<div class="container">
    <div>
        <h1>Konsultasi</h1>
        <p class="lead">Konsultasi kepada siswa</p>
        <hr>
        <?php if ($this->session->flashdata('alert')) { ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('alert') ?>
            </div>
        <?php } ?>
    </div>
    <h3>Daftar siswa konsultasi</h3>
    <div class="d-flex flex-wrap">
        <?php if ($forum) { ?>
            <?php foreach ($forum as $key => $value) { ?>
                <div class="card m-3 w-25">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['nama'] ?></h5>
                        <p class="card-text m-0">NIS : <?= $value['nis_siswa'] ?></p>
                        <p class="card-text m-0">Judul : <?= $value['judul_forum'] ?></p>
                        <p class="card-text m-0">Keterangan : <?= $value['keterangan'] ?></p>
                        <a href="<?= base_url('bk/pesan/' . $value['id_forum']) ?>" class="btn btn-sm btn-primary m-1">Buka</a>
                        <a href="<?= base_url('bk/hapusForum/' . $value['id_forum']) ?>" class="btn btn-sm btn-danger m-1">Hapus forum</a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Tidak ada siswa yang konseling</p>
        <?php } ?>
    </div>
</div>