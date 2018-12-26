<?php

if (isset($_POST['titreSignal'])&&isset($_POST['content_signal'])&& isset($_POST['id_comment2']) && $array_config[0][1]==='on')
{
      $titreSignal = htmlentities(addslashes($_POST['titreSignal']));
      $content_signal = htmlentities(addslashes($_POST['content_signal']));
      $user= htmlentities(addslashes($_SESSION['data_user'][0]));
      $id_comment= htmlentities(addslashes($_POST['id_comment2']));

      $signal = new Signal("",$titreSignal,$content_signal,$user,$id_comment,'1');
      $signal = $signal->create_signal();

      $updateComment = new Comment("","","","","","","");
      $updateComment->update_comment_statut('2',$_POST['id_comment2']);
}
else if(isset($_POST['titreSignal']) && isset($_POST['content_signal']) && isset($_POST['id_comment2']))
{
      $titreSignal = htmlentities(addslashes($_POST['titreSignal']));
      $content_signal = htmlentities(addslashes($_POST['content_signal']));
      $id_comment= htmlentities(addslashes($_POST['id_comment2']));

      $signal = new Signal("",$titreSignal,$content_signal,'2',$id_comment,'1');
      $signal = $signal->create_signal();
      $updateComment = new Comment("","","","","","","");
      $updateComment->update_comment_statut('2',$_POST['id_comment2']);
}

?>
