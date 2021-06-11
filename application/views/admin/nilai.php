<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="col-lg">

        <div class="card-mb3">
            <div class="card-header bg-secondary text-white">
                Filter Data Nilai Siswa
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="" method="POST">
                                <select class="form-control" name="formal" onchange="location = this.value;">
                                    <option value="" selected>--Pilih Kelas--</option>
                                    <?php foreach ($kelas as $k) { ?>
                                    <option value="<?= base_url('admin/get_nilai_siswa_by/' . $k['id_kelas']) ?>">
                                        <?php echo $k['nama_kelas'] . ' - ' . $k['tahun']; ?></option>
                                    <?php }; ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_open('admin/search_nilai_siswa') ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search..." name="keyword"
                                autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-primary" name="submit">
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Nilai KKM</th>
                        <th scope="col">Nilai Tugas</th>
                        <th scope="col">Nilai UTS</th>
                        <th scope="col">Nilai UAS</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($nilai as $n) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td width="100"><?= $n['nama']; ?></td>
                        <td width="100"><?= $n['nama_mapel']; ?></td>
                        <td><?= $n['nilai_kkm']; ?></td>
                        <td><?= $n['nilai_tugas']; ?></td>
                        <td><?= $n['nilai_uts']; ?></td>
                        <td><?= $n['nilai_uas']; ?></td>
                        <td><?= $n['deskripsi']; ?></td>
                        <td><?= $n['semester']; ?></td>

                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->