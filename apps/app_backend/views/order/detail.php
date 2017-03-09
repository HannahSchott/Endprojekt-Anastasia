<main>
  <div class="backend-wrapper">
      <h3 id="<?php echo $order['id'];?>">Bestellungübersicht</h3>

      <p><span class="infotext">Datum:</span>
        <?php echo date("y.m.d H:m",$order['date-ordered']);?>
        <?php echo "<br>"?>
        <?php echo $order['firstname']?>
        <?php echo $order['lastname']?>
        <br>
        <?php
          echo $order['adress'][0].' '.$order['adress'][1];
          echo "<br>";
          echo $order['adress'][2].' '.$order['adress'][3];
        ?>
        <br>
        <br>
        <span class="infotext">Bestellstatus eintragen:</span>
        <ul class="abo_progress">
          <li  class="<?php if($order['order-status'] == 1){ echo("abo_progress--complete");}?>"><a id="orderstatus" href="<?php echo APP_ROOT;?>backend/order/setOrderStatus/1">Bezahlt</a></li>
          <li  class="<?php if($order['order-status'] == 2){ echo("abo_progress--complete");}?>"><a id="orderstatus" href="<?php echo APP_ROOT;?>backend/order/setOrderStatus/2">Verpackt</a></li>
          <li class="<?php if($order['order-status'] == 3){ echo("abo_progress--complete");}?>"><a id="orderstatus" href="<?php echo APP_ROOT;?>backend/order/setOrderStatus/3">Gesendet</a></li>
        </ul>
      </p>
  </div>
</main>
