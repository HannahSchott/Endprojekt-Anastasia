<?php

class order_model extends model{


  public function setOrder($abo_id)
  {

    $user_id = sessions::get('uid');
    $adress = $_POST['adress'];
    $number = $_POST['number'];
    $zip = $_POST['zip'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $payment = $_POST['payment'];

    $data = ':'.$adress.':'.':'.$number.':'.':'.$zip.':'.':'.$city.':'.':'.$country.':';
    $timestamp = time();

    $res = $this -> db -> query("UPDATE users SET adress = '$data', payment = '$payment', `abo-id` = '$abo_id', `abo-timestamp` = '$timestamp' WHERE id = '$user_id'");

    return true;

  }
}
