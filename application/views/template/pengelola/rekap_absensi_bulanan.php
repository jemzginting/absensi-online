<?php $date = date('Y'); ?>
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Absensi</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Absensi Bulanan PNS</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Rekap Absensi Bulanan NON PNSD</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <!-- start Rekap Absen PNS -->
                    <div id="toolbar">
                        <form id="form-tampil-pns" class="form-horizontal form-label-left" onsubmit="return false;">
                            <input type="hidden" id="DeptID" name="DeptID" value="<?= $DeptID; ?>">

                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <label class="control-label">Tahun</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <select class="form-control" id="tahun" name="tahunx">
                                    <?php for ($i = $date; $i >= 2019; $i--) { ?>
                                        <option value='<?php echo $i; ?>'> <?php echo $i; ?> </option>
                                    <?php
                                    } ?>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <label class="control-label">Bulan</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <select class="form-control" id="bulan" name="bulanx">
                                    <option value='01'>Januari</option>
                                    <option value='02'>Februari</option>
                                    <option value='03'>Maret</option>
                                    <option value='04'>April</option>
                                    <option value='05'>Mei</option>
                                    <option value='06'>Juni</option>
                                    <option value='07'>Juli</option>
                                    <option value='08'>Agustus</option>
                                    <option value='09'>September</option>
                                    <option value='10'>Oktober</option>
                                    <option value='11'>November</option>
                                    <option value='12'>Desember</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" id="tampilkan_pns" onclick="tampilkan();" class="btn btn-primary">Tampilkan</button>
                                <button type="submit" id="cetak_pns1" onchange="Cetak_pns()" onclick="cetak_pns();" class="btn btn-danger">Cetak</button>
                            </div>

                        </form>
                        <br />
                    </div>

                    <div class="x_content">
                        <table id="loading-pns" class="table table-striped table-bordered">

                        </table>
                    </div>

                    <div class="x_content" id="load-pns">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>NO</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                        <th>
                                            <center>NAMA</center>
                                        </th>
                                        <th>
                                            <center>NIP</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH HARI KERJA</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH KEHADIRAN KERJA</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH TELAT</center>
                                        </th>
                                        <th>
                                            <center>PULANG CEPAT</center>
                                        </th>
                                        <th>
                                            <center>SAKIT</center>
                                        </th>
                                        <th>
                                            <center>IZIN</center>
                                        </th>
                                        <th>
                                            <center>CUTI</center>
                                        </th>
                                        <th>
                                            <center>TK</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH (HARI%)</center>
                                        </th>
                                        <th>
                                            <center>POTONGAN(%)</center>
                                        </th>
                                    </tr>
                                </thead>


                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- end Rekap Absen PNS -->

                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">

                    <!-- start Rekap Absen NON PNSD -->
                    <div id="toolbar">
                        <form id="form-tampil-tkk" class="form-horizontal form-label-left" onsubmit="return false;">
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <label class="control-label">Tahun</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <select class="form-control" id="tahun1" name="tahun1">
                                    <?php for ($i = $date; $i >= 2019; $i--) { ?>
                                        <option value='<?php echo $i; ?>'> <?php echo $i; ?> </option>
                                    <?php
                                    } ?>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <label class="control-label">Bulan</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <select class="form-control" id="bulan1" name="bulan1">
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
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" id="tampilkan_tkk" onclick="tampilkan1();" class="btn btn-primary">Tampilkan</button>
                                <button type="submit" id="cetak_tkk1" onchange="Cetak_tkk()" onclick="cetak_tkk();" class="btn btn-danger">Cetak</button>
                            </div>
                        </form>
                        <br />
                    </div>
                    <div class="x_content">
                        <table id="loading-tkk" class="table table-striped table-bordered"></table>
                    </div>
                    <div class="x_content" id="load-tkk">
                        <div class="table-responsive">
                            <table id="datatable2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>NO</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                        <th>
                                            <center>NAMA</center>
                                        </th>
                                        <th>
                                            <center>NIK</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH HARI KERJA</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH KEHADIRAN KERJA</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH TELAT</center>
                                        </th>
                                        <th>
                                            <center>PULANG CEPAT</center>
                                        </th>
                                        <th>
                                            <center>SAKIT</center>
                                        </th>
                                        <th>
                                            <center>IZIN</center>
                                        </th>
                                        <th>
                                            <center>CUTI</center>
                                        </th>
                                        <th>
                                            <center>TK</center>
                                        </th>
                                        <th>
                                            <center>JUMLAH (HARI%)</center>
                                        </th>
                                        <th>
                                            <center>POTONGAN(%)</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- end Rekap Absen NON PNSD -->

                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------- Modal Edit PNS ------------------------------------ -->
<div class="modal inmodal" id="edit-pns-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-search fa-4x "></i></center>
                <center>
                    <h4 class="modal-title">Detail Absensi PNS</h4>
                </center>
                <h4>
                    <center><small>Detail Absensi Pegawai PNS</small></center>
            </div>

            <form id="form-edit" onsubmit="return false;">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id-userid" name="id_useridx" value="">
                        <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-danger" style="">Print</button>
                        <div id="list-surat2" class="table-responsive">
                            <table id="datatable1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>NIP</center>
                                        </th>
                                        <th>
                                            <center>Tanggal</center>
                                        </th>
                                        <th>
                                            <center>Masuk</center>
                                        </th>
                                        <th>
                                            <center>Pulang</center>
                                        </th>
                                        <th>
                                            <center>Telat</center>
                                        </th>
                                        <th>
                                            <center>Pulang Cepat</center>
                                        </th>
                                        <th>
                                            <center>Total Persen</center>
                                        </th>
                                        <th>
                                            <center>Ket</center>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--------------------------------------- Modal Edit TKK ------------------------------------ -->
<div class="modal inmodal" id="edit-tkk-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog-md">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-search fa-4x "></i></center>
                <center>
                    <h4 class="modal-title">Detail Absensi TKK</h4>
                </center>
                <h4>
                    <center><small>Detail Absensi Pegawai TKK</small></center>
            </div>
            <form id="form-edit" onsubmit="return false;">
                <input type="hidden" id="id-surat-modal" name="id_userid">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id-userid" name="id_useridx" value="">
                        <button type="submit" id="print_tkk2" onchange="Print_tkk()" onclick="print_tkk();" class="btn btn-danger" style="">Print</button>
                        <div id="list-surat2" class="table-responsive">
                            <table id="datatable3" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>NIK</center>
                                        </th>
                                        <th>
                                            <center>Tanggal</center>
                                        </th>
                                        <th>
                                            <center>Masuk</center>
                                        </th>
                                        <th>
                                            <center>Pulang</center>
                                        </th>
                                        <th>
                                            <center>Telat</center>
                                        </th>
                                        <th>
                                            <center>Pulang Cepat</center>
                                        </th>
                                        <th>
                                            <center>Total Persen</center>
                                        </th>
                                        <th>
                                            <center>Ket</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    ////////////////////////////// start pns////////////////////////////////

    var loading_pns = $('#loading-pns').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    $(document).ready(function() {
        loading_pns.hide();
        $('loading-pns').hide();

        /* load_laporan_bulanan();

        function load_laporan_bulanan() {
            $.ajax({
                url: '<?php echo site_url('PengelolaController/get_rekap_bulanan_deptid_ubah') ?>',
                dataType: "JSON",
                success: function(data) {
                    swal({
                        title: 'Berhasil update terbaru',
                        text: '',
                        type: 'success'
                    });

                }
            });
        } */



    });

    var t = $('#datatable').DataTable({
        columns: [{
                "width": "1%"
            },
            {
                "width": "1%"
            },
            {
                "width": "30%"
            },
            {
                "width": "28%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
            {
                "width": "5%"
            },
        ]
    });

    var c = $('#datatable1').DataTable({

    });

    function tampilkan() {
        postData = $('#form-tampil-pns').serialize();
        var t = $('#datatable').DataTable();
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/tampil_laporan_dept_by_bulan",
            type: "GET",
            data: postData,

            beforeSend: function() {
                loading_pns.show();
                $('#load-pns').hide();
                t.clear().draw();
            },

            success: function(ajaxData) {
                loading_pns.hide();
                $('#load-pns').show();
                $("#cetak_pns1").show();

                t.clear().draw();
                var result = JSON.parse(ajaxData);

                for (var i = 0; i < result.length; i++) {
                    var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[i]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";

                    if (!result[i]['jlh_telat']) {
                        result[i]['jlh_telat'] = "0";
                    }
                    if (!result[i]['pulang_cepat']) {
                        result[i]['pulang_cepat'] = "0";
                    }
                    if (!result[i]['sakit']) {
                        result[i]['sakit'] = "0";
                    }
                    if (!result[i]['izin']) {
                        result[i]['izin'] = "0";
                    }
                    if (!result[i]['cuti']) {
                        result[i]['cuti'] = "0";
                    }
                    if (!result[i]['tk']) {
                        result[i]['tk'] = "0";
                    }

                    t.row.add([
                        "<center>" + [i + 1] + "</center>",
                        "<center>" + button1 + "</center>",
                        result[i]['nama_pegawai'],
                        result[i]['nip'],
                        "<center>" + result[i]['jumlah_hari'] + "</center>",
                        "<center>" + result[i]['jumlah_hadir'] + "</center>",
                        "<center>" + result[i]['jlh_telat'] + "</center>",
                        "<center>" + result[i]['pulang_cepat'] + "</center>",
                        "<center>" + result[i]['sakit'] + "</center>",
                        "<center>" + result[i]['izin'] + "</center>",
                        "<center>" + result[i]['cuti'] + "</center>",

                        "<center>" + result[i]['tk'] + "</center>",
                        "<center>" + result[i]['persen_hadir'] + " " + "%" + "</center>",
                        "<center>" + result[i]['persen_potongan'] + " " + "%" + "</center>",
                    ]).draw();

                }

            },
            error: function(status) {
                t.clear().draw();
            }
        });
    }

    $('#datatable').on('click', '.btn-edit', function() {
        var id_userid = $(this).data("iduserid");
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        var status = 'pns';
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_rekap",
            type: "GET",
            data: {
                id_userid: id_userid,
                bulan: bulan,
                tahun: tahun,
                status: status
            },
            success: function(ajaxData) {
                c.clear().draw();
                //data = ajaxData.trim();
                //var result = JSON.parse(data);
                var result = JSON.parse(ajaxData);
                // var result = jquery.parseJSON(JSON.stringify(ajaxData));
                $('#id-userid').val(id_userid);

                if (result != 0) {

                    // var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[0]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";

                    //console.log("cek = " + result[0]['userid']);
                    for (var i = 0; i < result.length; i++) {
                        var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[i]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";

                        c.row.add([
                            "<center>" + [i + 1] + "</center>",
                            result[i]['nama_pegawai'],
                            result[i]['nip'],
                            "<center>" + result[i]['tanggal'] + "</center>",
                            "<center>" + result[i]['masuk'] + "</center>",
                            "<center>" + result[i]['pulang'] + "</center>",
                            "<center>" + result[i]['telat'] + "</center>",
                            "<center>" + result[i]['pulang_cepat'] + "</center>",
                            "<center>" + result[i]['total_persen'] + " " + "%" + "</center>",
                            "<center>" + result[i]['nama_keterangan'] + "</center>",
                        ]).draw();
                    }
                    $('#edit-pns-modal').modal('show');
                } else {
                    swal({
                        title: 'Data Kosong',
                        text: '',
                        type: 'success'
                    });
                }
            },
            error: function(status) {

            }
        });
    });

    function cetak_pns() {
        bulan = $('#bulan').val();
        tahun = $('#tahun').val();
        DeptID = $('#DeptID').val();
        status_kepegawaian = "pns";

        window.open("<?php echo base_url(); ?>CetakController/index/" + DeptID + '/' + tahun + '/' + bulan + '/' + status_kepegawaian, '_blank');
    }


    function print_pns() {
        userid = $('#id-userid').val();
        // userid = $('#useridx').val();
        bulan = $('#bulan').val();
        tahun = $('#tahun').val();
        DeptID = $('#DeptID').val();
        status_kepegawaian = "pns";

        window.open("<?php echo base_url(); ?>CetakPribadiController/index/" + DeptID + '/' + userid + '/' + tahun + '/' + bulan + '/' + status_kepegawaian, '_blank');
    }

    function print_tkk() {
        userid = $('#id-userid').val();
        // userid = $('#useridx').val();
        bulan = $('#bulan1').val();
        tahun = $('#tahun1').val();
        DeptID = $('#DeptID').val();
        status_kepegawaian = "tkk";

        window.open("<?php echo base_url(); ?>CetakPribadiController/index/" + DeptID + '/' + userid + '/' + tahun + '/' + bulan + '/' + status_kepegawaian, '_blank');
    }


    ////////////TKK//////////////

    var loading_tkk = $('#loading-tkk').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    $(document).ready(function() {
        loading_tkk.hide();
        $('loading-tkk').hide();
    });

    var a = $('#datatable2').DataTable({});

    var b = $('#datatable3').DataTable({});

    function tampilkan1() {
        postData = $('#form-tampil-tkk').serialize();

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/tampil_laporan_tkk_dept_by_bulan",
            type: "GET",
            data: postData,
            beforeSend: function() {
                loading_tkk.show();
                $('#load-tkk').hide();
                a.clear().draw();
            },
            success: function(ajaxData) {
                loading_tkk.hide();
                $('#load-tkk').show();
                $("#cetak_tkk1").show();

                a.clear().draw();
                var result = JSON.parse(ajaxData);

                for (var i = 0; i < result.length; i++) {
                    var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[i]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";

                    a.row.add([
                        "<center>" + [i + 1] + "</center>",
                        "<center>" + button1 + "</center>",
                        result[i]['nama_pegawai'],
                        result[i]['nip'],
                        "<center>" + result[i]['jumlah_hari'] + "</center>",
                        "<center>" + result[i]['jumlah_hadir'] + "</center>",
                        "<center>" + result[i]['jlh_telat'] + "</center>",
                        "<center>" + result[i]['pulang_cepat'] + "</center>",
                        "<center>" + result[i]['sakit'] + "</center>",
                        "<center>" + result[i]['izin'] + "</center>",
                        "<center>" + result[i]['cuti'] + "</center>",

                        "<center>" + result[i]['tk'] + "</center>",
                        "<center>" + result[i]['persen_hadir'] + " " + "%" + "</center>",
                        "<center>" + result[i]['persen_potongan'] + " " + "%" + "</center>",
                    ]).draw();

                }

            },
            error: function(status) {
                a.clear().draw();
            }
        });
    }

    $('#datatable2').on('click', '.btn-edit', function() {
        var id_userid = $(this).data("iduserid");
        var bulan = $('#bulan1').val();
        var tahun = $('#tahun1').val();
        var status = 'tkk';
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_rekap",
            type: "GET",
            data: {
                id_userid: id_userid,
                bulan: bulan,
                tahun: tahun,
                status: status
            },
            success: function(ajaxData) {
                b.clear().draw();
                var result = JSON.parse(ajaxData);
                //var result = jQuery.parseJSON(ajaxData);
                $('#id-userid').val(id_userid);
                if (result != 0) {
                    for (var i = 0; i < result.length; i++) {
                        var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[i]['userid'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-search fa-1x'></span></a>";

                        if (result[i]['keterangan'] == 0) {
                            result[i]['nama_keterangan'] = "";
                        }

                        b.row.add([
                            "<center>" + [i + 1] + "</center>",
                            result[i]['nama_pegawai'],
                            result[i]['nip'],
                            "<center>" + result[i]['tanggal'] + "</center>",
                            "<center>" + result[i]['masuk'] + "</center>",
                            "<center>" + result[i]['pulang'] + "</center>",
                            "<center>" + result[i]['telat'] + "</center>",
                            "<center>" + result[i]['pulang_cepat'] + "</center>",
                            "<center>" + result[i]['total_persen'] + " " + "%" + "</center>",
                            "<center>" + result[i]['nama_keterangan'] + "</center>",
                        ]).draw();
                    }
                    $('#edit-tkk-modal').modal('show');
                } else {
                    swal({
                        title: 'Data Kosong',
                        text: '',
                        type: 'success'
                    });
                }
            },
            error: function(status) {

            }
        });
    });

    function cetak_tkk() {
        bulan = $('#bulan1').val();
        tahun = $('#tahun1').val();
        DeptID = $('#DeptID').val();
        status_kepegawaian = "tkk";

        window.open("<?php echo base_url(); ?>index.php/CetakController/index/" + DeptID + '/' + tahun + '/' + bulan + '/' + status_kepegawaian, '_blank');
    }
</script>