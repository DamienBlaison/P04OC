<div class="bodyback">
<?php

$read = new Article($_GET['id'],"","","");

if( isset($_POST['title_article']) && isset($_POST['content_article']))
{
  $id=$_GET['id'];
  $title = $_POST['title_article'];
  $article=$_POST['content_article'];

  $article_creation= new Article($id,$title,$article,"1");
  $article_creation->update_article();


} else {

  $read = new Article($_GET['id'],"","","");

  $result=$read->read_article();
  $data = $result->fetch();
  $id = $data['id_article'];
  $title = $data['title'];
  $article = $data['article'];

}

$readcomment = new Comment("","","","",$id,"","");
$comment = new Comment("","","","","","","");

if (isset($_GET['filtre'])) {

    $filtre=$_GET['filtre'];

      if($filtre<1 || $filtre>4){
        $filtre=4;
        }
} else {
    $filtre=4;
  }

  if(isset($_POST['MAJstatut']))
    {
      switch($_POST['MAJstatut'])
      {
        case 'Publier':

          $b=$_POST['id_comment'];
          $comment->update_comment_statut(1,$b);

          break;
        case 'Bloquer le commentaire':

        $b=$_POST['id_comment'];
        $comment->update_comment_statut(3,$b);

          break;

        }
      };

  $statut_article = $read->statut_article();
  $statut=$statut_article->fetch();
  $published=$statut['published'];

$resultcomment = $readcomment->read_comments_article($filtre);

$countCommentStatut1 =  $readcomment->read_comment_statut(1);
$countCommentStatut2 =  $readcomment->read_comment_statut(2);
$countCommentStatut3 =  $readcomment->read_comment_statut(3);

$blocked=0;
$online=0;
$waiting=0;

while ($countpublished=$countCommentStatut1->fetch())
{
      $online = $countpublished[1];
};

while ($countwaiting=$countCommentStatut2->fetch())
{
      $waiting = $countwaiting[1];
};

while ($countblocked=$countCommentStatut3->fetch())
{
      $blocked = $countblocked[1];
};

if (isset($_GET['published']) && $_GET['published'] == 0){

  $read->depublished_article();

} else {
  $read->published_article();
}

?>


<div class="container-fluid titlesection">
<div class="card-header row justify-content-between" id="headingOne">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
    <li class="breadcrumb-item">Gestion du contenu</li>
    <li class="breadcrumb-item active" aria-current="page">Modification d'un article</li>
  </ol>
</nav>
</div>
</div>



  <div class="accordion" id="accordionExample">

    <div class="card">
      <div class="container-fluid">
        <div class="card-header subtitlesection row justify-content-between" id="headingOne">
          <h5 class="mb-0">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                 Chapitre
               </button>
          </h5>
          <form class="" action="index.php?action=updateArticle&id=<?php echo $_GET['id'];?>&published=<?php echo $_GET['published']; ?>&filtre=4"
            method="post">

            <?php if (isset($_GET['published']) && $_GET['published']==0){?>
            <a href="index.php?action=updateArticle&id=<?php echo $id?>&published=1" class="btn btn-primary">Publier</a>
            <?php  }
            else {
              ?>
            <a href="index.php?action=updateArticle&id=<?php echo $id?>&published=0" class="btn btn-danger">Dépublier</a>

              <?php
            }
            ?>

            <input type="submit" class="btn btn-success " value= "Sauvegarder" name="sauvegarder"></input>
            <a href="index.php?action=updateArticle&id=<?php echo $id?>&published=<?php $_GET['published']; ?>"></a>
            <a href="index.php?action=listArticle"  class="btn btn-danger"><i class="fas fa-times"></i></a>




        </div>
      </div>

      <div id="collapseOne" class="collapse show container-fluid mt20" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <h1>
              <input class="col-md-12 ajusttitre" type="text" name="title_article" value="<?php echo $title;?>" placeholder="Titre du chapitre"></input>
            <h1>
            <textarea id="mytextarea" name="content_article"><?php echo $article;?></textarea>
        </div>
      </div>
    </div>
</form>
    <div class="card mt20" id="accordionExampleTwo">
      <div class="card">
      <div class="container-fluid">
        <div class="card-header subtitlesection row justify-content-between" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Commentaires
            </button>
          </h5>
          <div>
            <a class="btn btn-primary mrgr2" href="index.php?action=updateArticle&id=<?php echo $id?>&filtre=4 ">Total <span class="badge badge-light"> <?php echo ($online + $waiting + $blocked) ?> </span></a>
            <a class="btn btn-success mrgr2" href="index.php?action=updateArticle&id=<?php echo $id?>&filtre=1 ">Online  <span class="badge badge-light"> <?php echo $online ?> </span></a>
            <a class="btn btn-info mrgr2" href="index.php?action=updateArticle&id=<?php echo $id?>&filtre=2 ">Signalés  <span class="badge badge-light"> <?php echo $waiting ?></span></a>
            <a class="btn btn-danger mrgr2" href="index.php?action=updateArticle&id=<?php echo $id?>&filtre=3 ">Bloqués <span class="badge badge-light"> <?php echo $blocked ?></span></a>
          </div>
        </div>
      </div>

      <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="container-fluid">


        <div class="row">
      <?php
      while ($data = $resultcomment->fetch())
      {
        ?>
        <form class="col-md-4 cardpers" action="./index.php?action=updateArticle&id=<?php echo $_GET['id']?>&filtre=<?php echo $_GET['filtre']?>" method="POST">
          <div class="card">
            <div class="card-body">
              <h5 class="card-subtitle mb-2"><?php echo $data['6']; ?></h5>
              <a href="index.php?action=updateUser&id=<?php echo $data['author']; ?>&filtre=4">
                <h6 class="card-title mb-2 border border-info bg-white text-info">De <?php echo $data['13'] .' '. $data['14'] ;?></h6>
              </a>

              <div class="card-text"><?php echo $data['comment'] ;?></div>
              <input type="text" name="id_comment" value="<?php echo $data['id_comment'];?>" class="d-none">
              </br>
              <?php
              if ($data['statut']==1) {?>
                <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">
                <?php
                } else if ($data['statut']==2){?>
                  <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success">
                  <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">
                  <?php
                } else if($data['statut']==3){?>
                  <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success">
                <?php } ?>
            </div>
          </div>
        </form>
        <?php
      }
      ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>

</div>
