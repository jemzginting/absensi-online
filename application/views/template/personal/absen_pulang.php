<div class="">
    <div class="page-title">
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Absen Pulang</h2>
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
                    <form id="demo-form2" method="POST" action="<?php echo site_url('PersonalController/submit_absen_pulang'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" style="text-align: left;" for="nama"><span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo $session['nama_staff']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" style="text-align: left;" for="nama"><span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php if ($checkinout == 0) { ?>
                                <p>Anda Belum Melakukan Absen</p>
                                <?php 
                              } else { ?>
                                <p>Anda Telah Melakukan Absen Pada Jam <?php echo $jam; ?></p>
                                <?php 
                              } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-3 col-xs-12" style="text-align: left;" for="jam"><span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p id="time"></p>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" id="b_absen">
                                <button type="submit" class="btn btn-info">Absen</button>
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
        var checkinout = '<?= $checkinout; ?>';
        if (checkinout == 1) {
            $('#b_absen').hide();
        }
    });
</script>

<script>
    var timestamp = '<?= time(); ?>';

    function updateTime() {
        $('#time').html(Date(timestamp));
        timestamp++;
    }
    $(function() {
        setInterval(updateTime, 1000);
    });
</script> 