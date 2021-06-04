<div class="container">
    <h1>Presensi Kelas <?= $siswaJadwal[0]["nama_kelas"] ?></h1>
    <p class="lead">Presensi kehadiran siswa pada jadwal mata pelajaran <?= $siswaJadwal[0]["nama_mapel"] ?></p>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswaJadwal as $key => $value) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <th><?= $value['nis'] ?></th>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['nama_kelas'] ?></td>
                    <td hidden><?= $value['id_kelas'] ?></td>
                    <td>
                        <div class="form-group m-0">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="hadir">Hadir</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-center">
        <button type="button" onclick="doPresensi()" class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>