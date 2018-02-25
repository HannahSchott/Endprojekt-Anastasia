<?php

class products_model extends model{

  public function getAllProducts()
  {
    $res = $this -> db -> query("SELECT id,main_img, name as product_name, slug, comments_rating FROM products WHERE is_active = 1");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getProduct($product_id)
  {
    $res = $this -> db -> query("SELECT name ,slug, main_img, comments_rating, description, product_link, price, month_id FROM products WHERE id = '$product_id' LIMIT 1");

    return $res -> fetch_assoc();
  }

  public function getAllCategoeries()
  {
    $res = $this -> db -> query("SELECT id,name, slug FROM categories");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getProductsByCategorie($categorie_id)
  {
    $res = $this -> db -> query("SELECT products.id, products.name as product_name, products.slug, products.main_img, products.comments_rating, categories.name FROM products LEFT JOIN categories ON products.`categories-id` = categories.id WHERE products.`categories-id` = $categorie_id");

    return $res -> fetch_all(MYSQLI_ASSOC);

  }

  public function getComments($product_id)
  {
    $res = $this -> db -> query("SELECT comments.content, comments.created_at, users.firstname, users.lastname FROM comments LEFT JOIN users ON comments.`user-id` = users.id WHERE comments.`product-id` = '$product_id'");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function setComment($product_id, $comment)
  {
    $content = $this -> db -> real_escape_string($comment);
    $created_at = time();

    $user_id = sessions::get('uid');

    $stmt = $this -> db -> prepare("INSERT INTO comments(`user-id`, content, `product-id`, created_at) VALUES(?,?,?,?)");

    $stmt -> bind_param("isis", $user_id, $content, $product_id, $created_at);

    $stmt -> execute();
  }

  public function getAllProductsBackend()
  {

    $res = $this -> db -> query("SELECT products.id, products.slug, products.main_img, products.name as product_name, products.price, categories.name as categorie_name FROM products LEFT JOIN categories ON products.`categories-id` = categories.id WHERE is_active = '1' ORDER BY id ASC");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getProductCategorie($product_id)
  {
    $res = $this -> db -> query("SELECT categories.name as categorie_name FROM products LEFT JOIN categories ON products.`categories-id` = categories.id WHERE products.id = '$product_id' LIMIT 1");

    return $res -> fetch_assoc();
  }

  public function getAllCategoriesBackend()
  {
    $res = $this -> db -> query("SELECT id,name FROM categories");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function saveEdit($product_id)
  {
    $name = $this -> db -> real_escape_string($_POST['name']);
    $description = $this -> db -> real_escape_string($_POST['description']);
    $link = $this -> db -> real_escape_string($_POST['link']);
    $price = $this -> db -> real_escape_string($_POST['price']);
    $month = $this -> db -> real_escape_string($_POST['month']);
    $year = $this -> db -> real_escape_string($_POST['year']);
    $categorie_id = $this -> db -> real_escape_string($_POST['categorie']);

    $month_id = $month.'.'.$year;
    //Slug
    $slug = explode("-", $name);
    $lower = "";
    foreach($slug as $text){
        $lower .= strtolower($text);
    }

    $slug = str_replace(' ', '', $lower);

    //File file upload

    $target_dir = "../public/img/productimages/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_FILES) && $_FILES["fileToUpload"]["size"] != 0){
      $error = [];
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
      // $error[] = "Das Bild hat den Typ - " . $check["mime"] . ".";
      $uploadOk = 1;
      } else {
      $error[] = "Die Datei ist kein Bild";
      $uploadOk = 0;
      }

      //File exists
      if (file_exists($target_file)) {
          $error[]= "Das Bild existiert schon.";
          $uploadOk = 0;
      }

      // File size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
         $error[] = "Das Bild ist zu groß.";
         $uploadOk = 0;
      }

      // File Format
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $error[] = "Das Bild muss vom Typ: JPG, JPEG, PNG & GIF sein.";
          $uploadOk = 0;
      }else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && $uploadOk == 1 ) {
          $filename = $_FILES["fileToUpload"]["name"];
          $res = $this -> db -> query("UPDATE products SET name = '$name', slug = '$slug' , description = '$description', product_link ='$link',price= '$price', main_img = '$filename', `categories-id` = '$categorie_id',month_id ='$month_id' WHERE id = '$product_id'");

        // "Das Bild ". basename( $_FILES["fileToUpload"]["name"]). " wurde erfolgreich hochgeladen.";
        }else{
          return $result['error'] = $error;
            // $error[] = "Es gab leider einen Fehler.";
        }
      }
      
    }else{
      $res = $this -> db -> query("UPDATE products SET name = '$name', slug = '$slug' , description = '$description', product_link ='$link',price= '$price', `categories-id` = '$categorie_id',month_id ='$month_id' WHERE id = '$product_id'");
    }
  }

  public function saveNewProduct()
  {
    $name = $this -> db -> real_escape_string($_POST['name']);
    $description = $this -> db -> real_escape_string($_POST['description']);
    $link = $this -> db -> real_escape_string($_POST['link']);
    $price = $this -> db -> real_escape_string($_POST['price']);
    $month = $this -> db -> real_escape_string($_POST['month']);
    $year = $this -> db -> real_escape_string($_POST['year']);
    $categorie_id = $this -> db -> real_escape_string($_POST['categorie']);

    $month_id = $month.'.'.$year;
    //Slug
    $slug = explode("-", $name);
    $lower = "";
    foreach($slug as $text){
        $lower .= strtolower($text);
    }

    $slug = str_replace(' ', '', $lower);
    $is_active = 1;
    //File file upload
    //File file upload

    $target_dir = "../public/img/productimages/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_FILES) && $_FILES["fileToUpload"]["size"] != 0){
      $error = [];
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
      // $error[] = "Das Bild hat den Typ - " . $check["mime"] . ".";
      $uploadOk = 1;
      } else {
      $error[] = "Die Datei ist kein Bild";
      $uploadOk = 0;
      }

      //File exists
      if (file_exists($target_file)) {
          $error[]= "Das Bild existiert schon.";
          $uploadOk = 0;
      }

      // File size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
         $error[] = "Das Bild ist zu groß.";
         $uploadOk = 0;
      }

      // File Format
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $error[] = "Das Bild muss vom Typ: JPG, JPEG, PNG & GIF sein.";
          $uploadOk = 0;
      }else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && $uploadOk == 1 ) {
          $filename = $_FILES["fileToUpload"]["name"];
          $res = $this -> db -> query("INSERT INTO products (name,slug,description,main_img,product_link,price,`categories-id`,month_id,is_active)  VALUES ('$name','$slug' ,'$description','$filename', '$link','$price','$categorie_id', '$month_id' ,$is_active)");
        // "Das Bild ". basename( $_FILES["fileToUpload"]["name"]). " wurde erfolgreich hochgeladen.";
        }else{
          $result['error'] = $error;
          return $result;
            // $error[] = "Es gab leider einen Fehler.";
        }
      }
    } else{
      $result['error'][] = 'Bitte lade ein Produktbild hoch';
       return $result;
    }
  }

  public function checkIfCommentExist($comment)
  {
    $user_id = sessions::get('uid');
    $res = $this -> db -> query("SELECT content FROM comments WHERE `user-id` = $user_id");

    $comments = $res -> fetch_all(MYSQLI_ASSOC);
    foreach($comments as $comment_db){
      if($comment_db['content'] == $comment){
        echo'true';
        return true;
      }else{
        echo 'false';
        return false;
      }
    }
  }

  public function deleteProduct($product_id)
  {
    $res = $this -> db -> query("UPDATE products SET is_active = '0' WHERE id ='$product_id'");

    return true;
  }
}
