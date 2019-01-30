<div class="bodyback">
      <div class="container-fluid titlesection">
            <div class="card-header row justify-content-between bg-secondary" id="headingOne">
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
                              <div class="row justify-content-around">
                                    <form action="index.php?action=backoffice/update_user&id=<?php echo $_GET['id']?>&filtre=4"class="container-fluid row justify-content-around" method="post">
                                          <div class="card-body col-md-5 coordonnees">
                                                <div class="row container-fluid">
                                                      <div class="row">
                                                            <label class="col-md-3" for="validationDefault01">Nom</label>
                                                            <input class="col-md-9" name="nom"type="text" class="form-control" id="validationDefault01" placeholder="Nom de famille" value="<?php echo $result["resultUser"][2]?>">
                                                            <label class="col-md-3" for="validationDefault02">Prénom</label>
                                                            <input class="col-md-9" name="prenom" type="text" class="form-control" id="validationDefault02" placeholder="Prénom" value="<?php echo $result["resultUser"][1]?>">
                                                            <label class="col-md-3" for="validationDefault03">email</label>
                                                            <input class="col-md-9" name="email" type="text" class="form-control" id="validationDefault03" placeholder="email" value="<?php echo $result["resultUser"][3]?>">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="card-body col-md-5 coordonnees">
                                                <div class="row container-fluid">
                                                      <div class=" row">
                                                            <label class="col-md-3" for="validationDefault04">login</label>
                                                            <input class="col-md-9" name="login" type="text" class="form-control" id="validationDefault04" placeholder="login" value="<?php echo $result["resultUser"][4]?>">
                                                            <label class="col-md-3" for="validationDefault05">password</label>
                                                            <input class="col-md-9" name="password" type="text" class="form-control" id="validationDefault05" placeholder="password" value="<?php echo $result["resultUser"][5]?>">
                                                            <label class="col-md-3" for="validationDefault06">role</label>
                                                            <input class="col-md-9" name="role"type="text" class="form-control" id="validationDefault06" placeholder="role" value="<?php echo $result["resultUser"][6]?>">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="container-fluid">
                                                <div class="row justify-content-around">
                                                      <div class="card-body col-md-10 coordonnees">
                                                            <div class="row justify-content-around">
                                                                  <input type="submit" name="MAJ" value="Supprimer utilisateur" class="col-md-5 btn btn-danger">
                                                                  <input type="submit" name="MAJ" value="Sauvegarder" class="col-md-5 btn btn-success">
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
                                                <a class="btn btn-primary mrgr2" href="index.php?action=backoffice/update_user&id=<?php echo $_GET["id"]?>&filtre=4 ">Total <span class="badge badge-light"> <?php echo ($result["online"] + $result["waiting"] + $result["blocked"]) ?> </span></a>
                                                <a class="btn btn-success mrgr2" href="index.php?action=backoffice/update_user&id=<?php echo $_GET["id"]?>&filtre=1 ">Online  <span class="badge badge-light"> <?php echo $result["online"] ?> </span></a>
                                                <a class="btn btn-info mrgr2" href="index.php?action=backoffice/update_user&id=<?php echo $_GET["id"]?>&filtre=2 ">Signalés  <span class="badge badge-light"> <?php echo $result["waiting"] ?></span></a>
                                                <a class="btn btn-danger mrgr2" href="index.php?action=backoffice/update_user&id=<?php echo $_GET["id"]?>&filtre=3 ">Bloqués <span class="badge badge-light"> <?php echo $result["blocked"] ?></span></a>
                                          </div>
                                    </div>
                              </div>
                              <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="container-fluid">
                                          <div class="row">
                                                <?php
                                                while ($data = $result["readComment"]->fetch())
                                                {
                                                      ?>
                                                      <form action="./index.php?action=backoffice/update_user&id=<?php echo $_GET['id']?>&filtre=<?php echo $_GET['filtre'] ?>" method="POST" class="col-md-4 cardpers">
                                                            <div class="card">
                                                                  <div class="card-body">
                                                                        <a href="./index.php?action=backoffice/update_article&id=<?php echo $data['article'] ;?>">
                                                                              <h5 class="card-title" ><?php echo $data['2'] ;?></h5>
                                                                        </a>
                                                                        <h5 class="card-subtitle mb-2"><?php echo $data['6']; ?></h5>
                                                                        <p class="card-text"><?php echo $data['comment'] ;?></p>
                                                                        <input type="text" name="id_comment" value="<?php echo $data['id_comment'];?>" class="d-none">
                                                                        <?php  if ($data['statut'] == 1) {?>
                                                                              <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">
                                                                              <?php
                                                                        } else if ($data['statut'] == 2){?>
                                                                              <input type="submit" name="MAJstatut" value="Publier" class="btn btn-success">
                                                                              <input type="submit" name="MAJstatut" value="Bloquer le commentaire" class="btn btn-danger">
                                                                              <?php
                                                                        } else if($data['statut'] == 3){?>
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
      </div>
</div>
