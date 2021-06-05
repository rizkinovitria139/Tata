        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

            </div>
            <!-- <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div> -->


            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/student.png') ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $siswa['nama']; ?></h5>
                            <p class="card-text"><?= $siswa['nis']; ?></p>
                            <p class="card-text"><?= $siswa['email_siswa']; ?></p>
                            <p class="card-text"><?= $siswa['alamat_siswa']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <!-- /.container-fluid -->