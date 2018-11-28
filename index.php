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
  <link rel="stylesheet" href="./perso.css" type="text/css">


</head>
<body >


  <?php
  session_start();

  require('./controller/controller.php');

if(isset($_GET['action']))
{
  $a= $_GET['action'];

}
  else { $a = 'Home';

  };

  switch ($a)
  {
    case 'createArticle' :
    include('./views/menu.php');
    include('./views/createArticle.php');
      break;
    case 'listArticle':
    include('./views/menu.php');
    include('./views/listArticle.php');
      break;
    case 'updateArticle':
    include('./views/menu.php');
    include('./views/updateArticle.php');
      break;
    case 'listUsers':
    include('./views/menu.php');
    include('./views/listUsers.php');
      break;
    case 'updateUser':
    include('./views/menu.php');
    include('./views/updateUser.php');
      break;
    case 'moderation':
    include('./views/menu.php');
    include('./views/moderation.php');
      break;

    case 'creationcompte':
    include('./views/frontend/creationcompte.php');
      break;

    case 'chapter':
      include('./views/frontend/chapter.php');
        break;

    default :
    include('./views/frontend/Home.php');

      break;
}

  ?>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
