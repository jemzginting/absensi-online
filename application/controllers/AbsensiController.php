<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('sess_absensi')) {
			redirect("SignIn", 'refresh');
		}
		$this->load->model('RekapModel');
		$this->load->model('LaporanModel');
		$this->load->model('StaffModel');
		$this->load->model('SipdModel');
		$this->load->model('GolonganModel');
		$this->load->model('KegiatanModel');
		$this->load->model('MainModel');
		$this->load->model('AllModel');

		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$this->template->view('template/absensi/main_content', 2, $datacontent);
	}

	public function tambah_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$datacontent['jenis_kegiatan'] = $this->KegiatanModel->get_jenis_kegiatan();
		$datacontent['department'] = $this->MainModel->get_departments();
		$this->load->view('template/absensi/tambah_jadwal_kegiatan_luar', $datacontent);
	}

	public function get_daftar_opd_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['session'] = $session_data;
		$data['id_daftar_kegiatan_luar'] = $this->input->post('id_daftar_kegiatan_luar');
		$this->load->view('template/absensi/daftar_opd_kegiatan_luar', $data);
	}

	public function get_all_daftar_opd_kegiatan_luar()
	{

		$data['id_daftar_kegiatan_luar'] = $this->input->post('id_daftar_kegiatan_luar');

		$result = $this->KegiatanModel->get_all_daftar_opd_kegiatan_luar($data);
		$list_kegiatan = array();
		foreach ($result as $row) {

			array_push($list_kegiatan, $row);
		}
		echo json_encode($list_kegiatan);
	}

	public function daftar_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$jenis_kegiatan = $this->KegiatanModel->get_jenis_kegiatan();
		$datacontent['jenis_kegiatan'] = $jenis_kegiatan;
		$this->template->view('template/absensi/daftar_jadwal_kegiatan_luar', 2, $datacontent);
	}

	public function submit_jadwal_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['id_staff'] = $session_data['id_staff'];

		$data['nama_kegiatan'] = $this->input->post('nama_kegiatan');
		$data['tanggal'] = $this->input->post('tgl_kegiatan');
		$data['department'] = $this->input->post('department');

		$this->KegiatanModel->insert_jadwal_kegiatan_luar($data);

		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit jenis kegiatan dengan nama kegiatan " . $data['nama'] . " dan ID user " . $id_user;
		$res_log = $this->LogModel->insert($data_log);
		redirect('AbsensiController/daftar_jadwal_kegiatan_luar');
	}

	public function get_daftar_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['session'] = $session_data;
		$data['DeptID'] = $session_data['DeptID'];
		$date = date('Y-m-d');

		$data['tahun'] = date('Y', strtotime("$date"));
		$data['bulan'] = date('m', strtotime("$date"));

		$result = $this->KegiatanModel->get_daftar_kegiatan_luar($data);
		$list_kegiatan = array();
		foreach ($result as $row) {

			array_push($list_kegiatan, $row);
		}
		echo json_encode($list_kegiatan);
	}

	public function get_opd_kegiatan_luar()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['session'] = $session_data;
		$data['id_staff'] = $session_data['id_staff'];

		$data['id_daftar_kegiatan_luar'] = $this->input->post('id_daftar_kegiatan_luar');
		$data['tanggal1'] = $this->input->post('tanggal');
		$data['dept'] = $this->input->post('dept');

		if ($data['dept'] == "SELURUH") {
			$nama = $this->MainModel->get_departments();

			foreach ($nama as $row) {
				$data['DeptID'] = $row['DeptID'];
				$cek = $this->KegiatanModel->get_opd_kegiatan_luar($data);

				if (empty($cek)) {
					$data['nama_department'] = $row['DeptName'];
					$crot = $this->KegiatanModel->insert_opd_kegiatan_luar($data);
				}
			}
		} else {
			$DeptID = $this->MainModel->get_departments_by_nama($data);
			$data['DeptID'] = $DeptID[0]['DeptID'];
			$cek = $this->KegiatanModel->get_opd_kegiatan_luar($data);

			if (empty($cek)) {
				$data['nama_department'] = $DeptID[0]['DeptName'];
				$crot = $this->KegiatanModel->insert_opd_kegiatan_luar($data);
			}
		}

		$this->load->view('template/absensi/opd_kegiatan_luar', $data);
	}

	public function get_opd_kegiatan_luar_by_id()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['DeptID'] = $session_data['DeptID'];
		$data['id_daftar_kegiatan_luar'] = $this->input->post('id_daftar_kegiatan_luar');

		$result = $this->KegiatanModel->get_all_opd_kegiatan_luar($data);
		$list_kegiatan = array();
		foreach ($result as $row) {

			array_push($list_kegiatan, $row);
		}
		echo json_encode($list_kegiatan);
	}

	public function kehadiran_opd()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['session'] = $session_data;

		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['DeptID'] = $this->input->post('DeptID');
		$data['tanggal'] = $this->input->post('tanggal');

		$this->load->view('template/absensi/kehadiran_opd', $data);
	}

	public function get_kehadiran_opd()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_daftar_opd_kegiatan_luar'] = $this->input->post('id_daftar_opd_kegiatan_luar');
		$data['DeptID'] = $this->input->post('DeptID');
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

	public function absensi_pegawai_harian()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$list_departments = $this->RekapModel->get_departments();
		$datacontent['departments'] = $list_departments;
		$list_keterangan = $this->RekapModel->get_jenis_keterangan();
		$datacontent['jenis_keterangan'] = $list_keterangan;
		$this->template->view('template/absensi/absensi_pegawai_harian_pns', 2, $datacontent);
	}

	public function absensi_pegawai_bulanan()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$list_departments = $this->RekapModel->get_departments();
		$datacontent['departments'] = $list_departments;
		$list_keterangan = $this->RekapModel->get_jenis_keterangan();
		$datacontent['jenis_keterangan'] = $list_keterangan;
		$this->template->view('template/absensi/absensi_pegawai_bulanan_pns', 2, $datacontent);
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
			$jam = "07:30:00";
			$tanggal = $value;
			$data['tanggal'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = $data['tanggal'] . " " . date('H:i:s', strtotime("$jam"));

			$cek_checkinout = $this->RekapModel->cek_checkinout($data);
			$SN = $this->RekapModel->get_SN_by_id($data);

			if ($data['keterangan'] > 3 && $data['keterangan'] != 10) {
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
			$jam = "07:30:00";
			$tanggal = $value;
			$data['tanggal'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = date('Y-m-d', strftime("$tanggal"));
			$data['tanggal1'] = $data['tanggal'] . " " . date('H:i:s', strtotime("$jam"));

			$cek_checkinout = $this->RekapModel->cek_checkinout($data);
			$SN = $this->RekapModel->get_SN_by_id($data);

			if ($data['keterangan'] > 3 && $data['keterangan'] != 10) {
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

	public function get_all_staff()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $session_data['DeptID'];

		$result = $this->StaffModel->get_all_staff($data);
		$list = array();
		foreach ($result as $row) {

			// $golongan = $this->LaporanModel->get_nama_golongan($row);
			// $row['nama_golongan'] = $golongan[0]['nama_golongan'];
			// $data['badgenumber'] = $row['badgenumber'];

			$test = $this->SipdModel->get_nip($row);

			if (empty($test)) {
				$row['nama_pegawai'] = $row['name'];
				$row['nip_baru'] = $row['badgenumber'];
				$row['status_kepegawaian'] = "";
				$row['nama_golongan'] = "";
				$row['nama_pangkat'] = "";
				$row['nomenklatur_jabatan'] = "";
			} else {
				$row['nama_pegawai'] = $test[0]['nama_pegawai'];
				$row['nip_baru'] = $test[0]['nip_baru'];
				$row['status_kepegawaian'] = $test[0]['status_kepegawaian'];
				$row['nama_golongan'] = $test[0]['nama_golongan'];
				$row['nama_pangkat'] = $test[0]['nama_pangkat'];
				$row['nomenklatur_jabatan'] = $test[0]['nomenklatur_jabatan'];
			}
			array_push($list, $row);
		}

		echo json_encode($list);
	}

	public function tampil_laporan_dept_by_bulan()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $this->input->GET('departments');
		$data['status'] = "pns";
		$bulan = $this->input->GET('bulan');
		$tahun = $this->input->GET('tahun');
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;

		//$rekap_bln = $this->get_rekap_bulanan_deptid_ubah($data['bulan'], $data['tahun']);


		$laporan_dept_tgl = $this->LaporanModel->cek_laporan_deptid($data); //cek laporan bulan


		if (!empty($laporan_dept_tgl)) { //jika tidak ada, maka insert ke tabel rekap

			echo json_encode($laporan_dept_tgl);
		} else {
			echo "data masih kosong";
		}
	}

	public function tampil_laporan_tkk_dept_by_bulan()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $this->input->GET('departments1');
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

	public function rekap_absensi_bulanan()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$list_departments = $this->RekapModel->get_departments();
		$datacontent['departments'] = $list_departments;
		$this->template->view('template/absensi/rekap_absensi_bulanan', 2, $datacontent);
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

	public function get_rekap_harian_sekarang()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$data['id_staff'] = $session_data['id_staff'];
		//$tanggal_sekarang = date('Y-m-d');
		$tanggal_sekarang = date('Y-m-d', strtotime("2019-05-27"));
		$rekap_hari_ini = $this->AllModel->cek_rekap($tanggal_sekarang); //cek rekap hari ini 

		if (empty($rekap_hari_ini)) { //jika tidak ada, maka insert ke tabel rekap
			$this->AllModel->copy_datalengkap_rekapx($tanggal_sekarang);
		}

		$hari =  $this->tampil_nama_hari($tanggal_sekarang);
		$this->AllModel->update_rekap($tanggal_sekarang, $hari);
		$this->AllModel->update_denda($tanggal_sekarang);
		$this->AllModel->ubah_keterangan($tanggal_sekarang); // cek ado izin dak tanggal ini
	}

	public function tampil_rekap_pns_dept_by_tanggal()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $this->input->post('departments');
		$data['status'] = "pns";

		$mulai = $this->input->post('mulai');
		$data['tgl_input'] = date('Y-m-d', strtotime("$mulai"));

		$rekap_dept_tgl = $this->RekapModel->cek_rekap_tgl_by_DeptId($data); //cek rekap tanggal

		echo json_encode($rekap_dept_tgl);
	}

	public function tampil_rekap_tkk_dept_by_tanggal()
	{
		$session_data = $this->session->userdata('sess_pengelola');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] = $this->input->post('departments1');
		$data['status'] = "tkk";

		$mulai = $this->input->post('mulai1');
		$data['tgl_input'] = date('Y-m-d', strtotime("$mulai"));

		$rekap_dept_tgl = $this->RekapModel->cek_rekap_tgl_by_DeptId($data); //cek rekap tanggal

		echo json_encode($rekap_dept_tgl);
	}

	public function list_staff()
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$list_golongan = $this->StaffModel->get_golongan();
		$datacontent['golongan'] = $list_golongan;
		$list_jabatan = $this->StaffModel->get_jabatan();
		$datacontent['jabatan'] = $list_jabatan;
		$list_status = $this->StaffModel->get_status();
		$datacontent['status'] = $list_status;

		$this->template->view('template/absensi/list_staff', 2, $datacontent);
	}

	public function cetak($departments, $bulan, $tahun)
	{
		$session_data = $this->session->userdata('sess_absensi');
		$datacontent['session'] = $session_data;
		$datacontent['id_staff'] = $session_data['id_staff'];
		$datacontent['DeptID'] = $departments;
		$nama_departments = $this->StaffModel->get_nama($datacontent);
		$datacontent['nama_departments'] = $nama_departments[0]['DeptName'];
		$datacontent['bulan'] = $bulan;
		$datacontent['tahun'] = $tahun;
		$datacontent['isi'] = $this->LaporanModel->cek_laporan($datacontent);

		$this->template->view('template/absensi/cetakpdf', 2, $datacontent);
	}

	public function get_detail_rekap()
	{
		$session_data = $this->session->userdata('sess_admin');
		$data['id_staff'] = $session_data['id_staff'];
		$data['DeptID'] =  $this->input->get('dept');
		$data['status'] = $this->input->get('status');
		$data['userid'] = $this->input->get('id_userid');
		$data['tahun'] = $this->input->get('tahun');
		$data['bulan'] = $this->input->get('bulan');


		$result = $this->RekapModel->get_detail_pns_by_tahun_bulan2($data);

		echo json_encode($result);
	}

	public function get_detail_staff()
	{
		$data['userid'] = $this->input->post('id_userid');
		$res = $this->StaffModel->get_staff_by_id($data);
		echo json_encode($res);
	}

	public function update_detail_staff()
	{
		$data['userid'] = $this->input->post('id_userid');
		$data['id_golongan'] = $this->input->post('id_golongan');
		$data['id_jabatan'] = $this->input->post('id_jabatan');
		$data['id_status'] = $this->input->post('id_status');

		$res = $this->StaffModel->update_staff_by_id($data);
		echo json_encode($res);
	}



	public function input_surat()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/input_surat', 2, $datacontent);
	}
	public function list_surat_diterima()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['id_divisi'] = $session_data['id_divisi'];
		$list_divisi = $this->DivisiModel->get_divisi_bidang($data);
		$datacontent['sisa_anggaran'] = $list_divisi;
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/list_surat', 2, $datacontent);
	}
	public function list_divisi()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/list_divisi', 2, $datacontent);
	}
	public function get_divisi_bidang()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['id_divisi'] = $session_data['id_divisi'];
		$result = $this->DivisiModel->get_divisi_bidang($data);
		echo json_encode($result);
	}
	public function list_surat_masuk()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/list_surat_masuk', 2, $datacontent);
	}
	public function list_log()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/list_log2', 2, $datacontent);
	}
	public function tracking_surat()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/tracking_surat', 2, $datacontent);
	}

	public function settings()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$datacontent['session'] = $session_data;
		$this->template->view('template/kepala/settings', 2, $datacontent);
	}

	public function change_password()
	{
		$session_data = $this->session->userdata('sess_kepala');
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
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Ubah password " . $status_log;
		$res_log = $this->LogModel->insert($data_log);
		echo json_encode($response);
	}

	public function submit_surat()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$waktu = $this->WaktuModel->get($data);
		$data['pengirim'] =  $session_data['id_user'];
		$data['id_staff'] =  $session_data['id_staff'];
		$data['id_divisi'] =  $session_data['id_divisi'];
		$data['nip'] =  $session_data['nip'];
		$data['id_golongan'] =  $session_data['id_golongan'];
		//$data['nip'] =  $this->input->post('nip');
		$data['perihal'] = $this->input->post('perihal');
		$data['berangkat'] = $this->input->post('berangkat');
		$data['tujuan'] = $this->input->post('tujuan');
		$date = $this->input->post('tgl_masuk');
		$date2 = $this->input->post('tgl_kembali');
		$time = date("H:i:s");
		$time2 = date("H:i:s");
		$data['tgl_masuk'] = date('Y-m-d H:i:s', strtotime("$date $time"));
		$data['tgl_kembali'] = date('Y-m-d', strtotime("$date2"));
		$data['id_derajat'] = $this->input->post('derajat');
		$data['id_klasifikasi'] = $this->input->post('klasifikasi');
		$data['id_waktu'] = $this->input->post('waktu');
		$riw = $this->input->post('waktu');
		$row = $session_data['keterangan_harian'];
		$data['jml_harian'] = $riw * $row;

		$result = $this->SuratModel->insert($data);
		$session_data = $this->session->userdata('sess_kepala');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Submit surat masuk dari " . $data['pengirim'] . " dengan ID surat " . $result;
		$res_log = $this->LogModel->insert($data_log);
		$res = $this->submit_disposisi($result);

		redirect('KepalaController/list_surat_masuk');
	}

	public function submit_disposisi($id_surat)
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['id_surat'] = $id_surat;
		$data['id_staff'] = $session_data['id_staff'];
		$data['tgl_diterima'] = date("Y-m-d H:i:s");
		$data['final'] = 0;
		$result = $this->DisposisiModel->insert($data);
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Submit disposisi dengan ID surat " . $id_surat;
		$res_log = $this->LogModel->insert($data_log);
		return result;
	}

	public function get_surat_masuk()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['id_staff'] = $session_data['id_staff'];
		$data['tahun'] = $this->input->post('tahun');
		$data['bulan'] = $this->input->post('bulan');
		$result = $this->SuratModel->get_surat_by_tahun_bulan($data);
		$list_surat_masuk = array();
		foreach ($result as $row) {
			$datasurat['id_surat'] = $row['id_surat'];
			$result_disposisi = $this->DisposisiModel->get_jumlah_disposisi($datasurat);
			if ($result_disposisi[0]['jlh_disposisi'] > 1 || $row['keterangan'] != null || $row['keterangan2'] != null) {
				$row['status_disposisi'] = 1;
			} else {
				$row['status_disposisi'] = 0;
			}
			array_push($list_surat_masuk, $row);
		}
		echo json_encode($list_surat_masuk);
	}

	public function get_detail_surat()
	{
		$data['id_surat'] = $this->input->post('id_surat');

		$result = $this->SuratModel->get_surat_by_id_surat($data);
		$list_detail_surat = array();
		foreach ($result as $row) {
			$timestamp = strtotime($row['tgl_masuk']);
			$date = date('Y-m-d', $timestamp);
			$time = date('H:i:s', $timestamp);
			$row['tgl_masuk'] = $date;
			$row['jam_masuk'] = $time;
			array_push($list_detail_surat, $row);
		}
		echo json_encode($list_detail_surat);
	}

	public function update_detail_surat()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['perihal'] = $this->input->post('perihal');
		$data['id_surat'] = $this->input->post('id_surat');
		$date = $this->input->post('tgl_masuk');
		$jam_masuk = $this->input->post('jam_masuk');
		$data['tgl_masuk'] = date('Y-m-d H:i:s', strtotime("$date $jam_masuk"));
		$data['id_derajat'] = $this->input->post('derajat');
		$data['id_klasifikasi'] = $this->input->post('klasifikasi');
		$data['id_waktu'] = $this->input->post('waktu');
		$riw = $this->input->post('waktu');
		$row = $session_data['keterangan_harian'];
		$data['jml_harian'] = $riw * $row;
		$result = $this->SuratModel->update_surat($data);
		$session_data = $this->session->userdata('sess_kepala');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Update surat masuk dengan ID surat " . $data['id_surat'];
		$res_log = $this->LogModel->insert($data_log);
		echo json_encode($result);
	}

	public function get_surat()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['tahun'] = $this->input->post('tahun');
		$data['bulan'] = $this->input->post('bulan');
		$data['id_staff'] = $session_data['id_staff'];
		$list_disposisi = array();
		$list_surat = $this->DisposisiModel->get_disposisi_terbaru_by_staff_bulan_tahun($data);
		foreach ($list_surat as $surat) {
			$datasurat['id_surat'] = $surat['id_surat'];
			$result_final = $this->DisposisiModel->get_final_by_id_surat($datasurat);
			$result_final2 = $this->DisposisiModel->get_final2_by_id_surat($datasurat);
			if ($result_final != null) {
				$surat['status_final'] = 1;
			} else {
				$surat['status_final'] = 0;
			}
			if ($result_final2 != null) {
				$surat['status_final2'] = 1;
			} else {
				$surat['status_final2'] = 0;
			}


			array_push($list_disposisi, $surat);
		}
		echo json_encode($list_disposisi);
	}

	public function delete_surat()
	{
		$data['id_surat'] = $this->input->post('id_surat');
		$result1 = $this->SuratModel->delete_surat_by_id($data);
		$result2 = $this->DisposisiModel->delete_disposisi_by_surat($data);
		$session_data = $this->session->userdata('sess_kepala');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Hapus surat masuk dan disposisi dengan ID surat " . $data['id_surat'];
		$res_log = $this->LogModel->insert($data_log);

		echo json_encode($result1);
	}

	public function submit_keputusan()
	{
		$session_data = $this->session->userdata('sess_kepala');
		//$data_anggaran= $session_data['sisa_anggaran'];
		$data['id_divisi'] = $this->input->post('id_divisi');
		$data['id_surat'] = $this->input->post('id_surat');
		$data['id_disposisi'] = $this->input->post('id_disposisi');
		$data_harian = $this->input->post('jml_harian');
		$sisa_anggaran = $this->input->post('sisa_anggaran');
		$data['final'] = 1;
		//$list_divisi = $this->DivisiModel->get_divisi_bidang($data);
		$data['keterangan'] = $this->input->post('keterangan');
		//$data_angg['sisa_anggaran'] = $list_divisi['sisa_anggaran'] ;
		//$sisa_anggaran = $list_divisi['sisa_anggaran'];
		//$data['sisa_anggaran'] = $sisa_anggaran-$data_harian;


		$res = $this->DisposisiModel->update_final_by_id_disposisi($data);
		$res2 = $this->SuratModel->update_keterangan_by_id($data);
		//$res3 = $this->DivisiModel->update_anggaran_by_id($data);

		$data_log['id_user'] = $session_data['id_user'];
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Update keputusan dengan ID surat " . $result . " dan ID Disposisi " . $data['id_disposisi'];
		$res_log = $this->LogModel->insert($data_log);
	}

	public function tambah_disposisi()
	{
		$data['id_surat'] = $this->input->post('id_surat');
		$res = $this->SuratModel->get_surat_by_id_surat($data);
		if ($res != null) {
			$res2 = $this->submit_disposisi($data['id_surat']);
			echo json_encode($res2);
		} else {
			$session_data = $this->session->userdata('sess_kepala');
			$data_log['id_user'] = $session_data['id_user'];
			$data_log['id_staff'] = $session_data['id_staff'];
			$data_log['aktivitas'] = "Submit disposisi gagal dengan ID surat " . $result;
			$res_log = $this->LogModel->insert($data_log);
			echo json_encode(0);
		}
	}

	public function get_tanda_terima()
	{
		$data['id_surat'] = $this->input->post('id_surat');
		$string_bulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
		$params['data'] = $data['id_surat'];
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH . 'tes.jpg';
		$pengirim = "";
		$perihal = "";
		$tanggal_masuk = "";
		$nama_klasifikasi = "";
		$id_waktu = "";
		$data_surat = $this->SuratModel->get_surat_by_id_surat($data);
		if ($data_surat != null) {
			$pengirim = $data_surat[0]['pengirim'];
			$perihal = $data_surat[0]['jml_harian'];
			$id_waktu = $data_surat[0]['id_waktu'];
			$nama_klasifikasi = $data_surat[0]['nama_klasifikasi'];
			$date = $data_surat[0]['tgl_masuk'];
			$timestamp = strtotime($date);
			$tanggal = date('d', $timestamp);
			$bulan = date('m', $timestamp);
			$tahun = date('Y', $timestamp);

			$tanggal_masuk = $tanggal . " " . $string_bulan[$bulan] . " " . $tahun;
		}
		//$this->load->library('Ciqrcode');
		//$this->ciqrcode->generate($params);

		$this->load->library('word');
		$objPHPWord = new PHPWord();
		//our docx will have 'lanscape' paper orientation
		$document = $objPHPWord->loadTemplate('assets/files/TTS_template.docx');

		//$document->replaceStrToImg("qrcode", "tes.jpg");
		$document->setValue("pengirim", $pengirim);
		$document->setValue("perihal", $perihal);
		$document->setValue("id_waktu", $id_waktu);
		$document->setValue("tanggal_masuk", $tanggal_masuk);
		$document->setValue("nama_klasifikasi", $nama_klasifikasi);

		$filename = "TTS_" . $pengirim . "_" . $data['id_surat'] . ".docx";

		$path = "assets/files/2017";

		if (!is_dir($path)) //create the folder if it's not already exists
		{
			mkdir($path, 0755, TRUE);
		}

		$urlsave = $path . '/' . $filename;
		//$document_xml = $document->get_document_xml();

		$document->save($urlsave);
		//echo $document_xml;

		$session_data = $this->session->userdata('sess_kepala');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['id_staff'] = $session_data['id_staff'];
		$data_log['aktivitas'] = "Print tanda terima surat masuk dengan ID surat " . $data['id_surat'];
		$res_log = $this->LogModel->insert($data_log);


		echo ($urlsave);
	}

	public function get_all_log()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['id_staff'] = $session_data['id_staff'];

		$result = $this->LogModel->get($data);
		echo json_encode($result);
	}
	public function get_log()
	{
		$session_data = $this->session->userdata('sess_kepala');
		$data['id_user'] = $session_data['id_user'];
		$data['bulan'] = $this->input->post('bulan');
		$data['tahun'] = $this->input->post('tahun');
		$result = $this->LogModel->get_log_by_id();
		echo json_encode($result);
	}

	public function logout()
	{

		$this->session->unset_userdata('sess_kepala');

		session_destroy();
		redirect('SignIn', 'refresh');
	}
}
