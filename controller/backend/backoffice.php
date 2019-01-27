<?php
class Backend{
      // initialize if user must be logged to comment or signal
      function config(){

            ///////////////////////////////////////////////////////////////////////
            // function to define if people must be logged to comment and signal //
            ///////////////////////////////////////////////////////////////////////

            // test if POST exist and update if it's true

            if (isset($_POST["submit"])){

                  if(isset($_POST["config1"])) {
                        $update_config1 = new Config("","");
                        $update_config1->update_config('1','on');
                  } else {
                        $update_config1 = new Config("","");
                        $update_config1->update_config('1','off');
                  }

                  if(isset($_POST["config2"])) {
                        $update_config2 = new Config("","");
                        $update_config2->update_config('2','on');
                  } else {
                        $update_config2 = new Config("","");
                        $update_config2->update_config('2','off');
                  }

            }

            // reading state config option

                  $state_config1 = new Config("","");
                  $state_config1 = $state_config1->read_config(1);
                  $state_config1 = $state_config1->fetch();

                  $state_config1 = $state_config1[1];

                  $state_config2 = new Config("","");
                  $state_config2 = $state_config2->read_config(2);
                  $state_config2 = $state_config2->fetch();

                  $state_config2 = $state_config2[1];


                  // display status param in form config back-office
                  if ($state_config1 == "on"){

                        $config1 = "checked=checked";
                  }
                  else{
                        $config1 = "";
                  }

                  if ($state_config2 == "on"){

                        $config2 = "checked=checked";
                  }
                  else{

                        $config2 = "";
                  }



            $result = [
                  "comment"               => $config1,
                  "signal"                => $config2,
                  "state_config_comment"  => $state_config1,
                  "state_config_signal"   => $state_config2
            ];

            return $result;
      }

      // article's management
      function create_article(){

            // create an article if info are in $_POST

            // test content is not NULL (if NULL -> alert , else insert in bdd)

            if((isset($_POST['title_article']) && $_POST['title_article'] == "") || (isset($_POST['content_article']) && $_POST['content_article'] == "")){

                        echo "<script> alert('Titre ou Contenu vide, merci de renseigner ces élements avant de sauvegarder');</script>";

                  } else { if (isset($_POST['title_article']) && isset($_POST['content_article'])){

                        $article_creation = new Article('',$_POST['title_article'],$_POST['content_article'],"1");
                        $article_creation->save_article();
                  }
            }
      }
      function update_article(){

            ////////////////////////////////////////////////////////////////////////////////
            // MAJ et affichage des articles //
            ////////////////////////////////////////////////////////////////////////////////

            $read = new Article($_GET['id'],"","","");

            if( isset($_POST['title_article']) && isset($_POST['content_article']))
            {
                  $id         = $_GET['id'];
                  $title      = $_POST['title_article'];
                  $article    = $_POST['content_article'];

                  $article_creation = new Article($id,$title,$article,"1");
                  $article_creation->update_article();
            }
            else
            {
                  $read       = new Article($_GET['id'],"","","");
                  $result     = $read->read_article();
                  $data       = $result->fetch();
                  $id         = $data['id_article'];
                  $title      = $data['title'];
                  $article    = $data['article'];

            }

            ////////////////////////////////////////////////////////////////////////////////
            // MAJ et affichage des commentaires //
            ////////////////////////////////////////////////////////////////////////////////


            $readcomment      = new Comment("","","","",$id,"","");
            $comment          = new Comment("","","","","","","");

            if (isset($_GET['filtre']))
            {
                  $filtre = $_GET['filtre'];

                  if($filtre < 1 || $filtre > 4)

                  {
                        $filtre = 4;
                  }
            }

            else

            {
                  $filtre = 4;
            }

            ////////////////////////////////////////////////////////////////////////////////
            // MAJ des statuts des commentaires //
            ////////////////////////////////////////////////////////////////////////////////

            if(isset($_POST['MAJstatut']))
            {
                  switch($_POST['MAJstatut'])

                  {
                        case 'Publier':
                        $id_comment = $_POST['id_comment'];
                        $comment->update_comment_statut(1,$id_comment);
                        break;

                        case 'Bloquer le commentaire':
                        $id_comment = $_POST['id_comment'];
                        $comment->update_comment_statut(3,$id_comment);
                        break;
                  }
            };

            $statut_article   = $read->statut_article();
            $statut           = $statut_article->fetch();
            $published        = $statut['published'];
            $resultcomment    = $readcomment->read_comments_article($filtre);

            $countCommentStatut1 = $readcomment->read_comment_statut(1);
            $countCommentStatut2 = $readcomment->read_comment_statut(2);
            $countCommentStatut3 = $readcomment->read_comment_statut(3);

            $blocked    = 0;
            $online     = 0;
            $waiting    = 0;

            ////////////////////////////////////////////////////////////////////////////////
            // comptage des types d'articles //
            ////////////////////////////////////////////////////////////////////////////////

            while ($countpublished = $countCommentStatut1->fetch())
            {
                  $online = $countpublished[1];

            };

            while ($countwaiting = $countCommentStatut2->fetch())
            {
                  $waiting = $countwaiting[1];
            };

            while ($countblocked = $countCommentStatut3->fetch())
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

            return $result = [

                  "id"              => $id,
                  "title"           => $title,
                  "article"         => $article,

                  "filtre"          => $filtre,
                  "online"          => $online,
                  "waiting"         => $waiting,
                  "blocked"         => $blocked,

                  "resultcomment"   => $resultcomment

            ];

      }
      function list_article(){
            // instanciation new object Article
            $instanceArticle  = new Article("","","","");
            //? $instanceArticle2 = new Article("","","","");
            $list_article      = $instanceArticle->read_articles();

            //  pagination's informations
            $countArticle     = $instanceArticle->count_articles();
            $count            = $countArticle->fetch();
            $nbarticle        = $count[0];
            $nbrepage         = $nbarticle/10;
            $nbrepage         = ceil($nbrepage);
            $page             = 1;
            $a                = 0;

            return $result    = [
                  "list_article"    => $list_article,
                  "nbarticle"       => $nbarticle,
                  "nbrepage"        => $nbrepage
            ];

      }

      // user's managements
      function list_users(){

            // instanciation

            $instanceUser     = new User("","","","","","","");
            $listUser         = $instanceUser->read_users();
            $instanceComment  = new Comment("","","","","","","");

            //How many articles ?

            $countUsers       = $instanceUser->count_users();
            $count            = $countUsers->fetch();
            $nbUsers          = $count[0];

            // How many pages ?

            $nbrepage = $nbUsers/10;
            $nbrepage = ceil($nbrepage);
            $page = 1;
            $a=0;

            return $result = [
                  "instanceComment" => $instanceComment,
                  "listUser"        => $listUser,
                  "nbUsers"         => $nbUsers,
                  "nbrepage"        => $nbrepage
            ];
      }
      function update_user(){

            // management of user

            $id         = $_GET['id'];
            $statut     = $_GET['filtre'];

            $user       = new User($id,"","","","","","");
            $comment    = new Comment("","","","","","","");

            if(isset($_POST['MAJstatut']))
            {
                  switch ($_POST['MAJstatut'])
                  {

                        case 'Publier':
                        $id_comment = $_POST['id_comment'];
                        $comment->update_comment_statut(1,$id_comment);
                        break;

                        case 'Bloquer le commentaire';
                        $id_comment = $_POST['id_comment'];
                        $comment->update_comment_statut(3,$id_comment);
                        break;

                  }
            };

            if (isset($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['login'],$_POST['password'],$_POST['role']))
            {
                  $update_user = new User($_GET['id'],$_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['login'],$_POST['password'],$_POST['role']);

                  switch ($_POST['MAJ'])
                  {

                        case 'Supprimer utilisateur':
                        $update_user->delete_user();

                        $comments   = new Comment("","","","","","","");
                        $comments->delete_comment_user($_GET['id']);

                        $signal     = new Signal("","","","","","");
                        $signal->delete_signal_user($_GET['id']);

                        header("location:http://localhost:8888/index.php?action=backoffice/list_users&plage=1");
                        break;

                        case 'Sauvegarder':
                        $update_user->update_user();
                        break;
                  }

            }

            $readComment      = $comment->read_comment_user_statut($id,$statut);

            $readUser         = $user->read_user($_GET['id']);
            $resultUser       = $readUser->fetch();

            $countCommentStatut1    = $comment->count_comment_by_user_statut($_GET['id'],'1');
            $countCommentStatut2    = $comment->count_comment_by_user_statut($_GET['id'],'2');
            $countCommentStatut3    = $comment->count_comment_by_user_statut($_GET['id'],'3');

            $blocked    = 0;
            $online     = 0;
            $waiting    = 0;

            while ($countpublished = $countCommentStatut1->fetch())
            {
                  $online = $countpublished[0];
            };

            while ($countwaiting = $countCommentStatut2->fetch())
            {
                  $waiting = $countwaiting[0];
            };

            while ($countblocked = $countCommentStatut3->fetch())
            {
                  $blocked = $countblocked[0];
            };

            return $result = [

                  "readComment"           => $readComment,
                  "readUser"              => $readUser,
                  "resultUser"            => $resultUser,

                  "countCommentStatut1"   => $countCommentStatut1,
                  "countCommentStatut2"   => $countCommentStatut2,
                  "countCommentStatut3"   => $countCommentStatut3,

                  "blocked"               => $blocked,
                  "online"                => $online,
                  "waiting"               => $waiting

            ];

      }

      // comments and management
      function moderation(){

            // instanciation

            $comment    = new Comment("","","","","","","");
            $signal     = new Signal("","","","","","");

            // update signaled comment's status (published/hyde)
            if(isset($_POST['MAJstatut'])){

                  if(isset($_POST['id_signal']) && isset($_POST['id_comment'])){

                        $id_signal   = $_POST['id_signal'];
                        $id_commnent = $_POST['id_comment'];

                        switch($_POST['MAJstatut']){

                              case 'Publier':
                              $comment->update_comment_statut(1,$id_commnent);
                              $signal->update_state_id(2,$id_signal);
                              break;

                              case 'Bloquer le commentaire':
                              $comment->update_comment_statut(3,$id_commnent);
                              $signal->update_state_id(2,$id_signal);
                              break;
                        }
                  }
            };

            $signal_waiting   = $signal->read_signal(1);
            $readComment      = $comment->read_comments_waiting();

            return $result = [$signal_waiting,$readComment];

      }
      function read_comments(){

            // read all comments
            $comments               = new Comment("","","","","","","");
            $last_comments          = $comments->read_comments_plage(1);
            $count_last_comments    = $comments->count_read_comments();

            //pagination
            $list_chapter           = $comments->select_chapter_comments(1);
            $count                  = $count_last_comments->fetch();
            $nbComments             = $count[0];
            $nbrepage               = $nbComments/10;
            $nbrepage               = ceil($nbrepage);
            $page                   = 1;
            $a                      = 0;

            return $result=[
                  "last_comments"         =>$last_comments,
                  "list_chapter"          =>$list_chapter,
                  "nbrepage"              =>$nbrepage
            ];
      }
      function read_comment(){

            $id = $_GET['id'];

            // instanaciation whith id param

            $comment2   = new Comment($id,"","","","","","");
            $comment    = new Comment($id,"","","","","","");

            // maj article's statut function what can we find in $_POST

            if(isset($_POST['MAJstatut']))
            {
                  switch($_POST['MAJstatut'])
                  {
                        case 'Publier':
                        $id_comment = $_POST['id_comment'];
                        $comment->update_comment_statut(1,$id_comment);
                        break;

                        case 'Bloquer le commentaire':
                        $id_comment = $_POST['id_comment'];
                        $comment->update_comment_statut(3,$id_comment);
                        break;

                        case 'Marqué comme lu':
                        $id_comment=$_POST['id_comment'];
                        $comment->update_comment_read($id_comment,1);
                        break;
                  }
            };

            $read_comment     = $comment2->read_comment();
            $status           = $comment2->read_comment_status($id);
            $status           = $status->fetch();

            return $result    = [

                  "read_comment"    =>$read_comment,
                  "status"          =>$status
                  ] ;
      }
      function unread_comments(){

            // List articles who are unread

            $comments               = new Comment("","","","","","","");
            $last_comments          = $comments->read_comments_plage(0);
            $count_last_comments    = $comments->count_unread_comments();
            //pagination
            $list_chapter           = $comments->select_chapter_comments(0);
            $count                  = $count_last_comments->fetch();
            $nbComments             = $count[0];
            $nbrepage               = $nbComments/10;
            $nbrepage               = ceil($nbrepage);
            $page                   = 1;
            $a                      = 0;

            return $result=[
                  "last_comments"         =>$last_comments,
                  "list_chapter"          =>$list_chapter,
                  "nbrepage"              =>$nbrepage
            ];
      }

      // log_out
      function log_out(){

            // call the session
            session_start();

            // erase content $_SESSION
            $_SESSION = NULL;

            // destroy the session
            session_destroy();

            // rediirect to the homepage
            header("Location: http://localhost:8888/index.php");
      }
}
