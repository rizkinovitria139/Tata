<div class="container">
    <div>
        <h1>Cetak Rapor Siswa</h1>
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
                    <th scope="col">Action</th>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <form action="" method="POST">
                                    <select class="form-control" name="formal" onchange="location = this.value;">
                                        <option value="" selected>Cetak Rapor </option>
                                        <option value="<?= base_url('Wali_kelas/cetak_rapor_1/').$value['nis'] ?>">7-1
                                        </option>
                                        <option value="<?= base_url('Wali_kelas/cetak_rapor_2/').$value['nis'] ?>">7-2
                                        </option>
                                        <option value="<?= base_url('Wali_kelas/cetak_rapor_3/').$value['nis'] ?>">8-1
                                        </option>
                                        <option value="<?= base_url('Wali_kelas/cetak_rapor_4/').$value['nis'] ?>">8-2
                                        </option>
                                        <option value="<?= base_url('Wali_kelas/cetak_rapor_5/').$value['nis'] ?>">9-1
                                        </option>
                                        <option value="<?= base_url('Wali_kelas/cetak_rapor_6/').$value['nis'] ?>">9-2
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- coba -->