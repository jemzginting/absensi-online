<div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Kegiatan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" method="POST" action="<?php echo site_url('PengelolaController/submit_jadwal_kegiatan_luar'); ?>" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Kegiatan<span class="required">*</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="select1_single form-control col-md-4 col-xs-12" required="required" id="nama_kegiatan" name="nama_kegiatan">
                              <option value=""></option>
                              <option value="Apel Gabungan">Apel Gabungan</option>
                              <option value="Senam Gabungan">Senam Gabungan</option>
                              <option value="Tugas Lainnya">Tugas Lainnya</option>
                              
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
                        <div class="form-group">
                          <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>

                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


<script>

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

    </script>