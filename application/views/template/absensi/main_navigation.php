<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-users"></i> <span>Absensi Online</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile">
    <div class="profile_pic">
      <img src="<?php echo base_url('assets'); ?>/images/pemkot.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2><?php echo $session['id_user']; ?></h2>
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
        <li><a href="<?php echo site_url('AbsensiController'); ?>"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a><i class="fa fa-inbox"></i> Absensi<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo site_url('AbsensiController/absensi_pegawai_harian'); ?>">Absensi Pegawai Harian</a></li>
            <li><a href="<?php echo site_url('AbsensiController/rekap_absensi_bulanan'); ?>">Rekap Absensi Bulanan</a></li>
            <!-- <li><a href="<?php echo site_url('AbsensiController/input_surat'); ?>">Shift Absensi</a></li> -->
          </ul>
        </li>
        <!--
                  <li><a href="<?php echo site_url('AbsensiController/daftar_jadwal_kegiatan_luar'); ?>"><i class="fa fa-map-marker"></i>Kegiatan Luar</a></li>   
                  <li><a href="<?php echo site_url('AbsensiController/list_staff'); ?>"><i class="fa fa-user"></i>Data Pegawai</a></li>            
                  -->
      </ul>
    </div>

  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
  </div>
  <!-- /menu footer buttons -->
</div>