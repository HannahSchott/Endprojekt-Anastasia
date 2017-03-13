<?php

class siteerror extends admin_controller{

    public function index()
    {
        $this -> view -> render('siteerror/index', $this -> view -> data, $includeAll = false);
    }
}
