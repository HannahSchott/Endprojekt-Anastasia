<?php


class order extends controller{

  public function index($abo_id)
  {
    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
      $this -> proceed($abo_id);
    }
    $this -> view -> render('order/index');
  }

  public function proceed($abo_id)
  {

    if(sessions::get('form-token') == $_POST['token']){

      $this -> view -> data['errors'] = [];

      // Validation
      $val = new validator();
      $val -> val($_POST['address'], "Adresse", true, "text", 5, 20);
      $val -> val($_POST['number'], "Nummer", true, "number", 1, 4);
      $val -> val($_POST['zip'], "PLZ", true, "number", 4, 6);
      $val -> val($_POST['city'], "Stadt", true, "text", 3, 50);
      $val -> val($_POST['country'], "Land", true, "text", 3, 50);

      if(count($val -> getErrors()) > 0) {
      // Hier kommen die errors
      $this -> view -> data['errors'] = $val -> getErrors();
      // Es gibt Fehler
      $this -> view -> data['errors'] = $val -> getErrors();

    }else{

        $this -> model -> setOrder($abo_id, $_POST);
        header('Location:'.APP_ROOT.'register/success');
        exit();
    }


    }

  }
}