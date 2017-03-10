<main>
  <div class="product-detail-wrapper">

    <div class="product-detail_image">
      <img src="<?php echo APP_ROOT?>public/img/productimages/<?php echo $product['main_img']?>" alt="<?php echo $product['slug']?>">
    </div>

    <div class="product-detail_description">
      <div class="crowns">
        <img src="<?php echo APP_ROOT;?>public/img/crowns/<?php echo $product['comments_rating']?>.png" alt="berwertung <?php echo $product['comments_rating']; ?>">
      </div>

      <h3><?php echo $product['name'] ?></h3>
      <p>
      <?php echo $product['description']; ?>
      </p>

      <div class="product-detail_information">
        <h5>Hier findest du das Produkt:</h5>
        <p><a href="<?php echo $product['product_link']?>"><?php echo $product['product_link']?></a></p>
        <h5>So viel kostet es:</h5>
        <p><?php echo $product['price']?>€</p>
      </div>
    </div>
  </div>

  <div class="product-detail_comments">
    <?php foreach($comments as $comment):?>
    <div class="comment">
      <h4><?php echo $comment['firstname'].' '.$comment['lastname']?><span class="comment_date"> am <?php echo date('j.n.Y',$comment['created_at']);?></span></h4>
      <p><?php echo $comment['content'];?></p>
    </div>

  <?php endforeach;?>

    <div class="user-comment">
      <h4>Dein Kommentar</h4>
      <form class="" method="post">
        <?php if( isset($errors) && count($errors) > 0 ) {
          echo '<div class="errors">';
          foreach($errors as $error):

              echo "<p>$error</p>";

          endforeach;
          echo '</div>';
        }?>
        <input type="hidden" name="token" value="<?php echo $token;?>">
        <textarea class="comment-box"name="comment" id="comment"></textarea>
        <label for="comment-submit"></label>
        <button type="submit" class="button-comment" name="button">kommentieren</button>
      </form>

    </div>
  </div>
</main>
