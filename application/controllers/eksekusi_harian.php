<?php

//defined('BASEPATH') or exit('No direct script access allowed');

class eksekusi_harian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        /*
        if (!$this->session->userdata('sess_pengelola')) {
            redirect("VerifyLogin", 'refresh');
        }*/

        $this->load->model('RekapModel');
        $this->load->model('LaporanModel');
        $this->load->model('StaffModel');
        $this->load->model('SipdModel');
        $this->load->model('ShiftModel');
        $this->load->model('GolonganModel');
        $this->load->model('KegiatanModel');
        $this->load->model('MainModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $session_data = $this->session->userdata('sess_pengelola');
        $datacontent['session'] = $session_data;
        $this->template->view('template/pengelola/main_content', 3, $datacontent);
    }



    public function get_rekap_harian()
    {
        $session_data = $this->session->userdata('sess_pengelola');
        $data['id_staff'] = $session_data['id_staff'];
        $data['DeptID'] = $session_data['DeptID'];
        //$tanggal_sekarang = date('Y-m-d');
        $tanggal_sekarang = date('Y-m-d', strtotime("2019-05-21"));
        $data['tanggal_sekarang'] = date('Y-m-d', strtotime("$tanggal_sekarang"));

        //$data['tanggal_sekarang'] = date('Y-m-d', strtotime("2019-03-21"));


        $mulai = $this->input->GET('mulaiP');
        $data['tahun_mulai'] = date('Y', strtotime("$mulai"));
        $data['hari_mulai'] = date('d', strtotime("$mulai"));
        $data['bulan_mulai'] = date('m', strtotime("$mulai"));

        $rekap_hari_ini = $this->RekapModel->cek_rekap($tanggal_sekarang); //cek rekap hari ini 

        if (empty($rekap_hari_ini)) { //jika tidak ada, maka insert ke tabel rekap
            //$this->insert_default_data_absen();	
            $this->insert_default_data_absen($tanggal_sekarang);
        }

        $cek_masuk_pulang = $this->RekapModel->cek_masuk_pulang($data); //cek sudah di update blm jam masuk sama jam pulang 

        if (!empty($cek_masuk_pulang)) {
            $checkinout = $this->RekapModel->get_jam_checkinout($tanggal_sekarang); //ambil jam masuk pulang di tb cekinout tanggal sekarang

            if (!empty($checkinout)) {
                foreach ($checkinout as $ck) {

                    $data['userid'] = $ck['userid'];
                    $date = $ck['time'];
                    $data['badgenumber'] = $ck['badgenumber'];

                    $kategori_deptid = $this->RekapModel->cek_kategori_DeptId($data['badgenumber']); //cek kategori deptid

                    if ($kategori_deptid[0]['kategori'] == "SEKOLAH") {
                        $hari =  $this->tampil_nama_hari($data['tanggal_sekarang']);
                    } else {
                        $hari = "empty";
                    }

                    $jam_kerja = $this->RekapModel->get_jamkerja_by_nip($data['badgenumber'], $hari);

                    if ($ck['checktype'] == 0) {
                        $data['absen_masuk'] = date('H:i:s', strtotime("$date"));

                        if (!empty($jam_kerja)) {
                            $jam_kerja[0]['jam_masuk'];
                            $jam_in_kerja = $jam_kerja[0]['jam_masuk'];
                            $jam_masuk_kerja = date('H:i:s', strtotime("$jam_in_kerja"));
                            $checkinout = $data['absen_masuk'];
                            $absen_masuk = new DateTime("$checkinout");
                            $jam_kerja = new DateTime("$jam_masuk_kerja");

                            if ($absen_masuk > $jam_kerja) {
                                $hitung_telat = $jam_kerja->diff($absen_masuk);
                                $data['telat'] = $hitung_telat->format("%H:%I:%S");
                            } else {
                                $data['telat'] = date('H:i:s', strtotime("00:00:00"));
                            }
                        } else {
                            $data['telat'] = date('H:i:s', strtotime("00:00:00"));
                        }
                        $data['keterangan'] = 0;
                        $cek_ket = $this->RekapModel->cek_keterangan($data['userid'], $data['tanggal_sekarang']); // cek ado izin dak tanggal ini

                        if (!empty($cek_ket)) {
                            $data['telat'] = date('H:i:s', strtotime("00:00:00"));
                            $data['keterangan'] = $cek_ket[0]['keterangan'];
                        }

                        $res = $this->RekapModel->update_masuk($data);
                    } else {

                        $data['absen_pulang'] = date('H:i:s', strtotime("$date"));

                        if (!empty($jam_kerja)) {
                            $jam_pulang_kerja = $jam_kerja[0]['jam_keluar'];
                            $checkinout = $data['absen_pulang'];
                            $absen_pulang = new DateTime("$checkinout");
                            $jam_kerja = new DateTime("$jam_pulang_kerja");

                            if ($absen_pulang < $jam_kerja) {
                                $hitung_telat = $jam_kerja->diff($absen_pulang);
                                $data['pulang_cepat'] = $hitung_telat->format("%H:%I:%S");
                            } else {
                                $data['pulang_cepat'] = date('H:i:s', strtotime("00:00:00"));
                            }
                        } else {
                            $data['pulang_cepat'] = date('H:i:s', strtotime("00:00:00"));
                        }

                        $res = $this->RekapModel->update_pulang($data);
                    }
                }
            } else {
                echo "belum ada absen masuk hari ini";
            }
        }


        //$list_rekap = array();
        //array_push($list_rekap, $ck);
        //echo json_encode($list_rekap);
    }

}

 ?>