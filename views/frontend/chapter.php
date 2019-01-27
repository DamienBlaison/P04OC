
<div class="body pt150">
      <div class="container ">
            <div class="row pb-25 " >
                  <div class="col-md-12 imgChap">
                        <div class="card shadow-sm">
                              <img class="card-img-top" src="./images/article<?php echo $result['data']['id_article'] ?>.jpg" data-holder-rendered="true" style="width: 100%; display: block;">
                        </div>
                        <div class="textChap">
                              <div class="Title">
                                    <?php echo $result["data"]['title'] ?>
                              </div>
                              <a class=" btn btn-outline-light more" href="index.php?">Page précedente</a>
                        </div>
                  </div>
            </div>
      </div>

      <!-- footer de la section chapitre  -->

      <div class="container">
            <div class="row">
                  <div class="container-fluid mb50">
                        <div class="bg-white read_chapter">
                              <div class="">
                                    <?php echo $result["data"]['article'] ?>
                              </div>
                              <br>
                              <div class="row justify-content-between ">
                                    <div class="">
                                          <?php
                                          switch ($_GET['id_article']) {

                                                case '1':
                                                ?><a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']+1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre suivant</a>
                                                <?php
                                                break;

                                                case '$result["nbarticle"]':
                                                ?><a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']-1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre Précedent</a>
                                                <?php
                                                break;

                                                default:
                                                ?><a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']-1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre Précedent</a>
                                                <?php
                                                if($result["verif_status"] == '1')
                                                {?>
                                                      <a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']+1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre suivant</a>
                                                <?php };
                                                break;
                                          };?>
                                    </div>

                                    <!-- affectation des boutons en fonction des param de config de commentaire -->

                                    <div class="">
                                          <?php
                                          if (!isset($_SESSION['login']) && $array_config["state_config_comment"] == 'on')
                                          {?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#not_connected_comment">Commenter</button><?php
                                          }  else {?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#connected">Commenter</button><?php
                                          }
                                          ?>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- modal de saisie de commentaires si connecté ou non obligation de se connecter -->
<!--index.php?action=chapter&id_article= --><?php// echo $id ?>
      <form class="" action="index.php?action=congrats_comment" method="post" >
            <div class="modal fade" id="connected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content container-fluid">
                              <div class="">
                                    <input type="hidden" name="id_article" value="<?php echo $_GET['id_article'] ?>"></input>
                              </div>
                              <div class="modal-header row ">
                                    <input type="text" name="titreComment" value=""id="exampleModalCenterTitle" placeholder="Titre du commentaire" class="col-md-12 border border-secondary" required="required"></input>
                              </div>
                              <div class="modal-body row ">
                                    <textarea type="text" name="ContentComment" value="" id="exampleModalCenterTitle2" placeholder="Commentaire" class="col-md-12 border border-secondary" required="required"></textarea>
                              </div>
                              <div class="modal-footer row">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="saveComment"class="btn btn-outline-secondary">Envoyer votre commentaire</button>
                              </div>
                        </div>
                  </div>
            </div>
      </form>

      <!-- modal de saisie de comment si obligation de connexion -->

      <div class="" action="index.php?action=chapter&id_article=<?php echo $id ?>" method="post">
            <div class="modal fade" id="not_connected_comment" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content container-fluid">
                              <div class="modal-header row ">
                                    <p>Veuillez vous identifier pour rédiger un commentaire</p>

                              </div>

                              <div class="modal-footer row justify-content-between">
                                    <a href="index.php?action=create_account"  class="btn btn-outline-primary">Créer son compte</a>
                                    <button type="button" class=" btn btn-outline-danger col-md-3" data-dismiss="modal" aria-label="Close">Quitter</button>
                                    <a href="index.php?action=log_in" class="btn btn-outline-success">Se connecter</a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- modal de redirection si obligation de connexion poour les signalements-->

      <div class="" action="index.php?action=chapter&id_article=<?php echo $id ?>" method="post">
            <div class="modal fade" id="not_connected_signal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content container-fluid">
                              <div class="modal-header row ">
                                    <p>Veuillez vous identifer pour signaler un commentaire</p>

                              </div>

                              <div class="modal-footer row justify-content-between">
                                    <a href="index.php?action=create_account"  class="btn btn-outline-primary">Créer son compte</a>
                                    <button type="button" class=" btn btn-outline-danger col-md-3" data-dismiss="modal" aria-label="Close">Quitter</button>
                                    <a href="index.php?action=log_in" class="btn btn-outline-success">Se connecter</a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <!-- affichage des commentaires si il y en a  -->

      <?php if($result["comment_by_article"]->fetch() !== FALSE){?>

      <h1 class="Titre">Vos commentaires</h1>
      <div class="container">
            <div class="row">
                  <div class="container-fluid">
                        <div class="col-md-12 comments_container border-secondary mb100">
                                    <?php
                                          while ($data = $result["comments"]->fetch())

                                          {
                                          ?>
                                          <div class="comments bg-white">
                                                <p class="border-bottom border-secondary">De : <?php echo $data['login'].'</br>Titre du commentaire : '.$data[6]?> </p>
                                                <p> <?php echo $data['comment']?> </p>

                                                <!-- affectation des boutons en fonction des param de config des signalement -->

                                                <?php
                                                      if (!isset($_SESSION['login']) && $array_config["state_config_signal"] ==='on')
                                                      {?>
                                                            <div class="d-flex justify-content-end">
                                                                  <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#not_connected_signal">Signaler</button>
                                                            </div>
                                                            <?php
                                                      }  else {?>
                                                            <div class="d-flex justify-content-end">
                                                                  <button id="btnSignal" data-toggle="modal" data-target="#connected_signal_<?php echo $data['id_comment']?>" type="button" class="btn btn-sm btn-outline-secondary">Signaler</button>
                                                            </div>

                                                            <!-- modal de saisie de signalements -->

                                                            <form action="index.php?action=congrats_signal" method="post" >
                                                                  <div class="modal fade" id="connected_signal_<?php echo $data['id_comment']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                              <div class="modal-content container-fluid">


                                                                                    <div class="modal-header row ">
                                                                                          <input type="text" name="id_comment2" value="<?php echo $data['id_comment']?>"hidden>
                                                                                          <input type="text" name="titreSignal" value=""id="exampleModalCenterTitle" placeholder="Titre du signalement" class="col-md-12 border border-secondary" required="required"></input>
                                                                                    </div>
                                                                                    <div class="modal-body row ">
                                                                                          <textarea type="text" name="content_signal" value="" id="exampleModalCenterTitle2" placeholder="Signalement" class="col-md-12 border border-secondary" required="required"></textarea>
                                                                                    </div>
                                                                                    <div class="modal-footer row">
                                                                                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                                                                                          <button type="submit" id="saveSignal"class="btn btn-outline-secondary">Envoyer votre signalement</button>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </form>
                                                            <?php
                                                      }
                                          ?>
                                          </div>
                                          <?php
                                    }
                              ?>
                        </div>
                  </div>
            </div>
      </div>
<?php }; ?>
</div>
