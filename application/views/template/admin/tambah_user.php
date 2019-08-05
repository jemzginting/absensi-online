<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Tambah Pengguna</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
      <div class="x_panel">
        <div class="x_title">
          <h2>Detail Pengguna</h2>
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
          <form id="form-add_user" method="POST" data-parsley-validate class="form-horizontal form-label-left">
            <!-- action="<?php
                          ?>" -->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_user">Username<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="id_user" name="id_user" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Instansi</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="select_DeptID" name="DeptID" required="required">

                  <? php /*
                  foreach ($departments as $row) {
                    echo "<option value='" . $row['DeptID'] . "'>" . $row['DeptName'] . "</option>";
                  } */
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Role</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select onchange="pilih_role()" class="form-control col-md-7 col-xs-12" id="role" name="role" required="required">
                  <option value="">Pilih Role</option>
                  <?php
                  foreach ($role as $row) {
                    echo "<option value='" . $row['id_role'] . "'>" . $row['nama'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group" id="nip1">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">Nip <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input onchange="ajukan()" type="text" id="nip" name="nip" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success" id="btn_add">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#nip1').hide();
  });

  $('#btn_add').click(function() {
    var insert_data = $('#form-add_user').serialize();
    console.log(insert_data);
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/AdminController/submit_pengguna",
      type: "POST",
      data: insert_data,
      success: function(data) {
        swal({
          title: 'Tambah Pengguna Berhasil',
          text: '',
          type: 'success'
        });
      },
      error: function(status) {
        swal({
          title: 'Gagal Tambah Pengguna',
          text: '',
          type: 'danger'
        });
      }
    })
  });
</script>

<script>
  function pilih_role() {
    var jenis_role = $('#role').val();

    if (jenis_role == 5) {
      $('#nip1').show();
    } else {
      $('#nip1').hide();
    }
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url(); ?>index.php/AdminController/get_all_departments',

      success: function(response) { //ketika kondisi berhasil melakukan request
        var data = JSON.parse(response);
        var dept = data.depart;
        var obj = [];
        dept.forEach(function(value, index) {
          var obj_res = {
            departments: value.departments,
            DeptID: value.DeptID
          };
          obj.push(obj_res);
        });

        $('#select_DeptID').selectize({
          persist: false,
          maxItems: 1,
          readOnly: true,
          valueField: 'DeptID',
          labelField: 'departments',
          disabledField: 'disabled',
          searchField: 'departments',
          options: obj,
          render: {
            item: function(item, escape) {
              return '<div>' +
                (item.departments ? escape(item.departments) : '') +
                '</div>';
            },
            option: function(item, escape) {
              //var label = item.tanggal || item.badgenumber;
              var caption = item.departments ? item.departments : null;
              return '<div>' +
                //'<span class="text-black">Nama : ' + escape(label) + '</span><br>' +
                (caption ? escape(caption) : '') +
                '</div>';
            }
          },
        });
      },
    });
  });
</script>