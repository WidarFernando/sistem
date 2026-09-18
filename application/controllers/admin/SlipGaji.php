<?php

class SlipGaji extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') !='1') {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda belum login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('Welcome');
		} 
	}

	public function index()
	{
		$data['title'] = "Filter Slip Gaji Karyawan";
		$data['karyawan'] = $this->penggajianModel->get_data('data_karyawan')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/filterSlipGaji',$data);
		$this->load->view('templates_admin/footer');
	}

	public function cetakSlipGaji()
	{
		$data['title'] = "Cetak Slip Gaji";
		$data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
		$nama = $this->input->post('nama_karyawan');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulantahun = $bulan.$tahun;

		$data['print_slip'] = $this->db->query(" SELECT data_karyawan.nik, data_karyawan.nama_karyawan, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.set_hari, data_kehadiran.bulan
		FROM data_karyawan
		INNER JOIN data_kehadiran ON data_kehadiran.nik = data_karyawan.nik
		INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_karyawan.jabatan
		WHERE data_kehadiran.bulan = '$bulantahun' AND data_kehadiran.nama_karyawan = '$nama'")->result();
		$html = $this->load->view('admin/cetakSlipGaji', $data, true);

	    // 🔹 Panggil Dompdf
	    $this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->set_option('defaultFont', 'Arial');
		$this->pdf->set_option('dpi', 120); // biar tidak kecil
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("Laporan_Slip_Gaji_".$nama."_".$bulantahun.".pdf", array("Attachment" => true));
		//$this->load->view('templates_admin/header',$data);
		//$this->load->view('admin/cetakSlipGaji',$data);
	}
}

?>