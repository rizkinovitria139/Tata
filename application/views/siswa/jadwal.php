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
        <h2>Jadwal Mata Pelajaran</h2>
        <!-- <p>Anda dapat mengelola data user</p> -->
        <table class="table table-grey">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Jam ke</th>
                    <th>Waktu</th>
                    <th>NIP Pengajar</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jadwal as $u) :
                    ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u['kelas'] ?></td>
                    <td><?= $u['hari'] ?></td>
                    <td><?= $u['nama_mapel'] ?></td>
                    <td><?= $u['jam_ke'] ?></td>
                    <td><?= $u['waktu'] ?></td>
                    <td><?= $u['nip_pengajar'] ?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>