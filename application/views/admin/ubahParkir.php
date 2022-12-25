<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>

    <div class="form" style="width: 40%;">
        <div class="form-row">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Data yang anda masukkan belum tepat/kosong </div>');
                redirect('admin/ubahparkir/' . $p['kd_masuk']);
            } ?>
            <?php foreach ($parkir as $p) { ?>
                <form method="post" action="<?= base_url('admin/ubahparkir')  ?>">
                    <div class="form-group">
                        <input value="<?= $p['kd_masuk']  ?>" type="hidden" class="form-control" id="kd_masuk" name="kd_masuk">
                        <input value="<?= $p['tgl_masuk']  ?>" type="hidden" class="form-control" id="tgl_masuk" name="tgl_masuk">
                        <input value="<?= $p['status_masuk']  ?>" type="hidden" class="form-control" id="status_masuk" name="status_masuk">
                    </div>
                    <div class="form-group">
                        <label for="steam">
                            <h5 class="text-dark font-weight-bold">Ubah Status steam ?</h5>
                        </label>
                        <select value="<?= $p['steam']  ?>" class="form-control" id="steam" name="steam">
                            <option value="Tidak">Tidak</option>
                            <option value="Ingin">Ingin</option>
                            <option value="Sudah">Sudah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_plat">
                            <h5 class="text-dark font-weight-bold">Plat Nomor Kendaraan</h5>
                        </label>
                        <input value="<?= $p['no_plat']  ?>" placeholder="Masukan Plat Nomor Kendaraan Motor" type="text" class="form-control" id="no_plat" name="no_plat">
                        <small class="text-muted">*Tanpa Spasi</small><br>
                        <?= form_error('no_plat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="merk_motor">
                            <h5 class="text-dark font-weight-bold">Merk motor beserta warnanya</h5>
                        </label>
                        <input value="<?= $p['merk_motor']  ?>" type="text" class="form-control" id="merk_motor" name="merk_motor">
                        <small class="text-muted">*Contoh : <strong>Supra X Merah</strong></small> <br>
                        <?= form_error('merk_motor', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-success">Keluar</button>

                </form>
            <?php } ?>
        </div>
    </div>


</div>