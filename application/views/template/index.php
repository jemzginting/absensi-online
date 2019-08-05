<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Absensi Pemkot Palembang</title>
    <link rel="icon" href="<?php echo base_url('assets'); ?>/images/pemkot.jpg" type="image/gif">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('assets'); ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="<?php echo base_url('assets'); ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets'); ?>/css/custom.css" rel="stylesheet">

    <link href="<?php echo base_url('assets'); ?>/vendors/simple-responsive-timeline/css/timeline-style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo base_url('assets'); ?>/vendors/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/js/bootstrap.js"></script>
    <!-- Font Awesome -->
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets'); ?>/js/moment/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/datepicker/daterangepicker.js"></script>

    <!-- Bootstrap datepicker-->
    <link href="<?php echo base_url('assets'); ?>/js/moment/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets'); ?>/js/moment/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap datetimepicker-->
    <link type="text/css" href="<?php echo base_url('assets'); ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <link type="text/css" href="<?php echo base_url('assets'); ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" />
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Datatables -->
    <link href="<?php echo base_url('assets'); ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <!-- <script src="<?php echo base_url('assets'); ?>/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script> -->

    <!-- Autosize -->
    <script src="<?php echo base_url('assets'); ?>/vendors/autosize/dist/autosize.min.js"></script>

    <!-- Switchery -->
    <link href="<?php echo base_url('assets'); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets'); ?>/vendors/switchery/dist/switchery.min.js"></script>

    <!-- Sweetalert -->
    <link href="<?php echo base_url('assets'); ?>/vendors/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="<?php echo base_url('assets'); ?>/vendors/sweetalert/sweetalert.min.js"></script>

    <!-- FastClick -->
    <script src="<?php echo base_url('assets'); ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.js"></script>

    <!-- validator -->
    <script src="<?php echo base_url('assets'); ?>/vendors/jquery-validate/jquery.validate.min.js"></script>
    <!-- QRCode -->
    <!-- <script src="<?php echo base_url('assets'); ?>/vendors/qrcode-scanner/instascan.min.js"></script> -->
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <?php echo $navigation; ?>
            </div>

            <!-- top navigation -->

            <div>
                <?php echo $top_navigation; ?>
                <!-- /top navigation -->
            </div>

            <!-- page content -->
            <div class="right_col" role="main">
                <?php echo $content; ?>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Absensi Online Pemkot Palembang - Developer by Team IT BKPSDM Palembang
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- Chart.js -->
    <script src="<?php echo base_url('assets'); ?>/vendors/Chartjs/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('assets'); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('assets'); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets'); ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('assets'); ?>/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('assets'); ?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('assets'); ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('assets'); ?>/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets'); ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- Multiple Select -->
    <script src="<?php echo base_url('assets'); ?>/vendors/selectize/dist/js/standalone/selectize.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/vendors/selectize/dist/css/selectize.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/vendors/selectize/dist/css/selectize.bootstrap3.css">

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets'); ?>/js/custom.min.js"></script>

</body>

</html>