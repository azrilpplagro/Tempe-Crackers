<?php
class Login extends Controller{
  public function index(){
    
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
    ];
    if(isset($_POST['login'])){
      $is_alredy_account = $this->model("User_model")->login($_POST['email'],$_POST['password']);

      if($is_alredy_account != false){
        $_SESSION['login'] = ["email"=>$is_alredy_account['email'], "password"=> $is_alredy_account['password']  ];
        header("Location: ".BASE_URL."/Home");
      }
      else{
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => false,
          "title" => "Warning",
          "message" => "The username or password you entered is wrong",
          "url" => BASE_URL.'/Login'
        ]);
      }
    }
    
    $this->view("header",$data['controller_name']);
    $this->view("$data[controller_name]/index",$data);
    $this->view("footer");


    
  }
}


?>