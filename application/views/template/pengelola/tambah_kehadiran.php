<div class="row" id="list">
  <div class="x_panel">
    <div class="x_title">
      <h2>Tambah Kehadiran</h2>
      <ul class="nav navbar-right panel_toolbox">
        
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>">
        
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 col-xm-10 col-sd-12 col-ss-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Hadir</h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                
                <form id="demo-form" method="POST" action="<?php echo site_url('PengelolaController/submit_kehadiran'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                  <table class="table table-striped table-bordered">
                    <tr>
                      <td colspan='2'>
                        <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>" class="form-control">
                        <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal;?>" class="form-control">
                        <select class="select1_single form-control col-md-6 col-sd-12 col-ss-12 col-xs-12 col-xm-12" required="required" id="userid" name="userid">
                          <option value=""></option>
                          <?php
                            foreach($pegawai as $row)
                            {
                              echo "<option value='".$row['userid']."'>".$row['name']."</option>";
                            }
                          ?>
                        </select>
                      </td>
                        <td width="10px"><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button></td>
                    </tr>

                  </table>
                </form>

                <form id="demo-form" method="POST" action="<?php echo site_url('PengelolaController/hapus_kehadiran'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                  <table class="table table-striped table-bordered">
                    <?php foreach ($kehadiran as $ke) {?>
                      <tr>  
                        <td colspan='2'>
                          <?php echo $ke['nama_pegawai'];?>
                          <input type="hidden" id="id_kehadiran_opd" name="id_kehadiran_opd" value="<?php echo $ke['id_kehadiran_opd'];?>" class="form-control">
                          <input type="hidden" id="userid" name="userid" value="<?php echo $ke['userid'];?>" class="form-control">
                          <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>" class="form-control">
                          <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal;?>" class="form-control">
                        </td>
                        <td width="10px">
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
                        </td>
                      </tr>
                    <?php }?>

                  </table>
                </form>


              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-8 col-xs-12 col-xm-10 col-sd-12 col-ss-12 col-sl-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Izin / Sakit</h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                
              <form id="demo-form" method="POST" action="<?php echo site_url('PengelolaController/submit_kehadiran_izin'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <table class="table table-striped table-bordered">
                  <tr>
                    <td colspan='1'>
                      <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>" class="form-control">
                      <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal;?>" class="form-control">
                      <select class="select3_single form-control col-md-6 col-sd-6 col-ss-12 col-xs-12 col-xm-10" required="required" id="userid" name="userid">
                        <option value=""></option>
                        <?php
                          foreach($pegawai as $row)
                          {
                            echo "<option value='".$row['userid']."'>".$row['name']."</option>";
                          }
                        ?>
                      </select>
                      <td>
                        <select class="select2_single form-control col-md-6 col-sd-6 col-ss-12 col-xs-12 col-xm-10" required="required" id="id_keterangan" name="id_keterangan">
                          <option value=""></option>
                          <option value='1'>Sakit</option>
                          <option value='2'>Izin</option> 
                        </select>
                      </td>
                    </td>
                      <td width="10px"><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button></td>
                  </tr>

                </table>
              </form>

              <form id="demo-form" method="POST" action="<?php echo site_url('PengelolaController/hapus_izin'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                <table class="table table-striped table-bordered">
                  <?php foreach ($izin as $iz) {?>
                    <tr>  
                      <td colspan='1'>
                        <?php echo $iz['nama_pegawai'];?>
                        <input type="hidden" id="id_kehadiran_opd" name="id_kehadiran_opd" value="<?php echo $iz['id_kehadiran_opd'];?>" class="form-control">
                        <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal;?>" class="form-control">
                        <input type="hidden" id="userid" name="userid" value="<?php echo $iz['userid'];?>" class="form-control">
                        <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>" class="form-control">
                      </td>
                      <td align="center">

                      <?php
                        if($iz['keterangan']==1){
                          $iz['keterangan']="Sakit";
                        } else {
                          $iz['keterangan']="Izin";
                        }
                         echo $iz['keterangan'];?>
                      </td>
                      <td width="10px">
                        <button type="submit" class="btn  btn-danger btn-sm"><i class="fa fa-close"></i></button>
                      </td>
                    </tr>
                  <?php }?>

                </table>
              </form>

              </div>
            </div>
          </div>

        </div>
        <form id="demo-form" method="POST" action="<?php echo site_url('PengelolaController/kembali_kehadiran'); ?>" data-parsley-validate class="form-horizontal form-label-left">        
          <td width="10px">
            <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal;?>" class="form-control">
            <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>" class="form-control">
            <button type="submit" class="btn  btn-danger btn-sm">Kembali</button>
          </td>
        </form>
    </div>
  </div>
</div>

<script>

  $(".select1_single").select2({
    placeholder: "Pilih Pegawai",
    allowClear: true
  }); 

  $(".select2_single").select2({
    placeholder: "Pilih Keterangan",
    allowClear: true
  }); 

  $(".select3_single").select2({
    placeholder: "Pilih Pegawai",
    allowClear: true
  }); 

</script>