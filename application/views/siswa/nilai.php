<body>
    <div class="container fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">
                Filter Data Nilai
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="" method="POST">
                                <select class="form-control" name="formal" onchange="location = this.value;">
                                    <option value="" selected>Filter </option>
                                    <option value="<?= base_url('Nilai/get_semester_1') ?>">7-1</option>
                                    <option value="<?= base_url('Nilai/get_semester_2') ?>">7-2</option>
                                    <option value="<?= base_url('Nilai/get_semester_3') ?>">8-1</option>
                                    <option value="<?= base_url('Nilai/get_semester_4') ?>">8-2</option>
                                    <option value="<?= base_url('Nilai/get_semester_5') ?>">9-1</option>
                                    <option value="<?= base_url('Nilai/get_semester_6') ?>">9-2</option>
                                </select>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <table class="table table-grey">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai KKM</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Deskripsi</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_nilai as $u) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td width="100"><?= $u['nama_mapel'] ?></td>
                        <td><?= $u['nilai_kkm'] ?></td>
                        <td><?= $u['nilai_tugas'] ?></td>
                        <td><?= $u['nilai_uts'] ?></td>
                        <td><?= $u['nilai_uas'] ?></td>
                        <td><?= $u['deskripsi'] ?></td>

                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>