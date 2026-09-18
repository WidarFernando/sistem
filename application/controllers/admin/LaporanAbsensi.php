<?php 

class LaporanAbsensi extends CI_Controller{

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
		$data['title'] = "Laporan Absensi";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/filterLaporanAbsensi',$data);
		$this->load->view('templates_admin/footer');
	}

	public function cetakLaporanAbsensi()
	{
		$data['title'] = "Cetak Laporan Absensi";
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulantahun = $bulan.$tahun;

		$data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE data_kehadiran.bulan='$bulantahun' ORDER BY nama_karyawan ASC")->result();
		$html = $this->load->view('admin/cetakLaporanAbsensi', $data, true);

		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->set_option('defaultFont', 'Arial');
		$this->pdf->set_option('dpi', 120); // biar tidak kecil
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("Laporan_Absensi_".$bulantahun.".pdf", array("Attachment" => true));
		//$this->load->view('templates_admin/header',$data);
		//$this->load->view('admin/cetakLaporanAbsensi',$data);
	}
}
?>