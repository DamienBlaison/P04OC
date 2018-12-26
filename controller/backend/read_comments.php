<?php
$comments = new Comment("","","","","","","");
$last_comments = $comments->read_comments_plage(1);
$count_last_comments = $comments->count_read_comments();
$list_chapter = $comments->select_chapter_comments(1);
$count=$count_last_comments->fetch();
$nbComments = $count[0];
$nbrepage = $nbComments/12;
$nbrepage = ceil($nbrepage);
$page = 1;
$a=0;
?>
