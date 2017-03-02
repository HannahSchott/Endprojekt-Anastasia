<!-- Login Tempalte für späteres overlay -->
<main>
  <?php
  // sessions::clearAll();
  var_dump($_SESSION);
  // var_dump($_POST);
  ?>
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
      <?php echo $form?>
  </div>
</main>
