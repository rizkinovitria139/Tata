<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="col-lg">

        <div class="row">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Nilai Tugas</th>
                        <th scope="col">Nilai UTS</th>
                        <th scope="col">Nilai UAS</th>
                        <th scope="col">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($nilai as $n) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $n['nama']; ?></td>
                            <td><?= $n['nama_mapel']; ?></td>
                            <td><?= $n['nilai_tugas']; ?></td>
                            <td><?= $n['nilai_uts']; ?></td>
                            <td><?= $n['nilai_uas']; ?></td>
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