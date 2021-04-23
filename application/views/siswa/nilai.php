<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Data Nilai</h2>
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