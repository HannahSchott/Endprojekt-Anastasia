<?php

 class profile_model extends model{

   public function getCurrentProducts()
   {
     $month = date("m");
     $year = date("y");
     $current_month = $month . "." . $year;

     $res = $this -> db -> query("SELECT id, name,slug,comments_rating,main_img FROM products WHERE month_id = '$current_month' LIMIT 5");

     return ($res -> fetch_all(MYSQLI_ASSOC));
   }

   public function getUserData()
   {
     $user_id = sessions::get('uid');

     $res = $this -> db -> query("SELECT users.adress, users.`abo-id` as user_abo_id , users.`abo-timestamp`, abos.name as abo_name, orders.`order-status` FROM users LEFT JOIN abos ON abos.id = users.`abo-id` LEFT JOIN orders ON users.id = orders.user_id WHERE users.id = $user_id LIMIT 1");

     return $res -> fetch_assoc();

   }



 }
