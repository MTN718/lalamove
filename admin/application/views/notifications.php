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
            <li><a href="<?php echo base_url();?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox<x/li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo base_url();?>index.php/home/compose" class="btn btn-primary btn-block margin-bottom">Compose</a>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="<?php echo base_url();?>index.php/home/notifications"><i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right"><?php echo $data['notificationCount']; ?></span></a></li>
                            <li><a href="<?php echo base_url();?>index.php/home/sentNotifications"><i class="fa fa-envelope-o"></i> Sent
                                <span class="label label-info pull-right"><?php echo $data['sentNotificationCount']; ?></span></a> </li>
                            <li><a href="<?php echo base_url();?>index.php/home/trashNotifications"><i class="fa fa-trash-o"></i> Trash
                                <span class="label label-danger pull-right"><?php echo $data['trashNotificationCount']; ?></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Labels</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm" onclick="deleteMail()"><i class="fa fa-trash-o"></i></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()"><i class="fa fa-refresh"></i></button>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>                 

                    <!-- <div class="box-body table-responsive" style="margin-top: -54px;">
                        <table  id="example22" class="table table-hover table-striped" style="margin-top: 12px !important;">
                            <thead style="display: none;">
                              <tr>
                                <th></th>                
                                <th></th>
                                <th></th>                    
                                <th></th> 
                                <th></th>   
                                <th></th>  
                              </tr>
                            </thead>
                            <tbody>
                                <form id="deleteMail" action="<?php echo base_url();?>index.php/home/deleteMail" method="POST">
                                <?php foreach ($notificationinfo as $notification) { 
                                    $this->db->select('*');
                                    $this->db->from('users');
                                    $this->db->where('user_id',$notification->fromuser);
                                    $userinfo = $this->db->get()->row();
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="mail[]" value="<?php echo $data['notification']->mail_id; ?>"></td>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                        <td class="mailbox-name"><a href="<?php echo base_url();?>index.php/home/readmail?mail_id=<?php echo $notification->mail_id;?>"><?php echo $userinfo->fname; ?> <?php echo $userinfo->lname; ?> </a></td>
                                        <td class="mailbox-subject"><b><?php echo $notification->subject; ?></b> - <?php echo $notification->message; ?>...</td>
                                        <?php if(isset($notification->forid) and $notification->forid != NULL) { ?>
                                        <td class="mailbox-name"><a href="<?php echo base_url();?>index.php/home/editwalktype?id=<?php echo $notification->forid;?>"><i class="fa fa-link" aria-hidden="true"></i>Link</a></td>
                                        <?php } else { ?>
                                        <td class="mailbox-name"></td>
                                        <?php } ?>
                                        <td class="mailbox-date">
                                          <?php 
                                        $currentdate = date('d');
                                        $notificationdate = date('d',strtotime($notification->datetime));       
                          
                                        if($currentdate - $notificationdate == 0) {
                                          echo "Today";
                                        } else {            
                                          $age  = $currentdate - $notificationdate;
                                          echo $age." days ago";
                                        } ?>
                                        </td>
                                    </tr>                    
                                <?php } ?>
                                </form>
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function refreshPage(){
        window.location.reload();
    } 
</script>
<script>
    function deleteMail() {
        document.getElementById("deleteMail").submit();
    }
</script>