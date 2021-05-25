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
                        <th scope="col">ID Mapel </th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mapel as $n) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $n->id_mapel; ?></td>
                            <td><?= $n->nama_mapel; ?></td>
                            <td><?= $n->nama_kelas; ?></td>

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