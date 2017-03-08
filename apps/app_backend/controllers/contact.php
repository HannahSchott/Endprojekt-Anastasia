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
        $this -> sendAnswer();
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

  public function sendAnswer()
  {
    $subject = $_POST['subject'];
    $answer = $_POST['answer'];
    $this -> model -> sendAnser($subject, $answer);
    header('Location:'.APP_ROOT.'backend/contact/success');
    exit();
  }
}
