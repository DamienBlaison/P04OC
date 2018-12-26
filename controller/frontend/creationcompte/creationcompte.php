<?php

if (isset($_POST['LoginNom'])&&isset($_POST['LoginPrenom'])&&isset($_POST['email'])&& isset($_POST['login'])&& isset($_POST['password']))
{

      $new_user = new User("",htmlentities(addslashes($_POST['LoginNom'])),htmlentities(addslashes($_POST['LoginPrenom'])),htmlentities(addslashes($_POST['email'])),htmlentities(addslashes($_POST['login'])),htmlentities(addslashes($_POST['password'])),'reader');

      $b=$new_user->verif_user(htmlentities(addslashes($_POST['login'])));
      $b=$b->fetch();

      if($b == false)
      {

            $new_user = $new_user->create_user();

            $_SESSION['login']=htmlentities(addslashes($_POST['login']));
            $_SESSION['password']=htmlentities(addslashes($_POST['login']));

            header("Location: http://localhost:8888");
      }

      else

      {
            header("Location: http://localhost:8888/index.php?action=creationcompteko");
      }
}
 ?>
