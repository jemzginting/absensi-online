<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{

	public function insert($data)
	{
		$sql = "INSERT INTO staff (id_user,nama) values ('" . $data['id_user'] . "','" . $data['nama'] . "')";
		$result = $this->db->query($sql);
		$res = $this->db->insert_id();
		return $res;
	}

	public function insert_role($data)
	{
		$sql = "INSERT INTO role (id_role, nama) values ('','" . $data['nama'] . "')";
		$result = $this->db->query($sql);
		return $res;
	}

	public function get_role()
	{
		$sql = "SELECT * FROM role";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_departments()
	{
		$sql = "SELECT DeptID, DeptName as departments From departments order by DeptName asc";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_role_by_id($data)
	{
		$sql = "SELECT * from role where id_role = " . $data['id_role'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function delete_role_by_id($data)
	{
		$sql = "DELETE from role where id_role=" . $data['id_role'];
		$res = $this->db->query($sql);
		return $res;
	}

	public function update_role_by_id($data)
	{
		$sql = "UPDATE role set nama = '" . $data['nama'] . "' WHERE id_role=" . $data['id_role'];
		$res = $this->db->query($sql);
		return $res;
	}

	public function get()
	{
		$sql = "SELECT *,s.nama as nama_user, r.nama as nama_role, d.DeptName as DeptName 
		from staff s join user u 
		on s.id_user = u.id_user 
		join role r on u.id_role = r.id_role 
		join departments d on u.DeptID = d.DeptID 
		ORDER by nama_role ASC";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_user_by_id($data)
	{
		$sql = "SELECT staff.*, user.id_role, user.DeptID, user.active, user.nip from staff join user on staff.id_user = user.id_user 
		where id_staff = " . $data['id_staff'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	// public function update_staff_by_id($data)
	// {
	// 	$sql = "UPDATE staff set nama = '".$data['nama']."' WHERE id_staff=".$data['id_staff'];
	// 	$res = $this->db->query($sql);
	// 	return $res;
	// }
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
