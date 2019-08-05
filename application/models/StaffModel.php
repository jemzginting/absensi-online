<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class StaffModel extends CI_Model
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
		$sql = "INSERT INTO staff (id_golongan,nip,id_user,id_divisi,nama) values ('" . $data['id_golongan'] . "','" . $data['nip'] . "','" . $data['id_user'] . "','" . $data['id_divisi'] . "','" . $data['nama'] . "')";
		$result = $this->db->query($sql);
		$res = $this->db->insert_id();
		return $res;
	}

	public function get_staff_by_dept($data)
	{

		$sql = "SELECT rp.nama_pegawai,rp.nip_baru,rp.status_kepegawaian,rp.nama_golongan,rp.nama_pangkat,rp.tmt_pangkat,rp.nomenklatur_jabatan
		FROM adms_db.userinfo u 
		left join appsipd.r_pegawai_aktual rp
		ON u.badgenumber = rp.nip_baru
		where u.defaultdeptid =" . $data['DeptID'] . " AND status_kepegawaian = '" . $data['status'] . "'";

		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function get_staff_by_dept2($data)
	{
		$this->db->select('rp.nama_pegawai,rp.nip_baru,rp.status_kepegawaian,rp.nama_golongan,rp.nama_pangkat,rp.tmt_pangkat,rp.nomenklatur_jabatan');
		$this->db->from('adms_db.userinfo u');
		$this->db2->join('appsipd_appsipd.r_pegawai_aktual rp', 'u.badgenumber = rp.nip_baru', 'Left');
		$this->db->where('u.defaultdeptid', $data['DeptID']);
		$this->db->where('u.status_kepegawaian', $data['status']);
		$res = $this->db->get();
		return $res;
	}


	/*
	public function get_staff_by_dept($data)
	{

		$sql = "SELECT rp.nama_pegawai,rp.nip_baru,rp.status_kepegawaian,rp.nama_golongan,rp.nama_pangkat,rp.tmt_pangkat,rp.nomenklatur_jabatan
		FROM adms_db.userinfo u 
		JOIN appsipd_appsipd.r_pegawai_aktual rp
		ON u.badgenumber = rp.nip_baru
		JOIN adms_db.iclock i
		ON i.SN = u.SN
		WHERE i.SN = '".$data['SN']."' and rp.status_kepegawaian ='".$data['status']."'";

		$res = $this->db2->query($sql);
		return $res->result_array();
	}

	*/

	public function get_all_staff($data)
	{

		$sql = "SELECT * FROM userinfo u left join iclock i on u.SN = i.SN";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_userinfo($data)
	{

		$sql = "SELECT * FROM userinfo where userid = " . $data['userid'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function test($data)
	{
		$this->db->select('*');
		$this->db->from('userinfo u');
		$this->db->join('iclock i', 'u.SN = i.SN');
		$this->db->where('DeptID', $data['DeptID']);
		$res = $this->db->get();
		return $res;
	}

	public function get_test($data)
	{
		$sql = "SELECT * FROM userinfo where badgenumber =" . $data['bagdenumber'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_jamuserinfo_by_nip($data)
	{
		$sql = "SELECT u.defaultdeptid,u.userid,u.name,u.SN,js.*
		FROM userinfo u
		LEFT JOIN jam_shift js
		ON u.badgenumber = js.badgenumber
		WHERE u.badgenumber = " . $data['nip'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_userinfo_by_nip($data)
	{
		$sql = "SELECT * FROM userinfo 
		WHERE badgenumber = " . $data['nip'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_userid_by_nip($data)
	{
		$sql = "SELECT userid FROM userinfo 
		WHERE badgenumber = " . $data['nip'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_golongan()
	{
		$sql = "SELECT * from golongan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_nama($data)
	{
		$sql = "SELECT * from departments where DeptID=" . $data['DeptID'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_jabatan()
	{
		$sql = "SELECT * from jabatan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_status()
	{
		$sql = "SELECT * from status";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_staff_by_id($data)
	{
		$sql = "SELECT  * FROM userinfo where userid =" . $data['userid'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_user_by_id($data)
	{
		$sql = "SELECT staff.*, user.id_role from staff join user on staff.id_user = user.id_user where id_staff = " . $data['id_staff'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_role()
	{
		$sql = "SELECT * FROM role";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_departments()
	{
		$sql = "SELECT * FROM departments";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function update_staff_by_id($data)
	{

		$this->db->set('id_golongan', $data['id_golongan']);
		$this->db->set('id_jabatan', $data['id_jabatan']);
		$this->db->set('id_status', $data['id_status']);
		$this->db->where('userid', $data['userid']);
		$this->db->update('userinfo');
	}




	public function get()
	{
		$sql = "SELECT *, s.nama as nama_pegawai, r.nama as nama_role from staff s join user u on s.id_user = u.id_user join role r on u.id_role = r.id_role join departments d on u.DeptID = d.DeptID";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	// public function get_staff_by_id($data)
	// {
	// 	$sql = "SELECT staff.*, user.id_role from staff join user on staff.id_user = user.id_user where id_staff = ".$data['id_staff'];
	// 	$res = $this->db->query($sql);
	// 	return $res->result_array();
	// }
	// public function update_staff_by_id($data)
	// {
	// 	$sql = "UPDATE staff set id_golongan = '".$data['id_golongan']."', id_divisi = '".$data['id_divisi']."', nama = '".$data['nama']."', nip = '".$data['nip']."' WHERE id_staff=".$data['id_staff'];
	// 	$res = $this->db->query($sql);
	// 	return $res;
	// }
	public function update_staff_nip($data)
	{
		$sql = "UPDATE surat set nip = '" . $data['nip'] . "' WHERE id_staff=" . $data['id_staff'];
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
