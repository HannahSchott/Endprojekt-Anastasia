<?php

class home extends admin_controller{
  public function index(){

    $this -> view -> render('home/index', $this -> view -> data, $includeAll = false);
  }
}
