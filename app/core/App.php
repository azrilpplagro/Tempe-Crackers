<?php
$_SESSION['controller_name'] = "Home";
$_SESSION['method_name'] = "index";
$_SESSION['params'] = [];


class App{

  protected $controller = "Home";
  protected $method = "index";
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseURL();
    if(file_exists("../app/controllers/".$url[0].".php")){
      $this->controller = $url[0];
      $_SESSION['controller_name'] = $url[0];
      unset($url[0]);
    }
    else{
      header("Location: ".BASE_URL."/Home");
    }

    // controller
    require_once '../app/controllers/'.$this->controller.".php";
    $this->controller = new $this->controller;
    // $this->controller

    // method
    if(isset($url[1])){
      if(method_exists($this->controller,$url[1])){
        $this->method = $url[1];
        $_SESSION['method_name'] = $url[1];
        unset($url[1]);
      }

    }


    // params
    if(!empty($url)){
      $this->params = array_values($url);
      $_SESSION['params'] = array_values($url);
    }

    // run controller and method 
    call_user_func_array([$this->controller, $this->method],$this->params);
  }

  public function parseURL(){
    if(isset($_GET['url'])){
      $url = rtrim($_GET['url'],'/');
      $url = filter_var($url,FILTER_SANITIZE_URL);
      $url = explode("/",$url);
      return $url;
    }
  }
}


?>