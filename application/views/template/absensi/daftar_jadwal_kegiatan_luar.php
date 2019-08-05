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
         url: "<?php echo base_url();?>index.php/AbsensiController/get_daftar_kegiatan_luar",
         type: "POST",
         data : postData,   
                         
         success: function (ajaxData)
         {
            

            t.clear().draw();
            var result = JSON.parse(ajaxData);
            
              for(var i=0; i<result.length; i++)
              {
                  var button1 = "<a href='#' class='btn-edit' data-iduserid='"+result[i]['id_daftar_kegiatan_luar']+"' data-tgl='"+result[i]['tanggal']+"' data-dept='"+result[i]['department']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";
                                  
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
  var dept = $(this).data("dept");

  $.ajax({
    url: "<?php echo base_url();?>index.php/AbsensiController/get_opd_kegiatan_luar",
     type: "POST",
     data : {id_daftar_kegiatan_luar:id_daftar_kegiatan_luar,tanggal:tanggal,dept:dept},                   
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
      url: "<?php echo base_url();?>index.php/AbsensiController/tambah_jadwal_kegiatan_luar",
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