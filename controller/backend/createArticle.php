<?php
if( isset($_POST['title_article']) && isset($_POST['content_article']))
{
  $article_creation= new Article("",$_POST['title_article'],$_POST['content_article'],"1");
  $article_creation->save_article();
}
?>
