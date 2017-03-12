<?php

class contact extends controller{
  public function index(){

    $this -> view -> data['contacts'] = $this -> model -> getContacts();

    $this -> view -> render('contact/index', $this -> view -> data, $includeAll = false);
  }

  public function delete($contact_id){
    $this -> model -> deleteMessage($contact_id);
    header('Location:'.APP_ROOT.'backend/contact/success');
    exit();
  }

  public function answer($contact_id)
  {
    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        $this -> sendAnswer($contact_id);
    }
    $this -> view -> data['contact'] = $this -> model -> getContact($contact_id);
    $this -> view -> render('contact/answer', $this -> view -> data, $includeAll = false);
  }
  public function success()
  {
    $this -> view -> data['success'] = "Änderungen erfolgreich";
    $this -> view -> data['contacts'] = $this -> model -> getContacts();
    $this -> view -> render('contact/index', $this -> view -> data, $includeAll = false);
  }

  public function sendAnswer($contact_id)
  {

    $subject = $_POST['subject'];
    $answer = $_POST['message'];
    //Kunden Email
    $email = $_POST['email'];

    // E-Mail wegsenden
    $answer = $_POST['answer'];
    $mail = new PHPMailer();
    $mail -> IsHTML(true);
    $mail -> SetFrom("hannah.schott@hotmail.com", "Anastasia");
    $mail -> AddAddress($email);
    $mail -> Subject = $subject;
    $mail -> Body = $answer;

    $this -> model -> sendAnswer($contact_id);
    header('Location:'.APP_ROOT.'backend/contact/success');
    exit();
  }
}
