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
                <li><a href="<?php echo site_url('PersonalController/statistik_pegawai'); ?>"><i class="fa fa-line-chart"></i>Statistik Pegawai</a></li>
                <li><a href="<?php echo site_url('PersonalController/absen_datang'); ?>"><i class="fa fa-map-marker"></i>Absen Datang</a></li>
                <li><a href="<?php echo site_url('PersonalController/absen_pulang'); ?>"><i class="fa fa-map-marker"></i>Absen Pulang</a></li>

            </ul>
        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->

    <!-- /menu footer buttons -->
</div> 