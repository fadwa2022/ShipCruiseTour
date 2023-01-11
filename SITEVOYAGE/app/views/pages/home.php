
<?php require  APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href= "<?php echo URLROOT.'/css/stylearticle.css'?>">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
<link href="<?php echo URLROOT; ?>/css/main.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owl.theme.default.min.css">

 
<!-- Background image -->

<div class="p-5 text-center bg-image" id="bg-images" style="background-image: url('<?php echo URLROOT; ?>/images/peter-hansen-MeGmdPNe36w-unsplash.jpg');
    height: 400px;
    width:100%;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="mask "  data-aos="flip-up">
    <div class="d-flex justify-content-center align-items-center ">
      <div class="text-white">
        <div class="s002">
          <form method="post" action="<?= URLROOT ?>/Pages/filter/">
            <div class="inner-form">
              <div class="input-field first-wrap">
                <div class="icon-wrap">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                  </svg>
                </div>
                <input id="search" name="port-depart" type="text" placeholder="What are you looking for?" />
              </div>
              <div class="input-field first-wrap">
                <div class="icon-wrap">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                  </svg>
                </div>
                <input id="search" name="nom_navire" type="text" placeholder="What are you looking for?" />
              </div>
             
              <div class="input-field third-wrap">
                <div class="icon-wrap">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                  </svg>
                </div>
                <input name="Date_dep" class="datepicker" id="return" type="date" placeholder="30 Aug 2018" />
              </div>

              <div class="input-field fifth-wrap">
                <button class="btn-search" type="submit">SEARCH</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Background image -->

<!-- Team -->
<section id="team" class="pb-5" data-aos="fade-up">
    <div class="container">
        <h5 class="section-title h1">Most Popular Tours</h5>
        <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo URLROOT; ?>/images/pedro-monteiro-HfIex7qwTlI-unsplash.jpg" alt="card image"></p>
                                    <h4 class="card-title">Indonesia, Jakarta</h4>
                                    <p class="card-text" style="color: #323030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <a href="#" class="btn btn-primary btn-sm">1779.99$</a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Malisia,bali</h4>
                                    <p class="card-text" style="color: #323030;" style="color: #323030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo URLROOT; ?>/images/datingscout-bmK_HnYK-yA-unsplash.jpg" alt="card image"></p>
                                    <h4 class="card-title">Malisia,bali</h4>
                                    <p class="card-text" style="color: #323030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <a href="#" class="btn btn-primary btn-sm">1888.99$</a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Malisia,bali</h4>
                                    <p class="card-text" style="color: #323030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo URLROOT; ?>/images/jorge-rosal-wUQkpKkRhOs-unsplash.jpg" alt="card image"></p>
                                    <h4 class="card-title">Maldives, Malé</h4>
                                    <p class="card-text" style="color: #323030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <a href="#" class="btn btn-primary btn-sm">2000.00$</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Maldives, Malé</h4>
                                    <p class="card-text" style="color: #323030;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
        </div>
    </div>
</section>
<section class="ftco-section" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h5 class="section-title h1">Our Clients Reviews</h5>
            </div>
            <div class="col-md-12">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img" style="background-image: url('<?php echo URLROOT; ?>/images/pexels-cottonbro-studio-4911140.jpg')">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center" >
                                    <i class="ion-ios-quote" style=" color: #0d6efd !important;"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Racky Henderson</p>
                                <span class="position" style=" color: #0d6efd !important;">Indonesia, Jakarta</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img" style="background-image: url('<?php echo URLROOT; ?>/images/minh-pham--o4PpHE9uG0-unsplash.jpg')">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center" >
                                    <i class="ion-ios-quote" style=" color: #0d6efd !important;"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Henry Dee</p>
                                <span class="position" style=" color: #0d6efd !important;">Maldives</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img" style="background-image: url('<?php echo URLROOT; ?>/images/ben-o-bro-ZbWSt_Hz0-I-unsplash.jpg')">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center" >
                                    <i class="ion-ios-quote" style=" color: #0d6efd !important;"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Rodel Golez</p>
                                <span class="position" style=" color: #0d6efd !important;">Maldives,Bali</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img" style="background-image: url('<?php echo URLROOT; ?>/images/jorge-rosal-wUQkpKkRhOs-unsplash.jpg')">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center" >
                                    <i class="ion-ios-quote" style=" color: #0d6efd !important;"></i>
                                </span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Ken Bosh</p>
                                <span class="position" style=" color: #0d6efd !important;"> Hawaii</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team -->
<div class="container p-3 pt-5" data-aos="fade-up">
    <div class="row">
        <div class="col-md-12 text-center">
            <h5 class="section-title h1">Some Of Our Cruise</h5>
        </div>
        <!-- ferst -->
        <div class="col-md-4" data-aos="zoom-in">
            <hr>
            <div class="profile-card-2"><img src="<?php echo URLROOT; ?>/images/adam-gonzales-A2MkCqYrSUw-unsplash.jpg" class="img img-responsive" style=" margin-top:0%;">
                <div class="profile-name">Grèce-Croisière à la cabine</div>
                <div class="profile-username">1200.99$</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
            <!-- second -->
        </div>
        <!-- 2 -->
        <div class="col-md-4" data-aos="zoom-in">
            <hr>
            <div class="profile-card-2"><img src="<?php echo URLROOT; ?>/images/sheila-jellison-shBk33gUv3Q-unsplash.jpg" class="img img-responsive" style=" margin-top:0%;">
                <div class="profile-name">Polynésie-Croisière à la cabine</div>
                <div class="profile-username">1779.99$</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
        </div>
        <!-- 3 -->
        <div class="col-md-4" data-aos="zoom-in">
            <hr>
            <div class="profile-card-2">
                <img src="<?php echo URLROOT; ?>/images/Yacht_charter.jpg" class="img img-responsive" style=" margin-top:0%;">
                <div class="profile-name">Grenadines-Croisières à la cabine</div>
                <div class="profile-username">1999.99$</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
        </div>
        <button type="button" class="btn btn-info btn-rounded w-50 mt-5 p-3" style="margin-left: 26%;"> <a href="<?php echo URLROOT; ?>/pages/port/1"  style=" text-decoration: none; color=#fff;">Toutes Nos Destinations</a> </button>

    </div>
</div>
<!-- contact -->
<section class="ftco-section " id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper p-5">
                    <div class="row no-gutters" data-aos="zoom-in-down">
                        <div class="col-md-6">
                            <div class="contact-wrap w-100 p-4">
                                <h3 class="mb-4" >Contact Us</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name" style="color: black;">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email" style="color: black;">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject" style="color: black;">Subject</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#" style="color: black;">Message</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch " style="margin-left: 7%;">
                            <div class="info-wrap w-100 p-5 img" style="     border-radius: 5%;background-image: url(' <?php echo URLROOT; ?>/images/pexels-bruno-castelli-1838680.jpg');">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5 mt-5">
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <svg viewBox="0 0 24 24" width="48" height="48">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="rgba(50,152,219,1)" />
                                    </svg>
                                </div>
                                <div class="text">
                                    <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <svg viewBox="0 0 24 24" width="48" height="48">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z" fill="rgba(50,152,219,1)" />
                                    </svg>
                                </div>
                                <div class="text">
                                    <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <svg viewBox="0 0 24 24" width="48" height="48">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z" fill="rgba(50,152,219,1)" />
                                    </svg>
                                </div>
                                <div class="text">
                                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">fadwa@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <svg viewBox="0 0 24 24" width="48" height="48">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path d="M12 11h8.533c.044.385.067.78.067 1.184 0 2.734-.98 5.036-2.678 6.6-1.485 1.371-3.518 2.175-5.942 2.175A8.976 8.976 0 0 1 3 11.98 8.976 8.976 0 0 1 11.98 3c2.42 0 4.453.89 6.008 2.339L16.526 6.8C15.368 5.681 13.803 5 12 5a7 7 0 1 0 0 14c3.526 0 6.144-2.608 6.577-6H12v-2z" fill="rgba(50,152,219,1)" />
                                    </svg>
                                </div>
                                <div class="text">
                                    <p><span>Website</span> <a href="#">fadwa.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/extention/choices.js"></script>
<script src="js/extention/flatpickr.js"></script>
<script>
    flatpickr(".datepicker", {});
</script>
<script>
    const choices = new Choices('[data-trigger]', {
        searchEnabled: false,
        itemSelectText: '',
    });
</script>

<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/popper.js"></script>
    <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require  APPROOT . '/views/inc/footer.php'; ?>