<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--Video Section-->
<header class="innerBanner">
  <div class="header-content">
    <section class="content-section video-section">
      <div class="pattern-overlay">
        <div class="vid_ban_panel screen_ban">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner carousel-zoom">
              <div class="active item"><img class="img-responsive"  src="<?php echo base_url('assets/images/lalamove_driver_delivery.jpg');?>"></div>
            </div>
          </div>
        </div>
        <div class="vid_ban_panel mob_ban">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner carousel-zoom">
              <div class="active item"><img class="img-responsive"  src="<?php echo base_url('assets/images/lalamove_driver_delivery.jpg');?>"></div>
            </div>
          </div>
        </div>
        <div class="container usermob">
          <div class="row">
            <div class="col-lg-12">
              <!-- <div class="mob_logo"><a href="index.html"><img src="images/logo.png" alt="" class="img-responsive"></a></div>-->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</header>

<!-- form panel on banner  -->
<div class="bannerFormPanel">
 <div class="container">
	<div class="row">
	<div class="col-sm-12 col-md-8 lftContBanner">
        <h2>Turn your idle time into extra income!</h2>
        <h3>More Flexibility. More Income. Get Started Today.</h3>
      </div>
		<div class="col-sm-12 col-md-4 rhtFormBanner">		
        	<h3>Sign up to start earning</h3>
      	<div class="formAll">		
			<?php $attributes = array("name" => "signupform", 'method'  => 'post');
			
			echo form_open("user/driver", $attributes); ?>
			<input type="hidden" name="user_type" value="3">
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" name="first_name" placeholder="Your Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger" style="color: black;"><?php echo form_error('first_name'); ?></span>
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
					<select name="vehicle_type" class="form-control">
						<option value="1" <?php echo set_select('vehicle_type', 'Motorcycle', TRUE); ?> >Motorcycle</option>
						<option value="2" <?php echo set_select('vehicle_type', 'Van'); ?> >Van</option>
						<option value="3" <?php echo set_select('vehicle_type', 'Truck'); ?> >Truck</option>						
				</select>
				<span class="text-danger"><?php echo form_error('vehicle_type'); ?></span>
			</div>

			<div class="form-group">
				<label for="mobile">Training Session</label>
					<select name="training_session" class="form-control">
					    <option value="Monday at 11:00 AM." <?php echo set_select('training_session', 'Monday at 11:00 AM.', TRUE); ?>> Monday at 11:00 AM. </option>
			            <option value="Monday at 3:00 PM." <?php echo set_select('training_session', 'Monday at 3:00 PM.', TRUE); ?>> Monday at 3:00 PM. </option>
			            <option value="Tuesday at 11:00 AM." <?php echo set_select('training_session', 'Tuesday at 11:00 AM.', TRUE); ?>> Tuesday at 11:00 AM. </option>
			            <option value="Tuesday  at 3:00 PM." <?php echo set_select('training_session', 'Tuesday  at 3:00 PM.', TRUE); ?>> Tuesday at 3:00 PM. </option>
			            <option value="Wednesday at 11:00 AM." <?php echo set_select('training_session', 'Wednesday at 11:00 AM.', TRUE); ?>> Wednesday at 11:00 AM. </option>
			            <option value="Wednesday at 3:00 PM." <?php echo set_select('training_session', 'Wednesday at 3:00 PM.', TRUE); ?>> Wednesday at 3:00 PM. </option>
			            <option value="Thursday at 11:00 AM." <?php echo set_select('training_session', 'Thursday at 11:00 AM.', TRUE); ?>> Thursday at 11:00 AM. </option>
			            <option value="Thursday at 3:00 PM." <?php echo set_select('training_session', 'Thursday at 3:00 PM.', TRUE); ?>> Thursday at 3:00 PM. </option>
				
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
					<!-- <button id="input_2" type="submit" class="form-submit-button" data-component="button"> Sign up </button> -->
					<input type="submit"  id="input_2" class="form-submit-button" value="Sign Up">
				</div>
			</form>			
		</div>
		</div>
	</div>
	<!-- .row -->
</div>
</div>
<!-- .container -->
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Two Col -->

<section class="bg-default sectionThree">
  <div class="container-fluid">
    <div class="row">
      <div class="forBusiness seenOn">
        <h2>As Seen On</h2>
        <figure><img src="<?php echo base_url('assets/images/media-logos.png');?>" alt="" class="img-responsive"></figure>
      </div>
    </div>
  </div>
</section>

<section class="bg-default sectionone">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center firstcont">
        <h2>Why Become a Lalamove Driver Now ?</h2>
        <h3>We show you delivery requests nearby.<br> So you can earn on your every trip.</h3>
        <div class="threeColIcons">
          <div class="col-sm-12 col-md-4">
            <figure><img src="<?php echo base_url('assets/images/No+Monthly+Fee.png');?>" alt=""></figure>
            <span>Absolutely No Monthly Fee</span>
          </div>
          <div class="col-sm-12 col-md-4">
            <figure><img src="<?php echo base_url('assets/images/Idle+Time+Income.png');?>" alt=""></figure>
            <span>Turn Idle Time Into Extra Income</span>
          </div>
          <div class="col-sm-12 col-md-4">
            <figure><img src="<?php echo base_url('assets/images/Work+Own+Schedule.png');?>" alt=""></figure>
            <span>Work At Your Own Schedule</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Four col -->
<section class="bg-default sectiontwo">
  <div class="container-fluid">
    <div class=" ">
      <div class="col-lg-12 text-center firstcont">
        <div class="smallCoroSlide">

      <div class="carousel slide media-carousel" id="media">
        <div class="carousel-inner">
          <div class="item  active">
            <img src="<?php echo base_url('assets/images/BK_How_to_use_desktop_driver_eng01.jpg');?>" class="img-responsive">
          </div>
           <div class="item">
            <img src="<?php echo base_url('assets/images/BK_How_to_use_desktop_driver_eng02.jpg');?>" class="img-responsive">
          </div>
           <div class="item">
            <img src="<?php echo base_url('assets/images/BK_How_to_use_desktop_driver_eng03.jpg');?>" class="img-responsive">
          </div>


        </div>
        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
        <a data-slide="next" href="#media" class="right carousel-control">›</a>
      </div>


        </div>
      </div>
    </div>
  </div>
</section>

<!-- Five Col -->
<section class="bg-default sectionone">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center firstcont">
        <h2>Get Started Today</h2>
        <h3>Sign up today to start earning</h3>
      </div>
    </div>
    <div class="fiqBtn"><a href="#" target="_blank" class="custom-btn orange-btn">Sign us now</a></div>
  </div>
</section>
