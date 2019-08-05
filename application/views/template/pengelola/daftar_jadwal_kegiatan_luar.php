<div class="row" id="list">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Jadwal Kegiatan Luar</h2>
      <ul class="nav navbar-right panel_toolbox">
        <div class="row">  
          <button type="submit" onclick="tambah_kegiatan();" class="btn-xs btn-primary">Tambah Kegiatan</button>
      </div>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div id="list-surat" class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th><center>NO</center></th>
              <th><center>NAMA KEGIATAN</center></th>
              <th><center>DINAS</center></th>
              <th><center>TANGGAL</center></th>
              <th><center>ACTION</center></th>
            </tr>
          </thead>


          <tbody>

          </tbody>
        </table>
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

<script>
////////////////////////////// start pns////////////////////////////////

$(".select1_single").select2({
  placeholder: "Pilih Tahun",
  allowClear: true
});
$(".select2_single").select2({
  placeholder: "Pilih Bulan",
  allowClear: true
});

var t = $('#datatable').DataTable({
});


function tampilkan()
{
  postData = $('#form-tampil').serialize(); 

  // departments = $('#departments').val();  
  // var win = window.open('get_rekap_pns_bulanan','_blank');
  // win.focus();
    // if(departments != ""){      
      $.ajax(
      {
         url: "<?php echo base_url();?>index.php/PengelolaController/get_daftar_kegiatan_luar",
         type: "POST",
         data : postData,   
                         
         success: function (ajaxData)
         {
            

            t.clear().draw();
            var result = JSON.parse(ajaxData);
            
              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['id_daftar_kegiatan_luar']+"' data-tgl='"+result[i]['tanggal']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";
                                  
                   t.row.add( [
                          "<center>"+[i+1]+"</center>",
                          "<center>"+result[i]['nama_kegiatan']+"</center>",
                          "<center>"+result[i]['department']+"</center>",
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
tampilkan();

$('#datatable').on('click','.btn-edit', function(){
  var id_daftar_kegiatan_luar = $(this).data("iduserid");
  var tanggal = $(this).data("tgl");

  $.ajax({
    url: "<?php echo base_url();?>index.php/PengelolaController/get_opd_kegiatan_luar",
     type: "POST",
     data : {id_daftar_kegiatan_luar:id_daftar_kegiatan_luar,tanggal:tanggal},                   
        beforeSend:function(){  
          $('#list').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');
        },
        success:function(data){
          $('#list').replaceWith(data);
        }, // end success
      dataType:"html"  
  });
});

function tambah_kegiatan()
{
   $.ajax({
      url: "<?php echo base_url();?>index.php/PengelolaController/tambah_jadwal_kegiatan_luar",
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