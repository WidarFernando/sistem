<?php 

class LaporanGaji extends CI_Controller{

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
		$data['title'] = "Laporan Gaji Karyawan";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/filterLaporanGaji',$data);
		$this->load->view('templates_admin/footer');
	}

	public function cetakLaporanGaji()
	{
		$data['title'] = "Cetak Laporan Gaji Karyawan";
		if($this->input->post('bulan') != '' && $this->input->post('tahun') != '') {
		    $bulan = $this->input->post('bulan');
		    $tahun = $this->input->post('tahun');
		} else {
		    $bulan = date('m');
		    $tahun = date('Y');
		}
		$bulantahun = $bulan.$tahun;

        $data['bulan'] = $bulan;
	    $data['tahun'] = $tahun;
        $data['pot_gaji'] = $this->penggajianModel->get_data('potongan_gaji')->result();
		$data['cetakGaji'] = $this->db->query("SELECT data_karyawan.nik, data_karyawan.nama_karyawan, data_karyawan.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.set_hari, data_kehadiran.bulan FROM data_karyawan
			INNER JOIN data_kehadiran ON data_kehadiran.nik=data_karyawan.nik
			INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.jabatan
			WHERE data_kehadiran.bulan='$bulantahun'
			ORDER BY data_karyawan.nama_karyawan ASC")->result();

		$html = $this->load->view('admin/cetakDataGaji', $data, true);

	    // 🔹 Panggil Dompdf
	    $this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->set_option('defaultFont', 'Arial');
		$this->pdf->set_option('dpi', 120); // biar tidak kecil
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("Laporan_Gaji_".$bulantahun.".pdf", array("Attachment" => true));
	//	$this->load->view('templates_admin/header',$data);
	//	$this->load->view('admin/cetakLaporanGaji',$data);
	}
}
?>