<?php

$nbArticle=$article->count_articles();
$nbArticle=$nbArticle->fetch();

$comments = new Comment("","","","","",'3',"");
$comments = $comments->read_comments_by_article(htmlentities(addslashes($_GET['id_article'])));
$test = new Comment("","","","","",'3',"");
$test = $test->read_comments_by_article(htmlentities(addslashes($_GET['id_article'])));
?>
