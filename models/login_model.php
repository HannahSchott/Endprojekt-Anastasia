<?php

class login_model extends model{

  public function checkUemail($uemail)
  {
      $res = $this -> db -> query("SELECT id FROM users WHERE email = '$uemail'");

      return ($res -> num_rows == 1) ? true : false;
  }

  public function checkIfUserIsActive($uemail)
  {
    $res = $this -> db -> query("SELECT id FROM users WHERE email = '$uemail' AND is_active = 1");

    return ($res->num_rows == 1) ? true : false;
  }

  public function checkPw($uemail, $pw)
  {
      $stmt = $this -> db -> prepare("SELECT pw FROM users WHERE email = ?");
      $stmt -> bind_param("s", $uemail);
      $stmt -> execute();
      $stmt -> store_result();

      $stmt -> bind_result($databasePw);
      $stmt -> fetch();

      $hash = explode(":", $databasePw);

      return (sha1($pw . $hash[1]) == $hash[0]) ? true : false;
  }

  public function getUserData($uemail)
  {
    $res = $this -> db -> query("SELECT firstname, lastname, email, id, user_group FROM users WHERE email = '$uemail' LIMIT 1");

    return $res -> fetch_assoc();
  }
}
