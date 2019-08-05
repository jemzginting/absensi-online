<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		/*if($this->session->userdata('sess_resepsionis'))
		{
			redirect("ResepsionisController",'refresh');
		}
		else if($this->session->userdata('sess_admin'))
		{
			redirect("AdminController",'refresh');
		}
		else if($this->session->userdata('sess_staff'))
		{
			redirect("StaffController",'refresh');
		}
		else
		{
			redirect("VerifyLogin",'refresh');
		}*/
		/*if(!$this->session->userdata('sess_resepsionis'))
		{
			redirect("VerifyLogin",'refresh');
		}*/
	}
	public function index()
	{
		//if($this->session->userdata('sess_admin'))
		//{			
		//$session_data = $this->session->userdata('sess_admin');
		//$data = array('datasession' => $session_data );
		//$data['page'] = 'home';
		if ($this->session->userdata('sess_absensi')) {
			redirect("AbsensiController", 'refresh');
		} else if ($this->session->userdata('sess_admin')) {
			redirect("Admin", 'refresh');
		} else if ($this->session->userdata('sess_pengelola')) {
			redirect("Operator", 'refresh');
		} else if ($this->session->userdata('sess_personal')) {
			redirect("PersonalController", 'refresh');
		} else {
			redirect("SignIn", 'refresh');
		}
		//$this->template->view('template/resepsionis/main_content',2);
		//}		
		/*else
		{
			redirect("VerifyLogin",'refresh');
		}*/
	}

	function ini_laporan($DeptID = false, $tahun = false, $bulan = false)
	{
		$result = $this->MainModel->ini_laporan($DeptID, $tahun, $bulan);
		return $result;
	}


	public function logout()
	{
		$id_user = "";
		if ($this->session->userdata('sess_keuangan')) {
			$session_data = $this->session->userdata('sess_keuangan');
			$id_user = $session_data['id_user'];
			$id_staff = $session_data['id_staff'];
			$this->session->unset_userdata('sess_keuangan');
		} else if ($this->session->userdata('sess_admin')) {
			$session_data = $this->session->userdata('sess_admin');
			$id_user = $session_data['id_user'];
			$id_staff = $session_data['id_staff'];
			$this->session->unset_userdata('sess_admin');
		}

		$data_log['id_user'] = $id_user;
		$data_log['aktivitas'] = "Logout dari sistem";
		$res_log = $this->LogModel->insert($data_log);
		session_destroy();
		redirect('SignIn', 'refresh');
	}
}
