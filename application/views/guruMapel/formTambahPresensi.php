        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white">
                    Tambah Presensi Siswa
                </div>
                <div class="card-body">

                    <!-- <?= $this->session->flashdata('message');?> -->

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
                                class="fas fa-eye"></i>Generate
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
            <form method="POST">
                <button class="btn btn-outline-success mb-3" type="submit" name="submit" value="submit">Simpan</button>

                <table class="table table-bordered table-striped">
                    <tr>
                        <td class="text-center">No</td>
                        <td class="text-center">NIS</td>
                        <td class="text-center">Nama Siswa</td>
                        <td class="text-center">Kelas</td>
                        <td class="text-center" width="8%">Hadir</td>
                        <td class="text-center" width="8%">Sakit</td>
                        <td class="text-center" width="8%">Alpha</td>
                        <!-- <td class="text-center">NIP Pengajar</td> -->
                    </tr>

                    <?php $no=1; foreach($input_presensi as $dp) : ?>
                    <tr>
                        <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun ?>">
                        <input type="hidden" name="nis[]" class="form-control" value="<?php echo $dp->nis ?>">
                        <input type="hidden" name="nama_siswa[]" class="form-control" value="<?php echo $dp->nama ?>">
                        <input type="hidden" name="nama_kelas[]" class="form-control"
                            value="<?php echo $dp->id_kelas ?>">
                        </>

                        <td><?php echo $no++ ?></td>
                        <td><?php echo $dp ->nis ?></td>
                        <td><?php echo $dp ->nama ?></td>
                        <td><?php echo $dp ->nama_kelas ?></td>

                        <td><input type="number" name="hadir[]" class="form-control" value="0"></td>
                        <td><input type="number" name="sakit[]" class="form-control" value="0"></td>
                        <td><input type="number" name="alpha[]" class="form-control" value="0"></td>
                    </tr>
                    <?php endforeach; ?>

                    

                </table><br><br><br><br>
            </form>
        </div>

        </div>
        <!-- /.container-fluid -->