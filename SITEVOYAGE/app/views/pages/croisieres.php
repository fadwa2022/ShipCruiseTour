
<?php require  APPROOT . '/views/inc/header.php';
?>
<link href="<?= URLROOT; ?>/css/main.css" rel="stylesheet" />
<link href="<?= URLROOT; ?>/css/style.css" rel="stylesheet" />

<style>
  @media (max-width: 767.98px) {
    .border-sm-start-none {
      border-left: none !important;
    }
  }
</style>


<!-- Background image -->
<div class="p-5 text-center bg-image" id="bg-images" style="background-image: url('<?php echo URLROOT; ?>/images/pexels-sơn-bờm-1703909.jpg');
    height: 400px;
    width:100%;
    background-repeat: no-repeat;
    background-size: cover;">
  <div class="mask " data-aos="flip-up">
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
                <input id="search" name="port-depart" type="text" placeholder="port" />
              </div>
              <div class="input-field first-wrap">
              
                <input id="search" name="nom_navire" type="text" placeholder="Navire" />
              </div>

              <!-- <div class="input-field third-wrap">
                <div class="icon-wrap">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
                  </svg>
                </div>
                <input name="Date_dep" class="datepicker" id="return" type="date" placeholder="30 Aug 2018" />
              </div> -->
              <div class="input-field first-wrap">

              <input type="number" id="tentacles" name="Date_dep"
       min="1" max="12">
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

<section style="background-color: #eee;">
  <div class="container py-5">
    <?php foreach ($data['Croisieres'] as  $Croisieres) : ?>
      <?php if (strtotime($Croisieres->Date_dep) > strtotime(date('y-m-d h:m:s'))) : ?>

        <div class="row justify-content-center mb-3" data-aos="zoom-in-left">
          <div class="col-md-12 col-xl-10">
            <div class="card shadow-0 border rounded-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                      <img src="<?php echo URLROOT; ?>/images/<?php echo $Croisieres->Image; ?>" class="w-100" />

                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-6">
                    <h5 style="color:#0d6efd;"><?php echo  $Croisieres->Nom_navire; ?></h5>
                    <h5><?php echo  $Croisieres->nbr_nuits; ?> Nights</h5>

                    <div class="d-flex flex-row">
                      <div class="text-danger mb-1 me-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                    
     <?php foreach ($data['portsc'] as  $portsc) : ?>
      
        <?php if ($Croisieres->ID_croisiere == $portsc->id_croisiere ) :
         
          ?> 
<p style="color: #0d6efd;"><?php echo  $portsc->Nom_port; ?></p>
          <?php endif; ?>
          <?php endforeach; ?>

                    <p class="text-truncate mb-4 mb-md-0">
                      There are many variations of passages of Lorem Ipsum available, but the
                      majority have suffered alteration in some form, by injected humour, or
                      randomised words which don't look even slightly believable.
                    </p>
                  </div>
                  <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                    <div class="d-flex flex-row align-items-center mb-1">
                      <h4 class="mb-1 me-1">$<?php echo $Croisieres->prix_croisiere; ?></h4>
                      <span class="text-danger"><s>$20000.99</s></span>
                    </div>
                    <h6 class="text-success">Free restauration</h6>
                    <div class="d-flex flex-column mt-4">
                      <a class="btn btn-primary btn-sm" href="<?php echo URLROOT; ?>/pages/detaille/<?php echo $Croisieres->ID_croisiere; ?>">Reserver </a>
                   
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>


    <?php endforeach; ?>
  </div>
  <nav aria-label="...">
    <ul id="pagination" class="pagination pagination-circle justify-content-center">

      <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/Pages/croisiere/1">1</a></li>
      <li class="page-item " aria-current="page">
        <a class="page-link" href="<?= URLROOT; ?>/Pages/croisiere/2">2 <span class="visually-hidden">(current)</span></a>
      </li>
      <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/Pages/croisiere/3">3</a></li>

    </ul>
  </nav>
</section>

<?php require  APPROOT . '/views/inc/footer.php'; ?>