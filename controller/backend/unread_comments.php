<?php
$comments = new Comment("","","","","","","");
$last_comments = $comments->read_comments_plage(0);
$count_last_comments = $comments->count_unread_comments();
$list_chapter = $comments->select_chapter_comments(0);
$count=$count_last_comments->fetch();
$nbComments = $count[0];
$nbrepage = $nbComments/12;
$nbrepage = ceil($nbrepage);
$page = 1;
$a=0;
?>
