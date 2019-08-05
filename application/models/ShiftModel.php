<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ShiftModel extends CI_Model
{

	public function tampil_nip_nama($data)
	{
		$this->db->select('badgenumber,name');
		$dept = (int)$data['DeptID'];
		$this->db->where('defaultdeptid', $dept);
		$res = $this->db->get('userinfo');
		return $res->result_array();
	}

	public function tampil_nip_nama2($data)
	{

		$sql = "SELECT u.badgenumber,rp.nama_pegawai as name,js.jam_masuk
		  FROM adms_db.userinfo u
		  LEFT JOIN adms_db.jam_shift js
		  ON u.badgenumber = js.badgenumber
			JOIN appsipd.r_pegawai_aktual rp
			ON u.badgenumber = rp.nip_baru
		  WHERE u.defaultdeptid =" . $data['DeptID'] . " AND js.jam_masuk is null ORDER BY name asc";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function get_tanggal_absen($data)
	{
		$sql = "SELECT DISTINCT date(c.checktime) as tanggal
		FROM checkinout c 
    RIGHT JOIN userinfo u
    ON c.userid = u.userid
    WHERE  date(c.checktime) NOT IN
				(SELECT tanggal 
				 FROM rekap_bulanan WHERE DeptID =" . $data . " ) 
				 AND month(c.checktime)>02 AND year(c.checktime)>2018 AND u.defaultdeptid =" . $data . " AND date(c.checktime) < CURDATE() order by tanggal desc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function get_ulang_tanggal_absen($data)
	{
		$sql = "SELECT DISTINCT tanggal FROM rekap_bulanan WHERE DeptID =" . $data . " order by tanggal desc";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_jam_sekolah()
	{
		$this->db->select('*');
		$res = $this->db->get('jam_sekolah');
		return $res->result_array();
	}


	public function ambil_jam_sekolah($status)
	{

		$sql = "SELECT jam_masuk, jam_pulang,kategori_hari
		  from jam_sekolah	
		  where status = '" . $status . "'";
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function ambil_jam_opd($status)
	{

		$sql = "SELECT jam_masuk, jam_pulang,kategori_hari
		  from jam_opd	
		  where status = '" . $status . "'";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function tambah_jam_guru($data)
	{
		$this->db->set('badgenumber', $data['nip']);
		$this->db->set('DeptID', $data['DeptID']);
		$this->db->set('jam_masuk', $data['jam_masuk']);
		$this->db->set('jam_keluar', $data['jam_pulang']);
		$this->db->set('status', $data['status']);
		$this->db->set('keterangan', $data['kategori_hari']);
		$this->db->insert('jam_shift');
		$this->db->insert_id();
	}


	public function tambah_shift($data)
	{
		$this->db->set('badgenumber', $data['nip']);
		$this->db->set('DeptID', $data['DeptID']);
		$this->db->set('start_date', $data['start_date']);
		$this->db->set('end_date', $data['end_date']);
		$this->db->set('jam_masuk', $data['jam_masuk']);
		$this->db->set('jam_keluar', $data['jam_pulang']);
		$this->db->set('status', $data['status']);
		$this->db->insert('jam_shift');
		$this->db->insert_id();
	}


	public function get_user_shift($data)
	{
		$sql = "SELECT DISTINCT js.badgenumber,js.start_date,js.end_date,js.jam_masuk,js.jam_keluar,js.status,rp.nama_pegawai as nama_user
        from adms_db.jam_shift js 
				join appsipd.r_pegawai_aktual rp
				ON js.badgenumber = rp.nip_baru
        WHERE DeptID=" . $data['DeptID'] . "  
        ORDER by nama_user ASC";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_jam_opd($data)
	{
		$sql = "SELECT js.id_shift, js.badgenumber, js.jam_masuk, js.jam_keluar,js.status,js.keterangan,rp.nama_pegawai as nama_user
        from jam_shift js 
				join appsipd.r_pegawai_aktual rp
				ON js.badgenumber = rp.nip_baru
        WHERE DeptID=" . $data['DeptID'] . "  
        ORDER by nama_user ASC";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_user_guru($data)
	{
		$sql = "SELECT DISTINCT js.badgenumber,js.status,rp.nama_pegawai as nama_user
        from jam_shift js 
				join appsipd.r_pegawai_aktual rp
				ON js.badgenumber = rp.nip_baru
        WHERE DeptID=" . $data['DeptID'] . "  
        ORDER by nama_user ASC";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_shift_by_id($id_shift)
	{
		$sql = "SELECT u.name,js.*
		from jam_shift js
		 join userinfo u
		 on js.badgenumber = u.badgenumber 
		 where js.id_shift = " . $id_shift;
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function deleteAll($ids)
	{
		$this->db->where_in('badgenumber', explode(",", $ids));
		$this->db->delete('jam_shift');
	}

	public function update_shift_by_id($data)
	{
		$sql = "UPDATE jam_shift 
        set start_date = '" . $data['start_date'] . "',  
        end_date = '" . $data['end_date'] . "',  
        jam_masuk = '" . $data['jam_masuk'] . "',  
        jam_keluar = '" . $data['jam_keluar'] . "',  
        status = '" . $data['status'] . "'
        WHERE id_shift = " . $data['id_shift'];
		$res = $this->db->query($sql);
		return $res;
	}


	public function hapus_jamsekolah($data)
	{
		$this->db->where('badgenumber', $data);
		$this->db->delete('jam_shift');
	}

	public function update_jamsekolah_by_id($data)
	{
		$sql = "UPDATE jam_shift 
        set jam_masuk = '" . $data['jam_masuk'] . "',  
        jam_keluar = '" . $data['jam_keluar'] . "',  
        status = '" . $data['status'] . "'
        WHERE id_shift = " . $data['id_shift'];
		$res = $this->db->query($sql);
		return $res;
	}

	public function delete_shift_by_id($data)
	{
		$sql = "DELETE from jam_shift where badgenumber=" . $data;
		$res = $this->db->query($sql);
		return $res;
	}
}
