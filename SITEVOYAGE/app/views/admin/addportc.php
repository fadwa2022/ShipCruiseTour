
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
                    <h2 class="title">Ajouter les ports</h2>
                    <form action="<?php echo URLROOT; ?>/admin/portscr/<?php echo($data['ID_croisiere']); ?>" method="POST" enctype="multipart/form-data">
                    <div id="new">
                            <div class="input-group" id="portNew">
                         
                                <select name="Port[]" class="mt-5 input--style-3" class="selectpicker" data-live-search="true" style="    width: 100%;">
                                    <?php foreach ($data['ports'] as   $ports) : ?>
                                        <option value="<?php echo  $ports->ID_port; ?>" data-tokens="ketchup mustard"><?php echo  $ports->Nom_port; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            
                        </div>                   <div class="p-t-10 flex justify-content-between">
                            <a onclick="addprod()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lime-700 hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                + </a>
                            <button class="inline-flex justify-center btn btn--pill btn--green" type="submit">Submit</button>
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
    <script>
        function addprod() {
            var ajoutproduit = document.getElementById('new');
            const NewPort = document.getElementById('portNew');
            console.log(NewPort)
            ajoutproduit.innerHTML+=(NewPort.innerHTML);
        }
    </script> 
    <!-- Main JS
    <script src="<?php echo URLROOT; ?>/js/global.js"></script>
    <?php require  APPROOT . '/views/inc/footer.php'; ?>