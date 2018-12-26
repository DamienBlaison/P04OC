<?php
$instanceArticle= new Article("","","","");
$instanceArticle2 =  new Article("","","","");
$listArticle = $instanceArticle->read_articles();

$countArticle = $instanceArticle->count_articles();
$count=$countArticle->fetch();
$nbarticle = $count[0];

$nbrepage = $nbarticle/12;
$nbrepage = ceil($nbrepage);
$page = 1;

$a=0;

?>
