<main>
  <div class="backend-wrapper">
      <h3>Bestellungen</h3>
      <table class="backend_table">
        <thead>
          <tr>
            <th>Kundenname</th>
            <th>Abo</th>
            <th>Bestelldatum</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orders as $order):?>
          <tr>
            <th><?php echo $order['lastname']?></th>
            <th><?php echo $order['abo_name']?></th>
            <th><?php echo date("y.m.d H:m",$order['date-ordered']);?></th>
            <?php if($order['order-status'] == '0'):?>
            <th>-</th>
          <?php elseif($order['order-status'] == '1'): ?>
            <th>Bezahlt</th>
          <?php elseif($order['order-status'] == '2'): ?>
            <th>Verpackt</th>
          <?php elseif($order['order-status'] == '3'): ?>
            <th>Gesendet</th>
          <?php endif;?>
          <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/order/detail/<?php echo $order['id']; ?>">details</a></th>
          <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/order/deletOrder/<?php echo $order['id']; ?>">fertig</a></th>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>

  </div>

</main>
