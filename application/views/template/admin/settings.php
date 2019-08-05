<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Settings</h3>
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
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Password</h2>
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
                    <form id="form-submit" class="form-horizontal form-label-left" onsubmit="return false;">

                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama-divisi">Password Lama<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="old-pass" data-validate-length="6,8" name="old_pass" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama-divisi">Password Baru<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="new-pass" data-validate-length="6,8" name="new_pass" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama-divisi">Konfirmasi Password Baru<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="confirm-new-pass" data-validate-linked="new-pass" name="confirm_new_pass" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                                              
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <button type="submit" class="btn btn-success" onclick="change_password();">Simpan</button>
                          </div>
                        </div>

                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


<script>
  function change_password()
  {
    $('#form-submit').validate({
      submitHandler: function(form)
      {
        var update_data = $(form).serialize();
        if($('#new-pass').val()!=$('#confirm-new-pass').val())
        {
          
          swal({
                title: 'Password Baru Tidak Sama',
                text: '',
                type: 'error'
                });
        }
        else
        {
          
          $.ajax({
            url : "<?php echo site_url('AdminController/change_password') ?>",
            type : "POST",
            data : update_data,
            success : function(ajaxData)
            {
              var result = JSON.parse(ajaxData);
        
              if(result['status']==1)
              {
                swal({
                title: 'Ubah Password Berhasil',
                text: '',
                type: 'success'
                });
              }
              else if(result['status']==2)
              {
                swal({
                title: 'Ubah Password Gagal',
                text: '',
                type: 'error'
                });
              }
              else
              {
                swal({
                title: 'Ubah Password Gagal',
                text: 'Password Lama Salah',
                type: 'error'
                });
              }
              
            },
            error : function(status)
            {

            }
          })
        }
      }
    })
  }
</script>