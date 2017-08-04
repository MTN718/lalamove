<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Lalamove</title>
<link href="http://fonts.googleapis.com/css?family=Noto+Sans:700,400,400i,700i" rel="stylesheet">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css">

<!-- Plugin CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css" type="text/css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css">




<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top">
<nav id="mainNav" class="navbar navbar-default navbar-static-top mainheader">
  <div class="container-fluid navbody">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header row">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="col-sm-12 col-md-3"> <a class="navbar-brand page-scroll mob_menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" type="button"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo"></a> <a class="navbar-brand page-scroll screen" href="<?php echo site_url('home/index'); ?>"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo"></a> <a class="navbar-brand page-scroll strick" href="<?php echo site_url('home/index'); ?>"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo"></a> </div>
      <div class="col-sm-12 col-md-9 mobPanelCss">
        <div class="collapse navbar-collapse smalltog" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"> <a class="page-scroll" href="<?php echo site_url('home/index'); ?>" class="signintab">Home</a> </li>
            <li> <a class="page-scroll" href="<?php echo site_url('home/business'); ?>">Business</a> </li>
            <li> <a class="page-scroll" href="<?php echo site_url('user/driver'); ?>">Driver</a> </li>
            <li> <a class="page-scroll" href="<?php echo site_url('home/how_it_work'); ?>">How It Works</a> </li>
            <li> <a href="<?php echo site_url('home/pricing'); ?>" >Pricing</a> </li>
            <li> <a href="<?php echo site_url('home/bangkok'); ?>" >Bangkok</a>
            <ul class="dropdown">
            <li> <a href="<?php echo site_url('home/bangkokdrop'); ?>" >Bangkok</a>
            <li> <a href="<?php echo site_url('home/hongkong'); ?>" >Hong Kong</a>
            <li> <a href="<?php echo site_url('home/manila'); ?>" >Manila</a>
            <li> <a href="<?php echo site_url('home/singapore'); ?>" >Singapore</a>
            </ul>
             </li>
            <!-- <li class="hs-menu-quote"><a href="<?php echo site_url('user/register'); ?>" target="_blank">Instant Quote</a></li> -->
            <li class="hs-menu-quote"><a href="<?php echo site_url('home/instantquote'); ?>" target="_blank">Instant Quote</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- /.navbar-collapse -->

  </div>
  <!-- /.container-fluid -->
</nav>
