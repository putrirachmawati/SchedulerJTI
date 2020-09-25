<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fab fa-slack"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-capitalize">Scheduler JTI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <!-- Nav Item - Dashboard -->

    <?php if ($title == 'Dashboard') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>

        <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <!-- Create Schedule -->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#CreateSchedule" aria-expanded="true" aria-controls="CreateSchedule">
                <i class="fas fa-fw fa-calendar-plus"></i>
                <span>Create Schedule</span>
            </a>
            <div id="CreateSchedule" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Program Studi</h6>
                    <a class="collapse-item" href="buttons.html">MIF</a>
                    <a class="collapse-item" href="cards.html">TIF</a>
                    <a class="collapse-item" href="cards.html">TKK</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Master Data
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <!-- Dosen -->
        <?php if ($title == 'Data Dosen') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>


            <a class="nav-link" href="<?= base_url('Dosen'); ?>">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Dosen</span></a>
            </li>

            <!-- Mata Kuliah -->
            <?php if ($title == 'Data Mata Kuliah') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <a class="nav-link" href="<?= base_url('MataKuliah'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Mata Kuliah</span></a>
                </li>

                <!-- Ruang -->
                <?php $tt = 'Ruang' ?>
                <?php if ($title == 'Data Ruang') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>

                    <a class="nav-link" href="<?= base_url('Ruang'); ?>">
                        <i class="fas fa-fw fa-hotel"></i>
                        <span>Ruang</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

</ul>
<!-- End of Sidebar -->