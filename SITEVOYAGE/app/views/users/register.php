<?php require  APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylelogine.css">
<div class="img " style="background-image: url('<?php echo URLROOT; ?>/images/peter-hansen-MeGmdPNe36w-unsplash.jpg')">
    <section class="ftco-section">
        <div class="container " style="padding:1%">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sign Up</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <a href="<?php echo URLROOT; ?>/users/login">
                            <h3 class="mb-4 text-center">Have an account?</h3>
                        </a>
                        <form action="#" class="signin-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control  <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" placeholder="your name " style="    background: #00000087;" >
                                <div class="invalid-feedback" style="  color: #ff0019; "><?php echo $data['name_err']; ?></div>

                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" placeholder="Email" style="    background: #00000087;" >
                                <div class="invalid-feedback"  style="  color: #ff0019; "><?php echo $data['email_err']; ?></div>
                            </div>
                            <div class="form-group">
                                <input name="password" id="password-field" type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" placeholder="Password" style="    background: #00000087;">
                                <div class="invalid-feedback" style="  color: #ff0019; " ><?php echo $data['password_err']; ?></div>

                            </div>
                            <div class="form-group">
                                <input  name="confirm_password" id="password-field" type="password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>" placeholder="Confirme Password" style="    background: #00000087;">
                                <div class="invalid-feedback" style="  color: #ff0019; "><?php echo $data['confirm_password_err']; ?></div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                            </div>

                        </form>
                        <p class="w-100 text-center" style="  color: #fff; ">&mdash; Or Sign In With &mdash;</p>
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