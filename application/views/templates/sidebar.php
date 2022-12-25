<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#f3f4f5" fill-opacity="1" d="M0,224L40,218.7C80,213,160,203,240,208C320,213,400,235,480,224C560,213,640,171,720,144C800,117,880,107,960,133.3C1040,160,1120,224,1200,234.7C1280,245,1360,203,1400,181.3L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
            </svg>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard')  ?>">
                <div class="sidebar-brand-text mx-3">MENU ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/index')  ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Halaman Utama</span></a>
            </li>

            <!-- Menu Data Parkir -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/masuk')  ?>">
                    <i class="fas fa-fw fa-parking"></i>
                    <span>Data Parkir Harian</span></a>
            </li>


            <!-- Menu Data Pelanggan -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/laporan')  ?>">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Lihat Riwayat Data Parkir</span></a>
            </li>

            <!-- Menu kata sandi -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/profile')  ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Menu Logout -->
            <li class="nav-item">
                <a onclick="return confirm('Yakin ingin Keluar?')" class="nav-link" href="<?= base_url('autentifikasi/logout')  ?>">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang Admin Parkiran W&J</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->