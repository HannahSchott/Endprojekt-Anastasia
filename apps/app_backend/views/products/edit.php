<main>
  <div class="backend-wrapper">
    <h3>Produkt bearbeiten</h3>


<!--  name, beschreibung, bild, link, preis, monat, categorie-->
    <div class="backend-form">
      <form class="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Firmenname - Produktname</label>
          <input type="text" name="name" value="<?php echo $product['name']?>">
        </div>
        <div class="form-group">
          <label for="description">Beschreibung</label>
          <textarea name="description" rows="8" cols="80"><?php echo $product['description']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="picture">Bild</label>
          <p><span class="infotext">Derzeitiges Bild:</span> <?php echo $product['main_img'] ?></p>
          <input type="file" name="picture" value="">
        </div>
        <div class="form-group">
          <?php echo $categories;?>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link" value="<?php echo $product['product_link'];?>">
        </div>
        <div class="form-group">
          <label for="price">Preis</label>
          <input type="number" name="price" value="<?php echo $product['price']; ?>">
        </div>
        <div class="form-group">
          <label for="month">Monat der Box</label>
          <input type="number" name="month" value="<?php echo $product['month']; ?>">
          <label for="year">Jahr der Box</label>
          <input type="number" name="ear" value="<?php echo $product['year']; ?>">
        </div>
        <div class="form-group">
          <input class="backend-button" type="submit" name="save" value="speichern">
        </div>




      </form>
    </div>
  </div>

</main>
