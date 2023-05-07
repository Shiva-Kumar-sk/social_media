<?php
include("classes/Comment.php");
$con = new mysqli("localhost", "root", "", "myworld");
$objcomment = new Comment();
 include("nav.php"); 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Comment</title>
    <style>

    </style>
</head>

<body>
    
    <?php

    if (empty($_GET['id'])) {

        header("location:index.php");
    }
    $post_id = $_GET['id'];

    $result = $objcomment->checkPost($post_id);
    foreach ($result as $key => $rew) {}

        if ($rew['id'] !== $post_id) {

            header("location:index.php");
        } else {

            $commenterr = "";
            if (!empty($_POST['submit'])) {

                $comment = "";
                if (empty($_POST['comment'])) {
                    $commenterr = "Please say sommething about this post";
                } else {
                    $comment = $_POST['comment'];
                }

                $user_id = $_SESSION['user_id'];



                if ($post_id !== "" && $user_id !== "" && $comment !== "") {
                                        
                   $result =$objcomment->post_comment($post_id,$user_id,$comment);
                }
            }
        }
    
    ?>

        <div class="container">
            <div class="row">

                <form action="" method="post">
                    <input type="text" name="comment" placeholder="say something" class="form-control">
                    <span><?php echo $commenterr; ?></span><br>
                    <input type="submit" name="submit" value="Post" class="btn btn-success">
                </form>
            </div>
        </div>
    <?php
        
        $result = $objcomment->get_comment($post_id);
        foreach($result as $key => $rew){
       
            echo "<b>" . $rew['name'] . "</b>" . " " . $rew['comment'] . "<b> at </b>" . date("d M y h:m a",strtotime($rew['date_at']) ) . "<br><br>";
        }
        

    ?>

</body>

</html>