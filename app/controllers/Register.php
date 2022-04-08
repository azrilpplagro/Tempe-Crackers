<?php

use function PHPSTORM_META\type;

class Register extends Controller{
  public function index(){
    
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
    ];
    if(isset($_POST['register'])){
      foreach ($_POST as $value) {
        if($value == ""){
          $this->view("Component/modal",$data_alert = [
            "title" => "Warning",
            "message" => "Data Harus Terisi Semua!",
          ]);
          $this->view("header",$data['controller_name']);
          $this->view("$data[controller_name]/index",$data);
          $this->view("footer");

          
          die();
        }
      }
      $is_validate_phone_number = true;
      foreach ( str_split($_POST['no_telepon']) as $char) {
        if(!is_numeric($char)){
          $this->view("Component/modal",$data_alert = [
            "title" => "Peringatan",
            "message" => "Nomor telepon harus angka!",
          ]);
          $is_validate_phone_number = false;
          break;
        }
      }
      if($is_validate_phone_number == true){
        if(strlen($_POST['no_telepon']) < 11 || strlen($_POST['no_telepon']) > 12 ){
          $this->view("Component/modal",$data_alert = [
            "title" => "Peringatan",
            "message" => "panjang nomor telepon harus 11-12",
          ]);
          $is_validate_phone_number = false;
        }
      }

      if($is_validate_phone_number == true){
        if(!is_bool($this->model("User_model")->register($_POST))){
          $result = $this->model("User_model")->register($_POST);
  
          $key = "";
          if($_POST['email'] == $result['email']){
            $key .= ",email";
          }
          if($_POST['username'] == $result['username']){
            $key .= ",username";
          }
          if($_POST['no_telepon'] == $result['no_telepon']){
            $key .= ",no telepon";
          }
          $key = substr_replace($key, '', 0, 1);
          
          $this->view("Component/modal",$data_alert = [
            "title" => "Warning",
            "message" => "$key yang anda masukan sudah dipakai",
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Registrasi Success",
            "message" => "pendaftaran berhasil, silahkan login untuk masuk ke website",
            "url" => BASE_URL.'/Login'
          ]);
        }
      }
      
    }
    
    // echo $this->controller;
    $this->view("header",$data['controller_name']);
    $this->view("$data[controller_name]/index",$data);
    $this->view("footer");


    
  }
}


?>