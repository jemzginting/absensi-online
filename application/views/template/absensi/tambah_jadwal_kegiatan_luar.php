<div class="">
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Jadwal Kegiatan</h2>
          <ul class="nav navbar-right panel_toolbox">
            <div class="row">  
              <form id="demo-form" method="POST" action="<?php echo site_url('AbsensiController/daftar_jadwal_kegiatan_luar'); ?>" data-parsley-validate class="form-horizontal form-label-left"> 
                <button type="submit" class="btn-xs btn-danger">Kembali Ke Daftar</button>
              </form>
            </div>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form id="demo-form2" method="POST" action="<?php echo site_url('AbsensiController/submit_jadwal_kegiatan_luar'); ?>" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Kegiatan<span class="required">*</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <select class="select1_single form-control col-md-4 col-xs-12" required="required" id="nama_kegiatan" name="nama_kegiatan">
                    <option value=""></option>
                    <?php
                      foreach($jenis_kegiatan as $row)
                      {
                        echo "<option value='".$row['nama_kegiatan']."'>".$row['nama_kegiatan']."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Dinas<span class="required">*</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <select class="select_single form-control col-md-4 col-xs-12" required="required" id="department" name="department">
                    <option value=""></option>
                    <option value="SELURUH">SELURUH OPD</option>
                    <?php
                      foreach($department as $row)
                      {
                        echo "<option value='".$row['DeptName']."'>".$row['DeptName']."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
                    
              <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal Kegiatan <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input id="tgl_kegiatan" name="tgl_kegiatan" class="date-picker form-control col-md-4 col-xs-12 has-feedback-left" required="required" type="text">
                  <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>   
             
              <div class="ln_solid"></div>

              <div class="row">
                <div class="form-group">
                  <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(".select_single").select2({
    placeholder: "Pilih Dinas",
    allowClear: true
  });

  $(".select1_single").select2({
    placeholder: "Pilih Jenis Kegiatan",
    allowClear: true
  });
    
  $('#tgl_kegiatan').daterangepicker({
    singleDatePicker: true,
    format: "YYYY-MM-DD",
    calender_style: "picker_3"
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

function kembali_daftar_jadwal_kegiatan_luar()
{
   $.ajax({
      url: "<?php echo base_url();?>index.php/AbsensiController/daftar_jadwal_kegiatan_luar",
       type: "POST",
       data : null,                   
          beforeSend:function(){  
            $('#list').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');
          },
          success:function(data){
            $('#list').replaceWith(data);
          }, // end success
        dataType:"html"  
    });
}

</script>