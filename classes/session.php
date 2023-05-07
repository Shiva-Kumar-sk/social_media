
    <?php
    class session{
        
        function notSetSession(){
            if (!isset($_SESSION['user_id'])) {
                header("location:login.php");
            }

        }

        function setSession(){
            if (isset($_SESSION['user_id'])) {
                header("location:index.php");
            }
        }



        }






    


    

     

    // if (isset($_POST['logout'])) {
    //     session_unset();
    //     session_destroy();
    //     header("location:login.php");
    // }



    
    ?>
    
