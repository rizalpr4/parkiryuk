<body style="height: 100%; background-position: center; background-size: cover; background-image: url(<?= base_url(); ?>assets/img/bgLogin.png);">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>Masuk Akun</b></h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan')  ?>
                                    <?php unset($_SESSION['pesan']); ?>
                                    <form method="POST" action="<?= base_url('autentifikasi')  ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="Masukan Kode Plat Nomor">
                                            <?= form_error('no_plat')  ?>
                                            <small class="font-weight-bold text-muted">*Huruf Besar & Tanpa Spasi</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Kata Sandi">
                                            <?= form_error('password')  ?>
                                        </div>
                                        <input type="checkbox" onclick="myFunction()"> Lihat Password <br><br>
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('autentifikasi/registrasi'); ?>">Registrasi!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>