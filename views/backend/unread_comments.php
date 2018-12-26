<?php include("./././controller/backend/unread_comments.php") ?>

<div class="container-fluid titlesection">
      <div class="card-header row justify-content-between bg-secondary" id="headingOne">
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item">Commentaires</li>
                        <li class="breadcrumb-item active" aria-current="page">Les derniers commentaires</li>
                  </ol>
            </nav>
      </div>
</div>
<form class="container-fluid margintb" method="POST" action="./index.php?action=unread_comments&plage=1">
      <div class="container-fluid card-body">
            <div class="col-md-12 mt20">
                  <table class=" col-md-12 table table-bordered table-striped table-hover tablepers">
                        <tr class="thead-dark row m0">
                              <th  class="col-1 d-none" scope="col">Id</th>
                              <th  class="col-1 text-center" scope="col">Chapitre</th>
                              <th  class="col-4" scope="col">Titre</th>
                              <th  class="col-5" scope="col">Commentaire</th>
                              <th  class="col-2 text-center" scope="col">Auteur</th>
                        </tr>
                        <?php
                        $i=0;
                        while ($data = $last_comments->fetch())
                        {
                              $i=$i+1;
                              ?>
                              <tr class="row m0">
                                    <td class="col-1 d-none"><input type="text" name="<?php echo data['id_comment'] ?>"><?php echo $data['id_comment'];?></input></td>
                                    <td class="col-1 text-center"><a href="index.php?action=updateArticle&id=<?php echo $data['article']?>"><?php echo $data['article']?></a></td>
                                    <td class="col-4"><a href="index.php?action=readcomment&id=<?php echo $data['id_comment']?>"><?php echo $data['title'];?></a></td>
                                    <td class="col-5"><a href="index.php?action=readcomment&id=<?php echo $data['id_comment']?>"><?php echo $data['comment'];?></a></td>
                                    <td class="col-2 text-center"><a href="index.php?action=updateUser&id=<?php echo $data['id_user']?>&filtre=4"><?php echo $data['firstName'].' '.$data['lastName'];?></a></td>
                              </tr>
                              <?php
                        }
                        ?>
                  </table>
                  <div class="contaier-fluid d-flex justify-content-between">
                        <div class="">
                        </div>
                        <div class="">
                              <label for="filtre">Filtrer par chapitre</label>
                              <select class="" name="filtre">
                                    <option value="0">all</option>
                                    <?php
                                    while  ($data = $list_chapter->fetch())
                                    {?>
                                          <option value="<?php echo $data['article'] ?>"><?php echo $data['article'] ?></option>
                                          <?php
                                    }
                                    ?>
                              </select>
                              <input class="btn btn-outline-secondary btn-sm "type="submit" name="MAJ" value="GO">
                        </div>
                        <nav aria-label="...">
                              <ul class="pagination justify-content-end">
                                    <?php
                                    if(isset($_GET['plage'])&& $_GET['plage']>1){?>
                                          <li class="page-item">
                                                <a class="page-link" href="index.php?action=unread_comments&plage=<?php echo $_GET['plage']-1;?>" tabindex="-1">Previous</a>
                                          </li>
                                          <?php
                                    }else{
                                          ?>
                                          <li class="page-item disabled">
                                                <a class="page-link" href="index.php?action=unread_comments&plage=<?php echo $_GET['plage']-1;?>" tabindex="-1">Previous</a>
                                          </li>
                                          <?php
                                    }
                                    ?>
                                    <?php
                                    for ($i=0; $i < $nbrepage ; $i++) {
                                          ?>
                                          <li class="page-item"><a href="index.php?action=unread_comments&plage=<?php echo $i+1;?>" class="page-link"><?php echo $i+1 ?></a></li>
                                          <?php
                                    }
                                    ?>
                                    <?php  if( (isset($_GET['plage'])) && ($_GET['plage']<$nbrepage)){?>
                                          <li class="page-item">
                                                <a class="page-link" href="index.php?action=unread_comments&plage=<?php echo $_GET['plage']+1;?>" tabindex="+1">Next</a>
                                          </li>
                                          <?php
                                    }else{
                                          ?>
                                          <li class="page-item disabled">
                                                <a class="page-link" href="index.php?action=unread_comments&plage=<?php echo $_GET['plage']+1;?>" tabindex="+1">Next</a>
                                          </li>
                                          <?php
                                    }
                                    ?>
                              </ul>
                        </nav>
                  </div>
            </div>
      </div>
</form>
</div>
