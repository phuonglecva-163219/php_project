<?php
class Controller {
    public function model($model) {
        require_once '/var/www/html/mvc/models/'.$model.'.php';
        return new $model;
    }

    public function view($view, $data = []) {
        require_once '/var/www/html/mvc/views/'.$view.'.php';
    }
}

?>