<?php

class home extends controller{
  public function index(){

    $this -> view -> render('home/index', $this -> view -> data, $includeAll = false);
  }
}
