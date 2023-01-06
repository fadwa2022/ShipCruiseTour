<?php require  APPROOT . '/views/inc/header.php'; ?>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleupdate.css">




<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">

                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Ajouter Une Croisiere</h3>

                                <form action="<?php echo URLROOT; ?>/admin/updatecroisiere/<?php echo $data['ID_croisiere'] ?>" method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['ID_navire_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['ID_navire']; ?>" style="color: #000;">Choisire Une Navire</label>
                                                <div class="invalid-feedback "><?php echo $data['ID_navire_err']; ?></div>
                                                <select name='ID_navire' class="form-control" class="selectpicker" data-live-search="true" style="    width: 100%;">
                                                    <?php foreach ($data['Navires'] as  $Navires) : ?>
                                                        <option value="<?php echo $data['ID_navire']; ?>"><?php echo $Navires->Nom_navire; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['prix_croisiere_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prix_croisiere']; ?>" style="color: #000;">prix croisiere</label>
                                                <div class="invalid-feedback "><?php echo $data['prix_croisiere_err']; ?></div>
                                                <input type="number" class="form-control" name="prix_croisiere" id="exampleFormControlInput1" min=1 value="<?php echo $data['prix_croisiere']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['nbr_nuits_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nbr_nuits']; ?>" style="color: #000;">nombre des nuits</label>
                                                <div class="invalid-feedback "><?php echo $data['nbr_nuits_err']; ?></div>
                                                <input type="number" class="form-control" name="nbr_nuits" id="exampleFormControlInput1" min=1 value="<?php echo  $data['nbr_nuits']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['Port_dep_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Port_dep']; ?>" style="color: #000;">Choisire Le Premiere Port</label>
                                                <div class="invalid-feedback "><?php echo $data['Port_dep_err']; ?></div>
                                                <select name='Port_dep' class="form-control" class="selectpicker" data-live-search="true" style="    width: 100%;">
                                                    <option value=""> <?php echo $data['Port_dep']; ?></option>
                                                    <?php foreach ($data['ports'] as   $ports) : ?>

                                                        <option><?php echo  $ports->Nom_port; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['Port_Pause_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Port_Pause']; ?>" style="color: #000;">Choisire Le Deuxieme Port</label>
                                                <div class="invalid-feedback "><?php echo $data['Port_Pause_err']; ?></div>
                                                <select name='Port_Pause' class="form-control" class="selectpicker" data-live-search="true" style="    width: 100%;">
                                                    <option value=""> <?php echo $data['Port_Pause']; ?></option>

                                                    <?php foreach ($data['ports'] as   $ports) : ?>
                                                        <option><?php echo  $ports->Nom_port; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['Port_Finale_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Port_Finale']; ?>" style="color: #000;">Choisire Le Troisieme Port </label>
                                                <div class="invalid-feedback "><?php echo $data['Port_Finale_err']; ?></div>
                                                <select name='Port_Finale' class="form-control" class="selectpicker" data-live-search="true" style="    width: 100%;">
                                                    <option value=""> <?php echo $data['Port_Finale']; ?></option>

                                                    <?php foreach ($data['ports'] as   $ports) : ?>
                                                        <option><?php echo  $ports->Nom_port; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['Date_dep_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Date_dep']; ?>" style="color: #000;">La Date De Départ </label>
                                                <div class="invalid-feedback "><?php echo $data['Date_dep_err']; ?></div>
                                                <input type="date" class="form-control" name="Date_dep" id="exampleFormControlInput1" value="<?php echo $data['Date_dep']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="label  <?php echo (!empty($data['Image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Image']; ?>" style="color: #000;">Choisire L'image du Navire </label>
                                                <div class="invalid-feedback "><?php echo $data['Image_err']; ?></div>
                                                <input type="file" class="form-control" name="Image" id="exampleFormControlInput1" placeholder="Prix croisiere">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" style="    background-image: url('<?php echo URLROOT; ?>/images/<?php echo  $data['Image']; ?>');">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/popper.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.validate.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/main.js"></script>

</body>

</html>