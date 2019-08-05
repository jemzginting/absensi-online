<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CetakHarianController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('UTC');
		$this->load->model('MainModel');
	}

	function index($DeptID = false, $mulai = false, $status_kepegawaian = false)
	{
		$data['DeptID'] = $DeptID;
		$nama['department'] = $this->MainModel->get_nama_departments_by_id($data);


		$this->load->library('mypdf');

		$this->mypdf->SetCreator(PDF_CREATOR);
		$this->mypdf->SetAuthor('BKPP');
		$this->mypdf->SetTitle('LAPORAN ABSENSI');
		$this->mypdf->SetSubject('Laporan Absensi');
		$this->mypdf->SetKeywords('LAPORAN, PDF, ABSENSI');
		$tglCetak = date("s:i:H d/m/Y", mktime(date('s'), date('i'), date('H'), date('d'), date('h'), date('Y')));

		$this->mypdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->mypdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$this->mypdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$this->mypdf->SetMargins(9, 9, 9);
		$this->mypdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$this->mypdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$this->mypdf->SetAutoPageBreak(true, 10);
		$this->mypdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$this->mypdf->SetFont('helvetica', '', 10);

		$this->createlaporanharian($DeptID, $mulai, $status_kepegawaian);

		$this->mypdf->Output('Rekap Absensi Harian ' . $nama['department'][0]['DeptName'] . ' ' . $mulai . '.pdf', 'I');
	}

	function createlaporanharian($DeptID = false, $mulai = false, $status_kepegawaian = false)
	{
		$this->mypdf->AddPage('L');
		$this->mypdf->SetFillColor(255, 255, 127);

		$html = $this->gethtmllaporanharian($DeptID, $mulai, $status_kepegawaian);
		$this->mypdf->writeHTML($html, true, 0, true, 0);
	}

	function gethtmllaporanharian($DeptID = false, $mulai = false, $status_kepegawaian = false)
	{
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$html = $this->getdatalaporanharian($DeptID, $mulai, $status_kepegawaian);
		return $this->load->view('template/cetak/laporan_harian', array('data' => $html), true);
	}


	function getdatalaporanharian($DeptID = false, $mulai = false, $status_kepegawaian = false)
	{

		$data['DeptID'] = $DeptID;
		if ($status_kepegawaian == "pns") {
			$data['head'] = $this->MainModel->ini_laporan_harian_pns_ese($DeptID, $mulai, $status_kepegawaian);
		} else {
			$data['head'] = $this->MainModel->ini_laporan_tkk_harian($DeptID, $mulai, $status_kepegawaian);
		}
		//$nama['department'] = $this->MainModel->get_departments_by_id($data);
		$nama['department'] = $this->MainModel->get_nama_departments_by_id($data);
		$html['head'] = $this->load->view('template/cetak/head_laporan_harian', array('data' => $data['head'], 'mulai' => $mulai, 'nama' => $nama['department'][0]['DeptName'], 'status_kepegawaian' => $status_kepegawaian), true);
		if ($status_kepegawaian == "pns") {
			$data['ese'] = $this->MainModel->ini_laporan_harian_pns_ese($DeptID, $mulai, $status_kepegawaian);
			$data['non_ese'] = $this->MainModel->ini_laporan_pns_harian_non_ese($DeptID, $mulai, $status_kepegawaian);
			$html['pribadi'] = $this->load->view('template/cetak/pribadi_laporan_harian', array('data' => $data['ese'], 'non_ese' => $data['non_ese'], 'status_kepegawaian' => $status_kepegawaian), true);
		} else {
			$data['pribadi'] = $this->MainModel->ini_laporan_tkk_harian($DeptID, $mulai, $status_kepegawaian);
			$html['pribadi'] = $this->load->view('template/cetak/pribadi_laporan_harian', array('data' => $data['pribadi'], 'status_kepegawaian' => $status_kepegawaian), true);
		}

		return $html;
	}
}
