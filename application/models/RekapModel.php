<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RekapModel extends CI_Model
{

	public function get_rekap_absensi_bulanan($data)
	{
		$sql = "SELECT * FROM userinfo u left join iclock i on u.SN = i.SN 
		where DeptID =" . $data['DeptID'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_absensi_bulananXXX($data)
	{
		$sql = "SELECT cin.*,u.name,u.badgenumber,u.defaultdeptid
		FROM  checkinout cin
		LEFT JOIN userinfo u
		ON cin.userid = u.userid
		WHERE (day(checktime) = " . $data['hari_mulai'] . ") 
		and (month(checktime) = " . $data['bulan_mulai'] . " ) 
		and (year(checktime) = " . $data['tahun_mulai'] . " ) 
		and u.defaultdeptid=" . $data['DeptID'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_absensi_bulanan_by_userid($data)
	{
		$sql = "SELECT * FROM userinfo u inner join iclock i on u.SN = i.SN where DeptID =" . $data['DeptID'] . " and userid =" . $data['userid'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_by_depid($DeptID, $tahun, $bulan)
	{
		$sql = "SELECT * FROM rekap_bulanan where month(tanggal)=" . $bulan . " and year(tanggal) =" . $tahun . " and DeptID =" . $DeptID;

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function update_keterangan_gagal_server($data)
	{
		$sql = "UPDATE rekap_bulanan rb
		SET rb.keterangan = 16,
		  rb.telat = CASE             
			 WHEN rb.masuk > '00:00:00' THEN rb.telat
             ELSE '00:00:00'
            END,            
		  rb.pulang_cepat = CASE
             WHEN rb.pulang > '00:00:00' THEN rb.pulang_cepat 
			 ELSE '00:00:00'
            END,            
		  rb.persen_telat = CASE             
             WHEN rb.masuk > '00:00:00' THEN rb.persen_telat
			 ELSE '00:00:00'
            END,         
		  rb.persen_pc = CASE
             WHEN rb.pulang > '00:00:00'  THEN rb.persen_pc
			 ELSE 0.00
            END
		WHERE rb.DeptID=" . $data['DeptID'] . " AND rb.userid =" . $data['userid'] . " AND rb.tanggal = '" . $data['tanggal'] . "'";
		$res = $this->db->query($sql);
	}

	public function cek_rekap($data, $dept)
	{
		$sql = "SELECT userid FROM rekap_bulanan where tanggal='" . $data . "' AND DeptID =" . $dept;

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function cek_rekap_bulan_tahun($data)
	{
		$sql = "SELECT userid 
		FROM rekap_bulanan 
		where DeptID =" . $data['DeptID'] . " AND month(tanggal)='" . $data['bulan'] . "' AND year(tanggal) ='" . $data['tahun'] . "'";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function ubah_keterangan2($dept, $tgl)
	{
		$sql = "UPDATE rekap_bulanan rb
		JOIN izin_ket ik
		ON rb.userid = ik.userid
		SET rb.keterangan = ik.keterangan,
		  rb.telat = CASE
             WHEN ik.keterangan = 7 AND rb.masuk > '10:00:00' THEN timediff(rb.masuk,'10:00:00')
			 WHEN ik.keterangan = 16 AND rb.masuk > '00:00:00' THEN rb.telat
             ELSE '00:00:00'
            END,            
		  rb.pulang_cepat = CASE
             WHEN ik.keterangan != 7 OR ik.keterangan !=8 OR (ik.keterangan = 16 AND rb.pulang = '00:00:00') THEN '00:00:00'
			 ELSE rb.pulang_cepat  
            END,            
		  rb.persen_telat = CASE
             WHEN ik.keterangan = 7 OR ik.keterangan =8 AND rb.masuk > '10:00:00'			 
			 THEN (SELECT persentase FROM persen_potongan WHERE timediff(rb.masuk,'10:00:00')>=uraian1 AND timediff(rb.masuk,'10:00:00')<=uraian2)
             WHEN ik.keterangan = 16 AND rb.masuk > '00:00:00' THEN rb.persen_telat
			 ELSE '00:00:00'
            END,         
		  rb.persen_pc = CASE
             WHEN ik.keterangan != 7 OR ik.keterangan !=8 OR (ik.keterangan = 16 AND rb.pulang = '00:00:00')  THEN 0.00
			 ELSE rb.persen_pc  
            END
		WHERE ik.DeptID =" . $dept . " AND rb.DeptID=" . $dept . " AND ik.keterangan !=0 AND rb.tanggal = '" . $tgl . "' AND ik.tanggal = '" . $tgl . "'";
		$res = $this->db->query($sql);
	}

	public function ubah_keterangan3($dept, $tgl)
	{
		$sql = "UPDATE rekap_bulanan rb
		SET rb.total_persen = CASE
		WHEN rb.keterangan = 10 THEN 5.00
		ELSE if(rb.persen_telat + rb.persen_pc > 5.00, 5.00, rb.persen_telat + rb.persen_pc) END
		WHERE rb.DeptID =" . $dept . " AND rb.tanggal = '" . $tgl . "' AND rb.keterangan !=0";
		$res = $this->db->query($sql);
	}

	public function ubah_keteranganx($dept, $tgl)
	{
		$sql = "CALL update_keterangan($dept,'$tgl')";
		$res = $this->db->query($sql);
	}

	public function ubah_keterangan($dept, $tgl)
	{
		$sql = "CALL update_rekap_keterangan('$tgl',$dept)";
		$res = $this->db->query($sql);
	}

	public function cek_keterangan($userid, $tgl_skrg)
	{
		$sql = "SELECT keterangan FROM izin_ket 
		where userid=" . $userid . " 
		AND tanggal = '" . $tgl_skrg . "'";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_rekap_by_userid($data)
	{
		$sql = "SELECT * FROM rekap_bulanan 
		where month(tanggal)=" . $data['bulan_mulai'] . " and year(tanggal) =" . $data['tahun_mulai'] . " 
		and userid =" . $data['userid'] . " and DeptID =" . $data['DeptID'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function cek_rekap_by_DeptId($data)
	{
		$sql = "SELECT * FROM rekap_bulanan 
		where  month(tanggal)=" . $data['bulan_mulai'] . " and year(tanggal) =" . $data['tahun_mulai'] . " 
		 and DeptID =" . $data['DeptID'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_rekap_tgl_by_DeptId($data)
	{
		$sql = "SELECT rb.userid, rb.nama_pegawai, rb.nip, rb.tanggal, rb.masuk, rb.pulang, rb.telat,
		rb.pulang_cepat, rb.total_persen, k.nama_keterangan
		FROM rekap_bulanan rb
		LEFT JOIN keterangan k
		ON rb.keterangan = k.id_keterangan
		where rb.tanggal='" . $data['tgl_input'] . "' 
				and rb.DeptID =" . $data['DeptID'] . " 
				and rb.status_kepegawaian ='" . $data['status'] . "' ORDER BY rb.nama_pegawai asc";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_kategori_DeptId($dept)
	{
		$sql = "SELECT kategori
		FROM  departments
		WHERE DeptID =" . $dept;
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_masuk_pulang($data)
	{
		$sql = "SELECT userid FROM rekap_bulanan 
		where date(tanggal)='" . $data['tanggal_sekarang'] . "' and (time(masuk)= '00:00:00' OR time(pulang)='00:00:00')";
		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function cek_rekap_by_userid_tanggal($data)
	{
		$this->db->select('*');
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('DeptID', $data['DeptID']);
		$res = $this->db->get('rekap_bulanan');
		return $res->result_array();
	}

	public function tambah_rekap($data)
	{
		$this->db->set('tanggal', $data['tanggal']);
		$this->db->set('DeptID', $data['DeptID']);
		$this->db->set('nama_pegawai', $data['nama_pegawai']);
		$this->db->set('nip', $data['nip_baru']);
		$this->db->set('userid', $data['userid']);
		$this->db->set('status_kepegawaian', $data['status_kepegawaian']);
		$this->db->set('kode_golongan', $data['kode_golongan']);
		$this->db->set('kode_ese', $data['kode_ese']);
		$this->db->set('nama_ese', $data['nama_ese']);
		$this->db->set('tmt_pangkat', $data['tmt_pangkat']);
		$this->db->insert('rekap_bulanan');
		$this->db->insert_id();
	}

	public function get_jenis_keterangan()
	{
		$sql = "SELECT * from keterangan where id_keterangan != 0 AND id_keterangan != 10";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function copy_userinfo_rekap()
	{
		$sql = "REPLACE INTO rekap_bulanan(userid,DeptID,nama_pegawai,nip,tanggal) 
		SELECT userid,defaultdeptid,name,badgenumber,CURDATE() 
		FROM userinfo";
		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function copy_datalengkap_rekap($tgl_skrg, $dept)
	{
		$sql = "CALL copy_rekap_bulan('$tgl_skrg',$dept)";
		$res = $this->db->query($sql);
		//return $res->result_array();
	}

	//ini untuk tes tanggal lain(sementara)
	public function copy_datalengkap_rekapx($tgl_skrg, $dept)
	{
		$sql = "REPLACE INTO rekap_bulanan(userid,DeptID,nama_pegawai,nip,tanggal,status_kepegawaian,kode_golongan,tmt_pangkat,kode_ese,nama_ese) 
		SELECT u.userid,u.defaultdeptid,rp.nama_pegawai,u.badgenumber,'" . $tgl_skrg . "',rp.status_kepegawaian,rp.kode_golongan,rp.tmt_pangkat,rp.kode_ese ,rp.nama_ese 
		FROM adms_db.userinfo u
		join appsipd.r_pegawai_aktual rp
		ON u.badgenumber = rp.nip_baru
		Where u.defaultdeptid = " . $dept;
		$res = $this->db->query($sql);
		//return $res->result_array();
	}


	public function delete_keterangan($data)
	{
		$sql = "DELETE FROM checkinout WHERE checktime=" . $data['tanggal'] . " and userid =" . $data['userid'] . " and checktype=" . $data['checktype'];
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_jumlah_hadir($data)
	{
		$sql = "SELECT count(userid) as jlh_hadir FROM rekap_bulanan where userid = " . $data['userid'] . " and month(tanggal) = " . $data['bulan'] . " and year(tanggal) = " . $data['tahun'] . " AND ((masuk != 0 OR pulang != 0) OR (keterangan > 0 AND keterangan != 10))";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_detail_pns_by_tahun_bulan($data)
	{
		$sql = "SELECT rb.nama_pegawai,rb.nip,rb.tanggal,rb.masuk,rb.pulang,rb.telat,rb.pulang_cepat,rb.total_persen,k.nama_keterangan
		FROM rekap_bulanan rb
		JOIN keterangan k
		ON rb.keterangan = k.id_keterangan
		where rb.status_kepegawaian= '" . $data['status'] . "' 
		and rb.userid = " . $data['userid'] . " 
		and month(rb.tanggal) = " . $data['bulan'] . " 
		and year(rb.tanggal) = " . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_detail_pns_by_tahun_bulan2($data)
	{
		$sql = "SELECT rb.nama_pegawai,rb.nip,rb.tanggal,rb.masuk,rb.pulang,rb.telat,rb.pulang_cepat,rb.total_persen,k.nama_keterangan
		FROM rekap_bulanan rb
		JOIN keterangan k
		ON rb.keterangan = k.id_keterangan
		where rb.DeptID = " . $data['DeptID'] . " and rb.userid = " . $data['userid'] . " 
		AND rb.status_kepegawaian= '" . $data['status'] . "' 		
		and month(rb.tanggal) = " . $data['bulan'] . " 
		and year(rb.tanggal) = " . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_bulanan_pns_by_tahun_bulan($data)
	{
		$sql = "SELECT * FROM rekap_bulanan where (DeptID ='" . $data['DeptID'] . " and month(tanggal) =" . $data['bulan'] . " and year(tanggal) =" . $data['tahun'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_jamkerja_by_nip($nip, $hari)
	{
		$sql = "SELECT jam_masuk,jam_keluar 
		FROM jam_shift
		where badgenumber= " . $nip . " and keterangan = '" . $hari . "'";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_keterangan_jamkerja_by_nip($nip)
	{
		$sql = "SELECT keterangan FROM jam_shift
		where badgenumber=" . $nip . " and keterangan = 'Sabtu'";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_pns_by_tahun_bulanXX($data)
	{
		$sql = "SELECT * 
		FROM rekap_bulanan 
		where (status_kepegawaian = '" . $data['status'] . "') 
		and (DeptID ='" . $data['DeptID'] . "') 
		and (day(tanggal)  " . $data['hari_mulai'] . " 
		and " . $data['hari_sampai'] . ") 
		nd (month(tanggal) between " . $data['bulan_mulai'] . " 
		and " . $data['bulan_sampai'] . ") 
		and (year(tanggal) between " . $data['tahun_mulai'] . " 
		and " . $data['tahun_sampai'] . ") 
		ORDER by tanggal asc, kode_ese ASC, 
		kode_golongan desc, tmt_pangkat asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}



	public function get_rekap_pns_by_hari($data)
	{
		$sql = "SELECT rb.* ,js.jam_masuk,js.jam_keluar
		FROM rekap_bulanan rb
		JOIN jam_shift js
		ON rb.nip = js.badgenumber
		where (rb.status_kepegawaian = '" . $data['status'] . "') 
		and (rb.DeptID ='" . $data['DeptID'] . "') 
		and (day(rb.tanggal) = " . $data['hari_mulai'] . ") and 
		(month(rb.tanggal) = " . $data['bulan_mulai'] . ") 
		and (year(rb.tanggal) = " . $data['tahun_mulai'] . ") 
		ORDER by tanggal asc, kode_ese ASC, 
		kode_golongan desc, tmt_pangkat asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function get_rekap_tkk_by_tahun_bulan($data)
	{
		$sql = "SELECT * FROM rekap_bulanan where (status_kepegawaian = '" . $data['status'] . "') and (DeptID ='" . $data['DeptID'] . "') and (day(tanggal) between " . $data['hari_mulai'] . " and " . $data['hari_sampai'] . ") and (month(tanggal) between " . $data['bulan_mulai'] . " and " . $data['bulan_sampai'] . ") and (year(tanggal) between " . $data['tahun_mulai'] . " and " . $data['tahun_sampai'] . ") ORDER by tanggal asc, nama_pegawai asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_pns_by_tahun_bulan_by($data)
	{
		$sql = "SELECT * FROM rekap_bulanan where (status_kepegawaian = '" . $data['status'] . "') and (DeptID ='" . $data['DeptID'] . "') and month(tanggal) =" . $data['bulan'] . " and year(tanggal) =" . $data['tahun'] . " ORDER by tanggal asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_rekap_tkk_by_tahun_bulan_by($data)
	{
		$sql = "SELECT * FROM rekap_bulanan where (status_kepegawaian = '" . $data['status'] . "') and (DeptID ='" . $data['DeptID'] . "') and month(tanggal) =" . $data['bulan'] . " and year(tanggal) =" . $data['tahun'] . " ORDER by tanggal asc";

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
		$sql = "SELECT * from departments ORDER BY DeptName ASC";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_keterangan1()
	{
		$sql = "SELECT * from keterangan";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_keterangan_by_id($data)
	{
		$sql = "SELECT nama_keterangan from keterangan where id_keterangan =" . $data;
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_SN_by_id($data)
	{
		$sql = "SELECT SN from userinfo where userid =" . $data['userid'];
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function hitung_keterangan($data)
	{
		$sql = "SELECT count(keterangan) as jlh_ket FROM rekap_bulanan where userid = " . $data['userid'] . " and month(tanggal) = " . $data['bulan'] . " and year(tanggal) = " . $data['tahun'] . " and keterangan =" . $data['keterangan'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_checkinoutXX($data)
	{
		$sql = "SELECT * FROM checkinout WHERE (day(checktime) between " . $data['hari_mulai'] . " and " . $data['hari_sampai'] . ") and (month(checktime) between " . $data['bulan_mulai'] . " and " . $data['bulan_sampai'] . ") and (year(checktime) between " . $data['tahun_mulai'] . " and " . $data['tahun_sampai'] . ") ORDER by checktime asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function get_checkinout($data)
	{
		$sql = "SELECT * FROM checkinout 
		WHERE (day(checktime) = " . $data['hari_mulai'] . ") 
		and (month(checktime) = " . $data['bulan_mulai'] . " ) 
		and (year(checktime) = " . $data['tahun_mulai'] . " ) 
		ORDER by checktime asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function update_rekap($tgl_skrg, $dept, $hari)
	{
		$sql = "CALL update_rekap_masuk('" . $tgl_skrg . "',$dept,'" . $hari . "');";
		$sql2 = "CALL update_rekap_pulang('" . $tgl_skrg . "',$dept,'" . $hari . "');";
		$res = $this->db->query($sql);
		$res = $this->db->query($sql2);
	}

	public function update_rekap_masuk($tgl_skrg, $dept, $hari)
	{
		$sql = "CALL update_rekap_masuk('" . $tgl_skrg . "',$dept,'" . $hari . "');";
		$res = $this->db->query($sql);
	}

	public function update_rekap_pulang($tgl_skrg, $dept, $hari)
	{

		$sql2 = "CALL update_rekap_pulang('" . $tgl_skrg . "',$dept,'" . $hari . "');";
		$res = $this->db->query($sql2);
	}

	public function update_denda($tgl_skrg, $dept)
	{
		$sql = "CALL denda_jam('" . $tgl_skrg . "'," . $dept . ")";
		$res = $this->db->query($sql);
	}


	public function get_jam_checkinout($data, $deptid)
	{
		$sql = "SELECT ck.userid,time(ck.checktime) as time,ck.checktype, u.badgenumber,u.defaultdeptid
		FROM checkinout ck
		JOIN userinfo u 
		ON ck.userid = u.userid
		WHERE date(checktime)='" . $data . "' and defaultdeptid = " . $deptid . "
		ORDER by checktype asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}


	public function get_checkinout_by_tahun_bulan($data)
	{
		$sql = "SELECT * FROM checkinout WHERE month(checktime) = " . $data['bulan'] . " and year(checktime) = " . $data['tahun'] . " ORDER by checktime asc";

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function update_rekap_detail($data)
	{

		$this->db->set('telat', $data['telat']);

		$this->db->set('pulang_cepat', $data['pulang_cepat']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}




	public function update_masuk($data)
	{

		$this->db->set('masuk', $data['absen_masuk']);
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->set('telat', $data['telat']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal_sekarang']);
		$this->db->update('rekap_bulanan');
	}

	public function update_tk($tgl, $dept)
	{
		$this->db->set('keterangan', 10);
		$this->db->where('masuk', '00:00:00');
		$this->db->where('pulang', '00:00:00');
		$this->db->where('DeptID', $dept);
		$this->db->where('tanggal', $tgl);
		$this->db->update('rekap_bulanan');
	}


	public function update_pulang($data)
	{
		$this->db->set('pulang', $data['absen_pulang']);
		$this->db->set('pulang_cepat', $data['pulang_cepat']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal_sekarang']);
		$this->db->update('rekap_bulanan');
	}

	public function update_keterangan($data)
	{
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->set('DeptID', $data['DeptID']);

		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);

		$this->db->update('izin_ket');
	}

	public function insert_in($data)
	{
		$this->db->set('checktime', $data['tanggal1']);
		$this->db->set('checktype', $data['checktype']);
		$this->db->set('sensorid', '1');
		$this->db->set('WorkCode', "");
		$this->db->set('Reserved', '0');
		$this->db->set('SN', $data['SN']);
		$this->db->set('userid', $data['userid']);
		$this->db->insert('checkinout');
		$this->db->insert_id();
	}

	public function insert_rekap($data)
	{
		$this->db->set('userid', $data['userid']);
		$this->db->set('nama_pegawai', $data['nama_pegawai']);
		$this->db->set('tanggal', $data['tanggal_absen']);
		$this->db->set('masuk', $data['jam_absen']);
		$this->db->set('nip', $data['nip']);
		$this->db->set('DeptID', $data['DeptID']);
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->set('status_kepegawaian', $data['status_kepegawaian']);
		$this->db->set('telat', $data['telat']);
		$this->db->insert('rekap_harian');
		$this->db->insert_id();
	}

	public function insert_keterangan($data)
	{
		$this->db->set('userid', $data['userid']);
		$this->db->set('tanggal', $data['tanggal']);
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->set('DeptID', $data['DeptID']);
		$this->db->insert('izin_ket');
		$this->db->insert_id();
	}


	public function update_keterangan_by($data)
	{
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}

	public function update_keterangan_rekap($data)
	{
		$this->db->set('pulang_cepat', $data['pulang_cepat']);
		$this->db->set('telat', $data['telat']);
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->set('persen_telat', $data['persen_telat']);
		$this->db->set('persen_pc', $data['persen_pc']);
		$this->db->set('total_persen', $data['total_persen']);
		$this->db->where('DeptID', $data['DeptID']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}


	public function get_persen_pc_masuk($data)
	{
		$this->db->select('persen_pc,masuk');
		$this->db->where('DeptID', $data['DeptID']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$res = $this->db->get('rekap_bulanan');
		return $res->result_array();
	}

	public function update_keterangan_apel_lewat($data)
	{
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->where('DeptID', $data['DeptID']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}

	public function update_keterangan_telat($data)
	{

		$this->db->set('telat', $data['telat']);
		$this->db->set('keterangan', $data['keterangan']);
		$this->db->set('persen_telat', $data['persen_telat']);
		$this->db->set('total_persen', $data['total_persen']);
		$this->db->where('DeptID', $data['DeptID']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$this->db->update('rekap_bulanan');
	}


	public function get_keterangan($data)
	{
		$this->db->select('*');
		$this->db->where('userid', $data['userid']);
		$this->db->where('tanggal', $data['tanggal']);
		$res = $this->db->get('rekap_bulanan');
		return $res->result_array();
	}

	public function cek_checkinout($data)
	{
		$this->db->select('*');
		$this->db->where('userid', $data['userid']);
		$this->db->where('checktime', $data['tanggal1']);
		$res = $this->db->get('checkinout');
		return $res->result_array();
	}

	public function tampil_nip_nama($data)
	{
		$this->db->select('badgenumber,name');
		$dept = (int) $data['DeptID'];
		$this->db->where('defaultdeptid', $dept);
		$res = $this->db->get('userinfo');
		return $res->result_array();
	}

	public function get_nip_nama($data)
	{
		$sql = "SELECT badgenumber, name FROM userinfo WHERE defaultdeptid = " . $data['DeptID'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_checkinout_by_checktype($data)
	{
		$sql = "SELECT * FROM checkinout 
		where month(checktime)=" . $data['bulan'] . " 
		and year(checktime) =" . $data['tahun'] . " 
		and day(checktime) =" . $data['hari'] . " 
		and userid =" . $data['userid'] . " 
		and checktype =" . $data['checktype'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function cek_checkinout2_by_checktype($data)
	{
		$sql = "SELECT checktime FROM checkinout 
		where month(checktime)=" . $data['bulan'] . " 
		and year(checktime) =" . $data['tahun'] . " 
		and day(checktime) =" . $data['hari'] . " 
		and userid =" . $data['userid'] . " 
		and checktype =" . $data['checktype'];

		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function hapus_checkinout($data)
	{
		$this->db->where('checktime', $data['tanggal1']);
		$this->db->where('userid', $data['userid']);
		$this->db->where('checktype', $data['checktype']);
		$this->db->delete('checkinout');
	}

	public function hapus_rekap_tgl($tgl, $dept)
	{
		$this->db->where('DeptID', $dept);
		$this->db->where('tanggal', $tgl);
		$this->db->delete('rekap_bulanan');
	}



	// public function cek_checkinout($data)
	// {
	// 	$sql = "SELECT * FROM checkinout where checktime=".$data['tanggal']." and userid =".$data['userid'];

	// 	$res = $this->db->query($sql);
	// 	return $res->result_array();
	// }
}
