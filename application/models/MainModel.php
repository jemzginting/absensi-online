<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model
{

	public function get_departments()
	{
		$sql = "SELECT * FROM departments ORDER BY  DeptName ASC";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_departments_by_id($data)
	{
		$sql = "SELECT * FROM departments where DeptID =" . $data['DeptID'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_nama_departments_by_id($data)
	{
		$sql = "SELECT DeptName FROM departments where DeptID =" . $data['DeptID'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function get_departments_by_nama($data)
	{
		$sql = "SELECT * FROM departments where DeptName ='" . $data['dept'] . "'";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function ini_laporan_pns_ese($DeptID, $tahun, $bulan, $status_kepegawaian)
	{

		$sql = "SELECT * 
		FROM laporan_bulanan 
		where status_kepegawaian='" . $status_kepegawaian . "' 
		and bulan=" . $bulan . " and tahun =" . $tahun . " 
		and DeptID =" . $DeptID . " 
		and nama_ese !='Non Eselon' ORDER by kode_ese ASC, kode_golongan desc, tmt_pangkat ASC";
		$q = $this->db->query($sql);
		return $q;
	}

	public function ini_laporan_harian_pns_ese($DeptID, $mulai, $status_kepegawaian)
	{

		$sql = "SELECT *, k.nama_keterangan 
		FROM rekap_bulanan r 
		left join keterangan k 
		on r.keterangan = k.id_keterangan 
		where (status_kepegawaian = '" . $status_kepegawaian . "') 
		and (DeptID ='" . $DeptID . "') 
		and (tanggal = '" . $mulai . "') 
		and nama_ese !='Non Eselon' ORDER by kode_ese ASC, kode_golongan desc, tmt_pangkat ASC";
		$q = $this->db->query($sql);
		return $q;
	}

	public function ini_laporan_pribadi_bulanan($DeptID, $userid, $tahun, $bulan, $status_kepegawaian)
	{
		$sql = "SELECT rb.nama_pegawai,rb.nip,rb.tanggal,rb.masuk,rb.pulang,rb.telat,rb.pulang_cepat,k.nama_keterangan
		FROM rekap_bulanan rb
		JOIN keterangan k
		ON rb.keterangan = k.id_keterangan
		where rb.status_kepegawaian= '" . $status_kepegawaian . "' 
		and rb.userid = " . $userid . " 
		and DeptID = " . $DeptID . " 
		and month(rb.tanggal) = " . $bulan . " 
		and year(rb.tanggal) = " . $tahun;

		$q = $this->db->query($sql);
		return $q;
	}


	public function ini_laporan_pns_non_ese($DeptID, $tahun, $bulan, $status_kepegawaian)
	{

		$sql = "SELECT * FROM laporan_bulanan 
		where status_kepegawaian='" . $status_kepegawaian . "' 
		and bulan=" . $bulan . " and tahun =" . $tahun . " 
		and DeptID =" . $DeptID . " 
		and nama_ese ='Non Eselon' ORDER by kode_golongan desc";
		$q = $this->db->query($sql);
		return $q;
	}

	public function ini_laporan_pns_harian_non_ese($DeptID, $mulai, $status_kepegawaian)
	{

		$sql = "SELECT *, k.nama_keterangan 
		FROM rekap_bulanan r 
		left join keterangan k 
		on r.keterangan = k.id_keterangan 
		where (status_kepegawaian = '" . $status_kepegawaian . "') 
		and (DeptID =" . $DeptID . ") and
		(tanggal = '" . $mulai . "')
		and nama_ese = 'Non Eselon' ORDER by kode_golongan desc";
		$q = $this->db->query($sql);
		return $q;
	}

	public function ini_laporan_tkk($DeptID, $tahun, $bulan, $status_kepegawaian)
	{

		$this->db->select('*');
		$this->db->from('laporan_bulanan');
		$this->db->where('tahun', $tahun);
		$this->db->where('bulan', $bulan);
		$this->db->where('status_kepegawaian', $status_kepegawaian);
		$this->db->where('DeptID', $DeptID);
		$this->db->order_by('nama_pegawai', 'ASC');
		$q = $this->db->get();
		return $q;
	}

	public function ini_laporan_tkk_harian($DeptID, $mulai, $status_kepegawaian)
	{

		$sql = "SELECT *, k.nama_keterangan FROM rekap_bulanan r 
		left join keterangan k 
		on r.keterangan = k.id_keterangan 
		where (status_kepegawaian = '" . $status_kepegawaian . "') 
		and (DeptID ='" . $DeptID . "')
		 and (tanggal = '" . $mulai . "' ) 
		 ORDER by nama_pegawai ASC";
		$q = $this->db->query($sql);
		return $q;
	}

	function cek_dokumen($id_daftar_opd_kegiatan_luar, $tipe)
	{
		$this->db->from('dokumen');
		$this->db->where('id_daftar_opd_kegiatan_luar', $id_daftar_opd_kegiatan_luar);
		$this->db->where('tipe', $tipe);
		$this->db->order_by('halaman', 'ASC');
		$hslquery = $this->db->get()->result();
		return $hslquery;
	}

	function simpan_dokumen($id_daftar_opd_kegiatan_luar, $file, $tipe)
	{
		$ini = $this->cek_dokumen($id_daftar_opd_kegiatan_luar, $tipe);
		$hal = count($ini) + 1;
		$this->db->set('id_daftar_opd_kegiatan_luar', $id_daftar_opd_kegiatan_luar);
		$this->db->set('tipe', $tipe);
		$this->db->set('file', $file);
		$this->db->set('halaman', $hal);
		//			$this->db->set('id_reff',$idd);
		$this->db->insert('dokumen');
		$id_dok = $this->db->insert_id();
		return $id_dok;
		/*
			$sqlstr="INSERT INTO r_peg_dokumen (nip_baru,tipe_dokumen,file_thumb,file_dokumen,halaman_item_dokumen,id_reff) 
			VALUES ('$nip_baru','$tipe','thumb_".$nama_file."','$nama_file','$hal','$idd')";		
			$this->db->query($sqlstr);
*/
	}

	function rename_dokumen($idd, $nama)
	{
		$this->db->set('file', $nama);
		$this->db->where('id_daftar_opd_kegiatan_luar', $idd);
		$this->db->update('dokumen');
	}

	public function insert_keterangan($data)
	{
		$sql = "INSERT INTO keterangan (id_keterangan, nama_keterangan) values ('','" . $data['nama'] . "')";
		$result = $this->db->query($sql);
		return $res;
	}

	public function get_keterangan()
	{
		$sql = "SELECT * FROM keterangan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_keterangan_by_id($data)
	{
		$sql = "SELECT * from keterangan where id_keterangan = " . $data['id_keterangan'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function update_keterangan_by_id($data)
	{
		$sql = "UPDATE keterangan set nama_keterangan = '" . $data['nama'] . "' WHERE id_keterangan=" . $data['id_keterangan'];
		$res = $this->db->query($sql);
		return $res;
	}

	public function delete_keterangan_by_id($data)
	{
		$sql = "DELETE from keterangan where id_keterangan=" . $data['id_keterangan'];
		$res = $this->db->query($sql);
		return $res;
	}
}
