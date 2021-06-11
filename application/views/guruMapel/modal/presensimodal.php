<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Presensi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body d-flex">

    <div class="m-3 w-25">
        <p class="lead">Data diri siswa</p>
        <hr>
        <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" name="namasiswa" id="" class="form-control" readonly value="<?= $siswaPresensi->nama ?>">
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <input type="text" name="kelassiswa" id="" class="form-control" readonly value="<?= $siswaPresensi->nama_kelas ?>">
        </div>
        <div class="form-group">
            <label for="">Bulan</label>
            <input type="text" name="bulan" id="" class="form-control" readonly value="<?= date_format(date_create($siswaPresensi->bulan), "F Y") ?>">
        </div>
    </div>
    <div class="m-3 w-75">
        <p class="lead">Data absen</p>
        <hr>
        <div class="presensi-list-scrollable">
            <table id="dataTableInit" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataabsensi as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['bulan'] ?></td>
                            <td><?= $value['hadir'] ?></td>
                            <td>
                                <button type="button" onclick="editHarianPresensi(<?= $value['id_presensi'] ?>)" class="btn btn-primary btn-sm">Edit</button>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>