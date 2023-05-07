<?php
include("classes/User.php");
include("nav.php");
$updateuser = new Users();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .form {
            margin: 200px;
            margin-left: 350px;
        }
    </style>
    <title>PROFILE ACTION</title>
</head>

<body>
    <div class="row bg-primary text-center">
    <?php  ?>
        <h1> Name update</h1>
        <a href="change_password.php" class="btn btn-success"> Update Password</a>
    </div>

    <?php
    
     if (!isset($_SESSION['user_id'])) {
         header("location:login.php");
     }

    
    $nameerr = "";
    
    $name = "";
    
    $user_id = $_SESSION['user_id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameerr = "name is required";
        } else {
            $name = $_POST["name"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameerr = "Invalid name  format";
            }
        }
       
       


        if ($nameerr == "") {
            
            $name = $_POST['name'];
            
            
            $updateuser->updateProfile($name,$user_id);
        }
    }
   
    $row = $updateuser->showOldName($user_id);
    

    ?>

    <div class="col-sm-6 margin-auto form">
        <form method="post">


            <div class="form-outline mb-4">
            <label class="form-label" for="name">Name</label>
                <input type="text" value="<?php echo $row['name']; ?>" name="name" id="name" class="form-control" />
                <span><?php echo $nameerr; ?></span>
            </div>

            
            <input type="submit" name="submit" value="Update" class="btn btn-success btn-block">

        </form>
    </div>

</body>

</html>