<main>
  <div class="backend-wrapper">
  
      <h3 id="<?php echo $order['id'];?>">Bestellung Übersicht</h3>

      <ul class="backend-order-info">
        <li><span class="infotext">Boxtype:</span>
          <?php if($order['box-type_id'] == '1'): ?>
          Königin
        <?php elseif($order['box-type_id'] == '2'): ?>
          Prinzessin
        <?php elseif($order['box-type_id'] == '3'): ?>
          Mätresse
        <?php endif;?>
        </li>
        <li><span class="infotext">Abo:</span>
          <?php if($order['abo_id'] = '1'): ?>
            3-Monat
          <?php elseif($order['abo_id'] = '2'): ?>
            6-Monat
          <?php elseif($order['abo_id'] = '3'): ?>
            1-Jahr
          <?php endif; ?>
        </li>
        <li><span class="infotext">Datum:</span><?php echo date("y.m.d H:m",$order['date-ordered']);?></li>
        <li><?php echo $order['firstname'].' '.$order['lastname'];?></li>
        <li><?php echo $order['adress'][0].' '.$order['adress'][1]; ?></li>
        <li><?php echo $order['adress'][2].' '.$order['adress'][3];?></li>

      </ul>
        <span class="infotext">Bestellstatus eintragen:</span>
        <ul class="abo_progress">
          <li  class="<?php if($order['order-status'] == 1){ echo("abo_progress--complete");}?>"><a id="orderstatus" href="<?php echo APP_ROOT;?>backend/order/setOrderStatus/1">Bezahlt</a></li>
          <li  class="<?php if($order['order-status'] == 2){ echo("abo_progress--complete");}?>"><a id="orderstatus" href="<?php echo APP_ROOT;?>backend/order/setOrderStatus/2">Verpackt</a></li>
          <li class="<?php if($order['order-status'] == 3){ echo("abo_progress--complete");}?>"><a id="orderstatus" href="<?php echo APP_ROOT;?>backend/order/setOrderStatus/3">Gesendet</a></li>
        </ul>
  </div>
</main>
