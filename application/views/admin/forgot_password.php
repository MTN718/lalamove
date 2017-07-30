<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Forgot Password</h1>
                </div>

                 <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } elseif ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>  

                <?php $attributes = array("name" => "forgotform");
                    echo form_open("user/forgot_password", $attributes); ?>
                        <div class="form-group">
                        <input type="hidden" name="login_type" value="1">
                            <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>                      
                        <div class="form-group">
                            <input type="submit" class="btn btn-default" value="Submit">
                        </div>
                        <a href="<?php echo site_url('user/login'); ?>">Back to login</a><br>
                    </form>                
            </div>
        </div>
    </div>
       