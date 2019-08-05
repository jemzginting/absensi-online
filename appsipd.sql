# Host: localhost  (Version 5.6.21)
# Date: 2019-08-05 22:21:40
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "cmf_setting"
#

CREATE TABLE `cmf_setting` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_setting` int(11) NOT NULL,
  `nama_item` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `meta_value` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_setting` (`id_setting`,`nama_item`,`id_parent`,`urutan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12000251 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Structure for table "cuti_2"
#

CREATE TABLE `cuti_2` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "evip_administrasi_gap"
#

CREATE TABLE `evip_administrasi_gap` (
  `id_ip_administrasi_gap` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `gap` varchar(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_administrasi_gap`),
  KEY `id_unor` (`id_unor`),
  KEY `jab_type` (`jab_type`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_administrasi_item"
#

CREATE TABLE `evip_administrasi_item` (
  `id_ip_administrasi_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_unor` int(11) NOT NULL,
  `id_peg_diklat_struk` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_administrasi_item`),
  KEY `id_peg_pendidikan` (`id_peg_diklat_struk`),
  KEY `id_unor` (`id_unor`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_fungsi"
#

CREATE TABLE `evip_fungsi` (
  `id_fungsi` int(11) NOT NULL AUTO_INCREMENT,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `fungsi` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_fungsi`),
  KEY `id_unor` (`id_unor`),
  KEY `jab_type` (`jab_type`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_jabatan_gap"
#

CREATE TABLE `evip_jabatan_gap` (
  `id_ip_jabatan_gap` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `gap` varchar(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_jabatan_gap`),
  KEY `id_unor` (`id_unor`),
  KEY `jab_type` (`jab_type`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_jabatan_item"
#

CREATE TABLE `evip_jabatan_item` (
  `id_ip_jabatan_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_unor` int(11) NOT NULL,
  `id_peg_jab` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_jabatan_item`),
  KEY `id_peg_pendidikan` (`id_peg_jab`),
  KEY `id_unor` (`id_unor`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_pelatihan_gap"
#

CREATE TABLE `evip_pelatihan_gap` (
  `id_ip_pelatihan_gap` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `gap` varchar(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_pelatihan_gap`),
  KEY `id_unor` (`id_unor`),
  KEY `jab_type` (`jab_type`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_pelatihan_item"
#

CREATE TABLE `evip_pelatihan_item` (
  `id_ip_pelatihan_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_unor` int(11) NOT NULL,
  `id_peg_diklat_struk` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_pelatihan_item`),
  KEY `id_peg_pendidikan` (`id_peg_diklat_struk`),
  KEY `id_unor` (`id_unor`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_pendidikan_gap"
#

CREATE TABLE `evip_pendidikan_gap` (
  `id_ip_pendidikan_gap` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `gap` varchar(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_pendidikan_gap`),
  KEY `id_unor` (`id_unor`),
  KEY `jab_type` (`jab_type`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for table "evip_pendidikan_item"
#

CREATE TABLE `evip_pendidikan_item` (
  `id_ip_pendidikan_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_unor` int(11) NOT NULL,
  `id_peg_pendidikan` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ip_pendidikan_item`),
  KEY `id_peg_pendidikan` (`id_peg_pendidikan`),
  KEY `id_unor` (`id_unor`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_alat"
#

CREATE TABLE `evjab_alat` (
  `id_alat` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `alat` text NOT NULL,
  `untuk` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_alat`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_bahan"
#

CREATE TABLE `evjab_bahan` (
  `id_bahan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `bahan` text NOT NULL,
  `penggunaan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_bahan`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_hasil"
#

CREATE TABLE `evjab_hasil` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `hasil` text NOT NULL,
  `satuan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_kelas_jabatan"
#

CREATE TABLE `evjab_kelas_jabatan` (
  `id_kelas_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(8) NOT NULL,
  `kode_kelas_jabatan` varchar(56) NOT NULL,
  `ihtisar` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id_kelas_jabatan`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `kode_kelas_jabatan` (`kode_kelas_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_kondisi"
#

CREATE TABLE `evjab_kondisi` (
  `id_kondisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `aspek` text NOT NULL,
  `faktor` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kondisi`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_korelasi"
#

CREATE TABLE `evjab_korelasi` (
  `id_korelasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `nama_jabatan` text NOT NULL,
  `instansi` text NOT NULL,
  `dalam_hal` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_korelasi`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_prestasi"
#

CREATE TABLE `evjab_prestasi` (
  `id_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `satuan` varchar(64) NOT NULL,
  `jumlah` decimal(11,4) NOT NULL,
  `waktu` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_prestasi`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_resiko"
#

CREATE TABLE `evjab_resiko` (
  `id_resiko` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) NOT NULL,
  `fisik` text NOT NULL,
  `penyebab` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_resiko`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_tanggungjawab"
#

CREATE TABLE `evjab_tanggungjawab` (
  `id_tanggungjawab` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `tanggungjawab` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tanggungjawab`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_urtug"
#

CREATE TABLE `evjab_urtug` (
  `id_urtug` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `uraian_tugas` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_urtug`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_urtug_tahapan"
#

CREATE TABLE `evjab_urtug_tahapan` (
  `id_tahapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_urtug` int(11) NOT NULL,
  `tahapan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tahapan`),
  KEY `id_urtug` (`id_urtug`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for table "evjab_wewenang"
#

CREATE TABLE `evjab_wewenang` (
  `id_wewenang` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `jab_type` varchar(10) DEFAULT NULL,
  `wewenang` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_wewenang`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "konten"
#

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `komponen` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `sub_judul` varchar(200) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_konten` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `urutan` int(11) NOT NULL,
  `baca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_konten`),
  KEY `id_berita_kategori` (`id_kategori`) USING BTREE,
  KEY `id_penulis` (`id_penulis`) USING BTREE,
  KEY `user_id` (`user_id`,`urutan`) USING BTREE,
  KEY `komponen` (`komponen`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Structure for table "konten_appe"
#

CREATE TABLE `konten_appe` (
  `id_appe` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_konten` int(11) unsigned DEFAULT NULL,
  `tipe` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_appe` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan_appe` text COLLATE latin1_general_ci,
  `link` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `urutan_appe` int(11) DEFAULT NULL,
  `foto_from` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL,
  `nilai` int(14) DEFAULT NULL,
  `fotografer` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_appe`),
  KEY `FK_galeri` (`id_konten`) USING BTREE,
  KEY `komponen` (`tipe`) USING BTREE,
  KEY `link` (`link`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Structure for table "konten_komentar"
#

CREATE TABLE `konten_komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_konten` int(11) NOT NULL,
  `nama_komentator` varchar(200) NOT NULL,
  `email_komentator` varchar(100) NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `isi_komentar` text NOT NULL,
  `status` enum('on','off') NOT NULL,
  `id_induk` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_berita` (`id_konten`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "m_jf"
#

CREATE TABLE `m_jf` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `kode_bkn` varchar(100) DEFAULT NULL,
  `jab_type` varchar(100) DEFAULT NULL,
  `ihtisar` text,
  `id_data_ref` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM AUTO_INCREMENT=17753 DEFAULT CHARSET=utf8;

#
# Structure for table "m_jft_jenjang"
#

CREATE TABLE `m_jft_jenjang` (
  `id_jenjang_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `kode_golongan` int(11) NOT NULL,
  `tingkat` varchar(32) NOT NULL,
  `nama_jenjang` varchar(128) NOT NULL,
  PRIMARY KEY (`id_jenjang_jabatan`),
  KEY `id_jabatan` (`id_jabatan`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=534 DEFAULT CHARSET=latin1;

#
# Structure for table "m_jfu"
#

CREATE TABLE `m_jfu` (
  `id_m_jfu` int(10) NOT NULL AUTO_INCREMENT,
  `kode_rumpun_jabatan` varchar(255) DEFAULT NULL,
  `rumpun_jabatan` varchar(255) DEFAULT NULL,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `kualifikasi_pendidikan` varchar(255) DEFAULT NULL,
  `tugas_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_m_jfu`)
) ENGINE=InnoDB AUTO_INCREMENT=2656 DEFAULT CHARSET=latin1;

#
# Structure for table "m_pendidikan"
#

CREATE TABLE `m_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenjang` varchar(255) DEFAULT NULL,
  `nama_pendidikan` varchar(255) DEFAULT NULL,
  `kode_bkn` varchar(255) DEFAULT NULL,
  `nama_jenjang` varchar(100) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM AUTO_INCREMENT=8512 DEFAULT CHARSET=utf8;

#
# Structure for table "m_reff"
#

CREATE TABLE `m_reff` (
  `id_reff` int(11) NOT NULL AUTO_INCREMENT,
  `id_setreff` int(11) NOT NULL,
  `kode_reff` varchar(128) NOT NULL,
  `nama_reff` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `reff_meta` text NOT NULL,
  PRIMARY KEY (`id_reff`),
  KEY `id_setting` (`id_setreff`,`nama_reff`,`id_parent`,`urutan`),
  KEY `kode_reff` (`kode_reff`)
) ENGINE=MyISAM AUTO_INCREMENT=1310 DEFAULT CHARSET=utf8;

#
# Structure for table "m_unor"
#

CREATE TABLE `m_unor` (
  `id_unor` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) DEFAULT NULL,
  `nama_unor` varchar(255) NOT NULL,
  `kode_ese` varchar(10) DEFAULT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `nomenklatur_jabatan` varchar(255) DEFAULT NULL,
  `nomenklatur_pada` varchar(255) DEFAULT NULL,
  `nomenklatur_unor` varchar(255) DEFAULT NULL,
  `nomenklatur_cari` varchar(255) DEFAULT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `kode_unor` varchar(100) DEFAULT NULL,
  `tmt_berlaku` date DEFAULT NULL,
  `tst_berlaku` date DEFAULT NULL,
  PRIMARY KEY (`id_unor`),
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5518 DEFAULT CHARSET=latin1;

#
# Structure for table "md_diklat"
#

CREATE TABLE `md_diklat` (
  `id_diklat` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumpun` int(11) NOT NULL,
  `kode_diklat` varchar(128) DEFAULT NULL,
  `nama_diklat` varchar(255) DEFAULT NULL,
  `kode_jenis_diklat` int(11) NOT NULL,
  `jenis_diklat` varchar(100) DEFAULT NULL,
  `kode_jenjang_diklat` int(11) NOT NULL,
  `jenjang_diklat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_diklat`),
  KEY `kode_jenis_kursus` (`kode_jenis_diklat`) USING BTREE,
  KEY `kode_jenjang_kursus` (`kode_jenjang_diklat`) USING BTREE,
  KEY `id_rumpun` (`id_rumpun`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=559 DEFAULT CHARSET=utf8;

#
# Structure for table "md_diklat_calon"
#

CREATE TABLE `md_diklat_calon` (
  `id_diklat_calon` int(10) NOT NULL AUTO_INCREMENT,
  `id_diklat_rencana` int(11) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `reff_pendidikan` int(11) NOT NULL,
  `reff_pangkat` int(11) NOT NULL,
  `reff_jabatan` int(11) NOT NULL,
  `status` varchar(56) NOT NULL,
  PRIMARY KEY (`id_diklat_calon`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_diklat_struk` (`id_diklat_rencana`) USING BTREE,
  KEY `reff_pangkat` (`reff_pangkat`) USING BTREE,
  KEY `reff_jabatan` (`reff_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Structure for table "md_diklat_event"
#

CREATE TABLE `md_diklat_event` (
  `id_diklat_event` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` int(11) NOT NULL,
  `nama_diklat` varchar(255) NOT NULL,
  `tempat_diklat` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `gelombang` varchar(255) NOT NULL DEFAULT '',
  `tmt_diklat` date NOT NULL,
  `tst_diklat` date NOT NULL,
  `jam` decimal(5,2) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id_diklat_event`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Structure for table "md_diklat_jangnis"
#

CREATE TABLE `md_diklat_jangnis` (
  `id_diklat_jangnis` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumpun` int(11) NOT NULL,
  `tipe` varchar(32) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `nama_diklat_jangnis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_diklat_jangnis`),
  KEY `id_rumpun` (`id_rumpun`) USING BTREE,
  KEY `tipe` (`tipe`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

#
# Structure for table "md_diklat_peserta"
#

CREATE TABLE `md_diklat_peserta` (
  `id_diklat_peserta` int(10) NOT NULL AUTO_INCREMENT,
  `id_diklat_peserta_usulan` int(11) NOT NULL,
  `id_diklat_event` int(11) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `reff_pangkat` int(11) NOT NULL,
  `reff_jabatan` int(11) NOT NULL,
  `status` varchar(56) NOT NULL,
  PRIMARY KEY (`id_diklat_peserta`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_diklat_struk` (`id_diklat_event`) USING BTREE,
  KEY `reff_pangkat` (`reff_pangkat`) USING BTREE,
  KEY `reff_jabatan` (`reff_jabatan`) USING BTREE,
  KEY `id_diklat_peserta_usulan` (`id_diklat_peserta_usulan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=utf8;

#
# Structure for table "md_diklat_rencana"
#

CREATE TABLE `md_diklat_rencana` (
  `id_diklat_rencana` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` int(11) NOT NULL,
  `nama_diklat` varchar(50) NOT NULL,
  `tempat_diklat` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `pengusul` varchar(50) NOT NULL,
  `reff_pengusul` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jam` decimal(5,2) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id_diklat_rencana`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for table "md_diklat_widyaiswara"
#

CREATE TABLE `md_diklat_widyaiswara` (
  `id_diklat_widyaiswara` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat_event` int(11) NOT NULL,
  `nip_baru` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `gelar_nonakademis` varchar(255) NOT NULL,
  `gelar_depan` varchar(255) NOT NULL,
  `gelar_belakang` varchar(255) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(20) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `modul` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  PRIMARY KEY (`id_diklat_widyaiswara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "p_mut_rancangan"
#

CREATE TABLE `p_mut_rancangan` (
  `id_rancangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rancangan` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `periode` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rancangan`),
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "p_mut_rancangan_pemangku"
#

CREATE TABLE `p_mut_rancangan_pemangku` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_rancangan` int(11) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_kepegawaian` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(100) DEFAULT NULL,
  `tmt_cpns` date NOT NULL,
  `tmt_pns` date NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `kode_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `kode_unor` varchar(100) NOT NULL,
  `nama_unor` varchar(255) NOT NULL,
  `jab_type` varchar(100) NOT NULL COMMENT 'pilihan: js (jab. struktural), jfu (jab. fung. umum),jft (jab. fung. tertentu), jft-guru(jab. fung. tertentu guru)',
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `nomenklatur_pada` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `kode_ese` int(4) NOT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `tmt_ese` date NOT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(100) DEFAULT NULL,
  `pend_jurusan` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `nama_jenjang` varchar(100) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(100) DEFAULT NULL,
  `tanggal_lulus` date NOT NULL,
  `tahun_lulus` int(4) DEFAULT NULL,
  `nama_diklat_struk` varchar(200) DEFAULT NULL,
  `tanggal_sttpl_diklat_struk` date NOT NULL,
  `bup` int(3) DEFAULT NULL,
  `no_duk` int(11) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_rancangan` (`id_rancangan`) USING BTREE,
  KEY `no_duk` (`no_duk`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "p_skp"
#

CREATE TABLE `p_skp` (
  `id_skp` int(10) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `bulan_mulai` tinyint(4) NOT NULL,
  `bulan_selesai` tinyint(4) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `id_unor` int(11) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `nomenklatur_pada` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `id_penilai` int(20) NOT NULL,
  `penilai_nip_baru` varchar(20) NOT NULL,
  `penilai_nama_pegawai` varchar(50) NOT NULL,
  `penilai_gelar_nonakademis` varchar(25) DEFAULT NULL,
  `penilai_gelar_depan` varchar(25) NOT NULL,
  `penilai_gelar_belakang` varchar(25) NOT NULL,
  `penilai_kode_golongan` int(11) DEFAULT NULL,
  `penilai_nama_golongan` varchar(50) NOT NULL,
  `penilai_nama_pangkat` varchar(50) NOT NULL,
  `penilai_id_unor` int(11) NOT NULL,
  `penilai_nomenklatur_jabatan` varchar(255) NOT NULL,
  `penilai_nomenklatur_pada` varchar(255) NOT NULL,
  `penilai_tugas_tambahan` varchar(255) NOT NULL,
  `penilai_nama_ese` varchar(100) NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju_penilai` datetime DEFAULT NULL,
  `koreksi_penilai` datetime DEFAULT NULL,
  `revisi_penilai` datetime DEFAULT NULL,
  `acc_penilai` datetime DEFAULT NULL,
  `aju_verifikatur` datetime DEFAULT NULL,
  `koreksi_verifikatur` datetime DEFAULT NULL,
  `revisi_verifikatur` datetime DEFAULT NULL,
  `acc_verifikatur` datetime DEFAULT NULL,
  PRIMARY KEY (`id_skp`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_penilai` (`id_penilai`,`penilai_nip_baru`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `penilai_id_unor` (`penilai_id_unor`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11210 DEFAULT CHARSET=utf8;

#
# Structure for table "p_skp_kreatifitas"
#

CREATE TABLE `p_skp_kreatifitas` (
  `id_kreatifitas` int(11) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `kreatifitas` text NOT NULL,
  `no_sk` varchar(128) DEFAULT NULL,
  `tanggal_sk` date NOT NULL,
  `penandatangan_sk` varchar(256) NOT NULL,
  `status` varchar(32) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `icon` varchar(32) NOT NULL,
  PRIMARY KEY (`id_kreatifitas`),
  KEY `id_pegawai` (`id_skp`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_kreatifitas_koreksi"
#

CREATE TABLE `p_skp_kreatifitas_koreksi` (
  `id_koreksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kreatifitas` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(56) NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id_koreksi`),
  KEY `id_pegawai` (`id_kreatifitas`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_penilaian"
#

CREATE TABLE `p_skp_penilaian` (
  `id_skp` int(11) NOT NULL,
  `jumlah` decimal(11,4) NOT NULL DEFAULT '0.0000',
  `pembagi` int(11) DEFAULT NULL,
  `nilai` decimal(11,4) NOT NULL DEFAULT '0.0000',
  `nomenklatur_nilai` varchar(100) DEFAULT NULL,
  `perhitungan` text,
  PRIMARY KEY (`id_skp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_penilaian_akhir"
#

CREATE TABLE `p_skp_penilaian_akhir` (
  `id_pegawai` int(11) NOT NULL DEFAULT '0',
  `tahun` int(4) NOT NULL DEFAULT '0',
  `id_skp` int(11) DEFAULT NULL,
  `id_penilai` int(11) DEFAULT NULL,
  `id_skp_penilai` int(11) DEFAULT NULL,
  `id_penilai_atasan` int(11) DEFAULT NULL,
  `nilai_skp` decimal(11,4) NOT NULL,
  `skp_tambahan` text,
  `skp_tugas_tambahan` int(2) NOT NULL,
  `kreatifitas` int(2) NOT NULL,
  `nilai_perilaku` decimal(11,4) NOT NULL DEFAULT '0.0000',
  `perhitungan` text,
  PRIMARY KEY (`id_pegawai`,`tahun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_perilaku"
#

CREATE TABLE `p_skp_perilaku` (
  `id_perilaku` int(11) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `pelayanan` tinyint(4) DEFAULT NULL,
  `integritas` tinyint(4) DEFAULT NULL,
  `komitmen` tinyint(4) DEFAULT NULL,
  `disiplin` tinyint(4) DEFAULT NULL,
  `kerjasama` tinyint(4) DEFAULT NULL,
  `kepemimpinan` tinyint(4) NOT NULL DEFAULT '0',
  `icon` varchar(32) NOT NULL,
  PRIMARY KEY (`id_perilaku`),
  KEY `id_pegawai` (`id_skp`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5779 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_realisasi"
#

CREATE TABLE `p_skp_realisasi` (
  `id_target` int(11) NOT NULL AUTO_INCREMENT,
  `ak` decimal(10,4) NOT NULL,
  `volume` decimal(10,2) NOT NULL,
  `kualitas` int(3) NOT NULL,
  `waktu_lama` int(11) NOT NULL,
  `biaya` decimal(14,2) NOT NULL,
  `nilai_capaian` decimal(11,2) DEFAULT NULL,
  `perhitungan` text,
  `status` varchar(32) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `icon` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_target`)
) ENGINE=MyISAM AUTO_INCREMENT=86211 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_realisasi_catatan"
#

CREATE TABLE `p_skp_realisasi_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_skp`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=475 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_realisasi_jawaban"
#

CREATE TABLE `p_skp_realisasi_jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `id_pegawai` (`id_catatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=330 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_realisasi_tahapan"
#

CREATE TABLE `p_skp_realisasi_tahapan` (
  `id_realisasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan_mulai` tinyint(4) NOT NULL,
  `bulan_selesai` tinyint(4) NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju_penilai` datetime DEFAULT NULL,
  `koreksi_penilai` datetime DEFAULT NULL,
  `revisi_penilai` datetime DEFAULT NULL,
  `acc_penilai` datetime DEFAULT NULL,
  `aju_verifikatur` datetime DEFAULT NULL,
  `koreksi_verifikatur` datetime DEFAULT NULL,
  `revisi_verifikatur` datetime DEFAULT NULL,
  `acc_verifikatur` datetime DEFAULT NULL,
  PRIMARY KEY (`id_realisasi`)
) ENGINE=MyISAM AUTO_INCREMENT=10979 DEFAULT CHARSET=utf8;

#
# Structure for table "p_skp_tambahan"
#

CREATE TABLE `p_skp_tambahan` (
  `id_tambahan` int(11) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `pekerjaan` text NOT NULL,
  `no_sp` varchar(128) DEFAULT NULL,
  `tanggal_sp` date NOT NULL,
  `penandatangan_sp` varchar(256) NOT NULL,
  `icon` varchar(24) NOT NULL,
  `status` varchar(32) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tambahan`),
  KEY `id_pegawai` (`id_skp`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1033 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_target"
#

CREATE TABLE `p_skp_target` (
  `id_target` int(11) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `pekerjaan` text NOT NULL,
  `ak` decimal(10,4) NOT NULL,
  `volume` decimal(10,2) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `kualitas` int(3) NOT NULL,
  `waktu_lama` int(11) NOT NULL,
  `waktu_satuan` varchar(56) NOT NULL,
  `biaya` decimal(14,2) NOT NULL,
  `status` varchar(56) NOT NULL,
  `last_updated` datetime NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_target`),
  KEY `id_pegawai` (`id_skp`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=86215 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_target_catatan"
#

CREATE TABLE `p_skp_target_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_skp` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_skp`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=557 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_target_jawaban"
#

CREATE TABLE `p_skp_target_jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_catatan` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `id_pegawai` (`id_catatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=385 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_target_koreksi"
#

CREATE TABLE `p_skp_target_koreksi` (
  `id_koreksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_target` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(56) NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id_koreksi`),
  KEY `id_pegawai` (`id_target`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_tugas_pokok_koreksi"
#

CREATE TABLE `p_skp_tugas_pokok_koreksi` (
  `id_koreksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_tugas_pokok` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(56) NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id_koreksi`),
  KEY `id_pegawai` (`id_tugas_pokok`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=325 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp_tugas_tambahan_koreksi"
#

CREATE TABLE `p_skp_tugas_tambahan_koreksi` (
  `id_koreksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_tugas_tambahan` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(56) NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id_koreksi`),
  KEY `id_pegawai` (`id_tugas_tambahan`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Structure for table "p_skp1"
#

CREATE TABLE `p_skp1` (
  `id_skp` int(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan_mulai` tinyint(4) NOT NULL,
  `bulan_selesai` tinyint(4) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `id_unor` int(11) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `nomenklatur_pada` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `id_penilai` int(20) NOT NULL,
  `penilai_nip_baru` varchar(20) NOT NULL,
  `penilai_nama_pegawai` varchar(50) NOT NULL,
  `penilai_gelar_nonakademis` varchar(25) DEFAULT NULL,
  `penilai_gelar_depan` varchar(25) NOT NULL,
  `penilai_gelar_belakang` varchar(25) NOT NULL,
  `penilai_kode_golongan` int(11) DEFAULT NULL,
  `penilai_nama_golongan` varchar(50) NOT NULL,
  `penilai_nama_pangkat` varchar(50) NOT NULL,
  `penilai_id_unor` int(11) NOT NULL,
  `penilai_nomenklatur_jabatan` varchar(255) NOT NULL,
  `penilai_nomenklatur_pada` varchar(255) NOT NULL,
  `penilai_tugas_tambahan` varchar(255) NOT NULL,
  `penilai_nama_ese` varchar(100) NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju_penilai` datetime DEFAULT NULL,
  `koreksi_penilai` datetime DEFAULT NULL,
  `revisi_penilai` datetime DEFAULT NULL,
  `acc_penilai` datetime DEFAULT NULL,
  `aju_verifikatur` datetime DEFAULT NULL,
  `koreksi_verifikatur` datetime DEFAULT NULL,
  `revisi_verifikatur` datetime DEFAULT NULL,
  `acc_verifikatur` datetime DEFAULT NULL,
  PRIMARY KEY (`id_skp`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_penilai` (`id_penilai`,`penilai_nip_baru`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `penilai_id_unor` (`penilai_id_unor`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

#
# Structure for table "r_agenda"
#

CREATE TABLE `r_agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(11) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=3364 DEFAULT CHARSET=latin1;

#
# Structure for table "r_berkala"
#

CREATE TABLE `r_berkala` (
  `kode_golongan` varchar(3) NOT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `masa_jabatan` int(11) NOT NULL,
  `gaji_pokok` varchar(256) NOT NULL,
  `tahun_edaran` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_alamat"
#

CREATE TABLE `r_peg_alamat` (
  `id_peg_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `jalan` varchar(50) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `kel_desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kab_kota` varchar(30) NOT NULL,
  `propinsi` varchar(30) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telepon_rumah` varchar(15) NOT NULL,
  `telepon_genggam` varchar(20) NOT NULL,
  `jarak_meter` varchar(10) NOT NULL,
  `jarak_menit` varchar(10) NOT NULL,
  `status` varchar(7) NOT NULL,
  `ktp_nomor` varchar(16) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_alamat`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13533 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_anak"
#

CREATE TABLE `r_peg_anak` (
  `id_peg_anak` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(14) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tempat_lahir_anak` varchar(30) NOT NULL,
  `tanggal_lahir_anak` date NOT NULL,
  `gender_anak` varchar(2) NOT NULL,
  `status_anak` varchar(20) NOT NULL,
  `pendidikan_anak` varchar(30) NOT NULL,
  `pekerjaan_anak` varchar(30) NOT NULL,
  `keterangan_tunjangan` varchar(75) NOT NULL,
  `status` varchar(7) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_anak`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24717 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_arsip"
#

CREATE TABLE `r_peg_arsip` (
  `id_arsip` int(11) NOT NULL AUTO_INCREMENT,
  `kd_arsip` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `nip_baru` varchar(100) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `lemari` varchar(10) DEFAULT NULL,
  `pintu` varchar(10) DEFAULT NULL,
  `rak` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_arsip`),
  KEY `nip` (`nip`) USING BTREE,
  KEY `nip_baru` (`nip_baru`) USING BTREE,
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_cpns"
#

CREATE TABLE `r_peg_cpns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_cpns_skcpns` int(11) DEFAULT NULL,
  `id_cpns_periode` int(11) DEFAULT NULL,
  `id_jab_fung` int(11) DEFAULT NULL,
  `id_skpd` int(11) DEFAULT NULL,
  `id_skpd_aturan` int(11) DEFAULT NULL,
  `id_skpd_hir` int(11) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `skpd` varchar(255) DEFAULT NULL,
  `tmt_cpns` date DEFAULT NULL,
  `sk_cpns_nomor` varchar(100) DEFAULT NULL,
  `sk_cpns_tgl` date DEFAULT NULL,
  `sk_cpns_pejabat` varchar(100) DEFAULT NULL,
  `mk_th` int(11) DEFAULT NULL,
  `mk_bl` int(11) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `tmt_cpns` (`tmt_cpns`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22963 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_cuti"
#

CREATE TABLE `r_peg_cuti` (
  `id_peg_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `kode_jenis_cuti` int(4) DEFAULT NULL,
  `jenis_cuti` varchar(100) DEFAULT NULL,
  `kode_tujuan` varchar(3) DEFAULT NULL,
  `nama_tujuan` varchar(100) DEFAULT NULL,
  `sk_nomor` varchar(200) DEFAULT NULL,
  `sk_tanggal` date DEFAULT NULL,
  `bkn_nomor` varchar(200) DEFAULT NULL,
  `bkn_tanggal` date DEFAULT NULL,
  `tmt_golongan` date DEFAULT NULL,
  `kredit_utama` decimal(7,3) DEFAULT NULL,
  `kredit_tambahan` decimal(7,3) DEFAULT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `kode_pp` varchar(3) NOT NULL,
  PRIMARY KEY (`id_peg_cuti`),
  KEY `tmt_golongan` (`tmt_golongan`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_peg_cuti` (`id_peg_cuti`)
) ENGINE=MyISAM AUTO_INCREMENT=2756 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_cuti_aju"
#

CREATE TABLE `r_peg_cuti_aju` (
  `id_cuti` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `id_peg_cuti` int(11) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `tanggal_mulai_cuti` date DEFAULT NULL,
  `tanggal_sampai_cuti` date DEFAULT NULL,
  `alasan_cuti` varchar(255) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  `terima` int(2) NOT NULL DEFAULT '0',
  `nama_pimpinan_ijin` text NOT NULL,
  `jabatan_pimpinan_ijin` text NOT NULL,
  `tahun_ijin` varchar(255) NOT NULL,
  `nomor_pimpinan_ijin` text NOT NULL,
  `tanggal_surat_ijin` text NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `hari_libur` int(3) NOT NULL DEFAULT '0',
  `keterangan_dokter` text NOT NULL,
  `nama_dokter` text NOT NULL,
  `tanggal_surat_keterangan_dokter` text NOT NULL,
  `buku_nikah_suami` text NOT NULL,
  `buku_nikah_istri` text NOT NULL,
  `keterangan_hamil` text NOT NULL,
  `kartu_keluarga` text NOT NULL,
  `bpih` text NOT NULL,
  `pbb` text NOT NULL,
  `ktp_suami` text NOT NULL,
  `ktp_istri` text NOT NULL,
  `surat_nikah` text NOT NULL,
  `lunas_pbb` text NOT NULL,
  `penyetuju` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cuti`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_unor` (`id_unor`),
  KEY `id_tpp` (`id_cuti`),
  KEY `status` (`status`),
  KEY `id_ib` (`id_cuti`),
  KEY `kode_golongan` (`kode_golongan`),
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`),
  KEY `tanggal_mulai_cuti` (`tanggal_mulai_cuti`),
  KEY `tanggal_sampai_cuti` (`tanggal_sampai_cuti`),
  KEY `alasan_cuti` (`alasan_cuti`),
  KEY `id_peg_golongan` (`id_peg_cuti`),
  KEY `jab_type` (`jab_type`),
  KEY `tugas_tambahan` (`tugas_tambahan`)
) ENGINE=MyISAM AUTO_INCREMENT=2728 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_cuti_catatan"
#

CREATE TABLE `r_peg_cuti_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuti` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_cuti`)
) ENGINE=MyISAM AUTO_INCREMENT=978 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_cuti_dokumen"
#

CREATE TABLE `r_peg_cuti_dokumen` (
  `id_cuti_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuti` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `cuti_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_cuti_dokumen`),
  KEY `id_ib` (`id_cuti`),
  KEY `halaman` (`halaman`)
) ENGINE=MyISAM AUTO_INCREMENT=5774 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_cuti_tahunan"
#

CREATE TABLE `r_peg_cuti_tahunan` (
  `id_cuti_tahunan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `sisa_cuti` int(11) NOT NULL DEFAULT '12',
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_cuti_tahunan`)
) ENGINE=InnoDB AUTO_INCREMENT=8760 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_dashboard_val"
#

CREATE TABLE `r_peg_dashboard_val` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_setting` int(11) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_setting` (`id_setting`,`nama_item`,`bulan`,`tahun`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1836 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_diklat_struk"
#

CREATE TABLE `r_peg_diklat_struk` (
  `id_peg_diklat_struk` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` int(11) NOT NULL,
  `id_rumpun` int(11) NOT NULL,
  `id_pegawai` int(14) NOT NULL,
  `jenis_diklat` varchar(120) NOT NULL,
  `jenjang_diklat` varchar(120) NOT NULL,
  `nama_diklat` varchar(120) NOT NULL,
  `tempat_diklat` varchar(50) NOT NULL,
  `penyelenggara` varchar(120) NOT NULL,
  `tahun` year(4) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `tmt_diklat` date NOT NULL,
  `tst_diklat` date NOT NULL,
  `jam` decimal(5,2) NOT NULL,
  `nomor_sttpl` varchar(30) NOT NULL,
  `tanggal_sttpl` date NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id_peg_diklat_struk`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_diklat` (`id_diklat`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11509 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_dokumen"
#

CREATE TABLE `r_peg_dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `nip_baru` varchar(18) DEFAULT NULL,
  `tipe_dokumen` varchar(124) NOT NULL,
  `id_reff` int(11) NOT NULL,
  `halaman_item_dokumen` int(11) NOT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `sub_keterangan` text,
  `user_id` int(11) DEFAULT NULL,
  `log_aksi` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_pegawai` (`nip_baru`) USING BTREE,
  KEY `id_tipe_dokumen` (`tipe_dokumen`) USING BTREE,
  KEY `id_reff` (`id_reff`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=343932 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_dokumen_kontrol"
#

CREATE TABLE `r_peg_dokumen_kontrol` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `pasfoto` int(2) NOT NULL,
  `pasfoto_r` int(2) NOT NULL,
  `sk_cpns` int(2) NOT NULL,
  `sk_cpns_r` int(2) NOT NULL,
  `sk_pns` int(2) NOT NULL,
  `sk_pns_r` int(2) NOT NULL,
  `sertifikat_prajab` int(2) NOT NULL,
  `sertifikat_prajab_r` int(2) NOT NULL,
  `ijazah_pendidikan` int(2) NOT NULL,
  `ijazah_pendidikan_r` int(2) NOT NULL,
  `sk_pangkat` int(2) NOT NULL,
  `sk_pangkat_r` int(2) NOT NULL,
  `sk_jabatan` int(2) NOT NULL,
  `sk_jabatan_r` int(2) NOT NULL,
  `karis_karsu` int(2) NOT NULL,
  `karis_karsu_r` int(2) NOT NULL,
  `karpeg` int(2) NOT NULL,
  `karpeg_r` int(2) NOT NULL,
  `taspen` int(2) NOT NULL,
  `taspen_r` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `nip_baru` (`nip_baru`) USING BTREE,
  KEY `ijazah_pendidikan` (`ijazah_pendidikan`) USING BTREE,
  KEY `sk_jabatan` (`sk_jabatan`) USING BTREE,
  KEY `pasfoto` (`pasfoto`) USING BTREE,
  KEY `pasfoto_r` (`pasfoto_r`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13369 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_dp3"
#

CREATE TABLE `r_peg_dp3` (
  `id_dp3` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `penilai_nip_baru` varchar(20) NOT NULL,
  `penilai_nama_pegawai` varchar(50) NOT NULL,
  `status` varchar(56) NOT NULL,
  PRIMARY KEY (`id_dp3`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_penilai` (`penilai_nip_baru`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3747 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_golongan"
#

CREATE TABLE `r_peg_golongan` (
  `id_peg_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `kode_jenis_kp` int(4) DEFAULT NULL,
  `jenis_kp` varchar(100) DEFAULT NULL,
  `kode_golongan` varchar(3) DEFAULT NULL,
  `nama_golongan` varchar(100) DEFAULT NULL,
  `nama_pangkat` varchar(100) DEFAULT NULL,
  `sk_nomor` varchar(200) DEFAULT NULL,
  `sk_tanggal` date DEFAULT NULL,
  `bkn_nomor` varchar(200) DEFAULT NULL,
  `bkn_tanggal` date DEFAULT NULL,
  `tmt_golongan` date DEFAULT NULL,
  `kredit_utama` decimal(7,3) DEFAULT NULL,
  `kredit_tambahan` decimal(7,3) DEFAULT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_golongan`),
  KEY `tmt_golongan` (`tmt_golongan`) USING BTREE,
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_peg_golongan` (`id_peg_golongan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=74305 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_hukdis"
#

CREATE TABLE `r_peg_hukdis` (
  `id_peg_hukdis` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumpun` int(11) NOT NULL,
  `id_pegawai` int(14) NOT NULL,
  `nama_hukuman` varchar(255) NOT NULL,
  `tempat_penghargaan` varchar(255) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `nomor_sk` varchar(30) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id_peg_hukdis`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_ibel"
#

CREATE TABLE `r_peg_ibel` (
  `id_peg_ibel` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibel` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `sekolah` text,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `penandatangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_peg_ibel`),
  KEY `id_ib` (`id_ibel`) USING BTREE,
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ibel_aju"
#

CREATE TABLE `r_peg_ibel_aju` (
  `id_ibel` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `akreditasi` text NOT NULL,
  `jadwal` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ibel`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `id_tpp` (`id_ibel`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_ibel`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ibel_catatan"
#

CREATE TABLE `r_peg_ibel_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibel` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_ibel`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_ibel_dokumen"
#

CREATE TABLE `r_peg_ibel_dokumen` (
  `id_ibel_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibel` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `ibel_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_ibel_dokumen`),
  KEY `id_ib` (`id_ibel`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ibel_sekolah"
#

CREATE TABLE `r_peg_ibel_sekolah` (
  `id_ibel_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibel` int(11) NOT NULL,
  `nama_jenjang` varchar(255) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(255) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `lokasi_sekolah` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(100) DEFAULT NULL,
  `gelar_belakang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_ibel_sekolah`),
  KEY `id_ib` (`id_ibel`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_jab"
#

CREATE TABLE `r_peg_jab` (
  `id_peg_jab` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_unor` int(11) DEFAULT NULL,
  `kode_unor` varchar(100) DEFAULT NULL,
  `nama_unor` varchar(255) DEFAULT NULL,
  `nomenklatur_pada` varchar(255) DEFAULT NULL,
  `nama_jenis_jabatan` varchar(255) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_jenjang_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `tugas_tambahan` varchar(255) DEFAULT NULL,
  `kode_ese` int(2) DEFAULT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `tmt_jabatan` date DEFAULT NULL,
  `sk_pejabat` varchar(255) DEFAULT NULL,
  `sk_nomor` varchar(150) DEFAULT NULL,
  `sk_tanggal` date DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peg_jab`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `tmt_jabatan` (`tmt_jabatan`) USING BTREE,
  KEY `id_peg_jab` (`id_peg_jab`) USING BTREE,
  KEY `kode_unor` (`kode_unor`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32627 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_jafung"
#

CREATE TABLE `r_peg_jafung` (
  `id_peg_jafung` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `kode_jenis_jafung` int(4) DEFAULT NULL,
  `jenis_jafung` varchar(100) DEFAULT NULL,
  `tmt_golongan` date DEFAULT NULL,
  `kredit_utama` decimal(7,3) DEFAULT NULL,
  `kredit_tambahan` decimal(7,3) DEFAULT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `sk_nomor` varchar(200) DEFAULT NULL,
  `sk_tanggal` date DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_jafung`),
  KEY `tmt_golongan` (`tmt_golongan`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_peg_jafung` (`id_peg_jafung`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_jafung_aju"
#

CREATE TABLE `r_peg_jafung_aju` (
  `id_jafung` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `id_peg_jafung` int(11) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `permohonan` text NOT NULL,
  `sk_jafung` text NOT NULL,
  `ijin_belajar` text NOT NULL,
  `diklat` text NOT NULL,
  `ijazah` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  `terima` int(2) NOT NULL DEFAULT '0',
  `nama_pimpinan_ijin` text NOT NULL,
  `jabatan_pimpinan_ijin` text NOT NULL,
  `tahun_ijin` varchar(255) NOT NULL,
  `nomor_pimpinan_ijin` text NOT NULL,
  `tanggal_surat_ijin` text NOT NULL,
  `nama_pemohon` text NOT NULL,
  `jabatan_pemohon` text NOT NULL,
  `tanggal_surat_permohonan` text NOT NULL,
  `nama_pejabat_sk_jafung` text NOT NULL,
  `jabatan_sk_jafung` text NOT NULL,
  `nomor_sk_jafung` text NOT NULL,
  `tanggal_sk_jafung` text NOT NULL,
  `nama_penandatangan_ijazah` text NOT NULL,
  `jabatan_ijazah` text NOT NULL,
  `nomor_ijazah` text NOT NULL,
  `tanggal_ijazah` text NOT NULL,
  `nama_pimpinan_ijin_belajar` text NOT NULL,
  `jabatan_ijin_belajar` text NOT NULL,
  `nomor_ijin_belajar` text NOT NULL,
  `tanggal_ijin_belajar` text NOT NULL,
  `nama_pimpinan_diklat` text NOT NULL,
  `jabatan_pimpinan_diklat` text NOT NULL,
  `nomor_diklat` text NOT NULL,
  `tanggal_diklat` text NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `penyetuju` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jafung`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_unor` (`id_unor`),
  KEY `id_tpp` (`id_jafung`),
  KEY `status` (`status`),
  KEY `id_ib` (`id_jafung`),
  KEY `kode_golongan` (`kode_golongan`),
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`),
  KEY `id_peg_golongan` (`id_peg_jafung`),
  KEY `jab_type` (`jab_type`),
  KEY `tugas_tambahan` (`tugas_tambahan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_jafung_catatan"
#

CREATE TABLE `r_peg_jafung_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jafung` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_jafung`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_jafung_dokumen"
#

CREATE TABLE `r_peg_jafung_dokumen` (
  `id_jafung_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_jafung` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `jafung_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_jafung_dokumen`),
  KEY `id_ib` (`id_jafung`),
  KEY `halaman` (`halaman`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_karis_karsu"
#

CREATE TABLE `r_peg_karis_karsu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peg_perkawinan` int(11) NOT NULL,
  `pejabat` varchar(255) DEFAULT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_peg_perkawinan`,`tanggal`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_karis_karsu_aju"
#

CREATE TABLE `r_peg_karis_karsu_aju` (
  `id_karis_karsu` int(10) NOT NULL AUTO_INCREMENT,
  `id_peg_perkawinan` int(11) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `buku_nikah_suami` text NOT NULL,
  `buku_nikah_istri` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_karis_karsu`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `tahun` (`id_peg_perkawinan`) USING BTREE,
  KEY `id_tpp` (`id_karis_karsu`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_karis_karsu`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_karis_karsu_catatan"
#

CREATE TABLE `r_peg_karis_karsu_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_karis_karsu` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_karis_karsu`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_karis_karsu_dokumen"
#

CREATE TABLE `r_peg_karis_karsu_dokumen` (
  `id_karis_karsu_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_karis_karsu` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `karis_karsu_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_karis_karsu_dokumen`),
  KEY `id_ib` (`id_karis_karsu`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_karpeg"
#

CREATE TABLE `r_peg_karpeg` (
  `id_karpeg` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `karpeg_pejabat` varchar(255) DEFAULT NULL,
  `karpeg_nomor` varchar(100) DEFAULT NULL,
  `karpeg_tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_karpeg`),
  KEY `id_pegawai` (`id_pegawai`,`karpeg_tanggal`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11544 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_karpeg_aju"
#

CREATE TABLE `r_peg_karpeg_aju` (
  `id_karpeg` int(11) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_karpeg`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `id_tpp` (`id_karpeg`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_karpeg`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_karpeg_catatan"
#

CREATE TABLE `r_peg_karpeg_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_karpeg` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_karpeg`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_karpeg_dokumen"
#

CREATE TABLE `r_peg_karpeg_dokumen` (
  `id_karpeg_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_karpeg` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `karpeg_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_karpeg_dokumen`),
  KEY `id_ib` (`id_karpeg`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_kgb"
#

CREATE TABLE `r_peg_kgb` (
  `id_kgb` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `gaji_lama` int(11) DEFAULT NULL,
  `gaji_baru` int(11) DEFAULT NULL,
  `tmt_gaji` date DEFAULT NULL,
  `no_sk` varchar(100) DEFAULT '',
  `tanggal_sk` date DEFAULT NULL,
  `oleh_pejabat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kgb`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=47115 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_kgb_val"
#

CREATE TABLE `r_peg_kgb_val` (
  `id_kgb_val` int(11) NOT NULL AUTO_INCREMENT,
  `id_kgb` int(11) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id_kgb_val`)
) ENGINE=InnoDB AUTO_INCREMENT=595 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_konversi_nip"
#

CREATE TABLE `r_peg_konversi_nip` (
  `id_konversi_nip` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `konversi_nip_pejabat` varchar(255) DEFAULT NULL,
  `konversi_nip_nomor` varchar(100) DEFAULT NULL,
  `konversi_nip_tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_konversi_nip`),
  KEY `id_pegawai` (`id_pegawai`,`konversi_nip_tanggal`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1663 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_kpo_aju"
#

CREATE TABLE `r_peg_kpo_aju` (
  `id_kpo` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `id_peg_golongan` int(11) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `tahun_periode` year(4) NOT NULL,
  `bulan_periode` tinyint(4) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  `done` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kpo`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `id_tpp` (`id_kpo`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_kpo`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE,
  KEY `tahun_periode` (`tahun_periode`) USING BTREE,
  KEY `bulan_periode` (`bulan_periode`) USING BTREE,
  KEY `id_peg_golongan` (`id_peg_golongan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2593 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_kpo_catatan"
#

CREATE TABLE `r_peg_kpo_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kpo` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_kpo`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_kpo_dokumen"
#

CREATE TABLE `r_peg_kpo_dokumen` (
  `id_kpo_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_kpo` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `kpo_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_kpo_dokumen`),
  KEY `id_ib` (`id_kpo`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3377 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_kpt_inggris"
#

CREATE TABLE `r_peg_kpt_inggris` (
  `id_peg_inggris` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `bicara` varchar(56) DEFAULT NULL,
  `tulis` varchar(56) DEFAULT NULL,
  `dengar` varchar(56) DEFAULT NULL,
  `baca` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_inggris`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_kpt_tik"
#

CREATE TABLE `r_peg_kpt_tik` (
  `id_peg_komputer` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `kata` varchar(56) DEFAULT NULL,
  `tabel` varchar(56) DEFAULT NULL,
  `presentasi` varchar(56) DEFAULT NULL,
  `data` varchar(56) DEFAULT NULL,
  `grafis` varchar(56) DEFAULT NULL,
  `video` varchar(56) NOT NULL,
  `konstruksi` varchar(56) DEFAULT NULL,
  `pemetaan` varchar(56) DEFAULT NULL,
  `email` varchar(56) NOT NULL,
  `alih_bahasa` varchar(56) NOT NULL,
  `pesan_teks` varchar(56) NOT NULL,
  `video_call` varchar(56) NOT NULL,
  `gps` varchar(56) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_komputer`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_kursus"
#

CREATE TABLE `r_peg_kursus` (
  `id_peg_kursus` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` int(11) NOT NULL,
  `id_rumpun` int(11) NOT NULL,
  `id_pegawai` int(14) NOT NULL,
  `jenis_kursus` varchar(120) NOT NULL,
  `jenjang_kursus` varchar(120) NOT NULL,
  `nama_kursus` varchar(120) NOT NULL,
  `tempat_kursus` varchar(50) NOT NULL,
  `penyelenggara` varchar(120) NOT NULL,
  `tahun` year(4) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `tmt_kursus` date NOT NULL,
  `tst_kursus` date NOT NULL,
  `jam` decimal(5,2) NOT NULL,
  `nomor_sertifikat` varchar(30) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id_peg_kursus`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=611 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_laporan_cuti_val"
#

CREATE TABLE `r_peg_laporan_cuti_val` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_setting` int(11) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=1672 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_npwp"
#

CREATE TABLE `r_peg_npwp` (
  `id_npwp` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `npwp_pejabat` varchar(255) DEFAULT NULL,
  `npwp_nomor` varchar(100) DEFAULT NULL,
  `npwp_tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_npwp`),
  KEY `id_pegawai` (`id_pegawai`,`npwp_tanggal`)
) ENGINE=MyISAM AUTO_INCREMENT=2089 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_pak"
#

CREATE TABLE `r_peg_pak` (
  `id_pak` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `penilai_nama_pegawai` varchar(50) NOT NULL,
  `ak` decimal(9,4) NOT NULL,
  `ak_kumulatif` decimal(9,4) NOT NULL,
  `status` varchar(56) NOT NULL,
  PRIMARY KEY (`id_pak`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1069 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_pendidikan"
#

CREATE TABLE `r_peg_pendidikan` (
  `id_peg_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `kode_jenjang` varchar(4) DEFAULT NULL,
  `nama_jenjang` varchar(255) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(255) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(255) DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL,
  `nomor_ijazah` varchar(100) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `lokasi_sekolah` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(100) DEFAULT NULL,
  `gelar_belakang` varchar(100) DEFAULT NULL,
  `pendidikan_pertama` varchar(2) DEFAULT NULL,
  `diakui` varchar(2) NOT NULL DEFAULT 'V',
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_pendidikan`)
) ENGINE=MyISAM AUTO_INCREMENT=50634 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_penghargaan"
#

CREATE TABLE `r_peg_penghargaan` (
  `id_peg_penghargaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumpun` int(11) NOT NULL,
  `id_pegawai` int(14) NOT NULL,
  `nama_penghargaan` varchar(255) NOT NULL,
  `tempat_penghargaan` varchar(255) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `nomor_sertifikat` varchar(30) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id_peg_penghargaan`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8136 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_pensiun_aju"
#

CREATE TABLE `r_peg_pensiun_aju` (
  `id_pensiun` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `kode_jenis_pensiun` tinyint(4) NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pensiun`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `id_tpp` (`id_pensiun`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_pensiun`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE,
  KEY `kode_golongan_aju` (`kode_jenis_pensiun`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_pensiun_catatan"
#

CREATE TABLE `r_peg_pensiun_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pensiun` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_pensiun`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_pensiun_dokumen"
#

CREATE TABLE `r_peg_pensiun_dokumen` (
  `id_pensiun_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_pensiun` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `pensiun_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_pensiun_dokumen`),
  KEY `id_ib` (`id_pensiun`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_penyesuaian_ijazah"
#

CREATE TABLE `r_peg_penyesuaian_ijazah` (
  `id_peg_penyesuaian_ijazah` int(11) NOT NULL AUTO_INCREMENT,
  `id_pi` int(11) NOT NULL,
  `id_pegawai` int(14) NOT NULL,
  `nama_penyesuaian_ijazah` varchar(255) NOT NULL,
  `tempat_penyesuaian_ijazah` varchar(255) NOT NULL,
  `tanggal_penyesuaian_ijazah` date NOT NULL,
  `nomor_sertifikat` varchar(30) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  PRIMARY KEY (`id_peg_penyesuaian_ijazah`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_penyesuaian_ijazah_aju"
#

CREATE TABLE `r_peg_penyesuaian_ijazah_aju` (
  `id_pi` int(10) NOT NULL AUTO_INCREMENT,
  `id_ibel` int(11) NOT NULL,
  `nomor_ijazah` varchar(32) DEFAULT NULL,
  `tanggal_ijazah` date DEFAULT NULL,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) DEFAULT NULL,
  `gelar_belakang` varchar(25) DEFAULT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) DEFAULT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `jab_type` varchar(24) DEFAULT NULL,
  `nomenklatur_jabatan` varchar(255) DEFAULT NULL,
  `ijin_pimpinan` text NOT NULL,
  `akreditasi` text NOT NULL,
  `jadwal` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pi`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `id_tpp` (`id_pi`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_pi`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE,
  KEY `id_ibel` (`id_ibel`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_penyesuaian_ijazah_catatan"
#

CREATE TABLE `r_peg_penyesuaian_ijazah_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pi` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_pi`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_penyesuaian_ijazah_dokumen"
#

CREATE TABLE `r_peg_penyesuaian_ijazah_dokumen` (
  `id_pi_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_pi` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `pi_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_pi_dokumen`),
  KEY `id_ib` (`id_pi`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_perkawinan"
#

CREATE TABLE `r_peg_perkawinan` (
  `id_peg_perkawinan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `nama_suris` varchar(50) NOT NULL,
  `tempat_lahir_suris` varchar(30) NOT NULL,
  `tanggal_lahir_suris` date DEFAULT NULL,
  `tanggal_menikah` date DEFAULT NULL,
  `pendidikan_suris` varchar(30) NOT NULL,
  `pekerjaan_suris` varchar(30) NOT NULL,
  `keterangan` varchar(75) NOT NULL,
  `status` varchar(7) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_perkawinan`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11740 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_pertek"
#

CREATE TABLE `r_peg_pertek` (
  `id_pertek` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `pertek_pejabat` varchar(255) DEFAULT NULL,
  `pertek_nomor` varchar(100) DEFAULT NULL,
  `pertek_tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pertek`),
  KEY `id_pegawai` (`id_pegawai`,`pertek_tanggal`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_pns"
#

CREATE TABLE `r_peg_pns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `tmt_pns` date NOT NULL,
  `id_sk_pns` int(11) NOT NULL,
  `sk_pns_pejabat` varchar(255) DEFAULT NULL,
  `sk_pns_nomor` varchar(100) DEFAULT NULL,
  `sk_pns_tanggal` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`,`status`) USING BTREE,
  KEY `id_sk_jabatan` (`id_sk_pns`) USING BTREE,
  KEY `tmt_pns` (`tmt_pns`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22969 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_pupns"
#

CREATE TABLE `r_peg_pupns` (
  `id_pupns` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `pupns_pejabat` varchar(255) DEFAULT NULL,
  `pupns_nomor` varchar(100) DEFAULT NULL,
  `pupns_tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pupns`),
  KEY `id_pegawai` (`id_pegawai`,`pupns_tanggal`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=742 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_rekomendasi"
#

CREATE TABLE `r_peg_rekomendasi` (
  `id_peg_rekomendasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `rekomendasi` text,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_peg_rekomendasi`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_spj_kegiatan"
#

CREATE TABLE `r_peg_spj_kegiatan` (
  `id_spj_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `nomor_dpa` varchar(20) NOT NULL,
  `judul_dpa` varchar(128) NOT NULL,
  `nip_pptk` varchar(20) NOT NULL,
  `nama_pptk` varchar(50) NOT NULL,
  `status` varchar(56) NOT NULL,
  PRIMARY KEY (`id_spj_kegiatan`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_penilai` (`judul_dpa`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_taspen"
#

CREATE TABLE `r_peg_taspen` (
  `id_taspen` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `taspen_pejabat` varchar(255) DEFAULT NULL,
  `taspen_nomor` varchar(100) DEFAULT NULL,
  `taspen_tanggal` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_taspen`),
  KEY `id_pegawai` (`id_pegawai`,`taspen_tanggal`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11596 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_tubel"
#

CREATE TABLE `r_peg_tubel` (
  `id_peg_tubel` int(11) NOT NULL AUTO_INCREMENT,
  `id_tubel` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `univ` text,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `penandatangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_peg_tubel`),
  KEY `id_ib` (`id_tubel`) USING BTREE,
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_tubel_aju"
#

CREATE TABLE `r_peg_tubel_aju` (
  `id_tubel` int(10) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `tmt_pangkat` date NOT NULL,
  `id_unor` int(11) NOT NULL,
  `kode_unor` varchar(64) NOT NULL,
  `nomenklatur_pada` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `jab_type` varchar(24) NOT NULL,
  `kode_ese` varchar(8) DEFAULT NULL,
  `tmt_ese` date NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `ijin_pimpinan` text NOT NULL,
  `akreditasi` text NOT NULL,
  `jadwal` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tubel`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `tahun` (`tahun`) USING BTREE,
  KEY `id_tpp` (`id_tubel`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_tubel`) USING BTREE,
  KEY `kode_unor` (`kode_unor`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `tmt_pangkat` (`tmt_pangkat`) USING BTREE,
  KEY `nomenklatur_pada` (`nomenklatur_pada`) USING BTREE,
  KEY `tmt_jabatan` (`tmt_jabatan`) USING BTREE,
  KEY `kode_ese` (`kode_ese`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_tubel_catatan"
#

CREATE TABLE `r_peg_tubel_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tubel` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_tubel`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_tubel_dokumen"
#

CREATE TABLE `r_peg_tubel_dokumen` (
  `id_tubel_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_tubel` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `tubel_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_tubel_dokumen`),
  KEY `id_ib` (`id_tubel`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_tubel_sekolah"
#

CREATE TABLE `r_peg_tubel_sekolah` (
  `id_tubel_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `id_tubel` int(11) NOT NULL,
  `nama_jenjang` varchar(255) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(255) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `lokasi_sekolah` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(100) DEFAULT NULL,
  `gelar_belakang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tubel_sekolah`),
  KEY `id_ib` (`id_tubel`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ubina_val"
#

CREATE TABLE `r_peg_ubina_val` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_setting` int(11) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_setting` (`id_setting`,`nama_item`,`tanggal`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ujian_dinas"
#

CREATE TABLE `r_peg_ujian_dinas` (
  `id_peg_ujian_dinas` int(11) NOT NULL AUTO_INCREMENT,
  `id_udin` int(11) NOT NULL,
  `id_pegawai` int(14) NOT NULL,
  `nama_ujian_dinas` varchar(255) NOT NULL,
  `tempat_ujian_dinas` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `tanggal_ujian_dinas` date NOT NULL,
  `nomor_sertifikat` varchar(30) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  PRIMARY KEY (`id_peg_ujian_dinas`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_ujian_dinas_aju"
#

CREATE TABLE `r_peg_ujian_dinas_aju` (
  `id_udin` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) DEFAULT NULL,
  `gelar_belakang` varchar(25) DEFAULT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `id_unor` int(11) DEFAULT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `jab_type` varchar(24) DEFAULT NULL,
  `nomenklatur_jabatan` varchar(255) DEFAULT NULL,
  `ijin_pimpinan` text NOT NULL,
  `akreditasi` text NOT NULL,
  `jadwal` text NOT NULL,
  `status` varchar(56) NOT NULL,
  `buat` datetime NOT NULL,
  `draft` datetime DEFAULT NULL,
  `aju` datetime DEFAULT NULL,
  `koreksi` datetime DEFAULT NULL,
  `revisi` datetime DEFAULT NULL,
  `acc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_udin`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `id_tpp` (`id_udin`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `id_ib` (`id_udin`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `tugas_tambahan` (`tugas_tambahan`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ujian_dinas_catatan"
#

CREATE TABLE `r_peg_ujian_dinas_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_udin` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` varchar(56) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_pegawai` (`id_udin`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "r_peg_ujian_dinas_dokumen"
#

CREATE TABLE `r_peg_ujian_dinas_dokumen` (
  `id_udin_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_udin` int(11) NOT NULL,
  `tipe` varchar(56) DEFAULT NULL,
  `halaman` int(4) NOT NULL,
  `udin_file` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `sub_keterangan` text NOT NULL,
  PRIMARY KEY (`id_udin_dokumen`),
  KEY `id_ib` (`id_udin`) USING BTREE,
  KEY `halaman` (`halaman`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_peg_ujian_dinas_sekolah"
#

CREATE TABLE `r_peg_ujian_dinas_sekolah` (
  `id_udin_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `id_udin` int(11) NOT NULL,
  `nama_jenjang` varchar(255) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(255) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `nama_pendidikan` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `lokasi_sekolah` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(100) DEFAULT NULL,
  `gelar_belakang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_udin_sekolah`),
  KEY `id_ib` (`id_udin`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai"
#

CREATE TABLE `r_pegawai` (
  `id_pegawai` int(20) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nip_baru` varchar(20) DEFAULT NULL,
  `gelar_nonakademis` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `gol_darah` varchar(20) NOT NULL,
  `rhesus` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `nomor_hp` varchar(100) DEFAULT NULL,
  `nomor_tlp_rumah` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `status_kepegawaian` varchar(100) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `nama_lengkap` (`nama_pegawai`) USING BTREE,
  KEY `status_perkawinan` (`status_perkawinan`) USING BTREE,
  KEY `nip` (`nip`) USING BTREE,
  KEY `nip_baru` (`nip_baru`) USING BTREE,
  KEY `status_kepegawaian` (`status_kepegawaian`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23366 DEFAULT CHARSET=latin1;

#
# Structure for table "r_pegawai_aktual"
#

CREATE TABLE `r_pegawai_aktual` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(128) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(255) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_kepegawaian` varchar(100) DEFAULT NULL,
  `tmt_cpns` date NOT NULL,
  `tmt_pns` date NOT NULL,
  `kode_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `kode_unor` varchar(100) NOT NULL,
  `nama_unor` varchar(255) NOT NULL,
  `jab_type` varchar(100) NOT NULL COMMENT 'pilihan: js (jab. struktural), jfu (jab. fung. umum),jft (jab. fung. tertentu), jft-guru(jab. fung. tertentu guru)',
  `id_jenjang_jabatan` int(11) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `nomenklatur_pada` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) DEFAULT NULL,
  `tmt_jabatan` date NOT NULL,
  `kode_ese` int(4) NOT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `tmt_ese` date NOT NULL,
  `nama_jenjang` varchar(100) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(100) DEFAULT NULL,
  `tanggal_lulus` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `nip_baru` (`nip_baru`),
  KEY `jab_type` (`jab_type`),
  KEY `id_unor` (`id_unor`),
  KEY `kode_ese` (`kode_ese`),
  KEY `kode_unor` (`kode_unor`),
  KEY `kode_golongan` (`kode_golongan`),
  KEY `nama_jenjang_rumpun` (`nama_jenjang_rumpun`),
  KEY `gender` (`gender`),
  KEY `status_perkawinan` (`status_perkawinan`),
  KEY `tmt_pns` (`tmt_pns`),
  KEY `nama_jenjang` (`nama_jenjang`),
  KEY `status_kepegawaian` (`status_kepegawaian`),
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`)
) ENGINE=MyISAM AUTO_INCREMENT=23410 DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai_bulanan"
#

CREATE TABLE `r_pegawai_bulanan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bulan` tinyint(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `kode_golongan` int(11) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `id_unor` int(11) NOT NULL,
  `kode_unor` varchar(100) NOT NULL,
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `jab_type` varchar(100) NOT NULL COMMENT 'pilihan: js (jab. struktural), jfu (jab. fung. umum),jft (jab. fung. tertentu), jft-guru(jab. fung. tertentu guru)',
  `id_jenjang_jabatan` int(11) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `kode_ese` int(4) NOT NULL,
  `tmt_ese` date NOT NULL,
  `status_kepegawaian` varchar(100) DEFAULT NULL,
  `nama_jenjang` varchar(100) DEFAULT NULL,
  `reff_jabatan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `kode_ese` (`kode_ese`) USING BTREE,
  KEY `kode_unor` (`kode_unor`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `status_perkawinan` (`status_perkawinan`) USING BTREE,
  KEY `nama_jenjang` (`nama_jenjang`) USING BTREE,
  KEY `tmt_ese` (`tmt_ese`) USING BTREE,
  KEY `bulan` (`bulan`) USING BTREE,
  KEY `tahun` (`tahun`) USING BTREE,
  KEY `tmt_pangkat` (`tmt_pangkat`) USING BTREE,
  KEY `status_kepegawaian` (`status_kepegawaian`) USING BTREE,
  KEY `reff_jabatan` (`reff_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7261173 DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai_cltn"
#

CREATE TABLE `r_pegawai_cltn` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tanggal_pensiun` date NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `jenis_pensiun` varchar(200) NOT NULL,
  `var_rekap_peg` text NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai_keluar"
#

CREATE TABLE `r_pegawai_keluar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `instansi_tujuan` varchar(200) NOT NULL,
  `var_r_pegawai_rekap` text NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2358 DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai_meninggal"
#

CREATE TABLE `r_pegawai_meninggal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tempat_meninggal` varchar(100) NOT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `sebab_meninggal` varchar(200) NOT NULL,
  `var_r_pegawai_rekap` text NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai_pensiun"
#

CREATE TABLE `r_pegawai_pensiun` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tanggal_pensiun` date NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `jenis_pensiun` varchar(200) NOT NULL,
  `bkn_nomor` varchar(48) DEFAULT NULL,
  `bkn_tanggal` date DEFAULT NULL,
  `mk_gol_tahun` tinyint(2) DEFAULT NULL,
  `mk_gol_bulan` tinyint(2) DEFAULT NULL,
  `var_r_pegawai_rekap` text NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  `status` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `tanggal_pensiun` (`tanggal_pensiun`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5756 DEFAULT CHARSET=utf8;

#
# Structure for table "r_pegawai_rekap_baru"
#

CREATE TABLE `r_pegawai_rekap_baru` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(20) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nip_baru` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar_nonakademis` varchar(25) DEFAULT NULL,
  `gelar_depan` varchar(25) NOT NULL,
  `gelar_belakang` varchar(25) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_kepegawaian` varchar(100) DEFAULT NULL,
  `tmt_cpns` date NOT NULL,
  `tmt_pns` date NOT NULL,
  `kode_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `mk_gol_tahun` int(3) DEFAULT NULL,
  `mk_gol_bulan` int(3) DEFAULT NULL,
  `id_unor` int(11) NOT NULL,
  `kode_unor` varchar(100) NOT NULL,
  `nama_unor` varchar(255) NOT NULL,
  `jab_type` varchar(100) NOT NULL COMMENT 'pilihan: js (jab. struktural), jfu (jab. fung. umum),jft (jab. fung. tertentu), jft-guru(jab. fung. tertentu guru)',
  `nomenklatur_jabatan` varchar(255) NOT NULL,
  `nomenklatur_pada` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) DEFAULT NULL,
  `tmt_jabatan` date NOT NULL,
  `kode_ese` int(4) NOT NULL,
  `nama_ese` varchar(100) DEFAULT NULL,
  `tmt_ese` date DEFAULT NULL,
  `nama_jenjang` varchar(100) DEFAULT NULL,
  `nama_jenjang_rumpun` varchar(100) DEFAULT NULL,
  `tanggal_lulus` date NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`) USING BTREE,
  KEY `nip_baru` (`nip_baru`) USING BTREE,
  KEY `jab_type` (`jab_type`) USING BTREE,
  KEY `id_unor` (`id_unor`) USING BTREE,
  KEY `kode_ese` (`kode_ese`) USING BTREE,
  KEY `kode_unor` (`kode_unor`) USING BTREE,
  KEY `kode_golongan` (`kode_golongan`) USING BTREE,
  KEY `nama_jenjang_rumpun` (`nama_jenjang_rumpun`) USING BTREE,
  KEY `gender` (`gender`) USING BTREE,
  KEY `status_perkawinan` (`status_perkawinan`) USING BTREE,
  KEY `tmt_pns` (`tmt_pns`) USING BTREE,
  KEY `nama_jenjang` (`nama_jenjang`) USING BTREE,
  KEY `status_kepegawaian` (`status_kepegawaian`) USING BTREE,
  KEY `nomenklatur_jabatan` (`nomenklatur_jabatan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=43613 DEFAULT CHARSET=utf8;

#
# Structure for table "rjabatan"
#

CREATE TABLE `rjabatan` (
  `NIP` char(18) NOT NULL,
  `JnsJab` char(1) DEFAULT NULL,
  `TMTJab` datetime NOT NULL,
  `NSKJabat` char(50) DEFAULT NULL,
  `TSKJabat` datetime DEFAULT NULL,
  `KESelon` decimal(2,0) DEFAULT NULL,
  `KJab` char(6) DEFAULT NULL,
  `TMTEselon` datetime DEFAULT NULL,
  `KPej` decimal(4,0) DEFAULT NULL,
  `NJab` char(255) DEFAULT NULL,
  `NUnKer` char(255) DEFAULT NULL,
  `JSuspim` char(1) DEFAULT NULL,
  `NmInstansi` char(60) DEFAULT NULL,
  `Tunjangan` int(11) DEFAULT NULL,
  `AKredit` char(20) DEFAULT NULL,
  `NLantik` char(50) DEFAULT NULL,
  `TLantik` datetime DEFAULT NULL,
  `SJab` int(11) DEFAULT NULL,
  `RincUnit1` char(6) DEFAULT NULL,
  `user_id` char(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`NIP`,`TMTJab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "rpangkat"
#

CREATE TABLE `rpangkat` (
  `NIP` char(18) NOT NULL,
  `NNtBAKN` char(100) DEFAULT NULL,
  `TNtBAKN` datetime DEFAULT NULL,
  `AKredit` char(10) DEFAULT NULL,
  `PTetap` decimal(4,0) DEFAULT NULL,
  `NSKPang` char(50) DEFAULT NULL,
  `TSKPang` datetime DEFAULT NULL,
  `TMTPang` datetime NOT NULL,
  `KGolRu` decimal(3,0) NOT NULL,
  `KNPang` decimal(2,0) DEFAULT NULL,
  `MsKerja` decimal(18,0) DEFAULT NULL,
  `Gpok` decimal(18,0) DEFAULT NULL,
  `blnkerja` decimal(18,0) DEFAULT NULL,
  `user_id` char(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`NIP`,`KGolRu`,`TMTPang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "rpegawai"
#

CREATE TABLE `rpegawai` (
  `NIP` char(18) NOT NULL,
  `NIP_LAMA` char(9) NOT NULL,
  `Nama` char(50) DEFAULT NULL,
  `GlDepan` char(15) DEFAULT NULL,
  `GlBlk` char(15) DEFAULT NULL,
  `KTLahir` char(50) DEFAULT NULL,
  `TLahir` datetime DEFAULT NULL,
  `KJKel` decimal(1,0) DEFAULT NULL,
  `KAgama` decimal(1,0) DEFAULT NULL,
  `KStatus` decimal(1,0) DEFAULT NULL,
  `KJPeg` decimal(2,0) DEFAULT NULL,
  `KDuduk` decimal(2,0) DEFAULT NULL,
  `KSKawin` decimal(1,0) DEFAULT NULL,
  `Suku` char(30) DEFAULT NULL,
  `KGolDar` decimal(1,0) DEFAULT NULL,
  `AlJalan` char(255) DEFAULT NULL,
  `AlRT` char(7) DEFAULT NULL,
  `AlRW` char(7) DEFAULT NULL,
  `AlTelp` char(15) DEFAULT NULL,
  `AlKoProp` char(2) DEFAULT NULL,
  `AlKoProp2` char(200) NOT NULL,
  `AlKoKab` char(2) DEFAULT NULL,
  `AlKoKab2` char(200) NOT NULL,
  `AlKoKec` char(2) DEFAULT NULL,
  `AlKoKec2` char(200) NOT NULL,
  `AlKoDes` char(4) DEFAULT NULL,
  `AlKoDes2` char(200) NOT NULL,
  `KPos` char(5) DEFAULT NULL,
  `NKarpeg` char(50) DEFAULT NULL,
  `NAskes` char(50) DEFAULT NULL,
  `NTaspen` char(50) DEFAULT NULL,
  `NKaris_su` char(50) DEFAULT NULL,
  `NPWP` char(50) DEFAULT NULL,
  `Nopen` char(50) DEFAULT NULL,
  `File_Bmp` char(50) DEFAULT NULL,
  `Aktif` decimal(1,0) DEFAULT NULL,
  `JJiwa` decimal(2,0) DEFAULT NULL,
  `JTang` decimal(2,0) DEFAULT NULL,
  `CatMut` char(1) DEFAULT NULL,
  `KabLahir` char(4) DEFAULT NULL,
  `HukDis` char(2) DEFAULT NULL,
  `THarga` char(1) DEFAULT NULL,
  `AngProfesi` char(1) DEFAULT NULL,
  `AngSosial` char(1) DEFAULT NULL,
  `AngParpol` char(1) DEFAULT NULL,
  `NIPIsMi` char(9) DEFAULT NULL,
  `EMail` varchar(50) DEFAULT NULL,
  `user_id` char(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `TMTPensiun` date NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "rpendum"
#

CREATE TABLE `rpendum` (
  `NIP` char(18) NOT NULL,
  `KJur` char(7) NOT NULL,
  `NSek` char(50) DEFAULT NULL,
  `Tempat` char(50) DEFAULT NULL,
  `NKepsek` char(50) DEFAULT NULL,
  `NSTTB` char(50) DEFAULT NULL,
  `TSTTB2` char(8) DEFAULT NULL,
  `TSTTB` datetime DEFAULT NULL,
  `IsAkhir` int(11) DEFAULT NULL,
  `NPdUm` char(70) DEFAULT NULL,
  `user_id` char(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`NIP`,`KJur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
