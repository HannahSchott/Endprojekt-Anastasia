<?php

class register extends controller{

  public function index(){

    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        $this -> proceed();
    }

    $token = uniqid();
    $this -> view -> data['token'] = $token;
    sessions::set('form-token', $token);

    $this -> view -> render('register/index', $this -> view -> data);
  }


  public function proceed(){
    if(sessions::get('form-token') == $_POST['token']){

      $this -> view -> data['errors'] = [];


      // Validation
      $val = new validator();
      $val -> val($_POST['f-firstname'], "Vorname", true, "text", 3, 20);
      $val -> val($_POST['f-lastname'], "Nachname", true, "text", 3, 20);
      $val -> val($_POST['f-email'], "E-Mail", true, "email");
      $val -> val($_POST['f-pw'], "Passwort", true, "password", 5, 20);
      //birthday

      if(count($val -> getErrors()) > 0) {
      // Hier kommen die errors
      $this -> view -> data['errors'] = $val -> getErrors();
      // Es gibt Fehler
      $this -> view -> data['errors'] = $val -> getErrors();

      }else{

        // Hier prüfe ich ob der username/ schon existiert
        if($this -> model -> checkIfEmailExist($_POST['f-email'])) {
            array_push($this -> view -> data['errors'], "E-Mail existiert bereits.");
        }

        if(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){


            return false;
            echo('Falsch');

        }


        $userHash = $this -> model -> setNewUser($_POST);

        //Email wegsenden

        // Weiterleitung auf register/success

        header('Location:'.APP_ROOT.'register/success');
        exit();

      }
    }
  }

  public function success()
  {
      $this -> view -> render('register/success');
  }
}
