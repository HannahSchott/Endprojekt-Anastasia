<?php

class orders extends controller{
  public function index(){

    $this -> view -> render('orders/index', $this -> view -> data, $includeAll = false);
  }
}
