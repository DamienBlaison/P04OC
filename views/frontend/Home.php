<?php include('./././controller/frontend/session/session.php')?>
<div class="col12">
      <?php   include('./views/frontend/menu.php');  ?>
      <div class="container-fluid mt-Titre justify-content-around">
            <div class="">
                  <h1 class="Title white fadeInDown">Un billet Simple pour l'Alaska</h1>
            </div>
            <div class="text-white subtitle ">
                  <h1 class="Title white fadeInUpBig">Un roman de Jean Forteroche</h1>
            </div>
      </div>
      <div class="espace">
      </div>
      <h1 class="Titre">L'Auteur</h1>
      <?php include('./views/frontend/author.php'); ?>
      <h1 class="Titre">Le dernier chapitre</h1>
      <div class=" container">
            <?php   include('./views/frontend/lastChapters.php');  ?>
      </div>
      <h1 class="Titre">Les chapitres précédents</h1>
      <div class=" container-fluid secHome mb100">
            <?php   include('./views/frontend/otherChapter.php');  ?>
      </div>
</div>
