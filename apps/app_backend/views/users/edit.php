<main>
  <div class="backend-wrapper">
    <h3>User bearbeiten</h3>
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

        <?php if($user['adress'] == null || $user['payment'] == null || $user['abo-id'] == null || $user['abo-timestamp'] == null): ?>
          <div class="form-group">
            <p>Noch keine Bestlleung</p>
          </div>
        <?php else:?>
          <!--  ADRESSE! -->
          <div class="form-group">

          </div>
          <div class="form-group">
            <p>Derzeitige Zahlungsmethode: <?php echo $user['payment'];?></p>
            <div class="payment-wrapper">
              <div class="payment-option">
                <label for="paypal" class="order-payment-label">Paypal</label>
                <input type="radio" class="order-payment-radio" id="paypal" name="payment" value="paypal" checked="checked">
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
        <?php endif;?>
        <div class="form-group">
          <label for="usergoup">Usergruppe(1 = Kunde, 2= Admin)</label>
          <input type="number" name="usergroup" value="<?php echo $user['user_group']?>">
        </div>
        <div class="form-group">
          <input class="backend-button" type="submit" name="save" value="speichern">
        </div>
      </form>
    </div>

  </div>
</main>
