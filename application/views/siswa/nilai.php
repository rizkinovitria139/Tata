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

                                    <?php foreach ($semester as $s) { ?>
                                        <option value="<?= base_url('nilai/get_nilai_by/' . $s['id_semester']) ?>">
                                            <?php echo $s['id_semester'] . ' - ' . $s['semester']; ?></option>
                                    <?php }; ?>

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
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
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
                        <td><?= $u->nama ?></td>
                        <td><?= $u->nama_mapel ?></td>
                        <td><?= $u->nilai_tugas ?></td>
                        <td><?= $u->nilai_uts ?></td>
                        <td><?= $u->nilai_uas ?></td>

                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>