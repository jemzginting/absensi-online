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
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Absen PNS</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Rekap Absen NON PNSD</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <!-- start Rekap Absen PNS -->
                    <div id="toolbar">
                        <form id="form-tampil-pns" class="form-horizontal form-label-left" onsubmit="return false;">
                            <input type="hidden" id="DeptID" name="DeptID" value="<?= $DeptID; ?>">
                            <input type="hidden" id="stat" name="status" value="pns">
                            <br />
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <label class="control-label">Mulai</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <input id="mulai" name="mulaiP" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" id="tampilkan_pns" onclick="tampilkan();" class="btn btn-primary">Tampilkan</button>
                                <button type="submit" id="cetak_pns1" onclick="cetak_pns();" class="btn btn-danger">Cetak</button>
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
                                        <th width="1%">
                                            <center>No</center>
                                        </th>
                                        <th width="20%">
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>NIP</center>
                                        </th>
                                        <th>
                                            <center>Tanggal</center>
                                        </th>
                                        <th width="7%">
                                            <center>Masuk</center>
                                        </th>
                                        <th width="7%">
                                            <center>Pulang</center>
                                        </th>
                                        <th width="7%">
                                            <center>Telat</center>
                                        </th>
                                        <th width="13%">
                                            <center>Pulang Cepat</center>
                                        </th>
                                        <th width="13%">
                                            <center>Potongan(%)</center>
                                        </th>
                                        <th width="10%">
                                            <center>Ket</center>
                                        </th>
                                        <th>
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <!-- end Rekap Absen PNS -->
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                    <!-- start Rekap Absen NON PNSD -->

                    <div id="toolbar">
                        <form id="form-tampil1" class="form-horizontal form-label-left" onsubmit="return false;">
                            <br />
                            <input type="hidden" id="status" name="status" value="tkk">
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <label class="control-label">Mulai</label>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <input id="mulai1" name="mulaiP" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-xs-12 col-md-3">
                                <button type="submit" onclick="tampilkan1();" class="btn btn-primary">Tampilkan</button>
                                <button type="submit" id="cetak_tkk1" onchange="Cetak_tkk()" onclick="cetak_tkk();" class="btn btn-danger">Cetak</button>
                            </div>

                        </form>
                        <br />
                    </div>

                    <div class="x_content">
                        <table id="loading-non-pnsd" class="table table-striped table-bordered">

                        </table>
                    </div>

                    <div class="x_content" id="load-non-pnsd">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="1%">
                                            <center>No</center>
                                        </th>
                                        <th width="20%">
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>NIK</center>
                                        </th>
                                        <th>
                                            <center>Tanggal</center>
                                        </th>
                                        <th width="7%">
                                            <center>Masuk</center>
                                        </th>
                                        <th width="7%">
                                            <center>Pulang</center>
                                        </th>
                                        <th width="7%">
                                            <center>Telat</center>
                                        </th>
                                        <th width="13%">
                                            <center>Pulang Cepat</center>
                                        </th>
                                        <th width="13%">
                                            <center>Potongan(%)</center>
                                        </th>
                                        <th width="10%">
                                            <center>Ket</center>
                                        </th>
                                        <th>
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
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
<div class="modal inmodal" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-edit fa-4x "></i></center>
                <center>
                    <h4 class="modal-title">Keterangan</h4>
                </center>
                <h4>
                    <center><small>Edit Keterangan Pegawai</small></center>

            </div>
            <form id="form-edit" onsubmit="return false;">
                <input type="hidden" id="id-userid-modal" name="id_userid">
                <input type="hidden" id="id-tanggal-modal" name="tanggal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Keterangan</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="keterangan" name="keterangan">
                                <option value="0">Pilih Keterangan</option>
                                <?php
                                foreach ($jenis_keterangan as $row) {
                                    echo "<option value='" . $row['id_keterangan'] . "'>" . $row['nama_keterangan'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-12">Sampai</label>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input id="sampaiedit" name="sampaiedit" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12"></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">

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

<!--------------------------------------- Modal Edit NON PNSD ------------------------------------ -->
<div class="modal inmodal" id="edit-modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-edit fa-4x "></i></center>
                <center>
                    <h4 class="modal-title">Keterangan</h4>
                </center>
                <h4>
                    <center><small>Edit Keterangan Pegawai</small></center>

            </div>
            <form id="form-edit1" onsubmit="return false;">
                <input type="hidden" id="id-userid-modal1" name="id_userid">
                <input type="hidden" id="id-tanggal-modal1" name="tanggal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Keterangan</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="keterangan1" name="keterangan">
                                <option value="0">Pilih Keterangan</option>
                                <?php
                                foreach ($jenis_keterangan as $row) {
                                    echo "<option value='" . $row['id_keterangan'] . "'>" . $row['nama_keterangan'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-12 col-md-12">Sampai</label>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input id="sampaiedit1" name="sampaiedit" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12"></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">

                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn-simpan1" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var loading_pns = $('#loading-pns').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    $(document).ready(function() {
        $("#cetak_pns1").hide();
        loading_pns.hide();
        $('loading-pns').hide();
    });

    var date = new Date(2019, 02, 01);
    var max_date = new Date();
    var currentDate = max_date.getDate();
    var currentMonth = max_date.getMonth();
    var currentYear = max_date.getFullYear();


    $('#mulai').daterangepicker({
            singleDatePicker: true,

            //minDate: new Date(2019, 02, 01),
            //maxDate : new Date(currentDate,currentMonth,currentYear),
            format: "YYYY-MM-DD",
            //startDate: moment(date).add(1, 'days'),
            //endDate: moment(date).add(2, 'days'),
            calender_style: "picker_3",
            /*
            isInvalidDate: function(ele) {
                var currDate = moment(ele._d).format('YYYY-MM-DD');
                return ["2019-03-09"].indexOf(currDate) != -1;
            },
            
    locale: {
      format: "DD-MM-YYYY"
     }, */
        },

        function(start, end, label) {
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

    //////////////////////////////////PNS///////////////////////////////////////////////////


    function tampilkan() {
        var postData = $('#form-tampil-pns').serialize();

        console.log(postData);
        var mulai = $('#mulai').val();
        //sampai = $('#sampai').val();
        var t = $('#datatable').DataTable();
        console.log(mulai);
        if (mulai != "") {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/PengelolaController/tampil_rekap_pns_dept_by_tanggal",
                type: "post",
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

                    if (result != 0) {

                        for (var i = 0; i < result.length; i++) {
                            var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[i]['userid'] +
                                "' data-idtanggal='" + result[i]['tanggal'] +
                                "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                            var button2 = "<a href='#' class='btn-danger btn-cetak' data-iduserid='" + result[i]['userid'] +
                                "' data-idtanggal='" + result[i]['tanggal'] +
                                "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                            if (result[i]['aksi'] == 0) {
                                button1 = "";
                                button2 = "";
                            }
                            t.row.add([
                                "<center>" + [i + 1] + "</center>",
                                "<center>" + result[i]['nama_pegawai'] + "</center>",
                                "<center>" + result[i]['nip'] + "</center>",
                                "<center>" + result[i]['tanggal'] + "</center>",
                                "<center>" + result[i]['masuk'] + "</center>",
                                "<center>" + result[i]['pulang'] + "</center>",
                                "<center>" + result[i]['telat'] + "</center>",
                                "<center>" + result[i]['pulang_cepat'] + "</center>",
                                "<center>" + result[i]['total_persen'] + " " + "%" + "</center>",
                                "<center>" + result[i]['nama_keterangan'] + "</center>",
                                "<center>" + button1 + "</center>",
                                "<center>" + button2 + "</center>",
                            ]).draw();

                        }
                    } else {
                        swal({
                            title: 'Tidak ada data',
                            text: '',
                            type: 'success'
                        });
                    }
                },
                error: function(status) {

                    t.clear().draw();
                }
            });
        }
    }

    $('#datatable').on('click', '.btn-edit', function() {
        var id_userid = $(this).data("iduserid");
        var tanggal = $(this).data("idtanggal");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_keterangan_pns",
            type: "POST",
            data: {
                id_userid: id_userid,
                tanggal: tanggal
            },
            success: function(ajaxData) {
                var result = JSON.parse(ajaxData);
                $('#id-userid-modal').val(id_userid);
                $('#id-tanggal-modal').val(tanggal);
                $('#keterangan').val(result[0]['keterangan']);
                $('#sampaiedit').val(result[0]['tanggal']);
                $('#edit-modal').modal('show');
                // $('#id-userid-modal').val(id_userid);
                // $('#keterangan').val(result[0]['keterangan']);
                // // $('#id-tanggal-modal').val(tanggal);
                // $('#edit-modal').modal('show');
            },
            error: function(status) {

            }
        });
    });

    $('#datatable').on('click', '.btn-cetak', function() {
        var id_userid = $(this).data("iduserid");
        var tanggal = $(this).data("idtanggal");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_keterangan_pns",
            type: "POST",
            data: {
                id_userid: id_userid,
                tanggal: tanggal
            },
            success: function(ajaxData) {
                var result = JSON.parse(ajaxData);
                $('#id-userid-modal').val(id_userid);
                $('#id-tanggal-modal').val(tanggal);
                $('#keterangan').val(result[0]['keterangan']);
                $('#sampaiedit').val(result[0]['tanggal']);
                $('#edit-modal').modal('show');
                // $('#id-userid-modal').val(id_userid);
                // $('#keterangan').val(result[0]['keterangan']);
                // // $('#id-tanggal-modal').val(tanggal);
                // $('#edit-modal').modal('show');
            },
            error: function(status) {

            }
        });
    });

    $('#btn-simpan').click(function() {
        var update_data = $('#form-edit').serialize();
        $('#btn-simpan').attr('disabled', true);
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/update_keterangan",
            type: "GET",
            data: update_data,

            success: function(ajaxData) {

                tampilkan();
                $('#edit-modal').modal('hide');
                $('#btn-simpan').attr('disabled', false);
                swal({
                    title: 'Edit Keterangan Berhasil',
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

    function cetak_pns() {
        mulai = $('#mulai').val();
        // sampai = $('#sampai').val();
        DeptID = $('#DeptID').val();
        status_kepegawaian = "pns";

        window.open("<?php echo base_url(); ?>CetakHarianController/index/" + DeptID + '/' + mulai +
            '/' + status_kepegawaian, '_blank');
    }

    /////////////////////////////////NON PNSD//////////////////////////////////////////////////

    var loading_non_pnsd = $('#loading-non-pnsd').html(
        '<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    $(document).ready(function() {
        $("#cetak_tkk1").hide();
        loading_non_pnsd.hide();
        $('loading-non-pnsd').hide();

    });


    function tampilkan1() {
        postData = $('#form-tampil1').serialize();
        mulai1 = $('#mulai1').val();

        var d = $('#datatable1').DataTable();

        if (mulai1 != "") {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/PengelolaController/tampil_rekap_tkk_dept_by_tanggal",
                type: "POST",
                data: postData,
                beforeSend: function() {
                    loading_non_pnsd.show();
                    $('#load-non-pnsd').hide();
                    d.clear().draw();
                },
                success: function(ajaxData) {
                    loading_non_pnsd.hide();
                    $('#load-non-pnsd').show();
                    $("#cetak_tkk1").show();

                    d.clear().draw();
                    var result = JSON.parse(ajaxData);

                    if (result != 0) {
                        for (var i = 0; i < result.length; i++) {
                            var button1 = "<a href='#' class='btn-edit' data-iduserid='" + result[i]['userid'] +
                                "' data-idtanggal='" + result[i]['tanggal'] +
                                "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                            var button2 = "<a href='#' class='btn-danger btn-cetak' data-iduserid='" + result[i]['userid'] +
                                "' data-idtanggal='" + result[i]['tanggal'] +
                                "' title='Cetak' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";

                            if (result[i]['aksi'] == 0) {
                                button1 = "";
                                button2 = "";
                            }

                            d.row.add([
                                "<center>" + [i + 1] + "</center>",
                                "<center>" + result[i]['nama_pegawai'] + "</center>",
                                "<center>" + result[i]['nip'] + "</center>",
                                "<center>" + result[i]['tanggal'] + "</center>",
                                "<center>" + result[i]['masuk'] + "</center>",
                                "<center>" + result[i]['pulang'] + "</center>",
                                "<center>" + result[i]['telat'] + "</center>",
                                "<center>" + result[i]['pulang_cepat'] + "</center>",
                                "<center>" + result[i]['total_persen'] + " " + "%" + "</center>",
                                "<center>" + result[i]['nama_keterangan'] + "</center>",
                                "<center>" + button1 + "</center>",
                                "<center>" + button2 + "</center>",
                            ]).draw();

                        }
                    } else {
                        swal({
                            title: 'Tidak ada data',
                            text: '',
                            type: 'success'
                        });
                    }
                },
                error: function(status) {
                    d.clear().draw();
                }
            });
        }
    }

    $('#datatable1').on('click', '.btn-edit', function() {
        var id_userid1 = $(this).data("iduserid");
        var tanggal1 = $(this).data("idtanggal");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_keterangan_tkk",
            type: "POST",
            data: {
                id_userid1: id_userid1,
                tanggal1: tanggal1
            },
            success: function(ajaxData) {
                var result = JSON.parse(ajaxData);
                $('#id-userid-modal1').val(id_userid1);
                $('#id-tanggal-modal1').val(tanggal1);
                $('#keterangan1').val(result[0]['keterangan']);

                $('#sampaiedit1').val(result[0]['tanggal']);

                $('#edit-modal1').modal('show');
                // $('#id-userid-modal').val(id_userid);
                // $('#keterangan').val(result[0]['keterangan']);
                // // $('#id-tanggal-modal').val(tanggal);
                // $('#edit-modal').modal('show');
            },
            error: function(status) {

            }
        });
    });

    $('#datatable1').on('click', '.btn-cetak', function() {
        var id_userid1 = $(this).data("iduserid");
        var tanggal1 = $(this).data("idtanggal");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_keterangan_tkk",
            type: "POST",
            data: {
                id_userid1: id_userid1,
                tanggal1: tanggal1
            },
            success: function(ajaxData) {
                var result = JSON.parse(ajaxData);
                $('#id-userid-modal1').val(id_userid1);
                $('#id-tanggal-modal1').val(tanggal1);
                $('#keterangan1').val(result[0]['keterangan']);
                $('#sampaiedit1').val(result[0]['tanggal']);
                $('#edit-modal1').modal('show');
                // $('#id-userid-modal').val(id_userid);
                // $('#keterangan').val(result[0]['keterangan']);
                // // $('#id-tanggal-modal').val(tanggal);
                // $('#edit-modal').modal('show');
            },
            error: function(status) {

            }
        });
    });

    $('#btn-simpan1').click(function() {
        var update_data = $('#form-edit1').serialize();
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/update_keterangan",
            type: "GET",
            data: update_data,
            success: function(ajaxData) {
                tampilkan1();
                $('#edit-modal1').modal('hide');
                swal({
                    title: 'Edit Keterangan Berhasil',
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

    function cetak_tkk() {
        mulai = $('#mulai1').val();
        DeptID = $('#DeptID').val();
        status_kepegawaian = "tkk";

        window.open("<?php echo base_url(); ?>CetakHarianController/index/" + DeptID + '/' + mulai +
            '/' + status_kepegawaian, '_blank');
    }
</script>