		<!-- Begin Page Content -->
		<div class="container-fluid">

		    <!-- Page Heading -->
		    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
		    <div class="row">
		        <div class="col-lg-8">
		            <?= $this->session->flashdata('message'); ?>
		            <form action="<?= base_url('admin/siswa_tambah') ?>" method="POST">
		                <div class="form-group row ml-4">
		                    <span>NIS</span>
		                    <input type="text" class="form-control" id="nis" name="nis">
		                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>

		                    <span>NISN</span>
		                    <input type="text" class="form-control" id="nisn" name="nisn">
		                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>

		                    <span>Nama</span>
		                    <input type="text" class="form-control" id="nama" name="nama">
		                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>

		                    <span>Tempat Lahir</span>
		                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
		                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>

		                    <span>Tanggal Lahir</span>
		                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
		                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>

		                    <span>Alamat</span>
		                    <input type="text" class="form-control" id="" name="">
		                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>

		                    <span>Jenis Kelamin</span>
		                    <div class="form-check form-check-inline">
		                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan">
		                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
		                    </div>
		                    <div class="form-check form-check-inline">
		                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki_laki">
		                        <label class="form-check-label" for="inlineRadio1">Perempuan</label>
		                    </div>

		                    <span>NIS</span>
		                    <input type="text" class="form-control" id="" name="">
		                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
		                </div>

		        </div>
		        </form>
		    </div>
		</div>