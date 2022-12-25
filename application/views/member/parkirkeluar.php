<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card-header">
                <h3 class="card-title">Input Kendaraan Keluar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo base_url('member/kendaraankeluar') ?>" method="post">
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <?php unset($_SESSION['pesan']); ?>
                    <div class="form-group">
                        <label for="">Kode Karcis</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                <input type="text" class="form-control" id="" placeholder="Kode Karcis" name="karcis">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary pull-right">Cek Karcis</button>
                </div>
            </form>
        </div>
    </div>