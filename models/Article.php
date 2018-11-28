
<?php

class Article
{
  public $id_article;
  public $title_article;
  public $content_article;
  public $published_article;

  function __construct($id,$title,$content,$published)
  {
    $this->id_article=$id;
    $this->title_article=$title;
    $this->content_article=$content;
    $this->published_article=$published;
  }

  function save_article()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> exec("INSERT INTO articles (article,title,published) VALUES ('$this->content_article','$this->title_article','$this->published_article')");
    return $result;
  }

  function read_articles()
  {
    if (isset($_GET['plage'])){

      $pagination = ($_GET['plage']-1)*12;
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM  articles ORDER BY id_article DESC LIMIT $pagination,12");
      return $result;

    } else {
      $pagination=0;
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM  articles ORDER BY id_article DESC LIMIT $pagination,12");
      return $result;
    }

  }

  function read_articles_front()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $max = $bdd-> query("SELECT * FROM articles WHERE id_article = ( SELECT MAX(id_article) FROM articles WHERE published=1)");
    $data = $max->fetch();
    $def = $data['id_article'];
    $max = $def;
    $temp = $bdd-> query("SELECT * FROM  articles WHERE id_article='$max'");
    $temp=$temp->fetch();
    $temp=$temp['id_article'];

      $result = $bdd-> query("SELECT * FROM  articles where published=1 and id_article<>'$temp'  ORDER BY id_article ");
      return $result;

  }

  function read_article()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT * FROM  articles WHERE id_article='$this->id_article'");
    return $result;
  }

  function read_last_article()
  {

    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $max = $bdd-> query("SELECT * FROM articles WHERE id_article = ( SELECT MAX(id_article) FROM articles WHERE published=1)");
    $data = $max->fetch();
    $def = $data['id_article'];
    $max = $def;
    $result = $bdd-> query("SELECT * FROM  articles WHERE id_article='$max'");

    return $result;

  }

  function update_article()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("UPDATE articles SET article='$this->content_article',title='$this->title_article',published='$this->published_article' WHERE id_article='$this->id_article'");
    return $result;
  }

  function statut_article()
  {

    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT published FROM articles WHERE id_article='$this->id_article'");
    return $result;

  }

  function published_article()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("UPDATE articles SET published=1 WHERE id_article='$this->id_article'");
    return $result;
  }

  function depublished_article()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("UPDATE articles SET published=0 WHERE id_article='$this->id_article'");
    return $result;
  }


  function delete_article()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("DELETE FROM articles WHERE id_article='$this->id_article'");
    return $result;
  }
  function count_articles()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result= $bdd->query("SELECT COUNT(id_article) FROM articles");
    return $result;

  }
}

?>
