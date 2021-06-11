<div class="container">
    <div>
        <h1>Presensi Kelas <?= $siswaKelas[0]["nama_kelas"] ?></h1>
        <p class="lead">Input nilai akhir siswa pada kelas <?= $siswaKelas[0]["nama_mapel"] ?> </p>
        <hr>
    </div>

    <div>
        <table id="nilaiSiswa" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th hidden scope="col">id kelas</th>
                    <th hidden scope="col">id mapel</th>
                    <th scope="col">Nilai Tugas</th>
                    <th scope="col">Nilai UTS</th>
                    <th scope="col">Nilai UAS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswaKelas as $key => $value) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <th><?= $value['nis'] ?></th>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['nama_kelas'] ?></td>
                    <td hidden><?= $value['id_kelas'] ?></td>
                    <td hidden><?= $value['id_mapel'] ?></td>
                    <td>
                        <div class="form-group">
                            <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control"
                                value="0" name="nilai">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control"
                                value="0" name="nilai">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control"
                                value="0" name="nilai">
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="form-group w-50">
            <label for="">Pilih Semester</label>
            <select class="form-control" id="semesterSelect">
                <?php foreach ($semesterData as $key => $value) { ?>
                <option value="<?= $value['id_semester'] ?>">Semester <?= $value['semester'] ?></option>
                <?php } ?>
            </select>
            <small id="helpId" class="text-muted">Masukan semester nilai yang akan di masukan</small>
        </div>
    </div>
    <div class="text-center">
        <button type="button" onclick="submitNilai()" class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>