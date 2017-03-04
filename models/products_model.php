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
    $res = $this -> db -> query("SELECT products.name as product_name, products.slug, products.main_img, products.comments_rating, categories.name FROM products LEFT JOIN categories ON products.`categories-id` = categories.id WHERE products.`categories-id` = $categorie_id");

    return $res -> fetch_all(MYSQLI_ASSOC);

  }

  public function getComments($product_id)
  {
    $res = $this -> db -> query("SELECT comments.content, comments.created_at, users.firstname, users.lastname FROM comments LEFT JOIN users ON comments.`user-id` = users.id WHERE comments.`product-id` = '$product_id'");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function setComment($product_id, $comment)
  {
    // $content = real_escape_string($comment);
    $content = $comment;
    $created_at = time();
    //user_id aus session holen
    $user_id = 17;

    $stmt = $this -> db -> prepare("INSERT INTO comments(`user-id`, content, `product-id`, created_at) VALUES(?,?,?,?)");

    $stmt -> bind_param("isis", $user_id, $content, $product_id, $created_at);

    $stmt -> execute();
  }

  public function getAllProductsBackend()
  {

    $res = $this -> db -> query("SELECT products.id, products.slug, products.main_img, products.name as product_name, products.price, categories.name as categorie_name FROM products LEFT JOIN categories ON products.`categories-id` = categories.id");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getProductCategorie($product_id)
  {
    $res = $this -> db -> query("SELECT products.`categories-id` , categories.name as categorie_name FROM products LEFT JOIN categories ON products.`categories-id` = categories.id WHERE products.id = '1' LIMIT 1");

    return $res -> fetch_assoc();
  }
}
