<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{



	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('sess_admin')) {
			redirect("SignIn", 'refresh');
		}

		$this->load->model('UserModel');
		$this->load->model('MainModel');
		$this->load->model('SipdModel');
		$this->load->model('User');
	}
	public function index()
	{
		//if($this->session->userdata('sess_admin'))
		//{			
		//$session_data = $this->session->userdata('sess_admin');
		//$data = array('datasession' => $session_data );
		//$data['page'] = 'home';
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/main_content', 1, $datacontent);
		//}		
		/*else
		{
			redirect("VerifyLogin",'refresh');
		}*/
	}

	public function settings()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/settings', 1, $datacontent);
	}

	public function daftar_log()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/daftar_log', 1, $datacontent);
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

		$this->template->view('template/absensi/list_staff', 1, $datacontent);
	}

	public function tambah_user()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$datacontent['role'] = $this->UserModel->get_role();
		$datacontent['departments'] = $this->MainModel->get_departments();
		$this->template->view('template/admin/tambah_user', 1, $datacontent);
	}

	public function tambah_menu()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/tambah_menu', 1, $datacontent);
	}

	public function tambah_role()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/tambah_role', 1, $datacontent);
	}

	public function tambah_keterangan()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/tambah_keterangan', 1, $datacontent);
	}

	public function daftar_user()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$datacontent['role'] = $this->UserModel->get_role();
		$datacontent['departments'] = $this->MainModel->get_departments();
		$this->template->view('template/admin/daftar_user', 1, $datacontent);
	}

	public function daftar_menu()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/daftar_menu', 1, $datacontent);
	}

	public function daftar_role()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$daftar_role = $this->UserModel->get_role();
		$datacontent['role'] = $daftar_role;
		$this->template->view('template/admin/daftar_role', 1, $datacontent);
	}

	public function daftar_keterangan()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$daftar_keterangan = $this->MainModel->get_keterangan();
		$datacontent['keteragan'] = $daftar_keterangan;
		$this->template->view('template/admin/daftar_keterangan', 1, $datacontent);
	}

	public function daftar_jenis_undangan()
	{
		$session_data = $this->session->userdata('sess_admin');
		$datacontent['session'] = $session_data;
		$this->template->view('template/admin/daftar_jenis_undangan', 1, $datacontent);
	}

	public function submit_user()
	{
		$data['id_user'] = $this->input->post('id_user');
		$data['nama'] = $this->input->post('nama');
		$data['role'] = $this->input->post('role');
		$data['departments'] = $this->input->post('departments');
		$data['password'] = 123456;
		$id_usermodel = $this->UserModel->insert($data);
		$id_user = $this->User->insert($data);

		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit divisi dengan nama divisi " . $data['nama'] . " dan ID divisi " . $id_divisi;
		$res_log = $this->LogModel->insert($data_log);
		redirect('AdminController/daftar_user');
	}

	public function submit_menu()
	{
		$data['nama_menu'] = $this->input->post('nama_menu');
		$data['harga'] = $this->input->post('harga');
		$insert = $this->MainModel->insert_menu($data);

		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit menu dengan nama menu " . $data['nama_menu'] . " dan harga " . $data['harga'];
		$res_log = $this->LogModel->insert($data_log);
		redirect('AdminController/daftar_user');
	}
	public function update_detail_user()
	{
		$data['id_staff'] = $this->input->post('id_staff');
		$data['id_user'] = $this->input->post('id_user');
		$data['nama'] = $this->input->post('nama');
		$data['id_role'] = $this->input->post('id_role');
		$data['DeptID'] = $this->input->post('DeptID');
		if ($data['id_role'] == 5) {
			$data['nip'] = $this->input->post('nip');
		} else {
			$data['nip'] = "";
		}

		// $data['active'] = $this->input->post('active');

		$res = $this->UserModel->update_staff_by_id($data);
		$res2 = $this->User->update_role_by_id($data);


		// $session_data = $this->session->userdata('sess_admin');
		// $data_log['id_user'] = $session_data['id_user'];
		// $data_log['aktivitas'] = "Update staff dengan ID staff ".$data['id_staff'];
		// $res_log = $this->LogModel->insert($data_log);

		echo json_encode($res);
	}

	public function update_detail_role()
	{
		$data['id_role'] = $this->input->post('id_role');
		$data['nama'] = $this->input->post('nama');

		$res = $this->UserModel->update_role_by_id($data);

		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Update role dengan ID role " . $data['id_role'];
		$res_log = $this->LogModel->insert($data_log);

		echo json_encode($res);
	}

	public function update_detail_keterangan()
	{
		$data['id_keterangan'] = $this->input->post('id_keterangan');
		$data['nama'] = $this->input->post('nama');

		$res = $this->MainModel->update_keterangan_by_id($data);

		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Update keterangan dengan ID keterangan " . $data['id_keterangan'];
		$res_log = $this->LogModel->insert($data_log);

		echo json_encode($res);
	}

	public function get_all_user()
	{
		$result = $this->UserModel->get();
		echo json_encode($result);
	}

	public function get_all_menu()
	{
		$result = $this->MainModel->get_menu();
		echo json_encode($result);
	}

	public function get_all_role()
	{
		$result = $this->UserModel->get_role();
		echo json_encode($result);
	}

	public function get_all_keterangan()
	{
		$result = $this->MainModel->get_keterangan();
		echo json_encode($result);
	}

	public function get_all_jenis_undangan()
	{
		$result = $this->MainModel->get_jenis_undangan();
		echo json_encode($result);
	}

	public function submit_pengguna()
	{
		$data['id_user'] = $this->input->post('id_user');
		$data['nama'] = $this->input->post('nama');
		$data['nip'] = $this->input->post('nip');
		$data['DeptID'] = $this->input->post('DeptID');
		$data['role'] = $this->input->post('role');
		if ($data['role'] == 5) {
			$data['nip'] = $this->input->post('nip');
		} else {
			$data['nip'] = "";
		}
		$data['password'] = 123456;
		$id_staff = $this->UserModel->insert($data);
		$id_user = $this->User->insert($data);
		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit staff dengan ID staff " . $id_staff . " dan ID user " . $id_user;
		$res_log = $this->LogModel->insert($data_log);
		//redirect('AdminController/daftar_user');
	}

	public function submit_role()
	{
		$data['nama'] = $this->input->post('nama');
		$id_role = $this->UserModel->insert_role($data);
		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit role dengan nama role " . $nama . " dan ID user " . $id_user;
		$res_log = $this->LogModel->insert($data_log);
		redirect('AdminController/daftar_role');
	}

	public function submit_keterangan()
	{
		$data['nama'] = $this->input->post('nama');
		$id_keterangan = $this->MainModel->insert_keterangan($data);
		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Submit keteragan dengan nama keterangan " . $nama . " dan ID user " . $id_user;
		$res_log = $this->LogModel->insert($data_log);
		redirect('AdminController/daftar_keterangan');
	}

	public function get_detail_user()
	{
		$data['id_staff'] = $this->input->GET('id_staff');
		$res = $this->UserModel->get_user_by_id($data);
		echo json_encode($res);
	}

	public function get_detail_role()
	{
		$data['id_role'] = $this->input->post('id_role');
		$res = $this->UserModel->get_role_by_id($data);
		echo json_encode($res);
	}

	public function get_all_departments()
	{

		$res['depart'] = $this->UserModel->get_departments();
		echo json_encode($res);
	}

	public function get_detail_keterangan()
	{
		$data['id_keterangan'] = $this->input->post('id_keterangan');
		$res = $this->MainModel->get_keterangan_by_id($data);
		echo json_encode($res);
	}

	public function hapus_role()
	{
		$data['id_role'] = $this->input->post('id_role');
		$result = $this->UserModel->get_role_by_id($data);
		$res = $this->UserModel->delete_role_by_id($data);
		if ($result != null) {
			$session_data = $this->session->userdata('sess_admin');
			$data_log['id_user'] = $session_data['id_user'];
			$data_log['aktivitas'] = "Hapus role dan user dengan ID role " . $data['id_role'] . " dan ID user " . $data['id_user'];
			$res_log = $this->LogModel->insert($data_log);
		}
		echo json_encode($res);
	}

	public function hapus_keterangan()
	{
		$data['id_keterangan'] = $this->input->post('id_keterangan');
		$result = $this->MainModel->get_keterangan_by_id($data);
		$res = $this->MainModel->delete_keterangan_by_id($data);
		if ($result != null) {
			$session_data = $this->session->userdata('sess_admin');
			$data_log['id_user'] = $session_data['id_user'];
			$data_log['aktivitas'] = "Hapus keterangan dan user dengan ID keterangan " . $data['id_keterangan'] . " dan ID user " . $data['id_user'];
			$res_log = $this->LogModel->insert($data_log);
		}
		echo json_encode($res);
	}

	public function hapus_staff()
	{
		$data['id_staff'] = $this->input->post('id_staff');
		$data['id_user'] = $this->input->post('id_user');
		$res = $this->UserModel->delete_staff_by_id($data);
		$res2 = $this->User->delete_user_by_id($data);
		$session_data = $this->session->userdata('sess_admin');
		$data_log['id_user'] = $session_data['id_user'];
		$data_log['aktivitas'] = "Hapus staff dan user dengan ID staff " . $data['id_staff'] . " dan ID user " . $data['id_user'];
		$res_log = $this->LogModel->insert($data_log);

		echo json_encode($res);
	}
	public function change_password()
	{
		$session_data = $this->session->userdata('sess_admin');
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

	public function get_log()
	{
		$data['bulan'] = $this->input->get('bulan');
		$data['tahun'] = $this->input->get('tahun');
		$result = $this->LogModel->get_log_by_tahun_bulan($data);
		echo json_encode($result);
	}
}
