<?php


class users_model extends model{

  public function getAllUsers()
  {

    $res = $this -> db -> query("SELECT users.id,users.lastname, users.payment, users.`abo-id`, users.`abo-timestamp`, users.user_group, `box-type`.name as box_type, users.created_at, users.is_active, abos.name as abo_name  FROM users LEFT JOIN abos ON users.`abo-id` = abos.id  LEFT JOIN `box-type` ON users.`box-type_id` = `box-type`.id WHERE is_active = '1' ORDER BY users.created_at DESC");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getUser($user_id)
  {
    $res = $this -> db -> query("SELECT users.* , abos.name as abo_name FROM users LEFT JOIN abos ON users.`abo-id` = abos.id WHERE users.id = '$user_id'");

    return $res -> fetch_assoc();

  }

  public function saveEdit($user_id)
  {

    //Standart Daten
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $user_group = $_POST['usergroup'];

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
      $user_group = $_POST['usergroup'];

      $this -> updateOrder($user_id);
      //Wenn Zahlungsmethode geändert wurde
      if(isset($_POST['payment'])){
        $payment = $_POST['payment'];
        $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname', birthday = '$birthday', adress = '$data', payment = '$payment',`abo-id` = $abo_id,email = '$email', adress = '$data', `newsletter` = '$newsletter', user_group = '$user_group' WHERE id = '$user_id'");
      }else{
        $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname', birthday = '$birthday', adress = '$data', `abo-id` = $abo_id,email = '$email', adress = '$data', `newsletter` = '$newsletter', user_group = '$user_group' WHERE id = '$user_id'");
      }
    // Wenn es keine Bestellung gab
    }else{
      $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname',  birthday = '$birthday',email = '$email', `newsletter` = '$newsletter', user_group = '$user_group' WHERE id = '$user_id'");
    }

    return true;
  }

  public function updateOrder($user_id){

    $abo_id = $_POST['abos'];
    $res = $this -> db -> query("UPDATE orders SET abo_id = '$abo_id' WHERE user_id = '$user_id'");

    return true;
  }

  public function delet($user_id)
  {
    $res = $this -> db -> query("UPDATE users SET is_active = '0' WHERE id ='$user_id'");

    return true;
  }

  public function getAbos()
  {
    $res = $this -> db -> query("SELECT name, id as abo_id FROM abos");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

}
