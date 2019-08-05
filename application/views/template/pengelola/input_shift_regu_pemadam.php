<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Setting Shift Regu</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a></li>
                        <li><a href="#">Settings 2</a></li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                        data-toggle="tab" aria-expanded="true">Regu 1</a></li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"
                        aria-expanded="false">Regu 2</a></li>
                <li role="presentation" class=""><a href="#tab_content3" id="profile-tab" role="tab" data-toggle="tab"
                        aria-expanded="false">Regu 3</a></li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab"
                        aria-expanded="false">Regu 4</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <!-- start Setting Regu 1-->
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <div class="x_content">
                        <form id="opd-form" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Setting Waktu :
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="jadwalgurux" name="status" required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pilih
                                    Tanggal</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group date form-group" id="datepicker">
                                        <input type="text" class="form-control" id="Dates" name="Dates"
                                            placeholder="Select days" required />
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-calendar"></i><span
                                                class="count"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-success" id="btn_add">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Setting Regu 1-->
                <!-- start Setting Regu 2-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">
                    <div class="x_content">
                        <form id="opd-form" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Setting Waktu :
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="jadwalgurux" name="status" required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pilih
                                    Tanggal</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group date" data-date-format="dd.mm.yyyy">
                                        <input type="text" class="form-control" placeholder="dd.mm.yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-success" id="btn_add">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Setting Regu 2-->
                <!-- start Setting Regu 3-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="home-tab">
                    <div class="x_content">
                        <form id="opd-form" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Setting Waktu :
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="jadwalgurux" name="status" required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pilih
                                    Tanggal</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="select-to" title="Pilih Pegawai" name="nip[]"
                                        required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-success" id="btn_add">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Setting Regu 3-->
                <!-- start Setting Regu 4-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="home-tab">
                    <div class="x_content">
                        <form id="opd-form" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Setting Waktu :
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="jadwalgurux" name="status" required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Pilih
                                    Tanggal</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="select-to" title="Pilih Pegawai" name="nip[]"
                                        required></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-success" id="btn_add">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Setting Regu 4-->
            </div>
        </div>
    </div>
</div>

<script>
    //-----------------------------------Regu 1-----------------------------------//
    $(document).ready(function () {
        $.ajax({
            type: 'GET',
            //url : 'http://localhost/absen/index.php/PengelolaController/jadwal_sekolah',

            success: function () { //ketika kondisi berhasil melakukan request
                //    var data = JSON.parse(response); 
                //   var jam_sekolah = data;
                //  var obj = [];

                var objguru = [{
                        type: 'hijau',
                        title: 'Hijau',
                        desc: '(07.30 - 14.00 WIB)'
                    },
                    {
                        type: 'merah',
                        title: 'Merah',
                        desc: '(14.00 - 22.00 WIB)'
                    },
                    {
                        type: 'abu_abu',
                        title: 'Abu-Abu',
                        desc: '(22.00 - 07.30 WIB)'
                    },
                    {
                        type: 'putih',
                        title: 'Putih',
                        desc: '(Libur)'
                    },
                ];

                $('#jadwalgurux').selectize({
                    valueField: 'type',
                    labelField: 'title',
                    searchField: ['title', 'desc'],
                    options: objguru,
                    render: {
                        item: function (item, escape) {
                            return '<div>' +
                                (item.title ? '<span class="text-black">Nama : ' +
                                    escape(item.title) + '</span><br>' : '') +
                                (item.desc ? escape(item.desc) : '') +
                                '</div>';
                        },
                        option: function (item, escape) {
                            var label = item.title || item.desc;
                            var caption = item.title ? item.desc : null;
                            return '<div>' +
                                '<span class="text-black">' + escape(label) +
                                '</span><br>' +
                                (caption ? escape(caption) : '') +
                                '</div>';
                        }
                    },
                });
            },
        });
    });

    //-----------------------------------Regu 2-----------------------------------//


    //-----------------------------------Regu 3-----------------------------------//


    //-----------------------------------Regu 4-----------------------------------//
</script>
<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
           // startDate: new Date(),
           startDate : "01-04-2019",
            multidate: true,
            format: "dd/mm/yyyy",
            daysOfWeekHighlighted: "5,6",
            datesDisabled: ['31/04/2017'],
            language: 'en'
        }).on('changeDate', function (e) {
            // `e` here contains the extra attributes
            $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
        });
    });


    $('#btn_add').click(function () {
        var insert_data = $('#opd-form').serialize();
        console.log(insert_data);
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/submit_opd_shift",
            type: "POST",
            data: insert_data,
            success: function (data) {
                swal({
                    title: 'Tambah Jam Shift Berhasil',
                    text: '',
                    type: 'success'
                });
            },
            error: function (status) {
                swal({
                    title: 'Hapus Jam Shift Gagal',
                    text: '',
                    type: 'danger'
                });
            }
        })
    });

    $(document).ready(function () {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>index.php/PengelolaController/data_pegawai',
            success: function (response) { //ketika kondisi berhasil melakukan request
                var data = JSON.parse(response);
                var pegawai = data.nip;
                var obj = [];
                pegawai.forEach(function (value, index) {
                    var obj_res = {
                        badgenumber: value.badgenumber,
                        name: value.name
                    };
                    obj.push(obj_res);
                });

                $('#select-to').selectize({
                    persist: false,
                    maxItems: null,
                    valueField: 'badgenumber',
                    labelField: 'name',
                    searchField: ['name', 'badgenumber'],
                    options: obj,
                    render: {
                        item: function (item, escape) {
                            return '<div>' +
                                (item.name ? '<span class="text-black">Nama : ' +
                                    escape(item.name) + '</span><br>' : '') +
                                (item.badgenumber ? escape(item.badgenumber) : '') +
                                '</div>';
                        },
                        option: function (item, escape) {
                            var label = item.name || item.badgenumber;
                            var caption = item.name ? item.badgenumber : null;
                            return '<div>' +
                                '<span class="text-black">Nama : ' + escape(label) +
                                '</span><br>' +
                                (caption ? escape(caption) : '') +
                                '</div>';
                        }
                    },
                });
            },
        });
    });
</script>