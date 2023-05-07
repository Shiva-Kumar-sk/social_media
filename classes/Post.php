<?php
include("DBConnection.php");

class Post extends DBConnection{
    function addPost($id,$image_name,$discription){

        $sql = " INSERT INTO user_post(user_id,user_pic,discription) VALUES('$id','$image_name','$discription')";
        $result = $this->con->query($sql);
        if($result==true){
            header("location:index.php");
           }


    }





    function getPost($current_user){
        $sql = "SELECT users.name,count(users_comment.id) as total_comment, count(DISTINCT likes.id) as liked, user_post.* FROM user_post  
        join users  on user_post.user_id = users.id
        left join users_comment on user_post.id = users_comment.post_id
        left join likes on user_post.id = likes.post_id and likes.users_id=$current_user
        GROUP BY (user_post.id)
        ORDER BY id DESC";
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

    function like($post_id,$user_id){
        $sql = "select * from likes where post_id=$post_id and users_id = $user_id";
        $result = $this->con->query($sql);
        if($result->num_rows > 0){
         $sql = "delete from likes where post_id = $post_id and users_id = $user_id";
         $this->con->query($sql);
        } else{

            $sql="insert into likes (post_id , users_id) values('$post_id','$user_id')";
            $this->con->query($sql);
        }

        $data = ['status' => true,'massege'=>'Post liked'];
        return $data;

    }


    

}

