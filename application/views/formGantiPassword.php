<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>

    <div style="width: 47%;" class="card">
        <div class="card-body">
            <?php foreach ($user as $u) { ?>
                <form method="POST" action="<?= base_url('autentifikasi/ubah_password')  ?>">
                    <div class="form-group">
                        <input value="<?= $u['id']  ?>" type="hidden" class="form-control" id="id" name="id">
                        <input value="<?= $u['nama']  ?>" type="hidden" class="form-control" id="nama" name="nama">
                        <input value="<?= $u['no_plat']  ?>" type="hidden" class="form-control" id="no_plat" name="no_plat">
                        <input value="<?= $u['image']  ?>" type="hidden" class="form-control" id="image" name="image">
                        <input value="<?= $u['role_id']  ?>" type="hidden" class="form-control" id="role_id" name="role_id">
                        <input value="<?= $u['tanggal_input']  ?>" type="hidden" class="form-control" id="tgl_input" name="tgl_input">

                        <label>Kata sandi baru</label>
                        <input class="form-control" type="password" name="password1" id="password"><?= form_error('password1')  ?>
                        <input type="checkbox" onclick="myFunction()"> Lihat Password <br><br>
                    </div>
                    <div class="form-group">
                        <label>Ulangi Kata sandi baru</label>
                        <input class="form-control" type="password" name="password2"><?= form_error('password2')  ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            <?php } ?>
        </div>
    </div>


</div>