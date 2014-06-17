<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <link href="<?php echo base_url('assets/css/sticky-footer-navbar.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/bootstrap-responsive.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
 
       
       
   <title>Bölge Veterinerlik Hizmetleri Ltd.</title>
</head>

<body>
    <img id="main_logo" src="<?php echo base_url('assets/img/logo.png') ?>"></img>
    <div class="navbar navbar-default">     
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;  
            </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li id="home"><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
            <li id="about"><a href="<?php echo site_url('/main_page_controller/about'); ?>">Hakkımızda</a></li>
            <li id="contact"><a href="<?php echo site_url('/main_page_controller/contact_us'); ?>">İletişim</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li id="login"><a href="<?php echo site_url('/main_page_controller/login'); ?>">Veteriner Girişi</a></li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>