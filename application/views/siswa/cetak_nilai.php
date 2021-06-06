<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/LOGO SMP.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <table>
            <tr>
            </tr>
            <td colspan="2"> </td>
            <tr>
                <td width="150">Nama Sekolah</td>
                <td width="50">:</td>
                <td>UPTD SMPN 2 MOJO</td>
            </tr>
            <tr>
                <td width="150">Alamat</td>
                <td width="50">:</td>
                <td width="">DS. KRANDING</td>
            </tr>
            <tr>
                <?php foreach ($data_nilai as $s) : ?>
                    <td width="150">Nama Peserta Didik</td>
                    <td width="50">:</td>
                    <td width=""><?= $s['nama'] ?></td>
            </tr>
            <tr>
                <td width="150">NIS/NISN</td>
                <td width="50">:</td>
                <td width=""><?= $s['nis'] . '/' . $s['nisn'] ?></td>
            <?php endforeach; ?>
            </tr>
            <td colspan="2"> </td>
            <tr>
                <?php foreach ($data_nilai as $s) : ?>
                    <td width="150">Kelas</td>
                    <td width="50">:</td>
                    <td width=""><?= $s['nama_kelas'] ?></td>
            </tr>
            <tr>
                <td width="150">Semester</td>
                <td width="50">:</td>
                <td width=""><?= $s['semester'] ?></td>
            </tr>
            <tr>
                <td width="150">Tahun Akademik</td>
                <td width="50">:</td>
                <td width=""><?= $s['tahun'] ?></td>
            <?php endforeach; ?>
            </tr>

        </table>

        <table class="tg ml-2 mr-2 mt-4" border="1">
            <thead>
                <tr border="1" align="center">
                    <th width="50">No</th>
                    <th width="200">Mata Pelajaran</th>
                    <th>KKM *)</th>
                    <th>Nilai</th>
                    <th>Deskripsi</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_nilai as $u) :
                ?>
                    <tr border="1">
                        <td border="1" width="50" align="center"><?= $no++; ?></td>
                        <td border="1" width="200"><?= $u['nama_mapel'] ?></td>
                        <td border="1" align="center"><?= $u['nilai_kkm'] ?></td>
                        <td border="1" align="center"><?= $u['nilai_uas'] ?></td>
                        <td border="1"><?= $u['deskripsi'] ?></td>

                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>

    <style type="text/css">
        @media print {
            @page {
                size: auto;
                /* auto is the initial value */
                size: A3 portrait;
                /* margin-left: 50px; */
                /* this affects the margin in the printer settings */
                border: 1px solid red;
                /* set a border for all printed pages */
            }
        }
    </style>
</body>




<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/table-parser.js"></script>