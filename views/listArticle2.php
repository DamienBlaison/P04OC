
<script type="text/javascript">
  function afficheArticle(a,b)
    {
      document.getElementById('titre_article').innerHTML = a;
      document.getElementById('extrait_article').innerHTML = b;
    }

</script>

<?php

$instanceArticle= new Article("","","","");
$instanceArticle2 =  new Article("","","","");
$listArticle = $instanceArticle->read_articles();

?>


<!-- code pagination-->
<?php

//recupération du nombre d'read_articles

$countArticle = $instanceArticle->count_articles();
$count=$countArticle->fetch();
$nbarticle = $count[0];

// définition du nombre de page

$nbrepage = $nbarticle/10;
$nbrepage = ceil($nbrepage);


?>





<div class="container-fluid">
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

  <div class="col-md-12">

    <table class=" table table-bordered table-striped tablepers">
      <tr class="thead-dark">
        <th scope="col">Id</th>
        <th scope="col">Titre</th>
        <th scope="col">Statut</th>
        <th scope="col">Nbre commentaires</th>
        <th scope="col">Attente de moderation</th>
      </tr>

      <?php

      while ($donnees = $listArticle->fetch())
      {
        ?>

          <tr scope="row" id="<?php echo $donnees['id_article'];?>">

            <th><a href="index.php?action=updateArticle&id=<?php echo $donnees['id_article'];?>">  <?php echo $donnees['id_article'];?> </a></th>
            <td><?php echo $donnees['title'];?></td>
            <td><?php echo $donnees['published'];?></td>
            <td><?php echo 'nombre de commentaires'; ?></td>
            <td></td>

            <td style="display:none;"><?php echo substr($donnees['article'], 0 ,1000);?> ... </td>
          </tr>
          <?php
        }
        ?>


      </table>

      <nav aria-label="...">
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <?php
          for ($i=0; $i < $nbrepage ; $i++) {
          ?>
          <li class="page-item"><a href="index.php?action=listArticle&plage=<?php echo $i+1;?>" class="page-link"><?php echo $i+1 ?></a></li>
          <?php
          }
          ?>

          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>

    </div>
</form>
