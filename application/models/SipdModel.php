<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SipdModel extends CI_Model
{

	private $table = "r_pegawai_aktual";
	private $db2;
	public function __construct()
	{
		// $this->load->database('anjungan', TRUE);
		
		$this->db2 = $this->load->database('sipd_baru', true);
	}

	public function insert($data)
	{
		$sql = "INSERT INTO staff (id_user,nama) values ('" . $data['id_user'] . "','" . $data['nama'] . "')";
		$result = $this->db->query($sql);
		$res = $this->db->insert_id();
		return $res;
	}

	public function get_nip($data)
	{
		$sql = "SELECT * FROM r_pegawai_aktual where nip_baru = " . $data['badgenumber'];
		$res = $this->db2->query($sql);
		return $res->result_array();
	}


	public function get_status_pegawai($data)
	{
		$sql = "SELECT status_kepegawaian FROM r_pegawai_aktual where nip_baru = " . $data;
		$res = $this->db2->query($sql);
		return $res->result_array();
	}

	public function get_nip_by_status($data)
	{
		$sql = "SELECT * FROM r_pegawai_aktual where nip_baru = " . $data['badgenumber'] . " and status_kepegawaian=" . $data['status'];
		$res = $this->db2->query($sql);
		return $res->result_array();
	}

	public function get_all_nip()
	{
		$sql = "SELECT nip_baru FROM r_pegawai_aktual r join m_unor m on r.id_unor = m.id_unor where m.nomenklatur_unor = 'BKPSDM'";
		$res = $this->db2->query($sql);
		return $res->result_array();
	}

	public function get_user_by_id($data)
	{
		$sql = "SELECT staff.*, user.id_role from staff join user on staff.id_user = user.id_user where id_staff = " . $data['id_staff'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	public function update_staff_by_id($data)
	{
		$sql = "UPDATE staff set nama = '" . $data['nama'] . "' WHERE id_staff=" . $data['id_staff'];
		$res = $this->db->query($sql);
		return $res;
	}
	public function delete_staff_by_id($data)
	{
		$sql = "DELETE from staff where id_staff=" . $data['id_staff'];
		$res = $this->db->query($sql);
		return $res;
	}
}

