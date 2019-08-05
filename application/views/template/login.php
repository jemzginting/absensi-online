<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign In | Absensi Online </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets'); ?>/css/custom.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/style.css"> -->

</head>

<body class="login">
    <!-- <nav class="navbar navbar-expand-lg" id="ftco-navbar">
      <div class="container">
          <a class="navbar-brand1" href="index.html"><img style="padding-top:20px; width: 100%; height: auto;" src="<?php echo base_url('assets'); ?>/images/prouds2.png"></a>
        
        <div class="collapse navbar-collapse" id="ftco-nav">
           <ul class="navbar-nav ml-auto">
              <a class="navbar-brand1" href="index.html"><img style="padding-top:20px; " src="<?php echo base_url('assets'); ?>/images/logo_telkomsigma_trusted-IT-company_official1.png"></a>
          </ul>
        </div>
      </div>
    </nav> -->

    <div class="container">
        <div class="gallery">
            <a target="_blank" href="#">
                <img src="<?php echo base_url('assets'); ?>/images/Palembang_CoA_svg.png" alt="Cinque Terre" style="display:block; margin:auto; ">
            </a>
        </div>
        <!-- <div class="col-sm-4 col-sm-offset-2 col-xs-offset-2" style="padding-top: 10px;">
        <div class="gallery">
          <a target="_blank" href="<?php echo base_url('assets'); ?>/images/prouds2.png">
            <img src="<?php echo base_url('assets'); ?>/images/logo_telkomsigma_trusted-IT-company_official1.png" alt="Cinque Terre">
          </a>          
        </div>
      </div> -->
    </div>

    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('SignIn'); ?>
                    <form>
                        <div class="form-group">
                            <h3 style="color:#000; font-size: 55px; font-family: Arial;">Sign In</h3>
                            <!-- Pilihan 1 -->
                            <!--                 <div class="col-md-12 col-sm-6 col-xs-12">
                  <p style="color: #000; padding-top: 10px; font-size: 14px;">Email for Internal & User ID for external</p>
                </div> -->

                            <!-- Pilihan 2 -->
                            <!--                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <p style="color: #000; padding-top: 10px; font-size: 14px;" align="left">*Email for Internal</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p style="color: #000; padding-top: 10px; font-size: 14px;" align="right">*User ID for external</p>
                </div> -->

                            <!-- Pilihan 3 -->
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <p style="color: #000; padding-top: 10px;font-size: 14px;" align="left"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" style="font-size: 12pt;" class="form-control col-md-12 col-sm-12 col-xs-12" placeholder="Username" name="username" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="password" style="font-size: 12pt;" class="form-control col-md-12 col-sm-12 col-xs-12" placeholder="Password" name="password" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <button type="submit" style="height: 60px; background-color: #f44336; color: #fff; width: 100%; font-size: 14pt;" class="btn1 btn-default submit">Sign In </button>
                            </div>
                        </div>
                        <p align="center" style="color: #000000;">Dont have an account?<a href="#" style="color: red;"> Contact IT Team BKPSDM</a></p>
                        <br>
                        <p align="center" style="color: #000000; font-size: 16pt;">Absensi Online Pemerintah Kota Palembang</p>

                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

<script>
</script>

</html>