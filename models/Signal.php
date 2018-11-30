
<?php

class Signal
{
  public $id_signal;
  public $title_signal;
  public $content_signal;
  public $author_signal;
  public $comment_signal;
  public $statut_signal;

function __construct($id,$title,$content,$author,$comment,$statut)
  {
    $this->id_signal=$id;
    $this->title_signal=$title;
    $this->content_signal=$content;
    $this->author_signal=$author;
    $this->comment_signal=$comment;
    $this->statut_signal=$statut;
  }

function create_signal()
  {
	$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> exec("INSERT INTO signals (content_signal,title_signal,id_author_signal,id_comment_signal,status_signal) VALUES ('$this->content_signal','$this->title_signal','$this->author_signal','$this->comment_signal','$this->statut_signal')");
      return $result;
  }
function read_signal($a)
      {
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM signals,comments,users,articles where status_signal='$a' and signals.id_comment_signal=comments.id_comment and users.id_user = comments.author and articles.id_article=comments.article");
      return $result;
      }
};

?>
