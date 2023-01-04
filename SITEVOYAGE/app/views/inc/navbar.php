<style>
  img {
    margin: 0 auto;
    display: block;
    margin-top: 20%;
  }
</style>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

<link rel="stylesheet" href="<?php echo URLROOT; ?>/fonts/icomoon/style.css">

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owl.carousel.min.css">

<link rel="stylesheet" href="<?php echo URLROOT; ?>/fonts/icomoon/style.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylenav.css">

<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>


<div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">fadwa@gmail.com</span></a>
        <span class="mx-md-2 d-inline-block"></span>
        <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">+212 6 00 00 00 00 00 </span></a>


        <div class="float-right">

          <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
          <span class="mx-md-2 d-inline-block"></span>
          <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>

        </div>

      </div>

    </div>

  </div>
</div>



<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="site-logo">
    <a href="index.html" class="text-black"><span class="text-primary" style="font-size: 41px;">SAFARER</a>
  </div> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style=" margin-left: 20%; font-size: 18px;">
    <div class="navbar-nav" style="width: 43em !important; justify-content: space-between; display: flex;">
      <a class="nav-item nav-link active" href="<?php echo URLROOT; ?>/pages/index">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/pages/ports">Distinations</a>
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/pages/">Contact Us</a>
      <?php if(isset($_SESSION['ID_user'])) : ?>
        <?php if($_SESSION['Role'] == 1) : ?>

        <a  class="nav-item nav-link"  href="<?php echo URLROOT; ?>/articles/dashbord">gestion</a>
        <?php endif;?>
        <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/pages/reservation">Reservation</a>
        <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
      <?php else : ?>
        <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
      <a class="nav-item nav-link" href="<?php echo URLROOT; ?>/users/register">S'inscrire</a>
      <?php endif; ?>

    </div>
  </div>
</nav>