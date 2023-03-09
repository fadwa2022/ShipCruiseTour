<?php require APPROOT . '/views/inc/header.php';  ?>
<div class="container-fluid mt-5 overflow-scroll">
  <?php flash('message'); ?>
  <table class="table col-12  ">
    <caption> Your List of Reservations</caption>
    <thead>
      <tr>
 
        <th scope="col">Date depart</th>
        <th scope="col">nuits</th>
        <th scope="col">Reservation</th>
        <th scope="col">Date reservation</th>
        <th scope="col">PRIX</th>


      </tr>
    </thead>
    <tbody>

      <?php foreach ($data['reservation'] as  $reservation) : ?>
        <tr>

          <td><?php echo  $reservation->Date_dep; ?></td>
          <td><?php echo  $reservation->nbr_nuits; ?></td>
          <td><?php echo  $reservation->ID_Reservation; ?></td>
          <td><?php echo  $reservation->date_reservation; ?></td>
          <td><?php echo  $reservation->Prix_reservation; ?></td>

          <?php
          $now = time();
          $date_dep = strtotime($reservation->Date_dep);
          if (($date_dep - $now) > (2 * 24 * 60 * 60)) :
          ?>
            <td><a href="<?php echo URLROOT; ?>/Pages/deletereservation/<?php echo $reservation->ID_Reservation; ?>" class="btn btn-primary">annulée</a></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>