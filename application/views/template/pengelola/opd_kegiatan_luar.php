<div class="row" id="list">
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

    <div class="x_content">
    <input type="hidden" id="id_daftar_kegiatan_luar" name="id_daftar_kegiatan_luar" value="<?=$id_daftar_kegiatan_luar;?>">
    <input type="hidden" id="tanggal" name="tanggal" value="<?=$tanggal1;?>">
      <div id="list-surat" class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th><center>NO</center></th>
              <th><center>NAMA DEPARTEMEN</center></th>
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
 
var t =   $('#datatable').DataTable();
function get_opd_kegiatan_luar()
{
  var id_daftar_kegiatan_luar = $('#id_daftar_kegiatan_luar').val();
  // alert(id_daftar_kegiatan_luar);
        $.ajax({
          
          url: "<?php echo base_url();?>index.php/PengelolaController/get_opd_kegiatan_luar_by_id",
             type: "POST",
             data : {id_daftar_kegiatan_luar:id_daftar_kegiatan_luar},                   
             success: function (ajaxData)
             {    
                  t.clear().draw();
                  var result = JSON.parse(ajaxData);

                  for(var i=0; i<result.length; i++)
                  {
                      var button1 = "<a href='#' class='btn-edit' data-sid='"+result[i]['id_daftar_opd_kegiatan_luar']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";  

                       t.row.add( [
                              "<center>"+[i+1]+"</center>",
                              "<center>"+result[i]['nama_department']+"</center>",                         
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

get_opd_kegiatan_luar();

$('#datatable').on('click','.btn-edit', function(){
  var id_daftar_opd_kegiatan_luar = $(this).data("sid");
  var tanggal = $('#tanggal').val();
  $.ajax({
    url: "<?php echo base_url();?>index.php/PengelolaController/kehadiran_opd",
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
});

</script>