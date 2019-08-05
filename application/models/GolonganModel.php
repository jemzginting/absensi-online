<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GolonganModel extends CI_Model {

	public function insert($data)
	{
		$sql = "INSERT INTO golongan (nama_golongan,keterangan_golongan,keterangan_harian) values ('".$data['nama_golongan']."','".$data['keterangan_golongan']."','".$data['keterangan_harian']."')";
		$result = $this->db->query($sql);
		$res = $this->db->insert_id();		
		return $res;
	}
	public function get()
	{
		$sql = "SELECT * from golongan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	public function get_golongan_by_id($data)
	{
		$sql = "SELECT * from golongan where id_golongan = ".$data['id_golongan'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	public function update_golongan_by_id($data)
	{
		$sql = "UPDATE golongan set nama_golongan = '".$data['nama_golongan']."', keterangan_golongan = '".$data['keterangan_golongan']."', keterangan_harian = '".$data['keterangan_harian']."' WHERE id_golongan = ".$data['id_golongan'];
		$res = $this->db->query($sql);
		return $res;
	}
	public function delete_golongan_by_id($data)
	{
		$sql = "DELETE from golongan WHERE id_golongan=".$data['id_golongan'];
		$res = $this->db->query($sql);
		return $res;
	}
}