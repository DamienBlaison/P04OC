<?php include('./views/menu.php'); ?>


      <?php
      $id=$_GET['id'];
      $comment2 = new Comment($id,"","","","","","");

      $comment = new Comment($id,"","","","","","");

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

                  case 'Marqué comme lu':
                  $id=$_GET['id'];
                  $comment->update_comment_read($id,1);

                  break;

            }
      };
      
      $read_comment = $comment2->read_comment();
      $status= $comment2->read_comment_status($id);
      $status = $status->fetch();


?>

<div class="bodyback">
      <div class="container-fluid titlesection">
            <div class="card-header row justify-content-between" id="headingOne">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                              <li class="breadcrumb-item">Commentaires</li>
                              <li class="breadcrumb-item active" aria-current="page">Lecture Commentaire</li>
                        </ol>
                  </nav>
            </div>
      </div>

      <?php
      while ($data = $read_comment->fetch())
      {
            ?>
            <form class="col-md-12 cardpers" action="./index.php?action=readcomment&id=<?php echo $_GET['id']?>" method="POST">
                  <div class="card">
                        <div class="card-body container-fluid">
                              <div class="container-fluid">
                                    <div class="row justify-content-between ">
                                          <h5 class="card-subtitle mb-2 col-md-11"><?php echo $data['1']; ?></h5>
                                          <h5 class="col-md-1"><a class="btn btn-danger col-md-12" href="index.php?action=unread_comments"  class="btn btn-danger">Retour</a></h5>
                                    </div>
                              </div>
                              <a href="index.php?action=updateUser&id=<?php echo $data['author']; ?>&filtre=4">
                                    <h5 class="card-title mb-2 border border-info bg-white text-info">De : <?php echo $data['11'] .' '. $data['12'] ;?></h5>
                              </a>

                              <div class="card-text"><?php echo $data['comment'] ;?>
                                    <input type="text" name="id_comment" value="<?php echo $data['id_comment'];?>" class="d-none"></input>
                              </div>
                                    <div class="container-fluid">
                                          <div class="row justify-content-between mt20">
                                                <?php
                                                if ($data['statut']==1)
                                                {?>
                                                      <div class="">
                                                            <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">
                                                      </div>
                                                <?php
                                                } else if ($data['statut']==2)
                                                {?>
                                                      <div class="">
                                                            <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success"></input>
                                                            <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger"></input>
                                                      </div>
                                                <?php
                                                } else if($data['statut']==3){?>
                                                      <div class="">
                                                            <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success"></input>
                                                      </div>

                                                <?php }
                                                if($status['read_status']==0)
                                                {?>
                                                      <input class="btn btn-success col-md-2"type="submit" name="MAJstatut" value="Marqué comme lu"></input>
                                                <?php } ?>
                                          </div>
                                    </div>
                        </div>
                  </div>
            </form>
            <?php
            }
            ?>
</div>
