<?php
class App{
    protected $controller="Home";
    protected $action="Show";
    protected $params;
   
    function __construct(){
         $arr=$this->UrlProcess();
    // print_r($arr);
    //xuli Controller
    if(isset($arr[0])){
        $tam=$arr[0];
    }else{
        $tam='';
    }
    if(file_exists("./MVC/controllers/".$tam.".php")){
        $this->controller=$arr[0];
        unset($arr[0]);   
        }             
        require_once "./MVC/controllers/".$this->controller.".php";
        $this->controller= new $this->controller;
        //xuli Action
    if(isset($arr[1])){
        if(method_exists($this->controller,$arr[1])){
            $this->action=$arr[1];
            }
            unset($arr[1]);
        }
       // echo $this->action;
       //xuli Params
       $this->params=$arr?array_values($arr):[];
       call_user_func_array([$this->controller,$this->action],$this->params);
    }
    function UrlProcess(){
        //http://localhost/live/Home/SayHi/a/b/c
        //Array ( [0] => Home [1] => SayHi [2] => a [3] => b [4] => c )
        if(isset($_GET["url"])){
          return  explode("/",filter_var(trim($_GET["url"],"/")));          
        }
    }
}
?>