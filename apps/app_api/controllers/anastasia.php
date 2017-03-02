<?php

class anastasia extends controller{

  public function setAnswer()
  {
      $page = $_POST['page_id'];
      $name = $_POST['img_attr'];


      $this -> model -> setAnswer($page, $name);

      // sessions::set($page,$name);
      // sessions::set('geht','nicht');
      // $_SESSION['echt'] = 'nicht';
      //
      // if(sessions::get($page) == true){
      //   return true;
      // }else{
      //   return false;
      // }

  }
}
