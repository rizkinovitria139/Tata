<body>
    <div class="container fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">
                Filter Data Presensi Siswa
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="col-md-4">
                        <div class="form-group">
                            <form action="" method="POST">
                                <select class="form-control" name="formal" onchange="location = this.value;">
                                    <option value="" selected>Filter berdasarkan hari</option>
                                    <option value="<?= base_url('Jadwal/get_hari_senin') ?>">Senin</option>
                                    <option value="<?= base_url('Jadwal/get_hari_selasa') ?>">Selasa</option>
                                    <option value="<?= base_url('Jadwal/get_hari_rabu') ?>">Rabu</option>
                                    <option value="<?= base_url('Jadwal/get_hari_kamis') ?>">Kamis</option>
                                    <option value="<?= base_url('Jadwal/get_hari_jumat') ?>">Jumat</option>
                                    <option value="<?= base_url('Jadwal/get_hari_sabtu') ?>">Sabtu</option>
                                </select>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <!-- <p>Anda dapat mengelola data user</p> -->
        <table class="table table-grey">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <!-- <th>NIP Pengajar</th> -->
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_jadwal as $j) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $j['hari']; ?></td>
                        <td><?= $j['nama_kelas']; ?></td>
                        <td><?= $j['nama_mapel']; ?></td>
                        <td><?= $j['waktu_mulai']; ?></td>
                        <td><?= $j['waktu_akhir']; ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>