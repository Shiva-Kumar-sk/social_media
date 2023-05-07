<?php
include("classes/User.php");
include("nav.php");
$changeoldpassword = new Users();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Change Password</title>
</head>

<body>
    <div class="row bg-primary text-center">
       
        <h1> Password Update</h1>

    </div>


    <?php


    if (!isset($_SESSION['user_id'])) {
        header("location:login.php");
        exit();
    }

    $user_id = $_SESSION["user_id"];

    $result = $changeoldpassword->checkOldPassword($user_id);
    $rew = $result->fetch_assoc();

    $old_passworderr = $new_password_err = $confirm_password_err = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $old_password = $new_password =  $confirm_password = "";

        if (empty($_POST['old_password'])) {
            $old_passworderr = "please enter your old password";
        } else {
            $old_password = $_POST["old_password"];
        }

        if (empty($_POST['new_password'])) {
            $new_password_err = "please enter your new password";
        } else {

            $new_password = $_POST["new_password"];
        }

        if (empty($_POST['confirm_password'])) {
            $confirm_password_err = "enter confirm password";
        }

        $confirm_password = $_POST["confirm_password"];

        if ($old_password == $rew['password']) {
            if ($new_password !== $old_password) {

                if ($new_password == $confirm_password) {

                    $results = $changeoldpassword->updatePassword($new_password, $user_id);
                    if ($results) {

                        header("Location: index.php");
                        exit();
                    }
                } else {

                    $confirm_password_err = "New password and confirm password do not match.";
                }
            } else {
                $confirm_password_err = "old password can not be new password";
            }
        } else {

            $old_passworderr = "Old password is incorrect.";
        }
    }

    ?>


    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <form action="" method="post">
                <div class="col-sm-4">

                    <label>Current Password</label>
                    <div class="form-group pass_show">
                        <input type="password" name="old_password" value="" class="form-control" placeholder="Current Password">
                        <span><?php echo $old_passworderr;  ?></span>
                    </div>
                    <label>New Password</label>
                    <div class="form-group pass_show">
                        <input type="password" name="new_password" value="" class="form-control" placeholder="New Password">
                        <span><?php echo $new_password_err;  ?></span>
                    </div>
                    <label>Confirm Password</label>
                    <div class="form-group pass_show">
                        <input type="password" name="confirm_password" value="" class="form-control" placeholder="Confirm Password">
                        <span><?php echo $confirm_password_err;  ?></span>
                    </div>
                    <div class="form-group pass_show">
                        <input type="submit" value="Update Password" class="btn btn-success btn-block">
                    </div>

                </div>
            </form>
            <div class="col-sm-4">


            </div>
        </div>
    </div>


</body>

</html>