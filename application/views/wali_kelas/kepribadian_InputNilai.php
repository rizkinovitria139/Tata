<div class="container">
    <div>
        <h1>Nilai Kepribadian Diri</h1>
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
                    <th hidden scope="col">id pengembangan</th>
                    <th scope="col">Kelakuan</th>
                    <th scope="col">Kerajinan</th>
                    <th scope="col">Kerapian</th>
                    <th scope="col">Kebersihan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswaKelas as $key => $value) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <th><?= $value['nis'] ?></th>
                    <td width="150"><?= $value['nama'] ?></td>
                    <td><?= $value['nama_kelas'] ?></td>
                    <td hidden><?= $value['id_kelas'] ?></td>

                    <td>
                        <div class="form-group">
                            <select class="form-control" name="kelakuan" id="kelakuan">
                                <option value=""> </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="kerajinan" id="kerajinan">
                                <option value=""> </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="kerapian" id="kerapian">
                                <option value=""> </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="kebersihan" id="kebersihan">
                                <option value=""> </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
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
        <button type="button" onclick="submitNilaiKepribadian()"
            class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>

<!-- coba -->