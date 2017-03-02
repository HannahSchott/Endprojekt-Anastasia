<main>

  <div class="order-form">
    <h2>Bestellen</h2>

    <form class="order" method="post">
      <div class="form-group" id="f-adress">
        <label for="adress">Adresse</label>
        <input type="text" id="adress" name="adress" value="">
      </div>

      <div class="form-group">
        <label for="number">Nummer</label>
        <input type="number" id="number" name="number" value="">
      </div>

      <div class="form-group">
        <label for="zip">PLZ</label>
        <input type="number" id="zip" name="zip" value="">
      </div>

      <div class="form-group">
        <label for="city">Stadt</label>
        <input type="text" id="city" name="city" value="">
      </div>

      <div class="form-group">
        <label for="country">Land</label>
        <input type="text" id="country" name="country" value="">
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
