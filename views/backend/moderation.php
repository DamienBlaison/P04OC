<?php // include("./././controller/backend/moderation.php") ?>

<div class="bodyback">
      <div class="container-fluid titlesection">
            <div class="card-header row justify-content-between bg-secondary" id="headingOne">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                              <li class="breadcrumb-item">Modération</li>
                        </ol>
                  </nav>
            </div>
      </div>
      <div class="container-fluid margintb">
            <div class="container-fluid card-body">
                  <div class="col-md-12">
                        <div class="card">
                              <div class="container-fluid">
                                    <div class="row ">
                                          <div class="container-fluid">
                                                <div class="row pad10 mt20 bg-dark text-white border-bottom border-secondary ">
                                                      <button class="btn btn-outline-secondary btn-sm"type="button" data-toggle="collapse" data-target="#collapse<?php echo $data['id_signal'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $data['id_signal']?>">
                                                            <i class="fas fa-search"></i>
                                                      </button>
                                                      <h5 class="col-md-4">Titre</h5>
                                                      <h5 class="col-md-4"> Auteur </h5>
                                                      <h5 class="col-md-3"> signalé par </h5>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <?php

                  while ($data = $result[0]->fetch())
                  {
                        ?>
                        <div class="col-md-12 rounded" id="<?php echo "accordion".$data['id_signal'] ?>">
                              <div class="card">
                                    <div class=" container-fluid bg-white border border-top-0 border-secondary " id="<?php echo 'heading'.$data['id_signal'] ?>">
                                          <div class="row pad10">
                                                <button class="btn btn-outline-secondary btn-sm"type="button" data-toggle="collapse" data-target="#collapse<?php echo $data['id_signal'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $data['id_signal']?>">
                                                      <i class="fas fa-search"></i>
                                                </button>
                                                <h5 class="col-md-4"><?php echo $data['5']; ?></h5>
                                                <h5 class="col-md-4"><?php echo $data['firstName'] .' '. $data['lastName'] ;?></h5>
                                                <h5 class="col-md-3">
                                                      <?php
                                                      $user = new User("","","","","","","");
                                                      $user = $user->read_user($data['id_author_signal']);
                                                      $user = $user->fetch();

                                                      echo $user['firstName'].' '.$user['lastName'];
                                                      ?>
                                                </h5>
                                          </div>
                                    </div>
                                    <div id="collapse<?php echo $data['id_signal'] ?>" class="collapse border border-top-0 border-secondary" aria-labelledby="heading<?php echo $data['id_signal'] ?>" data-parent="#<?php echo "accordion".$data['id_signal'] ?>">
                                          <form action="./index.php?action=backoffice/moderation" method="POST" class="col-md-12 cardpers">
                                                <div class="card-body container-fluid ">
                                                      <div class="row">
                                                            <div class="container-fluid">
                                                                  <h5 class="card-title col-md-12" >Commentaire concernant le <?php echo $data['title'] ;?></h5>
                                                                  <p class="card-text col-md-12 signal-content"><?php echo $data['comment'] ;?></p>
                                                                  <div class="d-flex card-title col-md-12 ">
                                                                        <h5 class="col-md-4 " >Signalement</h5>
                                                                        <h5 class="col-md-4 ">Titre: <?php echo $data['title_signal']; ?></h5>
                                                                        <h5 class="col-md-4"> Auteur : <?php echo $data['firstName'] .' '. $data['lastName'] ;?></h5>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <p class="card-text signal-content"><?php echo $data['content_signal'] ;?></p>
                                                      <input type="text" name="id_comment" value="<?php echo $data['id_comment'];?>" class="" hidden>
                                                      <input type="text" name="id_signal" value="<?php echo $data['id_signal'];?>" class="" hidden>
                                                      <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success">
                                                      <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">
                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>
                  <?php } ?>
            </div>
      </div>
</div>
