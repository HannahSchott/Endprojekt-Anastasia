<main>
  <div class="backend-wrapper">
    <h3>Kontaktanfragen</h3>
    <?php if( isset($success) && count($success) > 0 ) :?>
      <p class="success_message"><?php echo $success; ?></p>
    <?php endif;?>
    <table class="backend_table">
      <thead>
        <tr>
          <th>Kunde</th>
          <th>Email</th>
          <th>Betreff</th>
          <th>geschrieben am</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php foreach($contacts as $contact):?>
          <?php if(isset($contact['user_name'])):?>
          <th><?php echo $contact['user_name']?></th>
          <?php else:?>
          <th>-</th>
          <?php endif;?>
          <th><?php echo $contact['email'];?></th>
          <th><?php echo $contact['subject']?></th>
          <th><?php echo date("y.m.d" , $contact['sent_at'])?></th>
          <?php if(isset($contact['answered_at'])):?>
          <th>beantwortet am <?php echo date("d.m.y", $contact['answered_at'] );?></th>
          <?php else:?>
          <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/contact/answer/<?php echo $contact['id']; ?>">antworten</a></th>
          <?php endif;?>
            <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/contact/delete/<?php echo $contact['id']; ?>">löschen</a></th>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
