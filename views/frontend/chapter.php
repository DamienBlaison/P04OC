
<?php
include('./views/frontend/menu.php');
include('./././controller/frontend/chapter/chapter_read_config.php');
include('./././controller/frontend/chapter/chapter_article.php');
include('./././controller/frontend/chapter/chapter_comment.php');
include('./././controller/frontend/chapter/chapter_signal.php');
include('./././controller/frontend/chapter/chapter.php');

?>

<div class="body pt150">
      <div class="container ">
            <div class="row pb-25 " >
                  <div class="col-md-12 imgChap">
                        <div class="card shadow-sm">


                              <img class="card-img-top" src="./images/article<?php echo $data['id_article'] ?>.jpg" data-holder-rendered="true" style="width: 100%; display: block;">
                        </div>
                        <div class="textChap">
                              <div class="Title">
                                    <?php echo $data['title'] ?>
                              </div>
                              <a class=" btn btn-outline-light more" href="index.php?">Page précedente</a>
                        </div>
                  </div>
            </div>
      </div>
      <div class="container">
            <div class="row">
                  <div class="container-fluid mb50">
                        <div class="bg-white read_chapter">
                              <div class="">
                                    <?php echo $data['article'] ?>
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
                                                case "$nbArticle[0]":
                                                ?><a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']-1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre Précedent</a>
                                                <?php
                                                break;
                                                default:
                                                ?><a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']-1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre Précedent</a>
                                                <?php
                                                if($verif_status=='1')
                                                {?>
                                                      <a href="index.php?action=chapter&id_article=<?php echo ($_GET['id_article']+1)?>" class="btn btn-sm btn-outline-secondary" >Chapitre suivant</a>
                                                <?php };
                                                break;
                                          };?>
                                    </div>
                                    <div class="">
                                          <?php
                                          if ($_SESSION['login']== NULL && $array_config[1][1]=='on')
                                          {?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#not_connected">Commenter</button><?php
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
      <form class="" action="index.php?action=chapter&id_article=<?php echo $id ?>" method="post" >
            <div class="modal fade" id="connected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content container-fluid">
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
      <form class="" action="index.php?action=chapter&id_article=<?php echo $id ?>" method="post">
            <div class="modal fade" id="not_connected" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content container-fluid">
                              <div class="modal-header row ">
                                    <p>Veuillez vous identifer pour laisser un commentaire</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                    </button>
                              </div>
                              <div class="modal-body row ">
                                    <label for="login">Login</label>
                                    <input type="text" name="login"  id="login"  class="col-md-12 border border-secondary" placeholder="Login"r equired="required"></input>
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password"  class="col-md-12 border border-secondary" placeholder="Mot de passe"required="required"></input>
                              </div>
                              <div class="modal-footer row justify-content-between">
                                    <a href="index.php?action=creationcompte"  class="btn btn-primary">Créer son compte</a>
                                    <div class="">
                                          <button type="submit" id="connexion"class="btn btn-outline-secondary">Se connecter</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </form>
      <form class="" action="index.php?action=chapter&id_article=<?php echo $id ?>" method="post">
            <div class="modal fade" id="not_connected_signal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content container-fluid">
                              <div class="modal-header row ">
                                    <p>Veuillez vous identifer pour signaler un commentaire</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                    </button>
                              </div>
                              <div class="modal-body row ">
                                    <label for="login">Login</label>
                                    <input type="text" name="login"  id="login"  class="col-md-12 border border-secondary" placeholder="Login"r equired="required"></input>
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password"  class="col-md-12 border border-secondary" placeholder="Mot de passe"required="required"></input>
                              </div>
                              <div class="modal-footer row justify-content-between">
                                    <a href="index.php?action=creationcompte"  class="btn btn-primary">Créer son compte</a>
                                    <div class="">
                                          <button type="submit" id="connexion"class="btn btn-outline-secondary">Se connecter</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </form>

<?php if($test=$test->fetch() !== FALSE){?>

      <h1 class="Titre">Vos commentaires</h1>
      <div class="container">
            <div class="row">
                  <div class="container-fluid">
                        <div class="col-md-12 comments_container border-secondary mb100">
                                    <?php
                                          while ($data=$comments->fetch())

                                          {
                                          ?>
                                          <div class="comments bg-white">
                                                <p class="border-bottom border-secondary">De : <?php echo $data['firstName'].' '.$data['lastName'].'</br>Titre du commentaire : '.$data[6]?> </p>
                                                <p> <?php echo $data['comment']?> </p>
                                                <?php
                                                      if ($_SESSION['login']== NULL && $array_config[0][1] ==='on')
                                                      {?>
                                                            <div class="d-flex justify-content-end">
                                                                  <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#not_connected_signal">Signaler</button>
                                                            </div>
                                                            <?php
                                                      }  else {?>
                                                            <div class="d-flex justify-content-end">
                                                                  <button id="btnSignal" data-toggle="modal" data-target="#connected_signal_<?php echo $data['id_comment']?>" type="button" class="btn btn-sm btn-outline-secondary">Signaler</button>
                                                            </div>
                                                            <form action="index.php?action=chapter&id_article=<?php echo $id ?>" method="post" >
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
