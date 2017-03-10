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

      return true;
    }else{
      return false;
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

  public function getOrders()
  {
    $res = $this -> db -> query("SELECT orders.id,orders.user_id, orders.abo_id, orders.`date-ordered`,orders.`order-status`, users.lastname, abos.name as abo_name FROM orders LEFT JOIN users ON orders.user_id = users.id LEFT JOIN abos ON orders.abo_id = abos.id");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getOrder($order_id)
  {
    $res = $this -> db -> query("SELECT orders.id,orders.user_id, orders.abo_id, orders.`date-ordered`,orders.`order-status`, users.lastname, users.firstname, users.adress, users.`box-type_id` FROM orders LEFT JOIN users ON orders.user_id = users.id WHERE orders.id = '$order_id'");

    return $res -> fetch_assoc();
  }

  public function setOrderStatus($status_id)
  {
    $order_id = $_POST['order_id'];
    $stmt = $this -> db -> prepare("UPDATE orders SET `order-status` = ? WHERE id = ?");

    $stmt -> bind_param("ii", $status_id, $order_id);

    $stmt -> execute();

    return true;
  }

}
