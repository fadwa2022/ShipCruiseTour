<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- annimation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/SEAFARER-removebg-preview.png" type="image/x-icon">
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
  <!-- responsive style -->
   <link href="<?php echo URLROOT; ?>/css/responsive.css" rel="stylesheet" />
  <!-- icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <title><?php echo SITENAME; ?></title>
</head>

<body >
<link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/SEAFARER-removebg-preview.png" type="image/x-icon">

<style>
            .owl-carousel .owl-dots .owl-dot.active {
      background: #0d6efd !important;}
      #preloader{
        background: #fff url("<?php echo URLROOT; ?>/images/Loading_2.gif") no-repeat center center;
background-size: 10%;
        height: 100vh;
        width:100% ;
        position: fixed;
        z-index: 100;

      }
    </style>
<div id="preloader">


</div>
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

<script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load",function(){
        loader.style.display ="none";
    })
</script>
</body>
</html>