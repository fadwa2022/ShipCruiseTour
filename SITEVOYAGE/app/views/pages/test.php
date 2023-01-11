<?php require APPROOT . '/views/inc/header.php';  ?>
<div class="modal fade" id="port" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">



    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New port</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form method="POST" action="<?php echo URLROOT ?>/Port/addPort" style="width: 50%; margin: auto; margin-top: 10%;" class="was-validated">

                    <div class="mb-3">
                        <input type="text" placeholder="Name" name="namePt" class="form-control" aria-label="file example" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="point_depart" name="pays" class="form-control" aria-label="file example" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="sub_addport" class="btn btn-primary" required> ajoute port</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <div class="row">
        <div style="margin-top: 8%;" class="col-md-12 mb-5">
            <div class="card">
                <div class="card-body bg-light" style="overflow: auto;">
                    <a data-bs-toggle="modal" data-bs-target="#port" data-bs-whatever="@mdo">
                        <i class="fas fa-plus"></i>
                        <h5>add port</h5>
                    </a>
                    <table id="tdata" class="table table-hover ">
                        <thead>
                            <tr>
                                <td scope="col">name</td>
                                <td scope="col">prix</td>
                                <td scope="col">ctgoery</td>
                                <td scope="col">description</td>
                                <td scope="col">image</td>
                                <td scope="col">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($prods as $user) { ?>
                                <tr>


                                    <td scope="row"><?php echo $user[2]
                                                    ?></td>
                                    <td scope="row"><?php echo $user[1]; ?></td>
                                    <td scope="row"> <?php echo $user[7] ?>
                                    <td scope="row"> <?php echo $user[3] ?>
                                    <td scope="row"> <img id="imgp" src="./public/images/<?php echo $user[4] ?>" alt=""></td>
                                    <td scope="row">

                                        <form action=" " method="post">
                                            <input type="hidden" name="id_de" value="<?php echo $user[0]; ?>">
                                            <button style="margin-left: 10px;" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';  ?>