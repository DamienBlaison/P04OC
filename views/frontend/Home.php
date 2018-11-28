<?php

if (isset($_SESSION['login']))
{
  $_SESSION['login']=$_SESSION['login'];
}
else if(isset($_POST['login']) && isset($_POST['password']))
{
  $_SESSION['login']=$_POST['login'];
  $_SESSION['password']=$_POST['password'];
}
  else
  {
  $_SESSION['login']= NULL;
  $_SESSION['password']= NULL;
  };
 ?>

<div class="">

<?php   include('./views/frontend/menu.php');  ?>

<div class="row justify-content-around mt-Titre ">
  <h1 class="Title white fadeInDown">Un billet Simple pour l'Alaska</h1>
</div>
<div class="row justify-content-around text-white ">
  <h1 class="Title white fadeInUpBig">Un roman de Jean Forteroche</h1>
</div>


  <div class="espace">

  </div>
        <h1 class="Titre">L'Auteur</h1>
        <?php include('./views/frontend/author.php'); ?>

        <h1 class="Titre mt200">Le dernier chapitre</h1>
  <div class="secHome container">
    <?php   include('./views/frontend/lastChapters.php');  ?>
  </div>
      <h1 class="Titre">Les chapitres précédents</h1>
  <div class=" container-fluid secHome mb100">
        <?php   include('./views/frontend/otherChapter.php');  ?>
  </div>


    <?php   include('./views/frontend/footer.php');  ?>

  </div>
</div>
