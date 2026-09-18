<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #000;
            margin: 30px;
        }
        h1, h2 {
            margin: 5px 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        hr {
            border: 2px solid #000;
            width: 50%;
            margin: 10px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th, table td {
            padding: 8px 10px;
            text-align: left;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000;
        }
        .text-center {
            text-align: center;
        }
        .signature {
            margin-top: 40px;
            width: 100%;
        }
        .signature td {
            text-align: center;
            vertical-align: bottom;
            height: 100px;
        }
        .font-weight-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>DESI COLLECTION</h1>
        <h2>Slip Gaji Karyawan</h2>
        <hr>
    </div>

    <?php foreach ($potongan as $p) {
        $potongan = $p->jml_potongan;
        $set_hari = 30000;
    } ?>

    <?php $no=1; foreach($print_slip as $ps) : ?>
    <?php $potongan_gaji = ($ps->alpha * $potongan) + ($ps->set_hari * $set_hari); ?>

    <!-- Data Karyawan -->
    <table>
        <tr>
            <th width="20%">Nama Karyawan</th>
            <td width="2%">:</td>
            <td><?php echo $ps->nama_karyawan ?></td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>:</td>
            <td><?php echo $ps->nik ?></td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>:</td>
            <td><?php echo $ps->nama_jabatan ?></td>
        </tr>
        <tr>
            <th>Bulan</th>
            <td>:</td>
            <td><?php echo substr($ps->bulan, 0,2) ?></td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>:</td>
            <td><?php echo substr($ps->bulan, 2,4) ?></td>
        </tr>
    </table>

    <!-- Rincian Gaji -->
    <table class="table-bordered">
        <tr class="text-center">
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
            <td>Setengah Hari</td>
            <td><?php echo $ps->set_hari,' Hari' ?></td>
        </tr>
        <tr>
            <td class="text-center">5</td>
            <td>Alpha</td>
            <td><?php echo $ps->alpha,' Hari' ?></td>
        </tr>
        <tr>
            <td class="text-center">6</td>
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
                <br><br>
                <p class="font-weight-bold"><?php echo $ps->nama_karyawan ?></p>
            </td>
            <td>
                <p>Klaten, <?php echo date("d M Y") ?><br> Finance,</p>
                <br><br>
                <p>_________________________</p>
            </td>
        </tr>
    </table>

    <?php endforeach; ?>
</body>
</html>
