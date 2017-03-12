<?php

class contact_model extends model{

  public function getContacts()
  {
    $res = $this -> db -> query("SELECT contact.id, contact.email, contact.subject, contact.message, contact.sent_at , contact.answered_at, users.lastname as user_name FROM contact LEFT JOIN users ON contact.user_id = users.id WHERE contact.is_active = '1' ORDER BY sent_at DESC");

     return $res -> fetch_all(MYSQLI_ASSOC);
  }

  public function deleteMessage($contact_id)
  {
    $res = $this -> db -> query("UPDATE contact SET is_active = '0' WHERE id ='$contact_id'");

    return true;
  }

  public function getContact($contact_id)
  {
    $res = $this -> db -> query("SELECT contact.*, users.lastname, users.firstname FROM contact LEFT JOIN users ON users.id = contact.user_id WHERE contact.id = '$contact_id'");

    return $res -> fetch_assoc();
  }

  public function sendAnswer($contact_id)
  {
    $answered_at = time();
    $res = $this -> db -> query("UPDATE contact SET answered_at = '$answered_at' WHERE id = '$contact_id'");
    
    return true;
  }

}
