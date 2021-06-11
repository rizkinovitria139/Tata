        <!-- Sidebar -->
        <ul class="navbar-nav bg-wali sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img class="img-profile" height="50" width="50" src="<?= base_url('assets/img/admin.png') ?>">
                </div>
                <div class="sidebar-brand-text mx-3">Wali Kelas</div>
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
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('wali_kelas/tambah_nilai_k'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Nilai Kepribadian</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('wali_kelas/tambah_nilai'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Nilai Pengembangan Diri</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('wali_kelas/cetak_rapor'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Cetak Rapor</span></a>
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