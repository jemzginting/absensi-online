<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>List Log</h3>
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
          <h2>List Log</h2>
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
                  <option>2019</option>

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
          <hr>
          </hr>
          <div id="list-surat">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>
                    <center>No</center>
                  </th>
                  <th>
                    <center>ID User</center>
                  </th>
                  <th>
                    <center>Tanggal Entry</center>
                  </th>
                  <th>
                    <center>Aktivitas</center>
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
</div>


<script>
  var t = $('#datatable').DataTable();

  function tampilkan() {
    postData = $('#form-tampil').serialize();


    $.ajax({
      url: "<?php echo base_url(); ?>index.php/AdminController/get_log",
      type: "GET",
      data: postData,
      success: function(ajaxData) {


        t.clear().draw();
        var result = JSON.parse(ajaxData);


        for (var i = 0; i < result.length; i++) {
          t.row.add([
            "<center>" + [i + 1] + "</center>",
            "<center>" + result[i]['id_user'] + "</center>",
            "<center>" + result[i]['tgl_entry'] + "</center>",
            "<center>" + result[i]['aktivitas'] + "</center>",
          ]).draw();
        }

      },
      error: function(status) {
        t.clear().draw();
      }
    });
  }
</script>