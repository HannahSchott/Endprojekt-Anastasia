<?php


class users_model extends model{

  public function getAllUsers()
  {

    $res = $this -> db -> query("SELECT users.id,users.lastname, users.payment, users.`abo-id`, users.`abo-timestamp`, users.user_group, users.is_active, abos.name as abo_name  FROM users LEFT JOIN abos ON users.`abo-id` = abos.id WHERE is_active = '1'");

    return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function getUser($user_id)
  {
    $res = $this -> db -> query("SELECT users.id,users.lastname, users.payment, users.* , abos.name as abo_name  FROM users LEFT JOIN abos ON users.`abo-id` = abos.id WHERE users.id = '$user_id'");

    return $res -> fetch_assoc();

  }

  public function saveEdit($user_id)
  {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];

    if(isset($_POST['newsletter'])){
      $newsletter = 'on';

    }else{
      // echo 'off';
      $newsletter = 'off';
    }

    // var_dump($_POST['newsletter']);
    // Newsletter??
    $user_group = $_POST['usergroup'];

    if(!isset($_POST['adress'])){
      $adress = '';
    }else{
      $adress = $_POST['adress'];
      //etc.
    }
    $res = $this -> db -> query("UPDATE users SET lastname = '$lastname', firstname = '$firstname', email = '$email', `newsletter` = '$newsletter', user_group = '$user_group' WHERE id = '$user_id'");

    return true;
  }

  public function delet($user_id)
  {
    $res = $this -> db -> query("UPDATE users SET is_active = '0' WHERE id ='$user_id'");

    return true;
  }

}
