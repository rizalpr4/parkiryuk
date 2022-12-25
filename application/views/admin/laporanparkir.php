<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul  ?></h1>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white">
            Riwayat Data Penitip
        </div>
        <div class="card-body">
            <a class="btn mr-auto btn-warning" href="<?= base_url('admin/pdf')  ?>"><i class="far fa-file-pdf"></i>Export Pdf</a>
            <a class="btn mr-auto btn-primary" href="<?= base_url('admin/print')  ?>"><i class="fas fa-print"></i>Cetak Print</a>
            <a class="btn mr-auto btn-success" href="<?= base_url('admin/export_excel_parkir')  ?>"><i class="far fa-file-excel"></i>Export Ke excel</a>
            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NO Karcis</th>
                    <th class="text-center">Plat Nomor</th>
                    <th class="text-center">Merk Motor</th>
                    <th class="text-center">Steam</th>
                    <th class="text-center">Waktu Masuk</th>
                    <th class="text-center">Waktu Keluar</th>
                    <th class="text-center">Lama Parkir</th>
                    <th class="text-center">Tagihan</th>
                </tr>
                <?php $no = 1;
                foreach ($laporan as $drp) { ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $drp['kd_masuk'] ?></td>
                        <td><?= $drp['no_plat'] ?></td>
                        <td><?= $drp['merk_motor'] ?></td>
                        <td><?= $drp['steam'] ?></td>
                        <td><?= date('d F Y, H:i:s', strtotime($drp['tgl_jam_masuk'])) ?></td>
                        <td><?= date('d F Y, H:i:s', strtotime($drp['tgl_jam_keluar'])) ?></td>
                        <td><?= $drp['lama_parkir_keluar'] ?></td>
                        <td>Rp. <?= number_format($drp['total_keluar'], 0, ' ,', '.') ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>





</div>