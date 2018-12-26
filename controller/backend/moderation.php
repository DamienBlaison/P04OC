<?php
$comment = new Comment("","","","","","","");
$signal = new Signal("","","","","","");
if(isset($_POST['MAJstatut']))
{
      if(isset($_POST['id_signal'])&& isset($_POST['id_comment']))
      {
            $id_signal =$_POST['id_signal'];
            $b=$_POST['id_comment'];
            switch($_POST['MAJstatut'])
            {
                  case 'Publier':
                  $comment->update_comment_statut(1,$b);
                  $signal->update_state_id(2,$id_signal);
                  break;
                  case 'Bloquer le commentaire':
                  $comment->update_comment_statut(3,$b);
                  $signal->update_state_id(2,$id_signal);
                  break;
            }
      }
};
$signal_waiting = $signal->read_signal(1);
$readComment = $comment->read_comments_waiting();
?>
