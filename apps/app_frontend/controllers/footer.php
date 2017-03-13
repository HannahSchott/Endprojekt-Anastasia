<?php

class footer extends controller{

  public function setNewsletter()
  {
      $message = [];
      $length = strlen($_POST['email']);
      if(!isset($_POST['email']) || $length == '0'){
        $message['errors']= "Die Emailadresse muss ausgefüllt sein";
      }else{
        $emailexists = $this -> model -> checkIfEmailExist($_POST['email']);
        if($emailexists == false){
          $newsletter = $this -> model -> setNewsletter();
          $message['success'] = "Du hast die erfolgreich angmeldet.";
        }else{
          $message['errors'] = "Du bist bereits angemeldet";
        }
      }

      print_r(json_encode($message));

  }

  public function setContact()
  {
    $message = [];

    $lenghtEmail = strlen($_POST['email']);
    $lengthSubject = strlen($_POST['subject']);
    $lengthMessage = strlen($_POST['message']);

    if(!isset($_POST['email'])||$lenghtEmail == '0'){
      $message['errors'] = "Die Emailadresse muss ausgefüllt sein";
    }elseif(!isset($_POST['subject']) || $lengthSubject == '0'){
        $message['errors'] = "Der Betreff muss ausgefüllt sein";
    }elseif(!isset($_POST['message']) || $lengthMessage == '0'){
        $message['errors'] = "Du musst eine Nachricht verfassen";
    }else {
      $messageExists = $this -> model -> checkIfMessageExists($_POST['message']);
      if($messageExists == false){

        $this -> model -> setContact($_POST['email'], $_POST['subject'], $_POST['message']);
        $message['success'] = "Die Nachricht wurde erfolgreich abgeschickt.";
      }else{
        $message['errors'] = "Diese Nachricht wurde schon verschickt";
      }
    }
    print_r(json_encode($message));

  }
}
