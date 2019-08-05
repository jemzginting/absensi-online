<div class="row" id="list">
  <div class="x_panel">
    <div class="x_title">
      <h2>Surat Tugas</h2>
      <div class="clearfix"></div>

    </div>
    
    <div class="x_content">
      <div class="col-md-3" align="center">
        <?php if($thumb!="assets/file/foto/photo.jpg"){ ?><div class="btn btn-danger btn-xs" onClick="zoom_dox('ijin','0');return false;"><i class="fa fa-search fa-sw"></i> Zoom</div><?php } ?>
        <div id="uploader" class="btn btn-primary btn-xs" onClick="uppl('uploader','stuploader','nn');"><i class="fa fa-upload fa-sw"></i> Upload dokumen</div>
      </div>
    </div>

    <div class="x_content">
        <div class="col-md-3">  
          <!-- <div align="center">
            <?php if($thumb!="assets/file/foto/photo.jpg"){ ?><a href="#" class="label label-default" onclick="zoom_dox('ijin','0');return false;"><i class="fa fa-search fa-fw"></i> Zoom</a><?php } ?>
            <div id="uploader" class="btn btn-primary btn-xs" onClick="uppl('uploader','stuploader','nn');"><i class="fa fa-upload fa-sw"></i> Upload dokumen</div>
          </div> -->   

          <div class="thumbnail">
            
            <!-- <div class="caption" align="center">
              <div id="uploader" class="btn btn-primary btn-xs" onClick="uppl('uploader','stuploader','nn');"><i class="fa fa-upload fa-sw"></i> Upload dokumen</div>
            </div> -->
            <img src="<?=base_url();?><?=$thumb;?>" id="pasfotoIni">

          </div>

      </div>
    </div>

  </div>

  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Kehadiran</h2>

      <ul class="nav navbar-right panel_toolbox">
      <div class="row">  
        <form id="demo-form" method="POST" action="<?php echo site_url('PengelolaController/daftar_jadwal_kegiatan_luar'); ?>" data-parsley-validate class="form-horizontal form-label-left">
          <button type="submit" onclick="tambah_kehadiran();" class="btn-xs btn-primary">Tambah Kehadiran</button> 
          <button type="submit" class="btn-xs btn-danger">Kembali</button>
        </form>
      </div>
      </ul>
      <div class="clearfix"></div>
    </div>
      

    

    <div class="x_content">
      <input type="hidden" id="id_daftar_opd_kegiatan_luar" name="id_daftar_opd_kegiatan_luar" value="<?=$id_daftar_opd_kegiatan_luar;?>">
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

<script language="JavaScript" type="text/javascript" src="<?=base_url();?>assets/js/ajaxupload.3.5.js"></script>

<!-- <script type="text/javascript">  

  $(document).ready(function() {
    $(this).find('.caption').slideUp(250);
  });

  $('.thumbnail').hover(
    function(){
        $(this).find('.caption').slideDown(250); //.fadeIn(250)
    },
    function(){
        $(this).find('.caption').slideUp(250); //.fadeOut(205)
    }
); 
</script> -->

<script>
$(document).ready(function() {
    uppl("uploader","stuploader","xx");
});

var t =   $('#datatable').DataTable();

function get_kehadiran_opd()
{
  var id_daftar_opd_kegiatan_luar = $('#id_daftar_opd_kegiatan_luar').val();
        $.ajax({
          
          url: "<?php echo base_url();?>index.php/PengelolaController/get_kehadiran_opd",
             type: "POST",
             data : {id_daftar_opd_kegiatan_luar:id_daftar_opd_kegiatan_luar},                   
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

function uppl(bttn,stts,dokumen){ 
    var komp = $('#komponen_temp').html();
    var idd = $('#idd_temp').html();

    var id_daftar_opd_kegiatan_luar = $('#id_daftar_opd_kegiatan_luar').val();
    var btnUpload=$('#'+bttn+'') , interval;
    var status=$('#'+stts+'');
    new AjaxUpload(btnUpload, {
      action: '<?=base_url();?>index.php/PengelolaController/saveupload',
      name: 'artikel_file',
      data: {"id_daftar_opd_kegiatan_luar": id_daftar_opd_kegiatan_luar},
      onSubmit: function(file, ext){
        status.html('');
         if (! (ext && /^(jpg|png|jpeg|gif|pdf|doc|docx|xls|xlsx)$/.test(ext))){  status.text('Hanya File dengan ext JPG, PNG, GIF PDF yang dapat diupload !'); return false; }
        btnUpload.text('Uploading');
        interval = window.setInterval(function(){ var text = btnUpload.text();  if (text.length < 19){  btnUpload.text(text + '.'); } else {  btnUpload.text('Uploading');  } }, 200);
      },
      onComplete: function(file, response){
        btnUpload.html('<i class="fa fa-upload fa-sw"></i> Upload dokumen');
        status.html('');
        window.clearInterval(interval);
        status.text('');        
         var arr_result = response.split("-");
        if(arr_result[0]==="success"){
          status.removeClass('notification-error');
          file = file.replace(/%20/g, "");

        } else{
          status.html(file  + ", gagal di upload ! <br />" + arr_result[1] );         
        }
        refresh();          

      }
    });
}

function refresh(){
  var id_daftar_opd_kegiatan_luar = $('#id_daftar_opd_kegiatan_luar').val(); 
  var tanggal = $('#tanggal').val();
  alert(tanggal);
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
}
</script>