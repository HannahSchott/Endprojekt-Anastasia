<?php

class profile extends controller{

    public function index()
    {

      $user = $this -> model -> getUserData();

      if(isset($user['adress'])){

        $adress = ltrim($user['adress'], ":");
        $adress = rtrim($adress, ":");
        $adress = explode("::", $adress);

        $user['adress'] = $adress;

      }else{
        $user['adress'] = 0;
      }

      $this -> view -> data['user'] = $user;
      $this -> view -> data['products'] = $this -> model -> getCurrentProducts();
      $this -> view -> render('profile/index', $this -> view -> data);
    }

    public function edit($user_id)
    {
      if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
          $this -> saveEdit($user_id);
      }
      $user = $this -> model -> getUserData($user_id);

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
      $this -> view -> render('profile/edit', $this -> view -> data, $includeAll = false);

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


      }
      if(count($val -> getErrors()) > 0) {
        $this -> view -> data['errors'] = $val -> getErrors();
      }else{
        if(isset($this->view->data['errors']) && count($this->view->data['errors']) > 0){
        return false;
        }

        $this -> model -> saveEdit($user_id);
        header('Location:'.APP_ROOT.'profile/success');
        exit();
      }
    }
    public function success()
    {
      $this -> view -> data['success'] = "Deine Änderungen waren erfolgreich.";
      $user = $this -> model -> getUserData();

      if(isset($user['adress'])){

        $adress = ltrim($user['adress'], ":");
        $adress = rtrim($adress, ":");
        $adress = explode("::", $adress);

        $user['adress'] = $adress;

      }else{
        $user['adress'] = 0;
      }

      $this -> view -> data['user'] = $user;
      $this -> view -> data['products'] = $this -> model -> getCurrentProducts();
      $this -> view -> render('profile/index', $this -> view -> data);
    }

    public function setRating($product_id)
    {
      //aktuelle Rating
      $rating = $this -> model ->  getCurrentRating($product_id);

      //rating von Kunde
      //$_POST['crow_id'];
      $new_rating_string = $_POST['rating'];;

      $user_rating = explode("_",$new_rating_string);


      //Neues Rating berechnen
      //Ratings DB
      $rating_db = floatval($rating['comments_rating']);
      //Count DB
      $count_db = floatval($rating['rating_count']);

      $old_rating = floatval($rating_db * $count_db);

      $new_count = floatval($count_db + 1);

      $new_rating = floatval($old_rating + $user_rating[1]);
      //
      // var_dump($old_rating, $user_rating[0]);
      $rating = $new_rating / $new_count;


      $rating_rounded = round($rating * 2)/2;
      $res =  $this -> model -> setNewRating($rating_rounded,$new_count, $product_id);

    }
}
