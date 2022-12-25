<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="alert alert-info" role="alert">
                <strong>Selamat datang !</strong> anda telah login sebagai penitip parkiran W&J
            </div>
            <div class="card">
                <div class="text-white card-header font-weight-bold bg-primary">Data Penitip</div>
                <?php foreach ($penitip as $p) : ?>
                    <?php if ($p->status_masuk == '2') { ?>
                        <h5>Mohon maaf, mungkin anda <b>sudah</b> melakukan parkir atau <b>belum</b> melakukan parkir</h5>
                    <?php } else { ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img width="280px" src="<?= base_url(); ?>assets/img/penitip.png" class="float-left" alt="logo penitip">
                                </div>
                                <div class="col-md-7">
                                    <table class="table">
                                        <tr>
                                            <td>Nomor Plat Motor</td>
                                            <td>:</td>
                                            <td><strong><?= $p->no_plat  ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Kode Karcis</td>
                                            <td>:</td>
                                            <td><strong><?= $p->kd_masuk  ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td>Ciri Kendaraan</td>
                                            <td>:</td>
                                            <td><strong><?= $p->merk_motor  ?></strong></td>
                                        </tr>


                                        <tr>
                                            <td>Waktu Masuk Motor</td>
                                            <td>:</td>
                                            <td><strong><?= date("l, H:i:s", strtotime(($p->tgl_masuk)))  ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Status Steam</td>
                                            <td>:</td>
                                            <?php if ($p->steam == 'Ingin') { ?>
                                                <td style="color: green;">Ingin</td>
                                            <?php } elseif ($p->steam == 'Tidak') { ?>
                                                <td style="color: red;">Tidak</td>
                                            <?php } else { ?>
                                                <td style="color: blue;">Sudah</td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>