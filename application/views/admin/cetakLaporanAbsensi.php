<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
			color: #000;
			font-size: 12px;
			margin: 20px;
		}
		h1, h2, h3 {
			margin: 0;
			padding: 0;
		}
		.header {
			text-align: center;
			margin-bottom: 20px;
		}
		.header h1 {
			font-size: 20px;
			font-weight: bold;
		}
		.header h2 {
			font-size: 16px;
			margin-top: 5px;
		}
		.info-table {
			margin: 10px 0 20px 0;
		}
		.info-table th {
			text-align: left;
			padding-right: 10px;
			font-size: 13px;
		}
		.data-table {
			width: 100%;
			border-collapse: collapse;
		}
		.data-table th, .data-table td {
			border: 1px solid #000;
			padding: 6px;
			text-align: center;
			font-size: 12px;
		}
		.data-table th {
			background-color: #f2f2f2;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>DESI COLLECTION</h1>
		<h2>Laporan Absensi Karyawan</h2>
		<hr>
	</div>

	<?php  
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$bulantahun = $bulan.$tahun;

	$nama_bulan = [
		'01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
		'04' => 'April', '05' => 'Mei', '06' => 'Juni',
		'07' => 'Juli', '08' => 'Agustus', '09' => 'September',
		'10' => 'Oktober', '11' => 'November', '12' => 'Desember'
	];
	?>

	<table class="info-table">
		<tr>
			<th>Bulan</th>
			<th>:</th>
			<td><?php echo $nama_bulan[$bulan] ?? '-' ?></td>
		</tr>
		<tr>
			<th>Tahun</th>
			<th>:</th>
			<td><?php echo $tahun ?></td>
		</tr>
	</table>

	<table class="data-table">
		<tr>
			<th>No</th>
			<th>Nama Karyawan</th>
			<th>NIK</th>
			<th>Jabatan</th>
			<th>Hadir</th>
			<th>Set Hari</th>
			<th>Sakit</th>
			<th>Alpha</th>
		</tr>
		
		<?php $no=1; foreach($lap_kehadiran as $l) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td style="text-align:left"><?php echo $l->nama_karyawan ?></td>
			<td><?php echo $l->nik ?></td>
			<td><?php echo $l->nama_jabatan ?></td>
			<td><?php echo $l->hadir ?></td>
			<td><?php echo $l->set_hari ?></td>
			<td><?php echo $l->sakit ?></td>
			<td><?php echo $l->alpha ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
