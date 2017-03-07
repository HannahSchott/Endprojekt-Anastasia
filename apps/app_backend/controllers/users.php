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
    $user = $this -> model -> getUser($user_id);

    if(isset($user['adress'])){

      $adress = ltrim($user['adress'], ":");
      $adress = rtrim($adress, ":");
      $adress = explode("::", $adress);

      $user['adress'] = $adress;

    }

    $abos = $this -> model -> getAbos();

    $html = "<label for='abos'>Abos</label><select name='abos'>";


        foreach($abos as $abo){

          $html .= "<option value=".$abo['abo_id'];

          if($abo['name'] == $user['abo_name']){
            $html .= " selected";
          }

          $html .=">".$abo['name']."</option>";
        }

        $html .= "</select>";

    $this -> view -> data['abos'] = $html;
    $this -> view -> data['user'] = $user;
    $this -> view -> render('users/edit', $this -> view -> data, $includeAll = false);
  }

  public function saveEdit($user_id)
  {

    $this -> view -> data['errors'] = [];

    $val = new validator();
    $val -> val($_POST['lastname'], "Nachname", true, "text", 3, 50);
    $val -> val($_POST['firstname'], "Vorname", true, "text", 3, 50);
    $val -> val($_POST['email'], "Email", true, "email", 6, 50);
    $val -> val($_POST['birthday'], "Geburtstag", true, "number",6);

    if(isset($_POST['adress'])){
      $val -> val($_POST['adress'], "Adresse", true, "text", 3, 50);
      $val -> val($_POST['number'], "Adresse", true, "number", 2, 4);
      $val -> val($_POST['zip'], "PLZ", true, "number", 4, 8);
      $val -> val($_POST['city'], "Stadt", true, "text", 2, 50);
      $val -> val($_POST['country'], "Land", true, "text", 3, 50);
      $val -> val($_POST['abos'], "Abos", true);
      $val -> val($_POST['usergroup'], "Usergruppe", true, "number", 1);

    }
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

  public function delete($user_id)
  {
    $this -> model -> delet($user_id);
    header('Location:'.APP_ROOT.'backend/users/success');
    exit();
  }

  public function success()
  {
    $this -> view -> data['success'] = "Änderungen erfolgreich";
    $this -> view -> data['users'] = $this -> model -> getAllUsers();
    $this -> view -> render('users/index', $this -> view -> data, $includeAll = false);
  }
}
