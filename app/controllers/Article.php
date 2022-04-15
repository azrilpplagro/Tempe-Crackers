<?php
class Article extends Controller{
  public function index(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "articles" => $this->model("Article_model")->get_all_article()
    ];
      
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function detail_article(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $params = $_SESSION['params'];


    if(count($params)<1){
      header("Location: ".BASE_URL."/Article");
    }
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "article" => $this->model("Article_model")->get_article($params)
    ];
      
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }
}
?>