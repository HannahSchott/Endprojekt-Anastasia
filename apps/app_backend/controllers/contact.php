<?php

class contact extends controller{
  public function index(){

    $this -> view -> render('contact/index', $this -> view -> data, $includeAll = false);
  }
}
