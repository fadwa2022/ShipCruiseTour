<?php require  APPROOT .'/views/inc/header.php';?>

  <!-- price section -->
  <section class="price_section layout_padding">
      <div class="container">
          <div class="heading_container  d-flex justify-content-between">
            <div class="col-md-3">
              <h2>
                  Our Articles
              </h2>
            </div>
            <!-- <a href="<?php echo URLROOT; ?> /articles/add" class="btn btn-warning pull-right"  style=" font-size: 1em;"><i class="ri-pencil-line">Add Article</i></a> -->

          </div>
          <div class="price_container">
          <?php foreach($data['articles'] as $article): ?>

              <div class="box ">
                  <div class="name">
                      <h6>
                      <?php echo $article->name_prod ;?>
                      </h6>
                  </div>
                  <div class="img-box">
                      <img src="<?php echo URLROOT; ?>/images/<?php echo $article->image; ?>" alt="">
                  </div>
                  <div class="detail-box">
                      <h5>
                          $<span> <?php echo $article->prix ;?></span>
                      </h5>
                      <a href="<?php echo URLROOT; ?>/articles/show/<?php echo $article->id_prod; ?>">
                          Buy Now
                      </a>
                  </div>
              </div>
         <?php endforeach;?>

          </div>

      </div>
  </section>
  <!-- end price section -->
  

<?php require  APPROOT .'/views/inc/footer.php';?>
