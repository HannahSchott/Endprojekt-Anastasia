Ï<main class="profile">
  <div class="profile_welcome">
    <h3>Hallo, <strong class="profile_strong"><?php echo sessions::get('firstname'); ?>!</strong></h2>
    <p>In deinem Profil kannst du deine Kontaktdaten aktualisieren, deine Bestellungen
    verfolgen und Produkte bewerten.</p>
  </div>
  <?php if(isset($success) && count($success) > 0 ) :?>
    <p class="success_message"><?php echo $success; ?></p>
  <?php endif;?>
  <div class="profile_uesrinformation">
    <div class="profile_adress">
      <h3>Deine Adresse</h3>
      <ul class="user_adress">
        <?php if($user['adress'] != 0):?>
        <li><?php echo sessions::get('firstname').' '.sessions::get('lastname'); ?></li>
        <li><?php echo $user['adress'][0].' '.$user['adress'][1];?></li>
        <li><?php echo $user['adress'][2].' '.$user['adress'][3]?></li>
      </ul>
      <a href="<?php echo APP_ROOT?>profile/edit/<?php echo sessions::get('uid');?>" class="profile_editbutton">Profil bearbeiten</a>
    <?php else : echo("<ul><li>Wir haben noch keine Adress von dir.</li></ul>");?>
      <?php endif;?>
    </div>

    <div class="profile_abo">
      <h3>Dein Abo</h3>
      <?php if($user['adress'] != 0):?>
        <!--  Abo datum!!!!-->
      <p>3-Monats-Abo seit 02.03.2017</p>
      <ul class="abo_progress">
        <li class="<?php if($user['order-status'] == 1){ echo("abo_progress--complete");}?>">Bezahlt</li>
        <li class="<?php if($user['order-status'] == 2){ echo("abo_progress--complete");}?>">Verpackt</li>
        <li class="<?php if($user['order-status'] == 3){ echo("abo_progress--complete");}?>">Gesendet</li>
      </ul>
    <?php else: echo("Hier würde dein Bestellstatus stehen.");?>
    <?php endif;?>
    </div>
  </div>


  <div class="profile_products">
    <?php if($user['adress'] != 0 && (isset($products) && $products != '')) : ?>
    <h3>Deine <strong class="profile_strong"><?php echo date('F');?></strong>-Box</h3>
    <p>Hier kannst du die Produkte aus deiner letzten Box Bewerten und ein Kommentar dazu schreiben.</p>
    <div class="profile_products-wrapper">
      <?php foreach($products as $product):?>
      <div class="featured_products-product">
        <div class="product-image">
        <a href="<?php echo APP_ROOT?>products/detail/<?php echo $product['id']?>"><img src="<?php echo APP_ROOT;?>public/img/productimages/<?php echo $product['main_img']; ?>" alt="<?php echo $product['slug']; ?>"/></a>
        </div>
        <?php if(!isset($product['commented'])):?>
        <div class="featrued_products-crowns" id="<?php echo $product['id'];?>">
          <div class="crown_5 crown" id="crown_5"></div>
          <div class="crown_4 rating_5 crown" id="crown_4"></div>
          <div class="crown_3 rating_4 rating_5 crown" id="crown_3"></div>
          <div class="crown_2 rating_3 rating_4 rating_5 crown" id="crown_2"></div>
          <div class="crown_1 rating_3 rating_4 rating_5 crown" id="crown_1"></div>
        </div>
      <?php else:?>
        <?php echo($product['commented'])?>
      <?php endif;?>
        <h3><?php echo $product['name']; ?></h3>
        <p><a href="<?php echo APP_ROOT?>products/detail/<?php echo $product['id']?>" class="product_comment">kommentiern</a></p>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  </div>



</main>
