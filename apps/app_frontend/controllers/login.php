<?php

class login extends controller{

    public function index()
    {
      if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        $this -> proceed();
      }

      $token = uniqid();
      sessions::set('form-token', $token);
      $this -> view -> data['token'] = $token;

      $this -> view -> render('login/index', $this -> view -> data);



    }

    private function proceed()
      {

        if(sessions::get('form-token')== $_POST['token']){
          $uemail = $_POST['f-email'];
          $pw = $_POST['f-pw'];

          if($this -> model -> checkUemail($uemail)){
            if($this -> model -> checkPw($uemail, $pw)) {
              if($this -> model -> checkIfUserIsActive($uemail)){
                //Hier sessions setzen mit user informationen
                  $user = $this -> model -> getUserData($uemail);


                  sessions::set('login', 1);
                  sessions::set('firstname', $user['firstname']);
                  sessions::set('lastname', $user['lastname']);
                  sessions::set('email', $user['email']);
                  sessions::set('uid', $user['id']);
                  sessions::set('role', $user['user_group']);

                  header('Location: ' . APP_ROOT . 'home');
              }else{
                  $this -> view -> data['errors'] = ['Der User wurde noch nicht freigeschalten!'];
              }
            }else{
              $this -> view -> data['errors'] = ['Das Passwort stimmt nicht'];
            }
          }else{
            $this -> view -> data['errors'] = ['Die Emailadresse stimmt nicht'];
          }
        }
        $this -> view -> data['errors'] = ['Formular wurde schon abgeschickt'];

      }

};
