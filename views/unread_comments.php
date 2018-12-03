<?php include('./views/menu.php'); ?>
<?php
      $comments = new Comment("","","","","","","");
      $last_comments = $comments->unread_comments();
      $count_last_comments = $comments->count_unread_comments();


 ?>

 <?php

 //recupération du nombre de commetaires


 $count=$count_last_comments->fetch();
 $nbComments = $count[0];

 // définition du nombre de page

 $nbrepage = $nbComments/12;
 $nbrepage = ceil($nbrepage);
 $page = 1;

 $a=0;



 ?>


<div class="container-fluid titlesection">
  <div class="card-header row justify-content-between" id="headingOne">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
        <li class="breadcrumb-item">Commentaires</li>
        <li class="breadcrumb-item active" aria-current="page">Les derniers commentaires</li>
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
        <th scope="col">Chapitre</th>
        <th scope="col">Titre</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Lu</th>
        <th scope="col">Actions</th>
      </tr>

      <?php

      while ($data = $last_comments->fetch())
      {

        ?>

        <tr scope="row" id="<?php echo $data['id_comment'];?>">

          <th style="display: none;"></th>
          <td><?php echo $data['article'];?></td>
          <td><?php echo $data['title'];?></td>
          <td><?php echo $data['comment'];?></td>
          <td><input type="checkbox" name="checbox_read" value="<?php echo $data['read_status'];?>"></td>
          <td><input type="submit" name="MAJstatut" value="Bloquer" class="btn btn-danger"></td>
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
