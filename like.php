<?php
session_start();
include("classes/Post.php");
$post = new Post();

if(!empty($_GET)){
   $likeData = $post->like($_GET['post_id'],$_SESSION['user_id']);
   echo json_encode($likeData);
}

?>