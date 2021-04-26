<main role="main" class="container">
    <div class="card">
        <div class="card-header"><?= $title; ?></div>
        <div class="card-body">
            <a href="<?php echo base_url(); ?>lapor/" class="btn btn-success">Create</a>
            <br />
            <br />
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($lapor as $row) {
                ?>
                <tr>
                    <td widtd="5%"><?php echo $no++; ?></td>
                    <td><?php echo $row->isi; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <!-- <td>
                        <a href="<?php echo base_url(); ?>lapor/edit/<?php echo $row->nis; ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url(); ?>lapor/delete/<?php echo $row->nis; ?>"
                            class="btn btn-danger">Hapus</a>
                    </td> -->
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</main>