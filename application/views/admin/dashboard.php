<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div>
        <div class="container">
            <h1 style="color: #0275d8 ;" class="font-weight-bolder text-center display-4">Parkiran W&J</h1>
            <img width="250px" class="rounded-circle mx-auto d-block" src="<?= base_url('assets/img/logoParkiryuk.png'); ?>"><br>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row container ml-auto">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Penitip</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $drp  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-3x fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Member Parkiran W&J</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $member  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-3x fa-history"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Pesanan Steam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $steam  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shower fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->