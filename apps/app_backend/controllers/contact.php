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

  public function success()
  {
    $this -> view -> data['success'] = "Änderungen erfolgreich";
    $this -> view -> data['contacts'] = $this -> model -> getContacts();
    $this -> view -> render('contact/index', $this -> view -> data, $includeAll = false);
  }
}
