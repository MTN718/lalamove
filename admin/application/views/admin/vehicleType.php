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
        input[type='number'] {
            -moz-appearance:textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
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
        <section class="content-header">
            <h1>vehicle Type</h1>
            <ol class="breadcrumb">
                <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>admin</a></li>
                <li class="active">vehicle Type List</li>
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
                                    <h2 class="box-title floatalign_text_left">vehicle Type List</h2>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <a href="" data-toggle="modal" data-target="#addvehicleTypeDialog" class="btn btn-primary floatalign_text_right"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Min Weight Capacity (KG)</th>
                                        <th>Max Weight Capacity (KG)</th>
                                        <th>Item Height (Feet)</th>
                                        <th>Item Width (Feet)</th>
                                        <th>Item Length (Feet)</th>
                                        <th>Base Fare ($)</th>
                                        <th>Base Fare Limit (KM)</th>
                                        <th>Rent Per KM ($)</th>
                                        <th style="background: #ffbfbf;">Region</th>
                                        <th style="background: #ffbfbf;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_editable_table">
                                    <?php foreach ($data['vehicleTypeList'] as $vehicleType) { ?>
                                    <tr data-row-id="<?php echo $vehicleType->vehicle_type_id;?>">
                                        <td class="editable-col" contenteditable="true" col-index='0' oldVal ="<?php echo $vehicleType->vehicle_type_name; ?>"><?php echo $vehicleType->vehicle_type_name; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $vehicleType->min_weight_capacity; ?>"><?php echo $vehicleType->min_weight_capacity; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $vehicleType->max_weight_capacity; ?>"><?php echo $vehicleType->max_weight_capacity; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $vehicleType->item_height; ?>"><?php echo $vehicleType->item_height; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $vehicleType->item_width; ?>"><?php echo $vehicleType->item_width; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='5' oldVal ="<?php echo $vehicleType->item_length; ?>"><?php echo $vehicleType->item_length; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='6' oldVal ="<?php echo $vehicleType->base_fare; ?>"><?php echo $vehicleType->base_fare; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='19' oldVal ="<?php echo $vehicleType->base_fare_limit; ?>"><?php echo $vehicleType->base_fare_limit; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='18' oldVal ="<?php echo $vehicleType->rent_per_km; ?>"><?php echo $vehicleType->rent_per_km; ?></td>
                                        <td style="background: #ffbfbf;">
                                            <select class="form-control select2 editable-city" col-index='7' data-placeholder="Select vehicle Type" name="working_region" style="width: 100%;background: #ffbfbf;border: none;padding: 0px 12px;height: 22px;">
                                                <option value="">Select Region</option>
                                                <?php foreach ($data['operationalcityList'] as $operationalcity) { 
                                                $str_flag = "";
                                                if($operationalcity->operational_city_id == $vehicleType->working_region)
                                                    $str_flag = "selected"; 
                                                ?>
                                                <option value="<?php echo $operationalcity->operational_city_id; ?>" <?php echo $str_flag; ?> > <?php echo $operationalcity->city_name; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td style="background: #ffbfbf; text-align: center;">                    
                                            <a href="<?php echo base_url(); ?>index.php/admin/additionalServices/<?php echo $vehicleType->vehicle_type_id;?>" class="btn btn-default editable-action"><i class="fa fa-pencil"></i>&nbsp;Additional Charges</a>
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
    <div class="modal fade" id="addvehicleTypeDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add vehicle Type</h4>
                </div>                        
                <form id='addvehicleForm' method="post" action="<?php echo base_url();?>index.php/admin/addvehicleTypeInfo" enctype="multipart/form-data"> 
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Name</label>
                                    <input type="text" class="form-control" name="vehicle_type_name" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="gender" class="control-label asterisk">vehicle Type:</label>             
                                    <select class="form-control select2" col-index='1' data-placeholder="Select vehicle Type" name="working_region" required="required">
                                    <option value="">Select Region</option>
                                    <?php foreach ($data['operationalcityList'] as $operationalcity) { ?>
                                        <option value="<?php echo $operationalcity->operational_city_id; ?>"> <?php echo $operationalcity->city_name; ?> </option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Min Weight Capacity (kg)</label>
                                    <input type="number" class="form-control" name="min_weight_capacity" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Max Weight Capacity (kg)</label>
                                    <input type="number" class="form-control" name="max_weight_capacity" value="" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Item Height (Feet)</label>
                                    <input type="number" class="form-control" name="item_height" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Item Width (Feet)</label>
                                    <input type="number" class="form-control" name="item_width" value="" required="required">
                                </div>
                            </div>                            
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Item Length (Feet)</label>
                                    <input type="number" class="form-control" name="item_length" value="" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Rent Per KM ($)</label>
                                    <input type="number" class="form-control" name="rent_per_km" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Base Fare ($)</label>
                                    <input type="number" class="form-control" name="base_fare" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Base Fare Limit (KM)</label>
                                    <input type="number" class="form-control" name="base_fare_limit" value="" required="required">
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
          $('td.editable-col').on('focusout', function() {
            data = {};
            data['val'] = $(this).text();
            data['id'] = $(this).parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            if($(this).attr('oldVal') === data['val'])
                return false;

            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vehicleType",  
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
        $('.editable-city').on('focusout', function() {
            data = {};
            data['val'] = $(this).val();
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            
            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vehicleType",  
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