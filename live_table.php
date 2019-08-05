<html>
<head>
    <title>Codeigniter Live Table Add Edit Delete using Ajax</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    body
    {
      margin:0;
      padding:0;
      background-color:#f1f1f1;
    }
    .box
    {
      width:900px;
      padding:20px;
      background-color:#fff;
      border:1px solid #ccc;
      border-radius:5px;
      margin-top:10px;
    }
  </style>
</head>
<body>
  <div class="container box">
    <h3 align="center">Codeigniter Live Table Add Edit Delete using Ajax</h3><br />
    <div class="table-responsive">
      <br />
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>   
    </div>
  </div>
</body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  
  function load_data()
  {
    $.ajax({
      url:"<?php echo base_url(); ?>livetable/load_data",
      dataType:"JSON",
      success:function(data){
        var html = '<tr>';
        html += '<td id="first_name" contenteditable placeholder="Enter First Name"></td>';
        html += '<td id="last_name" contenteditable placeholder="Enter Last Name"></td>';
        html += '<td id="age" contenteditable></td>';
        html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></button></td></tr>';
        for(var count = 0; count < data.length; count++)
        {
          html += '<tr>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="first_name" contenteditable>'+data[count].first_name+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="last_name" contenteditable>'+data[count].last_name+'</td>';
          html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="age" contenteditable>'+data[count].age+'</td>';
          html += '<td><button type="button" name="delete_btn" id="'+data[count].id+'" class="btn btn-xs btn-danger btn_delete"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
        }
        $('tbody').html(html);
      }
    });
  }

  load_data();

  $(document).on('click', '#btn_add', function(){
    var first_name = $('#first_name').text();
    var last_name = $('#last_name').text();
    var age = $('#age').text();
    if(first_name == '')
    {
      alert('Enter First Name');
      return false;
    }
    if(last_name == '')
    {
      alert('Enter Last Name');
      return false;
    }
    $.ajax({
      url:"<?php echo base_url(); ?>livetable/insert",
      method:"POST",
      data:{first_name:first_name, last_name:last_name, age:age},
      success:function(data){
        load_data();
      }
    })
  });

  $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>livetable/update",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        load_data();
      }
    })
  });

  $(document).on('click', '.btn_delete', function(){
    var id = $(this).attr('id');
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"<?php echo base_url(); ?>livetable/delete",
        method:"POST",
        data:{id:id},
        success:function(data){
          load_data();
        }
      })
    }
  });
  
});

</script>


<!--
---------------- script lain-------------------------- 


<script>


var t = $('#datashift').DataTable();

//ambil_data_shift();

function RefreshTable() {
       
      window.location.reload();

   }

function ambil_data_shift(){

  $.ajax({
    type : 'POST',
    url : '<?php echo site_url('PengelolaController/get_all_shift')?>',
    dataType : 'json', //already make by datatype
    success : function(data){
      //no need to use function JSON.parse(data) if u're already using dataType: 'json'
      //var data = JSON.parse(data);
      for(var i=0; i<data.length; i++)
      {
          var button1 = "<a href='#' class='btn-edit' data-sid='"+data[i]['Id_shift']+"' data-did='"+data[i]['badgenumber']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
          var button2 = "<a href='#' class='btn-hapus' data-sid='"+data[i]['Id_shift']+"' data-did='"+data[i]['badgenumber']+"' title='Hapus' style='color:#BB1A1A;'><span class='fa fa-trash fa-2x'></span></a>";
          var button3 = "<a href='#' class='btn-hapus' id='hapus-member' data-sid='"+data[i]['Id_shift']+"' data-did='"+data[i]['badgenumber']+"' title='Hapus' style='color:#BB1A1A;'><span class='fa fa-trash fa-2x'></span></a>";
          t.row.add([
                "<center>"+[i+1]+"</center>",                                                           
                "<center>"+data[i]['nama_user']+"</center>", 
                "<center>"+data[i]['badgenumber']+"</center>",                            
                "<center>"+data[i]['jam_masuk']+"</center>",
                "<center>"+data[i]['jam_keluar']+"</center>",
                "<center>"+data[i]['start_date']+"</center>",
                "<center>"+data[i]['end_date']+"</center>",                            
                "<center>"+data[i]['status']+"</center>",                            
                // "<center>"+result[i]['active']+"</center>",                            
                "<center>"+button1+" "+button2+button3+"</center>",      
          ]).draw();   
      }
    }
  })

}



 


  $('#datashift').on('click','.btn-edit', function(){
      var id_shift = $(this).data("sid");
      var id_badgenumber = $(this).data("did");
      // alert(id_user);

      $.ajax({
        url: "<?php echo base_url();?>index.php/PengelolaController/get_detail_shift",
         type: "POST",
         data : {id_shift:id_shift,id_badgenumber:id_badgenumber},                   
         success: function (ajaxData)
         {
           var result = JSON.parse(ajaxData);
         /*  
           $('#id_shift-modal').val(id_shift);
           $('#name-modal').val(result[0]['name']);
           $('#start_date-modal').datepicker(result[0]['start_date']);
           $('#end_date-modal').val(result[0]['end_date']);
           $('#jam_masuk-modal').val(result[0]['jam_masuk']);
           $('#jam_keluar-modal').val(result[0]['jam_keluar']);
           $('#status-modal').val(result[0]['status']);
          */
          $('#id_shift-modal').val(id_shift);
          $('[name="name-modal"]').val(result[0]['name']);
          $('[name="start_date-modal"]').val(result[0]['start_date']);
          $('[name="end_date-modal"]').val(result[0]['end_date']);
          $('[name="jam_masuk-modal"]').val(result[0]['jam_masuk']);
          $('[name="jam_keluar-modal"]').val(result[0]['jam_keluar']);
          $('[name="status-modal"]').val(result[0]['status']);

           $('#edit-modal').modal('show');
         },
         error: function(status)
         {

         }
       });
    });

  $('#btn-simpan').click(function(){
    var update_data = $('#form-edit').serialize();
    $.ajax({
        url: "<?php echo base_url();?>index.php/PengelolaController/update_detail_shift",
         type: "POST",
         data : update_data,  
        // dataType : 'json', //already make by datatype                 
         success: function (ajaxData)
         {
            
           
           $('#edit-modal').modal('hide');
          // ambil_data_shift();
         // reload_table();
         RefreshTable();
           swal({
            title: 'Edit Jam Shift Berhasil',
            text: '',
            type: 'success'
            });
            
         },
         error: function(status)
         {
          swal({
            title: 'Edit Jam Shift Gagal',
            text: '',
            type: 'danger'
            });
         }
       });
  });

//------------------------------script lain------------------

  $('#datashift').on("click",".hapus-member",function(){
	  var id_shift = $(this).data("sid");
	swal({
		title:"Hapus Shift",
		text:"Yakin akan menghapus member ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('PengelolaController/hapus_shift'); ?>",
			data:{id_shift:id_shift},
			success: function(){
				$("tr[data-id='"+id_shift+"']").fadeOut("fast",function(){
					$(this).remove();
				});
			}
		 });
	});
});


//------------------------------script lain------------------


  $('#datashift').on('click','.btn-hapus', function(){
      var id_shift = $(this).data("sid");     
      var badgenumber = $(this).data("did");
      $('#id-shift-hapus').val(id_shift);
      $('#badgenumber-hapus').val(badgenumber);
      $('#hapus-modal').modal('show');
    });

  $('#btn-hapus').click(function(){
    var data_hapus = $('#form-hapus').serialize();
    $.ajax({
      url : "<?php echo site_url('PengelolaController/hapus_shift'); ?>",
      type: "POST",
      data: data_hapus,
      success: function(ajaxData)
      {
        
        $('#hapus-modal').modal('hide');
        //ambil_data_shift();
        //reload_table();
        RefreshTable();
        swal({
            title: 'Hapus Jam Shift Berhasil',
            text: '',
            type: 'success'
            });
            
      },
      error: function(status)
      {
        swal({
            title: 'Hapus Jam Shift Gagal',
            text: '',
            type: 'danger'
            });
      }
    })
  })
      
    </script>
    <script type="text/javascript">
  function setUlang() {
    document.getElementById("timepicker1").value = "";
    document.getElementById("timepicker2").value = "";
    document.getElementById("nip").value = "";
    document.getElementById("sel1").value = "";
	}
</script>


<script type="text/javascript">
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
</script>

<script>


$(document).ready(function() {
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#btnAdd").click(function(e) {
    $(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items").append(
      '<div class="next-referral col-4"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_shift">Jam Shift</label><div class="col-md-6 col-sm-6 col-xs-12"><input type="text" class="form-control timepicker" id="Timepicker" name="Timepicker" required="required"></div></div>'
    );
  });
  $("body").on("click", ".delete", function(e) {
    $(".next-referral").last().remove();
  });
});

//-----------------daterangepicker-----------------//
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

$('#mulaiedit').daterangepicker({
  singleDatePicker: true,
  format: "YYYY-MM-DD",
  calender_style: "picker_3"
  }, function(start, end, label) {
  console.log(start.toISOString(), end.toISOString(), label);
});

$('#sampai').daterangepicker({
  singleDatePicker: true,
  format: "YYYY-MM-DD",
  calender_style: "picker_3"
  }, function(start, end, label) {
  console.log(start.toISOString(), end.toISOString(), label);
});

$('#sampai1').daterangepicker({
  singleDatePicker: true,
  format: "YYYY-MM-DD",
  calender_style: "picker_3"
  }, function(start, end, label) {
  console.log(start.toISOString(), end.toISOString(), label);
});

$('#sampaiedit').daterangepicker({
  singleDatePicker: true,
  format: "YYYY-MM-DD",
  calender_style: "picker_3"
  }, function(start, end, label) {
  console.log(start.toISOString(), end.toISOString(), label);
});

$('#sampaiedit1').daterangepicker({
  singleDatePicker: true,
  format: "YYYY-MM-DD",
  calender_style: "picker_3"
  }, function(start, end, label) {
  console.log(start.toISOString(), end.toISOString(), label);
});
//---------------------end Datepicker------------------//


</script> -->



<!------------------- script lain-------------------------- 


<script>


var t = $('#datashift').DataTable();

//ambil_data_shift();

function RefreshTable() {
       
      window.location.reload();

   }

function ambil_data_shift(){

  $.ajax({
    type : 'POST',
    url : '<?php echo site_url('PengelolaController/get_all_shift')?>',
    dataType : 'json', //already make by datatype
    success : function(data){
      //no need to use function JSON.parse(data) if u're already using dataType: 'json'
      //var data = JSON.parse(data);
      for(var i=0; i<data.length; i++)
      {
          var button1 = "<a href='#' class='btn-edit' data-sid='"+data[i]['Id_shift']+"' data-did='"+data[i]['badgenumber']+"' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
          var button2 = "<a href='#' class='btn-hapus' data-sid='"+data[i]['Id_shift']+"' data-did='"+data[i]['badgenumber']+"' title='Hapus' style='color:#BB1A1A;'><span class='fa fa-trash fa-2x'></span></a>";
          var button3 = "<a href='#' class='btn-hapus' id='hapus-member' data-sid='"+data[i]['Id_shift']+"' data-did='"+data[i]['badgenumber']+"' title='Hapus' style='color:#BB1A1A;'><span class='fa fa-trash fa-2x'></span></a>";
          t.row.add([
                "<center>"+[i+1]+"</center>",                                                           
                "<center>"+data[i]['nama_user']+"</center>", 
                "<center>"+data[i]['badgenumber']+"</center>",                            
                "<center>"+data[i]['jam_masuk']+"</center>",
                "<center>"+data[i]['jam_keluar']+"</center>",
                "<center>"+data[i]['start_date']+"</center>",
                "<center>"+data[i]['end_date']+"</center>",                            
                "<center>"+data[i]['status']+"</center>",                            
                // "<center>"+result[i]['active']+"</center>",                            
                "<center>"+button1+" "+button2+button3+"</center>",      
          ]).draw();   
      }
    }
  })

}

  $('#datashift').on('click','.btn-edit', function(){
      var id_shift = $(this).data("sid");
      var id_badgenumber = $(this).data("did");
      // alert(id_user);

      $.ajax({
        url: "<?php echo base_url();?>index.php/PengelolaController/get_detail_shift",
         type: "POST",
         data : {id_shift:id_shift,id_badgenumber:id_badgenumber},                   
         success: function (ajaxData)
         {
           var result = JSON.parse(ajaxData);
         /*  
           $('#id_shift-modal').val(id_shift);
           $('#name-modal').val(result[0]['name']);
           $('#start_date-modal').datepicker(result[0]['start_date']);
           $('#end_date-modal').val(result[0]['end_date']);
           $('#jam_masuk-modal').val(result[0]['jam_masuk']);
           $('#jam_keluar-modal').val(result[0]['jam_keluar']);
           $('#status-modal').val(result[0]['status']);
          */
          $('#id_shift-modal').val(id_shift);
          $('[name="name-modal"]').val(result[0]['name']);
          $('[name="start_date-modal"]').val(result[0]['start_date']);
          $('[name="end_date-modal"]').val(result[0]['end_date']);
          $('[name="jam_masuk-modal"]').val(result[0]['jam_masuk']);
          $('[name="jam_keluar-modal"]').val(result[0]['jam_keluar']);
          $('[name="status-modal"]').val(result[0]['status']);

           $('#edit-modal').modal('show');
         },
         error: function(status)
         {

         }
       });
    });

  $('#btn-simpan').click(function(){
    var update_data = $('#form-edit').serialize();
    $.ajax({
        url: "<?php echo base_url();?>index.php/PengelolaController/update_detail_shift",
         type: "POST",
         data : update_data,  
        // dataType : 'json', //already make by datatype                 
         success: function (ajaxData)
         {
            
           
           $('#edit-modal').modal('hide');
          // ambil_data_shift();
         // reload_table();
         RefreshTable();
           swal({
            title: 'Edit Jam Shift Berhasil',
            text: '',
            type: 'success'
            });
            
         },
         error: function(status)
         {
          swal({
            title: 'Edit Jam Shift Gagal',
            text: '',
            type: 'danger'
            });
         }
       });
  });

//------------------------------script lain------------------

  $('#datashift').on("click",".hapus-member",function(){
	  var id_shift = $(this).data("sid");
	swal({
		title:"Hapus Shift",
		text:"Yakin akan menghapus member ini?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
		 $.ajax({
			url:"<?php echo site_url('PengelolaController/hapus_shift'); ?>",
			data:{id_shift:id_shift},
			success: function(){
				$("tr[data-id='"+id_shift+"']").fadeOut("fast",function(){
					$(this).remove();
				});
			}
		});
	});
});


//------------------------------script lain------------------


  $('#datashift').on('click','.btn-hapus', function(){
      var id_shift = $(this).data("sid");     
      var badgenumber = $(this).data("did");
      $('#id-shift-hapus').val(id_shift);
      $('#badgenumber-hapus').val(badgenumber);
      $('#hapus-modal').modal('show');
    });

  $('#btn-hapus').click(function(){
    var data_hapus = $('#form-hapus').serialize();
    $.ajax({
      url : "<?php echo site_url('PengelolaController/hapus_shift'); ?>",
      type: "POST",
      data: data_hapus,
      success: function(ajaxData)
      {
        
        $('#hapus-modal').modal('hide');
        //ambil_data_shift();
        //reload_table();
        RefreshTable();
        swal({
            title: 'Hapus Jam Shift Berhasil',
            text: '',
            type: 'success'
            });
            
      },
      error: function(status)
      {
        swal({
            title: 'Hapus Jam Shift Gagal',
            text: '',
            type: 'danger'
            });
      }
    })
  })
      
    </script>
    <script type="text/javascript">
  function setUlang() {
    document.getElementById("timepicker1").value = "";
    document.getElementById("timepicker2").value = "";
    document.getElementById("nip").value = "";
    document.getElementById("sel1").value = "";
	}
</script>

-->

