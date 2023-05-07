<?php
include("DBConnection.php");

class Comment extends DBConnection
{

    function checkPost($post_id)
    {
        $sql = "SELECT id FROM user_post WHERE id = $post_id";
        $result = $this->con->query($sql);
        if ($result == false) {
            return false;
        }
        $rows = array();
        
    
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
        
    }
    function get_comment($post_id){
        $sql = "SELECT users.name,users_comment.comment,users_comment.post_id,users_comment.date_at FROM users_comment join users on users.id = users_comment.user_id WHERE post_id = $post_id";
        $result = $this->con->query($sql);
        if($result == false){
            return false;
        }
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }




    function post_comment($post_id,$user_id,$comment){
        $sql = "INSERT INTO users_comment(post_id,user_id,comment) VALUES('$post_id','$user_id','$comment')";
                    $this->con->query($sql);
                    
    }

    

    


}
