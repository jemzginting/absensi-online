<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KegiatanModel extends CI_Model {

	public function get_jenis_kegiatan(){
		$sql = "SELECT * FROM jenis_kegiatan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_daftar_kegiatan_luar($data){
		$sql = "SELECT * FROM daftar_kegiatan_luar where month(tanggal)=".$data['bulan']." and year(tanggal)=".$data['tahun'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_daftar_kegiatan_luar_by_department($data){
		$sql = "SELECT * FROM daftar_kegiatan_luar where month(tanggal)=".$data['bulan']." and year(tanggal)=".$data['tahun']." and (department='".$data['department']."' or department='SELURUH')";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_all_daftar_opd_kegiatan_luar($data){
		$sql = "SELECT * FROM daftar_opd_kegiatan_luar where id_daftar_kegiatan_luar=".$data['id_daftar_kegiatan_luar']." ORDER by nama_department asc";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_opd_kegiatan_luar($data){
		$sql = "SELECT * FROM daftar_opd_kegiatan_luar where id_daftar_kegiatan_luar=".$data['id_daftar_kegiatan_luar']." and DeptID=".$data['DeptID'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_all_opd_kegiatan_luar($data){
		$sql = "SELECT * FROM daftar_opd_kegiatan_luar where id_daftar_kegiatan_luar=".$data['id_daftar_kegiatan_luar'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_all_kehadiran_opd($data){
		$sql = "SELECT * FROM kehadiran_opd where id_daftar_opd_kegiatan_luar=".$data['id_daftar_opd_kegiatan_luar'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_kehadiran_opd($data){
		$sql = "SELECT * FROM kehadiran_opd where id_daftar_opd_kegiatan_luar=".$data['id_daftar_opd_kegiatan_luar']." and keterangan = 11";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_kehadiran_opd_izin($data){
		$sql = "SELECT * FROM kehadiran_opd where id_daftar_opd_kegiatan_luar=".$data['id_daftar_opd_kegiatan_luar']." and (keterangan= 1 or keterangan=2)";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_kehadiran_opd_by_id($data){
		$sql = "SELECT * FROM kehadiran_opd where id_daftar_opd_kegiatan_luar=".$data['id_daftar_opd_kegiatan_luar']." and userid=".$data['userid'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function insert_kehadiran($data){
		$this->db->set('userid',$data['userid']);
		$this->db->set('nama_pegawai',$data['nama_pegawai']);
		$this->db->set('keterangan',$data['keterangan']);
		$this->db->set('id_daftar_opd_kegiatan_luar',$data['id_daftar_opd_kegiatan_luar']);
		$this->db->insert('kehadiran_opd');
		$this->db->insert_id();
	}

	public function insert_jadwal_kegiatan_luar($data){
		$this->db->set('nama_kegiatan',$data['nama_kegiatan']);
		$this->db->set('tanggal',$data['tanggal']);
		$this->db->set('department',$data['department']);
		$this->db->insert('daftar_kegiatan_luar');
		$this->db->insert_id();
	}

	public function hapus_kehadiran($data)
	{
		$sql = "DELETE from kehadiran_opd where id_kehadiran_opd=".$data['id_kehadiran_opd'];
		$res = $this->db->query($sql);
		return $res;
	}

	public function insert_opd_kegiatan_luar($data){
		$this->db->set('DeptID',$data['DeptID']);
		$this->db->set('nama_department',$data['nama_department']);
		$this->db->set('id_daftar_kegiatan_luar',$data['id_daftar_kegiatan_luar']);
		$this->db->insert('daftar_opd_kegiatan_luar');
		$this->db->insert_id();
	}

	public function hapus_checkinout($data){
		$this->db->where('checktime',$data['tanggal']);
		$this->db->where('userid',$data['userid']);
		$this->db->where('checktype',$data['checktype']);
		$this->db->delete('checkinout');
	}

	public function get_kegiatan_by_dept($data){
	
		$sql = "SELECT * FROM jadwal_kegiatan_luar where month(tanggal)=".$data['bulan']." and year(tanggal)=".$data['tahun']." and DeptID = ".$data['DeptID'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}
}