<?php

class order_model extends model{


  public function setOrder($abo_id)
  {
    $user_id = sessions::get('uid');
    $orderSet = $this -> checkIfOrderSet($user_id);

    if($orderSet == true){

      $adress = $_POST['adress'];
      $number = $_POST['number'];
      $zip = $_POST['zip'];
      $city = $_POST['city'];
      $country = $_POST['country'];
      $payment = $_POST['payment'];

      $data = ':'.$adress.':'.':'.$number.':'.':'.$zip.':'.':'.$city.':'.':'.$country.':';
      $timestamp = time();

      //Adresse zu User speichern
      $res = $this -> db -> query("UPDATE users SET adress = '$data', payment = '$payment', `abo-id` = '$abo_id', `abo-timestamp` = '$timestamp' WHERE id = '$user_id'");

      //Bestellung speichern
      $order_status = '0';
      $stmt = $this -> db -> prepare("INSERT INTO orders(user_id, `date-ordered`, abo_id, `order-status`) VALUES (?,?,?,?)");
      $stmt -> bind_param("iiii", $user_id, $timestamp, $abo_id, $order_status);
      $stmt -> execute();
    }else{

    }

  }

  public function checkIfOrderSet($user_id)
  {
    $res = $this -> db -> query("SELECT id FROM orders WHERE user_id = '$user_id' LIMIT 1");

    $result = $res -> fetch_assoc();

    if(count($result) >= 1){
      return false;
    }else{
      return true;
    }
  }
}
