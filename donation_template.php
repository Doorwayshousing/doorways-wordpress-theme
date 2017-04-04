<?php
/*
Template Name: Donation Page
*/
 get_header(); ?>
 <!--[if lt IE 9]>
     <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/respond.min.js"></script>
 <![endif]-->
 <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:300,300italic,400,500,700%7cCourgette%7cRaleway:400,700,500%7cCourgette%7cLato:700' type='text/css'>

 <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/tmm_form_wizard_custom.js"></script>
 <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/tmm_form_wizard_style.css" />
 <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/grid.css" />
 <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/tmm_form_wizard_layout.css" />
 <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/fontello.css" />

 <?php if ( has_post_thumbnail() ) {
     $bannerBackground = get_the_post_thumbnail_url();
 } else {
     $bannerBackground = get_template_directory_uri()."/img/gradient-banner.jpg";
 } ?>

<div id="page-content-container">
    <div id="page-content-banner" style="background: url('<?php echo $bannerBackground; ?>') no-repeat center top; background-size: cover;">
        <div id="banner-background">
        </div>
        <div id="banner-title-container">
            <div id="banner-title-text">
                <?php wp_title(''); ?>
            </div>
        </div>
    </div>
    <div id="page-content-body">
        <div class="content-text">
    		<div id="content">
    			<div class="form-container">
    				<div id="tmm-form-wizard" class="container substrate">
    					<div class="row">
    						<div class="col-xs-12">
    							<h2 class="form-login-heading">Secure Donation Form</h2>
    						</div>
    					</div><!--/ .row-->
    					<div class="row stage-container">
    						<div class="stage tmm-success col-md-3 col-sm-3">
    							<div class="stage-header head-icon head-icon-lock"></div>
    							<div class="stage-content">
    								<h3 class="stage-title">Donation Information</h3>
    								<div class="stage-info">
    									Enter your donation details
    								</div>
    							</div>
    						</div><!--/ .stage-->
    						<div class="stage tmm-current col-md-3 col-sm-3">
    							<div class="stage-header head-icon head-icon-user"></div>
    							<div class="stage-content">
    								<h3 class="stage-title">Personal Information</h3>
    								<div class="stage-info">
    									Enter your name, address, and billing details
    								</div>
    							</div>
    						</div><!--/ .stage-->
    						<div class="stage col-md-3 col-sm-3">
    							<div class="stage-header head-icon head-icon-payment"></div>
    							<div class="stage-content">
    								<h3 class="stage-title">Payment Information</h3>
    								<div class="stage-info">
    									Enter your credit card and payment details
    								</div>
    							</div>
    						</div><!--/ .stage-->
    						<div class="stage col-md-3 col-sm-3">
    							<div class="stage-header head-icon head-icon-details"></div>
    							<div class="stage-content">
    								<h3 class="stage-title">Confirm Your Donation</h3>
    								<div class="stage-info">
    									Review and verify your transaction information
    								</div>
    							</div>
    						</div><!--/ .stage-->
    					</div><!--/ .row-->
    					<div class="row">
    						<div class="col-xs-12">
    							<div class="form-header">
    								<div class="form-title form-icon title-icon-user">
    									<b>Personal</b> Information
    								</div>
    								<div class="steps">
    									Steps 1 - 4
    								</div>
    							</div><!--/ .form-header-->
    						</div>
    					</div><!--/ .row-->
    					<form action="/" role="form">
    						<div class="form-wizard">
    							<div class="row">
    								<div class="col-md-8 col-sm-7">
    									<div class="row">
    										<div class="col-md-4 col-sm-4">
    											<div class="input-block">
    												<label>Salutation</label>
    												<div class="dropdown">
    													<select name="salut" class="dropdown-select">
    														<option value="1">Mr</option>
    														<option value="2">Mrs</option>
    													</select>
    												</div><!--/ .dropdown-->
    											</div><!--/ .input-role-->
    										</div>
    									</div><!--/ .row-->
    									<div class="row">
    										<div class="col-md-6 col-sm-6">
    											<fieldset class="input-block">
    												<label for="first-name">First Name</label>
    												<input type="text" id="first-name" placeholder="Name" required />
    											</fieldset><!--/ .input-first-name-->
    										</div>
    										<div class="col-md-6 col-sm-6">
    											<fieldset class="input-block">
    												<label for="last-name">Last Name</label>
    												<input type="text" id="last-name" placeholder="Surname" required />
    											</fieldset><!--/ .input-first-name-->
    										</div>
    									</div><!--/ .row-->
    									<div class="row">
    										<div class="col-md-12 col-sm-12">
    											<fieldset class="input-block">
    												<label for="email">Email</label>
    												<input type="text" id="email" class="form-icon form-icon-mail" placeholder="Please enter your email address" required />
    											</fieldset><!--/ .input-email-->
    										</div>
    									</div><!--/ .row-->
    									<div class="row">
    										<div class="col-md-12 col-sm-12">
    											<fieldset class="input-block">
    												<label for="phone">Phone</label>
    												<input type="text" id="phone" class="form-icon form-icon-phone" placeholder="(   )    -    " required />
    											</fieldset><!--/ .input-phone-->
    										</div><!--/ .input-phone-->
    									</div><!--/ .row-->
    									<div class="row">
    										<div class="col-md-4 col-sm-4">
    											<fieldset class="input-block">
    												<label for="zip-code">Zip Code</label>
    												<input type="text" id="zip-code" placeholder="Code" required />
    											</fieldset><!--/ .code-->
    										</div>
    										<div class="col-md-8 col-sm-8">
    											<fieldset class="input-block">
    												<label for="last-name">Select State</label>
    												<div class="dropdown">
    													<select name="state" class="dropdown-select">
    														<option value="1">Texas</option>
    														<option value="2">New York</option>
    													</select>
    												</div><!--/ .dropdown-->
    											</fieldset><!--/ .input-state-->
    										</div>
    									</div><!--/ .row-->
    									<div class="row">
    										<div class="col-md-12 col-sm-12">
    											<fieldset class="input-block">
    												<label for="address">Home address</label>
    												<input type="text" id="address" placeholder="Address" required />
    											</fieldset><!--/ .input-phone-->
    										</div>
    									</div><!--/ .row-->
    									<div class="row">
    										<div class="col-md-12 col-sm-12">
    											<div class="input-block">
    												<label>Select Country</label>
    												<div class="dropdown">
    													<select name="country" class="dropdown-select">
    														<option value="1">USA</option>
    														<option value="2">Canada</option>
    														<option value="2">UK</option>
    													</select>
    												</div><!--/ .dropdown-->
    											</div><!--/ .input-country-->
    										</div>
    									</div><!--/ .row-->
    								</div>
    							</div><!--/ .row-->
    						</div><!--/ .form-wizard-->
    						<div class="prev">
    							<button class="button button-control" type="button" onclick="window.location.href=''"><span>Prev Step <b>Account Information</b></span></button>
    							<div class="button-divider"></div>
    						</div>
    						<div class="next">
    							<button class="button button-control" type="button" onclick="window.location.href=''"><span>Next Step <b>Payment Information</b></span></button>
    							<div class="button-divider"></div>
    						</div>
    					</form><!--/ form-->
    				</div><!--/ .container-->
    			</div><!--/ .form-container-->
    		</div><!--/ #content-->
        </div>
    </div>
</div>
<?php get_footer(); ?>
