<main>
    <div class="backend-wrapper">
        <h3>Userverwaltung</h3>
      <?php if( isset($success) && count($success) > 0 ) {
        echo $success;
      }?>
      <table class="backend_table">
        <thead>
          <tr>

            <!-- // lastname
            // payment
            // abo_id
            // abo-timestamp
            // user_group
            // is_active -->
            <th>Nachname</th>
            <th>Zahlungsart</th>
            <th>Abo Art</th>
            <th>Abo seit</th>
            <th>Gruppe</th>
            <th>Activ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user):?>
          <tr>
            <th><?php echo $user['lastname']?></th>
            <?php if($user['payment'] != null): ?>
            <th><?php echo $user['payment']?></th>
            <?php else:?>
            <th>-</th>
            <?php endif;?>
            <?php if($user['abo-id'] != null):?>
            <th><?php echo $user['abo_name']?></th>
            <?php else:?>
            <th>-</th>
            <?php endif;?>
            <?php if($user['abo-timestamp'] != null):?>
            <th><?php echo date('Y.m.d', intval($user['abo-timestamp']))?></th>
            <?php else:?>
            <th>-</th>
            <?php endif;?>
            <?php if($user['user_group'] == 1):?>
            <th>Kunde</th>
          <?php elseif($user['user_group'] >= 2):?>
            <th>Admin</th>
          <?php endif;?>
            <?php if($user['is_active'] != 0):?>
            <th>aktiv</th>
            <?php else:?>
            <th>nicht aktiv</th>
            <?php endif;?>
            <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/users/edit/<?php echo $user['id']; ?>">bearbeiten</a></th>
            <th><a class="backend-button" href="delete">löschen</a></th>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

</main>
