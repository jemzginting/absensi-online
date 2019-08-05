<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Pegawai</h2>
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

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pegawai PNS</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pegawai NON PNSD</a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start Pegawai PNS -->
                            <div class="x_content">
                                <table id="loading" class="table table-striped table-bordered">

                                </table>
                            </div>

                            <div class="x_content" id="load">
                                <div class="table-responsive">
                                    <table id="datatable-pns" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>NAMA</center>
                                                </th>
                                                <th>
                                                    <center>NIP/NIK</center>
                                                </th>
                                                <th>
                                                    <center>Status</center>
                                                </th>
                                                <th>
                                                    <center>PANGKAT</center>
                                                </th>
                                                <th>
                                                    <center>GOLONGAN</center>
                                                </th>
                                                <th>
                                                    <center>JABATAN</center>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- end Pegawai PNS -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start Pegawai NON PNSD -->
                            <div class="x_content">
                                <table id="loading-tkk" class="table table-striped table-bordered">

                                </table>
                            </div>

                            <div class="x_content" id="load-tkk">
                                <div class="table-responsive">
                                    <table id="datatable-non-pnsd" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th>
                                                    <center>NAMA</center>
                                                </th>
                                                <th>
                                                    <center>NIK</center>
                                                </th>
                                                <th>
                                                    <center>Status</center>
                                                </th>
                                                <th>
                                                    <center>JABATAN</center>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- end Pegawai NON PNSD -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    var t = $('#datatable-pns').DataTable();
    var loading = $('#loading').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    function get_all_staff() {
        status = "pns";
        $.ajax({
            url: "<?php echo site_url('PengelolaController/get_all_staff') ?>",
            type: "GET",
            data: {
                status: status
            },

            beforeSend: function() {
                $('#load').hide();

                t.clear().draw();

            },

            success: function(ajaxData) {
                loading.hide();
                $('#load').show();

                t.clear().draw();
                var result = JSON.parse(ajaxData);

                for (var i = 0; i < result.length; i++) {
                    var button1 = "<a href='#' class='btn-edit' data-sid='" + result[i]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                    t.row.add([
                        "<center>" + [i + 1] + "</center>",
                        "<center>" + result[i]['nama_pegawai'] + "</center>",
                        "<center>" + result[i]['nip_baru'] + "</center>",
                        "<center>" + result[i]['status_kepegawaian'] + "</center>",
                        "<center>" + result[i]['nama_pangkat'] + "</center>",
                        "<center>" + result[i]['nama_golongan'] + "</center>",
                        "<center>" + result[i]['nomenklatur_jabatan'] + "</center>",

                    ]).draw();
                }
            },
            error: function(status) {
                t.clear().draw();
            }
        });
    }
    get_all_staff();


    var d = $('#datatable-non-pnsd').DataTable();
    var loading_tkk = $('#loading-tkk').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    function get_all_staff_tkk() {
        status = "tkk";
        $.ajax({
            url: "<?php echo site_url('PengelolaController/get_all_staff') ?>",
            type: "GET",
            data: {
                status: status
            },

            beforeSend: function() {
                $('#load-tkk').hide();
                loading_tkk.show();
                d.clear().draw();

            },

            success: function(ajaxData) {
                loading_tkk.hide();
                $('#load-tkk').show();

                d.clear().draw();
                var result = JSON.parse(ajaxData);

                for (var i = 0; i < result.length; i++) {
                    var button1 = "<a href='#' class='btn-edit' data-sid='" + result[i]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                    d.row.add([
                        "<center>" + [i + 1] + "</center>",
                        "<center>" + result[i]['nama_pegawai'] + "</center>",
                        "<center>" + result[i]['nip_baru'] + "</center>",
                        "<center>" + result[i]['status_kepegawaian'] + "</center>",
                        "<center>" + result[i]['nomenklatur_jabatan'] + "</center>",

                    ]).draw();

                }

            },
            error: function(status) {
                d.clear().draw();
            }
        });
    }
    get_all_staff_tkk();
</script>