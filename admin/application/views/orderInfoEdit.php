      <!--

      KARYON SOLUTIONS CONFIDENTIAL
      __________________

        Author : Ashwin Choudhary
        Url - http://www.karyonsolutions.com
        [2016] - [2017] Karyon Solutions
        All Rights Reserved.

      NOTICE:  All information contained herein is, and remains
      the property of Karyon Solutions and its suppliers,
      if any.  The intellectual and technical concepts contained
      herein are proprietary to Karyon Solutions
      and its suppliers and may be covered by Indian and Foreign Patents,
      patents in process, and are protected by trade secret or copyright law.
      Dissemination of this information or reproduction of this material
      is strictly forbidden unless prior written permission is obtained
     from Karyon Solutions.
    -->
    <style type="text/css">
        .dropdown-menu {
            position: unset;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: unset;
            min-width: 148px;
        }
        .dropdown-menu .divider {
            margin: 4px 0;
        }
        .select2-selection {
            border: none !important;
            background: none !important;
        }
        .select2-container {
            width: 60% !important;
        }
        .select2-selection--single {
            padding: 0px 12px 0px 0px !important;
            height: unset !important;
        }
        .select2-selection__arrow {
            height: 17px !important;
        }

    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
            Order
            <small>Order#00<?php if(!empty($data['orderInfo']->ORDER_ID)) echo $data['orderInfo']->ORDER_ID; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">View Order</li>
        </ol>
    </section>    

    <!-- Main content -->
    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <div style="text-align: center;">
                    <img src="<?php echo base_url(); ?>images/logo.png">
                </div>
                <h2 class="page-header" style="margin: -15px 0 20px 0;">
                    <i class="fa fa-globe"></i>LalaMove
                    <?php
                    $orderdate = strtotime ( $data['orderInfo']->ORDER_DATE ) ;
                    $orderdate = date ( 'd-M-Y' , $orderdate );
                    ?>
                    <small class="pull-right">Order Date: <?php echo $orderdate; ?></small>
                </h2>
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <span style="color: #f86634;font-weight: 600;font-size: 18px;">CUSTOMER:</span>
                <address>
                    <strong>
                        <?php if (!empty($data['customerNameInfo']->FIRST_NAME)) echo $data['customerNameInfo']->FIRST_NAME; ?>
                        &nbsp;<?php if (!empty($data['customerNameInfo']->LAST_NAME)) echo $data['customerNameInfo']->LAST_NAME; ?>
                    </strong><br>
                    <?php if (!empty($data['customerAddressInfo']->ADDRESS1)) echo $data['customerAddressInfo']->ADDRESS1; ?>,
                    <?php if (!empty($data['customerAddressInfo']->ADDRESS2)) echo $data['customerAddressInfo']->ADDRESS2; ?><br>
                    <?php if (!empty($data['customerAddressInfo']->CITY)) echo $data['customerAddressInfo']->CITY; ?>,
                    <?php if (!empty($data['customerAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['customerAddressInfo']->STATE_PROVINCE_GEO_ID; ?>
                    ,
                    <?php if (!empty($data['customerAddressInfo']->POSTAL_CODE)) echo $data['customerAddressInfo']->POSTAL_CODE; ?><br>
                    Phone: <?php if (!empty($data['customerTelecomInfo']->MOBILE_NUMBER)) echo $data['customerTelecomInfo']->MOBILE_NUMBER; ?><br>
                    Email: <?php if (!empty($data['customerEmailInfo']->INFO_STRING)) echo $data['customerEmailInfo']->INFO_STRING; ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <span style="color: #f86634;font-weight: 600;font-size: 18px;">DRIVER:</span>
                <address>
                <?php if(!empty($data['driverNameInfo'])) { ?>
                    <strong>
                        <?php if (!empty($data['driverNameInfo']->FIRST_NAME)) echo $data['driverNameInfo']->FIRST_NAME; ?>
                        &nbsp;<?php if (!empty($data['driverNameInfo']->LAST_NAME)) echo $data['driverNameInfo']->LAST_NAME; ?>
                    </strong><br>
                    <?php if (!empty($data['driverAddressInfo']->ADDRESS1)) echo $data['driverAddressInfo']->ADDRESS1; ?>,
                    <?php if (!empty($data['driverAddressInfo']->ADDRESS2)) echo $data['driverAddressInfo']->ADDRESS2; ?><br>
                    <?php if (!empty($data['driverAddressInfo']->CITY)) echo $data['driverAddressInfo']->CITY; ?>,
                    <?php if (!empty($data['driverAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['driverAddressInfo']->STATE_PROVINCE_GEO_ID; ?>
                    ,
                    <?php if (!empty($data['driverAddressInfo']->POSTAL_CODE)) echo $data['driverAddressInfo']->POSTAL_CODE; ?><br>
                    Phone: <?php if (!empty($data['driverTelecomInfo']->MOBILE_NUMBER)) echo $data['driverTelecomInfo']->MOBILE_NUMBER; ?><br>
                    Email: <?php if (!empty($data['driverEmailInfo']->INFO_STRING)) echo $data['driverEmailInfo']->INFO_STRING; ?>
                <?php } else { ?>
                    N/A
                <?php } ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Order #007612</b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Serial #</th>
                  <th>Description</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Call of Duty</td>
                  <td>455-981-221</td>
                  <td>El snort testosterone trophy driving gloves handsome</td>
                  <td>$64.50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Need for Speed IV</td>
                  <td>247-925-726</td>
                  <td>Wes Anderson umami biodiesel</td>
                  <td>$50.00</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Monsters DVD</td>
                  <td>735-845-642</td>
                  <td>Terry Richardson helvetica tousled street art master</td>
                  <td>$10.70</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Grown Ups Blue Ray</td>
                  <td>422-568-642</td>
                  <td>Tousled lomo letterpress</td>
                  <td>$25.99</td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="../../dist/img/credit/visa.png" alt="Visa">
              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="../../dist/img/credit/american-express.png" alt="American Express">
              <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
              </button>
              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
              </button>
            </div>
          </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
      </div>
     