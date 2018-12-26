<?php
$id=$_GET['id'];
$comment2 = new Comment($id,"","","","","","");
$comment = new Comment($id,"","","","","","");
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
            case 'Marqué comme lu':
            $id=$_GET['id'];
            $comment->update_comment_read($id,1);
            break;
      }
};
$read_comment = $comment2->read_comment();
$status= $comment2->read_comment_status($id);
$status = $status->fetch();
?>
