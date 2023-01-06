<?php require APPROOT . '/views/inc/header.php';
 ?>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylearticle.css">

<link href="<?php echo URLROOT; ?>/css/main.css" rel="stylesheet" />
<style>
     .profile-card-2 .profile-username{    position: absolute;
    bottom: 11px;
    left: 30px;
    color: #f8f9fa;
    font-size: 27px;
    transition: all linear 0.25s;
    background-color: #629bd887;
    border-radius: 0.75em;}
</style>
<!-- Background image -->
<div class="p-5 text-center bg-image" id="bg-images" style="background-image: url('<?php echo URLROOT; ?>/images/ishan-seefromthesky-Fj_39H4NeOo-unsplash.jpg');height: 400px;width:100%;background-repeat: no-repeat;background-size: cover;">
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
<div class="container p-3 pt-5" data-aos="fade-up">
    <div class="row" id="ports">
        <div class="col-md-12 text-center">
            <h5 class="section-title h1 " style="color: black;">Destinations</h5>
            <h6>Nos multiples croisières en mer nous ont permis de sélectionner pour vous les destinations de rêve et les meilleurs partenaires pour louer votre voilier ou catamaran et vous donner tous les conseils pour profiter ainsi de vos vacances d’exceptio</h6>
        </div>
        <!-- ferst -->
        <?php foreach ($data['Ports'] as  $Ports) :?>
            
        <div class="col-md-4" data-aos="zoom-in">
            <hr>
           <a href="<?php echo URLROOT; ?>/Pages/croisieres/<?php echo $Ports->Nom_port; ?>" style="text-decoration: none;"> 
           <div class="profile-card-2"><img src="<?= URLROOT; ?>/images/<?php echo  $Ports->image; ?>" class="img img-responsive" style=" margin-top:0%;">
                <div class="profile-name" style="    font-size: 52px;"> <?php echo  $Ports->Nom_port; ?> <em style="    font-size: 20px;"> <?php echo  $Ports->Pays; ?></em></div>
            </div></a>
        </div>
        <?php endforeach; ?>
        </div>
</div>
<nav aria-label="...">
  <ul  id="pagination" class="pagination pagination-circle justify-content-center"  >
  
    <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/Pages/port/1">1</a></li>
    <li class="page-item " aria-current="page">
      <a class="page-link" href="<?= URLROOT; ?>/Pages/port/2">2 <span class="visually-hidden">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/Pages/port/3">3</a></li>
   
  </ul>
</nav>
       
 
<!-- <script>
    const list_ports = $data['Ports'] ;
    const list_element = document.getElementById('ports');
    const pagination_element = document.getElementById('pagination');
    let current_page = 1;
    let rows = 3;
 function displaypprts(ports, wrapper, rows_per_page, page){
     wrapper.innerHTML= "";
     page--;
     let start =rows_per_page*page;
     let end =start+rows_per_page;
     let paginatedposts = items.slice(start,end);
     for(let i=loop_start; i<paginatedposts.length;i++){
console.log(list_ports[i]);
     }
 }
 displaypprts(list_ports,list_element,rows,current_page);
</script> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>