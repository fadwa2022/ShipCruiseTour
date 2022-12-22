<?php require  APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylelogine.css">
<div class="img" style="background-image: url('<?php echo URLROOT; ?>/images/pedro-monteiro-HfIex7qwTlI-unsplash.jpg');">
	<section class="ftco-section">
		<div class="container " style="    padding: 2%;" >
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      <a href="<?php echo URLROOT; ?>/users/register"><h3 class="mb-4 text-center"> Dont have an account?</h3></a>	
		      	<form action="#" class="signin-form" action="<?php echo URLROOT; ?>/users/login" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control  <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" placeholder="Email" name="email"  >
						  <div class="invalid-feedback"  style="  color: #ff0019; "><?php echo $data['email_err']; ?></div>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" placeholder="Password" >
				  <div class="invalid-feedback" style="  color: #ff0019; "><?php echo $data['password_err']; ?></div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php require  APPROOT . '/views/inc/footer.php'; ?>