<?php


class home_model extends model{

  public function getUser()
  {
    return 'Funktioniert!';
  }

  public function  getFeaturedProducts()
  {
    $res = $this -> db -> query("SELECT id,name,slug,main_img,comments_rating FROM products ORDER BY comments_rating DESC LIMIT 3");

    return ($res -> fetch_all(MYSQLI_ASSOC));
  }
}
