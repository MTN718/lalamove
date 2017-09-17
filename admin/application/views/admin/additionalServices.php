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
            <h1>Additional Services</h1>
            <ol class="breadcrumb">
                <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>admin</a></li>
                <li class="active">Additional Services</li>
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
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Load/Unload Max Time (Min)</th>
                                        <th>Load/Unload Overtime Charge ($/Min)</th>
                                        <th>Landfills ($)</th>
                                        <th>Construction ($)</th>
                                        <th>Night ($)</th>
                                        <th>Mid Night ($)</th>
                                        <th>Sunday / PH ($)</th>
                                        <th>ONG ($)</th>
                                        <th>Parking Fee ($)</th>
                                        <th style="background: #ffbfbf;">Owner Payable ($)</th>
                                    </tr>
                                </thead>
                                <tbody id="_editable_table">
                                    <?php foreach ($data['vehicleTypeList'] as $vehicleType) { 
                                        $string1 = $vehicleType->vehicle_type_id;
                                        $string2 = $data['active'];
                                    ?>
                                    <tr data-row-id="<?php echo $vehicleType->vehicle_type_id;?>" <?php if( $string1 == $string2 ) echo "style='background:#ffbfbf'"; ?>>
                                        <td><?php echo $vehicleType->vehicle_type_name; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='16' oldVal ="<?php echo $vehicleType->load_unload_max_time; ?>"><?php echo $vehicleType->load_unload_max_time; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='8' oldVal ="<?php echo $vehicleType->load_unload_overtime_charge; ?>"><?php echo $vehicleType->load_unload_overtime_charge; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='9' oldVal ="<?php echo $vehicleType->landfills_charge; ?>"><?php echo $vehicleType->landfills_charge; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='10' oldVal ="<?php echo $vehicleType->construction_charge; ?>"><?php echo $vehicleType->construction_charge; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='11' oldVal ="<?php echo $vehicleType->night_charge; ?>"><?php echo $vehicleType->night_charge; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='12' oldVal ="<?php echo $vehicleType->midnight_fee; ?>"><?php echo $vehicleType->midnight_fee; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='13' oldVal ="<?php echo $vehicleType->sunday_ph_charge; ?>"><?php echo $vehicleType->sunday_ph_charge; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='15' oldVal ="<?php echo $vehicleType->ong_charge; ?>"><?php echo $vehicleType->ong_charge; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='17' oldVal ="<?php echo $vehicleType->parking_fee; ?>"><?php echo $vehicleType->parking_fee; ?></td>
                                        <td class="editable-col" contenteditable="true" col-index='14' oldVal ="<?php echo $vehicleType->owner_payable; ?>" style="background: #ffbfbf;"><?php echo $vehicleType->owner_payable; ?></td>
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
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Item Height (Feet)</label>
                                    <input type="number" class="form-control" name="item_height" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Item Width (Feet)</label>
                                    <input type="number" class="form-control" name="item_width" value="" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Item Length (Feet)</label>
                                    <input type="number" class="form-control" name="item_length" value="" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="color" class="control-label asterisk">Base Fare ($)</label>
                                    <input type="number" class="form-control" name="base_fare" value="" required="required">
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