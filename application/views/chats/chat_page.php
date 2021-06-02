<div class="mb-5">
    <h3>Daftar Guru BK</h3>
    <div class="d-flex flex-wrap">

        <?php foreach ($guru_bk as $key => $value) { ?>

            <div class="card m-2 w-25">
                <div class="card-body">
                    <h5 class="card-title"><?= $value['nama'] ?></h5>
                    <p class="card-text">Email : <?= $value['email'] ?></p>
                    <a href="<?= base_url('konsultasi/pesan/' . $value['nip']) ?>" class="btn btn-primary">Konsultasi sekarang</a>
                </div>
            </div>

        <?php } ?>
    </div>
</div>