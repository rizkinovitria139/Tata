<!DOCTYPE html>
<html lang="en">

<head>
    <title>SISWA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Mata Pelajaran</h2>
        <table class="table table-grey">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Nama Pengajar</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_mapel as $u) :
                    ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u->nama ?></td>
                    <td><?= $u->nama_kelas ?></td>
                    <td><?= $u->nama_mapel ?></td>
                    <td><?= $u->nama ?></td>


                    <!-- <td><a href="" class="btn btn-danger">Hapus</a>
                        <a href="" class="btn btn-warning">Detail</a>
                        <a href="" class="btn btn-primary">Ubah</a>
                    </td> -->
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>