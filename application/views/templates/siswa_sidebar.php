        <!-- Sidebar -->
        <ul class="navbar-nav bg-siswa sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIAKAD SMP NEGERI 2 MOJO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>Siswa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href=" <?= base_url("profile") ?>">Profile</a>
                        <a class="collapse-item" href=" <?= base_url("change_password") ?>">Rubah Password</a>
                        <a class="collapse-item" href=" <?= base_url("lapor") ?>">Lapor BK</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('nilai'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Nilai</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('presensi'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Presensi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('mapel'); ?>">
                    <i class="fas fa-flask"></i>
                    <span>Mata Pelajaran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('jadwal'); ?>">
                    <i class="fas fa-th-list"></i>
                    <span>Jadwal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->