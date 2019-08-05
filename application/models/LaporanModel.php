<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanModel extends CI_Model
{

	public function get_rekap_absensi_bulanan($data)
	{

		// $sql = "SELECT *,u.name as nama_pegawai FROM `departments`d inner join iclock i on d.DeptID=i.DeptID inner join checkinout c on i.SN=c.SN inner join userinfo u on u.userid = c.userid WHERE (d.DeptID ='".$data['DeptID']."' or supdeptid ='".$data['DeptID']."') and (month(c.checktime)=".$data['bulan']." and year(c.checktime)=".$data['tahun'].") ORDER by checktime asc";

		$sql = "SELECT * FROM userinfo u left join iclock i on u.SN = i.SN where DeptID =" . $data['DeptID'] . " and id_status =" . $data['id_status'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_absensi_bulanan_by_userid($data)
	{

		// $sql = "SELECT *,u.name as nama_pegawai FROM `departments`d inner join iclock i on d.DeptID=i.DeptID inner join checkinout c on i.SN=c.SN inner join userinfo u on u.userid = c.userid WHERE (d.DeptID ='".$data['DeptID']."' or supdeptid ='".$data['DeptID']."') and (month(c.checktime)=".$data['bulan']." and year(c.checktime)=".$data['tahun'].") ORDER by checktime asc";

		$sql = "SELECT * FROM userinfo u inner join iclock i on u.SN = i.SN where DeptID =" . $data['DeptID'] . " and userid =" . $data['userid'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_laporan_by_bulan_tahun($data)
	{
		$sql = "SELECT * FROM laporan_bulanan where bulan=" . $data['bulan'] . " and tahun =" . $data['bulan'] . " and DeptID =" . $data['DeptID'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_laporan_pns_by_bulan_tahun($data)
	{
		if ($data['status'] == "pns") {
			$sql = "SELECT * FROM laporan_bulanan where status_kepegawaian='" . $data['status'] . "' and bulan=" . $data['bulan'] . " and tahun =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " ORDER by kode_ese ASC, kode_golongan desc, tmt_pangkat ASC";
		} else {
			$sql = "SELECT * FROM laporan_bulanan where status_kepegawaian='" . $data['status'] . "' and bulan=" . $data['bulan'] . " and tahun =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " ORDER by nama_pegawai ASC";
		}

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	// public function get_laporan_tkk_by_bulan_tahun($data)
	// {
	// 	$sql = "SELECT * FROM laporan_bulanan where status_kepegawaian='".$data['status']."' and bulan=".$data['bulan']." and tahun =".$data['tahun']." and DeptID =".$data['DeptID']." ORDER by nama_pegawai ASC";

	// 	$res = $this->db->query($sql);
	// 	return $res->result_array();
	// }

	public function cek_laporan2($data)
	{
		$sql = "SELECT * FROM laporan_bulanan where bulan=" . $data['bulan'] . " AND tahun =" . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_laporan($data)
	{
		$sql = "SELECT userid,nip 
		FROM laporan_bulanan 
		where DeptID=" . $data['DeptID'] . " 
		AND bulan=" . $data['bulan'] . "
		 AND tahun =" . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_laporan_deptid($data)
	{
		$sql = "SELECT userid,nama_pegawai,nip,jumlah_hari,jumlah_hadir,jlh_telat,pulang_cepat,sakit,izin,cuti,tl,tk,persen_hadir,persen_potongan
		 FROM laporan_bulanan 
		 where DeptID =" . $data['DeptID'] . " 
		 AND status_kepegawaian = '" . $data['status'] . "' 
		 AND bulan=" . $data['bulan'] . " AND tahun =" . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function cek_keterangan_userid($data)
	{
		$sql = "SELECT keterangan FROM rekap_bulanan where userid=" . $data['userid'] . " AND month(tanggal)=" . $data['bulan'] . " AND year(tanggal) =" . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function cek_rekap_by_userid($data)
	{
		$sql = "SELECT * FROM rekap_bulanan where month(tanggal)=" . $data['bulan'] . " and year(tanggal) =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " and userid =" . $data['userid'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function tambah_laporan($data)
	{
		$this->db->set('nama_pegawai', $data['nama_pegawai']);
		$this->db->set('nip', $data['nip_baru']);
		$this->db->set('DeptID', $data['DeptID']);
		$this->db->set('tahun', $data['tahun']);
		$this->db->set('bulan', $data['bulan']);
		$this->db->set('userid', $data['userid']);
		$this->db->set('jumlah_hari', $data['jumlah_kerja']);
		$this->db->set('jumlah_hadir', $data['jumlah_hadir']);
		$this->db->set('sakit', $data['sakit']);
		$this->db->set('izin', $data['izin']);
		$this->db->set('cuti', $data['cuti']);
		$this->db->set('tl', $data['tl']);
		$this->db->set('tk', $data['tk']);
		$this->db->set('nama_golongan', $data['nama_golongan']);
		$this->db->set('kode_golongan', $data['kode_golongan']);
		$this->db->set('nama_ese', $data['nama_ese']);
		$this->db->set('kode_ese', $data['kode_ese']);
		$this->db->set('tmt_pangkat', $data['tmt_pangkat']);
		$this->db->set('nama_jabatan', $data['nama_jabatan']);
		$this->db->set('status_kepegawaian', $data['status_kepegawaian']);
		$this->db->set('persen_hadir', $data['persen']);
		$this->db->insert('laporan_bulanan');
		$this->db->insert_id();
	}

	public function update_laporan($data)
	{
		$this->db->set('sakit', $data['sakit']);
		$this->db->set('izin', $data['izin']);
		$this->db->set('cuti', $data['cuti']);
		$this->db->set('tl', $data['tugas_lain']);
		$this->db->set('tk', $data['tk']);
		$this->db->set('jlh_telat', $data['jlh_telat']);
		$this->db->set('pulang_cepat', $data['pulang_cepat']);
		$this->db->set('jumlah_hari', $data['jumlah_hari_kerja']);
		$this->db->set('jumlah_hadir', $data['jumlah_hadir']);
		$this->db->set('persen_hadir', $data['persen']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tahun', $data['tahun']);
		$this->db->where('bulan', $data['bulan']);
		$this->db->update('laporan_bulanan');
	}

	public function update_laporan2($data)
	{
		$this->db->set('sakit', $data['sakit']);
		$this->db->set('izin', $data['izin']);
		$this->db->set('cuti', $data['cuti']);
		$this->db->set('tl', $data['tugas_lain']);
		$this->db->set('tk', $data['tk']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tahun', $data['tahun']);
		$this->db->where('bulan', $data['bulan']);
		$this->db->update('laporan_bulanan');
	}

	public function copy_datalengkap_bulanan($bulan, $tahun, $dept)
	{
		$sql = "REPLACE INTO laporan_bulanan(userid,DeptID,nama_pegawai,nama_golongan,kode_golongan,tmt_pangkat,nama_ese,kode_ese,bulan,tahun,status_kepegawaian,nip,nama_jabatan) 
		SELECT u.userid,u.defaultdeptid,rp.nama_pegawai,rp.nama_golongan,rp.kode_golongan,rp.tmt_pangkat,rp.nama_ese,rp.kode_ese," . $bulan . "," . $tahun . ",rp.status_kepegawaian,u.badgenumber,rp.nomenklatur_jabatan 
		FROM adms_db.userinfo u
		join appsipd.r_pegawai_aktual rp
		where u.badgenumber = rp.nip_baru AND u.defaultdeptid = " . $dept;
		$res = $this->db->query($sql);
		//return $res->result_array();
	}

	public function update_rekap($bln, $thn, $dept)
	{
		$sql = "CALL update_rekap_sebulan($bln, $thn, $dept);";
		$sql2 = "CALL update_rekap_sebulan2($bln, $thn, $dept);";
		$sql3 = "CALL update_rekap_sebulan3($bln, $thn, $dept);";

		$res = $this->db->query($sql);
		$res = $this->db->query($sql2);
		$res = $this->db->query($sql3);
	}

	public function update_tambah_potongan($bln, $thn, $dept)
	{
		$sql = "CALL update_rekap_sebulan6($bln, $thn, $dept);";
		$res = $this->db->query($sql);
	}

	public function get_keterangan_by_id($data)
	{
		$sql = "SELECT * from keterangan where id_keterangan=" . $data['keterangan'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_nama_golongan($data)
	{
		$sql = "SELECT * from golongan where id_golongan=" . $data['id_golongan'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_nama_jabatan($data)
	{
		$sql = "SELECT * from jabatan where id_jabatan=" . $data['id_jabatan'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_jumlah_hadir($data)
	{
		$sql = "SELECT count(userid) as jlh_hadir FROM rekap_bulanan where userid = " . $data['userid'] . " and month(tanggal) = " . $data['bulan'] . " and year(tanggal) = " . $data['tahun'] . " and masuk != 0 and pulang != 0";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_detail_pns_by_tahun_bulan($data)
	{

		// $sql = "SELECT * FROM `departments`d inner join iclock i on d.DeptID=i.DeptID inner join checkinout c on i.SN=c.SN inner join userinfo u on u.userid = c.userid WHERE c.userid =".$data['userid']." and month(c.checktime) = ".$data['bulan']." and year(c.checktime) = ".$data['tahun'];
		$sql = "SELECT * FROM rekap_bulanan where userid =" . $data['userid'] . " and month(tanggal) =" . $data['bulan'] . " and year(tanggal) =" . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_pns_by_tahun_bulan($data)
	{

		$sql = "SELECT * FROM rekap_bulanan WHERE (DeptID ='" . $data['DeptID'] . "') and (day(tanggal) between " . $data['hari_mulai'] . " and " . $data['hari_sampai'] . ") and (month(tanggal) between " . $data['bulan_mulai'] . " and " . $data['bulan_sampai'] . ") and (year(tanggal) between " . $data['tahun_mulai'] . " and " . $data['tahun_sampai'] . ") ORDER by tanggal asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	// public function get_rekap_pns_by_tahun_bulan($data)
	// { 

	// 	$sql = "SELECT * FROM `departments`d inner join iclock i on d.DeptID=i.DeptID inner join checkinout c on i.SN=c.SN inner join userinfo u on u.userid = c.userid WHERE (d.DeptID ='".$data['DeptID']."' or supdeptid ='".$data['DeptID']."') and (day(c.checktime) between ".$data['hari_mulai']." and ".$data['hari_sampai'].") and (month(c.checktime) between ".$data['bulan_mulai']." and ".$data['bulan_sampai'].") and (year(c.checktime) between ".$data['tahun_mulai']." and ".$data['tahun_sampai'].") ORDER by checktime asc";

	// 	$res = $this->db->query($sql);
	// 	return $res->result_array();

	// }
	public function get_departments()
	{
		$sql = "SELECT * from departments";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_keterangan1()
	{
		$sql = "SELECT * from keterangan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function hitung_jumlah_hari($data)
	{
		$sql = "SELECT count(DISTINCT tanggal) as jumlah_hari
		from rekap_bulanan 
		where DeptID = " . $data['DeptID'] . " 
		and month(tanggal) = " . $data['bulan'] . " 
		and year(tanggal) = " . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function hitung_keterangan($data)
	{
		$sql = "SELECT count(keterangan) as jlh_ket FROM rekap_bulanan where userid = " . $data['userid'] . " and month(tanggal) = " . $data['bulan'] . " and year(tanggal) = " . $data['tahun'] . " and keterangan =" . $data['keterangan'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function hitung_telat($data)
	{
		$sql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(telat))) as telat from rekap_bulanan where userid = " . $data . " AND keterangan<1 OR keterangan>9";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function hitung_jlh_telat($data, $bulan, $tahun)
	{
		$sql = "SELECT count(telat) as jlh_telat from rekap_bulanan where userid=" . $data . " AND (keterangan<1 OR keterangan=10) AND month(tanggal)= '" . $bulan . "' AND year(tanggal)='" . $tahun . "' AND telat != '00:00:00' ";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function hitung_jlh_pc($data, $bulan, $tahun)
	{
		$sql = "SELECT count(pulang_cepat) as pulang_cepat from rekap_bulanan where userid=" . $data . " AND (keterangan<1 OR keterangan=10) AND month(tanggal)= '" . $bulan . "' AND year(tanggal)='" . $tahun . "' AND pulang_cepat != '00:00:00' ";

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function get_checkinout($data)
	{

		$sql = "SELECT * FROM checkinout WHERE (day(checktime) between " . $data['hari_mulai'] . " and " . $data['hari_sampai'] . ") and (month(checktime) between " . $data['bulan_mulai'] . " and " . $data['bulan_sampai'] . ") and (year(checktime) between " . $data['tahun_mulai'] . " and " . $data['tahun_sampai'] . ") ORDER by checktime asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_checkinout_by_tahun_bulan($data)
	{

		$sql = "SELECT * FROM checkinout WHERE month(checktime) = " . $data['bulan'] . " and year(checktime) = " . $data['tahun'] . " ORDER by checktime asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function update_masuk($data)
	{

		$this->db->set('masuk', $data['masuk']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}

	public function update_pulang($data)
	{
		$this->db->set('pulang', $data['pulang']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}

	public function update_keterangan_by($data)
	{
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}

	public function get_keterangan($data)
	{
		$this->db->select('keterangan');
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$res = $this->db->get('rekap_bulanan');
		// $sql = "SELECT keterangan FROM rekap_bulanan where userid =".$data['userid']." and keterangan =".$data['tanggal'];
		// $res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_statistik_pegawai_bulanan($data)
	{
		$sql = "SELECT SUM(sakit) as jlh_sakit, SUM(cuti) as jlh_cuti, SUM(tk) as jlh_tk, 
		SUM(tl) as jlh_tl, SUM(jlh_telat) as jlh_telat, SUM(pulang_cepat) as jlh_cpt, SUM(izin) as jlh_izin
		from laporan_bulanan 
		where bulan=" . $data['bulan'] . " and tahun =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " AND status_kepegawaian = '" . $data['status'] . "'";

		$res = $this->db->query($sql);

		return $res->result_array();
	}

	public function get_pegawai_max_telat($data)
	{
		$sql = "SELECT  nama_pegawai, jlh_telat
		FROM laporan_bulanan 
		where bulan=" . $data['bulan'] . " and tahun =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " AND 
		status_kepegawaian = '" . $data['status'] . "' AND jlh_telat > 0
		order by jlh_telat desc 
		limit 5 ";

		$res = $this->db->query($sql);

		return $res->result_array();
	}


	public function get_pegawai_max_tk($data)
	{
		$sql = "SELECT nama_pegawai, tk as jlh_tk
		FROM laporan_bulanan 
		where bulan=" . $data['bulan'] . " and tahun =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " AND 
		status_kepegawaian = '" . $data['status'] . "' AND tk > 0
		order by jlh_tk desc
		limit 5";

		$res = $this->db->query($sql);

		return $res->result_array();
	}

	public function get_statistik_pegawai_tahunan($data)
	{
		$sql = "SELECT bulan as bln, SUM(sakit) as jlh_sakit, SUM(cuti) as jlh_cuti, SUM(tk) as jlh_tk, 
		SUM(tl) as jlh_tl, SUM(jlh_telat) as jlh_telat, SUM(pulang_cepat) as jlh_cpt, SUM(izin) as jlh_izin
		from laporan_bulanan 
		where bulan=" . $data['bulan'] . " and tahun =" . $data['tahun'] . " and DeptID =" . $data['DeptID'] . " AND status_kepegawaian = '" . $data['status'] . "'";

		$res = $this->db->query($sql);

		return $res->result_array();
	}

	public function hapus_rekap_bulanan($bln, $thn, $dept)
	{
		$this->db->where('DeptID', $dept);
		$this->db->where('bulan', $bln);
		$this->db->where('tahun', $thn);
		$this->db->delete('laporan_bulanan');
	}
}
