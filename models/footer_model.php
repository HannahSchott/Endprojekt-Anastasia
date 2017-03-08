<?php

class footer_model extends model{

  public function setNewsletter()
  {

    $email = $_POST['email'];
    $is_active = '1';

    $stmt = $this -> db -> prepare("INSERT INTO newsletter(email,is_active) VALUES(?,?)");
    $stmt -> bind_param("si", $email, $is_active);

    $stmt -> execute();

    return true;

  }

  public function checkIfEmailExist($email)
  {
    $stmt = $this -> db -> prepare("SELECT id FROM newsletter WHERE email = ?");
    $stmt -> bind_param("s", $email);

    $stmt -> execute();

    $stmt -> store_result();

    if($stmt -> num_rows > 0){
      return true;
    }else{
      return false;
    }
  }

  public function setContact($email, $subject, $message)
  {

    $subject = $this -> db -> real_escape_string($subject);
    $email = $this -> db -> real_escape_string($email);
    $message = $this -> db -> real_escape_string($message);

    if(isset($_SESSION['uid'])){
      $user_id = $_SESSION['uid'];
    }else{
      $user_id = NULL;
    }

    $sent_at = time();
    $is_active = 1;

    $res = $this -> db -> query("INSERT INTO contact(user_id,email,subject,message,sent_at,is_active) VALUES('$user_id', '$email','$subject','$message','$sent_at','$is_active')");

    return true;


  }

  public function checkIfMessageExists($message){

    $stmt = $this -> db -> prepare("SELECT id FROM contact WHERE message = ?");
    $stmt -> bind_param("s", $message);

    $stmt -> execute();

    $stmt -> store_result();

    if($stmt -> num_rows > 0){
      return true;
    }else{
      return false;
    }



  }
}
