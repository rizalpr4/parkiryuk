<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>
    <center>Laporan Data Riwayat Parkir</center>
</h3>
<br>
<table class="table-data">
    <thead>
        <tr>
            <th>NO</th>
            <th>NO Karcis</th>
            <th>Plat Nomor</th>
            <th>Merk Motor</th>
            <th>Steam</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Lama Parkir</th>
            <th>Tagihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($laporan as $drp) { ?>
            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $drp['kd_masuk'] ?></td>
                <td><?= $drp['no_plat'] ?></td>
                <td><?= $drp['merk_motor'] ?></td>
                <td><?= $drp['steam'] ?></td>
                <td><?= $drp['tgl_jam_masuk'] ?></td>
                <td><?= $drp['tgl_jam_keluar'] ?></td>
                <td><?= $drp['lama_parkir_keluar'] ?></td>
                <td>Rp. <?= number_format($drp['total_keluar'], 0, ' ,', '.') ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>