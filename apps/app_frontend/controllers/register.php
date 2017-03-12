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
        $this -> view -> data['errors'] = $val -> getErrors();
      }else{

        // Hier prüfe ich ob der username/ schon existiert
        if($this -> model -> checkIfEmailExist($_POST['f-email'])) {
            array_push($this -> view -> data['errors'], "Die E-Mail-Adresse existiert bereits.");
        }

        if(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){
            return false;
        }


        $userHash = $this -> model -> setNewUser($_POST);

        // E-Mail wegsenden
          $message = "<p>Danke für deine Registrierung. Um diese abzuschließen klicke bitte auf den nachfolgenden Link:<br><br><a href=\"".APP_ROOT."register/activate/$userHash\">Hier klicken</a></p>";
          $mail = new PHPMailer();
          $mail -> IsHTML(true);
          $mail -> SetFrom("hannah.schott@hotmail.com", "Hannah Schott");
          $mail -> AddAddress($_POST['f-email']);
          $mail -> Subject = 'Registrierung Anastasia-Beautyboxen';
          $mail -> Body = $message;


        // Weiterleitung auf register/success
        // header('Location:'.APP_ROOT.'register/success');
        // exit();

      }
    }
  }

  public function success()
  {
      $this -> view -> render('register/success');
  }

  public function activate($hash)
{

  //Text ausgeben!
    if($this -> model -> checkIfHashExist($hash)) {

        if($this -> model -> checkIfUserIsActiveByHash($hash) === false) {

            $this -> model -> activateUserByHash($hash);
            $this -> view -> data['headline'] = "Danke";
            $this -> view -> data['text'] = "Dein Account wurde aktiviert. Du kannst dich nun <a href='/login'>einloggen</a>";
        }else{
            $this -> view -> data['headline'] = "Es gab einen Fehler";
            $this -> view -> data['text'] = "Dein Account wurde bereits aktiviert";
        }
    }else{
        $this -> view -> data = [
            'headline' => "Es gab einen Fehler",
            'text' => "Etwas hat leider nicht geklappt!"
        ];
    }

    $this -> view -> render('register/activate', $this -> view -> data);
}
}
