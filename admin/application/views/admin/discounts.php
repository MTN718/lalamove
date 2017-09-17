<!--

  KARYON SOLUTIONS CONFidENTIAL
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
    .select2-selection {
        border: none !important;
        background: none !important;
    }
    .party-inactive-status {
        background-color: #D8534F;
        border-color: #D8534F;
        font-size: 12px;
    }
    .party-active-status {
        background-color: #049600;
        border-color: #049600;
        font-size: 12px;
    }
    .party-status-icon {
        border: 1px solid;
        color: #fff;
        width: 73px;
        text-align: center;
        height: 24px;
        padding-top: 2px;
    }
    td {
        vertical-align: middle !important;
    }

</style>
<!-- vehicleType.php starts -->
<div class="content-wrapper">
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
    <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
    </div>
    <?php } ?>


    <div id="success" class="alert alert-success alert-dismissable" style="display: none;">
        <strong>Successfully</strong> Action completed...
    </div>


    <div id="error" class="alert alert-warning alert-dismissable" style="display: none;">
        <strong>Warnig!</strong> Service have incomplete order, Can not Deactivate...
    </div>


    <div id="successtrash" class="alert alert-success alert-dismissable" style="display: none;">
        <strong>Successfully</strong> Services Deleted...
    </div>


    <div id="errortrash" class="alert alert-warning alert-dismissable" style="display: none;">
        <strong>Warnig!</strong> Service have incomplete order, Can not Deactivate...
    </div>

    
    <section class="content-header">
        <h1>Discount & Promocode</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>admin</a></li>
            <li class="active">Discount & Promocode</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">Discount & Promocode</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="" data-toggle="modal" data-target="#addDiscountDialog" class="btn btn-primary floatalign_text_right"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="background: #ffbfbf;">Promo code</th>
                                    <th>Customer Name</th>
                                    <th>For All</th>
                                    <th>Discount Price</th>
                                    <th>Validity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['discountList'] as $discount) { ?>
                                <tr data-row-id="<?php echo $discount->discount_promocode_id;?>"  id="discountAction<?php echo $discount->discount_promocode_id;?>">
                                    <td style="background: #ffbfbf;">
                                        <input type="text" class="editable-col" col-index='1' value="<?php if (!empty($discount->promo_code)) echo $discount->promo_code; ?>" style="width: 100%;">
                                    </td>
                                    <td>
                                        <?php if (!empty($discount->first_name)) echo $discount->first_name; else echo "N/A"; ?> <?php if (!empty($discount->last_name)) echo $discount->last_name; ?>
                                    </td>
                                    <td>                  	
                                        <select class="form-control select2 editable-col" col-index='2' data-placeholder="Select Parent Service" name="parent_services_id" style="width: 100%">
                                            <option value="0">Select For all option</option>
                                            <?php
                                                $yes = "";
                                                $no = "";
                                                if($discount->for_all == "yes")
                                                    $yes = "selected"; 
                                                if($discount->for_all == "no")
                                                    $no = "selected"; 
                                            ?>
                                            <option value="yes" <?php echo $yes; ?> > Yes </option>
                                            <option value="no" <?php echo $no; ?> > No </option>
                                        </select>
                                    </td>
                                    <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $discount->price; ?>">
                                        <?php if (!empty($discount->price)) echo $discount->price; ?>
                                    </td>
                                    <td>
                                    	<input type="date" class="datepicker editable-col-validity" col-index='4' value="<?php if (!empty($discount->is_expired)) echo $discount->is_expired; ?>" style="width: 100%;">
                                    </td>
                                    <td>
                                        <?php if ($discount->promocode_status == 0) { ?>
                                            <div class="party-status-icon party-inactive-status"> Inactive </div>
                                        <?php } else { ?>
                                            <div class="party-status-icon party-active-status"> Active </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($discount->promocode_status == 1) { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='5' data="0"><i class="fa fa-thumbs-up"></i></a>
                                        <?php } else { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='5' data="1"><i class="fa fa-thumbs-down"></i></a>
                                        <?php } ?>                    
                                        <a href="javascript:void(0)" class="btn btn-danger editable-action" col-index='6' data="0" onclick="return confirm('Are you sure you want to delete this vehicle?');"><i class="fa fa-trash"></i></a> 
                                    </td>
                                </tr>
                            	<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <!-- Modal for creating customer starts -->
    <div class="modal fade" id="addDiscountDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add Discount & Promocode</h4>
                </div>                        
                <form id='addvehicleForm' method="post" action="<?php echo base_url();?>index.php/admin/addDiscountPromocodeInfo" enctype="multipart/form-data"> 
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Promo Code</label>
                                    <input type="text" class="form-control" name="promo_code" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Customer Name</label>             
                                    <select class="form-control select2 editable-col" col-index='0' name="party_id" style="width: 100%">
                                        <option value="">Select Customer</option>
                                        <?php foreach ($data['partyCustomerList'] as $partyCustomer) { ?>
                                        <option value="<?php echo $partyCustomer->party_id; ?>"> 
                                        	<?php echo $partyCustomer->first_name; ?> 
                                        	<?php echo $partyCustomer->last_name; ?> 
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Discount Price </label>
                                    <input type="text" class="form-control" name="price" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Parent Service (if Have)</label>             
                                    <select class="form-control select2" name="for_all" style="width: 100%" required="required">
                                        <option value="0">Select For all option</option>
                                        <option value="yes"> Yes </option>
                                        <option value="no"> No </option>
                                    </select>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Validity</label>
                                    <input type="date" class="form-control datepicker" name="is_expired">
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" onclick='' class="btn btn-primary">Add</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- create customer modal ends -->

    <script type="text/javascript">
        $(document).ready(function(){      
          $(document).on('focusout','.editable-col', function() {
            data = {};
            data['index'] = $(this).attr('col-index');
            if(data['index'] == 4 || data['index'] == 2 || data['index'] == 1) {
                data['val'] = $(this).val();
                data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            }
            else {
                data['val'] = $(this).text();
                data['id'] = $(this).parent('tr').attr('data-row-id');
            }

            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/promocode",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                }   
            });
        });
      });
  </script>

  <script type="text/javascript">
        $(document).ready(function(){     
            $(document).on('change','.editable-col-validity', function() {

                data = {};
                data['index'] = $(this).attr('col-index');
                if(data['index'] == 4 || data['index'] == 2 || data['index'] == 1) {
                    data['val'] = $(this).val();
                    data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
                }
                else {
                    data['val'] = $(this).text();
                    data['id'] = $(this).parent('tr').attr('data-row-id');
                }

                $.ajax({   

                    type: "POST",  
                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/promocode",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                    }   
                });
            });
        });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-action', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            
            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/promocode",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                    if(data['index'] == 5) {

                        if(response.msg == "success") {

                                $('#success').css("display", "block");
                                $(window).load(setTimeout(function(){
                                    location.reload();
                                }, 400));

                            } else {

                                $('#error').css("display", "block");
                                $(window).load(setTimeout(function(){
                                    location.reload();
                                }, 400));
                            } 
                    }
                    else {

                        if(response.msg == "success") {

                                $('#successtrash').css("display", "block");
                                $(window).load(setTimeout(function(){
                                    location.reload();
                                }, 400));

                            } else {

                                $('#errortrash').css("display", "block");
                                $(window).load(setTimeout(function(){
                                    location.reload();
                                }, 400));
                            } 
                    }
                }   
            });
        });
  });
</script>