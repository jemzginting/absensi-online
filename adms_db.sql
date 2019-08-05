# Host: localhost  (Version 5.6.21)
# Date: 2019-08-05 21:48:18
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "attcalclog"
#

CREATE TABLE `attcalclog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DeptID` int(11) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime NOT NULL,
  `OperTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "attexception"
#

CREATE TABLE `attexception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `ExceptionID` int(11) DEFAULT NULL,
  `AuditExcID` int(11) DEFAULT NULL,
  `OldAuditExcID` int(11) DEFAULT NULL,
  `OverlapTime` int(11) DEFAULT NULL,
  `TimeLong` int(11) DEFAULT NULL,
  `InScopeTime` int(11) DEFAULT NULL,
  `AttDate` datetime DEFAULT NULL,
  `OverlapWorkDayTail` int(11) NOT NULL,
  `OverlapWorkDay` double DEFAULT NULL,
  `schindex` int(11) DEFAULT NULL,
  `Minsworkday` int(11) DEFAULT NULL,
  `schid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserId` (`UserId`,`AttDate`,`StartTime`),
  KEY `attexception_UserId` (`UserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "attparam"
#

CREATE TABLE `attparam` (
  `ParaName` varchar(20) NOT NULL,
  `ParaType` varchar(2) DEFAULT NULL,
  `ParaValue` varchar(100) NOT NULL,
  PRIMARY KEY (`ParaName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "attrecabnormite"
#

CREATE TABLE `attrecabnormite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `checktime` datetime NOT NULL,
  `CheckType` varchar(2) NOT NULL,
  `NewType` varchar(2) DEFAULT NULL,
  `AbNormiteID` int(11) DEFAULT NULL,
  `SchID` int(11) DEFAULT NULL,
  `OP` int(11) DEFAULT NULL,
  `AttDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`AttDate`,`checktime`),
  KEY `attrecabnormite_userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "attshifts"
#

CREATE TABLE `attshifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `SchIndex` int(11) DEFAULT NULL,
  `AutoSch` smallint(6) DEFAULT NULL,
  `AttDate` datetime NOT NULL,
  `SchId` int(11) DEFAULT NULL,
  `ClockInTime` datetime NOT NULL,
  `ClockOutTime` datetime NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `WorkDay` double DEFAULT NULL,
  `RealWorkDay` double DEFAULT NULL,
  `NoIn` smallint(6) DEFAULT NULL,
  `NoOut` smallint(6) DEFAULT NULL,
  `Late` int(11) DEFAULT NULL,
  `Early` int(11) DEFAULT NULL,
  `Absent` int(11) DEFAULT NULL,
  `OverTime` int(11) DEFAULT NULL,
  `WorkTime` int(11) DEFAULT NULL,
  `ExceptionID` int(11) DEFAULT NULL,
  `Symbol` varchar(10) DEFAULT NULL,
  `MustIn` smallint(6) DEFAULT NULL,
  `MustOut` smallint(6) DEFAULT NULL,
  `OverTime1` int(11) DEFAULT NULL,
  `WorkMins` int(11) DEFAULT NULL,
  `SSpeDayNormal` double DEFAULT NULL,
  `SSpeDayWeekend` double DEFAULT NULL,
  `SSpeDayHoliday` double DEFAULT NULL,
  `AttTime` int(11) DEFAULT NULL,
  `SSpeDayNormalOT` double DEFAULT NULL,
  `SSpeDayWeekendOT` double DEFAULT NULL,
  `SSpeDayHolidayOT` double DEFAULT NULL,
  `AbsentMins` int(11) DEFAULT NULL,
  `AttChkTime` varchar(10) DEFAULT NULL,
  `AbsentR` double DEFAULT NULL,
  `ScheduleName` varchar(20) DEFAULT NULL,
  `IsConfirm` smallint(6) DEFAULT NULL,
  `IsRead` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`AttDate`,`SchId`),
  KEY `attshifts_userid` (`userid`),
  KEY `attshifts_SchId` (`SchId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "auditedexc"
#

CREATE TABLE `auditedexc` (
  `AEID` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `checktime` datetime NOT NULL,
  `Utime` datetime NOT NULL,
  `NewExcID` smallint(6) NOT NULL,
  `IsLeave` smallint(6) NOT NULL,
  `UName` varchar(20) NOT NULL,
  PRIMARY KEY (`AEID`),
  KEY `auditedexc_UserId` (`UserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "auth_group"
#

CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for table "auth_group_permissions"
#

CREATE TABLE `auth_group_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`group_id`,`permission_id`),
  KEY `permission_id_refs_id_5886d21f` (`permission_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

#
# Structure for table "auth_message"
#

CREATE TABLE `auth_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_message_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "auth_permission"
#

CREATE TABLE `auth_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_type_id` (`content_type_id`,`codename`),
  KEY `auth_permission_content_type_id` (`content_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

#
# Structure for table "auth_user"
#

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

#
# Structure for table "auth_user_groups"
#

CREATE TABLE `auth_user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`group_id`),
  KEY `group_id_refs_id_f116770` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

#
# Structure for table "auth_user_user_permissions"
#

CREATE TABLE `auth_user_user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`permission_id`),
  KEY `permission_id_refs_id_67e79cb` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "checkexact"
#

CREATE TABLE `checkexact` (
  `EXACTID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `CHECKTIME` datetime DEFAULT NULL,
  `CHECKTYPE` varchar(2) DEFAULT NULL,
  `ISADD` smallint(6) DEFAULT NULL,
  `YUYIN` varchar(25) DEFAULT NULL,
  `ISMODIFY` smallint(6) DEFAULT NULL,
  `ISDELETE` smallint(6) DEFAULT NULL,
  `INCOUNT` smallint(6) DEFAULT NULL,
  `ISCOUNT` smallint(6) DEFAULT NULL,
  `MODIFYBY` varchar(20) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`EXACTID`),
  KEY `checkexact_UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "checkinout"
#

CREATE TABLE `checkinout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `checktime` datetime NOT NULL,
  `checktype` varchar(1) NOT NULL,
  `verifycode` int(11) NOT NULL,
  `SN` varchar(20) DEFAULT NULL,
  `sensorid` varchar(5) DEFAULT NULL,
  `WorkCode` varchar(20) DEFAULT NULL,
  `Reserved` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`checktime`),
  KEY `checkinout_userid` (`userid`),
  KEY `checkinout_SN` (`SN`)
) ENGINE=MyISAM AUTO_INCREMENT=3821403 DEFAULT CHARSET=utf8;

#
# Structure for table "cte"
#

CREATE TABLE `cte` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `dateadd` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "daftar_kegiatan_luar"
#

CREATE TABLE `daftar_kegiatan_luar` (
  `id_daftar_kegiatan_luar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`id_daftar_kegiatan_luar`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Structure for table "daftar_opd_kegiatan_luar"
#

CREATE TABLE `daftar_opd_kegiatan_luar` (
  `id_daftar_opd_kegiatan_luar` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar_kegiatan_luar` int(11) NOT NULL,
  `nama_department` varchar(100) NOT NULL,
  `DeptID` int(11) NOT NULL,
  PRIMARY KEY (`id_daftar_opd_kegiatan_luar`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

#
# Structure for table "departments"
#

CREATE TABLE `departments` (
  `DeptID` int(11) NOT NULL,
  `DeptName` varchar(20) NOT NULL,
  `supdeptid` int(11) NOT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DeptID`),
  KEY `DEPTNAME` (`DeptName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "devcmds"
#

CREATE TABLE `devcmds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SN_id` varchar(20) NOT NULL,
  `CmdContent` longtext NOT NULL,
  `CmdCommitTime` datetime NOT NULL,
  `CmdTransTime` datetime DEFAULT NULL,
  `CmdOverTime` datetime DEFAULT NULL,
  `CmdReturn` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devcmds_SN_id` (`SN_id`),
  KEY `devcmds_User_id` (`User_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12230 DEFAULT CHARSET=utf8;

#
# Structure for table "devlog"
#

CREATE TABLE `devlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SN_id` varchar(20) NOT NULL,
  `OP` varchar(8) NOT NULL,
  `Object` varchar(20) DEFAULT NULL,
  `Cnt` int(11) NOT NULL,
  `ECnt` int(11) NOT NULL,
  `OpTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `devlog_SN_id` (`SN_id`)
) ENGINE=MyISAM AUTO_INCREMENT=357280 DEFAULT CHARSET=utf8;

#
# Structure for table "disposisi"
#

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `tgl_diterima` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `final` tinyint(1) NOT NULL DEFAULT '0',
  `final2` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

#
# Structure for table "divisi"
#

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `keterangan` double NOT NULL,
  `no_rekening` int(30) NOT NULL,
  `sisa_anggaran` double NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for table "django_admin_log"
#

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `object_id` longtext,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) unsigned NOT NULL,
  `change_message` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `django_admin_log_user_id` (`user_id`),
  KEY `django_admin_log_content_type_id` (`content_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "django_content_type"
#

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_label` (`app_label`,`model`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

#
# Structure for table "django_session"
#

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime NOT NULL,
  PRIMARY KEY (`session_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "dokumen"
#

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar_opd_kegiatan_luar` int(11) NOT NULL,
  `tipe` varchar(56) NOT NULL,
  `halaman` int(4) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

#
# Structure for table "excnotes"
#

CREATE TABLE `excnotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `AttDate` datetime DEFAULT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserID` (`UserID`,`AttDate`),
  UNIQUE KEY `EXCNOTE` (`UserID`,`AttDate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "golongan"
#

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_golongan` varchar(255) NOT NULL DEFAULT '',
  `pangkat` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Structure for table "holidays"
#

CREATE TABLE `holidays` (
  `HolidayID` int(11) NOT NULL AUTO_INCREMENT,
  `HolidayName` varchar(20) DEFAULT NULL,
  `HolidayYear` smallint(6) DEFAULT NULL,
  `HolidayMonth` smallint(6) DEFAULT NULL,
  `HolidayDay` smallint(6) DEFAULT NULL,
  `StartTime` date DEFAULT NULL,
  `Duration` smallint(6) DEFAULT NULL,
  `HolidayType` smallint(6) DEFAULT NULL,
  `XINBIE` varchar(4) DEFAULT NULL,
  `MINZU` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`HolidayID`),
  UNIQUE KEY `HolidayName` (`HolidayName`,`StartTime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock"
#

CREATE TABLE `iclock` (
  `SN` varchar(20) NOT NULL,
  `State` int(11) NOT NULL,
  `LastActivity` datetime DEFAULT NULL,
  `TransTimes` varchar(50) DEFAULT NULL,
  `TransInterval` int(11) NOT NULL,
  `LogStamp` varchar(20) DEFAULT NULL,
  `OpLogStamp` varchar(20) DEFAULT NULL,
  `PhotoStamp` varchar(20) DEFAULT NULL,
  `Alias` varchar(20) NOT NULL,
  `DeptID` int(11) DEFAULT NULL,
  `UpdateDB` varchar(200) NOT NULL,
  `Style` varchar(20) DEFAULT NULL,
  `FWVersion` varchar(30) DEFAULT NULL,
  `FPCount` int(11) DEFAULT NULL,
  `TransactionCount` int(11) DEFAULT NULL,
  `UserCount` int(11) DEFAULT NULL,
  `MainTime` varchar(20) DEFAULT NULL,
  `MaxFingerCount` int(11) DEFAULT NULL,
  `MaxAttLogCount` int(11) DEFAULT NULL,
  `DeviceName` varchar(30) DEFAULT NULL,
  `AlgVer` varchar(30) DEFAULT NULL,
  `FlashSize` varchar(10) DEFAULT NULL,
  `FreeFlashSize` varchar(10) DEFAULT NULL,
  `Language` varchar(30) DEFAULT NULL,
  `VOLUME` varchar(10) DEFAULT NULL,
  `DtFmt` varchar(10) DEFAULT NULL,
  `IPAddress` varchar(20) DEFAULT NULL,
  `IsTFT` varchar(5) DEFAULT NULL,
  `Platform` varchar(20) DEFAULT NULL,
  `Brightness` varchar(5) DEFAULT NULL,
  `BackupDev` varchar(30) DEFAULT NULL,
  `OEMVendor` varchar(30) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `AccFun` smallint(6) NOT NULL,
  `TZAdj` smallint(6) NOT NULL,
  `DelTag` smallint(6) NOT NULL,
  `FPVersion` varchar(10) DEFAULT NULL,
  `PushVersion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SN`),
  KEY `iclock_DeptID` (`DeptID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_adminlog"
#

CREATE TABLE `iclock_adminlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `model` varchar(40) DEFAULT NULL,
  `action` varchar(40) NOT NULL,
  `object` varchar(40) DEFAULT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iclock_adminlog_User_id` (`User_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11542 DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_dataitem"
#

CREATE TABLE `iclock_dataitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataName` varchar(100) NOT NULL,
  `dbServer` varchar(100) NOT NULL,
  `contentType_id` int(11) NOT NULL,
  `format` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iclock_dataitem_contentType_id` (`contentType_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_deptadmin"
#

CREATE TABLE `iclock_deptadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iclock_deptadmin_user_id` (`user_id`),
  KEY `iclock_deptadmin_dept_id` (`dept_id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_exportdb"
#

CREATE TABLE `iclock_exportdb` (
  `expName` varchar(100) NOT NULL,
  `dbEngine` varchar(100) NOT NULL,
  `dbServer` varchar(100) NOT NULL,
  `dbName` varchar(100) NOT NULL,
  `dbUser` varchar(100) NOT NULL,
  `dbPassword` varchar(100) NOT NULL,
  PRIMARY KEY (`expName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_exportdbitem"
#

CREATE TABLE `iclock_exportdbitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expDB_id` varchar(100) NOT NULL,
  `tableName` varchar(100) NOT NULL,
  `fieldName` varchar(100) NOT NULL,
  `isKeyField` smallint(6) NOT NULL,
  `overwrite` smallint(6) NOT NULL,
  `dbPassword` varchar(100) NOT NULL,
  `contentType_id` int(11) NOT NULL,
  `dataItem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iclock_exportdbitem_expDB_id` (`expDB_id`),
  KEY `iclock_exportdbitem_contentType_id` (`contentType_id`),
  KEY `iclock_exportdbitem_dataItem_id` (`dataItem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_iclockmsg"
#

CREATE TABLE `iclock_iclockmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SN_id` varchar(20) NOT NULL,
  `MsgType` int(11) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime DEFAULT NULL,
  `MsgParam` varchar(32) DEFAULT NULL,
  `MsgContent` varchar(200) DEFAULT NULL,
  `LastTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iclock_iclockmsg_SN_id` (`SN_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_itemdefine"
#

CREATE TABLE `iclock_itemdefine` (
  `ItemName` varchar(100) NOT NULL,
  `ItemType` varchar(20) DEFAULT NULL,
  `Author_id` int(11) NOT NULL,
  `ItemValue` longtext,
  `Published` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ItemName`),
  KEY `iclock_itemdefine_Author_id` (`Author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_messages"
#

CREATE TABLE `iclock_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MsgType` int(11) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime DEFAULT NULL,
  `MsgContent` longtext,
  `MsgImage` varchar(64) DEFAULT NULL,
  `DeptID_id` int(11) DEFAULT NULL,
  `MsgParam` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iclock_messages_DeptID_id` (`DeptID_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_oplog"
#

CREATE TABLE `iclock_oplog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SN` varchar(20) DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `OP` smallint(6) NOT NULL,
  `OPTime` datetime NOT NULL,
  `Object` int(11) DEFAULT NULL,
  `Param1` int(11) DEFAULT NULL,
  `Param2` int(11) DEFAULT NULL,
  `Param3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SN` (`SN`,`OPTime`),
  KEY `iclock_oplog_SN` (`SN`)
) ENGINE=MyISAM AUTO_INCREMENT=23237 DEFAULT CHARSET=utf8;

#
# Structure for table "iclock_scheduletask"
#

CREATE TABLE `iclock_scheduletask` (
  `schName` varchar(100) NOT NULL,
  `startup` datetime NOT NULL,
  `cycle` int(11) DEFAULT NULL,
  `cycleUnit` smallint(6) NOT NULL,
  `taskType` smallint(6) NOT NULL,
  `taskParam` varchar(1024) DEFAULT NULL,
  `disabled` smallint(6) NOT NULL,
  PRIMARY KEY (`schName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "izin_ket"
#

CREATE TABLE `izin_ket` (
  `Id_ket` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `DeptID` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_ket`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Structure for table "jabatan"
#

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Structure for table "jam_opd"
#

CREATE TABLE `jam_opd` (
  `Id_jamopd` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `kategori_hari` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_jamopd`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Structure for table "jam_pemadam"
#

CREATE TABLE `jam_pemadam` (
  `id_jam` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jam` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  PRIMARY KEY (`id_jam`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Structure for table "jam_sekolah"
#

CREATE TABLE `jam_sekolah` (
  `Id_jamguru` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `kategori_hari` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_jamguru`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for table "jam_shift"
#

CREATE TABLE `jam_shift` (
  `Id_shift` int(11) NOT NULL AUTO_INCREMENT,
  `badgenumber` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `DeptID` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `keterangan` varchar(15) DEFAULT 'empty',
  PRIMARY KEY (`Id_shift`),
  KEY `Id` (`badgenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=49833 DEFAULT CHARSET=latin1;

#
# Structure for table "jenis_kegiatan"
#

CREATE TABLE `jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(100) NOT NULL,
  `DeptID` int(11) NOT NULL,
  PRIMARY KEY (`id_jenis_kegiatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for table "kehadiran_opd"
#

CREATE TABLE `kehadiran_opd` (
  `id_kehadiran_opd` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar_opd_kegiatan_luar` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `keterangan` int(11) NOT NULL,
  PRIMARY KEY (`id_kehadiran_opd`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for table "keterangan"
#

CREATE TABLE `keterangan` (
  `id_keterangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_keterangan` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_keterangan`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

#
# Structure for table "laporan_bulanan"
#

CREATE TABLE `laporan_bulanan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(255) NOT NULL DEFAULT '',
  `userid` int(11) NOT NULL DEFAULT '0',
  `DeptID` int(11) NOT NULL DEFAULT '0',
  `jumlah_hari` int(11) NOT NULL DEFAULT '0',
  `jumlah_hadir` int(11) NOT NULL DEFAULT '0',
  `sakit` int(11) NOT NULL DEFAULT '0',
  `izin` int(11) NOT NULL DEFAULT '0',
  `cuti` int(11) NOT NULL DEFAULT '0',
  `tk` int(11) NOT NULL DEFAULT '0',
  `tl` int(11) NOT NULL DEFAULT '0',
  `jlh_telat` int(3) DEFAULT '0',
  `pulang_cepat` int(11) DEFAULT '0',
  `persen_hadir` float NOT NULL DEFAULT '0',
  `persen_potongan` double(3,2) DEFAULT '0.00',
  `bulan` tinyint(2) NOT NULL DEFAULT '0',
  `tahun` year(4) NOT NULL DEFAULT '0000',
  `nama_golongan` varchar(255) DEFAULT '',
  `kode_golongan` int(11) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `nama_ese` varchar(100) NOT NULL,
  `kode_ese` int(11) NOT NULL,
  `status_kepegawaian` varchar(10) NOT NULL DEFAULT '0',
  `nip` varchar(20) NOT NULL DEFAULT '',
  `nama_jabatan` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=928 DEFAULT CHARSET=utf8;

#
# Structure for table "leaveclass"
#

CREATE TABLE `leaveclass` (
  `LeaveID` int(11) NOT NULL AUTO_INCREMENT,
  `LeaveName` varchar(20) NOT NULL,
  `MinUnit` double NOT NULL,
  `Unit` smallint(6) NOT NULL,
  `RemaindProc` smallint(6) NOT NULL,
  `RemaindCount` smallint(6) NOT NULL,
  `ReportSymbol` varchar(4) NOT NULL,
  `Deduct` double DEFAULT NULL,
  `Color` int(11) DEFAULT NULL,
  `Classify` smallint(6) NOT NULL,
  PRIMARY KEY (`LeaveID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Structure for table "leaveclass1"
#

CREATE TABLE `leaveclass1` (
  `LeaveID` int(11) NOT NULL,
  `LeaveName` varchar(20) NOT NULL,
  `MinUnit` double NOT NULL,
  `Unit` smallint(6) NOT NULL,
  `RemaindProc` smallint(6) NOT NULL,
  `RemaindCount` smallint(6) NOT NULL,
  `ReportSymbol` varchar(4) NOT NULL,
  `Deduct` double NOT NULL,
  `Color` int(11) NOT NULL,
  `Classify` smallint(6) NOT NULL,
  `LeaveType` smallint(6) NOT NULL,
  `Calc` longtext,
  PRIMARY KEY (`LeaveID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "libur"
#

CREATE TABLE `libur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(2) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `jumlah_hari` int(2) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for table "log"
#

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` varchar(32) NOT NULL,
  `aktivitas` text NOT NULL,
  `id_staff` int(11) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=2374 DEFAULT CHARSET=latin1;

#
# Structure for table "num_run"
#

CREATE TABLE `num_run` (
  `Num_runID` int(11) NOT NULL AUTO_INCREMENT,
  `OLDID` int(11) DEFAULT NULL,
  `Name` varchar(30) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Cyle` smallint(6) DEFAULT NULL,
  `Units` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`Num_runID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "num_run_deil"
#

CREATE TABLE `num_run_deil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Num_runID` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time DEFAULT NULL,
  `Sdays` smallint(6) NOT NULL,
  `Edays` smallint(6) DEFAULT NULL,
  `SchclassID` int(11) DEFAULT NULL,
  `OverTime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Num_runID` (`Num_runID`,`Sdays`,`StartTime`),
  KEY `num_run_deil_Num_runID` (`Num_runID`),
  KEY `num_run_deil_SchclassID` (`SchclassID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "pemadam_regu"
#

CREATE TABLE `pemadam_regu` (
  `id_regu` int(4) NOT NULL AUTO_INCREMENT,
  `nama_regu` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_regu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for table "pemadam_shift"
#

CREATE TABLE `pemadam_shift` (
  `id_shift` int(11) NOT NULL AUTO_INCREMENT,
  `regu` int(4) DEFAULT NULL,
  `id_jam` int(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_shift`),
  KEY `id_jam` (`id_jam`),
  CONSTRAINT `pemadam_shift_ibfk_1` FOREIGN KEY (`id_jam`) REFERENCES `jam_pemadam` (`id_jam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Structure for table "persen_potongan"
#

CREATE TABLE `persen_potongan` (
  `id_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `uraian1` time NOT NULL DEFAULT '00:00:00',
  `uraian2` time NOT NULL DEFAULT '00:00:00',
  `persentase` double(3,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_potongan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for table "rekap_bulanan"
#

CREATE TABLE `rekap_bulanan` (
  `id_rekap` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `DeptID` int(11) NOT NULL DEFAULT '0',
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `masuk` time DEFAULT '00:00:00',
  `pulang` time DEFAULT '00:00:00',
  `telat` time DEFAULT '00:00:00',
  `persen_telat` double(3,2) DEFAULT '0.00',
  `pulang_cepat` time DEFAULT '00:00:00',
  `persen_pc` double(3,2) DEFAULT '0.00',
  `total_persen` double(3,2) DEFAULT '0.00',
  `keterangan` int(11) NOT NULL DEFAULT '0',
  `datang_cepat` time DEFAULT '00:00:00',
  `status_kepegawaian` varchar(10) NOT NULL,
  `kode_golongan` int(11) DEFAULT NULL,
  `tmt_pangkat` date DEFAULT '0000-00-00',
  `kode_ese` int(11) NOT NULL,
  `nama_ese` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rekap`)
) ENGINE=MyISAM AUTO_INCREMENT=1309 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Structure for table "rekap_bulananx"
#

CREATE TABLE `rekap_bulananx` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `DeptID` int(11) NOT NULL DEFAULT '0',
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `masuk` time NOT NULL DEFAULT '00:00:00',
  `pulang` time NOT NULL DEFAULT '00:00:00',
  `keterangan` int(11) NOT NULL DEFAULT '0',
  `status_kepegawaian` varchar(10) NOT NULL,
  `kode_golongan` int(11) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `kode_ese` int(11) NOT NULL,
  `nama_ese` varchar(100) NOT NULL,
  `telat` time DEFAULT NULL,
  `datang_cepat` time DEFAULT NULL,
  `pulang_cepat` time DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=38758 DEFAULT CHARSET=utf8;

#
# Structure for table "rekap_harian"
#

CREATE TABLE `rekap_harian` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `DeptID` int(11) NOT NULL DEFAULT '0',
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `masuk` time NOT NULL DEFAULT '00:00:00',
  `pulang` time NOT NULL DEFAULT '00:00:00',
  `keterangan` int(11) DEFAULT NULL,
  `status_kepegawaian` varchar(10) NOT NULL,
  `datang_cepat` time DEFAULT NULL,
  `pulang_cepat` time DEFAULT NULL,
  `telat` time DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=38761 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Structure for table "rekap_harianz"
#

CREATE TABLE `rekap_harianz` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `badgenumber` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `datang_cepat` time DEFAULT NULL,
  `pulang_cepat` time DEFAULT NULL,
  `DeptID` int(11) DEFAULT NULL,
  `telat` time DEFAULT NULL,
  `status_kepegawaian` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "role"
#

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for table "schclass"
#

CREATE TABLE `schclass` (
  `SchclassID` int(11) NOT NULL AUTO_INCREMENT,
  `SchName` varchar(20) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `LateMinutes` int(11) DEFAULT NULL,
  `EarlyMinutes` int(11) DEFAULT NULL,
  `CheckIn` smallint(6) DEFAULT NULL,
  `CheckOut` smallint(6) DEFAULT NULL,
  `CheckInTime1` time DEFAULT NULL,
  `CheckInTime2` time DEFAULT NULL,
  `CheckOutTime1` time DEFAULT NULL,
  `CheckOutTime2` time DEFAULT NULL,
  `Color` int(11) DEFAULT NULL,
  `AutoBind` smallint(6) DEFAULT NULL,
  `WorkDay` double DEFAULT NULL,
  PRIMARY KEY (`SchclassID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "securitydetails"
#

CREATE TABLE `securitydetails` (
  `SecuritydetailID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` smallint(6) DEFAULT NULL,
  `DeptID` smallint(6) DEFAULT NULL,
  `Schedule` smallint(6) DEFAULT NULL,
  `UserInfo` smallint(6) DEFAULT NULL,
  `EnrollFingers` smallint(6) DEFAULT NULL,
  `ReportView` smallint(6) DEFAULT NULL,
  `Report` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SecuritydetailID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "shift"
#

CREATE TABLE `shift` (
  `ShiftID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) DEFAULT NULL,
  `UshiftID` int(11) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `RunNum` smallint(6) DEFAULT NULL,
  `SCH1` int(11) DEFAULT NULL,
  `SCH2` int(11) DEFAULT NULL,
  `SCH3` int(11) DEFAULT NULL,
  `SCH4` int(11) DEFAULT NULL,
  `SCH5` int(11) DEFAULT NULL,
  `SCH6` int(11) DEFAULT NULL,
  `SCH7` int(11) DEFAULT NULL,
  `SCH8` int(11) DEFAULT NULL,
  `SCH9` int(11) DEFAULT NULL,
  `SCH10` int(11) DEFAULT NULL,
  `SCH11` int(11) DEFAULT NULL,
  `SCH12` int(11) DEFAULT NULL,
  `Cycle` smallint(6) DEFAULT NULL,
  `UnitS` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ShiftID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "staff"
#

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

#
# Structure for table "status"
#

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Structure for table "surat"
#

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_derajat` int(11) NOT NULL DEFAULT '1',
  `id_klasifikasi` int(11) NOT NULL DEFAULT '1',
  `pengirim` varchar(32) NOT NULL,
  `perihal` text NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text,
  `nip` int(25) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tujuan` text NOT NULL,
  `berangkat` text NOT NULL,
  `id_waktu` int(11) NOT NULL DEFAULT '1',
  `jml_harian` int(50) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `keterangan2` text,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for table "template"
#

CREATE TABLE `template` (
  `templateid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `Template` longtext NOT NULL,
  `FingerID` smallint(6) NOT NULL,
  `Valid` smallint(6) NOT NULL,
  `DelTag` smallint(6) NOT NULL,
  `SN` varchar(20) DEFAULT NULL,
  `UTime` datetime DEFAULT NULL,
  `BITMAPPICTURE` longtext,
  `BITMAPPICTURE2` longtext,
  `BITMAPPICTURE3` longtext,
  `BITMAPPICTURE4` longtext,
  `USETYPE` smallint(6) DEFAULT NULL,
  `Template2` longtext,
  `Template3` longtext,
  PRIMARY KEY (`templateid`),
  UNIQUE KEY `userid` (`userid`,`FingerID`),
  UNIQUE KEY `USERFINGER` (`userid`,`FingerID`),
  KEY `template_userid` (`userid`),
  KEY `template_SN` (`SN`)
) ENGINE=MyISAM AUTO_INCREMENT=6626 DEFAULT CHARSET=utf8;

#
# Structure for table "test"
#

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "type"
#

CREATE TABLE `type` (
  `kode_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kode_tipe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "user"
#

CREATE TABLE `user` (
  `id_user` varchar(32) NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `active` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for table "user_of_run"
#

CREATE TABLE `user_of_run` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `NUM_OF_RUN_ID` int(11) NOT NULL,
  `ISNOTOF_RUN` int(11) DEFAULT NULL,
  `ORDER_RUN` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserID` (`UserID`,`NUM_OF_RUN_ID`,`StartDate`,`EndDate`),
  KEY `user_of_run_UserID` (`UserID`),
  KEY `user_of_run_NUM_OF_RUN_ID` (`NUM_OF_RUN_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "user_speday"
#

CREATE TABLE `user_speday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `StartSpecDay` datetime NOT NULL,
  `EndSpecDay` datetime DEFAULT NULL,
  `DateID` int(11) NOT NULL,
  `YUANYING` varchar(200) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `State` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserID` (`UserID`,`StartSpecDay`,`DateID`),
  KEY `user_speday_UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "user_temp_sch"
#

CREATE TABLE `user_temp_sch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ComeTime` datetime NOT NULL,
  `LeaveTime` datetime NOT NULL,
  `OverTime` int(11) NOT NULL,
  `Type` smallint(6) DEFAULT NULL,
  `Flag` smallint(6) DEFAULT NULL,
  `SchClassID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserID` (`UserID`,`ComeTime`,`LeaveTime`),
  KEY `user_temp_sch_UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Structure for table "userinfo"
#

CREATE TABLE `userinfo` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `badgenumber` varchar(20) NOT NULL,
  `defaultdeptid` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Card` varchar(20) DEFAULT NULL,
  `Privilege` int(11) DEFAULT NULL,
  `AccGroup` int(11) DEFAULT NULL,
  `TimeZones` varchar(20) DEFAULT NULL,
  `Gender` varchar(2) DEFAULT NULL,
  `Birthday` datetime DEFAULT NULL,
  `street` varchar(40) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `ophone` varchar(20) DEFAULT NULL,
  `FPHONE` varchar(20) DEFAULT NULL,
  `pager` varchar(20) DEFAULT NULL,
  `minzu` varchar(8) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `SN` varchar(20) DEFAULT NULL,
  `SSN` varchar(20) DEFAULT NULL,
  `UTime` datetime DEFAULT NULL,
  `Hiredday` date DEFAULT NULL,
  `VERIFICATIONMETHOD` smallint(6) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `City` varchar(2) DEFAULT NULL,
  `SECURITYFLAGS` smallint(6) DEFAULT NULL,
  `ATT` tinyint(1) DEFAULT NULL,
  `OverTime` tinyint(1) DEFAULT NULL,
  `Holiday` tinyint(1) DEFAULT NULL,
  `INLATE` smallint(6) DEFAULT NULL,
  `OutEarly` smallint(6) DEFAULT NULL,
  `Lunchduration` smallint(6) DEFAULT NULL,
  `MVerifyPass` varchar(2) DEFAULT NULL,
  `SEP` smallint(6) DEFAULT NULL,
  `OffDuty` smallint(6) NOT NULL,
  `DelTag` smallint(6) NOT NULL,
  `AutoSchPlan` smallint(6) DEFAULT NULL,
  `MinAutoSchInterval` int(11) DEFAULT NULL,
  `RegisterOT` int(11) DEFAULT NULL,
  `Image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `badgenumber` (`badgenumber`),
  KEY `userinfo_defaultdeptid` (`defaultdeptid`),
  KEY `userinfo_SN` (`SN`)
) ENGINE=MyISAM AUTO_INCREMENT=40207 DEFAULT CHARSET=utf8;

#
# Structure for table "useruusedsclasses"
#

CREATE TABLE `useruusedsclasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `SchId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserId` (`UserId`,`SchId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Procedure "copy_rekap_bulan"
#

CREATE PROCEDURE `copy_rekap_bulan`(tgl date, departement int )
BEGIN
   IF NOT EXISTS (SELECT * FROM rekap_bulanan where tanggal= tgl AND DeptID = departement) THEN    
        REPLACE INTO rekap_bulanan(userid,DeptID,nama_pegawai,nip,tanggal,status_kepegawaian,kode_golongan,tmt_pangkat,kode_ese,nama_ese) 
		  SELECT u.userid,u.defaultdeptid,rp.nama_pegawai,u.badgenumber,tgl,rp.status_kepegawaian,rp.kode_golongan,rp.tmt_pangkat,rp.kode_ese ,rp.nama_ese 
		  FROM userinfo u
		  join appsipd.r_pegawai_aktual rp
		  ON u.badgenumber = rp.nip_baru
      Where u.defaultdeptid = departement;
    END IF;
END;

#
# Procedure "copy_rekap_sebulan"
#

CREATE PROCEDURE `copy_rekap_sebulan`(bln INT, thn INT, departement int )
BEGIN
   IF NOT EXISTS (SELECT * FROM laporan_bulanan where bulan = bln AND tahun = thn AND DeptID = departement) THEN    
        REPLACE INTO laporan_bulanan(userid,DeptID,nama_pegawai,nama_golongan,kode_golongan,tmt_pangkat,nama_ese,kode_ese,bulan,tahun,status_kepegawaian,nip,nama_jabatan) 
		SELECT u.userid,u.defaultdeptid,rp.nama_pegawai,rp.nama_golongan,rp.kode_golongan,rp.tmt_pangkat,rp.nama_ese,rp.kode_ese,bln,thn,rp.status_kepegawaian,u.badgenumber,rp.nomenklatur_jabatan 
		FROM userinfo u
		join appsipd.r_pegawai_aktual rp
		where u.badgenumber = rp.nip_baru AND u.defaultdeptid = departement;
    END IF;
END;

#
# Procedure "denda_jam"
#

CREATE PROCEDURE `denda_jam`(tgl DATE, dept INT)
UPDATE rekap_bulanan
  SET telat = CASE
              WHEN masuk = "00:00:00" AND pulang != "00:00:00" THEN "05:00:00"
              ELSE telat
            END,
  pulang_cepat = CASE
             WHEN masuk != "00:00:00" AND pulang = "00:00:00"  THEN "05:00:00"
             ELSE pulang_cepat  
            END,            
  keterangan =  CASE
       WHEN masuk = "00:00:00" AND pulang = "00:00:00" THEN 10     
       ELSE IF(keterangan = 10,0,keterangan)
          END,
       persen_telat = CASE
              WHEN (SELECT uraian1 FROM persen_potongan WHERE telat>=uraian1 AND telat<=uraian2) is NOT NULL   
              THEN (SELECT persentase FROM persen_potongan WHERE telat>=uraian1 AND telat<=uraian2)
              ELSE 0.00
            END,
      persen_pc = CASE
              WHEN (SELECT uraian1 FROM persen_potongan WHERE pulang_cepat>=uraian1 AND pulang_cepat<=uraian2) is NOT NULL   
              THEN (SELECT persentase FROM persen_potongan WHERE pulang_cepat>=uraian1 AND pulang_cepat<=uraian2)
              ELSE 0.00
            END,
      total_persen = CASE
                     WHEN keterangan = 10 THEN 5.00
                      ELSE
                        IF((persen_telat + persen_pc) > 5.00,5,persen_telat + persen_pc)
                      END
              
WHERE DeptID = dept AND tanggal = tgl;

#
# Procedure "denda_jam1"
#

CREATE PROCEDURE `denda_jam1`(tgl DATE, dept INT)
UPDATE rekap_bulanan
  SET telat = CASE
              WHEN masuk = "00:00:00" AND pulang != "00:00:00" THEN "05:00:00"
              ELSE telat
            END,
  pulang_cepat = CASE
             WHEN masuk != "00:00:00" AND pulang = "00:00:00"  THEN "05:00:00"
             ELSE pulang_cepat  
            END,            
  keterangan =  CASE
       WHEN masuk = "00:00:00" AND pulang = "00:00:00" THEN 10     
       ELSE IF(keterangan = 10,0,keterangan)
          END,
       persen_telat = CASE
              WHEN (SELECT uraian1 FROM persen_potongan WHERE telat>=uraian1 AND telat<=uraian2) is NOT NULL   
              THEN (SELECT persentase FROM persen_potongan WHERE telat>=uraian1 AND telat<=uraian2)
              ELSE 0.00
            END,
      persen_pc = CASE
              WHEN (SELECT uraian1 FROM persen_potongan WHERE pulang_cepat>=uraian1 AND pulang_cepat<=uraian2) is NOT NULL   
              THEN (SELECT persentase FROM persen_potongan WHERE pulang_cepat>=uraian1 AND pulang_cepat<=uraian2)
              ELSE 0.00
            END,
      total_persen = CASE
                     WHEN keterangan = 10 THEN 5.00
                      ELSE
                        IF((persen_telat + persen_pc) > 5.00,5,persen_telat + persen_pc)
                      END
              
WHERE DeptID = dept AND tanggal = tgl;

#
# Procedure "hitung_jam"
#

CREATE PROCEDURE `hitung_jam`(tgl_skrg DATE, departement INT,ket VARCHAR(20))
BEGIN 
  SELECT ck.userid,time(ck.checktime) as time,ck.checktype, u.badgenumber,u.defaultdeptid, 
    CASE
      WHEN checktype = 0 THEN IF (js.jam_masuk < time(ck.checktime),timediff(time(ck.checktime),js.jam_masuk), "00:00:00")
      WHEN checktype = 1 THEN IF (js.jam_keluar > time(ck.checktime),timediff(js.jam_keluar,time(ck.checktime)), "00:00:00")
    END AS selisih
  FROM checkinout ck
  JOIN userinfo u 
  ON ck.userid = u.userid
  JOIN jam_shift js
  ON u.badgenumber = js.badgenumber 
  WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket
  ORDER by checktype asc;
END;

#
# Procedure "hukum_all_jam"
#

CREATE PROCEDURE `hukum_all_jam`(tgl DATE)
UPDATE rekap_bulanan
  SET keterangan =  CASE
       WHEN masuk = "00:00:00" AND pulang = "00:00:00" THEN 10     
       ELSE IF(keterangan = 10,0,keterangan)
          END
WHERE tanggal = tgl;

#
# Procedure "hukum_jam"
#

CREATE PROCEDURE `hukum_jam`(tgl DATE, dept INT)
UPDATE rekap_bulanan
  SET telat = CASE
              WHEN masuk = "00:00:00" AND pulang != "00:00:00" THEN "01:00:00"
              ELSE telat
            END,
  pulang_cepat = CASE
             WHEN masuk != "00:00:00" AND pulang = "00:00:00"  THEN "01:00:00"
             ELSE pulang_cepat  
            END,            
  keterangan =  CASE
       WHEN masuk = "00:00:00" AND pulang = "00:00:00" THEN 10     
       ELSE IF(keterangan = 10,0,keterangan)
          END
WHERE  DeptID = dept AND tanggal = tgl;

#
# Procedure "rekap_harian"
#

CREATE PROCEDURE `rekap_harian`(tgl_skrg DATE, departement INT,ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN 
    (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber,u.defaultdeptid as defaultdeptid, 
        CASE
          WHEN checktype = 0 THEN IF (js.jam_masuk < time(ck.checktime),timediff(time(ck.checktime),js.jam_masuk), "00:00:00")
          WHEN checktype = 1 THEN IF (js.jam_keluar > time(ck.checktime),timediff(js.jam_keluar,time(ck.checktime)), "00:00:00")
        END AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket
      ORDER by checktype asc) AS th
  ON rb.userid = th.userid   
  SET rb.masuk = CASE 
                    WHEN th.checktype = 0 THEN th.time
                    ELSE rb.masuk
                 END
  WHERE rb.tanggal = tgl_skrg;  
END;

#
# Procedure "rekap_sebulan"
#

CREATE PROCEDURE `rekap_sebulan`(bln INT, thn INT, dept INT)
UPDATE laporan_bulanan lb
JOIN rekap_bulanan rb
ON lb.userid = rb.userid
  SET lb.jumlah_hari = (SELECT count(DISTINCT tanggal)
                      from rekap_bulanan 
                      where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn),
  lb.jumlah_hadir = (SELECT count(userid) FROM rekap_bulanan 
                  where month(tanggal) = bln and year(tanggal) = thn and userid = lb.userid  and (masuk != 0 OR pulang != 0)),
  lb.sakit = (SELECT count(userid) FROM rekap_bulanan 
                  where month(tanggal) = bln and year(tanggal) = thn and userid = lb.userid and keterangan = 1), 
  lb.izin = (SELECT count(userid) FROM rekap_bulanan 
                  where month(tanggal) = bln and year(tanggal) = thn and userid = lb.userid and (keterangan != 1 AND keterangan != 10 
                  AND keterangan != 3 AND keterangan != 9 AND keterangan != 0) ),
  lb.cuti = (SELECT count(userid) FROM rekap_bulanan 
                  where month(tanggal) = bln and year(tanggal) = thn and userid = lb.userid  and keterangan = 3),
  lb.tk = (SELECT count(userid) FROM rekap_bulanan 
                  where month(tanggal) = bln and year(tanggal) = thn and userid = lb.userid and keterangan = 10),
  lb.tl = (SELECT count(userid) FROM rekap_bulanan 
                  where month(tanggal) = bln and year(tanggal) = thn and userid = lb.userid and keterangan = 9),
  lb.jlh_telat = (SELECT count(telat)from rekap_bulanan where userid= lb.userid 
                AND (keterangan<1 OR keterangan=10) AND month(tanggal)= bln
                  AND year(tanggal)= thn AND telat != '00:00:00'),
  lb.pulang_cepat = (SELECT count(pulang_cepat) from rekap_bulanan 
                  where userid= lb.userid AND (keterangan<1 OR keterangan=10) 
                  AND month(tanggal)= bln AND year(tanggal)= thn 
                  AND pulang_cepat != '00:00:00'), 
  lb.persen_hadir = ROUND(((lb.jumlah_hadir/lb.jumlah_hari)*100),2),
   lb.persen_potongan = (SELECT SUM(total_persen) FROM rekap_bulanan WHERE userid = lb.userid)                    
WHERE lb.bulan = bln AND lb.tahun = thn AND lb.DeptID = dept;

#
# Procedure "update_all_rekap_masuk"
#

CREATE PROCEDURE `update_all_rekap_masuk`(tgl_skrg DATE, ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN 
    (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber, 
 IF (js.jam_masuk < time(ck.checktime),timediff(time(ck.checktime),js.jam_masuk), "00:00:00") AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND js.keterangan = ket AND checktype = 0
      ORDER by checktype asc) AS th
  ON rb.userid = th.userid
  SET rb.masuk = th.time,
      rb.telat = th.selisih
  WHERE rb.tanggal = tgl_skrg;    
END;

#
# Procedure "update_all_rekap_pulang"
#

CREATE PROCEDURE `update_all_rekap_pulang`(tgl_skrg DATE, ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN  
  (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber,
 IF (js.jam_keluar > time(ck.checktime),timediff(js.jam_keluar,time(ck.checktime)), "00:00:00") AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND js.keterangan = ket AND checktype = 1
      ORDER by checktype asc) AS cc
  ON rb.userid = cc.userid
  SET rb.pulang = cc.time,
      rb.pulang_cepat = cc.selisih 
  WHERE rb.tanggal = tgl_skrg;  
END;

#
# Procedure "update_jam"
#

CREATE PROCEDURE `update_jam`(absen_masuk TIME, absen_telat TIME, iduser INT, tgl_skrg DATE )
BEGIN
  UPDATE rekap_bulanan SET masuk = absen_masuk ,telat = absen_telat WHERE userid = iduser AND tanggal = tgl_skrg;
END;

#
# Procedure "update_rekap_harian"
#

CREATE PROCEDURE `update_rekap_harian`(tgl_skrg DATE, departement INT,ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN 
    (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber,u.defaultdeptid as defaultdeptid, 
        CASE
          WHEN checktype = 0 THEN IF (js.jam_masuk < time(ck.checktime),timediff(time(ck.checktime),js.jam_masuk), "00:00:00")
          WHEN checktype = 1 THEN IF (js.jam_keluar > time(ck.checktime),timediff(js.jam_keluar,time(ck.checktime)), "00:00:00")
        END AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket
      ORDER by checktype asc) AS th
  ON rb.userid = th.userid   
  SET rb.masuk = CASE 
                    WHEN th.checktype = 0 THEN th.time
                    ELSE rb.masuk
                 END,
      
      rb.pulang = CASE 
                    WHEN th.checktype = 1 THEN th.time
                    ELSE rb.pulang
                 END,
      rb.telat = CASE 
                    WHEN th.checktype = 0 THEN th.selisih
                    ELSE rb.telat
                 END,
      rb.pulang_cepat = CASE 
                    WHEN th.checktype = 1 THEN th.selisih
                    ELSE rb.pulang_cepat
                 END  
  WHERE rb.tanggal = tgl_skrg;  
END;

#
# Procedure "update_rekap_harian2"
#

CREATE PROCEDURE `update_rekap_harian2`(tgl_skrg DATE, departement INT,ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN 
    (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber, 
 IF (js.jam_masuk < time(ck.checktime),timediff(time(ck.checktime),js.jam_masuk), "00:00:00") AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket AND checktype = 0
      ORDER by checktype asc) AS th
  ON rb.userid = th.userid
  INNER JOIN  
      (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber,
 IF (js.jam_keluar > time(ck.checktime),timediff(js.jam_keluar,time(ck.checktime)), "00:00:00") AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket AND checktype = 1
      ORDER by checktype asc) AS cc
  ON rb.userid = cc.userid
  SET rb.masuk = th.time,
      rb.telat = th.selisih,
      rb.pulang = cc.time,
      rb.pulang_cepat = cc.selisih 
  WHERE rb.tanggal = tgl_skrg;  
END;

#
# Procedure "update_rekap_keterangan"
#

CREATE PROCEDURE `update_rekap_keterangan`(tgl_skrg DATE, departement INT)
BEGIN 
UPDATE rekap_bulanan rb
		JOIN izin_ket ik
		ON rb.userid = ik.userid
		SET rb.keterangan = ik.keterangan,
		  rb.telat = '00:00:00',
      rb.persen_telat = 0.00,
		  rb.pulang_cepat = CASE
             WHEN rb.keterangan = 7 THEN rb.pulang_cepat
             ELSE '00:00:00'
            END,            		  
		  rb.persen_pc = IF (rb.keterangan != 7,0.00, rb.persen_pc),
		  rb.total_persen = IF (rb.keterangan != 7, 0.00, rb.persen_pc)
		WHERE ik.DeptID = departement AND rb.DeptID=departement AND ik.keterangan != 0 AND rb.tanggal = tgl_skrg AND ik.tanggal = tgl_skrg;
END;

#
# Procedure "update_rekap_masuk"
#

CREATE PROCEDURE `update_rekap_masuk`(tgl_skrg DATE, departement INT,ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN 
    (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber, 
 IF (js.jam_masuk < time(ck.checktime),timediff(time(ck.checktime),js.jam_masuk), "00:00:00") AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket AND checktype = 0
      ORDER by checktype asc) AS th
  ON rb.userid = th.userid
  SET rb.masuk = th.time,
      rb.telat = th.selisih
  WHERE rb.tanggal = tgl_skrg;    
END;

#
# Procedure "update_rekap_pulang"
#

CREATE PROCEDURE `update_rekap_pulang`(tgl_skrg DATE, departement INT,ket VARCHAR(20))
BEGIN 
  UPDATE rekap_bulanan rb
  INNER JOIN  
  (SELECT ck.userid as userid,time(ck.checktime) as time,ck.checktype as checktype, u.badgenumber as badgenumber,
 IF (js.jam_keluar > time(ck.checktime),timediff(js.jam_keluar,time(ck.checktime)), "00:00:00") AS selisih
      FROM checkinout ck
      JOIN userinfo u 
      ON ck.userid = u.userid
      JOIN jam_shift js
      ON u.badgenumber = js.badgenumber 
      WHERE date(checktime)= tgl_skrg AND defaultdeptid = departement AND js.keterangan = ket AND checktype = 1
      ORDER by checktype asc) AS cc
  ON rb.userid = cc.userid
  SET rb.pulang = cc.time,
      rb.pulang_cepat = cc.selisih 
  WHERE rb.tanggal = tgl_skrg;  
END;

#
# Procedure "update_rekap_sebulan"
#

CREATE PROCEDURE `update_rekap_sebulan`(bln INT, thn INT,dept INT)
BEGIN 
  UPDATE laporan_bulanan lb
  INNER JOIN 
        (SELECT rb.userid, count(DISTINCT rb.tanggal) as jlh_hari, b.jlh_sakit, c.jlh_izin, d.jlh_cuti, e.jlh_tk, f.jlh_tl
  FROM rekap_bulanan rb
  LEFT JOIN (SELECT userid, count(userid) as jlh_sakit FROM rekap_bulanan 
        where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and keterangan = 1 
        group by userid) as b
  ON rb.userid = b.userid
  LEFT JOIN (SELECT userid, count(userid) as jlh_izin FROM rekap_bulanan 
            where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and keterangan = 2 
            group by userid) as c
  ON rb.userid = c.userid
  LEFT JOIN (SELECT userid, count(userid) as jlh_cuti FROM rekap_bulanan 
            where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and keterangan = 3
            group by userid) as d
  ON rb.userid = d.userid
  LEFT JOIN (SELECT userid, count(userid) as jlh_tk FROM rekap_bulanan 
                  where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and keterangan = 10
                  group by userid) as e
  ON rb.userid = e.userid
  LEFT JOIN (SELECT userid, count(userid) as jlh_tl FROM rekap_bulanan 
                  where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and keterangan = 9
                  group by userid) as f
  ON rb.userid = f.userid
  WHERE DeptID = dept AND MONTH(tanggal) = bln AND YEAR(tanggal) = thn
  group by userid
      ) AS th      
      ON lb.userid = th.userid      
      SET lb.jumlah_hari = th.jlh_hari,
      lb.sakit = th.jlh_sakit,
      lb.izin = th.jlh_izin,
      lb.cuti = th.jlh_cuti,
      lb.tk = th.jlh_tk,
      lb.tl = th.jlh_tl
  WHERE lb.DeptID = dept and lb.bulan = bln and lb.tahun = thn;   
END;

#
# Procedure "update_rekap_sebulan2"
#

CREATE PROCEDURE `update_rekap_sebulan2`(bln INT, thn INT,dept INT)
BEGIN 
  UPDATE laporan_bulanan lb
  INNER JOIN 
        (SELECT s.userid, x.jlh_hadir, a.jlh_telat, c.jlh_pc
          from rekap_bulanan s
        LEFT join (SELECT userid, count(userid) as jlh_hadir
                  from rekap_bulanan
                  where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and (masuk != 0 OR pulang != 0) AND keterangan != 1
                  AND keterangan != 2 AND keterangan != 3 AND keterangan != 1
                  group by userid ) as x
        ON s.userid=x.userid
        LEFT join (SELECT userid, count(telat) as jlh_telat from rekap_bulanan where 
                  DeptID = dept and  (keterangan<1 OR keterangan=10) AND month(tanggal)= bln
                  AND year(tanggal)= thn AND telat != '00:00:00' 
                  group by userid ) as a
      ON s.userid=a.userid
      LEFT JOIN (SELECT userid, count(pulang_cepat) as jlh_pc from rekap_bulanan 
                  where DeptID = dept and (keterangan<1 OR keterangan=10) 
                  AND month(tanggal)= bln AND year(tanggal)= thn
                  AND pulang_cepat != '00:00:00'
                  group by userid ) as c
      ON s.userid = c.userid
      LEFT JOIN (SELECT userid, count(userid) as jlh_sakit FROM rekap_bulanan 
                where DeptID = dept and month(tanggal) = bln and year(tanggal) = thn and keterangan = 1
                group by userid ) as b
      ON s.userid = b.userid 
      WHERE DeptID = dept and month(tanggal) = bln and year(tanggal) = thn
      group by s.userid
      ) AS th      
      ON lb.userid = th.userid      
      SET lb.jumlah_hadir = th.jlh_hadir,
      lb.jlh_telat = th.jlh_telat,
      lb.pulang_cepat = th.jlh_pc
  WHERE lb.DeptID = dept and lb.bulan = bln and lb.tahun = thn;   
END;

#
# Procedure "update_rekap_sebulan3"
#

CREATE PROCEDURE `update_rekap_sebulan3`(bln INT, thn INT,dept INT)
BEGIN 
  UPDATE laporan_bulanan lb
  INNER JOIN 
        (SELECT s.userid, c.persen_potong, b.persen_hadir
      from rekap_bulanan s
      LEFT JOIN (SELECT userid, SUM(total_persen) AS persen_potong FROM rekap_bulanan 
        WHERE DeptID = dept  and month(tanggal) = bln and year(tanggal) = thn group by userid ) as c
        ON s.userid = c.userid
      LEFT JOIN (SELECT userid, ROUND(((jumlah_hadir/jumlah_hari)*100),2) as persen_hadir FROM laporan_bulanan 
        where DeptID = dept  and bulan = bln and tahun = thn
        group by userid ) as b
        ON s.userid = b.userid 
        WHERE DeptID = dept  and month(tanggal) = bln and year(tanggal) = thn
      group by s.userid
      ) AS th      
      ON lb.userid = th.userid      
      SET lb.persen_potongan = th.persen_potong,
      lb.persen_hadir = th.persen_hadir
  WHERE lb.DeptID = dept and lb.bulan = bln and lb.tahun = thn;   
END;

#
# Procedure "update_rekap_sebulan32"
#

CREATE PROCEDURE `update_rekap_sebulan32`(bln INT, thn INT,dept INT)
BEGIN 
  UPDATE laporan_bulanan lb
  INNER JOIN 
        (SELECT s.userid, c.persen_potong, b.persen_hadir
      from rekap_bulanan s
      LEFT JOIN (SELECT userid, SUM(total_persen) AS persen_potong FROM rekap_bulanan 
        WHERE DeptID = dept  and month(tanggal) = bln and year(tanggal) = thn group by userid ) as c
        ON s.userid = c.userid
      LEFT JOIN (SELECT userid, ROUND(((jumlah_hadir/jumlah_hari)*100),2) as persen_hadir FROM laporan_bulanan 
        where DeptID = dept  and bulan = bln and tahun = thn
        group by userid ) as b
        ON s.userid = b.userid 
        WHERE DeptID = dept  and month(tanggal) = bln and year(tanggal) = thn
      group by s.userid
      ) AS th      
      ON lb.userid = th.userid      
      SET lb.persen_potongan = IF(th.persen_potong>100,100,th.persen_potong),
      lb.persen_hadir = th.persen_hadir
  WHERE lb.DeptID = dept and lb.bulan = bln and lb.tahun = thn;   
END;

#
# Procedure "update_rekap_sebulan6"
#

CREATE PROCEDURE `update_rekap_sebulan6`(bln INT, thn INT,dept INT)
BEGIN 

UPDATE laporan_bulanan lb
LEFT JOIN
(SELECT userid, IF((IF(sakit is NULL,0,sakit)+IF(izin is NULL,0,izin))>0,IF(sakit is NULL,0,sakit)+IF(izin is NULL,0,izin),0) as total
FROM laporan_bulanan 
WHERE DeptID = dept AND bulan = bln AND tahun = thn
GROUP BY userid) as x
ON lb.userid = x.userid
SET lb.persen_potongan = CASE
              WHEN x.total >=4 AND x.total<=10 THEN IF((lb.persen_potongan + 10.00) > 100.00,100.00,lb.persen_potongan + 10.00)
              WHEN x.total>=11 AND x.total<=20 THEN IF((lb.persen_potongan + 20.00) > 100.00,100.00,lb.persen_potongan + 20.00)
              WHEN x.total>20 THEN IF((lb.persen_potongan + 30.00) > 100.00,100.00,lb.persen_potongan + 30.00)
              ELSE lb.persen_potongan
            END
WHERE DeptID = dept and bulan = bln and tahun = thn;  
END;
