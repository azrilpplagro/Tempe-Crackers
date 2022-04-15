<?php
class Controller{

  // IF ISSET LOGIN FEATURES
  public function __construct()
  {
    if(
      !isset($_SESSION['login']) && 
      ($_SESSION['controller_name'] != "Login"  &&
      $_SESSION['controller_name'] != "Register"  &&
      $_SESSION['controller_name'] != "First_Page" )
      ){
        if($_SESSION['controller_name'] != "First_Page"){
          header("Location: ".BASE_URL."/First_Page");  
      }
    }

    else if (isset($_SESSION['login']) && ($_SESSION['controller_name'] == "Login" || $_SESSION['controller_name'] == "Register" || $_SESSION['controller_name'] == "First_Pagr") ){
      header("Location: ".BASE_URL."/Article"); 
    }
    else if(isset($_SESSION['login'])  && ($_SESSION['controller_name'] != "Login" || $_SESSION['controller_name'] != "Register" || $_SESSION['controller_name'] != "First_Page" )){
      $is_alredy_account = $this->model("User_model")->login($_SESSION['login']['email'],$_SESSION['login']['password']);
      if($is_alredy_account == false){
        session_destroy();
        header("Location: ".BASE_URL."/First_Page");
      }
    }


    if(isset($_POST['tombol_logout'])){
      $this->view("Component/option_logout",[]);
    }
    if(isset($_POST['logout'])){
      echo "yes";
      session_destroy();
      header("Location: ".BASE_URL."/Login");
      die();
    }
  }
  
  
  public function view($view,$data=[]){
    require_once "../app/views/$view.php";
  }

  public function model($model){
    require_once "../app/models/$model.php";
    return new $model;
  }


  public function show_loading_screen(){
    require "../app/views/LoadingScreen.php";
  }
}

?>