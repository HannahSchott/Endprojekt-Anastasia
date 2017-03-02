<?php

class logout extends controller{

    public function index()
    {
        sessions::clearAll();
        header('Location:' . APP_ROOT . 'home');
    }
}
