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

<!-- super_customers.php starts -->
<div class="content-wrapper"> 
    <section class="content-header">
        <h1>Orders</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6" style="text-align:left;float: left;">
                                <h2 class="box-title">Order List</h2>
                            </div> 
                        </div>  
                    </div> 
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Order Date</th> 
                                <th>Order From</th> 
                                <th>Order To</th> 
                                <th>Charge</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach ($invoices as $invoice) { ?>
                            <tr>
                                <td><?php echo $invoice->invoice_id; ?></td>
                                <td>
                                  <?php 
                                    $this->db->select('*');
                                    $this->db->from('users');      
                                    $this->db->where('user_id',$invoice->user_id);
                                    $row = $this->db->get()->row();
                                    echo $row->fname." ".$row->lname;
                                  ?>
                                </td>
                                <td><?php echo $invoice->invoice_from_date; ?></td>
                                <td><?php echo $invoice->invoice_to_date; ?></td>
                                <td>$<?php echo $invoice->amount; ?></td>
                                <td>
                                 <?php
                                if($invoice->amount == 0) {
                                  $this->db->select('sum(billing_charge) as total');
                                  $this->db->from('walk');
                                  $this->db->join('invoice_walk_conn', 'walk.walk_id = invoice_walk_conn.walk_id');
                                  $this->db->where('invoice_walk_conn.invoice_id',$invoice->invoice_id);
                                  $revenue = $this->db->get()->row();              
                                  echo "$".$revenue->total; 
                                } else {
                                  echo "-";
                                }
                                ?>                 
                                </td>
                                <td>
                                  <?php
                                    $this->db->select('*');
                                    $this->db->from('invoice_status');      
                                    $this->db->where('status_id',$invoice->invoice_status);
                                    $row = $this->db->get()->row();
                                    echo $row->title;
                                  ?>
                                </td> 
                                <td class="text__align__right">                          
                                  <a href="<?php echo base_url();?>index.php/customer_controller/invoiceoverview?id=<?php echo $invoice->invoice_id;?>" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> View Invoice</a>                      
                                </td>                      
                            </tr>  
                            <?php } ?> -->
                        </tbody>            
                    </table>
                </div>
            </div>
        </div>   
    </div>
</section>
</div>