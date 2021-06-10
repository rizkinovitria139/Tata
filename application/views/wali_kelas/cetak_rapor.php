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
                        <a class="btn btn-primary btn-icon"
                            href="<?=base_url('wali_kelas/cetak_rapor_by/'.$value['nis'])?>">
                            <i class="fas fa-file-download"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- coba -->