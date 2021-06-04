<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <?php if ($this->session->flashdata('alert')) { ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('alert') ?>
        </div>
    <?php } ?>
    <div class="card mb-3">
        <div class="card-header bg-secondary text-white">
            Filter Data Presensi Siswa
        </div>
        <div class="card-body">
            <form class="form-inline" action="<?= base_url('datapresensi/view_presensi_siswa') ?>">
                <div class="form-group mb-2">
                    <label for="staticEmail2">Bulan : </label>
                    <select class="form-control ml-2" name="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Tahun : </label>
                    <select class="form-control ml-2" name="tahun">
                        <option value="">--Pilih Tahun--</option>

                        <?php $tahun = date('Y');
                        for ($i = 2021; $i < $tahun + 5; $i++) { ?>

                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                        <?php } ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-outline-info mb-2 ml-auto"><i class="fas fa-eye"></i>Tampilkan
                    Data</button>
            </form>
        </div>

    </div>

    <!-- jika bulan dan tahun kosong tidak diinput pilihannya -->
    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }
    ?>

    <div class="alert alert-info">
        Menampilkan Data Kehadiran Siswa Bulan : <span class="font-weight-bold">
            <?php echo $bulan ?></span>
        Tahun :<span class="font-weight-bold">
            <?php echo $tahun ?></span>
    </div>



    <?php
    $jml_data = count($datapresensi);
    if ($jml_data > 0) {
        # code...

    ?>

        <table id="dataTableInit" class="table table-striped table-bordered " style="width:100%">
            <thead>
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">NIS</td>
                    <td class="text-center">Nama</td>
                    <td class="text-center">Kelas</td>
                    <td class="text-center">Hadir</td>
                    <td class="text-center">Sakit</td>
                    <td class="text-center">Alpha</td>
                    <td class="text-center">Izin</td>
                    <td class="text-center">Action</td>
                    <!-- <td class="text-center">NIP Pengajar</td> -->
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($datapresensi as $key => $dp) : ?>
                    <tr>

                        <td><?= $key + 1 ?></td>
                        <td><?= $dp['nis'] ?></td>
                        <td><?= $dp['nama'] ?></td>
                        <td><?= $dp['nama_kelas'] ?></td>
                        <td><?= $dp['hadir'] ?></td>
                        <td><?= $dp['sakit'] ?></td>
                        <td><?= $dp['alpha'] ?></td>
                        <td><?= $dp['izin'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-icon" onclick="showEditPresensi(<?= $dp['nis'] ?>)">
                                <i class="far fa-edit"></i>
                            </button>
                            <!-- <a class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editPresensiModal">
                                        <i class="far fa-edit"></i>
                                    </a> -->
                            <!-- <a class="btn btn-danger" href="" onclick="return confirm('Are you sure to delete this data ?');">
                                        <i class="far fa-trash-alt"></i>
                                    </a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle">Data masih kosong!</i></span>
    <?php } ?>

</div>



</div>
<!-- /.container-fluid -->


<!-- Start Modal Edit Presensi -->
<div class="modal fade" id="editPresensiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="presensimodalcontent" class="modal-content">

        </div>
    </div>
</div>

<!-- End Modal Edit Presensi -->