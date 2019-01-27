<?php
class Article
{

      public $id_article;
      public $title_article;
      public $content_article;
      public $published_article;

      function __construct($id ,$title,$content,$published)
      {
            $this->id_article             = $id;
            $this->title_article          = $title;
            $this->content_article        = $content;
            $this->published_article      = $published;
      }

      function save_article(){
            include('connexion.php');

            $result = $bdd->exec("INSERT INTO articles (article,title,published) VALUES ('$this->content_article','$this->title_article','$this->published_article')");

            return $result;
      }

      function read_articles()
      {
            include('connexion.php');
            if (isset($_GET['plage'])){

                  $pagination = ($_GET['plage']-1)*12;

                  $result = $bdd->query("SELECT * FROM  articles ORDER BY id_article DESC LIMIT $pagination,10");

                  return $result;

            } else {
                  $pagination = 0;

                  $result = $bdd->query("SELECT * FROM  articles ORDER BY id_article DESC LIMIT $pagination,10");

                  return $result;
            }

      }

      function read_articles_front()
      {
            include('connexion.php');

            $max        = $bdd->query("SELECT * FROM articles WHERE id_article = ( SELECT MAX(id_article) FROM articles WHERE published=1)");
            $data       = $max->fetch();
            $def        = $data['id_article'];
            $max        = $def;

            $temp       = $bdd->query("SELECT * FROM  articles WHERE id_article='$max'");
            $temp       = $temp->fetch();
            $temp       = $temp['id_article'];

            $articles   = $bdd->query("SELECT * FROM  articles where published=1 and id_article<>'$temp'  ORDER BY id_article ");

            return $articles;

      }

      function read_article()
      {
            include('connexion.php');

            $result     = $bdd->query("SELECT * FROM  articles WHERE id_article='$this->id_article'");

            return $result;
      }

      function read_last_article()
      {
            include('connexion.php');

            $max              = $bdd->query("SELECT * FROM articles WHERE id_article = ( SELECT MAX(id_article) FROM articles WHERE published=1)");
            $data             = $max->fetch();
            $def              = $data['id_article'];
            $max              = $def;

            $last_article     = $bdd-> query("SELECT * FROM  articles WHERE id_article='$max'");

            return $last_article;


      }

      function update_article()
      {
            include('connexion.php');

            $result = $bdd->exec("UPDATE articles SET article='$this->content_article',title='$this->title_article',published='$this->published_article' WHERE id_article='$this->id_article'");

            return $result;
      }

      function statut_article()
      {
            include('connexion.php');

            $result = $bdd->query("SELECT published FROM articles WHERE id_article='$this->id_article'");

            return $result;

      }

      function published_article()
      {
            include('connexion.php');

            $result = $bdd->exec("UPDATE articles SET published=1 WHERE id_article='$this->id_article'");

            return $result;
      }

      function depublished_article()
      {

            include('connexion.php');

            $result = $bdd->exec("UPDATE articles SET published=0 WHERE id_article='$this->id_article'");

            return $result;
      }


      function delete_article()
      {
            include('connexion.php');

            $result = $bdd->query("DELETE FROM articles WHERE id_article='$this->id_article'");

            return $result;
      }

      function count_articles()
      {
            include('connexion.php');

            $result = $bdd->query("SELECT COUNT(id_article) FROM articles");

            return $result;

      }
}
?>
