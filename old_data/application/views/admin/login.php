 <div class="container">
    <div class="row">
        
 <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Admin</b>Login</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in</p>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php $attributes = array("name" => "adminform");
					echo form_open("admin", $attributes); ?>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="text-danger error-personal"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class="text-danger error-personal"><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="row">
                        <!--<div class="col-xs-8">
                          <div class="checkbox icheck">
                            <label>
                              <input type="checkbox"> Remember Me
                            </label>
                          </div>
                        </div>-->
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a href="<?php echo site_url('login/forgot_password'); ?>">I forgot my password</a><br>
                  <a href="<?php echo site_url(); ?>">Home</a><br>

            </div>
            <!-- /.login-box-body -->
        </div>
        
        </div>
        </div>