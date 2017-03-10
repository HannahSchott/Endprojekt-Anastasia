<main>
  <div class="backend-wrapper">
    <h3>Neues Produkt erstellen</h3>
    <div class="backend-form">
      <form class="" method="post" enctype="multipart/form-data">
        <?php if( isset($errors) && count($errors) > 0 ) {
          echo '<div class="errors">';
          foreach($errors as $error):

              echo "<p>$error</p>";

          endforeach;
          echo '</div>';
        }?>
        <div class="form-group">
          <label for="name">Firmenname - Produktname</label>
          <input type="text" name="name" >
        </div>
        <div class="form-group">
          <label for="description">Beschreibung</label>
          <textarea name="description" rows="8" cols="80"></textarea>
        </div>
        <div class="form-group">
          <label for="picture">Bild</label>
          <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="form-group">
          <?php echo $categories;?>
        </div>
        <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link">
        </div>
        <div class="form-group">
          <label for="price">Preis</label>
          <input type="number" name="price">
        </div>
        <div class="form-group">
          <label for="month">Monat der Box</label>
          <input type="number" name="month">
          <label for="year">Jahr der Box</label>
          <input type="number" name="year">
        </div>
        <div class="form-group">
          <input class="backend-button" type="submit" name="save" value="speichern">
        </div>
      </form>
    </div>
  </div>
</main>
