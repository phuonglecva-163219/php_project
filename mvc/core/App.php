<?php 
class App {
    protected $controller = "admin";
    protected $action = "home";
    protected $params = [];
    
    function __construct()
    {
        $arr = $this->urlProcess();
        // print_r($arr);
        // Xu ly Controller
        // echo '/var/www/html/mvc/controllers/'.$arr[0].'.php';
        if (file_exists('/var/www/html/mvc/controllers/'.$arr[0].'.php')) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once '/var/www/html/mvc/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // echo $this->action;
        $this->params =  $arr ? array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function urlProcess() {
        if (isset($_GET['url'])) {
            // return $u = $_GET['url'];
            return explode("/", filter_var(trim($_GET['url'], '/')));
        }
    }
}
?>