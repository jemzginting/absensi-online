<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonalController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('sess_personal')) {
			redirect("SignIn", 'refresh');
		}

		$this->load->model('RekapModel');
		$this->load->model('LaporanModel');
		$this->load->model('StaffModel');
		$this->load->model('SipdModel');
		$this->load->model('GolonganModel');
		$this->load->model('KegiatanModel');
		$this->load->model('MainModel');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$this->template->view('template/personal/statistik_pegawai', 4, $datacontent);
	}

	public function get_statistik_pegawai_bulanan()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$data['tahun'] = $this->input->get('tahun');
		$data['bulan'] = $this->input->get('bulan');
		$data['status'] = "pns";
		//echo "okeokeok" .$data['bulan'];
		$statistik_bulanan = $this->LaporanModel->get_statistik_pegawai_bulanan($data);
		//$this->template->view('template/personal/statistik_pegawai', 4, $statistik_bulanan);
		echo json_encode($statistik_bulanan);
	}

	public function get_statistik_tkk_bulanan()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$data['tahun'] = $this->input->get('tahun1');
		$data['bulan'] = $this->input->get('bulan1');
		$data['status'] = "tkk";
		$statistik_bulanan = $this->LaporanModel->get_statistik_pegawai_bulanan($data);
		//$this->template->view('template/personal/statistik_pegawai', 4, $statistik_bulanan);
		echo json_encode($statistik_bulanan);
	}

	public function get_pegawai_max_telat()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$data['tahun'] = $this->input->get('tahun');
		$data['bulan'] = $this->input->get('bulan');
		$data['status'] = "pns";

		$datacontent['banyak_telat'] = $this->LaporanModel->get_pegawai_max_telat($data);
		$datacontent['banyak_tk'] = $this->LaporanModel->get_pegawai_max_tk($data);

		echo json_encode($datacontent);
	}



	public function statistik_pegawai()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$data['id_user'] = $session_data['id_user'];
		$data['nip'] = $session_data['nip'];
		$userinfo = $this->StaffModel->get_userid_by_nip($data);
		$data['checktype'] = 0;
		$data['userid'] = $userinfo[0]['userid'];
		$data['tahun'] = date('Y');
		$data['bulan'] = date('m');
		$data['hari'] = date('d');
		// $jam = "01:33:26";
		// $data['tanggal1'] = $tanggal." ". date('H:i:s', strtotime("$jam"));
		$cek_checkinout = $this->RekapModel->cek_checkinout2_by_checktype($data);
		if (!empty($cek_checkinout)) {
			$datacontent['checkinout'] = 1;
			$jam = $cek_checkinout[0]['checktime'];
			$datacontent['jam'] = date('H:i:s', strtotime("$jam"));
		} else {
			$datacontent['checkinout'] = 0;
		}
		$datacontent['all'] = $this->User->get($data);
		$this->template->view('template/personal/statistik_pegawai', 4, $datacontent);
	}

	public function absen_datang()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$data['id_user'] = $session_data['id_user'];
		$data['nip'] = $session_data['nip'];
		$userinfo = $this->StaffModel->get_userid_by_nip($data);
		$data['checktype'] = 0;
		$data['userid'] = $userinfo[0]['userid'];
		$data['tahun'] = date('Y');
		$data['bulan'] = date('m');
		$data['hari'] = date('d');
		// $jam = "01:33:26";
		// $data['tanggal1'] = $tanggal." ". date('H:i:s', strtotime("$jam"));
		$cek_checkinout = $this->RekapModel->cek_checkinout2_by_checktype($data);
		if (!empty($cek_checkinout)) {
			$datacontent['checkinout'] = 1;
			$jam = $cek_checkinout[0]['checktime'];
			$datacontent['jam'] = date('H:i:s', strtotime("$jam"));
		} else {
			$datacontent['checkinout'] = 0;
		}
		$datacontent['all'] = $this->User->get($data);
		$this->template->view('template/personal/absen_datang', 4, $datacontent);
	}

	public function absen_pulang()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$data['id_user'] = $session_data['id_user'];
		$data['nip'] = $session_data['nip'];

		$userinfo = $this->StaffModel->get_userid_by_nip($data);
		$data['checktype'] = 1;
		$data['userid'] = $userinfo[0]['userid'];
		$data['tahun'] = date('Y');
		$data['bulan'] = date('m');
		$data['hari'] = date('d');
		// $jam = "01:33:26";
		// $data['tanggal1'] = $tanggal." ". date('H:i:s', strtotime("$jam"));
		$cek_checkinout = $this->RekapModel->cek_checkinout2_by_checktype($data);
		if (!empty($cek_checkinout)) {
			$datacontent['checkinout'] = 1;
			$jam = $cek_checkinout[0]['checktime'];
			$datacontent['jam'] = date('H:i:s', strtotime("$jam"));
		} else {
			$datacontent['checkinout'] = 0;
		}
		$datacontent['all'] = $this->User->get($data);
		$this->template->view('template/personal/absen_pulang', 4, $datacontent);
	}

	public function submit_absen_datangx()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['nip'] = $session_data['nip'];
		//$data['nama_staff'] = $session_data['nama_staff'];
		$userinfo = $this->StaffModel->get_jamuserinfo_by_nip($data);

		$data['checktype'] = 0; //0=datang, 1 =pulang

		$data['SN'] = $userinfo[0]['SN'];
		$data['userid'] = $userinfo[0]['userid'];
		$data['nama_pegawai'] = $userinfo[0]['name'];
		$data['start_date'] = $userinfo[0]['start_date'];
		$data['end_date'] = $userinfo[0]['end_date'];
		$data['jam_masuk'] = $userinfo[0]['jam_masuk'];
		$data['jam_keluar'] = $userinfo[0]['jam_keluar'];
		$data['DeptID'] = $userinfo[0]['defaultdeptid'];

		$tanggal_sekarang = date('Y-m-d');
		$jam_sekarang = date('H:i:s');
		$data['keterangan'] = "";
		$data['tanggal_absen'] = $tanggal_sekarang;
		$data['jam_absen'] = $jam_sekarang;
		$data['tanggal1'] = $tanggal_sekarang . " " . date('H:i:s', strtotime("$jam_sekarang"));

		//-----------ambil data dari database SIPD----------
		$test = $this->SipdModel->get_status_pegawai($data['nip']);

		if (empty($test)) {
			$data['status_kepegawaian'] = "";
		} else {
			$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
		}

		//-------------hitung jam telat,datang cepat--------
		$telat = date('H:i:s', strtotime($data['jam_masuk']));
		echo $telat;
		//$batas_hadir = date('H:i:s', strtotime('10:00:00'));
		//$jam_pulang = date('H:i:s', strtotime($data['jam_keluar']));
		//$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));


		if ((($tanggal_sekarang >= $data['start_date'] && $tanggal_sekarang <= $data['end_date']) xor (empty($data['start_date']) && empty($data['end_date']))) && $jam_sekarang < $data['jam_keluar']) {
			if ($jam_sekarang > $telat && $jam_sekarang != "00:00:00") {
				$masuk =  $jam_sekarang;
				echo $masuk;
				$masuk1 = new DateTime("$masuk");
				$telat = $masuk1->diff(new DateTime("$telat"));
				$data['telat'] = $telat->format("%H : %I : %S");
			} else {

				$data['telat'] = "";
			}
		} else {
			$data['keterangan'] = 10; //tidak hadir
		}

		$in = $this->RekapModel->insert_in($data);
		$rekap_harian = $this->RekapModel->insert_rekap($data);
		redirect('PersonalController/absen_datang');
	}


	public function submit_absen_datang()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['nip'] = $session_data['nip'];

		$userinfo = $this->StaffModel->get_userinfo_by_nip($data);
		$data['checktype'] = 0;
		$data['SN'] = $userinfo[0]['SN'];
		$data['userid'] = $userinfo[0]['userid'];
		$tanggal = date('Y-m-d');
		$jam = date('H:i:s');
		$data['tanggal1'] = $tanggal . " " . date('H:i:s', strtotime("$jam"));
		$in = $this->RekapModel->insert_in($data);

		redirect('PersonalController/absen_datang');
	}

	public function submit_absen_pulang()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['nip'] = $session_data['nip'];

		$userinfo = $this->StaffModel->get_userinfo_by_nip($data);
		$data['checktype'] = 1;
		$data['SN'] = $userinfo[0]['SN'];
		$data['userid'] = $userinfo[0]['userid'];
		$tanggal = date('Y-m-d');
		$jam = date('H:i:s');
		$data['tanggal1'] = $tanggal . " " . date('H:i:s', strtotime("$jam"));
		$in = $this->RekapModel->insert_in($data);

		redirect('PersonalController/absen_pulang');
	}


	public function daftar_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$jenis_kegiatan = $this->KegiatanModel->get_jenis_kegiatan();
		$datacontent['jenis_kegiatan'] = $jenis_kegiatan;
		$this->template->view('template/personal/daftar_jadwal_kegiatan_luar', 4, $datacontent);
	}

	public function get_daftar_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$department = $this->MainModel->get_departments_by_id($data);
		$data['department'] = $department[0]['DeptName'];
		$date = date('Y-m-d');

		$data['tahun'] = date('Y', strtotime("$date"));
		$data['bulan'] = date('m', strtotime("$date"));

		$result = $this->KegiatanModel->get_daftar_kegiatan_luar_by_department($data);
		$list_kegiatan = array();
		foreach ($result as $row) {

			array_push($list_kegiatan, $row);
		}
		echo json_encode($list_kegiatan);
	}

	public function get_opd_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_kegiatan_luar'] = $this->input->post('id_daftar_kegiatan_luar');
		$data['tanggal1'] = $this->input->post('tanggal');
		$cek = $this->KegiatanModel->get_opd_kegiatan_luar($data);
		$nama = $this->MainModel->get_departments_by_id($data);

		if (empty($cek)) {
			$data['nama_department'] = $nama[0]['DeptName'];
			$crot = $this->KegiatanModel->insert_opd_kegiatan_luar($data);
		}

		$date = date('Y-m-d');

		$data['tahun'] = date('Y', strtotime("$date"));
		$data['bulan'] = date('m', strtotime("$date"));

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan'] . "-" . $data['tahun'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);
		$data['jumlah_kerja'] = $jumlah_kerja;

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['nama_golongan'] = "";
				$data['kode_golongan'] = "";
				$data['nama_ese'] = "";
				$data['kode_ese'] = "";
				$data['tmt_pangkat'] = "";
				$data['nama_jabatan'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['nama_golongan'] = $test[0]['nama_golongan'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['nama_ese'] = $test[0]['nama_ese'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
				$data['nama_jabatan'] = $test[0]['nomenklatur_jabatan'];
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}

		$this->load->view('template/personal/opd_kegiatan_luar', $data);
	}

	public function get_opd_kegiatan_luar_by_id()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['DeptID'] = $session_data['DeptID'];
		$data['id_daftar_kegiatan_luar'] = $this->input->post('id_daftar_kegiatan_luar');

		$result = $this->KegiatanModel->get_opd_kegiatan_luar($data);
		$list_kegiatan = array();
		foreach ($result as $row) {

			array_push($list_kegiatan, $row);
		}
		echo json_encode($list_kegiatan);
	}

	public function tambah_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['jenis_kegiatan'] = $this->KegiatanModel->get_jenis_kegiatan();

		$this->load->view('template/personal/tambah_jadwal_kegiatan_luar', $data);
	}

	public function submit_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$department = $this->MainModel->get_departments_by_id($data);
		$data['department'] = $department[0]['DeptName'];
		$data['nama_kegiatan'] = $this->input->post('nama_kegiatan');
		$data['tanggal'] = $this->input->post('tgl_kegiatan');
		// $data['tanggal'] = date('Y-m-d', strftime("$date"));

		$this->KegiatanModel->insert_jadwal_kegiatan_luar($data);

		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit jenis kegiatan dengan nama kegiatan " . $data['nama'] . " dan ID user " . $id_user;
		$res_log = $this->LogModel->insert($data_log);
		redirect('personalController/daftar_jadwal_kegiatan_luar');
	}

	public function kehadiran_opd()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');

		$data['komponen'] = "surat_tugas";
		// $data['cuti'] = $this->m_cuti->ini_cuti($data['id_daftar_opd_kegiatan_luar']);
		// $data['surat'] = json_decode($data['cuti']->ijin_pimpinan);

		$data['isi'] = $this->MainModel->cek_dokumen($data['id_daftar_opd_kegiatan_luar'], $data['komponen']);
		if (!empty($data['isi'])) {
			$ffl = "assets/media/kegiatan_luar/" . $data['id_daftar_opd_kegiatan_luar'] . "/" . $data['komponen'] . "/" . $data['isi'][0]->file;
			$data['raw'] = pathinfo($ffl, PATHINFO_EXTENSION);
			if ($data['raw'] == "jpg" || $data['raw'] == "jpeg" || $data['raw'] == "png") {
				$data['thumb'] = "assets/media/kegiatan_luar/" . $data['id_daftar_opd_kegiatan_luar'] . "/" . $data['komponen'] . "/" . $data['isi'][0]->file;
			} else if ($data['raw'] != "jpg" || $data['raw'] != "jpeg" || $data['raw'] != "png") {
				$data['thumb'] = "assets/media/foto/default/doc.png";
			}
		} else {
			$data['thumb'] = "assets/file/foto/photo.jpg";
			$data['raw'] = "sayur";
		}

		$this->load->view('template/personal/kehadiran_opd', $data);
	}

	// function surat_tugas_upload(){
	// 	$data['id_daftar_opd_kegiatan_luar'] = $_POST['id_daftar_opd_kegiatan_luar'];
	// 	$data['komponen'] = $_POST['komponen'];
	// 	// $surat = $this->m_cuti->ini_cuti($data['idd']);
	// 	// $data['isi'] = json_decode($surat->ijin_pimpinan);
	// 	$data['row'] = $this->m_cuti->cek_dokumen($data['id_daftar_opd_kegiatan_luar'],$data['komponen']);

	// 	foreach($data['row'] AS $key=>$val){
	// 		$ffl = "assets/media/kegiatan_luar/".$data['id_daftar_opd_kegiatan_luar']."/".$data['komponen']."/".$val->file;
	// 		$raw = pathinfo($ffl, PATHINFO_EXTENSION);
	// 		if($raw=="jpg" ){
	// 			@$data['row'][$key]->thumb = "assets/media/kegiatan_luar/".$data['id_daftar_opd_kegiatan_luar']."/".$data['komponen']."/thumb_".$val->file;
	// 		} else if($raw=="jpeg"){
	// 			@$data['row'][$key]->thumb = "assets/media/kegiatan_luar/".$data['id_daftar_opd_kegiatan_luar']."/".$data['komponen']."/".$val->file;
	// 		}else if($data['raw']!="jpg" || $data['raw']!="jpeg"){
	// 			$data['thumb'] = "assets/media/foto/default/doc.png";
	// 		}
	// 	}

	// 	$this->load->view('template/personal/surat_tugas_upload',$data);
	// }

	public function tambah_kehadiran()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');

		$data['pegawai'] = $this->StaffModel->get_staff_by_dept($data);
		$data['keterangan'] = $this->MainModel->get_keterangan($data);
		$data['kehadiran'] = $this->KegiatanModel->get_kehadiran_opd($data);
		$data['izin'] = $this->KegiatanModel->get_kehadiran_opd_izin($data);

		$this->load->view('template/personal/tambah_kehadiran', $data);
	}

	public function get_kehadiran_opd()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['DeptID'] = $session_data['DeptID'];
		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');

		$result = $this->KegiatanModel->get_all_kehadiran_opd($data);
		$list_kegiatan = array();
		foreach ($result as $row) {
			$data['userid'] = $row['userid'];
			$nip = $this->StaffModel->get_staff_by_id($data);
			$data['badgenumber'] = $nip[0]['badgenumber'];
			$pegawai = $this->SipdModel->get_nip($data);
			$row['nama_pegawai'] = $pegawai[0]['nama_pegawai'];

			if ($row['keterangan'] == 10) {
				$row['keterangan'] = "Hadir";
			} else {
				$data['id_keterangan'] = $row['keterangan'];
				$get_ket = $this->MainModel->get_keterangan_by_id($data);
				$row['keterangan'] = $get_ket[0]['nama_keterangan'];
			}


			array_push($list_kegiatan, $row);
		}
		echo json_encode($list_kegiatan);
	}

	public function submit_kehadiran()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['userid'] = $this->input->post('userid');

		$cek = $this->KegiatanModel->get_kehadiran_opd_by_id($data);

		if (empty($cek)) {
			$userinfo = $this->StaffModel->get_userinfo($data);
			$data['badgenumber'] = $userinfo[0]['badgenumber'];
			$sipd = $this->SipdModel->get_nip($data);

			$data['nama_pegawai'] = $sipd[0]['nama_pegawai'];
			$data['keterangan'] = 11;

			$insert = $this->KegiatanModel->insert_kehadiran($data);
			$data['tanggal1'] = $data['tanggal'];
			$jam = "07:40:00";
			$data['tanggal1'] = $data['tanggal1'] . " " . date('H:i:s', strtotime("$jam"));
			$cek = $this->RekapModel->cek_rekap_by_userid_tanggal($data);
			$cek_checkinout = $this->RekapModel->cek_checkinout($data);
			if (!empty($cek)) {
				$data['masuk'] = "07:40:00";
				$update = $this->RekapModel->update_masuk($data);
				if (empty($cek_checkinout)) {

					$SN = $this->RekapModel->get_SN_by_id($data);
					$data['SN'] = $SN[0]['SN'];
					$data['checktype'] = 0;
					$in = $this->RekapModel->insert_in($data);
				}
			}
		}



		$data['pegawai'] = $this->StaffModel->get_staff_by_dept($data);
		$data['keterangan'] = $this->MainModel->get_keterangan($data);
		$data['kehadiran'] = $this->KegiatanModel->get_kehadiran_opd($data);
		$data['izin'] = $this->KegiatanModel->get_kehadiran_opd_izin($data);

		$this->template->view('template/personal/tambah_kehadiran', 4, $data);
	}

	public function submit_kehadiran_izin()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['keterangan'] = $this->input->post('id_keterangan');
		$data['userid'] = $this->input->post('userid');
		$data['tanggal'] = $this->input->post('tanggal');


		$update_keterangan = $this->RekapModel->update_keterangan_by($data);

		$cek = $this->KegiatanModel->get_kehadiran_opd_by_id($data);

		if (empty($cek)) {
			$userinfo = $this->StaffModel->get_userinfo($data);
			$data['badgenumber'] = $userinfo[0]['badgenumber'];
			$sipd = $this->SipdModel->get_nip($data);

			$data['nama_pegawai'] = $sipd[0]['nama_pegawai'];

			$insert = $this->KegiatanModel->insert_kehadiran($data);
		}

		$data['pegawai'] = $this->StaffModel->get_staff_by_dept($data);
		$data['keterangan'] = $this->MainModel->get_keterangan($data);
		$data['kehadiran'] = $this->KegiatanModel->get_kehadiran_opd($data);
		$data['izin'] = $this->KegiatanModel->get_kehadiran_opd_izin($data);

		$this->template->view('template/personal/tambah_kehadiran', 4, $data);
	}

	public function hapus_kehadiran()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['id_kehadiran_opd'] = $this->input->post('id_kehadiran_opd');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['userid'] = $this->input->post('userid');
		$data['masuk'] = "00:00:00";
		$data['checktype'] = 0;
		$jam = "07:40:00";
		$tanggal = $this->input->post('tanggal');
		$data['tanggal1'] = date('Y-m-d', strtotime("$tanggal"));
		$data['tanggal1'] = $data['tanggal1'] . " " . date('H:i:s', strtotime("$jam"));
		$hapus = $this->KegiatanModel->hapus_kehadiran($data);
		$hapus_checkinout = $this->RekapModel->hapus_checkinout($data);
		$update = $this->RekapModel->update_masuk($data);

		$data['pegawai'] = $this->StaffModel->get_staff_by_dept($data);
		$data['keterangan'] = $this->MainModel->get_keterangan($data);
		$data['kehadiran'] = $this->KegiatanModel->get_kehadiran_opd($data);
		$data['izin'] = $this->KegiatanModel->get_kehadiran_opd_izin($data);

		$this->template->view('template/personal/tambah_kehadiran', 4, $data);
	}



	public function hapus_izin()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['id_kehadiran_opd'] = $this->input->post('id_kehadiran_opd');

		$data['keterangan'] = 0;
		$data['userid'] = $this->input->post('userid');
		$data['tanggal'] = $this->input->post('tanggal');

		$update_keterangan = $this->RekapModel->update_keterangan_by($data);
		$hapus = $this->KegiatanModel->hapus_kehadiran($data);

		$data['pegawai'] = $this->StaffModel->get_staff_by_dept($data);
		$data['keterangan'] = $this->MainModel->get_keterangan($data);
		$data['kehadiran'] = $this->KegiatanModel->get_kehadiran_opd($data);
		$data['izin'] = $this->KegiatanModel->get_kehadiran_opd_izin($data);

		$this->template->view('template/personal/tambah_kehadiran', 4, $data);
	}

	public function kembali_kehadiran()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');

		$this->template->view('template/personal/kehadiran_opd', 4, $data);
	}

	public function kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$daftar_kegiatan = $this->MainModel->get_kegiatan();
		$datacontent['kegiatan'] = $daftar_kegiatan;
		$this->template->view('template/personal/kegiatan_luar', 4, $datacontent);
	}

	public function get_rekap_pns()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "pns";

		$mulai = $this->input->post('mulai');
		$sampai = $this->input->post('sampai');

		$data['tahun_mulai'] = date('Y', strtotime("$mulai"));
		$data['hari_mulai'] = date('d', strtotime("$mulai"));
		$data['bulan_mulai'] = date('m', strtotime("$mulai"));

		$data['tahun_sampai'] = date('Y', strtotime("$sampai"));
		$data['hari_sampai'] = date('d', strtotime("$sampai"));
		$data['bulan_sampai'] = date('m', strtotime("$sampai"));


		$data['bulan'] = $data['bulan_mulai'];
		$data['tahun'] = $data['tahun_mulai'];

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan_mulai'] . "-" . $data['tahun_mulai'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['kode_golongan'] = "";
				$data['kode_ese'] = "";
				$data['tmt_pangkat'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}


		$data['bulan'] = $data['bulan_sampai'];
		$data['tahun'] = $data['tahun_sampai'];

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan_sampai'] . "-" . $data['tahun_sampai'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['kode_golongan'] = "";
				$data['tmt_pangkat'] = "";
				$data['kode_ese'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}

		$checkinout = $this->RekapModel->get_checkinout($data);

		foreach ($checkinout as $ck) {
			$date = $ck['checktime'];
			if ($ck['checktype'] == 0) {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['masuk'] = date('H:i:s', strtotime("$date"));

				$res = $this->RekapModel->update_masuk($data1);
			} else {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['pulang'] = date('H:i:s', strtotime("$date"));
				$res = $this->RekapModel->update_pulang($data1);
			}
		}

		$result = $this->RekapModel->get_rekap_pns_by_tahun_bulan($data);

		foreach ($result as $row) {

			$telat = date('H:i:s', strtotime('08:00:00'));
			$batas_hadir = date('H:i:s', strtotime('10:00:00'));
			$jam_pulang = date('H:i:s', strtotime('16:00:00'));
			$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

			$tanggal_sekarang = date('Y-m-d');
			$jam_sekarang = date('H:i:s');

			if (($tanggal_sekarang > $row['tanggal'] && $row['keterangan'] == 0 && $row['masuk'] == "00:00:00" && $row['pulang'] == "00:00:00") || ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir && $row['keterangan'] == 0 && $row['masuk'] == "00:00:00" && $row['pulang'] == "00:00:00") || ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir && $row['keterangan'] == 0) || ($tanggal_sekarang >= $row['tanggal'] && $row['keterangan'] == 0 && $row['masuk'] == "00:00:00" && $row['pulang'] != "00:00:00")) {
				$du['keterangan'] = 10;
				$du['userid'] = $row['userid'];
				$du['tanggal'] = $row['tanggal'];
				$this->RekapModel->update_keterangan_by($du);
			}

			if ($tanggal_sekarang == $row['tanggal'] && $row['masuk'] != "00:00:00" && $row['pulang'] == "00:00:00" && $jam_sekarang > $batas_jam_pulang || $tanggal_sekarang > $row['tanggal'] && $row['masuk'] != "00:00:00" && $row['pulang'] == "00:00:00") {
				$du1['userid'] = $row['userid'];
				$du1['tanggal'] = $row['tanggal'];
				$du1['pulang'] = date('H:i:s', strtotime('14:00:00'));
				$this->RekapModel->update_pulang($du1);
			}
		}

		$result = $this->RekapModel->get_rekap_pns_by_tahun_bulan($data);
		$list_rekap = array();

		foreach ($result as $row) {
			if ($row['keterangan'] != 0) {
				$ket = $this->LaporanModel->get_keterangan_by_id($row);
				$row['nama_keterangan'] = $ket[0]['nama_keterangan'];
			}

			$telat = date('H:i:s', strtotime('08:00:00'));
			$batas_hadir = date('H:i:s', strtotime('10:00:00'));
			$jam_pulang = date('H:i:s', strtotime('16:00:00'));
			$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

			$tanggal_sekarang = date('Y-m-d');
			$jam_sekarang = date('H:i:s');

			if ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir || $tanggal_sekarang > $row['tanggal']) {
				$row['aksi'] = 0;
			} else {
				$row['aksi'] = 1;
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['masuk'] > $telat && $row['masuk'] != "00:00:00") {
				$masuk = $row['masuk'];
				$masuk1 = new DateTime("$masuk");
				$telat = $masuk1->diff(new DateTime("$telat"));
				$row['telat'] = $telat->format("%H : %I : %S");
			} else {
				$row['telat'] = "";
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['pulang'] < $jam_pulang && $row['pulang'] != "00:00:00") {
				$pulang = $row['pulang'];
				$pulang1 = new DateTime("$pulang");
				$pulang_cepat = $pulang1->diff(new DateTime("$jam_pulang"));
				$row['pulang_cepat'] = $pulang_cepat->format("%H : %I : %S");
			} else {
				$row['pulang_cepat'] = "";
			}

			array_push($list_rekap, $row);
		}
		echo json_encode($list_rekap);
	}

	public function get_detail_keterangan_pns()
	{

		$data['userid'] = $this->input->post('id_userid');
		$date = $this->input->post('tanggal');

		$data['tanggal'] = date('Y-m-d', strtotime("$date"));

		$result = $this->RekapModel->get_keterangan($data);
		$list_keterangan = array();
		foreach ($result as $row) {

			array_push($list_keterangan, $row);
		}
		echo json_encode($list_keterangan);
	}

	public function update_keterangan_pns()
	{
		$data['userid'] = $this->input->post('id_userid');
		$data['keterangan'] = $this->input->post('keterangan');
		$date = $this->input->post('tanggal');
		$sampai = $this->input->post('sampaiedit');

		// $data['tanggal'] = date('Y-m-d', strtotime("$date"));
		$awal = strtotime($date);
		$akhir = strtotime($sampai);
		$harikerja = array();

		for ($i = $awal; $i <= $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		foreach ($harikerja as $value) {
			$jam = "07:40:00";
			$tanggal = $value;
			$data['tanggal'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = $data['tanggal'] . " " . date('H:i:s', strtotime("$jam"));

			$cek_checkinout = $this->RekapModel->cek_checkinout($data);
			$SN = $this->RekapModel->get_SN_by_id($data);

			if ($data['keterangan'] > 4 && $data['keterangan'] != 10) {
				if (empty($cek_checkinout)) {
					$data['checktype'] = "0";
					$data['SN'] = $SN[0]['SN'];
					$in = $this->RekapModel->insert_in($data);
				}
				$res = $this->RekapModel->update_keterangan_by($data);
			}

			if ($data['keterangan'] < 4 || $data['keterangan'] == 10) {
				if (!empty($cek_checkinout)) {
					$data['checktype'] = "0";
					$data['masuk'] = "00:00:00";
					$delete = $this->RekapModel->hapus_checkinout($data);
				}
				$update = $this->RekapModel->update_masuk($data);
				$res = $this->RekapModel->update_keterangan_by($data);
			}
		}

		echo json_encode($res);
	}

	public function get_detail_rekap_pns()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "pns";

		$data['userid'] = $this->input->post('id_userid');
		$data['tahun'] = $this->input->post('tahun');
		$data['bulan'] = $this->input->post('bulan');


		$result = $this->RekapModel->get_detail_pns_by_tahun_bulan($data);
		$list_rekap = array();

		foreach ($result as $row) {
			if ($row['keterangan'] != 0) {
				$ket = $this->LaporanModel->get_keterangan_by_id($row);
				$row['nama_keterangan'] = $ket[0]['nama_keterangan'];
			}

			$telat = date('H:i:s', strtotime('08:00:00'));
			$batas_hadir = date('H:i:s', strtotime('10:00:00'));
			$jam_pulang = date('H:i:s', strtotime('16:00:00'));
			$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

			$tanggal_sekarang = date('Y-m-d');
			$jam_sekarang = date('H:i:s');

			if ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir || $tanggal_sekarang > $row['tanggal']) {
				$row['aksi'] = 0;
			} else {
				$row['aksi'] = 1;
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['masuk'] > $telat && $row['masuk'] != "00:00:00") {
				$masuk = $row['masuk'];
				$masuk1 = new DateTime("$masuk");
				$telat = $masuk1->diff(new DateTime("$telat"));
				$row['telat'] = $telat->format("%H : %I : %S");
			} else {
				$row['telat'] = "";
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['pulang'] < $jam_pulang && $row['pulang'] != "00:00:00") {
				$pulang = $row['pulang'];
				$pulang1 = new DateTime("$pulang");
				$pulang_cepat = $pulang1->diff(new DateTime("$jam_pulang"));
				$row['pulang_cepat'] = $pulang_cepat->format("%H : %I : %S");
			} else {
				$row['pulang_cepat'] = "";
			}

			array_push($list_rekap, $row);
		}
		echo json_encode($list_rekap);
	}

	public function get_rekap_tkk()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "tkk";

		$mulai = $this->input->post('mulai1');
		$sampai = $this->input->post('sampai1');

		$data['tahun_mulai'] = date('Y', strtotime("$mulai"));
		$data['hari_mulai'] = date('d', strtotime("$mulai"));
		$data['bulan_mulai'] = date('m', strtotime("$mulai"));

		$data['tahun_sampai'] = date('Y', strtotime("$sampai"));
		$data['hari_sampai'] = date('d', strtotime("$sampai"));
		$data['bulan_sampai'] = date('m', strtotime("$sampai"));


		$data['bulan'] = $data['bulan_mulai'];
		$data['tahun'] = $data['tahun_mulai'];

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan_mulai'] . "-" . $data['tahun_mulai'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['kode_ese'] = "";
				$data['kode_golongan'] = "";
				$data['tmt_pangkat'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}


		$data['bulan'] = $data['bulan_sampai'];
		$data['tahun'] = $data['tahun_sampai'];

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan_sampai'] . "-" . $data['tahun_sampai'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}

		$checkinout = $this->RekapModel->get_checkinout($data);

		foreach ($checkinout as $ck) {
			$date = $ck['checktime'];
			if ($ck['checktype'] == 0) {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['masuk'] = date('H:i:s', strtotime("$date"));

				$res = $this->RekapModel->update_masuk($data1);
			} else {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['pulang'] = date('H:i:s', strtotime("$date"));
				$res = $this->RekapModel->update_pulang($data1);
			}
		}

		$result = $this->RekapModel->get_rekap_pns_by_tahun_bulan($data);

		foreach ($result as $row) {

			$telat = date('H:i:s', strtotime('08:00:00'));
			$batas_hadir = date('H:i:s', strtotime('10:00:00'));
			$jam_pulang = date('H:i:s', strtotime('16:00:00'));
			$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

			$tanggal_sekarang = date('Y-m-d');
			$jam_sekarang = date('H:i:s');

			if (($tanggal_sekarang > $row['tanggal'] && $row['keterangan'] == 0 && $row['masuk'] == "00:00:00" && $row['pulang'] == "00:00:00") || ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir && $row['keterangan'] == 0 && $row['masuk'] == "00:00:00" && $row['pulang'] == "00:00:00") || ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir && $row['keterangan'] == 0) || ($tanggal_sekarang >= $row['tanggal'] && $row['keterangan'] == 0 && $row['masuk'] == "00:00:00" && $row['pulang'] != "00:00:00")) {
				$du['keterangan'] = 10;
				$du['userid'] = $row['userid'];
				$du['tanggal'] = $row['tanggal'];
				$this->RekapModel->update_keterangan_by($du);
			}

			if ($tanggal_sekarang == $row['tanggal'] && $row['masuk'] != "00:00:00" && $row['pulang'] == "00:00:00" && $jam_sekarang > $batas_jam_pulang || $tanggal_sekarang > $row['tanggal'] && $row['masuk'] != "00:00:00" && $row['pulang'] == "00:00:00") {
				$du1['userid'] = $row['userid'];
				$du1['tanggal'] = $row['tanggal'];
				$du1['pulang'] = date('H:i:s', strtotime('14:00:00'));
				$this->RekapModel->update_pulang($du1);
			}
		}

		$result = $this->RekapModel->get_rekap_tkk_by_tahun_bulan($data);
		$list_rekap = array();

		foreach ($result as $row) {
			if ($row['keterangan'] != 0) {
				$ket = $this->LaporanModel->get_keterangan_by_id($row);
				$row['nama_keterangan'] = $ket[0]['nama_keterangan'];
			}

			$telat = date('H:i:s', strtotime('08:00:00'));
			$batas_hadir = date('H:i:s', strtotime('10:00:00'));
			$jam_pulang = date('H:i:s', strtotime('16:00:00'));
			$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

			$tanggal_sekarang = date('Y-m-d');
			$jam_sekarang = date('H:i:s');

			if ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir || $tanggal_sekarang > $row['tanggal']) {
				$row['aksi'] = 0;
			} else {
				$row['aksi'] = 1;
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['masuk'] > $telat && $row['masuk'] != "00:00:00") {
				$masuk = $row['masuk'];
				$masuk1 = new DateTime("$masuk");
				$telat = $masuk1->diff(new DateTime("$telat"));
				$row['telat'] = $telat->format("%H : %I : %S");
			} else {
				$row['telat'] = "";
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['pulang'] < $jam_pulang && $row['pulang'] != "00:00:00") {
				$pulang = $row['pulang'];
				$pulang1 = new DateTime("$pulang");
				$pulang_cepat = $pulang1->diff(new DateTime("$jam_pulang"));
				$row['pulang_cepat'] = $pulang_cepat->format("%H : %I : %S");
			} else {
				$row['pulang_cepat'] = "";
			}

			array_push($list_rekap, $row);
		}
		echo json_encode($list_rekap);
	}

	public function get_detail_keterangan_tkk()
	{

		$data['userid'] = $this->input->post('id_userid1');
		$date = $this->input->post('tanggal1');

		$data['tanggal'] = date('Y-m-d', strtotime("$date"));

		$result = $this->RekapModel->get_keterangan($data);
		$list_keterangan = array();
		foreach ($result as $row) {

			array_push($list_keterangan, $row);
		}
		echo json_encode($list_keterangan);
	}

	public function update_keterangan_tkk()
	{
		$data['userid'] = $this->input->post('id_userid1');
		$data['keterangan'] = $this->input->post('keterangan1');
		$date = $this->input->post('tanggal1');
		$sampai = $this->input->post('sampaiedit1');

		// $data['tanggal'] = date('Y-m-d', strtotime("$date"));
		$awal = strtotime($date);
		$akhir = strtotime($sampai);
		$harikerja = array();

		for ($i = $awal; $i <= $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		foreach ($harikerja as $value) {
			$jam = "07:40:00";
			$tanggal = $value;
			$data['tanggal'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = $data['tanggal'] . " " . date('H:i:s', strtotime("$jam"));

			$cek_checkinout = $this->RekapModel->cek_checkinout($data);
			$SN = $this->RekapModel->get_SN_by_id($data);

			if ($data['keterangan'] > 4 && $data['keterangan'] != 10) {
				if (empty($cek_checkinout)) {
					$data['checktype'] = "0";
					$data['SN'] = $SN[0]['SN'];
					$in = $this->RekapModel->insert_in($data);
				}
				$res = $this->RekapModel->update_keterangan_by($data);
			}

			if ($data['keterangan'] < 4 || $data['keterangan'] == 10) {
				if (!empty($cek_checkinout)) {
					$data['checktype'] = "0";
					$data['masuk'] = "00:00:00";
					$delete = $this->RekapModel->hapus_checkinout($data);
				}
				$update = $this->RekapModel->update_masuk($data);
				$res = $this->RekapModel->update_keterangan_by($data);
			}
		}

		echo json_encode($res);
	}

	public function get_detail_rekap_tkk()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "tkk";

		$data['userid'] = $this->input->post('id_userid');
		$data['tahun'] = $this->input->post('tahun');
		$data['bulan'] = $this->input->post('bulan');


		$result = $this->RekapModel->get_detail_pns_by_tahun_bulan($data);
		$list_rekap = array();

		foreach ($result as $row) {
			if ($row['keterangan'] != 0) {
				$ket = $this->LaporanModel->get_keterangan_by_id($row);
				$row['nama_keterangan'] = $ket[0]['nama_keterangan'];
			}

			$telat = date('H:i:s', strtotime('08:00:00'));
			$batas_hadir = date('H:i:s', strtotime('10:00:00'));
			$jam_pulang = date('H:i:s', strtotime('16:00:00'));
			$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

			$tanggal_sekarang = date('Y-m-d');
			$jam_sekarang = date('H:i:s');

			if ($tanggal_sekarang == $row['tanggal'] && $jam_sekarang > $batas_hadir || $tanggal_sekarang > $row['tanggal']) {
				$row['aksi'] = 0;
			} else {
				$row['aksi'] = 1;
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['masuk'] > $telat && $row['masuk'] != "00:00:00") {
				$masuk = $row['masuk'];
				$masuk1 = new DateTime("$masuk");
				$telat = $masuk1->diff(new DateTime("$telat"));
				$row['telat'] = $telat->format("%H : %I : %S");
			} else {
				$row['telat'] = "";
			}

			if ($tanggal_sekarang >= $row['tanggal'] && $row['pulang'] < $jam_pulang && $row['pulang'] != "00:00:00") {
				$pulang = $row['pulang'];
				$pulang1 = new DateTime("$pulang");
				$pulang_cepat = $pulang1->diff(new DateTime("$jam_pulang"));
				$row['pulang_cepat'] = $pulang_cepat->format("%H : %I : %S");
			} else {
				$row['pulang_cepat'] = "";
			}

			array_push($list_rekap, $row);
		}
		echo json_encode($list_rekap);
	}

	public function rekap_absensi_bulanan()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$datacontent['DeptID'] = $session_data['DeptID'];
		$this->template->view('template/personal/rekap_absensi_bulanan', 4, $datacontent);
	}

	public function get_rekap_pns_bulanan()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "pns";

		$data['tahun'] = $this->input->post('tahun');
		$data['bulan'] = $this->input->post('bulan');

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan'] . "-" . $data['tahun'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);
		$data['jumlah_kerja'] = $jumlah_kerja;

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['nama_golongan'] = "";
				$data['kode_golongan'] = "";
				$data['nama_ese'] = "";
				$data['kode_ese'] = "";
				$data['tmt_pangkat'] = "";
				$data['nama_jabatan'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['nama_golongan'] = $test[0]['nama_golongan'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['nama_ese'] = $test[0]['nama_ese'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
				$data['nama_jabatan'] = $test[0]['nomenklatur_jabatan'];
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}

		$checkinout = $this->RekapModel->get_checkinout_by_tahun_bulan($data);

		foreach ($checkinout as $ck) {
			$date = $ck['checktime'];
			if ($ck['checktype'] == 0) {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['masuk'] = date('H:i:s', strtotime("$date"));

				$res = $this->RekapModel->update_masuk($data1);
			} else {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['pulang'] = date('H:i:s', strtotime("$date"));
				$res = $this->RekapModel->update_pulang($data1);
			}
		}

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {
			$data['jumlah_kerja'] = $jumlah_kerja;
			$data['userid'] = $row['userid'];

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['nama_golongan'] = "";
				$data['kode_golongan'] = "";
				$data['nama_ese'] = "";
				$data['kode_ese'] = "";
				$data['tmt_pangkat'] = "";
				$data['nama_jabatan'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['nama_golongan'] = $test[0]['nama_golongan'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['nama_ese'] = $test[0]['nama_ese'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
				$data['nama_jabatan'] = $test[0]['nomenklatur_jabatan'];
			}

			if ($data['status_kepegawaian'] == "pns") {
				$cek_laporan_pns = $this->LaporanModel->cek_laporan($data);

				$result = $this->RekapModel->get_rekap_pns_by_tahun_bulan_by($data);


				foreach ($result as $row1) {

					$telat = date('H:i:s', strtotime('08:00:00'));
					$batas_hadir = date('H:i:s', strtotime('10:00:00'));
					$jam_pulang = date('H:i:s', strtotime('16:00:00'));
					$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

					$tanggal_sekarang = date('Y-m-d');
					$jam_sekarang = date('H:i:s');

					if ($tanggal_sekarang > $row1['tanggal'] && $row1['keterangan'] == 0 && $row1['masuk'] == "00:00:00" && $row1['pulang'] == "00:00:00" || $tanggal_sekarang == $row1['tanggal'] && $jam_sekarang > $batas_hadir && $row1['keterangan'] == 0 && $row1['masuk'] == "00:00:00" && $row1['pulang'] == "00:00:00") {
						$du['keterangan'] = 10;
						$du['userid'] = $row1['userid'];
						$du['tanggal'] = $row1['tanggal'];
						$this->RekapModel->update_keterangan_by($du);
					}

					if ($tanggal_sekarang == $row1['tanggal'] && $row1['masuk'] != "00:00:00" && $row1['pulang'] == "00:00:00" && $jam_sekarang > $batas_jam_pulang || $tanggal_sekarang > $row1['tanggal'] && $row1['masuk'] != "00:00:00" && $row1['pulang'] == "00:00:00") {
						$du1['userid'] = $row1['userid'];
						$du1['tanggal'] = $row1['tanggal'];
						$du1['pulang'] = date('H:i:s', strtotime('14:00:00'));
						$this->RekapModel->update_pulang($du1);
					}
				}

				$ket = $this->RekapModel->get_keterangan1();
				foreach ($ket as $ket1) {
					$id_ket = $ket1['id_keterangan'];

					if ($id_ket == 1) {
						$data['keterangan'] = $id_ket;
						$sakit = $this->RekapModel->hitung_keterangan($data);
						if ($sakit != 0) {
							$data['sakit'] = $sakit[0]['jlh_ket'];
						}
					} else if ($id_ket == 2) {
						$data['keterangan'] = $id_ket;
						$izin = $this->RekapModel->hitung_keterangan($data);
						if ($izin != 0) {
							$data['izin'] = $izin[0]['jlh_ket'];
						}
					} else if ($id_ket == 4) {
						$data['keterangan'] = $id_ket;
						$cuti = $this->RekapModel->hitung_keterangan($data);
						if ($cuti != 0) {
							$data['cuti'] = $cuti[0]['jlh_ket'];
						}
					} else if ($id_ket == 4) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl1 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 5) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl2 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 6) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl4 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 7) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl4 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 8) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl5 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 9) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl6 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 10) {
						$data['keterangan'] = $id_ket;
						$tk = $this->RekapModel->hitung_keterangan($data);
						if ($tk != 0) {
							$data['tk'] = $tk[0]['jlh_ket'];
						}
					}
				}
				$data['tl'] = $tl1 + $tl2 + $tl4 + $tl4 + $tl5 + $tl6;

				$result_count = $this->RekapModel->get_jumlah_hadir($data);
				// $count_ket = $this->RekapModel->get_jumlah_keterangan($data);
				$data['jumlah_hadir'] = $result_count[0]['jlh_hadir'];
				$data['persen'] = round((($data['jumlah_hadir'] / $data['jumlah_kerja']) * 100), 2);

				$data['kosong'] = "";
				if (empty($cek_laporan_pns)) {
					$this->LaporanModel->tambah_laporan($data);
				} else {
					$this->LaporanModel->update_laporan($data);
				}
			}
		}

		$result = $this->LaporanModel->get_laporan_pns_by_bulan_tahun($data);
		$list_laporan = array();

		foreach ($result as $row) {

			array_push($list_laporan, $row);
		}
		echo json_encode($list_laporan);
	}

	public function get_rekap_tkk_bulanan()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "tkk";

		$data['tahun'] = $this->input->post('tahun1');
		$data['bulan'] = $this->input->post('bulan1');

		$cek_rekap = $this->RekapModel->cek_rekap($data);

		$awal = '1-' . $data['bulan'] . "-" . $data['tahun'];

		$awal = strtotime($awal);
		$akhir = strtotime('+1 month', $awal);
		$harikerja = array();

		for ($i = $awal; $i < $akhir; $i += (60 * 60 * 24)) {
			if (date('w', $i) !== '0' && date('w', $i) !== '6') {
				$harikerja[] = $i;
			} else {
				$sabtuminggu[] = $i;
			}
		}

		$jumlah_kerja = count($harikerja);
		$data['jumlah_kerja'] = $jumlah_kerja;

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['nama_golongan'] = "";
				$data['kode_golongan'] = "";
				$data['nama_ese'] = "";
				$data['kode_ese'] = "";
				$data['tmt_pangkat'] = "";
				$data['nama_jabatan'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['nama_golongan'] = $test[0]['nama_golongan'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['nama_ese'] = $test[0]['nama_ese'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
				$data['nama_jabatan'] = $test[0]['nomenklatur_jabatan'];
			}

			$data['userid'] = $row['userid'];

			$cek_rekap_by_userid = $this->RekapModel->cek_rekap_by_userid($data);

			foreach ($harikerja as $value) {
				$date = $value;
				$data['tanggal'] = date('Y-m-d', strftime("$date"));

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}

		$checkinout = $this->RekapModel->get_checkinout_by_tahun_bulan($data);

		foreach ($checkinout as $ck) {
			$date = $ck['checktime'];
			if ($ck['checktype'] == 0) {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['masuk'] = date('H:i:s', strtotime("$date"));

				$res = $this->RekapModel->update_masuk($data1);
			} else {
				$data1['userid'] = $ck['userid'];

				$data1['tanggal'] = date('Y-m-d', strtotime("$date"));
				$data1['pulang'] = date('H:i:s', strtotime("$date"));
				$res = $this->RekapModel->update_pulang($data1);
			}
		}

		$res = $this->RekapModel->get_rekap_absensi_bulanan($data);

		foreach ($res as $row) {
			$data['jumlah_kerja'] = $jumlah_kerja;
			$data['userid'] = $row['userid'];

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$data['nama_pegawai'] = $row['name'];
				$data['nip_baru'] = $row['badgenumber'];
				$data['status_kepegawaian'] = "";
				$data['nama_golongan'] = "";
				$data['kode_golongan'] = "";
				$data['nama_ese'] = "";
				$data['kode_ese'] = "";
				$data['tmt_pangkat'] = "";
			} else {
				$data['nama_pegawai'] = $test[0]['nama_pegawai'];
				$data['nip_baru'] = $test[0]['nip_baru'];
				$data['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$data['nama_golongan'] = $test[0]['nama_golongan'];
				$data['kode_golongan'] = $test[0]['kode_golongan'];
				$data['nama_ese'] = $test[0]['nama_ese'];
				$data['kode_ese'] = $test[0]['kode_ese'];
				$data['nama_jabatan'] = $test[0]['nomenklatur_jabatan'];
				$tmt_pangkat = $test[0]['tmt_pangkat'];
				$data['tmt_pangkat'] = date('Y-m-d', strtotime("$tmt_pangkat"));
			}

			if ($data['status_kepegawaian'] == "tkk") {
				$cek_laporan = $this->LaporanModel->cek_laporan($data);

				$result = $this->RekapModel->get_rekap_pns_by_tahun_bulan_by($data);


				foreach ($result as $row1) {

					$telat = date('H:i:s', strtotime('08:00:00'));
					$batas_hadir = date('H:i:s', strtotime('10:00:00'));
					$jam_pulang = date('H:i:s', strtotime('16:00:00'));
					$batas_jam_pulang = date('H:i:s', strtotime('21:00:00'));

					$tanggal_sekarang = date('Y-m-d');
					$jam_sekarang = date('H:i:s');

					if ($tanggal_sekarang > $row1['tanggal'] && $row1['keterangan'] == 0 && $row1['masuk'] == "00:00:00" && $row1['pulang'] == "00:00:00" || $tanggal_sekarang == $row1['tanggal'] && $jam_sekarang > $batas_hadir && $row1['keterangan'] == 0 && $row1['masuk'] == "00:00:00" && $row1['pulang'] == "00:00:00" || $tanggal_sekarang >= $row1['tanggal'] && $row1['keterangan'] == 0 && $row1['masuk'] == "00:00:00" && $row1['pulang'] != "00:00:00") {
						$du['keterangan'] = 10;
						$du['userid'] = $row1['userid'];
						$du['tanggal'] = $row1['tanggal'];
						$this->RekapModel->update_keterangan_by($du);
					}

					if ($tanggal_sekarang == $row1['tanggal'] && $row1['masuk'] != "00:00:00" && $row1['pulang'] == "00:00:00" && $jam_sekarang > $batas_jam_pulang || $tanggal_sekarang > $row1['tanggal'] && $row1['masuk'] != "00:00:00" && $row1['pulang'] == "00:00:00") {
						$du1['userid'] = $row1['userid'];
						$du1['tanggal'] = $row1['tanggal'];
						$du1['pulang'] = date('H:i:s', strtotime('14:00:00'));
						$this->RekapModel->update_pulang($du1);
					}
				}

				$ket = $this->RekapModel->get_keterangan1();
				foreach ($ket as $ket1) {
					$id_ket = $ket1['id_keterangan'];

					if ($id_ket == 1) {
						$data['keterangan'] = $id_ket;
						$sakit = $this->RekapModel->hitung_keterangan($data);
						if ($sakit != 0) {
							$data['sakit'] = $sakit[0]['jlh_ket'];
						}
					} else if ($id_ket == 2) {
						$data['keterangan'] = $id_ket;
						$izin = $this->RekapModel->hitung_keterangan($data);
						if ($izin != 0) {
							$data['izin'] = $izin[0]['jlh_ket'];
						}
					} else if ($id_ket == 4) {
						$data['keterangan'] = $id_ket;
						$cuti = $this->RekapModel->hitung_keterangan($data);
						if ($cuti != 0) {
							$data['cuti'] = $cuti[0]['jlh_ket'];
						}
					} else if ($id_ket == 4) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl1 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 5) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl2 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 6) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl4 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 7) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl4 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 8) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl5 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 9) {
						$data['keterangan'] = $id_ket;
						$tl = $this->RekapModel->hitung_keterangan($data);
						if ($tl != 0) {
							$tl6 = $tl[0]['jlh_ket'];
						}
					} else if ($id_ket == 10) {
						$data['keterangan'] = $id_ket;
						$tk = $this->RekapModel->hitung_keterangan($data);
						if ($tk != 0) {
							$data['tk'] = $tk[0]['jlh_ket'];
						}
					}
				}
				$data['tl'] = $tl1 + $tl2 + $tl4 + $tl4 + $tl5 + $tl6;

				$result_count = $this->RekapModel->get_jumlah_hadir($data);
				// $count_ket = $this->RekapModel->get_jumlah_keterangan($data);
				$data['jumlah_hadir'] = $result_count[0]['jlh_hadir'];
				$data['persen'] = round((($data['jumlah_hadir'] / $data['jumlah_kerja']) * 100), 2);

				$data['kosong'] = "";
				if (empty($cek_laporan)) {
					$this->LaporanModel->tambah_laporan($data);
				} else {
					$this->LaporanModel->update_laporan($data);
				}
			}
		}

		$result = $this->LaporanModel->get_laporan_tkk_by_bulan_tahun($data);
		$list_laporan = array();

		foreach ($result as $row) {

			array_push($list_laporan, $row);
		}
		echo json_encode($list_laporan);
	}

	function saveupload()
	{
		if (strlen($_FILES['artikel_file']['name']) > 0) {
			$id_daftar_opd_kegiatan_luar = $_POST['id_daftar_opd_kegiatan_luar'];
			$komponen = "surat_tugas";

			$d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', ' ');
			$ext = pathinfo($_FILES['artikel_file']['name'], PATHINFO_EXTENSION);
			$base = basename($_FILES['artikel_file']['name'], "." . $ext);
			echo "<script>console.log( 'Debug Objects: " . $base . "' );</script>";
			$nama_file = str_replace($d, "_", $base);
			$nama_file = $nama_file . "." . $ext;
			echo "<script>console.log( 'Debug Objects: " . $nama_file . "' );</script>";

			$result = $this->uploadFile($id_daftar_opd_kegiatan_luar, $nama_file, $komponen);

			if ($ext == "jpg") {
				$config['image_library'] = 'gd2';
				$config['width'] = 250;
				$config['height'] = 150;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				//$config['thumb_marker']='';
				$config['source_image'] = 'assets/media/kegiatan_luar/' . $id_daftar_opd_kegiatan_luar . '/' . $komponen . '/' . $result['raw'] . "." . $ext;
				$config['new_image'] = 'assets/media/kegiatan_luar/' . $id_daftar_opd_kegiatan_luar . '/' . $komponen . '/thumb_' . $result['raw'] . "." . $ext;
				//$cek = createImageThumbnail(250,150,$config);
				$this->load->library('image_lib', $config);
				$cek = $this->image_lib->resize();
			}
			////////////////////////////////
			$nmB = str_replace($d, '_', $result['raw']);
			$nmF = $id_daftar_opd_kegiatan_luar . "_" . $nmB . "." . $ext;
			rename("assets/media/kegiatan_luar/" . $id_daftar_opd_kegiatan_luar . "/" . $komponen . "/" . $result['raw'] . "." . $ext, "assets/media/kegiatan_luar/" . $id_daftar_opd_kegiatan_luar . "/" . $komponen . "/" . $nmF);
			if ($ext == "jpg") {
				rename("assets/media/kegiatan_luar/" . $id_daftar_opd_kegiatan_luar . "/" . $komponen . "/thumb_" . $result['raw'] . "." . $ext, "assets/media/kegiatan_luar/" . $id_daftar_opd_kegiatan_luar . "/" . $komponen . "/thumb_" . $nmF);
			}
			$this->MainModel->rename_dokumen($result['id_daftar_opd_kegiatan_luar'], $nmF);
			////////////////////////////////
			if ($result['status'] == 'error') {
				echo "error-<b>File gagal di upload</b> : <br />" . $result['error'];
			} else {
				echo "success-" . $result['id_daftar_opd_kegiatan_luar'];
			}
		} else {
			echo "error-<b>Tidak ada file</b>";
		}
	}

	function uploadFile($id_daftar_opd_kegiatan_luar, $nama_file, $komponen)
	{
		$this->load->helper('file');
		$path = "assets/media/kegiatan_luar/" . $id_daftar_opd_kegiatan_luar . "/";
		if (!file_exists($path)) {
			mkdir($path, 755);
		}
		$path2 = "assets/media/kegiatan_luar/" . $id_daftar_opd_kegiatan_luar . "/" . $komponen . "/";
		if (!file_exists($path2)) {
			mkdir($path2, 755);
		}

		$config['upload_path'] = $path2;
		$config['allowed_types'] = 'jpg|png|gif|bmp|jpeg|pdf|doc|docx|xls|xlsx';
		//		$config['max_size']	= '512';
		$config['remove_spaces'] = true;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('artikel_file')) {
			$data = array('status' => 'error', 'error' => $this->upload->display_errors());
			return $data;
		} else {
			$dn = $this->upload->data('artikel_file');
			$ttpp = $dn['raw_name'];
			$idB = $this->MainModel->simpan_dokumen($id_daftar_opd_kegiatan_luar, $nama_file, $komponen);
			$data['raw'] = $ttpp;
			$data['status'] = "success";
			$data['id_daftar_opd_kegiatan_luar'] = $idB;
			//			$gg = Modules::run("appdok/pantau/kontrol",$id_pegawai);
			return $data;
		}
	}

	public function list_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$this->template->view('template/personal/list_jadwal_kegiatan_luar', 4, $datacontent);
	}

	public function get_kegiatan_luar_pns_by_dept()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];

		$data['bulan'] = $this->input->post('bulan');
		$data['tahun'] = $this->input->post('tahun');

		$result = $this->KegiatanModel->get_kegiatan_by_dept($data);
		$list = array();
		foreach ($result as $row) {

			array_push($list, $row);
		}

		echo json_encode($list);
	}

	public function list_staff()
	{
		$session_data = $this->session->userdata('sess_personal');
		$datacontent['session'] = $session_data;
		$list_golongan = $this->StaffModel->get_golongan();
		$datacontent['golongan'] = $list_golongan;
		$list_jabatan = $this->StaffModel->get_jabatan();
		$datacontent['jabatan'] = $list_jabatan;
		$list_status = $this->StaffModel->get_status();
		$datacontent['status'] = $list_status;

		$this->template->view('template/personal/list_staff', 4, $datacontent);
	}

	public function get_all_staff()
	{
		$session_data = $this->session->userdata('sess_personal');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = $this->input->post('status');
		$result = $this->StaffModel->get_staff_by_dept($data);
		$list = array();
		foreach ($result as $row) {

			$test = $this->SipdModel->get_nip($row);

			if (!empty($test) && $test[0]['status_kepegawaian'] == $data['status']) {
				$row['nama_pegawai'] = $test[0]['nama_pegawai'];
				$row['nip_baru'] = $test[0]['nip_baru'];
				$row['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$row['nama_golongan'] = $test[0]['nama_golongan'];
				$row['nama_pangkat'] = $test[0]['nama_pangkat'];
				$row['tmt_pangkat'] = $test[0]['tmt_pangkat'];
				$row['nomenklatur_jabatan'] = $test[0]['nomenklatur_jabatan'];
				array_push($list, $row);
			}
		}

		echo json_encode($list);
	}

	public function logout()
	{

		$this->session->unset_userdata('sess_staff');

		session_destroy();
		redirect('VerifyLogin', 'refresh');
	}
}
