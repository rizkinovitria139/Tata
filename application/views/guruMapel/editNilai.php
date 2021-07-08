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
                    <th hidden scope="col">id nilai</th>
                    <th hidden scope="col">nis</th>
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
                <?php foreach ($siswaKelas as $key => $value) {
                    $sis = $this->m_nilai->get_nilai_by_id(['nis' => $value['nis'], 'id_mapel' => $value['id_mapel']]);
                ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['nama_kelas'] ?></td>
                        <td hidden><?= $sis->id_nilai ?></td>
                        <td hidden><?= $value['nis'] ?></td>
                        <td hidden><?= $value['id_kelas'] ?></td>
                        <td hidden><?= $value['id_mapel'] ?></td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" name="nilai" value="<?= $sis->tugas1 ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" name="nilai" value="<?= $sis->tugas2 ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" name="nilai" value="<?= $sis->tugas3 ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" name="nilai" value="<?= $sis->tugas4 ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" name="nilai" value="<?= $sis->uts ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" minlength="1" min="0" max="100" maxlength="3" class="form-control" name="nilai" value="<?= $sis->uas ?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="keterangan" value="<?= $sis->deskripsi ?>" id="keterangan<?= $value['nis'] ?>" aria-describedby="helpId" placeholder="Keterangan nilai">
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <button type="button" onclick="editNilai()" class="btn btn-lg btn-block btn-primary">Submit</button>
    </div>
</div>