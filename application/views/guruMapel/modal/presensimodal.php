<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Presensi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="<?= base_url('Tambah_presensi/doEditPresensi/' . $siswaPresensi->id_presensi) ?>" method="post">
    <div class="modal-body d-flex">

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
                <input type="text" name="bulan" id="" class="form-control" readonly value="<?= date_format(date_create($siswaPresensi->bulan), "F Y") ?>">
            </div>
        </div>
        <div class="m-3">
            <p class="lead">Data AIS</p>
            <hr>
            <div class="form-group">
                <label for="">Hadir</label>
                <input type="text" name="hadir" id="" required class="form-control" value="<?= $siswaPresensi->hadir ?>">
            </div>
            <div class="form-group">
                <label for="">Alpha</label>
                <input type="text" name="alpha" id="" required class="form-control" value="<?= $siswaPresensi->alpha ?>">
            </div>
            <div class="form-group">
                <label for="">Izin</label>
                <input type="text" name="izin" id="" required class="form-control" value="<?= $siswaPresensi->izin ?>">
            </div>
            <div class="form-group">
                <label for="">Sakit</label>
                <input type="text" name="sakit" id="" required class="form-control" value="<?= $siswaPresensi->sakit ?>">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>