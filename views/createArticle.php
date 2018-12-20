<div class="bodyback">


  <form  action="./index.php?action=createArticle" method="POST">

    <div class="container-fluid titlesection">
      <div class="card-header row justify-content-between" id="headingOne">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item">Gestion du contenu</li>
            <li class="breadcrumb-item active" aria-current="page">Créer un article</li>
          </ol>
        </nav>
        <div>
          <button type="button" class="btn btn-primary ">Publier</button>
          <input type="submit" class="btn btn-success " value= "Sauvegarder" name="sauvegarder"></input>
          <a href="index.php?action=listArticle&plage=1"  class="btn btn-danger"><i class="fas fa-times"></i></a>
        </div>
      </div>
    </div>

    <div class="container-fluid mt20">
      <div class="container-fluid card-body">

        <h1>
          <input  class="col-md-12 ajusttitre" type="text" name="title_article" value="" placeholder="Titre du chapitre"></input>
        </h1>
        <textarea id="mytextarea" name="content_article"></textarea>
    </div>
  </div>
  </form>
</div>
</div>
<?php
if( isset($_POST['title_article']) && isset($_POST['content_article']))
{
  $article_creation= new Article("",$_POST['title_article'],$_POST['content_article'],"1");
  $article_creation->save_article();
}
?>

</div>
