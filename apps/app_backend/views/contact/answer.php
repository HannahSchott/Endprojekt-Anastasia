<main>
  <div class="backend-wrapper">
    <h3>Konatkanfrage beantworten</h3>
    <div class="contact">
      <!-- Wenn es Kunde ist-->
      <?php if(isset($contact['firstname']) && isset($contact['lastname'])):?>
      <p><span class="infotext">Name des Kunden:</span><?php echo $contact['firstname']." ".$contact['lastname']?></p>
      <?php else:?>
      <p><span class="infotext">Kein registrierter Kunde</span></p>
      <?php endif;?>
      <p><span class="infotext">Email:</span><?php echo $contact['email']?></p>

      <p><span class="infotext">Betreff:</span><?php echo $contact['subject']?></p>

      <p class="contact-message-wrapper">
        <span class="infotext">Nachricht:</span>
        <span class="contac-message">
          <?php echo $contact['message'];?>
        </span>
      </p>
    </div>
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
          <label for="subject">Betreff</label>
          <input type="text" name="subject" value="Re: <?php echo $contact['subject'];?>">
        </div>
        <div class="form-group">
          <label for="message">Antwort</label>
          <textarea name="message" rows="8" cols="80"></textarea>
        </div>
        <div class="form-group">
          <input class="backend-button" type="submit" name="answer" value="antworten">
        </div>
      </form>

    </div>
  </div>
</main>
