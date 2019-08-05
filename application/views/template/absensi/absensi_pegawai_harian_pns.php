<div class="row">
  <div class="x_panel">
    <div class="x_title">
      <h2>Absensi</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a></li>
                  <li><a href="#">Settings 2</a></li>
                </ul>
            </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
	            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
	              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Absen PNS</a>
	              </li>
	              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Rekap Absen NON PNSD</a>
	              </li>
	            </ul>
            <!--  <button type="submit" onclick="update_all();" class="btn btn-success">Update Terbaru !</button>
-->
	            <div id="myTabContent" class="tab-content">
	              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

	                <!-- start Rekap Absen PNS -->
	                <div id="toolbar">

                  <button type="submit" onclick="update_all();" class="btn btn-success">Update Hari Ini !</button>

	                  <form id="form-tampil-pns" class="form-horizontal form-label-left" onsubmit="return false;">
	                    <br/>
	                    <div class="col-xs-12 col-sm-12 col-md-1">
	                      <label class="control-label">Departement</label>
	                    </div>
	                    <div class="col-xs-12 col-sm-12 col-md-2">
	                      <select class="select_single form-control" id="departments" name="departments" required="required">
	                        <option value=""></option>
	                        <?php
	                          foreach($departments as $row)
	                          {
	                            echo "<option value='".$row['DeptID']."'>".$row['DeptName']."</option>";
	                          }
	                        ?>                              
	                      </select>
	                    </div>
	                    <div class="col-xs-12 col-sm-12 col-md-1">
	                      <label class="control-label">Mulai</label>
	                    </div>
	                    <div class="col-xs-12 col-sm-12 col-md-2">
	                      <input id="mulai" name="mulai" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
	                      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
	                    </div>
	                    <div class="col-xs-12 col-md-3">                            
	                      <button type="submit" onclick="tampilkan_pns();" class="btn btn-primary">Tampilkan</button>
	                      <button type="submit" id="cetak_pns1" onchange="Cetak_pns()" onclick="cetak_pns();" class="btn btn-danger">Cetak</button>
                      </div>
	                  </form>
	                <br>
	                </div>
	                <div class="x_content">
	                    <table id="loading-pns" class="table table-striped table-bordered">
	                      
	                    </table>
	                </div>
	                <div class="x_content" id="load-pns">
	                	<div class="table-responsive">
	                	  <table id="datatable" class="table table-striped table-bordered">
	                	    <thead>
	                	      <tr>
	                	        <th><center>No</center></th>
	                	        <th><center>Nama</center></th>
	                	        <th><center>NIP</center></th>
	                	        <th><center>Tanggal</center></th>
	                	        <th><center>Masuk</center></th>
	                	        <th><center>Pulang</center></th>
	                	        <th><center>Telat</center></th>
	                	        <th><center>Pulang Cepat</center></th>
	                	        <th><center>Ket</center></th>
	                	    <!--    <th><center>Aksi</center></th> -->
	                	      </tr>
	                	    </thead>
	                	  </table>
	                	</div>
	                </div>
	                
	                <!-- end Rekap Absen PNS -->

	              </div>
	              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

	                <!-- start Rekap Absen NON PNSD -->
	                
	                 <div id="toolbar">
	                   <form id="form-tampil-non-pnsd" class="form-horizontal form-label-left" onsubmit="return false;">
	                     <br/>
	                     <div class="col-xs-12 col-sm-12 col-md-1">
	                       <label class="control-label">Departement</label>
	                     </div>
	                     <div class="col-xs-12 col-sm-12 col-md-2">
	                       <select class="select_single2 form-control" id="departments1" name="departments1" required="required">
	                         <option value=""></option>
	                         <?php
	                           foreach($departments as $row)
	                           {
	                             echo "<option value='".$row['DeptID']."'>".$row['DeptName']."</option>";
	                           }
	                         ?>                              
	                       </select>
	                     </div>
	                      <div class="col-xs-12 col-sm-12 col-md-1">
	                         <label class="control-label">Mulai</label>
	                     </div>
	                      <div class="col-xs-12 col-sm-12 col-md-2">
	                        <input id="mulai1" name="mulai1" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
	                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
	                      </div>
	                     <div class="col-xs-12 col-md-3">                            
	                       <button type="submit" onclick="tampilkan_non_pnsd();" class="btn btn-primary">Tampilkan</button>
	                       <button type="submit" id="cetak_non_pnsd1" onchange="Cetak_non_pnsd()" onclick="cetak_non_pnsd();" class="btn btn-danger">Cetak</button>
	                     </div>
	                   </form>
	                   <br>
	                 </div>
	                 <div class="x_content">
	                     <table id="loading-non-pnsd" class="table table-striped table-bordered">
	                       
	                     </table>
	                 </div>
	                 <div class="x_content" id="load-non-pnsd">
	                 	<div class="table-responsive">
	                 	  <table id="datatable1" class="table table-striped table-bordered">
	                 	    <thead>
	                 	      <tr>
	                 	        <th><center>No</center></th>
	                 	        <th><center>Nama</center></th>
	                 	        <th><center>NIP</center></th>
	                 	        <th><center>Tanggal</center></th>
	                 	        <th><center>Masuk</center></th>
	                 	        <th><center>Pulang</center></th>
	                 	        <th><center>Telat</center></th>
	                 	        <th><center>Pulang Cepat</center></th>
	                 	        <th><center>Ket</center></th>
	                 	       <!-- <th><center>Aksi</center></th> -->
	                 	      </tr>
	                 	    </thead>
	                 	  </table>
	                 	</div>	                 	
	                 </div>
	                <!-- end Rekap Absen NON PNSD -->
	              </div>
	            </div>
	          </div>
  </div> 
</div>
<!--------------------------------------- Modal Edit PNS ------------------------------------ -->
<div class="modal inmodal" id="edit-modal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-edit fa-4x "></i></center>
                                    <center><h4 class="modal-title">Keterangan</h4></center><h4>
                                    <center><small >Edit Keterangan Pegawai</small></center>

                                </div>
                                <form id="form-edit" onsubmit="return false;">
                                <input type="hidden" id="id-userid-modal" name="id_userid">
                                <input type="hidden" id="id-tanggal-modal" name="tanggal">
                                <div class="modal-body">                                             
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Keterangan</label>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                              <select class="form-control col-md-7 col-xs-12" id="keterangan" name="keterangan">
                                                <option value="0">Pilih Keterangan</option>
                                                <?php
                                                  foreach($jenis_keterangan as $row)
                                                  {
                                                    echo "<option value='".$row['id_keterangan']."'>".$row['nama_keterangan']."</option>";
                                                  }
                                                ?>
                                              </select>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12"></label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            
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

<!--------------------------------------- Modal Edit NON PNSD ------------------------------------ -->
<div class="modal inmodal" id="edit-modal1" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-edit fa-4x "></i></center>
                                    <center><h4 class="modal-title">Keterangan</h4></center><h4>
                                    <center><small >Edit Keterangan Pegawai</small></center>
                                </div>
                                <form id="form-edit1" onsubmit="return false;">
                                <input type="hidden" id="id-userid-modal1" name="id_userid1">
                                <input type="hidden" id="id-tanggal-modal1" name="tanggal1">
                                <div class="modal-body">                                             
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Keterangan</label>
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                              <select class="form-control col-md-7 col-xs-12" id="keterangan1" name="keterangan1">
                                                <option value="0">Pilih Keterangan</option>
                                                <?php
                                                  foreach($jenis_keterangan as $row)
                                                  {
                                                    echo "<option value='".$row['id_keterangan']."'>".$row['nama_keterangan']."</option>";
                                                  }
                                                ?>
                                              </select>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12"></label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="modal-footer">
                                  <button type="button"  class="btn btn-white" data-dismiss="modal">Close</button>
                                  <button type="submit" id="btn-simpan1" class="btn btn-success" >Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

<script>
      
  $('#mulai').daterangepicker({
    singleDatePicker: true,
    format: "YYYY-MM-DD",
     calender_style: "picker_3"
     }, function(start, end, label) {
     console.log(start.toISOString(), end.toISOString(), label);
  });

  $('#mulai1').daterangepicker({
    singleDatePicker: true,
    format: "YYYY-MM-DD",
     calender_style: "picker_3"
     }, function(start, end, label) {
     console.log(start.toISOString(), end.toISOString(), label);
  });

  /////////////////////////////pns//////////////////////////////////////
  var loading_pns = $('#loading-pns').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');
    
     $(document).ready(function() {
      //$("#cetak_pns1").hide();
      loading_pns.hide();
      $('loading-pns').hide();

      });

  var t = $('#datatable').DataTable();


  function tampilkan_pns()
  {
    postData = $('#form-tampil-pns').serialize();
    mulai = $('#mulai').val();  
    departments = $('#departments').val(); 
    
    if(mulai != "" && departments != ""){

      $.ajax(
      {
         url: "<?php echo base_url();?>index.php/AbsensiController/tampil_rekap_pns_dept_by_tanggal",
         type: "POST",
         data : postData,  
         beforeSend:function(){ 
           loading_pns.show();
           $('#load-pns').hide();
           t.clear().draw();
         },                  
         success: function (ajaxData)
         {
            loading_pns.hide();
            $('#load-pns').show();
            $("#cetak_pns1").show();
            
              t.clear().draw();
              var result = JSON.parse(ajaxData);
             
            if(result!=0){

              for(var i=0; i<result.length; i++)
              {
                 var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['userid']+"' data-idtanggal='"+result[i]['tanggal']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                  if(result[i]['aksi']==0)
                  {
                    button1 = "";
                  }
                   t.row.add( [
                          "<center>"+[i+1]+"</center>",
                          "<center>"+result[i]['nama_pegawai']+"</center>",
                          "<center>"+result[i]['nip']+"</center>",
                          "<center>"+result[i]['tanggal']+"</center>",
                          "<center>"+result[i]['masuk']+"</center>",
                          "<center>"+result[i]['pulang']+"</center>",
                          "<center>"+result[i]['telat']+"</center>",                              
                          "<center>"+result[i]['pulang_cepat']+"</center>",                              
                          "<center>"+result[i]['nama_keterangan']+"</center>",                               
                         // "<center>"+button1+"</center>",
                          
                      ] ).draw();
              }
              } else {
                  swal({
                    title: 'Tidak ada data',
                    text: '',
                    type: 'success'
                    });
              }
          },
          error: function(status)
          {
              t.clear().draw();
          }
      }); 
    }
  }

  $('#datatable').on('click','.btn-edit', function(){
    var id_userid = $(this).data("iduserid");
    var tanggal = $(this).data("idtanggal");
    $.ajax({
      url: "<?php echo base_url();?>index.php/AbsensiController/get_detail_keterangan_pns",
       type: "POST",
       data : {id_userid:id_userid,tanggal:tanggal},                   
       success: function (ajaxData)
       {
          var result = JSON.parse(ajaxData);
           $('#id-userid-modal').val(id_userid);
           $('#id-tanggal-modal').val(tanggal);
           $('#keterangan').val(result[0]['keterangan']);
           $('#edit-modal').modal('show');
           // $('#id-userid-modal').val(id_userid);
           // $('#keterangan').val(result[0]['keterangan']);
           // // $('#id-tanggal-modal').val(tanggal);
           // $('#edit-modal').modal('show');
       },
       error: function(status)
       {

       }       
    });
  });

  $('#btn-simpan').click(function(){
    var update_data = $('#form-edit').serialize();
    $.ajax({
        url: "<?php echo base_url();?>index.php/AbsensiController/update_keterangan_pns",
         type: "POST",
         data : update_data,                   
         success: function (ajaxData)
         {
           tampilkan_pns();
           $('#edit-modal').modal('hide');
           swal({
            title: 'Edit Keterangan Berhasil',
            text: '',
            type: 'success'
            });
         },
         error: function(status)
         {
          swal({
            title: 'Edit Staff Gagal',
            text: '',
            type: 'danger'
            });
         }
       });
  });

  function cetak_pns()
  {
    mulai = $('#mulai').val();
    DeptID = $('#departments').val();
    status_kepegawaian = "pns";
    
    window.open("<?php echo base_url(); ?>CetakHarianController/index/" + DeptID +'/' + mulai + '/' + status_kepegawaian,'_blank');
  }

////////////////////non pnsd////////////////////////////////////
var loading_non_pnsd = $('#loading-non-pnsd').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');
  $(document).ready(function() {
    //$("#cetak_non_pnsd1").hide();
    loading_non_pnsd.hide();
    $('loading-non-pnsd').hide();
  });

var d = $('#datatable1').DataTable();

  function tampilkan_non_pnsd()
  {
    postData = $('#form-tampil-non-pnsd').serialize();
    mulai = $('#mulai1').val(); 
    departments = $('#departments1').val(); 
    
    if(mulai != "" && departments != ""){

      $.ajax(
      {
         url: "<?php echo base_url();?>index.php/AbsensiController/tampil_rekap_tkk_dept_by_tanggal",
         type: "POST",
         data : postData,  
         beforeSend:function(){ 
           loading_non_pnsd.show();
           $('#load-non-pnsd').hide();
           d.clear().draw();
         },                 
         success: function (ajaxData)
         {
            loading_non_pnsd.hide();
            $('#load-non-pnsd').show();
            $("#cetak_non_pnsd1").show();
            
	        d.clear().draw();
	        var result = JSON.parse(ajaxData);
             
            if(result!=0){

              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['userid']+"' data-idtanggal='"+result[i]['tanggal']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                  if(result[i]['keterangan'] == 0){
                    result[i]['nama_keterangan'] = "";
                  } 

                  if(result[i]['aksi']==0)
                  {
                    button1 = "";
                  }
                   d.row.add( [
                          "<center>"+[i+1]+"</center>",
                          "<center>"+result[i]['nama_pegawai']+"</center>",
                          "<center>"+result[i]['nip']+"</center>",
                          "<center>"+result[i]['tanggal']+"</center>",
                          "<center>"+result[i]['masuk']+"</center>",
                          "<center>"+result[i]['pulang']+"</center>",
                          "<center>"+result[i]['telat']+"</center>",                              
                          "<center>"+result[i]['pulang_cepat']+"</center>",                              
                          "<center>"+result[i]['nama_keterangan']+"</center>",                               
                         // "<center>"+button1+"</center>",
                          
                      ] ).draw();
                      
              }
              } else {
                  swal({
                    title: 'Tidak ada data',
                    text: '',
                    type: 'success'
                    });
              }
          },
          error: function(status)
          {
              d.clear().draw();
          }
      }); 
    }
  }

  $('#datatable1').on('click','.btn-edit', function(){
      var id_userid1 = $(this).data("iduserid");
      var tanggal1 = $(this).data("idtanggal");
      $.ajax({
        url: "<?php echo base_url();?>index.php/AbsensiController/get_detail_keterangan_tkk",
         type: "POST",
         data : {id_userid1:id_userid1,tanggal1:tanggal1},                   
         success: function (ajaxData)
         {
            var result = JSON.parse(ajaxData);
             $('#id-userid-modal1').val(id_userid1);
             $('#id-tanggal-modal1').val(tanggal1);
             $('#keterangan1').val(result[0]['keterangan']);
             $('#edit-modal1').modal('show');
             // $('#id-userid-modal').val(id_userid);
             // $('#keterangan').val(result[0]['keterangan']);
             // // $('#id-tanggal-modal').val(tanggal);
             // $('#edit-modal').modal('show');
         },
         error: function(status)
         {

         }       
      });
    });

  $('#btn-simpan1').click(function(){
      var update_data = $('#form-edit1').serialize();
      $.ajax({
          url: "<?php echo base_url();?>index.php/AbsensiController/update_keterangan_tkk",
           type: "POST",
           data : update_data,                   
           success: function (ajaxData)
           {
             tampilkan_non_pnsd();
             $('#edit-modal1').modal('hide');
             swal({
              title: 'Edit Keterangan Berhasil',
              text: '',
              type: 'success'
              });
           },
           error: function(status)
           {
            swal({
              title: 'Edit Keterangan Gagal',
              text: '',
              type: 'danger'
              });
           }
         });
    });  

   // var loading2 = $('#loading_2').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');
    function update_all() {
        //var postData = $('#form_update_ulang').serialize();
        var jemz = $.ajax({
            url: '<?php echo site_url('AbsensiController/get_rekap_harian_sekarang') ?>',
            type: "GET",
           // data: postData,

           beforeSend:function(){ 
           loading_pns.show();
           
            $('#form-tampil-pns').hide();
           $('#load-pns').hide();
          // t.clear().draw();
         },  
            success: function(data) {
              loading_pns.hide();
              $('#load-pns').show();
              $('#form-tampil-pns').show();
                swal({
                    title: 'Berhasil update terbaru',
                    text: '',
                    type: 'success'
                });
            },

            error: function(status) {

                swal({
                    title: 'gagal',
                    text: '',
                    type: 'warning'
                });

            }
        });
    }

  function cetak_non_pnsd()
  {
    mulai = $('#mulai1').val();
    DeptID = $('#departments').val();
    status_kepegawaian = "tkk";
    
    window.open("<?php echo base_url(); ?>CetakHarianController/index/" + DeptID +'/' + mulai + '/' + status_kepegawaian,'_blank');
  }
  </script>
  <script>
      $('#datetimepicker1').datetimepicker({
        format: 'HH:mm'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'HH:mm'
    });
  </script>
