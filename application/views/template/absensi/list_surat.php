<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Masuk</h3>
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
			
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Terima Surat</h2>
					
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
                      
                      <div class="clearfix"></div>
                      <form class="demo-form" id="form-submit" onsubmit="return false;">
                        <center>
                          <div class="row">
						  
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <label class="control-label col-md-12 col-sm-2 col-xs-2 " for="id_surat">Submit by ID Surat 
                            </label>
                          </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-4 text-center">
                              <input type="text" id="id-surat-submit" required="required" name="id_surat" class="form-control">
                            </div>       
                          </div>                 
                        </center> 
                        </br>                     
                        <div class="row">
                          <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-4">
                              <center><button type="submit" onclick="terima_surat();" class="btn btn-success"><span class="fa fa-check"></span>Submit</button></center>
                            </div>
                        </div>  
                      </form>
                  </div>
                </div>
              </div>
			</div>
			
            <div class="clearfix"></div>
			
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kotak Surat</h2>
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
                  <div id="toolbar">
                      <form id="form-tampil" class="form-horizontal form-label-left" onsubmit="return false;">
                        
                          <label class="control-label col-md-1 col-sm-1 col-xs-1">Tahun</label>
                          <div class="col-md-2 col-sm-2 col-xs-3">
                            <select class="form-control" id="tahun" name="tahun">
                              <option>2018</option>
                              <option>2017</option>                              
                            </select>
                          </div>
                        
                          <label class="control-label col-md-1 col-sm-1 col-xs-1">Bulan</label>
                          <div class="col-md-3 col-sm-3 col-xs-3">
                            <select class="form-control" id="bulan" name="bulan">
                              <option value='0'>Semua Bulan</option>
                              <option value='1'>Januari</option>
                              <option value='2'>Februari</option>                              
                              <option value='3'>Maret</option>                              
                              <option value='4'>April</option>                              
                              <option value='5'>Mei</option>                              
                              <option value='6'>Juni</option>                              
                              <option value='7'>Juli</option>                              
                              <option value='8'>Agustus</option>                              
                              <option value='9'>September</option>                              
                              <option value='10'>Oktober</option>                              
                              <option value='11'>November</option>                              
                              <option value='12'>Desember</option>                              
                            </select>
                          </div>
                        
                          <div class="col-md-3 col-sm-3 col-xs-3">                            
                            <button type="submit" onclick="tampilkan();" class="btn btn-success">Tampilkan</button>
                          </div>
                        
                      </form>
                    </div>
                    <div class="clearfix"></div>
                    <hr></hr>
                    <div id="list-surat">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                            <th><center>No</center></th>
                            <th><center>Nama</center></th>
                            <th><center>Tanggal Pengajuan</center></th>
                            <th><center>Alat Angkutan</center></th>
                            <th><center>Pembebanan Anggaran</center></th>
                            <th><center>Keterangan Kepala Bidang</center></th>
                            <th><center>Keterangan Kepala Badan</center></th>
                            <th><center>Action</center></th>
                              
                            </tr>
                          </thead>


                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

<!--------------------------------------- Modal Final ------------------------------------ -->
<div class="modal inmodal" id="final-modal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-check fa-4x "></i></center>
                                    <center><h4 class="modal-title">Konfirmasi Surat</h4></center><h4>
                                    <center><small >Konfirmasi Keputusan Surat</small></center>
                                    
                                    
                                </div>
                                <form id="form-edit" onsubmit="return false;">
                                <input type="hidden" id="id-surat-modal" name="id_surat">
                                <input type="hidden" id="id-disposisi-modal" name="id_disposisi">
                                <input type="hidden" id="id-harian-modal" name="jml_harian">
                                <input type="hidden" id="id-divisi-modal" name="id_divisi">
                                <div class="modal-body">                                             
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Pengirim</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="pengirim-modal" readonly name="pengirim" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>     
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Perihal</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea style="resize: vertical;" readonly class="form-control" name="perihal" rows='3' id="perihal-modal" >                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Tempat Berangkat</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="derajat-modal" readonly name="derajat" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Tempat Tujuan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="klasifikasi-modal" readonly name="klasifikasi" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div> 
									<div class="form-group">
                                        <label class="control-label col-md-12">Sisa Anggaran</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="sisa-anggaran-modal" readonly name="sisa_anggaran" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12">Konfirmasi Keputusan Surat</label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>
                                          <input type="checkbox" id="konfirmasi-modal" name="final" value='final' />
                                        </label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Keterangan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea style="resize: vertical;" disabled class="form-control" name="keterangan" rows='3' id="keterangan-modal" >                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="clearfix"></div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="submit" id="btn-simpan" class="btn btn-success" >Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


<script>
      
     
  var elem = document.querySelector('#konfirmasi-modal');
  var myswitch = new Switchery(elem,{color: '#26B99A'});
  function setSwitchery(switchElement, checkedBool) {
      if((checkedBool && !switchElement.isChecked()) || (!checkedBool && switchElement.isChecked())) {
          switchElement.setPosition(true);
          switchElement.handleOnchange(true);
      }
  }

  elem.onchange = function()
  {
    if(elem.checked)
    {
      $('#keterangan-modal').removeAttr('disabled');
      $('#btn-simpan').removeAttr('disabled');
    }
    else
    {
      $('#keterangan-modal').attr('disabled',true);
      $('#btn-simpan').attr('disabled',true);
    }
  }

        var t = $('#datatable').DataTable();

        function tampilkan()
        {
          postData = $('#form-tampil').serialize();   
        
                
          $.ajax(
          {
             url: "<?php echo base_url();?>index.php/KepalaController/get_surat",
             type: "POST",
             data : postData,                   
             success: function (ajaxData)
             {
                  
                  
                  t.clear().draw();
                  var result = JSON.parse(ajaxData);


                  for(var i=0; i<result.length; i++)
                  {
                      var button1 = "<a href='#' class='btn-edit' data-did='"+result[i]['id_disposisi']+"' data-sid='"+result[i]['id_surat']+"' data-rid='"+result[i]['jml_harian']+"' data-kid='"+result[i]['id_divisi']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-check fa-2x'></span></a>";
                      if(result[i]['status_final']==1 || result[i]['status_final2']==1)
                      {
                        button1="";
                      }
                      if(result[i]['keterangan']==null){
						  result[i]['keterangan']="";
					  }
					  if(result[i]['keterangan2']==null){
						  result[i]['keterangan2']="";
					  }
                       t.row.add( [
                              "<center>"+[i+1]+"</center>",
                              "<center>"+result[i]['pengirim']+"</center>",
                              "<center>"+result[i]['tgl_diterima']+"</center>",
                              "<center>"+result[i]['nama_derajat']+"</center>",
                              "<center>"+result[i]['nama_klasifikasi']+"</center>",
                              "<center>"+result[i]['keterangan']+"</center>",                              
                              "<center>"+result[i]['keterangan2']+"</center>",                              
                              "<center>"+button1+"</center>",
                              
                          ] ).draw();
                          
                  }
                  
              },
              error: function(status)
              {
                  t.clear().draw();
              }
          }); 
        }
      

    $('#datatable').on('click','.btn-edit', function(){
      var id_surat = $(this).data("sid");
      var id_disposisi = $(this).data("did");
      var jml_harian = $(this).data("rid");
      var id_divisi = $(this).data("kid");

      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/get_detail_surat",
         type: "POST",
         data : {id_surat:id_surat},                   
         success: function (ajaxData)
         {
           var result = JSON.parse(ajaxData);
           $('#pengirim-modal').val(result[0]['pengirim']);
           $('#perihal-modal').html(result[0]['perihal']);
           $('#derajat-modal').val(result[0]['nama_derajat']);
           $('#klasifikasi-modal').val(result[0]['nama_klasifikasi']);
           $('#sisa-anggaran-modal').val(result[0]['sisa_anggaran']);
           $('#id-disposisi-modal').val(id_disposisi);
           $('#id-surat-modal').val(id_surat);
           $('#id-harian-modal').val(jml_harian);
           $('#id-divisi-modal').val(id_divisi);
           $('#keterangan-modal').attr('disabled',true);
            $('#btn-simpan').attr('disabled',true);
            setSwitchery(myswitch,false);
           $('#final-modal').modal('show');
         },
         error: function(status)
         {

         }
       });
    });
    $('#btn-simpan').click(function(){
      var data_update = $('#form-edit').serialize();
      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/submit_keputusan",
         type: "POST",
         data : data_update,                   
         success: function (ajaxData)
         {
           tampilkan();
           $('#final-modal').modal('hide');
           swal({
            title: 'Konfirmasi Keputusan Surat Berhasil',
            text: '',
            type: 'success'
            });
           
         },
         error: function(status)
         {
          swal({
            title: 'Konfirmasi Keputusan Surat Gagal',
            text: '',
            type: 'danger'
            });
         }
       });
      
    });
    function terima_surat()
    {
      var data_submit = $('#form-submit').serialize();
      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/tambah_disposisi",
         type: "POST",
         data : data_submit,                   
         success: function (ajaxData)
         {
           tampilkan();
           swal({
            title: 'Disposisi Surat Berhasil',
            text: '',
            type: 'success'
            });
           
         },
         error: function(status)
         {
          swal({
            title: 'Disposisi Surat Gagal',
            text: '',
            type: 'danger'
            });
         }
       });
    }

    </script>