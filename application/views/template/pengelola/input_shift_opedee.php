        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Jadwal Shift</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" onload="setDefault()">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Shift</h2>
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
                        <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <label class="control-label">Periode Jadwal Shift</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-1">
                                    <label class="control-label">Mulai</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <input id="mulai" name="mulai" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-1">
                                    <label class="control-label">Sampai</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <input id="sampai" name="sampai" class="date-picker form-control col-md-3 col-xs-6 has-feedback-left" required="required" type="text">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <button type="submit" value="clear" id="setUlang" class="btn btn-primary">Set
                                        Ulang</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <label class="control-label">Jam Shift</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-1">
                                    <label class="control-label">Mulai</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input id="timepicker1" type="text" class="form-control" name=time_masuk value="08:00">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-1">
                                    <label class="control-label">Sampai</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input id="timepicker2" type="text" class="form-control" name=time_pulang value="15:00">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pilih
                                    Pegawai</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="select-to" title="Pilih Pegawai" name="nip[]" required></select>
                                </div>
                                <a href="javascript:document.getElementById('select-to').selectize.selectall();" class="btn btn-link" style="font-size:12px">
                                    Pilih Semua
                                </a>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="sel1" name="status">
                                        <option value="0" class="ramadhan">RAMADHAN</option>
                                        <option value="1">OPD NON SHIFT</option>
                                        <option value="2">RSUD BARI</option>
                                        <option value="3">PUSKESMAS</option>
                                        <option value="4">SHIFT 1</option>
                                        <option value="5">SHIFT 2</option>
                                        <option value="6">SHIFT 3</option>
                                        <option value="7">SHIFT 4</option>
                                    </select>
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
                                        (item.name ?
                                            '<span class="text-black">Nama : ' + escape(
                                                item.name) + '</span><br>' : '') +
                                        (item.badgenumber ? escape(item.badgenumber) :
                                            '') +
                                        '</div>';
                                },
                                option: function(item, escape) {
                                    var label = item.name || item.badgenumber;
                                    var caption = item.name ? item.badgenumber : null;
                                    return '<div>' +
                                        '<span class="text-black">Nama : ' + escape(
                                            label) + '</span><br>' +
                                        (caption ? escape(caption) : '') +
                                        '</div>';
                                }
                            },
                        });
                    },
                });
            });

            $(document).ready(function() {
                $(".delete").hide();
                //when the Add Field button is clicked
                $("#btnAdd").click(function(e) {
                    $(".delete").fadeIn("1500");
                    //Append a new row of code to the "#items" div
                    $("#items").append(
                        '<div class="next-referral col-4"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_shift">Jam Shift</label><div class="col-md-6 col-sm-6 col-xs-12"><input type="text" class="form-control timepicker" id="Timepicker" name="Timepicker" required="required"></div></div>'
                    );
                });
                $("body").on("click", ".delete", function(e) {
                    $(".next-referral").last().remove();
                });
            });

            //-----------------Selectize multiple select all-----------------
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
                var insert_data = $('#demo-form2').serialize();
                console.log(insert_data);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/PengelolaController/submit_shift",
                    type: "POST",
                    data: insert_data,
                    success: function(data) {
                        swal({
                            title: "Tambah Jam Shift Berhasil",
                            type: "success",
                            closeOnConfirm: true,
                        });
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $('#setUlang').click(function(e) {
                e.preventDefault();
                document.getElementById("mulai").value = "";
                document.getElementById("sampai").value = "";
                document.getElementById("timepicker1").value = "08:00";
                document.getElementById("timepicker2").value = "15:00";
                var $select = $('#select-to').selectize();
                var selecTize = $select[0].selectize;
                selecTize.clear(true);
                document.getElementById("sel1").value = "0";

            });
        </script>
        <script>
            window.onload = setDefault();

            function setDefault() {
                if (document.getElementById("sel1").value = "0") {
                    $('#timepicker1').prop("disabled", true);
                    $('#timepicker2').prop("disabled", true);
                }
            }
        </script>
        <script>
            $(document).ready(function() {
                $('#sel1').change(function() {
                    if ($(this).val() == 0) {
                        $('#timepicker1').prop("disabled", true);
                        $('#timepicker2').prop("disabled", true);
                        document.getElementById("timepicker1").value = "08:00";
                        document.getElementById("timepicker2").value = "15:00";
                    } else if ($(this).val() == 1) {
                        $('#timepicker1').prop("disabled", true);
                        $('#timepicker2').prop("disabled", true);
                        document.getElementById("timepicker1").value = "07:30";
                        document.getElementById("timepicker2").value = "16:00";
                    } else {
                        $('#timepicker1').prop("disabled", false);
                        $('#timepicker2').prop("disabled", false);
                        document.getElementById("timepicker1").value = "07:30";
                        document.getElementById("timepicker2").value = "16:00";
                    }
                });
            });

            //-----------------datetimepicker-----------------
            $(document).ready(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'HH:mm'
                });
                $('#datetimepicker2').datetimepicker({
                    format: 'HH:mm'
                });
            });

            //-----------------daterangepicker-----------------
            $('#mulai').daterangepicker({
                singleDatePicker: true,
                format: "YYYY-MM-DD",
                calender_style: "picker_3"
            }, function(start, end, label) {
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
        </script>