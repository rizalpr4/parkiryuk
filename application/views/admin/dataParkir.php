<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>
    <a class="btn btn-sm btn-primary mb-4" href="<?= base_url('admin/addData/')  ?>"><i class="fas fa-plus"></i>Tambah Data Parkir</a>
    <?= $this->session->flashdata('pesan')  ?>
    <?php unset($_SESSION['pesan']); ?>
    <table class="table table-bordered table-striped mt-3">
        <tr>

            <th class="text-center">No</th>
            <th class="text-center">No Karcis</th>
            <th class="text-center">Nomor Plat</th>
            <th class="text-center">Merek Motor</th>
            <th class="text-center">Waktu Masuk</th>
            <th class="text-center">Status Steam</th>
            <th class="text-center">Ubah Data</th>
        </tr>

        <?php $no = 1;
        foreach ($masuk as $dp) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dp['kd_masuk'] ?></td>
                <td><?= $dp['no_plat'] ?></td>
                <td><?= $dp['merk_motor'] ?></td>
                <td><?= date('l, H:i:s', strtotime($dp['tgl_masuk'])) ?></td>
                <?php if ($dp['steam'] == 'Ingin') { ?>
                    <td style="color: green;">Ingin</td>
                <?php } elseif ($dp['steam'] == 'Tidak') { ?>
                    <td style="color: red;">Tidak</td>
                <?php } else { ?>
                    <td style="color: blue;">Sudah</td>
                <?php } ?>
                <td>
                    <center>
                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/ubahparkir/' . $dp['kd_masuk'])  ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/hapusparkir/' . $dp['kd_masuk'])  ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>