<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Input Surat</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Surat</h2>
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
                  <form id="demo-form2" method="POST" action="<?php echo site_url('StaffController/submit_surat'); ?>" data-parsley-validate class="form-horizontal form-label-left">

                        
						
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="perihal">Maksud Perjalanan <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="perihal" name="perihal" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
						<div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alat Angkutan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select1_single form-control col-md-7 col-xs-12" id="derajat" name="derajat">
                              <option value="">Pilih Angkutan</option>
                              <option value="1">Pesawat</option>
                              <option value="2">Kereta Api</option>
                              <option value="3">Kapal Laut</option>
                              <option value="4">Bus</option>
                              <option value="5">Mini Bus</option>
                              <option value="6">Mobil</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="berangkat">Tempat Berangkat <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="berangkat" name="berangkat" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_tujuan">Tempat Tujuan <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tujuan" name="tujuan" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Lama Perjalanan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select1_single form-control col-md-7 col-xs-12" id="waktu" name="waktu">
                              <option value="">Pilih waktu perjalanan</option>
                              <option value="1">1 hari</option>
                              <option value="2">2 hari</option>
                              <option value="3">3 hari</option>
                              <option value="4">4 hari</option>
                            </select>
                          </div>
                        </div>						
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Berangkat <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="tgl_masuk" name="tgl_masuk" class="date-picker form-control col-md-7 col-xs-12 has-feedback-left" required="required" type="text">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Harus Kembali <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="tgl_kembali" name="tgl_kembali" class="date-picker form-control col-md-7 col-xs-12 has-feedback-left" required="required" type="text">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ikut">Nama yang diikut sertakan 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="ikut" name="ikut" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Pembebanan Anggaran</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select1_single form-control col-md-7 col-xs-12" id="klasifikasi" name="klasifikasi">
                              <option value="">Pilih Anggaran</option>
                              <option value="1">Instansi</option>
                              <option value="2">Rekening Anggaran</option>
                              <option value="3">Biaya Sendiri</option>
                            </select>
                          </div>
                        </div>
						<div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan Lain-lain 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keterangan" name="keterangan" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>
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
      
        $('#tgl_masuk').daterangepicker({
          singleDatePicker: true,
          format: "YYYY-MM-DD",
          calender_style: "picker_3"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
		
		$('#tgl_kembali').daterangepicker({
          singleDatePicker: true,
          format: "YYYY-MM-DD",
          calender_style: "picker_3"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
    </script>