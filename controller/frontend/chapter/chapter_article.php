<?php

$article = new Article($_GET['id_article'],"","","");
$data=$article->read_article();
$data=$data->fetch();
$id=$_GET['id_article'];

$next=$_GET['id_article']+1;
$verif_status=new Article($next,"","","");
$verif_status=$verif_status->read_article();
$verif_status=$verif_status->fetch();
$verif_status=$verif_status['published'];

 ?>
