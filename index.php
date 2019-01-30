<?php
// starting session_start
session_start();

//require controllers
require('./controller/controller.php');
require('./controller/frontend/front_office.php');
require('./controller/backend/backoffice.php');

// test url to define required files and method

if(isset($_GET['action'])){

      $rooter = explode('/',$_GET['action']);
      $rooter = $rooter[0];
} else { $rooter = "";};

//Instanciation object controller/backend/backoffice ->Backend

$backend      = new Backend();

// read param config with config Backend's method
$array_config = $backend->config();

//Instanciation object controller/frontend/frontoffice -> frontend
$frontend     = new Frontend();

// test if url form .../backoffice or not 
switch ($rooter) {

      case 'backoffice':

            $action     = explode('/',$_GET['action']);
            $action     = $action[1];
            $result     = $backend->$action();
            require('./views/backend/menu.php');
            require('./views/backend/'.$action.'.php');
            require('./views/footer.php');
            break;

            default:

            if(isset($_GET['action'])){$action = $_GET['action'];
            } else {$action = 'home';}

            $result     = $frontend->$action();

            require('./views/frontend/menu.php');
            require('./views/frontend/'.$action.'.php');
            require('./views/footer.php');
            break;
}
