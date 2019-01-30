<div class="col12">
      <div class="container-fluid mt-Titre justify-content-around">
            <div class="">
                  <h1 class="Title white fadeInDown">Un billet Simple pour l'Alaska</h1>
            </div>
            <div class="text-white subtitle ">
                  <h1 class="Title white fadeInUpBig">Un roman de Jean Forteroche</h1>
            </div>
      </div>
      <div class="espace">
      </div>
      <h1 class="Titre">L'Auteur</h1>
      <div class="container-fluid">
            <div class="">
                  <div class="col-md-12 d-flex align-items-center justify-content-around">
                        <img id="forteroche" class="img-thumbnail "src="./images/forteroche.jpg" alt="portrait de l'auteur">
                  </div>
                  <div class="col-md-12 text-white bgblack">
                        <p>Jean Forteroche est né en 1966 sur l'île Adak, en Alaska, et y a passé une partie de son enfance avant de s'installer en France avec sa mère et sa sœur.</p>
                        <p>Après avoir parcouru plus de 40 000 milles sur les océans, il échoue lors de sa tentative de tour du monde en solitaire sur un trimaran qu'il a dessiné et construit lui-même.</p>
                        <p>En 2013, il publie LE DERNIER MILE récit de son propre naufrage dans les Caraïbes lors de son voyage de noces quelques années plus tôt. </p>
                        <p>Ce livre fait partie de la liste des best-sellers du Figaro. Publié en France en janvier 2010, LES NAUFRAGES remporte immédiatement un immense succès. Il remporte le prix Médicis et s'est vendu à plus de 300 000 exemplaires.</p>
                        <p>Porté par son succès, Jean Forteroche est aujourd'hui traduit en dix-huit langues dans plus de soixante pays. Une adaptation cinématographique par une société de production française est en cours.</p>
                        <p>En 2017, il décide de publier en ligne chapitre par chapitre sur son propre site, son dernier roman BILLET SIMPLE POUR L'ALASKA.</p>
                  </div>
            </div>
      </div>
      <h1 class="Titre">Le dernier chapitre</h1>
      <div class=" container">
            <div class="container-fluid">
                  <div class="row pb-25" >
                        <div class="col-md-12 imgChap">
                              <div class="card shadow-sm">
                                    <img class="card-img-top" src="./images/article<?php echo $result[0]['id_article'] ?>.jpg" data-holder-rendered="true" style="width: 100%; display: block;">
                              </div>
                              <div class="textChap">
                                    <h5 class="Title"><?php echo $result[0]['title'] ?></h5>
                              </div>
                              <a  class=" btn btn-outline-light more"href="index.php?action=chapter&id_article=<?php echo $result[0]['id_article']?>">Lire le chapitre</a>
                        </div>
                  </div>
            </div>
      </div>
      <h1 class="Titre">Les chapitres précédents</h1>
      <div class=" container-fluid secHome mb100">
            <div class="scrolling-wrapper-flexbox">
                  <?php while ($data = $result[1]->fetch())
                  {?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 imgChap">
                              <a href="index.php?action=chapter&id_article=<?php echo $data['id_article']?>">
                                    <div class="card mb-4 shadow-sm">
                                          <img class="card-img-top " data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="./images/article<?php echo $data['img'] ?>.jpg" style="height: 350px; width: 100%; display: block;">
                                          <div class="textChap textChap2">
                                                <h5 class="Title Sub"><?php echo $data['title'] ?></h5>
                                          </div>
                                    </div>
                              </div>
                        <?php } ?>
            </div>
      </div>
</div>
