<div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-users"></i> <span>Absensi Online</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets');?>/images/pemkot.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $session['nama_staff']; ?></h2>
                <br>
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
                  <li><a href="<?php echo site_url('AdminController'); ?>"><i class="fa fa-home"></i> Beranda</a>                    
                  </li>

                  <li><a><i class="fa fa-user"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('AdminController/tambah_user'); ?>">Tambah Pengguna</a></li>
                      <li><a href="<?php echo site_url('AdminController/daftar_user'); ?>">Daftar Pengguna</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-users"></i> Role <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('AdminController/tambah_role'); ?>">Tambah Role</a></li>
                      <li><a href="<?php echo site_url('AdminController/daftar_role'); ?>">Daftar Role</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-info-circle"></i> Keterangan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('AdminController/tambah_keterangan'); ?>">Tambah Keterangan</a></li>
                      <li><a href="<?php echo site_url('AdminController/daftar_keterangan'); ?>">Daftar keterangan</a></li>
                    </ul>
                  </li>
                  
                  <li><a href="<?php echo site_url('AdminController/daftar_log'); ?>"><i class="fa fa-history"></i> History</a>                    
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            
          </div>