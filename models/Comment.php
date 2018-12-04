
<?php

class Comment
{
  public $id_comment;
  public $title_comment;
  public $content_comment;
  public $author_comment;
  public $article_comment;
  public $statut_comment;
  public $read_comment;

function __construct($id,$title,$content,$author,$article,$statut,$read)
  {
    $this->id_comment=$id;
    $this->title_comment=$title;
    $this->content_comment=$content;
    $this->author_comment=$author;
    $this->article_comment=$article;
    $this->statut_comment=$statut;
    $this->read_comment=$read;
  }

function create_comment()
  {
		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> exec("INSERT INTO comments (comment,title,author,article,statut,read_status) VALUES ('$this->content_comment','$this->title_comment','$this->author_comment','$this->article_comment','$this->statut_comment','$this->read_comment')");
    return $result;
  }

function read_comments()
  {
		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT * FROM  comments,users where comments.author = users.id_user");
    return $result;
  }

  function read_comments_waiting()
    {
  		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.statut=2");

      return $result;
    }

  function read_comment_user_statut($a,$b)
    {
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');

      if ($b != 4)
      {

      $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.author=$a and comments.statut=$b");

      return $result;

    } else {
      $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.author=$a");
      return $result;
      }
    }

  function read_comments_article($a)
    {

      switch ($a) {
        case '1':
          $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
          $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment' and comments.statut= 1 ");
          break;

        case '2':
          $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
          $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment' and comments.statut= 2 ");
          break;

        case '3':
          $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
          $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment' and comments.statut= 3 ");
          break;

        default:
          $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
          $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment'");
          break;

      }

      return $result;
    }

    function read_comments_by_article($a)
    {
          $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
          $result = $bdd-> query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$a' and comments.statut= 1 ");
       return $result;
    }

function read_comment()
  {
		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT * FROM  comments,users WHERE id_comment='$this->id_comment'AND comments.author = users.id_user");
    return $result;
  }

  function unread_comments_plage()

  {
      if(isset($_POST['filtre']))
            {
                  if($_POST['filtre']== 0)
                  {
                        if (isset($_GET['plage'])){
                        $pagination = ($_GET['plage']-1)*12;

                        $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                        $result = $bdd-> query("SELECT * FROM  comments where read_status=0 ORDER BY article DESC LIMIT $pagination,12");
                        return $result;

                        } else {
                              $pagination=0;
                              $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                              $result = $bdd-> query("SELECT * FROM  comments where read_status=0 ORDER BY article DESC LIMIT $pagination,12");
                              return $result;
                        }
                  }
                  else
                  {
                        if (isset($_GET['plage'])){
                        $pagination = ($_GET['plage']-1)*12;
                        $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                        $a=$_POST['filtre'];
                        $result = $bdd-> query("SELECT * FROM  comments where article='$a' and read_status=0 ORDER BY article DESC LIMIT $pagination,12");
                        return $result;

                        } else {
                              $pagination=0;
                              $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                              $result = $bdd-> query("SELECT * FROM  comments where article='$a' and read_status=0 ORDER BY article DESC LIMIT $pagination,12");
                              return $result;
                        }
                  }
            }

      else {

            if (isset($_GET['plage']))
            {
                  $pagination = ($_GET['plage']-1)*12;
                  $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                  $result = $bdd-> query("SELECT * FROM  comments where read_status=0 ORDER BY article DESC LIMIT $pagination,12");
                  return $result;

            } else {
                  $pagination=0;
                  $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                  $result = $bdd-> query("SELECT * FROM  comments where read_status=0 ORDER BY article DESC LIMIT $pagination,12");
                  return $result;
            }

      }
}

function read_comments_plage()

{
    if(isset($_POST['filtre']))
          {
                if($_POST['filtre']== 0)
                {
                      if (isset($_GET['plage'])){
                      $pagination = ($_GET['plage']-1)*12;

                      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                      $result = $bdd-> query("SELECT * FROM  comments where read_status=1 ORDER BY article DESC LIMIT $pagination,12");
                      return $result;

                      } else {
                            $pagination=0;
                            $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                            $result = $bdd-> query("SELECT * FROM  comments where read_status=1 ORDER BY article DESC LIMIT $pagination,12");
                            return $result;
                      }
                }
                else
                {
                      if (isset($_GET['plage'])){
                      $pagination = ($_GET['plage']-1)*12;
                      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                      $a=$_POST['filtre'];
                      $result = $bdd-> query("SELECT * FROM  comments where article='$a' and read_status=1 ORDER BY article DESC LIMIT $pagination,12");
                      return $result;

                      } else {
                            $pagination=0;
                            $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                            $result = $bdd-> query("SELECT * FROM  comments where article='$a' and read_status=1 ORDER BY article DESC LIMIT $pagination,12");
                            return $result;
                      }
                }
          }

    else {

          if (isset($_GET['plage']))
          {
                $pagination = ($_GET['plage']-1)*12;
                $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                $result = $bdd-> query("SELECT * FROM  comments where read_status=1 ORDER BY article DESC LIMIT $pagination,12");
                return $result;

          } else {
                $pagination=0;
                $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
                $result = $bdd-> query("SELECT * FROM  comments where read_status=1 ORDER BY article DESC LIMIT $pagination,12");
                return $result;
          }

    }
}





function unread_comments()
{
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM comments WHERE read_status=0 ORDER BY article DESC ");
      return $result;
}


  function read_comment_statut($a)
    {
  		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT statut ,count(statut) FROM comments WHERE article= $this->article_comment and statut= $a");
      return $result;
    }

function update_comment()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("UPDATE comments SET comment='$this->content_comment',title='$this->title_comment',author='$this->author_comment', statut='$this->statut_comment' WHERE id_comment='$this->id_comment'");
    return $result;
  }

function update_comment_statut($a,$b)
{
  $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
  $result = $bdd-> query("UPDATE comments SET statut='$a' WHERE id_comment='$b'");
  return $result;
}


function delete_comment()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("DELETE FROM comments WHERE id_comment='$this->id_comment'");
    return $result;
  }

  function count_comment($b)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE article='$b'");
    return $result;
  }

  function count_comment_by_user($b)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE author='$b'");
    return $result;
  }
  function count_comment_by_user_statut($a,$b)
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE author='$a' and statut='$b'");
    return $result;
  }

  function count_unread_comments()
  {
       $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');

       if(isset($_POST['filtre'])&&$_POST['filtre']>0)
       {
            $article = $_POST['filtre'];
            $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE read_status=0 AND article='$article'");
            return $result;
      } else {

       $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE read_status=0");
       return $result;
       }
 }

 function count_read_comments()
{
     $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');

     if(isset($_POST['filtre'])&&$_POST['filtre']>0)
     {
          $article = $_POST['filtre'];
          $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE read_status=1 AND article='$article'");
          return $result;
     } else {

     $result = $bdd-> query("SELECT COUNT(id_comment) FROM comments WHERE read_status=1");
     return $result;
     }
}
function select_chapter_comments()
{
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');

      $result = $bdd-> query("SELECT DISTINCT article FROM comments WHERE read_status=0 ");
      return $result;
}

function update_comment_read($a,$b)
{
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');

      $result = $bdd-> exec("UPDATE comments SET read_status ='$b' where id_comment='$a'");
      return $result;
}
function read_comment_status($a)
{
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');

      $result = $bdd-> query("SELECT * FROM comments WHERE id_comment='$a'");
      return $result;
}

}

?>
