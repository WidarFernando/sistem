<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            color: #000;
            margin: 20px;
        }
        h1, h2 {
            margin: 0;
            padding: 0;
        }
        hr {
            border: 2px solid black;
            width: 50%;
            margin: 10px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.data, .data th, .data td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
        }
        .data th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .text-center { text-align: center; }
        .signature {
            width: 100%;
            margin-top: 40px;
        }
        .signature td {
            text-align: center;
            vertical-align: top;
        }
        .font-weight-bold { font-weight: bold; }
    </style>
</head>
<body>

    <center>
        <h1>DESI COLLECTION</h1>
        <h2>Slip Gaji Karyawan</h2>
        <hr>
    </center>

    <?php foreach ($potongan as $p) { $potongan = $p->jml_potongan; } ?>
        
    <?php foreach($print_slip as $ps) : ?>
        <?php $set_hari = 30000 ?>
    <?php $potongan_gaji = ($ps->alpha * $potongan) + ($ps->set_hari * $set_hari); ?>

    <!-- Data Karyawan -->
    <table>
        <tr>
            <td width="25%">Nama Karyawan</td>
            <td width="2%">:</td>
            <td><?php echo $ps->nama_karyawan ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $ps->nik ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $ps->nama_jabatan ?></td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?php echo substr($ps->bulan, 0,2) ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo substr($ps->bulan, 2,4) ?></td>
        </tr>
    </table>

    <!-- Detail Gaji -->
    <table class="data">
        <tr>
            <th width="5%">No</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td>Gaji Pokok</td>
            <td>Rp. <?php echo number_format($ps->gaji_pokok,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td>Tunjangan Transport</td>
            <td>Rp. <?php echo number_format($ps->tj_transport,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td>Uang Makan</td>
            <td>Rp. <?php echo number_format($ps->uang_makan,0,',','.') ?></td>
        </tr>
        <tr>
            <td class="text-center">4</td>
            <td>Potongan</td>
            <td>Rp. <?php echo number_format($potongan_gaji,0,',','.') ?></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align: right;">Total Gaji</th>
            <th>Rp. <?php echo number_format($ps->gaji_pokok + $ps->tj_transport + $ps->uang_makan - $potongan_gaji,0,',','.') ?></th>
        </tr>
    </table>

    <!-- Tanda Tangan -->
    <table class="signature">
        <tr>
            <td>
                <p>Karyawan</p>
                <br><br><br>
                <p class="font-weight-bold"><?php echo $ps->nama_karyawan ?></p>
            </td>

            <td>
                <p>Klaten, <?php echo date("d M Y") ?><br>Finance,</p>
                <br><br><br>
                <p>_________________________</p>
            </td>
        </tr>
    </table>

    <?php endforeach; ?>
</body>
</html>
