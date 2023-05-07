<?php 
include("classes/User.php");
$insert = new Users();
session_start();
if (isset($_SESSION['user_id'])) {
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background: grey;
            background: blend mode 5px;

        }

        span {
            color: #f79e2a;
            font-weight: bold;
        }

        form {
            text-align: center;

            margin-top: 100px;
        }

        a {
            color: aliceblue;
            text-decoration: none;

        }

        a:hover {
            text-decoration: none;
        }
    </style>
    <title>Registration Page</title>
</head>

<body>
<div class="row bg-primary text-center">
        <h1> Wellcome to Regester page</h1>
    </div>
    <?php

    $nameErr = $emailErr = $genderErr = $passwordErr = "";
    $name = $email = $gender = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["user_name"])) {
            $nameErr = "User Name is required";
        } else {
            $name = test_input($_POST["user_name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
            if (strlen($name) < 3) {
                $nameErr = "!Name may be minimum three characters.";
            }
            if (strlen($name) > 20) {
                $nameErr = "!Name may be maximum twenty characters.";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        if (empty($_POST['password'])) {
            $passwordErr = "Password Required";
        } else {
            $password = test_input($_POST['password']);
            if (strlen($password) < 4) {
                $passwordErr = "!password may be minimum four characters.";
            } else if (strlen($password) > 16) {
                $passwordErr = "!password may be maximum sixteen characters.";
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

    if (isset($_POST['submit'])) {

        
        $result = $insert->check_user($email);
        
        if ($result->num_rows > 0) {
            $nameErr = "you have already register";
        }

        else{


        if ($nameErr == "" && $emailErr == "" && $genderErr == "" && $passwordErr == "") {
            
           $insert->registration($name, $email, $gender, $password);
           
        }
    }
    }


    ?>


    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 my-5">
                <form action="" method="post">
                    <div class="row mt-5 form-group ss">
                        <input type="text" name="user_name" placeholder="User Name" autocomplete="off" class="form-control"><br>
                        <span><?php echo $nameErr; ?></span>
                    </div>
                    <div class="row form-group">
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control"><br>
                        <span><?php echo $emailErr; ?></span>
                    </div>
                    
                    <div class="row form-group">
                        <input type="password" name="password" placeholder="password" class="form-control">
                        <span><?php echo $passwordErr; ?></span>
                    </div>
                    <div class="row form-group">
                        <h6>Gender</h6>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="female"> Female</label>
                        <input type="radio" name="gender" id="female" value="female">
                        <span><?php echo $genderErr; ?></span>
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" class="btn btn-success btn-block">
                        <a href="login.php">I have already an account</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">

            </div>

        </div>
    </div>

</body>

</html>