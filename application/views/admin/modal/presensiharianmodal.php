<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Presensi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="<?= base_url('DataPresensi/doEditPresensi/' . $siswaPresensi->id_presensi) ?>" method="post">
    <div class="modal-body">

        <div class="m-3">
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
                <input type="text" name="bulan" id="" class="form-control" readonly value="<?= date_format(date_create($siswaPresensi->bulan), "d F Y") ?>">
            </div>
            <div class="form-group">
                <label for="">Kehadiran</label>
                <select class="form-control" name="hadir" id="exampleFormControlSelect1">
                    <option <?= $siswaPresensi->hadir == 'hadir' ? 'selected' : 'non' ?> value="hadir">Hadir</option>
                    <option <?= $siswaPresensi->hadir == 'sakit' ? 'selected' : 'non' ?> value="sakit">Sakit</option>
                    <option <?= $siswaPresensi->hadir == 'izin' ? 'selected' : 'non' ?> value="izin">Izin</option>
                    <option <?= $siswaPresensi->hadir == 'alpha' ? 'selected' : 'non' ?> value="alpha">Alpha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" id="" class="form-control" value="<?= $siswaPresensi->keterangan ?>">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>