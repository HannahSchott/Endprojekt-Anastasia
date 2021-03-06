<main>
  <div class="order-form">
    <h2>Bestellen</h2>
    <?php if($abo_id == 1) :?>
    <h4>(3-Monats-Abo)</h4>
    <?php elseif($abo_id == 2) :?>
    <h4>(6-Monats-Abo)</h4>
    <?php elseif($abo_id == 3) :?>
    <h4>(1-Jahres-Abo)</h4>
    <?php endif;?>
    <?php if( isset($errors) && count($errors) > 0 ) {
      echo '<div class="errors">';
      foreach($errors as $error):

          echo "<p>$error</p>";

      endforeach;
      echo '</div>';
    }?>
    <form class="order" method="post">
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <div class="form-group" id="f-adress">
        <label for="adress">Adresse</label>
        <input type="text" id="adress" name="adress" value="<?= (isset($_POST['adress']) && ($_POST['adress'] != '')) ? $_POST['adress'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="number">Nummer</label>
        <input type="number" id="number" name="number" value="<?= (isset($_POST['number']) && ($_POST['number'] != '')) ? $_POST['number'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="zip">PLZ</label>
        <input type="number" id="zip" name="zip" value="<?= (isset($_POST['zip']) && ($_POST['zip'] != '')) ? $_POST['zip'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="city">Stadt</label>
        <input type="text" id="city" name="city" value="<?= (isset($_POST['city']) && ($_POST['city'] != '')) ? $_POST['city'] : '' ?>">
      </div>

      <div class="form-group">
        <label for="country">Land</label>
        <input type="text" id="country" name="country" value="<?= (isset($_POST['country']) && ($_POST['country'] != '')) ? $_POST['country'] : '' ?>">
      </div>

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

      <button type="submit" name="weiter" class="order-button">weiter</button>

    </form>
  </div>

</main>
