<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>

    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/admin.png'); ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $admin['nama']; ?></h5>
                    <h5 class="card-title"><?= $admin['username']; ?></h5>
                    <p class="card-text"><?= $admin['password']; ?></p>
                    <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', strtotime($user['date_created'])); ?></small></p> -->
                </div>
            </div>
        </div>
    </div>



</div>