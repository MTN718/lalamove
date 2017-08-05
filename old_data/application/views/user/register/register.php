<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		
<?php
if (isset($company)) { ?>
  <input type="hidden" name="company" class="company-onload" value="<?php echo $company; ?>">
<?php unset($company); } ?>
		<div class="col-md-12 personal">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?php $attributes = array("name" => "signupform");
			echo form_open("user/register", $attributes); ?>
			<input type="hidden" name="user_type" value="1">
			<div class="form-group">
				<label for="name">First Name</label>
				<input class="form-control" name="first_name" placeholder="Your First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('first_name'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="name">Last Name</label>
				<input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('last_name'); ?></span>
			</div>
		
			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<select name="myselect">
					<option value="bg" <?php echo set_select('myselect', 'Bangkok', TRUE); ?> >Bangkok</option>
					<option value="hk" <?php echo set_select('myselect', 'Hong Kong'); ?> >Hong Kong</option>
					<option value="ml" <?php echo set_select('myselect', 'Manila'); ?> >Manila</option>
					<option value="sp" <?php echo set_select('myselect', 'Singapore'); ?> >Singapore</option>
					<option value="tp" <?php echo set_select('myselect', 'Taipei'); ?> >Taipei</option>
				</select>
				<input class="form-control" name="mobile" placeholder="Mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('mobile'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" />
				<span class="text-danger error-personal"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<span class="text-danger error-personal"><?php echo form_error('password_confirm'); ?></span>					
			</div>

				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
			<div class="form-group">
					<button class="business-btn">Try business</button>
			</div>
		</div>
		<div class="col-md-12 business" style="display: none;">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?php $attributes = array("name" => "signupcompanyform");
			echo form_open("user/register", $attributes); ?>
			<input type="hidden" name="user_type" value="2">
				<div class="form-group">
				<label for="name">First Name</label>
				<input class="form-control" name="first_name" placeholder="Your First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('first_name'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="name">Last Name</label>
				<input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('last_name'); ?></span>
			</div>

			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<select name="myselect">
					<option value="bg" <?php echo set_select('myselect', 'Bangkok', TRUE); ?> >Bangkok</option>
					<option value="hk" <?php echo set_select('myselect', 'Hong Kong'); ?> >Hong Kong</option>
					<option value="ml" <?php echo set_select('myselect', 'Manila'); ?> >Manila</option>
					<option value="sp" <?php echo set_select('myselect', 'Singapore'); ?> >Singapore</option>
					<option value="tp" <?php echo set_select('myselect', 'Taipei'); ?> >Taipei</option>
				</select>
				<input class="form-control" name="mobile" placeholder="Mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('mobile'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" />
				<span class="text-danger error-company"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<span class="text-danger error-company"><?php echo form_error('password_confirm'); ?></span>					
			</div>

			<div class="form-group">
				<label for="name">Company Name</label>
				<input class="form-control" name="company_name" placeholder="Company Name" type="text" value="<?php echo set_value('company_name'); ?>" />
				<span class="text-danger"><?php echo form_error('company_name'); ?></span>
			</div>

			<div class="form-group">
				<label for="name">Industry</label>				
				<select name="industry[]" multiple id="industry">
					<option value="11" >Apparel</option>
					<option value="12" >Construction</option>
					<option value="13" >Electronics</option>
					<option value="14" >Food and Beverage</option>
					<option value="15" >Logistics</option>
					<option value="16" >Online Marketplace</option>
					<option value="17" >Other</option>
					<option value="18" >Professional Services</option>
				</select>
				<span class="text-danger"><?php echo form_error('industry[]'); ?></span>
			</div>

			<div class="form-group">
				<label for="name">Staff</label>			
					<select name="staff[]" multiple id="staff">
						<option value="10">1-10</option>
						<option value="50">11-50</option>
						<option value="200">51-200</option>
						<option value="500">201-500</option>
						<option value="501">500+</option>
					</select>
				<span class="text-danger"><?php echo form_error('staff[]'); ?></span>
			</div>

				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
			<div class="form-group">
					<button class="personal-btn">Back</button>
			</div>
		</div>

	</div><!-- .row -->
</div><!-- .container -->