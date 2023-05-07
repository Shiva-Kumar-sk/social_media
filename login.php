<?php
include("classes/User.php");
$user = new Users();

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
    <title>Document</title>
</head>

<body>
<div class="row bg-primary text-center">
        <h1> Welcome Please Login </h1>
    </div>
    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("location:index.php");
    }

    $emailerr = "";
    $passworderr = "";
    $email = "";
    $password = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailerr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Invalid email format";
            }
        }
        if (empty($_POST['password'])) {
            $passworderr = "password is requered";
        } else {
            $password = test_input($_POST['password']);
            if (strlen($password) < 4) {
                $passworderr = "!password may be minimum four characters.";
            }
            if (strlen($password) > 16) {
                $passworderr = "!password may be maximum sixteen characters.";
            }
        }
        if ($emailerr == "" && $passworderr == "") {
            $name = $_POST['email'];
            $password = $_POST['password'];
            $loginstatus=$user->login($email,$password);
            if(!$loginstatus['status']){
                $emailerr = $loginstatus['massege'];

            }
             
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    ?>

    <div class="col-sm-6 margin-auto form">
        <form method="post">

            <div class="form-outline mb-4">
            <label class="form-label" for="email">Email address</label>
                <input type="email" name="email" id="email" class="form-control" />
                <span><?php echo $emailerr; ?></span>
            </div>

            <div class="form-outline mb-4">
            <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
                <span><?php echo $passworderr; ?></span>
            </div>


            <input type="submit" name="submit" value="Login" class="btn btn-success btn-block">


            <div class="text-center">
                <p>Not a member? <a href="register.php">Register</a></p>

            </div>

        </form>
    </div>
</body>

</html>