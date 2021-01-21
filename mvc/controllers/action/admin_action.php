<?php 
class Admin_Action {
    public $post;
    function __construct($post){
        $this->post= $post;
    }
    
    public function getHtml() {
        $str =  '<a style="margin-right:10px" href="http://localhost/public/admin/show_details/'.$this->post["id"].'">Show</a>';
        $str .= '<a style="margin-right:10px" href="http://localhost/public/admin/update/'.$this->post["id"].'">Edit</a>';
        // $str .= '<a id="delete" style="margin-right:10px" href="http://localhost/public/admin/delete/'.$this->post["id"].'">Delete</a>';
        $str .= '<button id="'.$this->post['id'].'" class="btn btn-link del" type="button" style="margin-right:10px">Delete</button>';
        return $str;
    }
}
?>