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

      function __construct($id,$title,$content,$author,$article,$statut,$read){
            $this->id_comment       = $id;
            $this->title_comment    = $title;
            $this->content_comment  = $content;
            $this->author_comment   = $author;
            $this->article_comment  = $article;
            $this->statut_comment   = $statut;
            $this->read_comment     = $read;
      }

      function create_comment(){
            include('connexion.php');

            $result = $bdd->exec("INSERT INTO comments (comment,title,author,article,statut,read_status) VALUES ('$this->content_comment','$this->title_comment','$this->author_comment','$this->article_comment','$this->statut_comment','$this->read_comment')");

            return $result;
      }

      function read_comments(){
            include('connexion.php');

            $result = $bdd->query("SELECT * FROM  comments,users where comments.author = users.id_user");

            return $result;
      }
      function read_comments_waiting(){
            include('connexion.php');

            $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.statut=2");

            return $result;
      }
      function read_comment_user_statut($author,$comment_status){
            include('connexion.php');

            if ($comment_status != 4)
            {

                  $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.author=$author and comments.statut=$comment_status");

                  return $result;

            } else {
                  $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.author=$author");

                  return $result;
            }
      }
      function read_comments_article($comment_status){
            switch ($comment_status) {
                  case '1':
                  include('connexion.php');
                  $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment' and comments.statut= 1 ");
                  break;

                  case '2':
                  include('connexion.php');
                  $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment' and comments.statut= 2 ");
                  break;

                  case '3':
                  include('connexion.php');
                  $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment' and comments.statut= 3 ");
                  break;

                  default:
                  include('connexion.php');
                  $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$this->article_comment'");
                  break;

            }

            return $result;
      }
      function read_comments_by_article($comment_article){
            include('connexion.php');
            $result = $bdd->query("SELECT * FROM articles, comments, users WHERE articles.id_article = comments.article AND comments.author= users.id_user AND comments.article = '$comment_article' and comments.statut= 1 ");
            return $result;
      }
      function read_comment(){
            include('connexion.php');
            $result = $bdd->query("SELECT * FROM  comments,users WHERE id_comment='$this->id_comment'AND comments.author = users.id_user");
            return $result;
      }
      function unread_comments_plage(){
            if(isset($_POST['filtre']))
            {
                  if($_POST['filtre'] == 0)
                  {
                        if (isset($_GET['plage'])){
                              $pagination = ($_GET['plage'] - 1) * 10;

                              include('connexion.php');
                              $result = $bdd->query("SELECT * FROM  comments where read_status=0 ORDER BY article DESC LIMIT $pagination,10");
                              return $result;

                        } else {
                              $pagination = 0;
                              include('connexion.php');
                              $result = $bdd->query("SELECT * FROM  comments where read_status=0 ORDER BY article DESC LIMIT $pagination,10");
                              return $result;
                        }
                  }
                  else
                  {
                        if (isset($_GET['plage'])){
                              $pagination = ($_GET['plage'] - 1) * 10;
                              include('connexion.php');

                              $article = $_POST['filtre'];
                              $result = $bdd->query("SELECT * FROM  comments where article='$artiicle' and read_status=0 ORDER BY article DESC LIMIT $pagination,10");
                              return $result;

                        } else {
                              $pagination = 0;
                              include('connexion.php');
                              $result = $bdd->query("SELECT * FROM  comments where article='$article' and read_status=0 ORDER BY article DESC LIMIT $pagination,10");
                              return $result;
                        }
                  }
            }

            else {

                  if (isset($_GET['plage']))
                  {
                        $pagination = ($_GET['plage'] - 1) * 10;
                        include('connexion.php');
                        $result = $bdd->query("SELECT * FROM comments where read_status=0 ORDER BY article DESC LIMIT $pagination,10");
                        return $result;

                  } else {
                        $pagination = 0;
                        include('connexion.php');
                        $result = $bdd->query("SELECT * FROM comments where read_status=0 ORDER BY article DESC LIMIT $pagination,10");
                        return $result;
                  }

            }
      }
      function read_comments_plage($read_status){
            if(isset($_POST['filtre']))
            {
                  if($_POST['filtre'] == 0)
                  {
                        if (isset($_GET['plage'])){
                              $pagination = ($_GET['plage'] - 1) * 12;

                              include('connexion.php');
                              $result = $bdd->query("SELECT * FROM  comments,users where read_status='$read_status' and comments.author=users.id_user ORDER BY article DESC LIMIT $pagination,10");
                              return $result;

                        } else {
                              $pagination = 0;
                              include('connexion.php');
                              $result = $bdd->query("SELECT * FROM  comments,users where read_status='$read_status' and comments.author=users.id_user ORDER BY article DESC LIMIT $pagination,10");
                              return $result;
                        }
                  }
                  else
                  {
                        if (isset($_GET['plage'])){
                              $pagination = ($_GET['plage'] - 1) * 10;
                              include('connexion.php');
                              $article=$_POST['filtre'];
                              $result = $bdd->query("SELECT * FROM  comments,users where article='$aticle' and read_status='$read_status' and comments.author=users.id_user ORDER BY article DESC LIMIT $pagination,10");
                              return $result;

                        } else {
                              $pagination = 0;
                              include('connexion.php');
                              $result = $bdd->query("SELECT * FROM  comments,users where article='$article' and read_status='$read_status' and comments.author=users.id_user ORDER BY article DESC LIMIT $pagination,10");
                              return $result;
                        }
                  }
            }

            else {

                  if (isset($_GET['plage']))
                  {
                        $pagination = ($_GET['plage']-1)*10;
                        include('connexion.php');
                        $result = $bdd->query("SELECT * FROM  comments,users where read_status='$read_status' and comments.author=users.id_user ORDER BY article DESC LIMIT $pagination,10");
                        return $result;

                  } else {
                        $pagination = 0;
                        include('connexion.php');
                        $result = $bdd->query("SELECT * FROM  comments,users where read_status='$read_status' and comments.author=users.id_user ORDER BY article DESC LIMIT $pagination,10");
                        return $result;
                  }

            }
      }
      function read_comment_statut($statut){
            include('connexion.php');
            $result = $bdd->query("SELECT statut ,count(statut) FROM comments WHERE article= $this->article_comment and statut= $statut");
            return $result;
      }
      function read_comment_status($id_comment){
            include('connexion.php');

            $result = $bdd->query("SELECT * FROM comments WHERE id_comment='$id_comment'");
            return $result;
      }
      function update_comment(){
            include('connexion.php');
            $result = $bdd->exec("UPDATE comments SET comment='$this->content_comment',title='$this->title_comment',author='$this->author_comment', statut='$this->statut_comment' WHERE id_comment='$this->id_comment'");
            return $result;
      }
      function update_comment_statut($statut,$id_comment){
            include('connexion.php');
            $result = $bdd->exec("UPDATE comments SET statut='$statut' WHERE id_comment='$id_comment'");
            return $result;
      }
      function update_comment_read($id_comment,$read_status){

            include('connexion.php');

            $result = $bdd->exec("UPDATE comments SET read_status ='$read_status' where id_comment='$id_comment'");
            return $result;
      }

      function delete_comment(){
            include('connexion.php');
            $result = $bdd->query("DELETE FROM comments WHERE id_comment='$this->id_comment'");
            return $result;
      }
      function delete_comment_user($id_author){
            include('connexion.php');
            $result = $bdd->query("DELETE FROM comments WHERE author='$id_author'");
            return $result;
      }

      function count_comment($article){
            include('connexion.php');
            $result = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE article='$article'");
            return $result;
      }
      function count_comment_by_user($author){
            include('connexion.php');
            $result = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE author='$author'");
            return $result;
      }
      function count_comment_by_user_statut($author,$statut){
            include('connexion.php');
            $result = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE author='$author' and statut='$statut'");
            return $result;
      }
      function count_unread_comments(){
            include('connexion.php');

            if(isset($_POST['filtre'])&&$_POST['filtre']>0)
            {
                  $article    = $_POST['filtre'];
                  $result     = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE read_status=0 AND article='$article'");
                  return $result;
            } else {

                  $result = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE read_status=0");
                  return $result;
            }
      }
      function count_read_comments(){
            include('connexion.php');

            if(isset($_POST['filtre'])&&$_POST['filtre']>0)
            {
                  $article    = $_POST['filtre'];
                  $result     = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE read_status=1 AND article='$article'");
                  return $result;
            } else {

                  $result = $bdd->query("SELECT COUNT(id_comment) FROM comments WHERE read_status=1");
                  return $result;
            }
      }

      function select_chapter_comments($read_status){
            include('connexion.php');

            $result = $bdd->query("SELECT DISTINCT article FROM comments WHERE read_status='$read_status' ");
            return $result;
      }
}
