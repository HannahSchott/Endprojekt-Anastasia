<!-- Login Tempalte für späteres overlay -->
<main>
  <div class="login-wrapper">
      <h3>Login</h3>
      <?php
      if(isset($errors) && count($errors) > 0):
          echo '<div class="errors">';
          foreach($errors as $error):
              echo "<p>$error</p>";
          endforeach;
          echo '</div>';
      endif;
      ?>


      <form id="form-login" action="" method="post">

        <input type="hidden" name="token" value="<?php echo $token?>">

            <div class="form-group">
              <label for="f-email">Emailadresse</label>
              <input type="email" name="f-email" id="f-email" placeholder="Emailadresse" class="form-control ">
            </div>

            <div class="form-group">
              <label for="f-pw">Passwort</label>
              <input type="password" name="f-pw" id="f-pw" placeholder="Passwort" class="form-control ">
            </div>

            <div class="form-group">
              <button type="submit" name="login" class="button-login">einloggen</button>
            </div>
      </form>
    </div>
</main>
