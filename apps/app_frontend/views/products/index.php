<main>
<div class="products-sorting">
  <?php

  ?>
  <ul class="product-categries">
    <li class="categorie"><a href="<?php echo APP_ROOT; ?>products">Alle</a></li>
    <?php foreach($categories as $categorie) :?>
    <li class="categorie"><a href="<?php echo APP_ROOT; ?>products/getProductsByCategorie/<?php echo $categorie['id'];?>"alt="<?php echo $categorie['slug'];?>"><?php echo $categorie['name']?></a></li>
    <?php endforeach; ?>
  </ul>

  <!-- <li class="sorting-selected"><a href="#">Augen</a></li> -->
  <div class="products-dropdown">
    <select>
      <option value="ranking">sortieren nach</option>
      <option value="ranking">Bewertung</option>
      <option value="price">Preis</option>
    </select>
  </div>
</div>


<div class="products">
  <?php
  // var_dump($products);
  foreach($products as $product):?>
  <div class="featured_products-product">
    <div class="product-image">
    <a href="<?php echo APP_ROOT?>products/detail/<?php echo $product['id']?>"><img src="<?php echo APP_ROOT?>public/img/productimages/<?php echo $product['main_img']; ?>" alt="<?php echo $product['slug']; ?>"/></a>
    </div>
    <div class="featrued_products-crowns">
      <?php if(!isset($product['comments_rating'])):?>
        <p>Diese Produkt hat noch keine Bewertungen</p>
      <?php else:?>
        <img src="<?php echo APP_ROOT?>public/img/crowns/<?php echo $product['comments_rating']?>.png" alt="crowns"/>
      <?php endif;?>
    </div>
    <h3><?php echo $product['product_name']; ?></h3>
  </div>
<?php endforeach; ?>
</div>
</main>
