<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="text-white card-header font-weight-bold bg-primary">Tagihan anda</div>
                <?php foreach ($tagihan as $t) : ?>
                    <div class="card-body">
                        <?php echo $this->session->flashdata('pesan') ?>
                        <?php unset($_SESSION['pesan']); ?>
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table">
                                    <tr>
                                        <td>No Karcis</td>
                                        <td>:</td>
                                        <td><strong><?= $t->kd_keluar  ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Plat Nomor</td>
                                        <td>:</td>
                                        <td><strong><?= $t->no_plat  ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Merk Motor</td>
                                        <td>:</td>
                                        <td><strong><?= $t->merk_motor  ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Waktu Masuk</td>
                                        <td>:</td>
                                        <td><strong><?= date('l, H:i:s', strtotime(($t->tgl_jam_masuk)))  ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Waktu Keluar</td>
                                        <td>:</td>
                                        <td><strong><?= date('l, H:i:s', strtotime(($t->tgl_jam_keluar)))  ?></strong></td>
                                    </tr>


                                    <tr>
                                        <td>Lama Parkir</td>
                                        <td>:</td>
                                        <td><strong><?= $t->lama_parkir_keluar  ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Biaya Steam</td>
                                        <td>:</td>
                                        <?php if ($t->steam == 'Ingin') { ?>
                                            <td><strong>Rp. 0</strong></td>
                                        <?php } elseif ($t->steam == 'Tidak') { ?>
                                            <td><strong>Rp. 0</strong></td>
                                        <?php } else { ?>
                                            <td><strong>Rp. 10.000</strong></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Tagihan</td>
                                        <td>:</td>
                                        <td><button class="btn btn-danger">Rp. <?= number_format($t->total_keluar, 0, ' ,', '.') ?></button></td>
                                    </tr>

                                </table>
                                <small class="text-muted">*Biaya Parkir awal = Rp.5000</small><br>
                                <small class="text-muted">*setiap 15 jam sekali dikenakan biaya = Rp.3000</small><br>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>