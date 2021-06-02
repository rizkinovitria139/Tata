<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="row">

            <div class="col-lg">
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

        <h2>Jadwal Mata Pelajaran</h2>
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