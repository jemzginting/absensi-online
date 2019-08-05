<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CetakPribadiController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->model('MainModel');
    }

    function index($DeptID = false, $userid = false, $tahun = false, $bulan = false, $status_kepegawaian = false)
    {
        $data['DeptID'] = $DeptID;
        $nama['department'] = $this->MainModel->get_nama_departments_by_id($data);

        if ($bulan == 1) {
            $nama_bulan = "JANUARI";
        } else if ($bulan == 2) {
            $nama_bulan = "FEBRUARI";
        } else if ($bulan == 3) {
            $nama_bulan = "MARET";
        } else if ($bulan == 4) {
            $nama_bulan = "APRIL";
        } else if ($bulan == 5) {
            $nama_bulan = "MEI";
        } else if ($bulan == 6) {
            $nama_bulan = "JUNI";
        } else if ($bulan == 7) {
            $nama_bulan = "JULI";
        } else if ($bulan == 8) {
            $nama_bulan = "AGUSTUS";
        } else if ($bulan == 9) {
            $nama_bulan = "SEPTEMBER";
        } else if ($bulan == 10) {
            $nama_bulan = "OKTOBER";
        } else if ($bulan == 11) {
            $nama_bulan = "NOVEMBER";
        } else if ($bulan == 12) {
            $nama_bulan = "DESEMBER";
        }

        $this->load->library('mypdf');

        $this->mypdf->SetCreator(PDF_CREATOR);
        $this->mypdf->SetAuthor('BKPP');
        $this->mypdf->SetTitle('LAPORAN ABSENSI INDIVIDU');
        $this->mypdf->SetSubject('Laporan Absensi Individu');
        $this->mypdf->SetKeywords('LAPORAN, PDF, ABSENSI INDIVIDU');
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

        $this->createlaporanbulanan($DeptID, $userid, $tahun, $bulan, $status_kepegawaian);

        $this->mypdf->Output('Rekap Absensi Bulanan ' . $nama['department'][0]['DeptName'] . ' ' . $nama_bulan . ' ' . $tahun . '.pdf', 'I');
    }

    function createlaporanbulanan($DeptID = false, $userid = false, $tahun = false, $bulan = false, $status_kepegawaian = false)
    {
        $this->mypdf->AddPage('L');
        $this->mypdf->SetFillColor(255, 255, 127);

        $html = $this->gethtmllaporanbulanan($DeptID, $userid, $tahun, $bulan, $status_kepegawaian);
        $this->mypdf->writeHTML($html, true, 0, true, 0);;
    }

    function gethtmllaporanbulanan($DeptID = false, $userid = false, $tahun = false, $bulan = false, $status_kepegawaian = false)
    {
        $html = $this->getdatalaporanbulanan($DeptID, $userid, $tahun, $bulan, $status_kepegawaian);
        return $this->load->view('template/cetak/laporan_bulanan', array('data' => $html), true);
    }


    function getdatalaporanbulanan($DeptID = false, $userid = false, $tahun = false, $bulan = false, $status_kepegawaian = false)
    {

        $data['DeptID'] = $DeptID;


        $nama['department'] = $this->MainModel->get_nama_departments_by_id($data);
        $html['head'] = $this->load->view('template/cetak/head_laporan_individu', array('bulan' => $bulan, 'tahun' => $tahun, 'nama' => $nama['department'][0]['DeptName'], 'status_kepegawaian' => $status_kepegawaian), true);
        $data['laporan'] = $this->MainModel->ini_laporan_pribadi_bulanan($DeptID, $userid, $tahun, $bulan, $status_kepegawaian);
        $html['pribadi'] = $this->load->view('template/cetak/individu_laporan_bulanan', array('data' => $data['laporan'], 'status_kepegawaian' => $status_kepegawaian), true);

        return $html;
    }
}
