<div class="modal-header">
    <h5 class="modal-title">Mulai forum konsultasi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="<?= base_url("Konsultasi/submitForum") ?>" method="post">
    <div class="modal-body">
        <span class="text-danger">Sebelum anda melakukan konsultasi, silahkan mengisi judul konsultasi dengan topik masalah anda dan keterangan tambahan.</span>
        <div class="row m-1">
            <div class="col">
                <h5>Data Guru BK</h5>
                <div>
                    <div class="form-group">
                        <label for="nip">Nama Guru BK</label>
                        <select class="form-control" name="nip" id="nip">
                            <?php foreach ($bkdata as $key => $value) { ?>
                                <option value="<?= $value['nip'] ?>"><?= $value['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <h5>Data Guru BK</h5>
                <div class="form-group">
                    <label for="namaforum">Judul Forum</label>
                    <input type="text" class="form-control" name="namaforum" id="namaforum" aria-describedby="forum" placeholder="Judul forum dengan BK" required>
                </div>
                <div class="form-group">
                    <label for="keteranganforum">Keterangan forum</label>
                    <textarea class="form-control" name="keteranganforum" id="keteranganforum" required rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Mulai Forum</button>
    </div>
</form>