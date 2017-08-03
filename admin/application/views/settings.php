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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php if ($this->session->flashdata('error_msg') != ""){ ?>
  <div class="alert alert-warning alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg');?>
</div>
<?php  } ?>
<?php if ($this->session->flashdata('success_msg') != ""){ ?>
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
</div>
<?php  } ?>
<section class="content-header">
    <h1>Settings</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Settings</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
<!-- /.col -->
<div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="<?php if($data['active'] == "about_us") echo "active";?>"><a href="#about_us" data-toggle="tab">About Us</a></li>
        <li class="<?php if($data['active'] == "privacy_policy") echo "active";?>"><a href="#privacy_policy" data-toggle="tab">Privacy Policy</a></li>
        <li class="<?php if($data['active'] == "term_condition") echo "active";?>"><a href="#term_condition" data-toggle="tab">Term and Condition</a></li>
        <li class="<?php if($data['active'] == "faqs") echo "active";?>"><a href="#faqs" data-toggle="tab">Faq's</a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane <?php if($data['active'] == "about_us") echo "active";?>" id="about_us">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebAboutUs" method="POST">  
                <input type="hidden" name="ABOUT_US_ID" value="<?php if(!empty($data['webAboutUs']->ABOUT_US_ID)) echo $data['webAboutUs']->ABOUT_US_ID; ?>">              
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Title</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webAboutUs']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webAboutUs']->TITLE)) echo $data['webAboutUs']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Description</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webAboutUs']->DESCRIPTION)) { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webAboutUs']->DESCRIPTION)) echo $data['webAboutUs']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>

        <div class="tab-pane <?php if($data['active'] == "privacy_policy") echo "active";?>" id="privacy_policy">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebPrivacyPolicy" method="POST">  
                <input type="hidden" name="PRIVACY_POLiCY_ID" value="<?php if(!empty($data['webPrivacyPolicy']->PRIVACY_POLiCY_ID)) echo $data['webPrivacyPolicy']->PRIVACY_POLiCY_ID; ?>">              
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Title</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webPrivacyPolicy']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webPrivacyPolicy']->TITLE)) echo $data['webPrivacyPolicy']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Description</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webPrivacyPolicy']->DESCRIPTION)) { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webPrivacyPolicy']->DESCRIPTION)) echo $data['webPrivacyPolicy']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>

        <div class="tab-pane <?php if($data['active'] == "term_condition") echo "active";?>" id="term_condition">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebPrivacyPolicy" method="POST">  
                <input type="hidden" name="PRIVACY_POLiCY_ID" value="<?php if(!empty($data['webPrivacyPolicy']->PRIVACY_POLiCY_ID)) echo $data['webPrivacyPolicy']->PRIVACY_POLiCY_ID; ?>">              
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Title</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webPrivacyPolicy']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webPrivacyPolicy']->TITLE)) echo $data['webPrivacyPolicy']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Description</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webPrivacyPolicy']->DESCRIPTION)) { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webPrivacyPolicy']->DESCRIPTION)) echo $data['webPrivacyPolicy']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>

        <div class="tab-pane <?php if($data['active'] == "faqs") echo "active";?>" id="faqs">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebPrivacyPolicy" method="POST">  
                <input type="hidden" name="PRIVACY_POLiCY_ID" value="<?php if(!empty($data['webPrivacyPolicy']->PRIVACY_POLiCY_ID)) echo $data['webPrivacyPolicy']->PRIVACY_POLiCY_ID; ?>">              
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Title</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webPrivacyPolicy']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webPrivacyPolicy']->TITLE)) echo $data['webPrivacyPolicy']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label asterisk">Description</label>
                    <div class="col-md-10">
                    <?php if(isset($data['webPrivacyPolicy']->DESCRIPTION)) { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webPrivacyPolicy']->DESCRIPTION)) echo $data['webPrivacyPolicy']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>  