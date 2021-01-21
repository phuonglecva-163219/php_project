<?php 

class Home extends Controller{
    function sayHi() {
        $sv1 = $this->model('PostModel');
        echo $sv1->getSv();
    }

}
?>