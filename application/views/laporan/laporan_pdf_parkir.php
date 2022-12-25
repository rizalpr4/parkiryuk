<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <center>
        <h2 style="margin-bottom: 2rem; text-align: center; color: #0275d8">Riwayat Data Parkir W&J</h2><br>
        <table border='1' style="text-align: center; font-family: sans-serif; color: #444; border-collapse: collapse;">
            <tr>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">NO</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">NO Karcis</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Plat Nomor</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Merk Motor</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Steam</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Waktu Masuk</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Waktu Keluar</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Lama Parkir</th>
                <th style="background: #35A9DB; color: #fff; font-weight: normal; padding: 1rem;">Tagihan</th>
            </tr>
            <?php $no = 1;
            foreach ($laporan as $drp) { ?>
                <tr>
                    <td style="text-align: center; padding: 1rem;"><?= $no++ ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['kd_masuk'] ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['no_plat'] ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['merk_motor'] ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['steam'] ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['tgl_jam_masuk'] ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['tgl_jam_keluar'] ?></td>
                    <td style="text-align: center; padding: 1rem;"><?= $drp['lama_parkir_keluar'] ?></td>
                    <td style="text-align: center; padding: 1rem;">Rp. <?= number_format($drp['total_keluar'], 0, ' ,', '.') ?></td>
                </tr>
            <?php } ?>
        </table>
        <center>
</body>

</html>