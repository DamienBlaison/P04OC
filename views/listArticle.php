<div class="bodyback">
<?php

$instanceArticle= new Article("","","","");
$instanceArticle2 =  new Article("","","","");
$listArticle = $instanceArticle->read_articles();



?>

<!-- code pagination-->
<?php

//recupération du nombre d'articles

$countArticle = $instanceArticle->count_articles();
$count=$countArticle->fetch();
$nbarticle = $count[0];

// définition du nombre de page

$nbrepage = $nbarticle/12;
$nbrepage = ceil($nbrepage);
$page = 1;

$a=0;



?>

<div class="container-fluid titlesection">
  <div class="card-header row justify-content-between" id="headingOne">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
        <li class="breadcrumb-item">Gestion du contenu</li>
        <li class="breadcrumb-item active" aria-current="page">Liste des articles</li>
      </ol>
    </nav>
  </div>
</div>
<form class="container-fluid margintb" method="POST" action="./index.php?action=updateArticle">
<div class="container-fluid card-body">


  <div class="col-md-12 mt20">

    <table class=" table table-bordered table-striped table-hover tablepers">
      <tr class="thead-dark">
        <th style="display: none;" scope="col">Id</th>
        <th scope="col">Titre</th>
        <th scope="col">En ligne</th>
        <th scope="col">Nbre commentaires</th>
        <th scope="col">Attente de moderation</th>
      </tr>

      <?php

      while ($donnees = $listArticle->fetch())
      {
        $a=$donnees['id_article'];
        $instanceComment = new Comment("","","","","$a","");

        ?>

        <tr scope="row" id="<?php echo $donnees['id_article'];?>">

          <th style="display: none;"><a href="index.php?action=updateArticle&id=<?php echo $donnees['id_article'];?>&published=<?php echo $donnees['published']; ?>&filtre=4">  <?php echo $donnees['id_article'];?> </a></th>
          <td><a href="index.php?action=updateArticle&id=<?php echo $donnees['id_article'];?>&published=<?php echo $donnees['published']; ?>&filtre=4">  <?php echo $donnees['title'];?></a></td>
          <td><a href="index.php?action=updateArticle&id=<?php echo $donnees['id_article'];?>&published=<?php echo $donnees['published']; ?>&filtre=4"><?php if($donnees['published']==0) { echo"non";} else {echo"oui";};?></a></td>
          <td><a href="index.php?action=updateArticle&id=<?php echo $donnees['id_article'];?>&published=<?php echo $donnees['published']; ?>&filtre=4">
            <?php

            $count_comments= $instanceComment->count_comment($a);
            $count_comments_fetch = $count_comments->fetch();
            echo $count_comments_fetch[0];

            ?>
          </a></td>
          <td><a href="index.php?action=updateArticle&id=<?php echo $donnees['id_article'];?>&published=<?php echo $donnees['published']; ?>&filtre=4">
            <?php
            $count_moderation= $instanceComment->read_comment_statut(2);
            $count_moderation_fetch = $count_moderation->fetch();
            echo $count_moderation_fetch[1];

            ?></a>
          </td>
        </tr>
        <?php
      }
      ?>


    </table>

    <nav aria-label="...">
      <ul class="pagination justify-content-end">

        <?php

        if(isset($_GET['plage'])&& $_GET['plage']>1){?>

          <li class="page-item">
            <a class="page-link" href="index.php?action=listArticle&plage=<?php echo $_GET['plage']-1;?>" tabindex="-1">Previous</a>
          </li>
          <?php
        }else{
          ?>
          <li class="page-item disabled">
            <a class="page-link" href="index.php?action=listArticle&plage=<?php echo $_GET['plage']-1;?>" tabindex="-1">Previous</a>
          </li>
          <?php
        }
        ?>

        <?php
        for ($i=0; $i < $nbrepage ; $i++) {
          ?>
          <li class="page-item"><a href="index.php?action=listArticle&plage=<?php echo $i+1;?>" class="page-link"><?php echo $i+1 ?></a></li>
          <?php
        }
        ?>


        <?php  if( (isset($_GET['plage'])) && ($_GET['plage']<$nbrepage)){?>

          <li class="page-item">
            <a class="page-link" href="index.php?action=listArticle&plage=<?php echo $_GET['plage']+1;?>" tabindex="+1">Next</a>
          </li>
          <?php
        }else{
          ?>
          <li class="page-item disabled">
            <a class="page-link" href="index.php?action=listArticle&plage=<?php echo $_GET['plage']+1;?>" tabindex="+1">Next</a>
          </li>
          <?php
        }
        ?>

      </ul>
    </nav>

  </div>
  </div>
</form>
</div>
