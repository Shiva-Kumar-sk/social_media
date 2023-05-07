<?php
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("location:login.php");
// }

// if (isset($_SESSION['user_id'])) {
//     header("location:index.php");
// }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style>
        li {
            list-style: none;
            margin-left: 100px;

        }
    </style>
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg  bg-success">
        <!-- <a class="navbar-brand active " href="#">Navbar</a> -->


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li>
                <a href="profile_edit.php" class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i><?php echo " ". $_SESSION['user_name']; ?></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li>
                    <a href="addpost.php" class="">AddPost</a>
            </li>
            <li>
                    <form action="index.php" method="post">
                    <input type="submit" name="logout" value="Logout" class="btn btn-danger">
                    </form>
                    
                </li>

            </ul>

        </div>
    </nav>

</body>

</html>