<?php

class users extends controller{

  public function index()
  {
    $this -> view -> render('users/index', $this -> view -> data, $includeAll = false);
  }

}
