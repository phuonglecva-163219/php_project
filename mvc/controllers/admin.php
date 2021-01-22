<?php 

class Admin extends Controller{
    public $postModel;
    function __construct(){
        $this->postModel = $this->model('PostModel');
    }

    function home() {
        $this->view('PostMain', [
            'posts' => $this->postModel->getPost(),
            'currentPage' => 1,
            'numPage'=> 10
        ]);
    }

    function show($numPage, $currentPage) {
        $this->view('PostMain', [
            'posts' => $this->postModel->getPost(),
            'currentPage' => $currentPage,
            'numPage'=> $numPage
        ]);
    }
    function show_details($postId) {
        $post = $this->postModel->getPostById($postId);
        $arr = [];
        while($row = mysqli_fetch_array($post)) {
            array_push($arr, $row);
        }
        $this->view('PostDetail', [
            'post' => $arr[0]
        ]);
        
    }
    function update($postId) {
        $post = $this->postModel->getPostById($postId);
        $arr = [];
        while($row = mysqli_fetch_array($post)) {
            array_push($arr, $row);
        }
        $this->view('EditPost', [
            'post' => $arr[0]
        ]);
    }
    function delete($postId) {
        $res = $this->postModel->deletePost($postId);
        if ($res == 1) {
            sleep(0.5);
            header("Location: http://localhost/public/admin/show/10/1");
            die();
        }else {
            return false;
        }
    }
    function addform() {
        $this->view('AddForm',[]);
    }

    function add($title, $status, $description, $image) {
        $this->postModel->addPost($title, $status, $description, $image);

    }
    function edit($postId, $title, $status, $description, $image) {
        $this->postModel->editPost($postId, $title, $status, $description, $image);

    }
    function error() {
        echo 'Some thing went wrong!';
    }

}
?>