<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member/index')  ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Halaman Utama Penitip</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member/keluar')  ?>">
                    <i class="fas fa-fw fa-parking"></i>
                    <span>Keluar Parkir</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member/tagihan')  ?>">
                    <i class="fas fa-fw fa-parking"></i>
                    <span>Tagihan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('member/profile')  ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Menu Logout -->
            <li class="nav-item">
                <a onclick="return confirm('Yakin ingin Keluar?')" class="nav-link" href="<?= base_url('Autentifikasi/logout')  ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar Akun</span></a>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- judul -->
                    <h4 class="font-weight-bold">Aplikasi Layanan Penitipan Motor</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang Penitip Parkiran W&J</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->