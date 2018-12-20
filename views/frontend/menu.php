

<nav class="navbar navbar-dark bg-dark sticky-top opacity">

  <a class="navbar-brand" href="index.php"> <h1 class="Title">Un billet Simple pour l'Alaska</h1></a>

  <ul>

<?php

if( $_SESSION['login']== NULL)
{
  ?>
  <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#LoginForm">Se connecter</button>
  <?php

} else {

  $user=new User("","","","",$_SESSION['login'],$_SESSION['password'],"");
  $user=$user->verif_user($_SESSION['login']);
  $user=$user->fetch();

  if($user === false)
  {
    $_SESSION['login']= NULL;
    $_SESSION['data_user']= NULL;
    echo "<script> alert('login ou mot de passe eronné ou inexistant');</script>";
    ?>
      <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#LoginForm">Se connecter</button>
    <?php

  } else {

        $_SESSION['data_user']=$user;

        if($_SESSION['data_user']['role']=='admin')
          {
            ?> <a href="index.php?action=listArticle" id="connexion"class="btn btn-sm btn-outline-secondary"> Administration</a>
            <?php
          } else {
            ?>
          <button type="button" class="btn btn-sm btn-outline-secondary"id="connexion" > Bonjour <?php echo $user['firstName'] ?></button>
          <?php
          };
      };
    };
?>

  </ul>

</nav>

<?php include('login.php') ?>
