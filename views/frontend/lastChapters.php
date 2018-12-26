<?php include('./././controller/frontend/chapter/lastchapter.php') ?>

<div class="container-fluid">
      <div class="row pb-25" >
            <div class="col-md-12 imgChap">
                  <div class="card shadow-sm">
                        <img class="card-img-top" src="./images/article<?php echo $data['id_article'] ?>.jpg" data-holder-rendered="true" style="width: 100%; display: block;">
                  </div>
                  <div class="textChap">
                        <h5 class="Title"><?php echo $data['title'] ?></h5>
                  </div>
                  <a  class=" btn btn-outline-light more"href="index.php?action=chapter&id_article=<?php echo $data['id_article']?>">Lire le chapitre</a>
            </div>
      </div>
</div>
