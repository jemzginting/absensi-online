<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kotak Surat Perjalanan Dinas</h3>
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
                    <h2>List Surat</h2>
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
                          <div class="col-md-2 col-sm-2 col-xs-3">
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
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Nama</center></th>
                            <th><center>Tanggal Berangkat</center></th>
                            <th><center>Tanggal Kembali</center></th>
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
<!--------------------------------------- Modal Edit ------------------------------------ -->
<div class="modal inmodal" id="edit-modal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-edit fa-4x "></i></center>
                                    <center><h4 class="modal-title">Edit Surat</h4></center><h4>
                                    <center><small >Edit Detail Surat Masuk</small></center>
                                    
                                    
                                </div>
                                <form id="form-edit" onsubmit="return false;">
                                <input type="hidden" id="id-surat-modal" name="id_surat">
                                <div class="modal-body">                                             
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Nama</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="pengirim-modal" name="pengirim" readonly class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-12">NIP</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="nip-modal" name="nip" readonly class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-12">Nama Golongan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="golongan-modal" name="golongan-modal" readonly class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Maksud Perjalanan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea style="resize: vertical;" class="form-control" name="perihal" rows='3' id="perihal-modal" >                                                
                                            </textarea>
                                        </div>
                                    </div> 
									<div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12">Alat Angkutan</label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="derajat-modal" name="derajat">
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
                                    <label class="control-label col-md-12">Tempat Berangkat</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea style="resize: vertical;" class="form-control" name="berangkat" id="berangkat-modal" >                                                
                                            </textarea>
                                        </div>
                                    </div> 
									<div class="form-group">
									<label class="control-label col-md-12">Tempat Tujuan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea style="resize: vertical;" class="form-control" name="tujuan" id="tujuan-modal" >                                                
                                            </textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12">Lama Perjalanan</label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="waktu-modal" name="waktu">
                                              <option value="">Pilih waktu perjalanan</option>
											  <option value="1">1 hari</option>
											  <option value="2">2 hari</option>
											  <option value="3">3 hari</option>
											  <option value="4">4 hari</option>
                                        </select>
                                      </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-12">Total Biaya Harian</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="harian-modal" name="harian-modal" readonly class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Tanggal Berangkat</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="tgl-berangkat-modal" name="tgl_berangkat" required class="date-picker form-control col-md-7 col-xs-12 has-feedback-left" required="required" type="text">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-12">Tanggal Harus Kembali</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="tgl-kembali-modal" name="tgl_kembali" required class="date-picker form-control col-md-7 col-xs-12 has-feedback-left" required="required" type="text">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-12">Nama yang diikut sertakan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="nama-pengikut-modal" name="nama_pengikut" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12">Jam</label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                         
                                              <input type="text" class="form-control col-md-7 col-xs-12 has-feedback-left clockpicker" required value="08:00" name="jam_masuk" id="jam-masuk-modal" data-autoclose="true">
                                              <span class="fa fa-clock-o form-control-feedback left">
                                                  
                                              </span>
                                          
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12">Pembebanan Anggaran</label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="klasifikasi-modal" name="klasifikasi">
                                          <option value="">Pilih Anggaran</option>
                                          <option value="1">Instansi</option>
										                      <option value="2">Rekening Anggaran</option>
                                          <option value="3">Biaya Sendiri</option>
                                        </select>
                                      </div>
                                    </div>
									<div class="form-group">
                                        <label class="control-label col-md-12">Keterangan Lain-lain</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="ket-lain-modal" name="ket_lain" class="form-control col-md-7 col-xs-12">
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

<!----------------------------------------------- Modal Hapus ------------------------------ -->                    

                    <div class="modal inmodal" id="hapus-modal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-trash fa-4x "></i></center>
                                    <center><h4 class="modal-title">Hapus Surat</h4></center><h4>
                                    <center><small >Hapus Surat Masuk</small></center>
                                    
                                    
                                </div>
                                <form id="form-hapus" onsubmit="return false;">
                                <input type="hidden" id="id-surat-hapus" name="id_surat">
                                <div class="modal-body">                                             
                                    Apakah anda yakin menghapus surat ini ?
                                </div>
                                <div class="clearfix"></div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="submit" id="btn-hapus" class="btn btn-danger" >Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

<!--------------------------------------- Modal Print ------------------------------------ -->
<div class="modal inmodal" id="print-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-print fa-4x "></i></center>
                <center><h4 class="modal-title">Print Surat</h4></center><h4>
                <center><small >Print Permohonan Surat Perjalanan Dinas</small></center>
                
                
            </div>
            <form id="form-edit" onsubmit="return false;">
            <input type="hidden" id="id-surat-print" name="id_surat">
            <input type="hidden" id="waktu-print" name="id_wktu">
            <div class="modal-body">                                             
                <div class="form-group">
                    <label class="control-label col-md-12">Pengirim</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input id="pengirim-print" readonly class="form-control col-md-7 col-xs-12">
                    </div>
                </div>     
                <div class="form-group">
                    <label class="control-label col-md-12">Perihal</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea style="resize: vertical;" class="form-control" name="perihal" rows='3' id="perihal-print" readonly >                                                
                        </textarea>
                    </div>
                </div>                                                                             
                <div class="form-group">
                    <label class="control-label col-md-12">Tanggal Masuk</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input id="tgl-masuk-print" name="tgl_masuk" readonly required class="date-picker form-control col-md-7 col-xs-12 has-feedback-left" required="required" type="text">
                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">Klasifikasi</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input id="klasifikasi-print" readonly class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="form-horizontal form-label-left">
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label class="control-label col-md-8 col-sm-8 col-xs-8" for="btn-print-bukti">Print SPD</label>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                         
                              <button id='btn-print-bukti' class="form-control col-md-12 btn btn-success"><i class="fa fa-file-pdf-o"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-white" data-dismiss="modal">Close</button>
                
            </div>
            </form>
        </div>
    </div>
</div>

<script>

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

      
        var t = $('#datatable').DataTable();

        function tampilkan()
        {
          postData = $('#form-tampil').serialize();   
        
                
          $.ajax(
          {
             url: "<?php echo base_url();?>index.php/KepalaController/get_surat_masuk",
             type: "POST",
             data : postData,                   
             success: function (ajaxData)
             {
                  
                  
                  t.clear().draw();
                  var result = JSON.parse(ajaxData);


                  for(var i=0; i<result.length; i++)
                  {
                      var button1 = "<a href='#' class='btn-edit' data-idsurat='"+result[i]['id_surat']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
                      var button2 = "<a href='#' class='btn-delete' data-idsurat='"+result[i]['id_surat']+"' title='Hapus' style='color:#bb1a1a;'><span class='fa fa-trash fa-2x'></span></a>";
                      var button3 = "<a href='#' class='btn-print' data-idsurat='"+result[i]['id_surat']+"' title='Cetak' style='color:#1ABB9C;'><span class='fa fa-print fa-2x'></span></a>";
                      if(result[i]['status_disposisi']==1)
                      {
                        button2 = "";
						button1 = "";
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
                              "<center>"+result[i]['tgl_masuk']+"</center>",
                              "<center>"+result[i]['tgl_kembali']+"</center>",
                              "<center>"+result[i]['keterangan']+"</center>",                              
                              "<center>"+result[i]['keterangan2']+"</center>",                              
                              "<center>"+button1+"  "+button2+" "+button3+"</center>",
                              
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
      var id_surat = $(this).data("idsurat");
	
      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/get_detail_surat",
         type: "POST",
         data : {id_surat:id_surat},                   
         success: function (ajaxData)
         {
           var result = JSON.parse(ajaxData);
           $('#pengirim-modal').val(result[0]['pengirim']);
		   $('#nip-modal').val(result[0]['nip']);
		   $('#golongan-modal').val(result[0]['nama_golongan']);
		   $('#harian-modal').val(result[0]['jml_harian']);
           $('#perihal-modal').html(result[0]['perihal']);
           $('#berangkat-modal').html(result[0]['berangkat']);
           $('#tujuan-modal').html(result[0]['tujuan']);
           $('#tgl-berangkat-modal').val(result[0]['tgl_masuk']);
           $('#tgl-kembali-modal').val(result[0]['tgl_kembali']);
           $('#jam-masuk-modal').val(result[0]['jam_masuk']);
           $('#derajat-modal').val(result[0]['id_derajat']);
           $('#klasifikasi-modal').val(result[0]['id_klasifikasi']);
           $('#waktu-modal').val(result[0]['id_waktu']);
           $('#id-surat-modal').val(id_surat);
           $('#edit-modal').modal('show');
         },
         error: function(status)
         {

         }       });
    });

    $('#btn-simpan').click(function(){
      var data_surat_edit = $('#form-edit').serialize();

      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/update_detail_surat",
         type: "POST",
         data : data_surat_edit,                   
         success: function (ajaxData)
         {
            tampilkan();
           $('#edit-modal').modal('hide');
           swal({
            title: 'Edit Surat Berhasil',
            text: '',
            type: 'success'
            });

         },
         error: function(status)
         {
          swal({
            title: 'Edit Surat Gagal',
            text: '',
            type: 'danger'
            });
         }
      });
    });

    $('#datatable').on('click','.btn-delete', function(){
      var id_surat = $(this).data("idsurat");

           
           $('#id-surat-hapus').val(id_surat);
           
           $('#hapus-modal').modal('show');
        
    });

    $('#btn-hapus').click(function(){
      var data_surat_hapus = $('#form-hapus').serialize();

      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/delete_surat",
         type: "POST",
         data : data_surat_hapus,                   
         success: function (ajaxData)
         {
           
           $('#hapus-modal').modal('hide');
           tampilkan();
           swal({
            title: 'Hapus Surat Berhasil',
            text: '',
            type: 'success'
            });

         },
         error: function(status)
         {
          swal({
            title: 'Hapus Surat Gagal',
            text: '',
            type: 'danger'
            });
         }
      });
    });

    $('#datatable').on('click','.btn-print', function(){
      var id_surat = $(this).data("idsurat");

      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/get_detail_surat",
         type: "POST",
         data : {id_surat:id_surat},                   
         success: function (ajaxData)
         {
           var result = JSON.parse(ajaxData);
           $('#pengirim-print').val(result[0]['pengirim']);
           $('#perihal-print').html(result[0]['jml_harian']);
           $('#waktu-print').html(result[0]['id_waktu']);
           $('#tgl-masuk-print').val(result[0]['tgl_masuk']);
           $('#derajat-print').val(result[0]['nama_derajat']);
           $('#klasifikasi-print').val(result[0]['nama_klasifikasi'])
           $('#id-surat-print').val(id_surat);
           $('#print-modal').modal('show');
         },
         error: function(status)
         {

         }
       });
    });

    $('#btn-print-bukti').click(function(){
      var id_surat = $('#id-surat-print').val();
      $.ajax({
        url: "<?php echo base_url();?>index.php/KepalaController/get_tanda_terima",
         type: "POST",
         data : {id_surat:id_surat},                   
         success: function (ajaxData)
         {
           $('#print-modal').modal('hide');
           download = "<?php echo base_url();?>"+ajaxData;
           //alert(ajaxData);
           window.location=download;
           //window.print();
         },
         error: function(status)
         {

         }
      })
    })
    </script>