<?php
$instanceUser= new User("","","","","","","");
$listUser= $instanceUser->read_users();
$instanceComment = new Comment("","","","","","","");

//recupération du nombre d'articles

$countUsers = $instanceUser->count_users();
$count=$countUsers->fetch();
$nbUsers = $count[0];

// définition du nombre de page

$nbrepage = $nbUsers/15;
$nbrepage = ceil($nbrepage);
$page = 1;

$a=0;

?>
