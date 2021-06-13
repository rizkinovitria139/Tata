<div class="mb-5">
    <h3>Daftar Forum anda</h3>
    <button type="button" class="btn btn-primary float-right" onclick="startForum()">Buat forum baru</button>
    <div class="d-flex flex-wrap">

        <?php foreach ($forum as $key => $value) { ?>

            <div class="card m-2 w-25">
                <div class="card-body">
                    <h5 class="card-title"><?= $value['judul_forum'] ?></h5>
                    <p class="card-text"><?= $value['keterangan'] ?></p>
                    <a role="button" href="<?= base_url('konsultasi/pesan/' . $value['id_forum']) ?>" class="btn btn-primary float-right">Buka Forum</a>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalOpenForum" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div id="modalforum" class="modal-content">

        </div>
    </div>
</div>