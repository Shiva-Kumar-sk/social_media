<?php
include("DBConnection.php");

class Users extends DBConnection
{

    function check_user($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->con->query($sql);
        return $result;

    }




    function registration($name, $email, $gender, $password)
    {
        $sql = "INSERT INTO users(name,email,gender,password) VALUES('$name','$email','$gender','$password')";
        $result = $this->con->query($sql);
        if ($result == true) {
            header("location:index.php");
        }
    }

    function login($email, $password)
    {
        $data = ["status" => true, "massege" => ""];
        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1 ";
        $result = $this->con->query($sql);
        $rows = $result->fetch_assoc();
        if ($result->num_rows > 0 && $rows['password'] == $password) {

            $_SESSION['user_id'] = $rows['id'];
            $_SESSION['user_name'] = $rows['name'];

            header("location:index.php");
        } else {

            $data["massege"] = "userid or password incorrect";
            $data["status"] = false;
        }
        return $data;
    }

    function updateProfile($name,$user_id){
        $sql = "UPDATE users SET name = '$name' WHERE id = $user_id ";
             $this->con->query($sql);


    }

    function showOldName($user_id){
        $sql ="SELECT name FROM users WHERE id = $user_id LIMIT 1 ";
        $result = $this->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }



    function updatePassword($new_password,$user_id){
        $sql = "UPDATE users SET password = '$new_password' WHERE id = $user_id";
               $result = $this->con->query($sql);
               return $result;

    }

    function checkOldPassword($user_id){
        $sql = "SELECT * FROM users WHERE id = $user_id";
         $result = $this->con->query($sql);
         return $result;
    }

    


    
}
