<div class="row">
  <div class="x_panel">
    <div class="x_title">
      <h2>Jadwal Kegiatan Luar</h2>
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
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Jadwal Kegiatan Luar PNS</a>
        </li>
        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Jadwal Kegiatan Luar NON PNSD</a>
        </li>
      </ul>

      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

          <!-- start Rekap Absen PNS -->
          <div id="toolbar">
            <form id="form-tampil-pns" class="form-horizontal form-label-left" onsubmit="return false;">
              <div class="col-xs-12 col-sm-12 col-md-1">
                <label class="control-label">Tahun</label>
              </div>
                <div class="col-xs-12 col-sm-12 col-md-2">
                  <select class="select1_single form-control" id="tahun" name="tahun">
                    <option>2018</option>
                    <option>2017</option>                              
                  </select>
                </div>
              
              <div class="col-xs-12 col-sm-12 col-md-1">
                <label class="control-label">Bulan</label>
              </div>
                <div class="col-xs-12 col-sm-12 col-md-2">
                  <select class="select2_single form-control" id="bulan" name="bulan">
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
              
                <div class="col-xs-12 col-md-1">
                  <label class="control-label"></label>
                </div>
                <div class="col-xs-12 col-md-3">                            
                  <button type="submit" id="tampilkan_pns" onclick="tampilkan();" class="btn btn-success">Tampilkan</button>
                  <!-- <button type="submit" id="rekap1" onclick="rekap();" class="btn btn-success">Rekap</button> -->
                  <button type="submit" id="cetak_pns1" onchange="Cetak_pns()" onclick="cetak_pns();" class="btn btn-success">Cetak</button>
                </div>
              
            </form>
          </div>
          <div class="clearfix"></div>
          <hr></hr>
          <div id="list-surat" class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th><center>NO</center></th>
                  <th><center>NAMA KEGIATAN</center></th>
                  <th><center>TANGGAL</center></th>
                  <th><center>Action</center></th>
                </tr>
              </thead>


              <tbody>

              </tbody>
            </table>
          </div>

          <!-- end Rekap Absen PNS -->

        </div>

        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

          <!-- start Rekap Absen NON PNSD -->
          <div id="toolbar">
            <form id="form-tampil-non-pnsd" class="form-horizontal form-label-left" onsubmit="return false;">
              <div class="col-xs-12 col-sm-12 col-md-1">
                <label class="control-label">Tahun</label>
              </div>
                <div class="col-xs-12 col-sm-12 col-md-2">
                  <select class="select3_single form-control" id="tahun1" name="tahun1">
                    <option>2018</option>
                    <option>2017</option>                              
                  </select>
                </div>
              
              <div class="col-xs-12 col-sm-12 col-md-1">
                <label class="control-label">Bulan</label>
              </div>
                <div class="col-xs-12 col-sm-12 col-md-2">
                  <select class="select4_single form-control" id="bulan1" name="bulan1">
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
              
                <div class="col-xs-12 col-md-1">
                  <label class="control-label"></label>
                </div>
                <div class="col-xs-12 col-md-3">                            
                  <button type="submit" id="tampilkan_non_pnsd1" onclick="tampilkan_non_pnsd();" class="btn btn-success">Tampilkan</button>
                  <!-- <button type="submit" id="rekap1" onclick="rekap();" class="btn btn-success">Rekap</button> -->
                  <button type="submit" id="cetak_non_pnsd1" onchange="Cetak_non_pnsd()" onclick="cetak_non_pnsd();" class="btn btn-success">Cetak</button>
                </div>
              
            </form>
          </div>
          <div class="clearfix"></div>
          <hr></hr>
          <div id="list-surat" class="table-responsive">
            <table id="datatable1" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th><center>NO</center></th>
                  <th><center>NAMA KEGIATAN</center></th>
                  <th><center>TANGGAL</center></th>
                  <th><center>Action</center></th>
                </tr>
              </thead>


              <tbody>

              </tbody>
            </table>
          </div> 
          <!-- end Rekap Absen NON PNSD -->

        </div>
        
      </div>
    </div>

  </div>
</div>

<!--------------------------------------- Modal Edit PNS ------------------------------------ -->
<div class="modal inmodal" id="edit-pns-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-search fa-4x "></i></center>
                <center><h4 class="modal-title">Detail Absensi PNS</h4></center><h4>
                <center><small >Detail Absensi Pegawai PNS</small></center>
                
                
            </div>
            <form id="form-edit" onsubmit="return false;">
            <input type="hidden" id="id-surat-modal" name="id_userid">
            <div class="modal-body">                                             
                <div class="form-group">
                    <div id="list-surat2" class="table-responsive">
                      <table id="datatable2" class="table table-striped table-bordered">
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
                          </tr>
                        </thead>


                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>


<!--------------------------------------- Modal Edit NON PNSD ------------------------------------ -->
<div class="modal inmodal" id="edit-non-pnsd-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-search fa-4x "></i></center>
                <center><h4 class="modal-title">Detail Absensi NON PNSD</h4></center><h4>
                <center><small >Detail Absensi Pegawai NON PNSD</small></center>
                
                
            </div>
            <form id="form-edit" onsubmit="return false;">
            <input type="hidden" id="id-surat-modal" name="id_userid">
            <div class="modal-body">                                             
                <div class="form-group">
                    <div id="list-surat2" class="table-responsive">
                      <table id="datatable3" class="table table-striped table-bordered">
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
                          </tr>
                        </thead>


                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>

<script>
////////////////////////////// start pns////////////////////////////////
$(document).ready(function() {
  $("#cetak_pns1").hide();
    $("#tampilkan_pns").click(function(){
      $("#cetak_pns1").show();
    })
});

$('#tgl_masuk').daterangepicker({
          singleDatePicker: true,
          format: "YYYY-MM-DD",
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

$('#tgl-masuk-modal').daterangepicker({
          singleDatePicker: true,
          format: "YYYY-MM-DD",
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

$('.clockpicker').clockpicker({
  placement: 'top',
  autoclose: true,
  'default' : 'now',
  align : 'left',
});
$(".select_single").select2({
  placeholder: "Pilih Departments",
  allowClear: true
});

$(".select1_single").select2({
  placeholder: "Pilih Tahun",
  allowClear: true
});
$(".select2_single").select2({
  placeholder: "Pilih Bulan",
  allowClear: true
});

var t = $('#datatable').DataTable({});

var c = $('#datatable2').DataTable({});

function tampilkan()
{
  postData = $('#form-tampil-pns').serialize(); 
  bulan = $('#bulan').val(); 
  alert(bulan); 
  // var win = window.open('get_rekap_pns_bulanan','_blank');
  // win.focus();
    // if(departments != ""){      
      $.ajax(
      {
         url: "<?php echo base_url();?>index.php/PengelolaController/get_kegiatan_luar_pns_by_dept",
         type: "POST",
         data : postData,   
          beforeSend:function(){ 
            swal({
             title: 'Silahkan Tunggu',
             text: '',
             type: 'success'
             });
            t.clear().draw();
          },               
         success: function (ajaxData)
         {
            swal({
             title: 'Terima Kasih',
             text: '',
             type: 'success'
            });

              t.clear().draw();
              var result = JSON.parse(ajaxData);

              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['id_jadwal_kegiatan_luar']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";
                                  
                   t.row.add( [
                          "<center>"+[i+1]+"</center>",
                          "<center>"+result[i]['nama_kegiatan']+"</center>",
                          "<center>"+result[i]['tanggal']+"</center>",
                          "<center>"+button1+"</center>",
                      ] ).draw();
                      
              }
              
          },
          error: function(status)
          {
              t.clear().draw();
          }
      }); 
    // }
}

function cetak_pns()
{
  bulan = $('#bulan').val();
  tahun = $('#tahun').val();

  window.open('Cetak/'+bulan+'/'+tahun,'_blank');
}

$('#datatable').on('click','.btn-edit', function(){
  var id_userid = $(this).data("iduserid");
  var bulan = $('#bulan').val();
  var tahun = $('#tahun').val();
  $.ajax({
    url: "<?php echo base_url();?>index.php/PengelolaController/get_detail_rekap_pns",
     type: "POST",
     data : {id_userid:id_userid,bulan:bulan,tahun:tahun},                   
     success: function (ajaxData)
     {
              c.clear().draw();
              var result = JSON.parse(ajaxData);

            if(result!=0){  
              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['userid']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";    

                  if(result[i]['keterangan'] == 0){
                    result[i]['nama_keterangan'] = "";
                  }

                  c.row.add( [
                      "<center>"+[i+1]+"</center>",
                      "<center>"+result[i]['nama_pegawai']+"</center>",
                      "<center>"+result[i]['nip']+"</center>",
                      "<center>"+result[i]['tanggal']+"</center>",
                      "<center>"+result[i]['masuk']+"</center>",
                      "<center>"+result[i]['pulang']+"</center>",
                      "<center>"+result[i]['telat']+"</center>",                              
                      "<center>"+result[i]['pulang_cepat']+"</center>",                              
                      "<center>"+result[i]['nama_keterangan']+"</center>",
                  ] ).draw();
              }
              $('#edit-pns-modal').modal('show');
         } else {
             swal({
               title: 'Data Kosong',
               text: '',
               type: 'success'
               });
         }
     },
     error: function(status)
     {

     }      
  });
});

////////////non pnsd//////////////

$(document).ready(function() {
  $("#cetak_non_pnsd1").hide();
    $("#tampilkan_non_pnsd").click(function(){
      $("#cetak_non_pnsd1").show();
    })
});

$(".select3_single").select2({
  placeholder: "Pilih Tahun",
  allowClear: true
});
$(".select4_single").select2({
  placeholder: "Pilih Bulan",
  allowClear: true
});

var d = $('#datatable1').DataTable({});
var e = $('#datatable3').DataTable({});

function tampilkan_non_pnsd()
{
  postData = $('#form-tampil-non-pnsd').serialize();    
      $.ajax(
      {
         url: "<?php echo base_url();?>index.php/PengelolaController/get_rekap_tkk_bulanan",
         type: "POST",
         data : postData,   
          beforeSend:function(){ 
            swal({
             title: 'Silahkan Tunggu',
             text: '',
             type: 'success'
             });
            d.clear().draw();
          },               
         success: function (ajaxData)
         {
            swal({
             title: 'Terima Kasih',
             text: '',
             type: 'success'
            });

              d.clear().draw();
              var result = JSON.parse(ajaxData);

              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['userid']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";
                                  
                   d.row.add( [
                          "<center>"+[i+1]+"</center>",
                          "<center>"+button1+"</center>",
                          "<center>"+result[i]['nama_pegawai']+"</center>",
                          "<center>"+result[i]['nip']+"</center>",                              
                          "<center>"+result[i]['jumlah_hari']+"</center>",                              
                          "<center>"+result[i]['jumlah_hadir']+"</center>",                              
                          "<center>"+result[i]['sakit']+"</center>",                              
                          "<center>"+result[i]['izin']+"</center>",                              
                          "<center>"+result[i]['cuti']+"</center>",                              
                          "<center>"+result[i]['tl']+"</center>",                              
                          "<center>"+result[i]['tk']+"</center>",                              
                          "<center>"+result[i]['persen']+" "+"%"+"</center>",                              
                          
                      ] ).draw();
                      
              }
              
          },
          error: function(status)
          {
              d.clear().draw();
          }
      }); 
}

$('#datatable1').on('click','.btn-edit', function(){
  var id_userid = $(this).data("iduserid");
  var bulan = $('#bulan1').val();
  var tahun = $('#tahun1').val();
  $.ajax({
    url: "<?php echo base_url();?>index.php/PengelolaController/get_detail_rekap_tkk",
     type: "POST",
     data : {id_userid:id_userid,bulan:bulan,tahun:tahun},                   
     success: function (ajaxData)
     {
              e.clear().draw();
              var result = JSON.parse(ajaxData);

            if(result!=0){  
              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['userid']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";    

                  if(result[i]['keterangan'] == 0){
                    result[i]['nama_keterangan'] = "";
                  }

                  e.row.add( [
                      "<center>"+[i+1]+"</center>",
                      "<center>"+result[i]['nama_pegawai']+"</center>",
                      "<center>"+result[i]['nip']+"</center>",
                      "<center>"+result[i]['tanggal']+"</center>",
                      "<center>"+result[i]['masuk']+"</center>",
                      "<center>"+result[i]['pulang']+"</center>",
                      "<center>"+result[i]['telat']+"</center>",                              
                      "<center>"+result[i]['pulang_cepat']+"</center>",                              
                      "<center>"+result[i]['nama_keterangan']+"</center>",
                  ] ).draw();
              }
              $('#edit-non-pnsd-modal').modal('show');
         } else {
             swal({
               title: 'Data Kosong',
               text: '',
               type: 'success'
               });
         }
     },
     error: function(status)
     {

     }      
  });
});

function cetak_non_pnsd()
{
  bulan = $('#bulan').val();
  tahun = $('#tahun').val();

  window.open('Cetak/'+bulan+'/'+tahun,'_blank');
}

</script>