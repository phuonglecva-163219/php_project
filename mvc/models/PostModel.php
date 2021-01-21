<?php 
class PostModel extends Db{
    public function getPost() {
        $qr = 'select *  from post';
        return mysqli_query($this->conn, $qr);
    }

    public function getPostById($postId) {
        $rq = 'select * from post where id = '. $postId;
        return mysqli_query($this->conn, $rq); 
    }
    public function addPost($title, $status, $description, $image) {
        $query = 'INSERT INTO post (title, description, image, status, created_at, updated_at) VALUES ("'.$title.'","'.$description.'", "'.$image.'",'.$status.',"'.date_create()->format('Y-m-d H:i:s').'", "'.date_create()->format('Y-m-d H:i:s').'")';
        echo $query;
        if (mysqli_query($this->conn, $query)) {
            header("Location: http://localhost/public/admin/show/10/1");
            die();
          } else {
            header("Location: http://localhost/public/admin/error/");
          }
    }
    public function editPost($postId, $title, $status, $description, $image) {
        // $query = 'INSERT INTO post (title, description, image, status, created_at, updated_at) VALUES ("'.$title.'","'.$description.'", "'.$image.'",'.$status.',"'.date_create()->format('Y-m-d H:i:s').'", "'.date_create()->format('Y-m-d H:i:s').'")';
        $query = ' update post ';
        $query .= ' set title="'.$title.'", description="'.$description.'", status='.$status.', image="' .$image .'"';
        $query .= ' where id= '. $postId;
        // echo $query;
        if (mysqli_query($this->conn, $query)) {
            header("Location: http://localhost/public/admin/show/10/1");
            die();
          } else {
            header("Location: http://localhost/public/admin/error/");
          }
    }

    public function deletePost($postId) {
        $sql = "delete from post where id = ".$postId;
        return mysqli_query($this->conn, $sql);
    }
}
?>