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
              <li id ="home"><a href="<?php echo  site_url('/user_page_controller'); ?>">Anasayfa</a></li>
              <li class="dropdown" id="customerList">
                <a href="#" 
                   class="dropdown-toggle" data-toggle="dropdown">Müşteri<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('/customer_controller/listpage/1'); ?>">Müşteri Listesi</a></li>
                    <li><a href="<?php echo site_url('/customer_controller/customeradd'); ?>">Müşteri Ekle</a></li>
<!--                    <li><a href="<?php echo site_url('/customer_controller/customersearch'); ?>">Müşteri Ara</a></li>-->
                </ul>
              </li>
              <li id="animal"><a href="<?php echo site_url('/animal_controller/listpage/1'); ?>">Hayvanlar</a></li>
              <li id="financal"><a href="<?php echo site_url('/financial_controller'); ?>">Finansal</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a hrer="#"><?php echo $this->session->userdata('name')." ";
                       echo $this->session->userdata('surname'); ?>
            </a></li>
            <li><a href="<?php echo site_url('/user_page_controller/logout')?>">Çıkış</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>