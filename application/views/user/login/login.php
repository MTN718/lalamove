<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
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
        <?php if (isset($loginType)) { ?>
        	<input type="hidden" name="login" class="login-onload" value="<?php echo $loginType; ?>">
        <?php } ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login</h1>
			</div>
				<div class="form-group">					
					<input type="radio" name="login-radio" class="login-email" id="email" checked="checked" value="Email"><label for="email">Email</label>
					<input type="radio" name="login-radio" class="login-mobile" id="mobile" value="Mobile"><label for="mobile">Mobile</label>
				</div>
				<div class="email-login">
					<?php $attributes = array("name" => "login");
					echo form_open("user/login", $attributes); ?>
						<div class="form-group">
						<input type="hidden" name="login_type" value="1">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Your email">
							<span class="text-danger"><?php echo form_error('email'); ?></span>
						</div>					

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
							<span class="text-danger email-error"><?php echo form_error('password'); ?></span>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-default" value="Login">
						</div>
					</form>
				</div>

				<div class="mobile-login" style="display: none;">
					<?php $attributes = array("name" => "login");
					echo form_open("user/login", $attributes); ?>
						<div class="form-group">
							<input type="hidden" name="login_type" value="2">
							<label for="mobile">Mobile</label>
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your mobile">
							<span class="text-danger"><?php echo form_error('mobile'); ?></span>
						</div>					

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
							<span class="text-danger"><?php echo form_error('password'); ?></span>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-default" value="Login">
						</div>
					</form>
				</div>
				<div class="form-group">
					 <a href="<?php echo site_url('user/forgot_password'); ?>">I forgot my password</a><br>
				</div>

		</div>
	</div><!-- .row -->
</div><!-- .container -->