<div class="container">
    <h1>Presensi Kelas 7A</h1>
    <p class="lead">Presensi kehadiran siswa pada jadwal mata pelajaran IPA</p>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nis</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kehadiwan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswaJadwal as $key => $value) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <th><?= $value['nis'] ?></th>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['nama_kelas'] ?></td>
                    <td>
                        <div class="form-group m-0">
                            <select class="form-control" name="kehadiran<?= $value['nis'] ?>" id="exampleFormControlSelect1">
                                <option value="hadir">Hadir</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                            </select>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-center">
        <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>