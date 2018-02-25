<main>
  <div class="backend-wrapper">
    <h3>Produktverwaltung</h3>
    <a href="<?php echo APP_ROOT?>backend/products/newProduct" class="backend-button">Neues Produkt</a>
    <?php if( isset($success) && count($success) > 0 ):?>
      <p class="success_message"><?php echo $success; ?></p>
    <?php endif;?>
    <table class="backend_table">
      <thead>
        <tr>
          <th>Bild</th>
          <th>Name</th>
          <th>Preis</th>
          <th>Kategorie</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($products as $product):?>
        <tr>
          <th><img src="<?php echo APP_ROOT?>public/img/productimages/<?php echo $product['main_img'];?>" alt="<?php echo $product['slug'];?>"></th>
          <th><?php echo $product['product_name'];?></th>
          <th><?php echo $product['price'];?>€</th>
          <th><?php echo $product['categorie_name'];?></th>
          <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/products/edit/<?php echo $product['id']; ?>">bearbeiten</a></th>
          <th><a class="backend-button" href="<?php echo APP_ROOT?>backend/products/delete/<?php echo $product['id']; ?>">löschen</a></th>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
