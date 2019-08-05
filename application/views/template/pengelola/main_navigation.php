<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-users"></i><span>Absensi Online</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo base_url('assets'); ?>/images/pemkot.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $session['nama_staff']; ?></h2>
                <br>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <br>
                <h3><?php echo $session['DeptName']; ?></h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo site_url('Operator'); ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                    <li><a><i class="fa fa-list-alt"></i>Pengaturan Jam Kerja<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <?php if ($session['id_role'] == 3) { ?>
                                <!-- Jadwal OPD -->
                                <li><a href="<?php echo site_url('input_shift_opd'); ?>">Tambah Shift</a></li>
                                <li><a href="<?php echo site_url('jadwal_shift'); ?>">Jadwal Kerja</a></li>
                            <?php
                            } else if ($session['id_role'] == 4) {   ?>
                                <!-- Jadwal Guru -->
                                <li><a href="<?php echo site_url('input_shift_guru'); ?>">Tambah Jadwal</a></li>
                                <li><a href="<?php echo site_url('jadwal_shift'); ?>">Jadwal Kerja</a></li>

                            <?php
                            } else if ($session['id_role'] == 6) { ?>
                                <li><a href="<?php echo site_url('input_shift_regu_pemadam'); ?>">Setting Regu</a></li>
                                <li><a href="<?php echo site_url('input_shift_pemadam'); ?>">Tambah Shift Pemadam</a></li>


                                <li><a href="<?php echo site_url('jadwal_pemadam'); ?>">Jadwal Kerja Pemadam</a></li>
                            <?php } ?>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-folder-open"></i> Absensi<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('update_absensi_harian'); ?>">Update Absensi Pegawai
                                    Harian</a></li>
                            <li><a href="<?php echo site_url('list_absensi_pegawai'); ?>">Absensi Pegawai Harian</a>
                            </li>
                            <li><a href="<?php echo site_url('rekap_absensi_bulanan'); ?>">Rekap Absensi Bulanan</a>
                            </li>
                        </ul>
                    </li>
                    <!--Buat Kondisi Session untuk POL-PP dll-->
                    <!--
                <li><a href="<?php echo site_url('PengelolaController/daftar_jadwal_kegiatan_luar'); ?>"><i class="fa fa-map-marker"></i>Kegiatan Luar</a></li>            
                -->
                    <li><a href="<?php echo site_url('list_staff'); ?>"><i class="fa fa-user"></i>Data Pegawai</a></li>
                    <!-- <li><a href="<?php echo site_url('StaffController/list_log'); ?>"><i class="fa fa-list"></i>History</a></li>  -->
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
    </div>
</div>