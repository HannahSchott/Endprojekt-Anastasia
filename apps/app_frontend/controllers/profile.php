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

}


// $ids = ltrim($ids, ":");
// $ids = rtrim($ids, ":");
// $ids = explode("::", $ids);
