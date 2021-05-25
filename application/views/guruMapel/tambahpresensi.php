        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white">
                    Filter Data Presensi Siswa
                </div>
                <div class="card-body">

                    <?= $this->session->flashdata('message');?>

                    <form class="form-inline">
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
                                for($i=2021; $i<$tahun+5; $i++) { ?>

                                <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                <?php } ?>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-outline-info mb-2 ml-auto"><i
                                class="fas fa-eye"></i>Tampilkan
                            Data</button>

                    </form>
                </div>

            </div>

            <!-- jika bulan dan tahun kosong tidak diinput pilihannya -->
            <?php
            if ((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan =$_GET['bulan'];
                $tahun =$_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else {
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
             ?>

            <div class="alert alert-info">
                Menampilkan Data Kehadiran Siswa Bulan : <span class="font-weight-bold">
                    <?php echo $bulan ?></span>
                Tahun :<span class="font-weight-bold">
                    <?php echo $tahun ?></span>
            </div>

            <?php
                $jml_data =count($datapresensi);
                if ($jml_data > 0) {
                    # code...

             ?>

            <table class="table table-bordered table-striped">
                <tr>
                    <td class="text-center">No</td>
                    <td class="text-center">NIS</td>
                    <td class="text-center">Nama Siswa</td>
                    <td class="text-center">Kelas</td>
                    <td class="text-center">Hadir</td>
                    <td class="text-center">Sakit</td>
                    <td class="text-center">Alpha</td>
                    <td class="text-center">Action</td>
                    <!-- <td class="text-center">NIP Pengajar</td> -->
                </tr>

                <?php $no=1; foreach($datapresensi as $dp) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $dp ->nis ?></td>
                    <td><?php echo $dp ->nama_siswa ?></td>
                    <td><?php echo $dp ->nama_kelas ?></td>
                    <td><?php echo $dp ->hadir ?></td>
                    <td><?php echo $dp ->sakit ?></td>
                    <td><?php echo $dp ->alpha ?></td>
                    <td>
                        <a class="btn btn-primary btn-icon" href="" data-toggle="modal"
                            data-target="#editPresensiModal">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-danger" href=""
                            onclick="return confirm('Are you sure to delete this data ?');">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>

                </tr>
                <?php endforeach; ?>

            </table>

            <?php } else { ?>
            <span class="badge badge-danger"><i class="fas fa-info-circle">Data masih kosong!</i></span>
            <?php } ?>

        </div>
        </div>
        <!-- /.container-fluid -->


        <!-- Start Modal Edit Presensi -->
        <!-- 
        <?php foreach ($datapresensi as $d) : ?>
        <div class="modal fade" id="editPresensiModal<?= $d['id_presensi'] ?>" tabindex="-1" class="dialog"
            aria-labelledby="editPresensiModal<?= $d['id_presensi']; ?>Label" aria-hidden="true">
            <div class="modal-dialog" kelas="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMenuModal<?= $d['id_presensi'] ?>">Edit kelas</h5>
                        <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </buttond>
                    </div>
                    <form action="<?= base_url('admin/edit_presensi/' . $d['id_presensi']); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <span>Id Kelas</span>
                                <input type="text" class="form-control" readonly value="<?= $k['id_kelas']; ?>"
                                    id="id_kelas" name="id_kelas" placeholder="Id Kelas">
                            </div>
                            <div class="form-group">
                                <span>Nama Kelas</span>
                                <input type="text" class="form-control" value="<?= $k['nama_kelas']; ?>" id="nama_kelas"
                                    name="nama_kelas" placeholder="Nama Kelas">
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="nip_wali_kelas" id="nip_wali_kelas">
                                    <option value="" selected></option>
                                    <?php foreach ($guru as $g) { ?>
                                    <option value="<?= $g['nip'] ?>">
                                        <?php echo $g['nip'] . ' - ' . $g['nama']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <span>Tahun Akademik</span>
                                <select class="form-control" name="id_tahun_akademik" id="id_tahun_akademik">
                                    <option value="" selected></option>
                                    <?php foreach ($tahun_akademik as $t) { ?>
                                    <option value="<?= $t['id_tahun_akademik'] ?>">
                                        <?php echo $t['id_tahun_akademik'] . ' - ' . $t['tahun']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?> -->

        <!-- End Modal Edit Presensi -->