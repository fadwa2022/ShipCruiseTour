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
                    <h2 class="title">Ajouter Un Port</h2>
                    <form action="<?php echo URLROOT; ?>/Articles/addports/" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label  <?php echo (!empty($data['Nom_port_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Nom_port']; ?>" style="color: #fff;">Nom du Port</label>
                            <div class="invalid-feedback "><?php echo $data['Nom_port_err']; ?></div>
                            <input type="text" class="input--style-3" name="Nom_port" id="exampleFormControlInput1" placeholder="port">
                        </div>
                        <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label  <?php echo (!empty($data['pays_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['pays']; ?>" style="color: #fff;">Nom du Pays</label>
                            <div class="invalid-feedback "><?php echo $data['pays_err']; ?></div>
                            <input type="text" class="input--style-3" name="pays" id="exampleFormControlInput1" placeholder="pays">
                        </div>
                        <!-- image -->
                        <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label  <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>" style="color: #fff;" >Choisire L'image du Navire </label>
                            <div class="invalid-feedback "><?php echo $data['image_err']; ?></div>
                            <input type="file" class="input--style-3" name="image" id="exampleFormControlInput1" placeholder="">
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