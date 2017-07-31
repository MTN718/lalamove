<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<div class="page-header">
				<h1>Driver</h1>
			</div>
			<?php $attributes = array("name" => "signupform");
			echo form_open("user/driver", $attributes); ?>
			<input type="hidden" name="user_type" value="3">
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" name="first_name" placeholder="Your Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger"><?php echo form_error('first_name'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="mobile">Phone</label>
					<input class="form-control" name="mobile" placeholder="Mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
				<span class="text-danger"><?php echo form_error('mobile'); ?></span>
			</div>

			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>


			<div class="form-group">
				<label for="mobile">Vehicle Type</label>
					<select name="vehicle_type">
						<option value="1" <?php echo set_select('vehicle_type', 'Motorcycle', TRUE); ?> >Motorcycle</option>
						<option value="2" <?php echo set_select('vehicle_type', 'Van'); ?> >Van</option>
						<option value="3" <?php echo set_select('vehicle_type', 'Truck'); ?> >Truck</option>						
				</select>
				<span class="text-danger"><?php echo form_error('vehicle_type'); ?></span>
			</div>

			<div class="form-group">
				<label for="mobile">Training Session</label>
					<select name="training_session">
						<option value="1" <?php echo set_select('training_session', 'Motorcycle', TRUE); ?> >Motorcycle</option>
						<option value="2" <?php echo set_select('training_session', 'Van'); ?> >Van</option>
						<option value="3" <?php echo set_select('training_session', 'Truck'); ?> >Truck</option>						
				</select>
				<span class="text-danger"><?php echo form_error('training_session'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<span class="text-danger"><?php echo form_error('password_confirm'); ?></span>					
			</div>

			<div class="form-group">
					<input type="submit" class="btn btn-default" value="Sign Up">
				</div>
			</form>			
		</div>
	</div><!-- .row -->
</div><!-- .container -->