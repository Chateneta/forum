<?php
require_once('../class/post.class.php');
$post = new Post();
$post->upVote($_POST['idu'],$_POST['idp']);
$r = $post->getUpVote($_POST['idp']);
echo $r;
?>