<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Lalamove</title>
<link href="//fonts.googleapis.com/css?family=Noto+Sans:700,400,400i,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css" type="text/css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable.css" type="text/css">

<!-- Plugin CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css" type="text/css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/map.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/error.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.datetimepicker.css" type="text/css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"> -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

   <style type="text/css">       
      #map {
        height: 100%;
      }
</style>
</head>

<body>
<!-- top header  -->
<header id="header">
  <div>
    <div class="logo-ctn"> <a class="logo-link" href="/" target="_self"> <img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=" " width="176" height="40"> </a> </div>
    <div id="header-menu-ctn">
      <div id="tutorial-ctn"> <a id="tutorial" class="header-menu-btn cursor-ptr dft-gry"> Tutorial </a> </div>
      
      <div id="user-profile-ctn" class="dropdown"> <a id="user-profile" class="header-menu-btn cursor-ptr dft-gry dropdown-toggle"  href="#" class="" data-toggle="dropdown"> 
      <span id="user-profile-name" class="ellipsis">Guest</span> 
      <span id="user-login-name" class="ellipsis hide user-name-login"><?php if($this->session->userdata('name')){ echo $this->session->userdata('name'); }else { } ?></span> 
      <span class="down-arrow-icon"></span> </a>
        <ul class="dropdown-menu" role="menu">
            <li id="show-user-wallet" class="wallet hide"><a class="user-profile-icon cursor-ptr" href="#" style="margin-left: -20px;">Wallet</a></li>
            <li class="logout-header account hide">
            <a id="profile-settings" href="#model-account" class="user-profile-icon cursor-ptr account_click hidden-link" data-toggle="modal"> Account </a>
            </li>
            <li class="logout-header settings hide">

            <a  href="#model-settings" class="user-profile-icon fa fa-wrench cursor-ptr settings_click" data-toggle="modal"> <i style="font-size:16px;margin-left:-1.7rem" class="glyphicon glyphicon-wrench"></i> &nbsp;&nbsp;&nbsp;Settings</a>
            </li>
            <li><a id="about-us" class="user-profile-icon cursor-ptr"> About Us </a></li>
            <li class="logout-header logout hide"><!-- <a href="<?= base_url('user/logout') ?>">Logout</a> -->
<a id="user-signout" class="user-profile-icon cursor-ptr" href="<?= base_url('user/logout') ?>"> Sign Out </a>
            </li>
            <li class="login-header login"><a id="user-signin" class="user-profile-icon cursor-ptr user_signin"  href="#model-signIn" data-toggle="modal"> Sign In </a></li>
        </ul>
      </div>
      
      <!-- user sign in panel -->
      <div id="model-signIn" class="modal fade ogBox mybulletPanel login-text" tabindex="-1" role="dialog"></div>

      <div id="model-account" class="modal fade ogBox mybulletPanel account-text" tabindex="-1"  role = "dialog"></div>

      <div id="model-changePassword" class="modal fade ogBox mybulletPanel changePassword-text" tabindex="-1"  role = "dialog"></div>

      <div id="model-settings" class="modal fade ogBox mybulletPanel settings-text" tabindex="-1"  role = "dialog"></div>

      
      <!-- forget password -->
      <div id="model-forget" class="modal fade ogBox mybulletPanel forgot_modal" tabindex="-1" role="dialog">

      </div>
          
      <!-- Sign up panel -->
      <div id="model-signUp" class="modal fade ogBox mybulletPanel registration-text" tabindex="-1" role="dialog">
      
      </div>     
 
      
      <!-- city language -->
      <div id="city-and-language-ctn">
        <div id="language-picker-ctn">
          <ul id="language-picker">
            <li> <a class="language-link cursor-ptr dft-gry" href="#"> <span id="language-name">EN</span> </a> </li>
            <li> <span class="seperator">|</span> </li>
            <li> <a class="language-link cursor-ptr dft-gry" href="#"> <span id="language-name">中文</span> </a> </li>
          </ul>
        </div>
        <!-- <li class="logout-header lgt-cls" ><a href="<?= base_url('user/logout') ?>">Logout</a></li> -->
      <div id="city-picker-ctn" class="dropdown"> 
          <a id="city-picker1" class="header-menu-btn cursor-ptr dft-gry dropdown-toggle <?php if(isset($class_name)) { echo $class_name; }else{ echo "bkk-link"; } ?>" href="#" data-toggle="dropdown"> 
            <span id="country-name"><?php if(isset($country_name)){ echo $country_name; }else{ echo "Bangkok"; 
            } ?></span><span class="down-arrow-icon"></span> 
          </a>
        <div class="header-menu-box dft-menubox dropdown-menu" role="menu" style="width: 235px;"> 
          <a id="bkk-link" class="country-header-link dft-gry cursor-ptr bkk-link" href="<?= base_url('home/bangkok') ?>" target="_self"> Bangkok </a> 
          <a id="hk-link" class="country-header-link dft-gry cursor-ptr hk-link" href="<?= base_url('home/hongkong') ?>" target="_self"> Hong Kong </a> 
          <a id="ph-link" class="country-header-link dft-gry cursor-ptr ph-link" href="<?= base_url('home/manila') ?>" target="_self"> Manila </a>
          <a id="sg-link" class="country-header-link dft-gry cursor-ptr sg-link" href="<?= base_url('home/singapore') ?>" target="_self"> Singapore </a>
          <a id="tp-link" class="country-header-link dft-gry cursor-ptr tp-link" href="<?= base_url('home/taipei') ?>" target="_self"> Taipei </a>
        </div>
      </div>

      </div>
      <!--   <select class="selectpicker">
          <option><a id="bkk-link" class="country-header-link dft-gry cursor-ptr bkk-link" href="<?= base_url('home/bangkok') ?>" target="_self"> Bangkok </a> </option>
          <option>Ketchup</option>
          <option>Relish</option>
        </select> -->
        <!-- <div id="tutorial-ctn" class="lgt-cls-hide"> <a class="header-menu-btn cursor-ptr dft-gry" href="<?= base_url('user/logout') ?>" id="tutorial"> Logout </a> </div> -->
    </div>
  </div>
</header>

<div class="alert alert-success suc-alert" id="success-alert" style="display: none;">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    You have successfully logged in
</div>

<div class="alert alert-success suc-alert" id="success-order-alert" style="display: none;">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    Your order is placed successfully
</div>