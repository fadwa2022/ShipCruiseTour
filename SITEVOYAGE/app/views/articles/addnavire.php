<?php require  APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<link href="<?php echo URLROOT; ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<!-- Font special for pages-->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Vendor CSS-->
<link href="<?php echo URLROOT; ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="<?php echo URLROOT; ?>/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="<?php echo URLROOT; ?>/css/pageadd.css" rel="stylesheet" media="all">

<body>
    <div class="page-wrapper p-t-180 p-b-100 font-poppins" style="    background-image:url('<?php echo URLROOT; ?>/images/pedro-monteiro-HfIex7qwTlI-unsplash.jpg');    background-size: cover;
;
">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-body">
                    <h2 class="title">Ajouter Une Navire</h2>
                    <form action="<?php echo URLROOT; ?>/Articles/addnavire/" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label  <?php echo (!empty($data['Nom_navire_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Nom_navire']; ?>" style="color: #fff;">Nom du Navire</label>
                            <div class="invalid-feedback "><?php echo $data['Nom_navire_err']; ?></div>
                            <input type="text" class="input--style-3" name="Nom_navire" id="exampleFormControlInput1" placeholder="Nom navire">
                        </div>
                        <!-- prix croi -->
                        <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label  <?php echo (!empty($data['nbr_chambre_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nbr_chambre']; ?>" style="color: #fff;">Nombre des chambre</label>
                            <div class="invalid-feedback "><?php echo $data['nbr_chambre_err']; ?></div>
                            <input type="number" class="input--style-3" name="nbr_chambre" id="exampleFormControlInput1" placeholder="chambre">
                        </div>
                        <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label  <?php echo (!empty($data['nbr_place_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nbr_place']; ?>" style="color: #fff;">Nombre des Voyageurs</label>
                            <div class="invalid-feedback "><?php echo $data['nbr_place_err']; ?></div>
                            <input type="number" class="input--style-3" name="nbr_place" id="exampleFormControlInput1" placeholder="place">
                        </div>


                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URLROOT; ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo URLROOT; ?>/vendor/select2/select2.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo URLROOT; ?>/js/global.js"></script>
    <?php require  APPROOT . '/views/inc/footer.php'; ?>