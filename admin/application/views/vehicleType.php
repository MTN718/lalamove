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

<!-- vehicleType.php starts -->
<div class="content-wrapper">
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-WARNING alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
  <section class="content-header">
    <h1>Vehicle Type</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>
          Home</a></li>
      <li class="active">Vehicle Type List</li>
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
                <h2 class="box-title floatalign_text_left">Vehicle Type List</h2>
              </div>
              <div class="col-sm-6 col-md-6">
                <a href="<?php echo base_url(); ?>index.php/home/addVehicleTypePage"
                   class="btn btn-primary text__align__right floatalign_text_right"><i class="fa fa-plus"></i></a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Min Weight Capacity (KG)</th>
                <th>Max Weight Capacity (KG)</th>
                <th>Item Height (Feet)</th>
                <th>Item Width (Feet)</th>
                <th>Item Length (Feet)</th>
                <th>Base Fare ($)</th>
              </tr>
              </thead>
              <tbody id="_editable_table">
              <?php foreach ($data['vehicleTypeList'] as $vehicleType) { ?>
                <tr data-row-id="<?php echo $vehicleType->VEHICLE_TYPE_ID;?>">
                  <td><?php echo $vehicleType->VEHICLE_TYPE_ID; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='0' oldVal ="<?php echo $vehicleType->VEHICLE_TYPE_NAME; ?>"><?php echo $vehicleType->VEHICLE_TYPE_NAME; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $vehicleType->MIN_WEIGHT_CAPACITY; ?>"><?php echo $vehicleType->MIN_WEIGHT_CAPACITY; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $vehicleType->MAX_WEIGHT_CAPACITY; ?>"><?php echo $vehicleType->MAX_WEIGHT_CAPACITY; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $vehicleType->ITEM_HEIGHT; ?>"><?php echo $vehicleType->ITEM_HEIGHT; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $vehicleType->ITEM_WIDTH; ?>"><?php echo $vehicleType->ITEM_WIDTH; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='5' oldVal ="<?php echo $vehicleType->ITEM_LENGTH; ?>"><?php echo $vehicleType->ITEM_LENGTH; ?></td>
                  <td class="editable-col" contenteditable="true" col-index='6' oldVal ="<?php echo $vehicleType->BASE_FARE; ?>"><?php echo $vehicleType->BASE_FARE; ?></td>
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
            url: "<?php echo base_url(); ?>/index.php/home/updateInline/vehicleType",  
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