
<?php require  APPROOT . '/views/inc/header.php';?>
<link href="<?php echo URLROOT; ?>/css/main.css" rel="stylesheet" />
<link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet" />
<style>
  .cartCH {
    background: transparent;
  }

  .shop {
    font-size: 10px;
  }

  .space {
    letter-spacing: 0.8px !important;
  }

  .second1 a:hover {
    color: rgb(92, 92, 92);
  }

  .active-2 {
    color: rgb(92, 92, 92)
  }


  .breadcrumb>li+li:before {
    content: "" !important
  }

  .breadcrumb {
    padding: 0px;
    font-size: 10px;
    color: #aaa !important;
  }

  .first {
    background-color: white;
  }

  a {
    text-decoration: none !important;
    color: #aaa;
  }

  .btn-lg,
  .form-control-sm:focus,
  .form-control-sm:active,
  a:focus,
  a:active {
    outline: none !important;
    box-shadow: none !important
  }

  .form-control-sm:focus {
    border: 1.5px solid #4bb8a9;
  }

  .btn-group-lg>.btn,
  .btn-lg {
    padding: .5rem 0.1rem;
    font-size: 1rem;
    border-radius: 0;
    height: 2.8rem !important;
    border-radius: 0.2rem !important;
  }

  .card-2 {
    margin-top: 40px !important;
  }

  .card-header {
    background-color: #fff;
    border-bottom: 0px solid #aaaa !important;
  }

  p {
    font-size: 13px;
  }

  .small {
    font-size: 9px !important;
  }

  .form-control-sm {
    height: calc(2.2em + .5rem + 2px);
    font-size: .875rem;
    line-height: 1.5;
    border-radius: 0;
  }

  .cursor-pointer {
    cursor: pointer;
  }

  .boxed {
    padding: 0px 8px 0 8px;
    color: white;
  }

  .boxed-1 {
    padding: 0px 8px 0 8px;
    color: black !important;
    border: 1px solid #aaaa;
  }

  .bell {
    opacity: 0.5;
    cursor: pointer;
  }



  .optionbox select {
    background: #007bff;
    color: #fff;
    padding: 10px;
    width: 14em;
    height: 50px;
    border: none;
    font-size: 20px;
    -webkit-appearance: button;
    outline: none;
  }

  .optionbox:before {
    content: '\f358';
    font-family: "Font Awesome 5 free";
    position: absolute;

    top: 0;
    right: 0;

    height: 50px;
    width: 50px;
    text-align: center;
    line-height: 50px;
    color: #fff;
    font-size: 30px;
    pointer-events: none;
  }

  .popup {
    transform: translate(-50%, -50%) scale(0.1);
    position: absolute;
    visibility: hidden;
    top: 0;
    left: 50%;
    transition: transform 0.4s, top 0.4s;
  }

  .open-popup {
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);

  }

  @media (max-width: 767px) {
    .breadcrumb-item+.breadcrumb-item {
      padding-left: 0
    }
  }
</style>
<div class="container-fluid my-5  " id="popup">
  <div class="row justify-content-center ">
    <div class="col-xl-10">
      <div class="card shadow-lg  ">
        <div class="row justify-content-around">
          <div class="col-md-5">
            <div class="card border-0">
              <div class="card-header pb-0">
                <h2 class="card-title space  " style="color: #0d6efd;"><?php echo $data['Croisieres']->Nom_navire;?></h2>
                <h1 class="card-text text-muted mt-4  space"><?php echo $data['Croisieres']->nbr_nuits ;?> NIGHTS</h1>
                <hr class="my-0">
              </div>
              <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-auto mt-0">
                    <p><b>Ce magnifique voilier de prestige est à louer avec ou sans skipper et hôtesse depuis la plupart de nos destinations.</b></p>
                    <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M12 11a5 5 0 0 1 5 5v6h-2v-6a3 3 0 0 0-2.824-2.995L12 13a3 3 0 0 0-2.995 2.824L9 16v6H7v-6a5 5 0 0 1 5-5zm-6.5 3c.279 0 .55.033.81.094a5.947 5.947 0 0 0-.301 1.575L6 16v.086a1.492 1.492 0 0 0-.356-.08L5.5 16a1.5 1.5 0 0 0-1.493 1.356L4 17.5V22H2v-4.5A3.5 3.5 0 0 1 5.5 14zm13 0a3.5 3.5 0 0 1 3.5 3.5V22h-2v-4.5a1.5 1.5 0 0 0-1.356-1.493L18.5 16c-.175 0-.343.03-.5.085V16c0-.666-.108-1.306-.309-1.904.259-.063.53-.096.809-.096zm-13-6a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm-13 2a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1zm13 0a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" fill="rgba(50,152,219,1)" />
                      </svg>
                      <h4><?php echo  $data['Croisieres']->nbr_place;?> VOYAGEUR</h4>
                    </div>
                  </div>
                </div>
                <div class="card border-0 ">
                  <div class="card-header card-2">
                    <p class="card-text text-muted mt-md-4  mb-2 space">YOUR ROOM <span class=" small text-muted ml-2 cursor-pointer">choose your room</span> </p>
                    <hr class="my-2">
                  </div>
                  <div class="card-body pt-0">
                    <div class="optionbox">

                      <select id="prixrom">
                      <?php foreach ($data['type'] as   $type) : ?>
                                    <option value="<?php echo  $type->prix_type; ?>"  ><?php echo $type->Nom_type; ?></option>
                                <?php endforeach; ?>
                      </select>

                    </div>



                  </div>
                  <div class="row mb-5 mt-4 ">
                    <div class="col-md-7 col-lg-6 mx-auto"><button type="button" id="buttonprix" class="btn btn-block btn-outline-primary btn-lg" onclick="prixroom()">Room Validation</button></div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="row mt-4">
              <div class="col">
                <p class="text-muted mb-2">PAYMENT DETAILS</p>
                <hr class="mt-0">
              </div>
            </div>
            <div class="form-group">
              <label for="NAME" class="small text-muted mb-1">NAME ON CARD</label>
              <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" aria-describedby="helpId" placeholder="BBBootstrap Team">
            </div>
            <div class="form-group">
              <label for="NAME" class="small text-muted mb-1">CARD NUMBER</label>
              <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" aria-describedby="helpId" placeholder="4534 5555 5555 5555">
            </div>
            <div class="row no-gutters">
              <div class="col-sm-6 pr-sm-2">
                <div class="form-group">
                  <label for="NAME" class="small text-muted mb-1">VALID THROUGH</label>
                  <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" aria-describedby="helpId" placeholder="06/21">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="NAME" class="small text-muted mb-1">CVC CODE</label>
                  <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" aria-describedby="helpId" placeholder="183">
                </div>
              </div>
            </div>
            <form action="<?php echo URLROOT; ?>/admin/addreservation/<?php echo $data['Croisieres']->ID_croisiere ; ?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-md-5">
              <div class="col">
             <input  type="submit" name="prixreservation" id="affichprix" value="<?php echo $data['Croisieres']->prix_croisiere ;?>" class="btn  btn-lg btn-block  btn-primary ">
              </div>
            </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
function prixroom(){
        const p = document.getElementById('prixrom').value
        var prix =document.getElementById('affichprix').value
       prixtotale= parseFloat(p)+parseFloat(prix); 
       console.log(prixtotale);
       var price = document.getElementById('affichprix');
       price.value = prixtotale;
      }
        
        </script>
<?php require  APPROOT . '/views/inc/footer.php'; ?>