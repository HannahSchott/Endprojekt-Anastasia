<?php

class users extends controller{

  public function index()
  {
    $this -> view -> data['users'] = $this -> model -> getAllUsers();
    $this -> view -> render('users/index', $this -> view -> data, $includeAll = false);
  }

  public function edit($user_id)
  {
    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        $this -> saveEdit($user_id);
    }
    $this -> view -> data['user'] = $this -> model -> getUser($user_id);
    $this -> view -> render('users/edit', $this -> view -> data, $includeAll = false);
  }

  public function saveEdit($user_id)
  {

    $this -> view -> data['errors'] = [];

    $val = new validator();
    $val -> val($_POST['lastname'], "Nachname", true, "text", 6, 50);
    $val -> val($_POST['firstname'], "Vorname", true, "text", 6, 50);
    $val -> val($_POST['email'], "Email", true, "email", 6, 50);


    if(count($val -> getErrors()) > 0) {
      $this -> view -> data['errors'] = $val -> getErrors();
    }else{
      if(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){
          return false;
      }

      $this -> model -> saveEdit($user_id);
      header('Location:'.APP_ROOT.'backend/users/success');
      exit();
    }
  }

  public function success()
  {
    $this -> view -> data['success'] = "Änderungen erfolgreich";
    $this -> view -> data['users'] = $this -> model -> getAllUsers();
    $this -> view -> render('users/index', $this -> view -> data, $includeAll = false);
  }
}
