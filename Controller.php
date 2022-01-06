<?php
class Controller{
    public function model($model){
        require_once "./MVC/models/".$model.".php";
        return new $model;
    }
    public function view($view){
        require_once "./MVC/views/".$view.".php";
    }
}
?>