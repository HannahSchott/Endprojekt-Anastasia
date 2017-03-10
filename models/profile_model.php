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

     $res = $this -> db -> query("SELECT users.lastname, users.firstname, users.email, users.newsletter, users.birthday,users.payment,users.adress, users.`abo-id` as user_abo_id , users.`abo-timestamp`, abos.name as abo_name, orders.`order-status` FROM users LEFT JOIN abos ON abos.id = users.`abo-id` LEFT JOIN orders ON users.id = orders.user_id WHERE users.id = $user_id LIMIT 1");

     return $res -> fetch_assoc();

   }

   public function getAbos()
   {
     $res = $this -> db -> query("SELECT name, id as abo_id FROM abos");

     return $res -> fetch_all(MYSQLI_ASSOC);
   }

   public function saveEdit($user_id)
   {
     //Standart Daten
     $lastname = $_POST['lastname'];
     $firstname = $_POST['firstname'];
     $email = $_POST['email'];
     $birthday = $_POST['birthday'];


     //Newsletter
     if(isset($_POST['newsletter'])){
       $newsletter = 'on';
     }else{
       $newsletter = 'off';
     }

     //Wenn es eine Bestellung gibt
     if(isset($_POST['adress'])){
       $adress = $_POST['adress'];
       $number = $_POST['number'];
       $zip = $_POST['zip'];
       $city = $_POST['city'];
       $country = $_POST['country'];

       $data = ':'.$adress.':'.':'.$number.':'.':'.$zip.':'.':'.$city.':'.':'.$country.':';

       $abo_id = $_POST['abos'];

//UPDATE
       $this -> updateOrder($user_id);
       //Wenn Zahlungsmethode geänder wurde
       if(isset($_POST['payment'])){
         $payment = $_POST['payment'];
         $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname', birthday = '$birthday', adress = '$data', payment = '$payment',`abo-id` = $abo_id,email = '$email', adress = '$data', `newsletter` = '$newsletter' WHERE id = '$user_id'");
       }else{
         $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname', birthday = '$birthday', adress = '$data', `abo-id` = $abo_id,email = '$email', adress = '$data', `newsletter` = '$newsletter' WHERE id = '$user_id'");
       }
     // Wenn es keine Bestellung gab
     }else{
       $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname',  birthday = '$birthday',email = '$email', `newsletter` = '$newsletter' WHERE id = '$user_id'");
     }

     return true;
   }

   public function updateOrder($user_id){

     $abo_id = $_POST['abos'];
     $res = $this -> db -> query("UPDATE orders SET abo_id = '$abo_id' WHERE user_id = '$user_id'");

     return true;
   }


 }
