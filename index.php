<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Ajouter un chapitre</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'#mytextarea' });</script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/perso.css" type="text/css">
</head>
<body>

      <?php
            session_start();

            require('./controller/controller.php');


            if(isset($_GET['action'])){

                  $action           = $_GET['action'];
                  $front_or_back    = explode('/',$action);

            }

            if(isset($front_or_back[0]) &&  $front_or_back[0] == 'backoffice'){

                  include('./controller/backend/backoffice.php');

                  $view       = new Backend();
                  $action     = explode('/',$_GET['action']);
                  $action     = $action[1];
                  $result     = $view->$action();

                  include('./views/backend/menu.php');

                  include('./views/backend/'.$action.'.php');

            } else {

                  include('./controller/frontend/front_office.php');

                  include('./controller/backend/backoffice.php');

                  $backend      = new Backend();

                  $array_config = $backend->config();


                  $view       = new Frontend($array_config);


                  if(isset($_GET['action'])){

                  $action     = $_GET['action'];


                  } else { $action     = 'home';}


                  ;

                  $result     = $view->$action();

                  include('./views/frontend/menu.php');

                  include('./views/frontend/'.$action.'.php');
            }
      ?>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
