<?php
////////////////////////////////////////////////////////////////////////////////
// MAJ et affichage des articles //
////////////////////////////////////////////////////////////////////////////////

$read = new Article($_GET['id'],"","","");
if( isset($_POST['title_article']) && isset($_POST['content_article']))
{
      $id=$_GET['id'];
      $title = $_POST['title_article'];
      $article=$_POST['content_article'];
      $article_creation= new Article($id,$title,$article,"1");
      $article_creation->update_article();
}
else
{
      $read = new Article($_GET['id'],"","","");
      $result=$read->read_article();
      $data = $result->fetch();
      $id = $data['id_article'];
      $title = $data['title'];
      $article = $data['article'];
}

////////////////////////////////////////////////////////////////////////////////
// MAJ et affichage des commentaires //
////////////////////////////////////////////////////////////////////////////////


$readcomment = new Comment("","","","",$id,"","");
$comment = new Comment("","","","","","","");

if (isset($_GET['filtre']))
{
      $filtre=$_GET['filtre'];
      if($filtre<1 || $filtre>4)
      {
            $filtre=4;
      }
}
else
{
      $filtre=4;
}

////////////////////////////////////////////////////////////////////////////////
// MAJ des statuts des commentaires //
////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['MAJstatut']))
{
      switch($_POST['MAJstatut'])
      {
            case 'Publier':
                  $b=$_POST['id_comment'];
                  $comment->update_comment_statut(1,$b);
                  break;
            case 'Bloquer le commentaire':
                  $b=$_POST['id_comment'];
                  $comment->update_comment_statut(3,$b);
                  break;
      }
};

$statut_article = $read->statut_article();
$statut=$statut_article->fetch();
$published=$statut['published'];
$resultcomment = $readcomment->read_comments_article($filtre);
$countCommentStatut1 =  $readcomment->read_comment_statut(1);
$countCommentStatut2 =  $readcomment->read_comment_statut(2);
$countCommentStatut3 =  $readcomment->read_comment_statut(3);
$blocked=0;
$online=0;
$waiting=0;

////////////////////////////////////////////////////////////////////////////////
// comptage des types d'articles //
////////////////////////////////////////////////////////////////////////////////

while ($countpublished=$countCommentStatut1->fetch())
{
      $online = $countpublished[1];
};

while ($countwaiting=$countCommentStatut2->fetch())
{
      $waiting = $countwaiting[1];
};

while ($countblocked=$countCommentStatut3->fetch())
{
      $blocked = $countblocked[1];
};

if (isset($_GET['published']) && $_GET['published'] == 0)
{
      $read->depublished_article();
}
else
{
      $read->published_article();
}

?>
