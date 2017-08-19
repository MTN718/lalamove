<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('home'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Lala</b>Move</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="<?php echo site_url('login/logout'); ?>">Sign out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <div class="user-panel">
        <div class="pull-left image">
            <?php if (empty($data['adminNameInfo']->PERSON_IMAGE_URL)) { ?>
              <img class="profile-user-img img-responsive" src="<?php echo base_url(); ?>images/profile_img.jpg"
                   alt="User profile picture" height="45px;">
            <?php } else { ?>
              <img class="profile-user-img img-responsive"
                   src="<?php echo base_url(); ?>images/<?php echo $data['adminNameInfo']->PERSON_IMAGE_URL; ?>"
                   alt="User profile picture" height="45px;">
            <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $data['adminNameInfo']->FIRST_NAME; ?> <?php echo $data['adminNameInfo']->LAST_NAME; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
          <?php echo($data['pageName'] == "DASHBOARD" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "ACCOUNT" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/account">
          <i class="fa fa-user"></i> <span>Account</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "NOTIFICATIONS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/notifications">
          <i class="fa fa-bell-o"></i> <span>Notifications</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "CUSTOMERS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/customers">
          <i class="fa fa-users"></i> <span>Customers</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "DRIVERS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/drivers">
          <i class="fa fa-users"></i> <span>Drivers</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "BUSINESSLISTERS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/businesslisters">
          <i class="fa fa-users"></i> <span>Business Listers</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "VEHICLES" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/vehicle">
          <i class="fa fa-car"></i> <span>Vehicles</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "VEHICLESTYPE" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/vehicleType">
          <i class="fa fa-car"></i> <span>Vehicle Type</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "ADDITIONALSERVICES" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/additionalServices">
          <i class="fa fa-car"></i> <span>Additional Services</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "ORDERS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/orders">
          <i class="fa fa-shopping-cart"></i> <span>Orders</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "INVOICES" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/invoices">
          <i class="fa fa-credit-card"></i> <span>Invoices</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "PAYMENTS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/payments">
          <i class="fa fa-credit-card"></i> <span>Payments</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "DISCOUNTS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/discounts">
          <i class="fa fa-percent"></i> <span>Discounts</span>
        </a>
        </li>
          <?php echo($data['pageName'] == "SETTINGS" ? "<li class='active'>" : "<li>"); ?>
        <a href="<?php echo base_url(); ?>index.php/home/settings">
          <i class="fa fa-cogs"></i> <span>Settings</span>
        </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>