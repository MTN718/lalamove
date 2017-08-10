<div class="content-wrapper">

    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>

  <section class="content-header">
    <h1>Business Overview</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/home/business"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Business Overview</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Basic Information</h3>
        <div class="box-tools pull-right">
          <a href="<?php echo base_url(); ?>index.php/home/partyBasicInfoEdit?PARTY_ID=<?php echo $data['partyUserNameInfo']->PARTY_ID; ?>"
             type="button" class="btn btn-info"><i class="fa fa-pencil"></i></a>
          <a href="<?php echo base_url(); ?>index.php/home/business" class="btn btn-default"><i
                class="fa fa-reply"></i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>User Name</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyUserNameInfo']->USER_LOGIN_ID)) echo $data['partyUserNameInfo']->USER_LOGIN_ID; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Name</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyNameInfo']->FIRST_NAME)) echo $data['partyNameInfo']->FIRST_NAME; ?>
              &nbsp;<?php if (!empty($data['partyNameInfo']->LAST_NAME)) echo $data['partyNameInfo']->LAST_NAME; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Email</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyEmailInfo']->INFO_STRING)) echo $data['partyEmailInfo']->INFO_STRING; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Phone</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyTelecomInfo']->AREA_CODE)) echo $data['partyTelecomInfo']->AREA_CODE; ?>
              - <?php if (!empty($data['partyTelecomInfo']->CONTACT_NUMBER)) echo $data['partyTelecomInfo']->CONTACT_NUMBER; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Mobile</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyTelecomInfo']->MOBILE_NUMBER)) echo $data['partyTelecomInfo']->MOBILE_NUMBER; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Alt Mobile</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) echo $data['partyTelecomInfo']->ALT_MOBILE_NUMBER; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Address</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyAddressInfo']->ADDRESS1)) echo $data['partyAddressInfo']->ADDRESS1; ?>,
                <?php if (!empty($data['partyAddressInfo']->ADDRESS2)) echo $data['partyAddressInfo']->ADDRESS2; ?><br>
                <?php if (!empty($data['partyAddressInfo']->CITY)) echo $data['partyAddressInfo']->CITY; ?>,
                <?php if (!empty($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['partyAddressInfo']->STATE_PROVINCE_GEO_ID; ?>
              ,
                <?php if (!empty($data['partyAddressInfo']->POSTAL_CODE)) echo $data['partyAddressInfo']->POSTAL_CODE; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-sm-6 col-md-6" style="text-align:left;float: left;">
                <h2 class="box-title">Order List</h2>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example6" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>Order Date</th>
                  <th>Amount Paid</th>
                  <th>Amount Due</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- <?php
                foreach ($invoices as $invoice) { ?>
                  <tr>
                        <td><?php echo $invoice->invoice_id; ?></td>
                        <td>
                          <?php
                    $this->db->select('*');
                    $this->db->from('users');
                    $this->db->where('user_id', $invoice->user_id);
                    $row = $this->db->get()->row();
                    echo $row->fname . " " . $row->lname;
                    ?>
                        </td>
                        <td><?php echo $invoice->invoice_from_date; ?></td>
                        <td><?php echo $invoice->invoice_to_date; ?></td>
                        <td>$<?php echo $invoice->amount; ?></td>
                        <td>
                        <?php
                    if ($invoice->amount == 0) {
                        $this->db->select('sum(billing_charge) as total');
                        $this->db->from('walk');
                        $this->db->join('invoice_walk_conn', 'walk.walk_id = invoice_walk_conn.walk_id');
                        $this->db->where('invoice_walk_conn.invoice_id', $invoice->invoice_id);
                        $revenue = $this->db->get()->row();
                        echo "$" . $revenue->total;
                    } else {
                        echo "-";
                    }
                    ?>
                        </td>
                        <td>
                          <?php
                    $this->db->select('*');
                    $this->db->from('invoice_status');
                    $this->db->where('status_id', $invoice->invoice_status);
                    $row = $this->db->get()->row();
                    echo $row->title;
                    ?>
                        </td> 
                        <td class="text__align__right">                                                                             
                            <a href="<?php echo base_url(); ?>index.php/admin_controller/invoiceoverview?id=<?php echo $invoice->invoice_id; ?>" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> View Invoice</a>
                          <?php if ($invoice->admin_status == 0) { ?>
                            <a href="<?php echo base_url(); ?>index.php/admin_controller/invoiceapproved/active?id=<?php echo $invoice->invoice_id; ?>" class="btn btn-success"><i class="fa fa-check-square-o"></i> Approve</a>
                            <a href="<?php echo base_url(); ?>index.php/admin_controller/invoicedelete/active?id=<?php echo $invoice->invoice_id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          <?php } ?>                      
                        </td>                      
                      </tr>
                  <?php } ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>  
