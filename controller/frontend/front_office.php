<?php class Frontend{

      // user must be logged to comment or signal ???

      function verif_config(){
            $config = new Config();
            $config = $config->read_configs();
            return $config;


      }

      // informations to the homepage

      function home(){

            $lastarticle      = new Article("","","","");

            $readLastarticle  = $lastarticle->read_last_article();
            $last_article     = $readLastarticle->fetch();

            $articles         = $lastarticle->read_articles_front();

            return  $data     = [$last_article,$articles];
      }

      // informations to a specific chapter

      function chapter(){


            $_SESSION['id_article'] = $_GET["id_article"];

            $article      = new Article($_GET['id_article'],"","","");
            $data         = $article->read_article();
            $data         = $data->fetch();

            $id           = $_GET['id_article'];

            $next         = $id+1;

            $verif_status = new Article($next,"","","");
            $verif_status = $verif_status->read_article();
            $verif_status = $verif_status->fetch();
            $verif_status = $verif_status['published'];

            $nbArticle   = $article->count_articles();
            $nbArticle   = $nbArticle->fetch();
            $nbArticle   = $nbArticle[0];

            $comments    = new Comment("","","","","",'3',"");
            $comments    = $comments->read_comments_by_article(htmlentities(addslashes($_GET['id_article'])));

            $comment_by_article     = new Comment("","","","","",'3',"");
            $comment_by_article     = $comment_by_article ->read_comments_by_article(htmlentities(addslashes($_GET['id_article'])));

            return $result =
            [
                  "data"                        => $data,
                  "nbarticle"                   => $nbArticle,
                  "comments"                    => $comments,
                  "comment_by_article"          => $comment_by_article ,
                  "verif_status"                => $verif_status
            ];
      }

      // interactions with user

      function congrats_comment(){

            $config = $this->verif_config();
            $config = $config->fetchall();

            if($config[0]["param_config"] == "on"){

                  if(isset($_POST['titreComment']) && isset($_POST['ContentComment']))
                  {

                        $titreComment     = htmlentities(addslashes($_POST['titreComment']));
                        $contentComment   = htmlentities(addslashes($_POST['ContentComment']));
                        $data_user        = htmlentities(addslashes($_SESSION['id_user']));
                        $id_article       = htmlentities(addslashes($_POST['id_article']));
                        $comment          = new Comment("",$titreComment,$contentComment,$data_user,$id_article,'1',"0");
                        $comment          = $comment->create_comment();

                        header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=congrats_comment");

                  }
            }

            else if (isset($_POST['titreComment']) && isset($_POST['ContentComment']))

            {

                  $titreComment     = htmlentities(addslashes($_POST['titreComment']));
                  $contentComment   = htmlentities(addslashes($_POST['ContentComment']));
                  $id_article       = htmlentities(addslashes($_POST['id_article']));

                  if(isset($_SESSION['id_user'])){

                        $data_user  = $_SESSION['id_user'];

                  } else {
                        $data_user  = '2';
                  };

                  $comment          = new Comment("",$titreComment,$contentComment,$data_user,$id_article,'1',"0");
                  $comment          = $comment->create_comment();

                  header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=congrats_comment");

            }
      }
      function congrats_signal(){

            $config = $this->verif_config();
            $config = $config->fetchall();

            if (isset($_POST['titreSignal']) && isset($_POST['content_signal']) && isset($_POST['id_comment2']) && $config[1]["param_config"] == "on" ){

                  $titreSignal      = htmlentities(addslashes($_POST['titreSignal']));
                  $content_signal   = htmlentities(addslashes($_POST['content_signal']));
                  $user             = htmlentities(addslashes($_SESSION['id_user']));
                  $id_comment       = htmlentities(addslashes($_POST['id_comment2']));

                  $signal           = new Signal("",$titreSignal,$content_signal,$user,$id_comment,'1');
                  $signal           = $signal->create_signal();

                  $updateComment    = new Comment("","","","","","","");
                  $updateComment->update_comment_statut('2',$_POST['id_comment2']);


            }

            else if(isset($_POST['titreSignal']) && isset($_POST['content_signal']) && isset($_POST['id_comment2']) && $config[0]["param_config"] == "off"){

                  $titreSignal      = htmlentities(addslashes($_POST['titreSignal']));
                  $content_signal   = htmlentities(addslashes($_POST['content_signal']));
                  $id_comment       = htmlentities(addslashes($_POST['id_comment2']));

                  if(isset($_SESSION['id_user'])){

                        $data_user  = $_SESSION['id_user'];

                  } else {
                        $data_user  = '2';
                  };

                  $signal           = new Signal("",$titreSignal,$content_signal,$data_user,$id_comment,'1');
                  $signal           = $signal->create_signal();

                  $updateComment    = new Comment("","","","","","","");
                  $updateComment->update_comment_statut('2',$_POST['id_comment2']);

            }
      }

      // manage the user connexion

      function create_account(){

            if (isset($_POST['LoginNom']) && isset($_POST['LoginPrenom']) && isset($_POST['email']) && isset($_POST['login']) && isset($_POST['password'])){

                  $id_user          = "";
                  $last_name        = htmlentities(addslashes($_POST['LoginNom']));
                  $first_name       = htmlentities(addslashes($_POST['LoginPrenom']));
                  $email            = htmlentities(addslashes($_POST['email']));
                  $login            = htmlentities(addslashes($_POST['login']));
                  $password         = password_hash(htmlentities(addslashes($_POST['password'])), PASSWORD_BCRYPT);

                  $new_user   = new User($id_user,$last_name,$first_name,$email,$login,$password ,'reader');

                  $verif_user = $new_user->verif_user();

                  if($verif_user == false){

                        $new_user->create_user();

                        $recup_id = $new_user->read_user_id_by_login($login);

                        $recup_id = $recup_id->fetch();

                        $_SESSION['login']   = $login;

                        $_SESSION["id_user"] = $recup_id["id_user"];

                        header("Location: http://p4.projet-bd-open-classroom.fr");
                  }

                  else

                  {
                        header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=creation_account_ko");

                  }
            }
      }
      function creation_account_ko(){
            if (isset($_POST['LoginNom']) && isset($_POST['LoginPrenom']) && isset($_POST['email']) && isset($_POST['login']) && isset($_POST['password'])){

                  $id_user          = "";
                  $last_name        = htmlentities(addslashes($_POST['LoginNom']));
                  $first_name       = htmlentities(addslashes($_POST['LoginPrenom']));
                  $email            = htmlentities(addslashes($_POST['email']));
                  $login            = htmlentities(addslashes($_POST['login']));
                  $password         = password_hash(htmlentities(addslashes($_POST['password'])), PASSWORD_BCRYPT);

                  $new_user   = new User($id_user,$last_name,$first_name,$email,$login,$password ,'reader');

                  $verif_user = $new_user->verif_user(htmlentities(addslashes($_POST['login'])));

                  if($verif_user == false){

                        $new_user = $new_user->create_user();

                        $recup_id = $new_user->read_user_id_by_login($login);

                        $recup_id = $recup_id->fetch();

                        $_SESSION['login']   = $login;

                        $_SESSION["id_user"] = $recup_id["id_user"];

                        header("Location: http://p4.projet-bd-open-classroom.fr");
                  }
                  else
                  {
                        header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=creation_account_ko");
                  }
            }
      }
      function log_in(){


            if (isset($_POST["login"]) && isset($_POST['password'])){

                  $login_user = htmlentities(addslashes($_POST['login']));
                  $password_user = htmlentities(addslashes($_POST['password']));

                  $verif_login = new User("","","","",$login_user,$password_user,'reader');

                  $result = $verif_login->verif_login($password_user);

                  $_SESSION["id_user"] = $result["id_user"];

                  if ( $result['verif_password'] !== false) {

                        $_SESSION["id_user"] = $result["id_user"];

                        $_SESSION['login'] = $_POST["login"];

                        if($verif_login->verif_role() == "admin")
                        {
                              header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=backoffice/list_article");
                              //header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=backoffice/list_article");

                        }else{

                              header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=home");
                              //header("Location: http://p4.projet-bd-open-classroom.fr/index.php?action=home");
                        }

                  } else {

                        return $infos = '<p class="btn btn-outline-danger col-md-12"> Les informations de connexion sont incorrectes </p>';
                  }
            }
      }
      function log_out(){
            // call the session
            session_start();

            // erase content $_SESSION
            $_SESSION = NULL;

            // destroy the session
            session_destroy();

            // rediirect to the homepage
            //header("Location: http://p4.projet-bd-open-classroom.fr/index.php");
            header("Location: http://p4.projet-bd-open-classroom.fr/index.php");
      }

}
?>
