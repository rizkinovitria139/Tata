<div class="container">
    <div>
        <h1>Konsultasi</h1>
        <p class="lead">Konsultasi kepada siswa</p>
        <hr>
    </div>
    <h3>Daftar siswa konsultasi</h3>
    <div class="d-flex flex-wrap">
        <?php if ($forum) { ?>
            <?php foreach ($forum as $key => $value) { ?>
                <div class="card m-3 w-25">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['nama'] ?></h5>
                        <p class="card-text">NIS : <?= $value['nis_siswa'] ?></p>
                        <a href="<?= base_url('bk/pesan/' . $value['id_forum']) ?>" class="btn btn-primary">Konsultasi sekarang</a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Tidak ada siswa yang konseling</p>
        <?php } ?>
    </div>
</div>