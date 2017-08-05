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
        <li class="<?php if($data['active'] == "faqs" || $data['active'] == "faqs_update") echo "active";?>"><a href="#faqs" data-toggle="tab">Faq's</a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane <?php if($data['active'] == "about_us") echo "active";?>" id="about_us">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebSettings" method="POST">  
                <input type="hidden" name="ID" value="<?php if(!empty($data['webAboutUs']->ABOUT_US_ID)) echo $data['webAboutUs']->ABOUT_US_ID; ?>"> 
                <input type="hidden" name="VALUR_TYPE" value="ABOUT_US">
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Title</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webAboutUs']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webAboutUs']->TITLE)) echo $data['webAboutUs']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Description</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webAboutUs']->DESCRIPTION)) { ?>
                        <textarea type="text"  id="WYSIHTML" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webAboutUs']->DESCRIPTION)) echo $data['webAboutUs']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text"  id="WYSIHTML" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>














        <div class="tab-pane <?php if($data['active'] == "privacy_policy") echo "active";?>" id="privacy_policy">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebSettings" method="POST">  
                <input type="hidden" name="ID" value="<?php if(!empty($data['webPrivacyPolicy']->PRIVACY_POLICY_ID)) echo $data['webPrivacyPolicy']->PRIVACY_POLICY_ID; ?>">
                <input type="hidden" name="VALUR_TYPE" value="PRIVACY_POLICY">
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Title</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webPrivacyPolicy']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webPrivacyPolicy']->TITLE)) echo $data['webPrivacyPolicy']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Description</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webPrivacyPolicy']->DESCRIPTION)) { ?>
                        <textarea type="text" id="WYSIHTML1" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webPrivacyPolicy']->DESCRIPTION)) echo $data['webPrivacyPolicy']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" id="WYSIHTML1" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>












        <div class="tab-pane <?php if($data['active'] == "term_condition") echo "active";?>" id="term_condition">
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebSettings" method="POST">  
                <input type="hidden" name="ID" value="<?php if(!empty($data['webTermCondtion']->TERM_CONDITION_ID)) echo $data['webTermCondtion']->TERM_CONDITION_ID; ?>"> 
                <input type="hidden" name="VALUR_TYPE" value="TERM_CONDITION">             
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Title</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webTermCondtion']->TITLE)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title" value="<?php if(!empty($data['webTermCondtion']->TITLE)) echo $data['webTermCondtion']->TITLE; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Title">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Description</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webTermCondtion']->DESCRIPTION)) { ?>
                        <textarea type="text" id="WYSIHTML2" class="form-control" name="DESCRIPTION" placeholder="Description"><?php if(!empty($data['webTermCondtion']->DESCRIPTION)) echo $data['webTermCondtion']->DESCRIPTION; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" id="WYSIHTML2" class="form-control" name="DESCRIPTION" placeholder="Description"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form> 
        </div>












        <div class="tab-pane <?php if($data['active'] == "faqs_update") echo "active";?>"> 
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateWebSettings" method="POST">  
                <input type="hidden" name="ID" value="<?php if(!empty($data['webFaqsedit']->FAQ_ID)) echo $data['webFaqsedit']->FAQ_ID; ?>">
                <input type="hidden" name="VALUR_TYPE" value="FAQS">             
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Question</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webFaqsedit']->QUESTION)) { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Question" value="<?php if(!empty($data['webFaqsedit']->QUESTION)) echo $data['webFaqsedit']->QUESTION; ?>">  
                        <?php } else { ?>
                        <input type="text" class="form-control" name="TITLE" placeholder="Question">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label asterisk">Answer</label>
                    <div class="col-md-11">
                    <?php if(isset($data['webFaqsedit']->ANSWER)) { ?>
                        <textarea type="text" id="WYSIHTML2" class="form-control" name="DESCRIPTION" placeholder="Answer"><?php if(!empty($data['webFaqsedit']->ANSWER)) echo $data['webFaqsedit']->ANSWER; ?></textarea> 
                        <?php } else { ?>
                        <textarea type="text" id="WYSIHTML3" class="form-control" name="DESCRIPTION" placeholder="Answer"></textarea>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div> 
            </form>  
        </div>




        <div class="tab-pane <?php if($data['active'] == "faqs") echo "active";?>" id="faqs"> 
                <div class="row">
                  <div class="col-sm-6 col-md-6"></div>
                  <div class="col-sm-6 col-md-6">     
                    <a href="<?php echo base_url();?>index.php/home/settings/faqs_update" class="btn btn-primary floatalign_text_right"><i class="fa fa-plus"></i></a>
                  </div>  
                </div>        
            <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Faq's Id</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th class="text__align__right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['webFaqs'] as $webFaqs) { ?>
                            <tr>
                                <td><?php echo $webFaqs->FAQ_ID; ?></td>
                                <td><?php echo $webFaqs->QUESTION; ?></td>
                                <td><?php echo $webFaqs->ANSWER; ?></td>
                                <td>$<?php echo $webFaqs->STATUS; ?></td>
                                <td class="text__align__right">                          
                                    <a href="<?php echo base_url();?>index.php/home/invoiceoverview?id=<?php echo $webFaqs->FAQ_ID;?>" class="btn btn-info">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>                           
                                    <a href="<?php echo base_url();?>index.php/home/invoiceoverview?id=<?php echo $webFaqs->FAQ_ID;?>" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>                           
                                    <a href="<?php echo base_url();?>index.php/home/invoiceoverview?id=<?php echo $webFaqs->FAQ_ID;?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>                      
                                </td>                      
                            </tr>  
                            <?php } ?>
                        </tbody>            
                    </table>
        </div>














    </div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>  