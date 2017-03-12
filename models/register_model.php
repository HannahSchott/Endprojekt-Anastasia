<?php

class register_model extends model{

  public function checkIfEmailExist($email)
  {
    $stmt = $this -> db -> prepare("SELECT id FROM users WHERE email = ?");
    $stmt -> bind_param("s", $email);

    $stmt -> execute();

    $stmt -> store_result();

    if($stmt -> num_rows > 0){
      return true;
    }else{
      return false;
    }
  }

  public function setNewUser($data)
  {
    // $firstname = $this -> checkXSS($data['f-firstname']);
    // $lastname = $this -> checkXSS($data['f-lastname']);
    // $email = $this -> checkXSS($data['f-emal']);
    // $birthday = $this -> checkXSS($data['f-birthday']);
    // $pw = $this -> checkXSS($data['f-pw']);

    $firstname = $this -> db -> real_escape_string($data['f-firstname']);
    $lastname = $this -> db -> real_escape_string($data['f-lastname']);
    $email = $this -> db -> real_escape_string($data['f-email']);
    $birthday = $this -> db -> real_escape_string($data['f-birthday']);


    $pw = $this -> setPassword($data['f-pw']);

    $hash = $this -> generateUserhash();
    $userGroup = 1;
    $createdAt = time();
    $isActive = 0;


    if(isset($data['f-newsletter'])){

        $newsletter = "on";
    }else{
      $newsletter = "off";
    }

    $stmt = $this -> db -> prepare("INSERT INTO users(firstname, lastname, email, newsletter, birthday, pw, user_group, hash, created_at, is_active) VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt -> bind_param("ssssssissi", $firstname, $lastname, $email, $newsletter,  $birthday, $pw, $userGroup, $hash, $createdAt, $isActive);
    $stmt -> execute();

    $stmt -> close();

    return $hash;
  }

  private function generateUserhash()
  {
      return uniqid();
  }

  private function setPassword($pw)
  {
      $salt = $this -> generateSalt();
      $pwHash = sha1($pw . $salt) . ':' . $salt;

      return $pwHash;
  }

  private function generateSalt()
  {
      return rand(10000, 99999);
  }

    public function checkIfHashExist($hash)
    {
      $stmt = $this -> db -> prepare("SELECT id FROM users WHERE hash = ?");
      $stmt -> bind_param("s", $hash);
      $stmt -> execute();
      $stmt -> store_result();

      return ($stmt -> num_rows == 1) ? true : false;
    }

  public function checkIfUserIsActiveByHash($hash)
  {
    $stmt = $this -> db -> prepare("SELECT id FROM users WHERE hash = ? AND is_active = 1");
    $stmt -> bind_param("s", $hash);
    $stmt -> execute();
    $stmt -> store_result();

    return ($stmt -> num_rows == 1) ? true : false;
  }

  public function activateUserByHash($hash)
  {
    $stmt = $this -> db -> prepare("UPDATE users SET is_active = '1' WHERE hash = ?");
    $stmt -> bind_param("s", $hash);
    $stmt -> execute();
  }

}
