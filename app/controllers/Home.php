<?php
class Home extends Controller{
  public function index(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    
    // echo $this->controller;
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
    ];
    
    // echo $this->controller;
    $this->view("header",$data['controller_name']);
    $this->view("Home/index",$data);
    $this->view("footer");
  }
}
?>