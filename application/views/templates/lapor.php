<div class="container">
    <div class="card">
        <div class="card-header">
            <?= $title; ?></div>
        <div class="card-body">
            <?php 
			if(validation_errors() != false)
			{
				?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
            </div>
            <?php
			}
			?>
            <form method="post" action="<?php echo base_url(); ?>lapor/save">
                <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea class="form-control" name="isi" id="isi"></textarea>
                    <!-- // <input type="text" class="form-control" id="isi" name="isi"> -->
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label><br>
                    <input type="date" name="tanggal" id="tanggal"
                        class="form-control <?php if (form_error('tanggal')) : ?> is-invalid <?php endif; ?>"
                        value="<?= date('Y-m-d') ?>">
                    <div class="invalid-feedback"><?= form_error('tanggal'); ?></div>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file" class="form-control">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>