<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AllModel extends CI_Model
{
    public function cek_rekap($data)
    {
        $sql = "SELECT userid FROM rekap_bulanan where tanggal='" . $data . "'";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function copy_datalengkap_rekapx($tgl_skrg)
    {
        $sql = "REPLACE INTO rekap_bulanan(userid,DeptID,nama_pegawai,nip,tanggal,status_kepegawaian,kode_golongan,tmt_pangkat,kode_ese,nama_ese) 
		SELECT u.userid,u.defaultdeptid,rp.nama_pegawai,u.badgenumber,'" . $tgl_skrg . "',rp.status_kepegawaian,rp.kode_golongan,rp.tmt_pangkat,rp.kode_ese ,rp.nama_ese 
		FROM adms_db.userinfo u
		join appsipd.r_pegawai_aktual rp
		ON u.badgenumber = rp.nip_baru";
        $res = $this->db->query($sql);
        //return $res->result_array();
    }

    public function update_rekap($tgl_skrg, $hari)
    {
        $sql = "CALL update_all_rekap_masuk('" . $tgl_skrg . "','" . $hari . "');";
        $sql2 = "CALL update_all_rekap_pulang('" . $tgl_skrg . "','" . $hari . "');";
        $res = $this->db->query($sql);
        $res = $this->db->query($sql2);
    }

    public function update_denda($tgl_skrg)
    {
        $sql = "CALL hukum_all_jam('" . $tgl_skrg . "')";
        $res = $this->db->query($sql);
    }

    public function ubah_keterangan($tgl)
    {
        $sql = "UPDATE rekap_bulanan rb
		JOIN izin_ket ik
		ON rb.userid = ik.userid
		SET rb.keterangan = ik.keterangan,
		  rb.telat = '00:00:00',
		  rb.pulang_cepat = '00:00:00'
		WHERE rb.tanggal = '" . $tgl . "' AND ik.tanggal = '" . $tgl . "'";
        $res = $this->db->query($sql);
    }
}
