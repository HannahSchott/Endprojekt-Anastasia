<main>
    <h3>Profil bearbeiten</h3>
    <div class="backend-form">
      <form class="" method="post">
        <?php if( isset($errors) && count($errors) > 0 ) {
          echo '<div class="errors">';
          foreach($errors as $error):

              echo "<p>$error</p>";

          endforeach;
          echo '</div>';
        }?>
        <div class="form-group">
          <label for="lastname">Nachname</label>
          <input type="text" name="lastname" value="<?php echo $user['lastname']?>">
        </div>
        <div class="form-group">
          <label for="firstname">Vorname</label>
          <input type="text" name="firstname" value="<?php echo $user['firstname']?>">
        </div>
        <div class="form-group">
          <label for="email">Emailadresse</label>
          <input type="text" name="email" value="<?php echo $user['email']?>">
        </div>
        <div class="form-group">
          <label for="newsletter">Newsletter</label>
          <?php if($user['newsletter'] == 'on'):?>
          <input type="checkbox" name="newsletter" value="Newsletter" checked>
        <?php else:?>
          <input type="checkbox" name="newsletter" value="Newsletter">
        <?php endif;?>
        </div>
        <div class="form-group">
          <label for="birthday">Geburtstag</label>
          <input type="date" name="birthday" value="<?php echo $user['birthday']?>">
        </div>

        <?php if($user['adress'] == null): ?>
          <div class="form-group">
            <p>Noch keine Bestlleung</p>
          </div>
        <?php else:?>
          <!--  ADRESSE! -->
          <div class="form-group">
            <label for="adress">Adress</label>
            <input type="text" name="adress" value="<?php echo $user['adress'][0];?>">
            <label for="number">Tür</label>
            <input type="number" name="number" value="<?php echo $user['adress'][1];?>">
            <label for="zip">PLZ</label>
            <input type="number" name="zip" value="<?php echo $user['adress'][2];?>">
            <label for="city">Stadt</label>
            <input type="text" name="city" value="<?php echo $user['adress'][3];?>">
            <label for="country">Land</label>
            <input type="text" name="country" value="<?php echo $user['adress'][4];?>">
            <div class="form-group">
              <p><span class="infotext">Derzeitige Zahlungsmethode: </span><?php echo $user['payment'];?></p>
              <div class="payment-wrapper">
                <div class="payment-option">
                  <label for="paypal" class="order-payment-label">Paypal</label>
                  <input type="radio" class="order-payment-radio" id="paypal" name="payment" value="paypal">
                </div>
                <div class="payment-option">
                  <label for="zahlschein" class="order-payment-label">Zahlschein</label>
                  <input type="radio" class="order-payment-radio" id="zahlschein" name="payment" value="zahlschein">
                </div>
                <div class="payment-option">
                  <label for="sofort" class="order-payment-label">Sofortüberweisung</label>
                  <input type="radio" class="order-payment-radio" id="sofort" name="payment" value="sofortüberweisung">
                </div>
              </div>

            </div>
            <!-- Abo Name, seit wann, box-type-->
              <?php echo $abos?>
              <p><span class="infotext">Seit: </span><?php echo date('d.m.y',$user['abo-timestamp'])?></p>
          </div>
        <?php endif;?>
        <div class="form-group">
          <input class="backend-button" type="submit" name="save" value="speichern">
        </div>
      </form>
  </div>
</main>
