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

    $firstname = $data['f-firstname'];
    $lastname = $data['f-lastname'];
    $email = $data['f-email'];
    $birthday = $data['f-birthday'];


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

    $stmt = $this -> db -> prepare("INSERT INTO users(firstname, lastname, email, newsletter, birthday, pw, user_group, created_at, is_active) VALUES (?,?,?,?,?,?,?,?,?)");

    $stmt -> bind_param("ssssssisi", $firstname, $lastname, $email, $newsletter,  $birthday, $pw, $userGroup, $createdAt, $isActive);
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

}
