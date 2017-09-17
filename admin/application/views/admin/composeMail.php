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

 <div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mailbox      
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/admin/dashboard"><i class="fa fa-dashboard"></i> admin</a></li>
      <li class="active">Mailbox</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="<?php echo base_url();?>index.php/admin/notifications" class="btn btn-primary btn-block margin-bottom">BacK to Inbox</a>

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/notifications"><i
                  class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right"><?php echo $data['notificationCount']; ?></span></a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/admin/sentNotifications"><i class="fa fa-envelope-o"></i>
                    Sent
                    <span class="label label-info pull-right"><?php echo $data['sentNotificationCount']; ?></span></a>
                  </li>
                  <li><a href="<?php echo base_url(); ?>index.php/admin/trashNotifications"><i class="fa fa-trash-o"></i>
                    Trash
                    <span class="label label-danger pull-right"><?php echo $data['trashNotificationCount']; ?></span></a>
                  </li>
                </ul>

                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div> 
                <form action="<?php echo base_url();?>index.php/admin/sendMail" method="POST">
                  <div class="box-body">

                    <div class="form-group">
                      <select class="form-control" data-placeholder="To:" name="to" style="width: 100%;" required="required">
                        <?php if(isset($data['partyList']) and $data['partyList'] != NULL) {
                          foreach ($data['partyList'] as $party) { ?>
                          <option value="<?php echo $party->party_id;?>">
                            <?php if(!empty($party->first_name)) echo $party->first_name;?> <?php if(!empty($party->last_name)) echo $party->last_name;?> [ <?php if(!empty($party->party_type_id)) echo $party->party_type_id;?> ]</option>
                          <?php } } ?>
                        </select> 
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Subject:" name="subject">
                      </div>
                      <div class="form-group">
                        <textarea id="WYSIHTML1" class="form-control" style="height: 300px" name="message">
                          Thank You,<br>
                          <?php echo $data['adminNameInfo']->first_name;?> <?php if(!empty($data['adminNameInfo']->last_name)) echo $data['adminNameInfo']->last_name;?><br>
                          <?php 
                          $currentdate = date('d M, Y');
                          echo $currentdate;
                          ?>
                        </textarea>
                      </div>
                    </div>
                    <div class="box-footer">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                      </div>
                      <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>