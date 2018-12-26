<?php
$id=$_GET['id'];
$statut=$_GET['filtre'];

$user= new User($id,"","","","","","");
$comment = new Comment("","","","","","","");
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
if (isset($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['login'],$_POST['password'],$_POST['role']))
{
      $update_user = new User($_GET['id'],$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['login'],$_POST['password'],$_POST['role']);
      switch ($_POST['MAJ']) {
            case 'Supprimer utlisateur':
                  $update_user->delete_user();
                  $comments = new Comment("","","","","","","");
                  $comments-> delete_comment_user($_GET['id']);
                  $signal = new Signal("","","","","","");
                  $signal-> delete_signal_user($_GET['id']);

                  header("location:http://localhost:8888/index.php?action=listUsers&plage=1");
                  break;

            case 'Sauvegarder':
                  $update_user->update_user();
                  break;
      }

}

$readComment = $comment->read_comment_user_statut($id,$statut);

$readUser = $user->read_user($_GET['id']);
$resultUser= $readUser->fetch();

$countCommentStatut1 =  $comment->count_comment_by_user_statut($_GET['id'],'1');
$countCommentStatut2 =  $comment->count_comment_by_user_statut($_GET['id'],'2');
$countCommentStatut3 =  $comment->count_comment_by_user_statut($_GET['id'],'3');

$blocked=0;
$online=0;
$waiting=0;

while ($countpublished=$countCommentStatut1->fetch())
{
      $online = $countpublished[0];
};
while ($countwaiting=$countCommentStatut2->fetch())
{
      $waiting = $countwaiting[0];
};
while ($countblocked=$countCommentStatut3->fetch())
{
      $blocked = $countblocked[0];
};
?>
