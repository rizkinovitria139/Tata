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
                        <a href="<?Php echo base_url('Tambah_presensi/inputPresensi') ?>"
                            class="btn btn-outline-success mb-2 ml-2"><i class="fas fa-plus"></i> Tambah Presensi
                        </a>
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
                    <!-- <td><?php echo $dp ->nip ?></td> -->
                </tr>
                <?php endforeach; ?>

            </table>

            <?php } else { ?>
            <span class="badge badge-danger"><i class="fas fa-info-circle">Data masih kosong!</i></span>
            <?php } ?>

        </div>



        </div>
        <!-- /.container-fluid -->