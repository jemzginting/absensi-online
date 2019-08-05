<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogModel extends CI_Model {

	public function insert($data)
	{
		$sql = "INSERT INTO log (id_user,aktivitas) values ('".$data['id_user']."','".$data['aktivitas']."')";
		$res = $this->db->query($sql);
		return $res;
	}
	
	public function get_log_by_tahun_bulan($data)
	{
		if($data['bulan']==0)
		{
			$sql = "SELECT * from log where YEAR(tgl_entry) = ".$data['tahun']." ORDER by tgl_entry desc ";
			$res = $this->db->query($sql);
			return $res->result_array();
		}
		else
		{
			$sql = "SELECT * from log where YEAR(tgl_entry) = ".$data['tahun']." and MONTH(tgl_entry) = ".$data['bulan']." ORDER by tgl_entry desc";
			$res = $this->db->query($sql);
			return $res->result_array();
		}
	}
	
	public function get($data)
	{
		$sql = "SELECT * from log where id_staff = ".$data['id_staff']." ORDER by tgl_entry desc";
		//$sql = "SELECT * from log";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

}