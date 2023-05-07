<?php
include("classes/Post.php");
include("nav.php");
$add_post = new post();
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Add New Post</title>
    <style>
        .form {
            margin: 200px;
            margin-left: 350px;
        }
    </style>
</head>

<body>

    <?php

    $imageerr = $discriptionerr = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $image = $discription = "";
        if (empty($_FILES['file'])) {
            $imageerr = " Please Select A Image";
        } else {
            $image = $_FILES['file'];
        }
        if (empty($_POST['discription'])) {
            $discriptionerr = "write some line about your pic";
        } else {
            $discription = $_POST['discription'];
        }
    }
    if (!empty($_POST['submit'])) {
        $id = $_SESSION['user_id'];
        $image = $_FILES['file'];
        $discription = $_POST['discription'];
        $image_name = $image['name'];
        $image_error = $image['error'];
        $image_temp = $image['tmp_name'];
        

        $image_ext = explode('.', $image_name);
        $file_check = strtolower(end($image_ext));

        $file_ext_stored = array('jpg', 'png', 'jpeg');

        if (in_array($file_check, $file_ext_stored)) {
            $destination_file = $image_name;
            move_uploaded_file($image_temp,  'image/' . $destination_file);

        
         $add_post->addPost($id,$image_name,$discription);

           
        }
    }

    ?>

    <div class="col-sm-6 margin-auto form">
        <form method="post" enctype="multipart/form-data">

            <div class="form-outline mb-4">
            <label class="form-label" for="email">select your post</label>
                <input type="file" name="file" id="file" class="form-control" />
                <span><?php echo $imageerr; ?></span>
            </div>

            <div class="form-outline mb-4">
            <label class="form-label" for="discription">discription</label>
                <input type="text" name="discription" id="discription" class="form-control" />
                <span class="text-danger"><?php echo " " . $discriptionerr;  ?></span>
            </div>

            <input type="submit" name="submit" value="Post" class="btn btn-success btn-block">

        </form>
    </div>

</body>

</html>