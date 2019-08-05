<script src="<?php echo base_url('assets'); ?>/vendors/ChartJs/dist/Chart.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendors/ChartJs/dist/Chart.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendors/ChartJs/dist/Chart.bundle.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendors/ChartJs/dist/Chart.bundle.min.js"></script>

<?php $date = date('Y'); ?>
<div class="row1">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Statistik Absensi Pegawai</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pegawai PNS</a></li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pegawai NON PNSD</a></li>
                    </ul>
                    <!----------------------------------------- start Pegawai PNS ---------------------------------------------------->
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="x_content" id="load"></div>
                            <div class="x_content">
                                <form id="form-tampil-pns" class="form-horizontal form-label-left" onsubmit="return false;">
                                    <div class="col-xs-12 col-sm-12 col-md-1">
                                        <label class="control-label">Tahun</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-2">
                                        <select class="form-control" id="tahun" name="tahun">
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
                                        <select class="form-control" id="bulan" name="bulan">
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
                                        <button type="submit" id="tampilkan_pns" onclick="tampilkan();" class="btn btn-primary">Tampilkan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="x_content" id="load-pns">
                                <hr>
                                <div class="col-12 col-md-6">
                                    <canvas id="stat-bulanan" width="600" height="400"></canvas>
                                    <a href="" class="btn btn-default btn_tampil" data-toggle="modal" data-target="#elegantModalForm">Check Details</a>
                                </div>

                                <div class="col-6 col-md-3">
                                    <label for="telat">TOP 5 Pegawai Telat <i class="fa fa-star-o"></i></label>
                                    <table id="pegawai_telat" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>NO</center>
                                                </th>
                                                <th width="60%">
                                                    <center>NAMA</center>
                                                </th>
                                                <th width="20%">
                                                    <center>JUMLAH</center>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label for="telat">TOP 5 Pegawai Tanpa Keterangan <i class="fa fa-star-o"></i></label>
                                    <!-- <h4>TOP 5 Pegawai Tanpa Keterangan <i class="fa fa-star"></i></h4> -->
                                    <table id="pegawai_tanpa_ket" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>NO</center>
                                                </th>
                                                <th width="60%">
                                                    <center>NAMA</center>
                                                </th>
                                                <th width="20%">
                                                    <center>JUMLAH</center>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="x_content">
                                <hr>
                                <div class="col-12 col-md-1"></div>
                                <div class="col-12 col-md-10">
                                    <canvas id="stat-tahunan" align="center"></canvas>
                                </div>
                                <div class="col-12 col-md-1"></div>
                            </div>
                            <!-- <div class="x_content">
                                    <div class="col-12 col-md-8">
                                        <canvas id="myChartAjax"></canvas>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <canvas id="myChartAjaxx"></canvas>
                                    </div>
                                </div> -->
                            <!-- end Pegawai PNS -->
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <!----------------------------------------- start Pegawai NON PNSD ---------------------------------------------------->
                            <div class="x_content" id="load"></div>
                            <div class="x_content">
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
                                    </div>
                                </form>
                            </div>
                            <div class="x_content">
                                <hr>
                                <div class="col-12 col-md-6">
                                    <canvas id="stat-bulanan1" width="600" height="400"></canvas>
                                    <a href="" class="btn btn-default btn_tampil" data-toggle="modal" data-target="#elegantModalForm1">Check Details</a>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label for="telat">TOP 5 Pegawai Telat <i class="fa fa-star-o"></i></label>
                                    <table id="tkk_telat" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th width="60%">
                                                    <center>Nama</center>
                                                </th>
                                                <th width="20%">
                                                    <center>Jumlah</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>1</center>
                                                </th>
                                                <th width="60%">
                                                    <center>JEMZ SUZURA</center>
                                                </th>
                                                <th width="20%">
                                                    <center>5</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>2</center>
                                                </th>
                                                <th width="60%">
                                                    <center>MIRZA EKA PUTRA</center>
                                                </th>
                                                <th width="20%">
                                                    <center>5</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>3</center>
                                                </th>
                                                <th width="60%">
                                                    <center>AMRI SANGUN</center>
                                                </th>
                                                <th width="20%">
                                                    <center>4</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>4</center>
                                                </th>
                                                <th width="60%">
                                                    <center>THEO VHALDINO</center>
                                                </th>
                                                <th width="20%">
                                                    <center>3</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>5</center>
                                                </th>
                                                <th width="60%">
                                                    <center>ADE WIRANATA PUTRA</center>
                                                </th>
                                                <th width="20%">
                                                    <center>2</center>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                                <div class="col-6 col-md-3">
                                    <label for="telat">TOP 5 Pegawai Tanpa Keterangan <i class="fa fa-star-o"></i></label>
                                    <table id="pegawai_tanpa_ket" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>No</center>
                                                </th>
                                                <th width="60%">
                                                    <center>Nama</center>

                                                </th>
                                                <th width="20%">
                                                    <center>Jumlah</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>1</center>
                                                </th>
                                                <th width="60%">
                                                    <center>BOYCASITO EGAMO</center>
                                                </th>
                                                <th width="20%">
                                                    <center>5</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>2</center>
                                                </th>
                                                <th width="60%">
                                                    <center>AMRI SANGUN</center>
                                                </th>
                                                <th width="20%">
                                                    <center>5</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>3</center>
                                                </th>
                                                <th width="60%">
                                                    <center>MAULANA OKTA RIZA</center>
                                                </th>
                                                <th width="20%">
                                                    <center>4</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>4</center>
                                                </th>
                                                <th width="60%">
                                                    <center>ANGGA PUTRI</center>
                                                </th>
                                                <th width="20%">
                                                    <center>3</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <center>5</center>
                                                </th>
                                                <th width="60%">
                                                    <center>MEILANDA DWI PUTRI</center>
                                                </th>
                                                <th width="20%">
                                                    <center>2</center>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="x_content">
                                <hr>
                                <div class="col-12 col-md-1"></div>
                                <div class="col-12 col-md-10">
                                    <canvas id="stat-tahunan1" align="center"></canvas>
                                </div>
                                <div class="col-12 col-md-1"></div>
                            </div>
                            <!----------------------------------------- End Pegawai NON PNSD ---------------------------------------------------->
                        </div>
                    </div>
                    <!----------------------------------------- Modal Details Pegawai PNS ---------------------------------------------------->
                    <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog-md">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-search fa-4x "></i></center>
                                    <center>
                                        <h4 class="modal-title">Detail Absensi Pegawai PNS</h4>
                                    </center>
                                    <h4>
                                        <center><small>Bulan Januari</small></center>
                                    </h4>
                                </div>
                                <form id="form-edit" onsubmit="return false;">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" id="id-userid" name="id_useridx" value="">
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="" actived>Hadir</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Telat</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Izin</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Sakit</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Tanpa
                                                Keterangan</button>
                                            <div id="list-surat2" class="table-responsive">
                                                <table id="datatable1" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">
                                                                <center>No</center>
                                                            </th>
                                                            <th width="15%">
                                                                <center>Nama</center>
                                                                </t>
                                                            <th width="15%">
                                                                <center>NIP</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Tanggal</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Masuk</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Pulang</center>
                                                            </th>
                                                            <th widt="10%">
                                                                <center>Telat</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Pulang Cepat</center>
                                                            </th>
                                                            <th>
                                                                <center>Keterangan</center>
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
                    <!----------------------------------------- End Modal Details Pegawai PNS ---------------------------------------------------->

                    <!----------------------------------------- Modal Details Pegawai NON PNSD ---------------------------------------------------->
                    <div class="modal fade" id="elegantModalForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog-md">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <center><i class="fa fa-search fa-4x "></i></center>
                                    <center>
                                        <h4 class="modal-title">Detail Absensi Pegawai Non PNSD</h4>
                                    </center>
                                    <h4>
                                        <center><small>Bulan Januari</small></center>
                                    </h4>
                                </div>
                                <form id="form-edit" onsubmit="return false;">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" id="id-userid" name="id_useridx" value="">
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Hadir</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Telat</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Izin</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Sakit</button>
                                            <button type="submit" id="print_pns2" onchange="Print_pns()" onclick="print_pns();" class="btn btn-default" style="">Tanpa
                                                Keterangan</button>
                                            <div id="list-surat2" class="table-responsive">
                                                <table id="datatable1" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">
                                                                <center>No</center>
                                                            </th>
                                                            <th width="15%">
                                                                <center>Nama</center>
                                                                </t>
                                                            <th width="15%">
                                                                <center>NIP</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Tanggal</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Masuk</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Pulang</center>
                                                            </th>
                                                            <th widt="10%">
                                                                <center>Telat</center>
                                                            </th>
                                                            <th width="10%">
                                                                <center>Pulang Cepat</center>
                                                            </th>
                                                            <th>
                                                                <center>Keterangan</center>
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
                    <!----------------------------------------- End Modal Details Pegawai NON PNSD ---------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    var ctx = document.getElementById('stat-tahunan').getContext('2d');

    var stat_tahunan = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: "Hadir",
                    data: [12, 19, 7, 8, 4, 3, 6, 4, 13, 8, 10, 10],
                    backgroundColor: 'rgba(52, 152, 219, 1)'
                }, {
                    label: "Telat",
                    data: [2, 3, 3, 5, 2, 1, 2, 4, 3, 5, 7, 5],
                    backgroundColor: 'rgba(246, 36, 89, 1)'
                }, {
                    label: "Sakit",
                    data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                    backgroundColor: 'rgba(154, 18, 179, 1)'
                }, {
                    label: "Izin",
                    data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                    backgroundColor: 'rgba(0, 181, 204, 1)'
                }, {
                    label: "Tanpa Keterangan",
                    data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                    backgroundColor: 'rgba(245, 229, 27, 1)'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Statistik Absensi Pegawai Tahun 2019'
                },
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        }

    );

    var ctx = document.getElementById('stat-tahunan1').getContext('2d');
    var stat_tahunan1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                label: "Hadir",
                link: "https://jsfiddle.net/blueagency/czw8htza/",
                data: [12, 19, 7, 8, 4, 3, 6, 4, 13, 8, 10, 10],
                backgroundColor: 'rgba(52, 152, 219, 1)'
            }, {
                label: "Telat",
                link: "https://jsfiddle.net/blueagency/czw8htza/",
                data: [2, 3, 3, 5, 2, 1, 2, 4, 3, 5, 7, 5],
                backgroundColor: 'rgba(246, 36, 89, 1)'
            }, {
                label: "Sakit",
                link: "https://jsfiddle.net/blueagency/czw8htza/",
                data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                backgroundColor: 'rgba(154, 18, 179, 1)'
            }, {
                label: "Izin",
                link: "https://jsfiddle.net/blueagency/czw8htza/",
                data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                backgroundColor: 'rgba(0, 181, 204, 1)'
            }, {
                label: "Tanpa Keterangan",
                link: "https://jsfiddle.net/blueagency/czw8htza/",
                data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                backgroundColor: 'rgba(245, 229, 27, 1)'
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Statistik Absensi Pegawai Tahun 2019'
            },
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script>

<script>
    //var loading_statistik = $('#loading-pns').html('<p class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i><p>');

    function chart_tahunan() {

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PersonalController/get_statistik_pegawai_tahunan",
            type: "GET",
            data: postData,

            success: function(ajaxData) {
                //load-pns
                var result = JSON.parse(ajaxData);
                console.log(result);

                var jumlahSakit = [];

                jumlah.push(result[0]['jlh_sakit'], result[0]['jlh_cuti'], result[0]['jlh_izin'], result[0]['jlh_tk'],
                    result[0]['jlh_tl'], result[0]['jlh_telat'], result[0]['jlh_cpt']);

                var ctxt = document.getElementById('stat-tahunan').getContext('2d');

                var dataSakit = {
                    label: 'Sakit',
                    data: [],
                    backgroundColor: 'rgba(52, 152, 219, 1)',
                    yAxisID: 'y-axis-sakit'
                };



                var stat_tahunan = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                                'Oktober', 'November', 'Desember'
                            ],
                            datasets: [{
                                label: "Hadir",
                                data: [12, 19, 7, 8, 4, 3, 6, 4, 13, 8, 10, 10],
                                backgroundColor: 'rgba(52, 152, 219, 1)'
                            }, {
                                label: "Telat",
                                data: [2, 3, 3, 5, 2, 1, 2, 4, 3, 5, 7, 5],
                                backgroundColor: 'rgba(246, 36, 89, 1)'
                            }, {
                                label: "Sakit",
                                data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                                backgroundColor: 'rgba(154, 18, 179, 1)'
                            }, {
                                label: "Izin",
                                data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                                backgroundColor: 'rgba(0, 181, 204, 1)'
                            }, {
                                label: "Tanpa Keterangan",
                                data: [2, 10, 5, 8, 2, 9, 4, 2, 5, 6, 8, 10],
                                backgroundColor: 'rgba(245, 229, 27, 1)'
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Statistik Absensi Pegawai Tahun 2019'
                            },
                            scales: {
                                xAxes: [{
                                    stacked: true
                                }],
                                yAxes: [{
                                    stacked: true
                                }]
                            }
                        }
                    }

                );
            }
        })
    }

    function rating() {
        var t = $('#pegawai_telat').DataTable({
            "searching": false,
            "paging": false,
            "info": false
        });

        var t1 = $('#pegawai_tanpa_ket').DataTable({
            "searching": false,
            "paging": false,
            "info": false
        });
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/PersonalController/get_pegawai_telat_tanpaKeterangan",
            type: "GET",
            data: postData,
            success: function(ajaxData) {
                t.clear().draw();
                t1.clear().draw();
                var result = JSON.parse(ajaxData);
                var byk_telat = result.banyak_telat;
                var byk_tk = result.banyak_tk;
                console.log(result);

                var obj = [];
                var objek = [];
                byk_telat.forEach(function(value, index) {
                    var obj_res = {
                        nama_pegawai: value.nama_pegawai,
                        jlh_telat: value.jlh_telat
                    };
                    obj.push(obj_res);
                });

                byk_tk.forEach(function(value, index) {
                    var obj_res = {
                        nama_pegawai: value.nama_pegawai,
                        jlh_tk: value.jlh_tk
                    };
                    objek.push(obj_res);
                });


                for (var i = 0; i < obj.length; i++) {
                    t.row.add([
                        "<center>" + [i + 1] + "</center>",
                        "<center>" + obj[i]['nama_pegawai'] + "</center>",
                        "<center>" + obj[i]['jlh_telat'] + "</center>",
                    ]).draw();
                }

                for (var i = 0; i < objek.length; i++) {

                    t1.row.add([
                        "<center>" + [i + 1] + "</center>",
                        "<center>" + objek[i]['nama_pegawai'] + "</center>",
                        "<center>" + objek[i]['jlh_tk'] +
                        "</center>",
                    ]).draw();


                }

            },
            error: function(status) {

            }
        });

    }

    function tampilkan() {

        postData = $('#form-tampil-pns').serialize();
        var chartBulan = $('#stat-bulanan');
        //
        $.ajax({
            url: '<?php echo site_url('PersonalController/get_statistik_pegawai_bulanan') ?>',
            type: "GET",
            data: postData,

            success: function(ajaxData) {
                //load-pns
                var result = JSON.parse(ajaxData);
                console.log(result);

                var jumlah = [];

                jumlah.push(result[0]['jlh_sakit'], result[0]['jlh_cuti'], result[0]['jlh_izin'], result[0][
                    'jlh_tk'
                ], result[0]['jlh_tl'], result[0]['jlh_telat'], result[0]['jlh_cpt']);

                var ctx = document.getElementById('stat-bulanan').getContext('2d');

                var stat_bulanan = new Chart(ctx, {
                    responsive: true,
                    type: 'doughnut',
                    data: {
                        labels: ['Sakit', 'Cuti', 'Izin', 'Tanpa Keterangan', 'Tugas Lain', 'Telat',
                            'Pulang Cepat'
                        ],
                        datasets: [{
                            data: [jumlah[0], jumlah[1], jumlah[2], jumlah[3], jumlah[4],
                                jumlah[5], jumlah[6], jumlah[7]
                            ],
                            backgroundColor: [
                                'rgba(52, 152, 219, 1)',
                                'rgba(246, 36, 89, 1)',
                                'rgba(154, 18, 179, 1)',
                                'rgba(38, 194, 129, 1)',
                                'rgba(245, 229, 27, 1)',
                                'rgba(103, 128, 159, 1)',
                                'rgba(241, 90, 34, 1)',
                                'rgba(103, 128, 159, 1)',
                            ],
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Statistik Absensi Pegawai Bulan Januari'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                rating();
                // chart_tahunan();
            }

        })
        //

    };


    function tampilkan1() {
        postData = $('#form-tampil-tkk').serialize();
        var chartBulan = $('#stat-bulanan1');

        $.ajax({
            url: '<?php echo site_url('PersonalController/get_statistik_tkk_bulanan') ?>',
            type: "GET",
            data: postData,
            /*
            beforeSend: function () {
                loading_.show();
                $('#load-pns').hide();
                t.clear().draw();
            },
            */
            success: function(ajaxData) {
                //load-pns
                var result = JSON.parse(ajaxData);
                console.log(result);

                var jumlah = [];

                jumlah.push(result[0]['jlh_sakit'], result[0]['jlh_cuti'], result[0]['jlh_izin'], result[0][
                    'jlh_tk'
                ], result[0]['jlh_tl'], result[0]['jlh_telat'], result[0]['jlh_cpt']);

                var ctx = document.getElementById('stat-bulanan1').getContext('2d');
                var stat_bulanan = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Sakit', 'Cuti', 'Izin', 'Tanpa Keterangan', 'Tugas Lain', 'Telat',
                            'Pulang Cepat'
                        ],
                        datasets: [{
                            data: [jumlah[0], jumlah[1], jumlah[2], jumlah[3], jumlah[4],
                                jumlah[5], jumlah[6], jumlah[7]
                            ],
                            backgroundColor: [
                                'rgba(52, 152, 219, 1)',
                                'rgba(246, 36, 89, 1)',
                                'rgba(154, 18, 179, 1)',
                                'rgba(38, 194, 129, 1)',
                                'rgba(245, 229, 27, 1)',
                                'rgba(103, 128, 159, 1)',
                                'rgba(241, 90, 34, 1)',
                                'rgba(103, 128, 159, 1)',
                            ],
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Statistik Absensi Pegawai Bulan Januari'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        })
    };
</script>