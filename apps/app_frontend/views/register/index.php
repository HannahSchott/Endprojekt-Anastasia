<main>
  <div class="register-wrapper">
    <h2>Registrieren</h2>
    <?php if( isset($errors) && count($errors) > 0 ) {
      echo '<div class="errors">';
      foreach($errors as $error):

          echo "<p>$error</p>";

      endforeach;
      echo '</div>';
    }?>
    <form class="form-register" method="post">
    <!--  Form Token hier einfügen-->
      <input type="hidden" name="token" value="<?php echo $token; ?>">

      <div class="form-group">
        <label for="f-firstname">Vorname</label>
        <input type="text" name="f-firstname" id="f-firstname" class="form-control ">
      </div>

      <div class="form-group">
        <label for="f-lastname">Nachname</label>
        <input type="text" name="f-lastname" id="f-lastname" class="form-control ">
      </div>


      <div class="form-group">
        <label for="f-email">Emailadresse</label>
        <input type="email" name="f-email" id="f-email" class="form-control ">
      </div>


      <div class="form-group">
        <label for="f-birthday">Geburtsdatum(TT.MM.YY)</label>
        <input type="date" name="f-birthday" id="f-birthday" class="form-control ">
      </div>


      <div class="form-group">
        <label for="f-pw">Passwort</label>
        <input type="password" name="f-pw" id="f-pw" class="form-control ">
      </div>

      <div class="form-group">
        <label for="f-newsletter" class='contol--checkbox'>Newsletter
          <input type="checkbox" name="f-newsletter" id="f-newsletter" checkbox="checkbox" checked="checked" class="form-control control--checkbox">
          <div class = 'control__indicator'>
          </div>
        </label>
      </div>

      <button name="f-submit" id="f-submit" class="btn register-button">registrieren</button>
    </form>
  </div>
</main>
