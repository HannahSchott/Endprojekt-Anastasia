<?php

class view{

    public $data = array();

    public function __construct()
    {
    }

    public function render($template, $data = array(), $includeAll = true)
    {
        if(count($data) > 0) extract($data);

        if(sessions::get('role') > 0) {
            $nav = require __DIR__ . '/../apps/app_frontend/config/nav_users.php';
        }else{
            $nav = require __DIR__ . '/../apps/app_frontend/config/nav_guests.php';
        }

        if($includeAll == true){
          require __DIR__ . '/../apps/app_frontend/' . APP_VIEWS . 'header.php';
        }else{
            require __DIR__ . '/../apps/'. CURRENT_APP . APP_VIEWS . 'header.php';
        }
        require __DIR__ . '/../apps/' .CURRENT_APP . APP_VIEWS .  $template . '.php';
        if($includeAll) require __DIR__ . '/../apps/app_frontend/'. APP_VIEWS . '/footer.php';
    }
}
