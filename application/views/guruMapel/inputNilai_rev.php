<div class="container">
    <div>
        <h1>Form Penilaian Kelas <?= $siswaKelas[0]["nama_kelas"] ?></h1>
        <p class="lead">Input nilai akhir siswa pada kelas <?= $siswaKelas[0]["nama_mapel"] ?> </p>
        <hr>
    </div>

    <div>
        <table id="nilaiSiswa" class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th hidden scope="col">id kelas</th>
                    <th hidden scope="col">id mapel</th>
                    <th scope="col">Tugas 1</th>
                    <th scope="col">Tugas 2</th>
                    <th scope="col">Tugas 3</th>
                    <th scope="col">Tugas 4</th>
                    <th scope="col">UTS</th>
                    <th scope="col">UAS</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswaKelas as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['nama_kelas'] ?></td>
                        <td hidden><?= $value['id_kelas'] ?></td>
                        <td hidden><?= $value['id_mapel'] ?></td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" value="0" name="nilai">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" value="0" name="nilai">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" value="0" name="nilai">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" value="0" name="nilai">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" value="0" name="nilai">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" value="0" name="nilai">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="keterangan" id="keterangan<?= $value['nis'] ?>" aria-describedby="helpId" placeholder="Keterangan nilai">
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <button type="button" onclick="submitNilai()" class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>