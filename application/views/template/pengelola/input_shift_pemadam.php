<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Jadwal</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail Jadwal</h2>
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
                    <form id="opd-form" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Regu : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="jadwalgurux" name="status" required></select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pilih Pegawai</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="select-to" title="Pilih Pegawai" name="nip[]" required></select>
                            </div>
                            <a href="javascript:document.getElementById('select-to').selectize.selectall();" class="btn btn-link" style="font-size:12px">
                                Pilih Semua
                            </a>
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
        </div>
    </div>
</div>


<script>
    //dibuat ajax , dengan value nyo jadi ID untuk ngambil data di database jam_table
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            //url : 'http://localhost/absen/index.php/PengelolaController/jadwal_sekolah',

            success: function() { //ketika kondisi berhasil melakukan request
                //    var data = JSON.parse(response); 
                //   var jam_sekolah = data;
                //  var obj = [];

                var objguru = [{
                        type: '1',
                        title: 'Regu 1',
                    },
                    {
                        type: '2',
                        title: 'Regu 2',
                    },
                    {
                        type: '3',
                        title: 'Regu 3',
                    },
                    {
                        type: '4',
                        title: 'Regu 4',
                    },

                ];

                $('#jadwalgurux').selectize({
                    valueField: 'type',
                    labelField: 'title',
                    searchField: ['title', 'desc'],
                    options: objguru,
                    render: {
                        item: function(item, escape) {
                            return '<div>' +
                                (item.title ? '<span class="text-black">Nama : ' +
                                    escape(item.title) + '</span><br>' : '') +
                                (item.desc ? escape(item.desc) : '') +
                                '</div>';
                        },
                        option: function(item, escape) {
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
</script>

<script type="text/javascript">
    $(document).ready(function() {
        Selectize.prototype.selectall = function() {
            var self = this;
            self.setValue(Object.keys(self.options));
            self.focus();
        };
    });
</script>

<script>
    $('#btn_add').click(function() {
        var insert_data = $('#opd-form').serialize();
        console.log(insert_data);
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/submit_opd_shift",
            type: "POST",
            data: insert_data,
            success: function(data) {
                swal({
                    title: 'Tambah Jam Shift Berhasil',
                    text: '',
                    type: 'success'
                });
            },
            error: function(status) {
                swal({
                    title: 'Hapus Jam Shift Gagal',
                    text: '',
                    type: 'danger'
                });
            }
        })
    });


    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>index.php/PengelolaController/data_pegawai',
            success: function(response) { //ketika kondisi berhasil melakukan request
                var data = JSON.parse(response);
                var pegawai = data.nip;
                var obj = [];
                pegawai.forEach(function(value, index) {
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
                        item: function(item, escape) {
                            return '<div>' +
                                (item.name ? '<span class="text-black">Nama : ' +
                                    escape(item.name) + '</span><br>' : '') +
                                (item.badgenumber ? escape(item.badgenumber) : '') +
                                '</div>';
                        },
                        option: function(item, escape) {
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