<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div>
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <p class="lead">Input nilai siswa berdasarkan kelas</p>
    </div>

    <table class="table table-striped table-bordered" style="width: 100%;" id="dataTableInit">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>ID Mapel </th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Action</th>
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
                    <td>
                        <a role="button" href="<?= base_url('Guru_Mapel/tambah_nilai_rev/' . $n->id_mapel) ?>" class="btn btn-primary btn-sm <?= $this->m_nilai->checkMapelNilai($n->id_mapel) != 0 ? "disabled" : "enable" ?>">Submit</a>
                        <a role="button" href="<?= base_url('Guru_Mapel/edit_nilai/' . $n->id_mapel) ?>" class="btn btn-success btn-sm">Edit</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- End of Main Content -->