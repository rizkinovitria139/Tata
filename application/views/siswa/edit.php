        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <?= form_open_multipart('siswa/edit'); ?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $siswa['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $siswa['email_siswa']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address"
                                value="<?= $siswa['alamat_siswa']; ?>">
                        </div>
                    </div>

                    <!-- Untuk menambahkan gambar -->
                    <!-- <div class="form-group row">
                        <div class="col-sm-4">Tambahkan Foto</div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>

                    </form>

                </div>
            </div>

        </div>



        </div>
        <!-- /.container-fluid -->