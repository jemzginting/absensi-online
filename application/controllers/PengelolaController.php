<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengelolaController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('sess_pengelola')) {
			redirect("SignIn", 'refresh');
		}

		$this->load->model('RekapModel');
		$this->load->model('LaporanModel');
		$this->load->model('StaffModel');
		$this->load->model('SipdModel');
		$this->load->model('ShiftModel');
		$this->load->model('GolonganModel');
		$this->load->model('KegiatanModel');
		$this->load->model('MainModel');
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$this->template->view('template/pengelola/main_content', 3, $datacontent);
	}



	public function daftar_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$jenis_kegiatan = $this->KegiatanModel->get_jenis_kegiatan();
		$datacontent['jenis_kegiatan'] = $jenis_kegiatan;
		$this->template->view('template/pengelola/daftar_jadwal_kegiatan_luar', 3, $datacontent);
	}

	public function get_daftar_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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
		$session_data = $this->session->userdata('sess_pengelola');
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
				$data['tanggal'] = date('Y-m-d', strftime());

				if (empty($cek_rekap)) {
					$this->RekapModel->tambah_rekap($data);
				}
			}
		}

		$this->load->view('template/pengelola/opd_kegiatan_luar', $data);
	}

	public function get_opd_kegiatan_luar_by_id()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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
		$session_data = $this->session->userdata('sess_pengelola');
		$data['session'] = $session_data;
		$data['jenis_kegiatan'] = $this->KegiatanModel->get_jenis_kegiatan();

		$this->load->view('template/pengelola/tambah_jadwal_kegiatan_luar', $data);
	}

	public function submit_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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
		redirect('PengelolaController/daftar_jadwal_kegiatan_luar');
	}

	public function kehadiran_opd()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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

		$this->load->view('template/pengelola/kehadiran_opd', $data);
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

	// 	$this->load->view('template/pengelola/surat_tugas_upload',$data);
	// }

	public function tambah_kehadiran()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');

		$data['pegawai'] = $this->StaffModel->get_staff_by_dept($data);
		$data['keterangan'] = $this->MainModel->get_keterangan($data);
		$data['kehadiran'] = $this->KegiatanModel->get_kehadiran_opd($data);
		$data['izin'] = $this->KegiatanModel->get_kehadiran_opd_izin($data);

		$this->load->view('template/pengelola/tambah_kehadiran', $data);
	}

	public function get_kehadiran_opd()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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


	public function submit_shift()
	{
		$nip_favorit = array();
		foreach ($this->input->post('nip') as $value) {
			array_push($nip_favorit, $value);
		}
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['start_date'] = $this->input->post('mulai');
		$data['end_date'] = $this->input->post('sampai');
		$data['jam_masuk'] = $this->input->post('time_masuk');
		$data['jam_pulang'] = $this->input->post('time_pulang');
		$data['status'] = $this->input->post('status');

		for ($i = 0; $i < count($nip_favorit); $i++) {

			$data['nip'] = $nip_favorit[$i];

			$this->ShiftModel->tambah_shift($data);
		}

		//redirect('PengelolaController/input_shift');
	}

	public function submit_opd_shift()
	{
		$nip_favorit = array();
		$js_opd = array();

		foreach ($this->input->post('nip') as $value) {
			array_push($nip_favorit, $value);
		}

		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = $this->input->post('status');
		$jam_opede = $this->ShiftModel->ambil_jam_opd($data['status']);

		$i = 0;
		//echo $jam_sekolah;
		foreach ($jam_opede as $row) {
			$js_opd[$i]['jam_masuk']  = $row['jam_masuk'];
			$js_opd[$i]['jam_pulang']  = $row['jam_pulang'];
			$js_opd[$i]['kategori_hari']  = $row['kategori_hari'];
			$i++;
		}

		for ($i = 0; $i < count($nip_favorit); $i++) {

			for ($j = 0; $j < count($js_opd); $j++) {

				$data['jam_masuk'] =  date('H:i:s', strtotime($js_opd[$j]['jam_masuk']));
				$data['jam_pulang'] =  date('H:i:s', strtotime($js_opd[$j]['jam_pulang']));
				$data['kategori_hari'] = $js_opd[$j]['kategori_hari'];
				$data['nip'] = $nip_favorit[$i];
				$this->ShiftModel->tambah_jam_guru($data);
			}
		}
		//redirect('PengelolaController/input_shift_guru');
	}

	public function submit_guru()
	{
		$nip_favorit = array();
		//$jam_masuk=array();
		//$jam_pulang=array();
		$js_guru = array();
		foreach ($this->input->post('nip') as $value) {
			array_push($nip_favorit, $value);
		}

		$session_data = $this->session->userdata('sess_pengelola');
		//$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = $this->input->post('status');
		//console.log($data['status']);
		$jam_sekolah = $this->ShiftModel->ambil_jam_sekolah($data['status']);

		$i = 0;
		echo $jam_sekolah;
		foreach ($jam_sekolah as $row) {
			$js_guru[$i]['jam_masuk']  = $row['jam_masuk'];
			$js_guru[$i]['jam_pulang']  = $row['jam_pulang'];
			$js_guru[$i]['kategori_hari']  = $row['kategori_hari'];
			$i++;
		}

		for ($i = 0; $i < count($nip_favorit); $i++) {

			for ($j = 0; $j < count($js_guru); $j++) {

				$data['jam_masuk'] =  date('H:i:s', strtotime($js_guru[$j]['jam_masuk']));
				$data['jam_pulang'] =  date('H:i:s', strtotime($js_guru[$j]['jam_pulang']));
				$data['kategori_hari'] = $js_guru[$j]['kategori_hari'];
				$data['nip'] = $nip_favorit[$i];
				$this->ShiftModel->tambah_jam_guru($data);
			}
		}

		//redirect('PengelolaController/input_shift_guru');
	}


	public function get_all_shift()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$result = $this->ShiftModel->get_jam_opd($data);
		echo json_encode($result);
	}

	public function get_all_guru()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$result = $this->ShiftModel->get_user_guru($data);
		echo json_encode($result);
	}

	public function submit_kehadiran()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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
			$jam = "07:30:00";
			$data['tanggal1'] = $data['tanggal1'] . " " . date('H:i:s', strtotime("$jam"));
			$cek = $this->RekapModel->cek_rekap_by_userid_tanggal($data);
			$cek_checkinout = $this->RekapModel->cek_checkinout($data);
			if (!empty($cek)) {
				$data['masuk'] = "07:30:00";
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

		$this->template->view('template/pengelola/tambah_kehadiran', 3, $data);
	}

	public function submit_kehadiran_izin()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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

		$this->template->view('template/pengelola/tambah_kehadiran', 3, $data);
	}

	public function hapus_kehadiran()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['id_kehadiran_opd'] = $this->input->post('id_kehadiran_opd');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['userid'] = $this->input->post('userid');
		$data['masuk'] = "00:00:00";
		$data['checktype'] = 0;
		$jam = "07:30:00";
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

		$this->template->view('template/pengelola/tambah_kehadiran', 3, $data);
	}

	public function hapus_izin()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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

		$this->template->view('template/pengelola/tambah_kehadiran', 3, $data);
	}

	public function kembali_kehadiran()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['tanggal'] = $this->input->post('tanggal');

		$this->template->view('template/pengelola/kehadiran_opd', 3, $data);
	}

	public function kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$daftar_kegiatan = $this->MainModel->get_kegiatan();
		$datacontent['kegiatan'] = $daftar_kegiatan;
		$this->template->view('template/pengelola/kegiatan_luar', 3, $datacontent);
	}

	// BUAT DEWEK
	public function tampil_rekap_pns_dept_by_tanggal()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "pns";

		$mulai = $this->input->post('mulaiP');
		$data['tgl_input'] = date('Y-m-d', strtotime("$mulai"));

		$rekap_dept_tgl = $this->RekapModel->cek_rekap_tgl_by_DeptId($data); //cek rekap tanggal

		echo json_encode($rekap_dept_tgl);
	}

	// BUAT DEWEK
	public function tampil_rekap_tkk_dept_by_tanggal()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "tkk";

		$mulai = $this->input->post('mulaiP');
		$data['tgl_input'] = date('Y-m-d', strtotime("$mulai"));

		$rekap_dept_tgl = $this->RekapModel->cek_rekap_tgl_by_DeptId($data); //cek rekap tanggal

		echo json_encode($rekap_dept_tgl);
	}


	// BUAT DEWEK
	public function tampil_laporan_dept_by_bulan()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "pns";
		$bulan = $this->input->get('bulanx');
		$tahun = $this->input->get('tahunx');
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;

		$rekap_bln = $this->get_rekap_bulanan_deptid_ubah($data['bulan'], $data['tahun']);


		$laporan_dept_tgl = $this->LaporanModel->cek_laporan_deptid($data); //cek laporan bulan


		if (!empty($laporan_dept_tgl)) { //jika tidak ada, maka insert ke tabel rekap

			echo json_encode($laporan_dept_tgl);
		} else {
			echo "data masih kosong";
		}
	}

	// BUAT DEWEK
	public function tampil_laporan_tkk_dept_by_bulan()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = "tkk";
		$bulan = $this->input->get('bulan1');
		$tahun = $this->input->get('tahun1');
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$laporan_dept_tgl = $this->LaporanModel->cek_laporan_deptid($data); //cek laporan bulan

		if (!empty($laporan_dept_tgl)) { //jika tidak ada, maka insert ke tabel rekap

			echo json_encode($laporan_dept_tgl);
		} else {
			echo "data masih kosong";
		}
	}

	public function update_harian()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$datacontent['DeptID'] = $session_data['DeptID'];
		$this->template->view('template/pengelola/update_absensi_harian', 3, $datacontent);
	}

	private function insert_default_data_absen($tanggal_sekarang)
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];

		//$this->RekapModel->copy_datalengkap_rekap();
		$this->RekapModel->copy_datalengkap_rekapx($tanggal_sekarang, $data['DeptID']);
	}

	private function tampil_nama_hari($tgl_sekarang)
	{
		$tanggal = $tgl_sekarang;
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin-Kamis',
			'Tue' => 'Senin-Kamis',
			'Wed' => 'Senin-Kamis',
			'Thu' => 'Senin-Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$hari = $dayList[$day];

		return $hari;
	}


	public function coba()
	{
		echo "theo";
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

	public function update_keterangan()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['userid'] = $this->input->get('id_userid');
		//echo "id= " . $data['userid'];
		$data['keterangan'] = $this->input->get('keterangan');
		$date = $this->input->get('tanggal');
		$sampai = $this->input->get('sampaiedit');

		// $data['tanggal'] = date('Y-m-d', strtotime("$date"));
		$awal = strtotime($date);
		$akhir = strtotime($sampai);
		$harikerja = array();
		$sabtuminggu = array();

		for ($i = $awal; $i <= $akhir; $i += (60 * 60 * 24)) {
			$harikerja[] = $i;
		}

		foreach ($harikerja as $value) {
			$tanggal = $value;
			$data['tanggal'] = date('Y-m-d', strftime("$tanggal"));

			$cek_ket = $this->RekapModel->cek_keterangan($data['userid'], $data['tanggal']); // cek ado izin dak tanggal ini

			if (empty($cek_ket)) {
				$insert_ket = $this->RekapModel->insert_keterangan($data);
			} else {
				$update_ket = $this->RekapModel->update_keterangan($data);
			}

			$cek_rekap = $this->RekapModel->cek_rekap($data['tanggal'], $data['DeptID']);

			if (!empty($cek_rekap)) {
				//untuk update rekap bulanan
				$data['telat'] = date('H:i:s', strtotime("00:00:00"));
				$data['persen_telat'] = 0.00;

				if ($data['keterangan'] != 7 or $data['keterangan'] != 16 or $data['keterangan'] != 8) {
					$data['total_persen'] = 0.00;
					$data['pulang_cepat'] = date('H:i:s', strtotime("00:00:00"));
					$data['persen_pc'] = 0.00;
					$res = $this->RekapModel->update_keterangan_rekap($data);
				} else if ($data['keterangan'] == 16) {
					//$query = $this->RekapModel->update_keterangan_telat($data);
					echo "xax";
					$res = $this->RekapModel->update_keterangan_gagal_server($data);
					$resix = $this->RekapModel->update_keterangan3($data);
				} else {
					$persen_pc = $this->RekapModel->get_persen_pc_masuk($data);
					$batas = date('H:i:s', strtotime("10:00:00"));
					$masuk = date('H:i:s', strtotime($persen_pc[0]['masuk']));
					//	echo "batas = " . $batas . "pulang =" . $pulang;
					if ($masuk < $batas) {
						$data['total_persen'] = $persen_pc[0]['persen_pc'];
						$res = $this->RekapModel->update_keterangan_telat($data);
					} else {
						$res = $this->RekapModel->update_keterangan_apel_lewat($data);
					}
				}
			} else {
				$res = "";
			}
		}
		echo json_encode($res);
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


	public function get_detail_rekap()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = $this->input->get('status');


		$data['userid'] = $this->input->get('id_userid');
		$data['tahun'] = $this->input->get('tahun');
		$data['bulan'] = $this->input->get('bulan');


		$result = $this->RekapModel->get_detail_pns_by_tahun_bulan($data);

		echo json_encode($result);
	}


	public function cek_harian()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['DeptID'] = $session_data['DeptID'];
		$datacontent['session'] = $session_data;
		$list_keterangan = $this->RekapModel->get_jenis_keterangan();
		$datacontent['jenis_keterangan'] = $list_keterangan;
		$this->template->view('template/pengelola/list_absensi_pegawai', 3, $datacontent);
	}

	public function cek_bulanan()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$datacontent['DeptID'] = $session_data['DeptID'];
		$this->template->view('template/pengelola/rekap_absensi_bulanan', 3, $datacontent);
	}

	// BUAT DEWEK pake QUEUE
	public function get_rekap_harian_deptid_ubah()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$tanggal_sekarang = $this->input->get('update_tanggal1');
		$data['tanggal_sekarang'] = date('Y-m-d', strtotime("$tanggal_sekarang"));
		//$this->RekapModel->copy_datalengkap_rekap($tanggal_sekarang, $data['DeptID']);
		$rekap_hari_ini = $this->RekapModel->cek_rekap($tanggal_sekarang, $data['DeptID']); //cek rekap hari ini 


		if (empty($rekap_hari_ini)) { //jika tidak ada, maka insert ke tabel rekap
			$this->RekapModel->copy_datalengkap_rekapx($tanggal_sekarang, $data['DeptID']);
		} else {
			$this->RekapModel->hapus_rekap_tgl($tanggal_sekarang, $data['DeptID']);
			$this->RekapModel->copy_datalengkap_rekapx($tanggal_sekarang, $data['DeptID']);
		}


		$hari =  $this->tampil_nama_hari($data['tanggal_sekarang']);
		$rekap = $this->RekapModel->update_rekap_masuk($tanggal_sekarang, $data['DeptID'], $hari);
		$rekap2 = $this->RekapModel->update_rekap_pulang($tanggal_sekarang, $data['DeptID'], $hari);

		$denda = $this->RekapModel->update_denda($tanggal_sekarang, $data['DeptID']);

		$this->RekapModel->ubah_keterangan2($data['DeptID'], $tanggal_sekarang); // cek ado izin dak tanggal ini
		$this->RekapModel->ubah_keterangan3($data['DeptID'], $tanggal_sekarang); // cek ado izin dak tanggal ini

	}


	//==============================buat dewek======================
	public function get_rekap_bulanan_deptid_ubah($bulan, $tahun)
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;


		$cek_rekap = $this->RekapModel->cek_rekap_bulan_tahun($data); //ngecek di tabel rekap ado dak dibulan tsb

		if (!empty($cek_rekap)) {
			$laporan_bulan_ini = $this->LaporanModel->cek_laporan($data); //cek laporan bulan ini 

			if (empty($laporan_bulan_ini)) {
				$this->LaporanModel->copy_datalengkap_bulanan($data['bulan'], $data['tahun'], $data['DeptID']); //replace into
			} else {
				$this->LaporanModel->hapus_rekap_bulanan($data['bulan'], $data['tahun'], $data['DeptID']); //replace into
				$this->LaporanModel->copy_datalengkap_bulanan($data['bulan'], $data['tahun'], $data['DeptID']); //replace into
			}

			$this->LaporanModel->update_rekap($data['bulan'], $data['tahun'], $data['DeptID']);
			$this->LaporanModel->update_tambah_potongan($data['bulan'], $data['tahun'], $data['DeptID']);
		} else {
			echo "Belum ada rekapan harian untuk bulan ini";
		}
	}



	//==============================buat dewek======================
	public function get_rekap_bulanan_deptid()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$tanggal_sekarang = date('Y-m-d');
		//$tanggal_sekarang = date('2019-03-30');
		//$data['tanggal_sekarang'] = date('Y-m-d', strtotime("$tanggal_sekarang"));

		$data['tanggal_sekarang'] = date('Y-m-d', strtotime("$tanggal_sekarang -1 month"));
		//$data['tanggal_terakhir'] = date('Y-m-t', strtotime("$tanggal_sekarang"));
		$data['tanggal_terakhir'] = date('Y-m-d', strtotime("$tanggal_sekarang -1 month"));
		//$data['tanggal_terakhir'] = date('Y-m-d', strtotime("2019-03-30"));
		//$data['bulan'] = date('m', strtotime("$tanggal_sekarang"));
		$data['bulan'] = date('m', strtotime($data['tanggal_sekarang']));
		$data['tahun'] = date('Y', strtotime($data['tanggal_sekarang']));


		if ($data['tanggal_sekarang'] == $data['tanggal_terakhir']) {
			$cek_rekap = $this->RekapModel->cek_rekap_bulan_tahun($data); //ngecek di tabel rekap ado dak dibulan tsb

			if (!empty($cek_rekap)) {
				$laporan_bulan_ini = $this->LaporanModel->cek_laporan($data); //cek laporan bulan ini 

				if (empty($laporan_bulan_ini)) {
					$this->LaporanModel->copy_datalengkap_bulanan($data['bulan'], $data['tahun'], $data['DeptID']); //replace into
				}

				foreach ($laporan_bulan_ini as $laporan) {
					$data['userid'] = $laporan['userid'];
					$data['nip'] = $laporan['nip'];

					$cek_keterangan_userid = $this->LaporanModel->cek_keterangan_userid($data);
					$data['tk'] = 0;
					$data['sakit'] = 0;
					$data['izin'] = 0;
					$data['cuti'] = 0;
					$data['dinas'] = 0;
					$data['tugas_lain'] = 0;

					if (!empty($cek_keterangan_userid)) {

						foreach ($cek_keterangan_userid as $ket_user) {
							$data['keterangan'] = $ket_user['keterangan'];

							switch ($data['keterangan']) {

								case 1:
									$data['sakit']++;
									break;
								case 2:
									$data['izin']++;
									break;
								case 3:
									$data['cuti']++;
									break;
								case 6:
									$data['dinas']++;
									break;
								case 9:
									$data['tugas_lain']++;
									break;
								case 10:
									$data['tk']++;
									break;
								default:
									break;
							}
						}
					} else {
						echo "tidak ada keterangan apapun";
					}


					$jumlah_kerja = $this->LaporanModel->hitung_jumlah_hari($data); //hitung jumlah hari kerja

					$data['jumlah_hari_kerja'] = $jumlah_kerja[0]['jumlah_hari'];

					$hitung_telat =  $this->LaporanModel->hitung_telat($data['userid']);
					$data['telat'] = $hitung_telat[0]['telat'];


					$hitung_jlh_telat =  $this->LaporanModel->hitung_jlh_telat($data['userid'], $data['bulan'], $data['tahun']);
					$data['jlh_telat'] = $hitung_jlh_telat[0]['jlh_telat'];

					$hitung_jlh_pc =  $this->LaporanModel->hitung_jlh_pc($data['userid'], $data['bulan'], $data['tahun']);
					$data['pulang_cepat'] = $hitung_jlh_pc[0]['pulang_cepat'];

					$result_count = $this->RekapModel->get_jumlah_hadir($data);
					$data['jumlah_hadir'] = $result_count[0]['jlh_hadir'];

					$data['persen'] = round((($data['jumlah_hadir'] / $data['jumlah_hari_kerja']) * 100), 2);


					$this->LaporanModel->update_laporan($data);
				}
			} else {
				echo "Belum ada rekapan harian untuk bulan ini";
			}
		} else {
			echo "Belum waktunya load bulanan";
		}
	}


	public function input_shift_2()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		//echo "haha".$data['DeptID'];
		$datacontent['session'] = $session_data;
		$datacontent['nip'] = $this->ShiftModel->tampil_nip_nama($data);
		//	$datacontent['departments'] = $this->MainModel->get_departments();
		$this->template->view('template/pengelola/input_shift_guru', 3, $datacontent);
	}

	public function input_shift_1()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		//$data['DeptID'] = $session_data['DeptID'];
		$data['DeptID'] = $session_data['DeptID'];
		//echo "haha".$data['DeptID'];
		$datacontent['session'] = $session_data;
		$datacontent['nip'] = $this->ShiftModel->tampil_nip_nama($data);
		//	$datacontent['departments'] = $this->MainModel->get_departments();
		$this->template->view('template/pengelola/input_shift_opd', 3, $datacontent);
	}

	public function get_detail_shift()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		$data['id_shift'] = $this->input->GET('id_shift');

		$res = $this->ShiftModel->get_shift_by_id($data['id_shift']);
		echo json_encode($res);
	}

	public function update_detail_shift()
	{
		$data['id_shift'] = $this->input->post('id_shift');
		$data['start_date'] = $this->input->post('start_date-modal');
		$data['end_date'] = $this->input->post('end_date-modal');
		$data['jam_masuk'] = $this->input->post('jam_masuk-modal');
		$data['jam_keluar'] = $this->input->post('jam_keluar-modal');
		$data['status'] = $this->input->post('status-modal');

		$res = $this->ShiftModel->update_shift_by_id($data);

		echo json_encode($res);
	}

	public function update_detail_guru()
	{
		$data['id_shift'] = $this->input->post('id_shift');
		$data['start_date'] = $this->input->post('start_date-modal');
		$data['end_date'] = $this->input->post('end_date-modal');
		$data['jam_masuk'] = $this->input->post('jam_masuk-modal');
		$data['jam_keluar'] = $this->input->post('jam_keluar-modal');
		$data['status'] = $this->input->post('status-modal');

		$res = $this->ShiftModel->update_shift_by_id($data);

		echo json_encode($res);
	}

	public function update_jam_sekolah()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		$data['nip'] = $this->input->post('badgenumber');
		$data['status'] = $this->input->post('status-modal');
		$js_guru = array();
		$hapus_jam_sebelum = $this->ShiftModel->hapus_jamsekolah($data['nip']);
		$jam_sekolah = $this->ShiftModel->ambil_jam_sekolah($data['status']);
		$i = 0;
		//echo $jam_sekolah;
		foreach ($jam_sekolah as $row) {
			$js_guru[$i]['jam_masuk']  = $row['jam_masuk'];
			$js_guru[$i]['jam_pulang']  = $row['jam_pulang'];
			$js_guru[$i]['kategori_hari']  = $row['kategori_hari'];
			$i++;
		}


		for ($j = 0; $j < count($js_guru); $j++) {

			$data['jam_masuk'] =  date('H:i:s', strtotime($js_guru[$j]['jam_masuk']));
			$data['jam_pulang'] =  date('H:i:s', strtotime($js_guru[$j]['jam_pulang']));
			$data['kategori_hari'] =   $js_guru[$j]['kategori_hari'];
			$res = $this->ShiftModel->tambah_jam_guru($data);
		}

		//$res = $this->ShiftModel->update_jamsekolah_by_id($data);

		//echo json_encode($res);
	}

	public function hapus_shift()
	{
		$data['badgenumber'] = $this->input->post('badgenumber');
		$res = $this->ShiftModel->delete_shift_by_id($data['badgenumber']);
		$session_data = $this->session->userdata('sess_pengelola');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Hapus shift dengan ID staff " . $data['badgenumber'];
		$res_log = $this->LogModel->insert($data_log);

		echo json_encode($res);
	}

	public function all_hapus_shift()
	{
		$data['badgenumber'] = $this->input->post('ids');
		$res = $this->ShiftModel->deleteAll($data['badgenumber']);
		$session_data = $this->session->userdata('sess_pengelola');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Hapus shift dengan ID staff " . $data['badgenumber'];
		//$res_log = $this->LogModel->insert($data_log);

		echo json_encode($res);
	}

	public function data_pegawai()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		$datacontent['nip'] = $this->ShiftModel->tampil_nip_nama2($data);
		echo json_encode($datacontent);
	}

	public function tanggal_absen()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		$datacontent['tanggal'] = $this->ShiftModel->get_tanggal_absen($data['DeptID']);
		echo json_encode($datacontent);
	}

	public function ulang_tanggal_absen()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['DeptID'] = $session_data['DeptID'];
		$datacontent['tanggal'] = $this->ShiftModel->get_ulang_tanggal_absen($data['DeptID']);
		echo json_encode($datacontent);
	}


	public function jadwal_sekolah()
	{
		//$session_data = $this->session->userdata('sess_pengelola');
		//$datacontent['session'] = $session_data;
		$datacontent = $this->ShiftModel->get_jam_sekolah();
		echo json_encode($datacontent);
	}

	public function jadwal()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		//Load model from Shift Model 
		//$datacontent['shift'] = $this->ShiftModel->get_user_shift($data);
		$this->template->view('template/pengelola/jadwal_shift', 3, $datacontent);
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
				$config['create_thumb'] = false;
				$config['maintain_ratio'] = true;
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
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$this->template->view('template/pengelola/list_jadwal_kegiatan_luar', 3, $datacontent);
	}

	public function get_kegiatan_luar_pns_by_dept()
	{
		$session_data = $this->session->userdata('sess_pengelola');
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

	public function list_pegawai()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$list_golongan = $this->StaffModel->get_golongan();
		$datacontent['golongan'] = $list_golongan;
		$list_jabatan = $this->StaffModel->get_jabatan();
		$datacontent['jabatan'] = $list_jabatan;
		$list_status = $this->StaffModel->get_status();
		$datacontent['status'] = $list_status;

		$this->template->view('template/pengelola/list_staff', 3, $datacontent);
	}

	public function get_all_staff()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];
		$data['status'] = $this->input->get('status');
		$test = $this->StaffModel->get_staff_by_dept($data);

		echo json_encode($test);
	}


	public function settings()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$datacontent['session'] = $session_data;
		$this->template->view('template/pengelola/settings', 3, $datacontent);
	}

	public function change_password()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_user'] = $session_data['id_user'];
		$data['old_pass'] = $this->input->post('old_pass');
		$data['password'] = $this->input->post('new_pass');
		$data['confirm_pass'] = $this->input->post('confirm_new_pass');
		$data_user = $this->User->get($data);
		$status_log = "";
		if ($data_user != null) {
			if ($data_user[0]['password'] == md5($data['old_pass'])) {
				$result = $this->User->update_password($data);
				if ($result > 0) {
					$response = array("status" => 1);
					$status_log = "berhasil";
				} else {
					$response = array("status" => 2);
					$status_log = "gagal";
				}
			} else {
				$response = array("status" => 3);
				$status_log = "gagal. Password lama salah";
			}
		}
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Ubah password " . $status_log;
		$res_log = $this->LogModel->insert($data_log);
		echo json_encode($response);
	}

	public function logout()
	{

		$this->session->unset_userdata('sess_staff');

		session_destroy();
		redirect('SignIn', 'refresh');
	}
}
