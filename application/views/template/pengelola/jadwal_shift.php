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
                    <h2>Jadwal Kerja</h2>
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

                <button type="button" id="hapus_row" name="btn_delall" class="btn btn-danger btn_delall">Deleted Selected Items</button>
                <br>

                <div class="x_content">
                    <div class="table responsive">
                        <table id="datashiftx" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="2%">
                                        <center>
                                            <input type="checkbox" id="checkall">
                                        </center>
                                    </th>
                                    <th width="2%">
                                        <center>No</center>
                                    </th>
                                    <th width="20%">
                                        <center>Nama Pegawai</center>
                                    </th>
                                    <th>
                                        <center>NIP</center>
                                    </th>

                                    <th width="10%">
                                        <center>Jam Masuk Kerja</center>
                                    </th>
                                    <th width="10%">
                                        <center>Jam Pulang Kerja</center>
                                    </th>
                                    <th width="15%">
                                        <center>Keterangan</center>
                                    </th>

                                    <th>
                                        <center>Status</center>
                                    </th>
                                    <th>
                                        <center>Aksi</center>
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

<!--------------------------------------- Modal Edit ------------------------------------ -->
<div class="modal inmodal" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-edit fa-4x "></i></center>
                <center>
                    <h4 class="modal-title">Edit Jam Kerja</h4>
                </center>
                <h4>
                    <center><small>Edit Detail Jam Kerja</small></center>
                </h4>
            </div>
            <form id="form-edit" class="form-horizontal form-label-left" onsubmit="return false;">
                <div class="modal-body">
                    <input type="hidden" id="id_shift-modal" name="id_shift">
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama Pegawai</label>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <input name="name-modal" readonly class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <?php if ($session['id_role'] == 6) { ?>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Mulai</label>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <div class="input-group date" id="mulaiedit">
                                    <input name="start_date-modal" class="form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Selesai</label>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <div class="input-group date" id="mulaiedit">
                                        <input name="end_date-modal" class="form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php
                    } ?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jadwal Shift Masuk</label>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <div class="input-group date" id="datetimepicker1">
                                    <input name="jam_masuk-modal" type="text" class="form-control input-small" id="timepicker1" value="07:30">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jadwal Shift Keluar</label>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <div class="input-group date" id="datetimepicker2">
                                    <input name="jam_keluar-modal" type="text" class="form-control input-small" id="timepicker2" value="16:00">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <select class="form-control" name="status-modal" id="sel1">
                                    <?php if ($session['id_role'] == 3) { ?>
                                        <option>SHIFT 1</option>
                                        <option>SHIFT 2</option>
                                        <option>SHIFT 3</option>
                                        <option>SHIFT 4</option>
                                    <?php
                                } else { ?>
                                        <option value="fullday">Fullday</option>
                                        <option value="enam_hari">Enam Hari</option>
                                        <option value="double_shift">Double Shift</option>
                                    <?php
                                } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <?php if ($session['id_role'] == 3) { ?>
                            <button type="submit" id="btn-simpan" class="btn btn-success">Simpan</button>
                        <?php
                    } else { ?>
                            <button type="submit" id="btn-simpan_sekolah" class="btn btn-success">Simpan</button>
                        <?php
                    } ?>
                    </div>
            </form>
        </div>
    </div>
</div>

<!----------------------------------------------- Modal Hapus ------------------------------ -

<div class="modal inmodal" id="hapus-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><i class="fa fa-trash fa-4x "></i></center>
                <center>
                    <h4 class="modal-title">Hapus Shift</h4>
                </center>
                <h4>
                    <center><small>Hapus Shift</small></center>
            </div>
            <form id="form-hapus" onsubmit="return false;">
                <input type="hidden" id="id-shift-hapus" name="id_shift">
                <input type="hidden" id="badgenumber-hapus" name="badgenumber">
                <div class="modal-body">
                    <h3>Apakah anda yakin menghapus shift ini ?</h3>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" id="hapus-member" class="btn btn-danger">Hapus</button>
                    <button type="submit" id="btn-hapus" class="btn btn-danger" >Hapus 2</button>
                </div>
            </form>
        </div>
    </div>
</div>
-->


<script type="text/javascript" language="javascript">
    $('#datashiftx').ready(function() {
        var c = $('#datashiftx').DataTable();

        function load_data() {
            $.ajax({

                url: '<?php echo site_url('PengelolaController/get_all_shift') ?>',
                dataType: "JSON",
                success: function(data) {
                    c.clear().draw();

                    for (var i = 0; i < data.length; i++) {
                        var check = '<input type="checkbox" name="btn_deleteall" id="' + data[i]['badgenumber'] + '" class="checkitem">';
                        var btn1 = '<button type="button" name="btn_edit" id="' + data[i]['id_shift'] + '" class="btn btn-xs btn-primary btn_edit"><span class="fa fa-edit fa-2x"></span></button>';
                        var btn2 = '<button type="button" name="btn_delete" id="' + data[i]['badgenumber'] + '" class="btn btn-xs btn-danger btn_delete"><span class="fa fa-trash fa-2x"></span></button>';

                        if (data[i]['status'] == "fullday") {
                            status = "Full Day";
                        } else if (data[i]['status'] == "enam_hari") {
                            status = "Enam Hari";
                        } else if (data[i]['status'] == "double_shift") {
                            status = "Double Shift";
                        } else {
                            status = data[i]['status'];
                        }

                        c.row.add([
                            "<center>" + check + "</center>",
                            "<center>" + [i + 1] + "</center>",
                            "<center>" + data[i]['nama_user'] + "</center>",
                            "<center>" + data[i]['badgenumber'] + "</center>",

                            "<center>" + data[i]['jam_masuk'] + "</center>",
                            "<center>" + data[i]['jam_keluar'] + "</center>",
                            "<center>" + data[i]['keterangan'] + "</center>",

                            "<center>" + status + "</center>",
                            "<center>" + btn1 + btn2 + "</center>",
                        ]).draw();
                    }
                }
            });
            $('#checkall').change(function() {
                $(".checkitem").prop("checked", $(this).prop("checked"))
            });
        }

        load_data();

        $(document).on("click", ".btn_delall", function() {
            $('#hapus_row').click(function() {
                var checkbox = $('.checkitem:checked');
                if (checkbox.length > 0) {

                    var badgenumber = [];
                    $(checkbox).each(function() {
                        badgenumber.push($(this).attr('id'));
                    });
                    swal({
                            title: "Hapus Shift",
                            text: "Apakah anda yakin akan menghapus data shift ini?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Hapus",
                            closeOnConfirm: true,
                        },
                        function() {
                            var join = badgenumber.join(",");
                            $.ajax({
                                url: "<?php echo site_url('PengelolaController/all_hapus_shift'); ?>",
                                method: "POST",
                                data: "ids=" + join,
                                success: function(data) {
                                    //oad_data();
                                    swal({
                                        title: "Data Berhasil Dihapus",
                                        text: "Data sudah terhapus",
                                        type: "success",
                                    });
                                    //load_data();
                                    window.location.reload(true);

                                }
                            });
                        });
                } else {
                    swal({
                        title: "Tidak ada data yang dihapus",
                        type: "warning",
                    });
                }
            })
        });

        $(document).on("click", ".btn_delete", function() {
            var badgenumber = $(this).attr('id');
            swal({
                    title: "Hapus Shift",
                    text: "Apakah anda yakin akan menghapus data shift ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    closeOnConfirm: true,
                },
                function() {
                    $.ajax({
                        url: "<?php echo site_url('PengelolaController/hapus_shift'); ?>",
                        method: "POST",
                        data: {
                            badgenumber: badgenumber
                        },
                        success: function(data) {
                            load_data();
                            swal({
                                title: 'Hapus Jam Kerja Berhasil',
                                text: '',
                                type: 'success'
                            });
                        }
                    });
                });
        });

        $('#btn-simpan').click(function() {
            var update_data = $('#form-edit').serialize();
            console.log(update_data);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/PengelolaController/update_detail_shift",
                type: "POST",
                data: update_data,

                //  dataType : 'json', //already make by datatype                 
                success: function(data) {
                    console.log("data");
                    load_data();
                    $('#edit-modal').modal('hide');
                    load_data();
                    swal({
                        title: 'Edit Jam Shift Berhasil',
                        text: '',
                        type: 'success'
                    });

                },
                error: function(status) {
                    swal({
                        title: 'Edit Jam Shift Gagal',
                        text: '',
                        type: 'danger'
                    });
                }
            });
        });

        $('#btn-simpan_sekolah').click(function() {
            var update_data = $('#form-edit').serialize();
            console.log(update_data);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/PengelolaController/update_jam_sekolah",
                type: "POST",
                data: update_data,

                //  dataType : 'json', //already make by datatype                 
                success: function(data) {
                    console.log("data");
                    load_data();
                    $('#edit-modal').modal('hide');
                    load_data();
                    swal({
                        title: 'Edit Jam Shift Berhasil',
                        text: '',
                        type: 'success'
                    });
                },
                error: function(status) {
                    swal({
                        title: 'Edit Jam Shift Gagal',
                        text: '',
                        type: 'danger'
                    });
                }
            });
        });


    });
</script>

<script>
    $('#datashiftx').on('click', '.btn_edit', function() {
        var id_shift = $(this).attr("id");

        //console.log(badgenumber);
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PengelolaController/get_detail_shift",
            type: "GET",
            data: {
                id_shift: id_shift

            },
            success: function(ajaxData) {
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
            error: function(status) {

            }
        });
    });
</script>

<script>
    $('#datetimepicker1').datetimepicker({
        format: 'HH:mm'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'HH:mm'
    });

    $('#mulaiedit').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#sampaiedit').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>