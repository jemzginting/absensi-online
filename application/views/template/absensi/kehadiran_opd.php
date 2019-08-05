<div class="row" id="list">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Kehadiran</h2>
      <ul class="nav navbar-right panel_toolbox">
      
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>">
      <input type="hidden" id="DeptID" name="DeptID" value="<?=$DeptID;?>">
      <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal;?>">
      <div id="list-surat" class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th><center>NO</center></th>
              <th><center>NAMA PEGAWAI</center></th>
              <th><center>KETERANGAN</center></th>
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
 
var t =   $('#datatable').DataTable();
function get_kehadiran_opd()
{
  var id_daftar_opd_kegiatan_luar = $('#id_daftar_opd_kegiatan_luar').val();
  var DeptID = $('#DeptID').val();
        $.ajax({
          
          url: "<?php echo base_url();?>index.php/AbsensiController/get_kehadiran_opd",
             type: "POST",
             data : {id_daftar_opd_kegiatan_luar:id_daftar_opd_kegiatan_luar,DeptID:DeptID},                   
             success: function (ajaxData)
             {    
                  t.clear().draw();
                  var result = JSON.parse(ajaxData);


                  for(var i=0; i<result.length; i++)
                  {
                      if(result[i]['keterangan']==0){
                          result[i]['keterangan']="";
                      }
                       t.row.add( [
                              "<center>"+[i+1]+"</center>",
                              "<center>"+result[i]['nama_pegawai']+"</center>",                         
                              "<center>"+result[i]['keterangan']+"</center>", 
                              
                          ] ).draw();
                          
                  }
                  
              },
              error: function(status)
              {
                  t.clear().draw();
              }
        });
}

get_kehadiran_opd();


function tambah_kehadiran()
{
  id_daftar_opd_kegiatan_luar = $('#id_daftar_opd_kegiatan_luar').val(); 
  tanggal = $('#tanggal').val();
    $.ajax({
      url: "<?php echo base_url();?>index.php/PengelolaController/tambah_kehadiran",
       type: "POST",
       data : {id_daftar_opd_kegiatan_luar:id_daftar_opd_kegiatan_luar,tanggal:tanggal},                   
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