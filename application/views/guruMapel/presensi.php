<div class="container">
    <h1>Presensi Kelas <?= $siswaJadwal[0]["nama_kelas"] ?></h1>
    <p class="lead">Presensi kehadiran siswa pada jadwal mata pelajaran <?= $siswaJadwal[0]["nama_mapel"] ?></p>
    <p class="text-danger">Jika siswa hadir, keterangan dapat dikosongkan</p>
    <hr>
    <table id="siswaPresensi" class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nis</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th hidden scope="col">id kelas</th>
                <th scope="col">Kehadiran</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswaJadwal as $key => $value) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <th><?= $value['nis'] ?></th>
                    <th><?= $value['nama'] ?></th>
                    <th><?= $value['nama_kelas'] ?></th>
                    <th hidden><?= $value['id_kelas'] ?></th>
                    <th>
                        <div class="form-group m-0">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="hadir">Hadir</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </div>
                    </th>
                    <th>
                        <input type="text" class="form-control" name="keterangan" id="" aria-describedby="helpId" placeholder="Keterangan">
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="form-group">
        <label for="tanggal">Tanggal Kelas</label>
        <input type="date" class="form-control" name="tanggal" id="tanggalinput" aria-describedby="tanggal" required>
        <small id="tanggal" class="form-text text-muted"></small>
    </div>
    <div class="text-center">
        <button type="button" onclick="doPresensi()" class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>