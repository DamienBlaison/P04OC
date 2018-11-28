<div class="bodyback">
<?php

$comment = new Comment("","","","","","");


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

$readComment = $comment->read_comments_waiting()

?>
<div class="container-fluid titlesection">
  <div class="card-header row justify-content-between" id="headingOne">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
        <li class="breadcrumb-item">Modération</li>
      </ol>
    </nav>
  </div>
</div>


<div class="accordion" id="accordionExampleTwo">
  <div class="card">
<div class="container-fluid">

  <div class="row">

          <?php
          while ($data = $readComment->fetch())
          {
            ?>
            <form action="./index.php?action=moderation" method="POST" class="col-md-4 cardpers">
              <div class="card">
                <div class="card-body">
                  <a href="./index.php?action=updateArticle&id=<?php echo $data['article'] ; ?>" </a>

                  <h5 class="card-title" >Chapitre: <?php echo $data['2'] ;?></h5></a>

                  <h5 class="card-subtitle mb-2">Titre: <?php echo $data['5']; ?></h5>

                  <h6 class="card-title mb-2 border border-info bg-white text-info"> Utilisateur : <?php echo $data['11'] .' '. $data['12'] ;?></h6>

                  <p class="card-text"><?php echo $data['comment'] ;?></p>
                      <input type="text" name="id_comment" value="<?php echo $data['id_comment'];?>" class="d-none">
                      <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success">
                      <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">

                </div>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>


  </div>
</div>
</div>
