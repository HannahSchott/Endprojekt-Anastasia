<?php

class siteerror extends controller{

    public function index()
    {
        $this -> view -> render('siteerror/index', $this -> view -> data, $includeAll = false);
    }
}
