<?php include('./././controller/backend/listUsers.php') ?>
<div class="bodyback">
      <div class="container-fluid titlesection">
            <div class="card-header row justify-content-between bg-secondary" id="headingOne">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                              <li class="breadcrumb-item">Gestion des utilisateurs</li>
                              <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
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
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Commentaires</th>
                                    <th scope="col">Signalés</th>
                              </tr>
                              <?php
                              while ($data= $listUser->fetch())
                              {
                                    ?>
                                    <tr scope="row" id="<?php echo $data['id_user'];?>">
                                          <td><a href="index.php?action=updateUser&id=<?php echo $data['id_user'];?>&filtre=4"> <?php echo $data['firstName'];?></a></td>
                                          <td><a href="index.php?action=updateUser&id=<?php echo $data['id_user'];?>&filtre=4"> <?php echo $data['lastName'];?></a></td>
                                          <td><a href="index.php?action=updateUser&id=<?php echo $data['id_user'];?>&filtre=4"> <?php echo $data['login'];?></a></td>
                                          <td><a href="index.php?action=updateUser&id=<?php echo $data['id_user'];?>&filtre=4"> <?php echo $data['email'];?></a></td>
                                          <td>
                                                <?php
                                                $count_comments_by_user= $instanceComment->count_comment_by_user($data['id_user']);
                                                $count_comments_fetch = $count_comments_by_user->fetch();
                                                echo $count_comments_fetch[0];
                                                ?>
                                          </td>
                                          <td>
                                                <?php
                                                $count_comments_by_user_statut= $instanceComment->count_comment_by_user_statut($data['id_user'],2);
                                                $count_comments_fetch = $count_comments_by_user_statut->fetch();
                                                echo $count_comments_fetch[0];
                                                ?>
                                          </td>
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
                                                <a class="page-link" href="index.php?action=listUsers&plage=<?php echo $_GET['plage']-1;?>" tabindex="-1">Previous</a>
                                          </li>
                                          <?php
                                    }else{
                                          ?>
                                          <li class="page-item disabled">
                                                <a class="page-link" href="index.php?action=listUsers&plage=<?php echo $_GET['plage']-1;?>" tabindex="-1">Previous</a>
                                          </li>
                                          <?php
                                    }
                                    for ($i=0; $i < $nbrepage ; $i++) {
                                          ?>
                                          <li class="page-item"><a href="index.php?action=listUsers&plage=<?php echo $i+1;?>" class="page-link"><?php echo $i+1 ?></a></li>
                                          <?php
                                    }
                                    if( (isset($_GET['plage'])) && ($_GET['plage']<$nbrepage)){?>
                                          <li class="page-item">
                                                <a class="page-link" href="index.php?action=listUsers&plage=<?php echo $_GET['plage']+1;?>" tabindex="+1">Next</a>
                                          </li>
                                          <?php
                                    }else{
                                          ?>
                                          <li class="page-item disabled">
                                                <a class="page-link" href="index.php?action=listUsers&plage=<?php echo $_GET['plage']+1;?>" tabindex="+1">Next</a>
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
