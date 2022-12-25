<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>

    <div class="form" style="width: 40%;">
        <div class="form-row">
            <form method="post" action="<?= base_url('admin/kendaraanmasuk')  ?>">
                <div class="form-group">
                    <label for="steam">
                        <h5 class="text-dark font-weight-bold">Ingin di steam ?</h5>
                    </label>
                    <select class="form-control" id="steam" name="steam">
                        <option value="Tidak">Tidak</option>
                        <option value="Ingin">Iya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_plat">
                        <h5 class="text-dark font-weight-bold">Plat Nomor Kendaraan</h5>
                    </label>
                    <input placeholder="Masukan Plat Nomor Kendaraan Motor" type="text" class="form-control" id="no_plat" name="no_plat">
                    <small class="text-muted">*Huruf Besar & Tanpa Spasi</small><br>
                    <small class="text-muted">*Jika Tidak Memiliki Plat Nomor, Maka Isi Dengan <i>TANPA PLAT</i></small><br>
                    <?= form_error('no_plat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="merk_motor">
                        <h5 class="text-dark font-weight-bold">Merk motor beserta warnanya</h5>
                    </label>
                    <input type="text" class="form-control" id="merk_motor" name="merk_motor">
                    <small class="text-muted">*Contoh : <strong>Supra X Merah</strong></small> <br>
                    <?= form_error('merk_motor', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-success">Kirim Data Parkir</button>
            </form>
        </div>
    </div>


</div>