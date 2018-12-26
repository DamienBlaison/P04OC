<?php  include('./././controller/frontend/chapter/otherchapter.php')?>

<div class="scrolling-wrapper-flexbox">
      <?php while ($data2 = $listArticle->fetch())
      {?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 imgChap">
                  <a href="index.php?action=chapter&id_article=<?php echo $data2['id_article']?>">
                        <div class="card mb-4 shadow-sm">
                              <img class="card-img-top " data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="./images/article<?php echo $data2['img'] ?>.jpg" style="height: 350px; width: 100%; display: block;">
                              <div class="textChap textChap2">
                                    <h5 class="Title Sub"><?php echo $data2['title'] ?></h5>
                              </div>
                        </div>
                  </div>
            <?php } ?>
      </div>
