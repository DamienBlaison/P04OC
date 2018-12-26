<?php
$lastarticle = new Article("","","","");
$readLasarticle = $lastarticle->read_last_article();
$data = $readLasarticle->fetch();
$listArticle = $lastarticle->read_articles_front();
?>
