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
        <h1>Order Additional Services</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>admin</a></li>
            <li class="active">Order Additional Services</li>
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
                                <h2 class="box-title floatalign_text_left">Order Additional Services List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="" data-toggle="modal" data-target="#addserviceDialog" class="btn btn-primary floatalign_text_right"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Services Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Parent Services Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['orderAdditionaServicesList'] as $additionalServices) { ?>





                                <tr data-row-id="<?php echo $additionalServices->service_id;?>"  id="serviceAction<?php echo $additionalServices->service_id;?>">
                                    <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $additionalServices->services_title; ?>">
                                        <?php echo $additionalServices->services_title; ?></td>
                                    <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $additionalServices->price; ?>">
                                        <?php if (!empty($additionalServices->price)) echo $additionalServices->price; ?>
                                    </td>
                                    <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $additionalServices->description; ?>">
                                        <?php if (!empty($additionalServices->description)) echo $additionalServices->description; ?>
                                    </td>
                                    <td>                  	
                                        <select class="form-control select2 editable-col" col-index='4' data-placeholder="Select Parent Service" name="parent_services_id" style="width: 100%">
                                            <option value="0">Select Parent Service</option>
                                            <?php foreach ($data['orderAdditionaServicesList'] as $parentService) { 
                                                $str_flag = "";
                                                if($parentService->service_id == $additionalServices->parent_services_id)
                                                    $str_flag = "selected"; 
                                            ?>
                                            <option value="<?php echo $parentService->service_id; ?>" <?php echo $str_flag; ?> > <?php echo $parentService->services_title; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </td>


                                    <td>
                                        <?php if (!empty($additionalServices->status) AND $additionalServices->status == 0) { ?>
                                            <div class="party-status-icon party-inactive-status"> Inactive </div>
                                        <?php } else { ?>
                                            <div class="party-status-icon party-active-status"> Active </div>
                                        <?php } ?>
                                    </td>







                                    <td>
                                        <?php if($additionalServices->status == 1) { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='5' data="0"><i class="fa fa-thumbs-up"></i></a>
                                        <?php } else { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='5' data="1"><i class="fa fa-thumbs-down"></i></a>
                                        <?php } ?>                    
                                        <a href="javascript:void(0)" class="btn btn-danger editable-action" col-index='6' data="0" ><i class="fa fa-trash"></i></a> 
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
    <div class="modal fade" id="addserviceDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add Order Additional Services</h4>
                </div>                        
                <form id='addvehicleForm' method="post" action="<?php echo base_url();?>index.php/admin/addOrderAdditionalServicesInfo" enctype="multipart/form-data"> 
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Services Name</label>
                                    <input type="text" class="form-control" name="services_title" value="" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Services Price </label>
                                    <input type="text" class="form-control" name="price" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Parent Service (if Have)</label>             
                                    <select class="form-control select2 editable-col" col-index='0' data-placeholder="Select Parent Service" name="parent_services_id" style="width: 100%">
                                        <option value="">Select Parent Service</option>
                                        <?php foreach ($data['orderAdditionaServicesList'] as $parentService) { ?>
                                        <option value="<?php echo $parentService->service_id; ?>" <?php echo $str_flag; ?> > <?php echo $parentService->services_title; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Service Description </label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
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
            if(data['index'] == 4) {
                data['val'] = $(this).val();
                data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            }
            else {
                data['val'] = $(this).text();
                data['id'] = $(this).parent('tr').attr('data-row-id');
            }

            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/services",  
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
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/services",  
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
                    } else {

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