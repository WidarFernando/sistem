<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #000;
        }

        h1, h2 {
            margin: 0;
            text-align: center;
        }

        .judul {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 11pt;
        }

        table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .footer {
            width: 100%;
            margin-top: 50px;
            text-align: right;
        }

        .footer p {
            margin-bottom: 70px;
        }
    </style>
</head>
<body>
    <div class="judul">
        <h1>DESI COLLECTION</h1>
        <h2>Daftar Gaji Karyawan</h2>
    </div>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>
                <?php 
                $nama_bulan = [
                    '01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April',
                    '05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus',
                    '09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'
                ];
                echo $nama_bulan[$bulan];
            ?>
            </td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun ?></td>
        </tr>
    </table>

    <table>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Tj. Transport</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
        </tr>

        <?php foreach ($pot_gaji as $p) { $alpha = $p->jml_potongan; }?>
        <?php $no=1; foreach($cetakGaji as $g) : ?>
        <?php $set_hari = 30000 ?>
        <?php $potongan = ($g->alpha * $alpha) + ($g->set_hari * $set_hari) ?>
            <tr>
                <td style="text-align: center;"><?php echo $no++ ?></td>
                <td><?php echo $g->nik ?></td>
                <td><?php echo $g->nama_karyawan ?></td>
                <td style="text-align: center;"><?php echo $g->jenis_kelamin ?></td>
                <td><?php echo $g->nama_jabatan ?></td>
                <td style="text-align: right;">Rp.<?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
                <td style="text-align: right;">Rp.<?php echo number_format($g->tj_transport,0,',','.') ?></td>
                <td style="text-align: right;">Rp.<?php echo number_format($g->uang_makan,0,',','.') ?></td>
                <td style="text-align: right;">Rp.<?php echo number_format($potongan,0,',','.') ?></td>
                <td style="text-align: right;">Rp.<?php echo number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan,0,',','.') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="footer">
        <p>Klaten, <?php echo date("d M Y")?><br>Finance</p>
        <p>___________________</p>
    </div>
</body>
</html>
