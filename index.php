<?php
include("nav.php");
include("classes/Post.php");
$get_post = new post();



 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Document</title>
    <style>
         .list{
            margin-left:250px;
            margin-bottom: 50px;
            border-bottom: 2px solid black;
            border-left: 2px solid black;
        } 
        .input{
            width: 445px;
        }
         .comment{
         
         float: right;
         margin-top: 15px;
        }

        h3{
            cursor: pointer;
        }
        .like{
            color:blue;
        }
        
    </style>
</head>

<body>
    


    <?php
     
    
    if (!isset($_SESSION['user_id'])) {
        header("location:login.php");
    }
    



    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("location:login.php");
    }

       $result = $get_post->getPost($_SESSION['user_id']);
       foreach ($result as $rew){
        
        
    ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 list">
                <h4> <?php echo $rew['name']; ?></h4>
                <p> Post at: <i><?php echo date("d M Y h:m a",strtotime($rew['date_at']) ); ?></i></p>
                <p><b> <?php echo $rew['discription']; ?></b></p>
                <img src="image/<?php echo $rew['user_pic']; ?>" alt="" height="500px" width="700px"></br>
                
                <a href="comment.php?id=<?php echo $rew['id']; ?>" class="comment"> comment</a>
                <h3 class="<?php echo $rew['liked']?'like':''; ?>" onclick="clickMe(event,<?= $rew['id'] ?>)"><i class="fa fa-thumbs-up" aria-hidden="true"></i></h3>
               
                
                </div>
            </div>
        </div>



    <?php

    }




    ?>
<script>
var liking=false;
function clickMe(event,post_id){
    if(!liking){
liking=true;
    fetch("/sk/myworld/like.php?post_id="+post_id)
  .then((response) => response.json())
  .then((data) => { liking=false;event.target.classList.toggle("like");});
    }
}

	
</script>

</body>

</html>