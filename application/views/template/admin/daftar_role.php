<div class="">
  <div class="page-title">
    <div class="title_left">
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
          <h2>List Role</h2>
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
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>
                  <center>No</center>
                </th>
                <th>
                  <center>Nama Role</center>
                </th>
                <th>
                  <center>Action</center>
                </th>
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

<!--------------------------------------- Modal Edit ------------------------------------ -->
<div class="modal inmodal" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <center><i class="fa fa-edit fa-4x "></i></center>
        <center>
          <h4 class="modal-title">Edit Role</h4>
        </center>
        <h4>
          <center><small>Edit Detail Role</small></center>


      </div>
      <form id="form-edit" class="form-horizontal form-label-left" onsubmit="return false;">
        <div class="modal-body">
          <input type="hidden" id="role-modal" name="id_role">
          <div class="form-group">
            <label class="control-label col-md-3">Nama Role</label>
            <div class="col-md-7 col-sm-7 col-xs-7">
              <input id="nama-modal" name="nama" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-simpan" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!----------------------------------------------- Modal Hapus ------------------------------ -->

<div class="modal inmodal" id="hapus-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <center><i class="fa fa-trash fa-4x "></i></center>
        <center>
          <h4 class="modal-title">Hapus Role</h4>
        </center>
        <h4>
          <center><small>Hapus Role</small></center>


      </div>
      <form id="form-hapus" onsubmit="return false;">
        <input type="hidden" id="id-role-hapus" name="id_role">
        <div class="modal-body">
          <h3>Apakah anda yakin menghapus role ini ?</h3>
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-hapus" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  var t = $('#datatable').DataTable();

  function get_all_role() {
    $.ajax({
      url: "<?php echo site_url('AdminController/get_all_role') ?>",
      type: "POST",
      data: null,
      success: function(ajaxData) {
        t.clear().draw();
        var result = JSON.parse(ajaxData);

        for (var i = 0; i < result.length; i++) {
          var button1 = "<a href='#' class='btn-edit' data-sid='" + result[i]['id_role'] + "'  title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
          var button2 = "<a href='#' class='btn-hapus' data-sid='" + result[i]['id_role'] + "' title='Hapus' style='color:#BB1A1A;'><span class='fa fa-trash fa-2x'></span></a>";


          t.row.add([
            "<center>" + [i + 1] + "</center>",
            "<center>" + result[i]['nama'] + "</center>",
            "<center>" + button1 + " " + button2 + "</center>",

          ]).draw();

        }

      },
      error: function(status) {
        t.clear().draw();
      }
    });
  }
  get_all_role();
  $('#datatable').on('click', '.btn-edit', function() {
    var id_role = $(this).data("sid");
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/AdminController/get_detail_role",
      type: "POST",
      data: {
        id_role: id_role
      },
      success: function(ajaxData) {
        var result = JSON.parse(ajaxData);
        $('#role-modal').val(id_role);
        $('#nama-modal').val(result[0]['nama']);
        $('#edit-modal').modal('show');
      },
      error: function(status) {

      }
    });
  });

  $('#btn-simpan').click(function() {
    var update_data = $('#form-edit').serialize();
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/AdminController/update_detail_role",
      type: "POST",
      data: update_data,
      success: function(ajaxData) {
        get_all_role();

        $('#edit-modal').modal('hide');
        swal({
          title: 'Edit Role Berhasil',
          text: '',
          type: 'success'
        });
      },
      error: function(status) {
        swal({
          title: 'Edit Staff Gagal',
          text: '',
          type: 'danger'
        });
      }
    });
  });

  $('#datatable').on('click', '.btn-hapus', function() {
    var id_role = $(this).data("sid");
    $('#id-role-hapus').val(id_role);
    $('#hapus-modal').modal('show');
  });

  $('#btn-hapus').click(function() {
    var data_hapus = $('#form-hapus').serialize();
    $.ajax({
      url: "<?php echo site_url('AdminController/hapus_role'); ?>",
      type: "POST",
      data: data_hapus,
      success: function(ajaxData) {
        $('#hapus-modal').modal('hide');
        swal({
          title: 'Hapus Staff Berhasil',
          text: '',
          type: 'success'
        });
        get_all_role();
      },
      error: function(status) {
        swal({
          title: 'Hapus Staff Gagal',
          text: '',
          type: 'danger'
        });
      }
    })
  })
</script>