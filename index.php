<?php
session_start();

require('./controller/controller.php');
require('./controller/frontend/front_office.php');
require('./controller/backend/backoffice.php');

if(isset($_GET['action'])){

      $rooter = explode('/',$_GET['action']);
      $rooter = $rooter[0];
} else { $rooter = "";};

$backend      = new Backend();

$array_config = $backend->config();

$frontend     = new Frontend($array_config);

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
