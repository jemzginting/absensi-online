<div class="">
    <div class="page-title">
        <div class="title_left">
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Absensi Harian</h2>
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
                <br>

                <div class="x_content">
                    <table id="loading_1" class="table table-striped table-bordered">

                    </table>
                </div>

                <div class="x_content">
                    <form id="form_update" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group" id="grup1">
                            <label><i> ->Sebelum melakukan ini pastikan Pengaturan Jam kerja yang digunakan sudah sesuai dengan tanggal yang akan diupdate ulang </i></label>
                            <div class="col-xs-12 col-sm-12 col-md-2">

                                <label class="control-label">Pilih Update Tanggal</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <select class="form-control" id="update_tanggal" name="update_tanggal1" readonly='readonly' required>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" onclick="update();" id="updatetgl" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row1">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <input type="checkbox" id="myCheck" onclick="myFunction()">
                <label>*Centang kotak disamping Jika Ingin melakukan Update Ulang Absensi Sebelumnya</label>
                <br>
                <div class="x_title" id="titleX" style="display:none">
                    <br>
                    <label style="color :crimson">* Fitur Dibawah Ini Digunakan Jika Terjadi Perubahan Atau Kesalahan Pada Update Absensi Sebelumnya</label>
                    <br><label style="color :crimson"><i> Sebelum melakukan ini pastikan Pengaturan Jam kerja yang digunakan sudah sesuai dengan tanggal yang akan diupdate ulang </i></label>
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
                <br>

                <div class="x_content">
                    <table id="loading_2" class="table table-striped table-bordered">

                    </table>
                </div>

                <div class="x_content">
                    <form id="form_update_ulang" method="POST" data-parsley-validate class="form-horizontal form-label-left" style="display:none">
                        <div class="form-group" id="grup2">
                            <div class="col-xs-12 col-md-3">
                                <label class="control-label" style="color :crimson">Pilih Update Ulang Tanggal</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <select class="form-control" id="ulang_tanggal" name="update_tanggal1" readonly='readonly' required>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" onclick="update_ulang();" id="updatetgl1" class="btn btn-danger">Update Ulang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //dibuat ajax , dengan value nyo jadi ID untuk ngambil data di database jam_table
    var loading = $('#loading_1').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');
    var loading2 = $('#loading_2').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    $(document).ready(function() {
        loading.hide();
        $('loading_1').hide();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>index.php/PengelolaController/tanggal_absen',

            success: function(response) { //ketika kondisi berhasil melakukan request
                var data = JSON.parse(response);
                var pegawai = data.tanggal;
                var obj = [];
                pegawai.forEach(function(value, index) {
                    var obj_res = {
                        tanggal: value.tanggal
                    };
                    obj.push(obj_res);
                });

                $('#update_tanggal').selectize({
                    //persist: false,
                    //maxItems: 1,
                    readOnly: true,
                    valueField: 'tanggal',
                    labelField: 'tanggal',
                    disabledField: 'disabled',
                    //searchField: 'tanggal',
                    options: obj,
                    render: {
                        item: function(item, escape) {
                            return '<div>' +
                                (item.tanggal ? escape(item.tanggal) : '') +
                                '</div>';
                        },
                        option: function(item, escape) {
                            //var label = item.tanggal || item.badgenumber;
                            var caption = item.tanggal ? item.tanggal : null;
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

    $(document).ready(function() {
        loading2.hide();
        $('loading_2').hide();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>index.php/PengelolaController/ulang_tanggal_absen',

            success: function(response) { //ketika kondisi berhasil melakukan request
                var data = JSON.parse(response);
                var pegawai = data.tanggal;
                var obj = [];
                pegawai.forEach(function(value, index) {
                    var obj_res = {
                        tanggal: value.tanggal
                    };
                    obj.push(obj_res);
                });

                $('#ulang_tanggal').selectize({
                    //persist: false,
                    //maxItems: 1,
                    readOnly: true,
                    valueField: 'tanggal',
                    labelField: 'tanggal',
                    disabledField: 'disabled',
                    //searchField: 'tanggal',
                    options: obj,
                    render: {
                        item: function(item, escape) {
                            return '<div>' +
                                (item.tanggal ? escape(item.tanggal) : '') +
                                '</div>';
                        },
                        option: function(item, escape) {
                            //var label = item.tanggal || item.badgenumber;
                            var caption = item.tanggal ? item.tanggal : null;
                            return '<div>' +
                                //'<span class="text-black">Nama : ' + escape(label) + '</span><br>' +
                                (caption ? escape(caption) : '') +
                                '</div>';
                        }
                    },
                });
            },
            error: function(status) {
                $('#ulang_tanggal').selectize({
                    disabledField: 'disabled',
                });
                swal({
                    title: 'gagal',
                    text: '',
                    type: 'warning'
                });

            }
        });
    });

    function update() {
        var postData = $('#form_update').serialize();
        var jemz = $.ajax({
            url: '<?php echo site_url('PengelolaController/get_rekap_harian_deptid_ubah') ?>',
            type: "GET",
            data: postData,

            beforeSend: function() {
                loading.show();
                $('#grup1').hide();

            },
            success: function(data) {

                swal({
                    title: 'Berhasil update terbaru',
                    text: '',
                    type: 'success'
                });
            },

            error: function(status) {

                swal({
                    title: 'gagal',
                    text: '',
                    type: 'warning'
                });

            }
        });
    }

    function update_ulang() {
        var postData = $('#form_update_ulang').serialize();
        var jemz = $.ajax({
            url: '<?php echo site_url('PengelolaController/get_rekap_harian_deptid_ubah') ?>',
            type: "GET",
            data: postData,

            beforeSend: function() {
                loading2.show();
                $('#grup2').hide();

            },
            success: function(data) {

                swal({
                    title: 'Berhasil update terbaru',
                    text: '',
                    type: 'success'
                });
            },

            error: function(status) {

                swal({
                    title: 'gagal',
                    text: '',
                    type: 'warning'
                });

            }
        });
    }


    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var btnUlg = document.getElementById("form_update_ulang");
        var btnUpdate = document.getElementById("form_update");
        var textUlg = document.getElementById("titleX");
        if (checkBox.checked == true) {
            btnUlg.style.display = "block";
            textUlg.style.display = "block";
            btnUpdate.style.display = "none";
        } else {
            btnUlg.style.display = "none";
            textUlg.style.display = "none";
            btnUpdate.style.display = "block";
        }
    }
</script>