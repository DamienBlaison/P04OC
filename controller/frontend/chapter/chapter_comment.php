<?php

if(isset($_POST['titreComment']) && isset($_POST['ContentComment']) && $array_config[1][1]=='on'){

      $titreComment= htmlentities(addslashes($_POST['titreComment']));
      $contentComment= htmlentities(addslashes($_POST['ContentComment']));
      $data_user= htmlentities(addslashes($_SESSION['data_user'][0]));
      $id_article= htmlentities(addslashes($_GET['id_article']));

      $comment = new Comment("",$titreComment,$contentComment,$data_user,$id_article,'1',"0");
      $comment = $comment->create_comment();
}
else if (isset($_POST['titreComment']) && isset($_POST['ContentComment']))
{
      $titreComment= htmlentities(addslashes($_POST['titreComment']));
      $contentComment= htmlentities(addslashes($_POST['ContentComment']));
      $id_article= htmlentities(addslashes($_GET['id_article']));

      $comment = new Comment("",$titreComment,$contentComment,'2',$id_article,'1',"0");
      $comment = $comment->create_comment();
}
?>
