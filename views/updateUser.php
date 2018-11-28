<div class="bodyback">
<?php
$id=$_GET['id'];
$statut=$_GET['filtre'];



$user= new User($id,"","","","","","");
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

$readComment = $comment->read_comment_user_statut($id,$statut);

$readUser = $user->read_user($_GET['id']);
$resultUser= $readUser->fetch();

$countCommentStatut1 =  $comment->count_comment_by_user_statut($_GET['id'],'1');
$countCommentStatut2 =  $comment->count_comment_by_user_statut($_GET['id'],'2');
$countCommentStatut3 =  $comment->count_comment_by_user_statut($_GET['id'],'3');

$blocked=0;
$online=0;
$waiting=0;

while ($countpublished=$countCommentStatut1->fetch())
{
      $online = $countpublished[0];
};

while ($countwaiting=$countCommentStatut2->fetch())
{
      $waiting = $countwaiting[0];
};

while ($countblocked=$countCommentStatut3->fetch())
{
      $blocked = $countblocked[0];
};





?>
<div class="container-fluid titlesection">
  <div class="card-header row justify-content-between" id="headingOne">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
        <li class="breadcrumb-item">Gestion des utilisateurs</li>
        <li class="breadcrumb-item active" aria-current="page">Détail de l'utilisateur</li>
      </ol>
    </nav>
  </div>
</div>

<div class="accordion " id="accordionExampleOne">
  <div class="card ">
    <div class="card-header subtitlesection" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Detail utilisateur
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="container-fluid">
<div class="container-fluid">
  <form class="container-fluid row justify-content-around">
      <div class="card-body col-md-5 coordonnees">

          <div class="row container-fluid">
            <div class="row">

              <label class="col-md-3" for="validationDefault01">Nom</label>
              <input class="col-md-9" type="text" class="form-control" id="validationDefault01" placeholder="Nom de famille" value=" <?php  echo $resultUser[1]?>">

              <label class="col-md-3" for="validationDefault02">Prénom</label>
              <input class="col-md-9" type="text" class="form-control" id="validationDefault02" placeholder="Prénom" value=" <?php  echo $resultUser[2]?>">

              <label class="col-md-3" for="validationDefault03">email</label>
              <input class="col-md-9" type="text" class="form-control" id="validationDefault03" placeholder="email" value=" <?php  echo $resultUser[3]?>">
            </div>
</div>
</div>
<div class="card-body col-md-5 coordonnees">

    <div class="row container-fluid">
            <div class=" row">
              <label class="col-md-3" for="validationDefault04">login</label>
              <input class="col-md-9" type="text" class="form-control" id="validationDefault04" placeholder="login" value=" <?php  echo $resultUser[4]?>">

              <label class="col-md-3" for="validationDefault05">password</label>
              <input class="col-md-9" type="text" class="form-control" id="validationDefault05" placeholder="password" value=" <?php  echo $resultUser[5]?>">

              <label class="col-md-3" for="validationDefault06">role</label>
              <input class="col-md-9" type="text" class="form-control" id="validationDefault06" placeholder="role" value=" <?php  echo $resultUser[6]?>">
          </div>
          </div>
        </div>
      </div>
    </div>

      </form>

  </div>
</div>
</div>
    <div class="accordion mt20" id="accordionExampleTwo">
      <div class="card">
      <div class="container-fluid">
        <div class="card-header subtitlesection row justify-content-between" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-secondary"type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              Commentaires
            </button>
          </h5>

          <div>
            <a class="btn btn-primary mrgr2" href="index.php?action=updateUser&id=<?php echo $id?>&filtre=4 ">Total <span class="badge badge-light"> <?php echo ($online + $waiting + $blocked) ?> </span></a>
            <a class="btn btn-success mrgr2" href="index.php?action=updateUser&id=<?php echo $id?>&filtre=1 ">Online  <span class="badge badge-light"> <?php echo $online ?> </span></a>
            <a class="btn btn-info mrgr2" href="index.php?action=updateUser&id=<?php echo $id?>&filtre=2 ">En attente de modération  <span class="badge badge-light"> <?php echo $waiting ?></span></a>
            <a class="btn btn-danger mrgr2" href="index.php?action=updateUser&id=<?php echo $id?>&filtre=3 ">Bloqués <span class="badge badge-light"> <?php echo $blocked ?></span></a>
          </div>
        </div>
</div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
<div class="container-fluid">


<div class="row">

          <?php
          while ($data = $readComment->fetch())
          {
            ?>
            <form action="./index.php?action=updateUser&id=<?php echo $_GET['id']?>&filtre=<?php echo $_GET['filtre'] ?>" method="POST" class="col-md-4 cardpers">
              <div class="card">
                <div class="card-body">
                  <a href="./index.php?action=updateArticle&id=<?php echo $data['article'] ;?>">
                  <h5 class="card-title" >Chapitre: <?php echo $data['2'] ;?></h5>
                  </a>


                  <h5 class="card-subtitle mb-2">Titre: <?php echo $data['5']; ?></h5>

                  <p class="card-text"><?php echo $data['comment'] ;?></p>
                  <input type="text" name="id_comment" value="<?php echo $data['id_comment'];?>" class="d-none">
                  <?php  if ($data['statut']==1) {?>

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
          <?php } ?>
        </div>
      </div>
    </div>
</div>
    </div>
</div>
