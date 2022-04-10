<?php

class About extends Controller{
  public function index(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "user_data"=>$this->model("User_model")->get_data_user($_SESSION['login']['email'])
    ];
      
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function edit(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "user_data"=>$this->model("User_model")->get_data_user($_SESSION['login']['email'])
    ];

    if(isset($_POST['edit'])){
      $data_post = $_POST;
      $this->view("Component/verifikasi_password",$data_post);
    }

    if(isset($_POST['verifikasi_password'])){
      if($_POST['password'] == $_SESSION['login']['password']){
        $_POST = $_SESSION['form'];
        unset($_SESSION['form']);
          // cek nilai null
        $is_isset_null = false;
        foreach ($_POST as $value) {
          if($value == ""){
            $is_isset_null = true;
            break;
          }
        }
        
        if($is_isset_null == false){

          $is_validate_phone_number = true;
          foreach ( str_split($_POST['no_telepon']) as $char) {
            if(!is_numeric($char)){
              $this->view("Component/modal_redirect",$data_alert = [
                "type" => false,
                "title" => "Warning",
                "message" => "The phone number must be a number!",
                "url" => BASE_URL.'/About/edit'
              ]);
              $is_validate_phone_number = false;
              break;
            }
          }
          if($is_validate_phone_number == true){
            if(strlen($_POST['no_telepon']) < 11 || strlen($_POST['no_telepon']) > 12 ){
              $this->view("Component/modal_redirect",$data_alert = [
                "type" => false,
                "title" => "Warning",
                "message" => "The length of the phone number must be 11-12",
                "url" => BASE_URL.'/About/edit'
              ]);
              $is_validate_phone_number = false;
            }
          }

          if($is_validate_phone_number == true){
            $result = $this->model("User_model")->update_data($_POST) ;
            if(is_bool($result) ){
              $this->view("Component/modal_redirect",$data_alert = [
                "type" => true,
                "title" => "Success",
                "message" => "Data saved successfully",
                "url" => BASE_URL.'/About'
              ]);
            }
            else{
              $key = "";
              if($_POST['username'] == $result['username']){
                $key .= ",username";
              }
              if($_POST['no_telepon'] == $result['no_telepon']){
                $key .= ",no telepon";
              }
              $key = substr_replace($key, '', 0, 1);
    
              $this->view("Component/modal_redirect",$data_alert = [
                "type" => false,
                "title" => "Warning",
                "message" => "$key you entered is already in use",
                "url" => BASE_URL.'/About/edit'
              ]);
            }
          }
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "Warning",
            "message" => "The input data cannot be empty",
            "url" => BASE_URL.'/About/edit'
          ]);
        }
      }
      else{
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => false,
          "title" => "Warning",
          "message" => "Password wrong",
          "url" => BASE_URL.'/About/edit'
        ]);
      }
    } 
    if(isset($_POST['tombol_photo'])){
      $this->view("Component/upload_img",["title" => "Upload Gambar"]);
    }
    if(isset($_FILES['img_upload'])){
      if ( $_FILES['img_upload']['name'] != "" ){
        $photo = $this->model("User_model")->get_data_user($_SESSION['login']['email'])['profil'];
        if($photo == ""){
          $this->uploadImg();
        }
        else if(file_exists(realpath($_SERVER["DOCUMENT_ROOT"])."/Tempe-Crackers/public/img/$photo")){
          unlink(realpath($_SERVER["DOCUMENT_ROOT"])."/Tempe-Crackers/public/img/$photo");
          $this->uploadImg(); 
        }
      }
    }


    if(isset($_POST['edit_tempat'])){
      $this->view("Component/input_negara",$_POST);
    }
    // input_negara
    if(isset($_POST['input_negara'])){
      $data_provinsi = ($this->model("User_model")->get_provinsi_by_negara($_POST['negara']));
      
      if(count($data_provinsi) == 0){
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => 0,
          "kabupaten" => 0,
          "kecamatan" => 0,
          "desa" => 0
        ];
        $data_email = $_SESSION['login']['email'];
        $data_update_tempat = $data_send;
        $result = $this->model("User_model")->update_tempat($data_email,$data_update_tempat) ;
        if(is_bool($result) ){
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Success",
            "message" => "Data saved successfully",
            "url" => BASE_URL.'/About'
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "Warning",
            "message" => "Failed to update data",
            "url" => BASE_URL.'/About'
          ]);
        }
      }
      else{
        $data_send = [
          "negara" => $_POST['negara'],
          "data_provinsi" => $data_provinsi,
        ];
        $this->view("Component/input_provinsi",$data_send);
      }
      
    }
    if(isset($_POST['input_provinsi'])){
      $data_kabupaten = ($this->model("User_model")->get_kabupaten_by_provinsi($_POST['provinsi']));

      if(count($data_kabupaten) == 0){
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => $_POST['provinsi'],
          "kabupaten" => 0,
          "kecamatan" => 0,
          "desa" => 0
        ];
        $data_email = $_SESSION['login']['email'];
        $data_update_tempat = $data_send;
        $result = $this->model("User_model")->update_tempat($data_email,$data_update_tempat) ;
        if(is_bool($result) ){
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Success",
            "message" => "Data saved successfully",
            "url" => BASE_URL.'/About'
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "Warning",
            "message" => "Failed to update data",
            "url" => BASE_URL.'/About'
          ]);
        }
      }
      else{
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => $_POST['provinsi'],
          "data_kabupaten" => $data_kabupaten
        ];
        $this->view("Component/input_kabupaten",$data_send);
      }
      
    }
    if(isset($_POST['input_kabupaten'])){
      $data_kecamatan = ($this->model("User_model")->get_kecamatan_by_kabupaten($_POST['kabupaten']));

      if(count($data_kecamatan) == 0){
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => $_POST['provinsi'],
          "kabupaten" => $_POST['kabupaten'],
          "kecamatan" => 0,
          "desa" => 0
        ];
        $data_email = $_SESSION['login']['email'];
        $data_update_tempat = $data_send;
        $result = $this->model("User_model")->update_tempat($data_email,$data_update_tempat) ;
        if(is_bool($result) ){
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Success",
            "message" => "Data saved successfully",
            "url" => BASE_URL.'/About'
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "Warning",
            "message" => "Failed to update data",
            "url" => BASE_URL.'/About'
          ]);
        }
      }
      else{
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => $_POST['provinsi'],
          "kabupaten" => $_POST['kabupaten'],
          "data_kecamatan" => $data_kecamatan
        ];
        $this->view("Component/input_kecamatan",$data_send);
      }
     
    }

    if(isset($_POST['input_kecamatan'])){
      $data_desa = ($this->model("User_model")->get_desa_by_kecamatan($_POST['kecamatan']));

      if(count($data_desa) == 0){
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => $_POST['provinsi'],
          "kabupaten" => $_POST['kabupaten'],
          "kecamatan" => $_POST['kecamatan'],
          "desa" => 0
        ];
        $data_email = $_SESSION['login']['email'];
        $data_update_tempat = $data_send;
        $result = $this->model("User_model")->update_tempat($data_email,$data_update_tempat) ;
        if(is_bool($result) ){
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Success",
            "message" => "Data saved successfully",
            "url" => BASE_URL.'/About'
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "Warning",
            "message" => "Failed to update data",
            "url" => BASE_URL.'/About'
          ]);
        }
      }
      else{
        $data_send = [
          "negara" => $_POST['negara'],
          "provinsi" => $_POST['provinsi'],
          "kabupaten" => $_POST['kabupaten'],
          "kecamatan" => $_POST['kecamatan'],
          "data_desa" => $data_desa
        ];
        $this->view("Component/input_desa",$data_send);
      }
      
    }

    if(isset($_POST['input_desa'])){
      $data_email = $_SESSION['login']['email'];
      $data_update_tempat = $_POST;
      $result = $this->model("User_model")->update_tempat($data_email,$data_update_tempat) ;
      if(is_bool($result) ){
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => true,
          "title" => "Success",
          "message" => "Data saved successfully",
          "url" => BASE_URL.'/About'
        ]);
      }
      else{
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => false,
          "title" => "Warning",
          "message" => "Failed to update data",
          "url" => BASE_URL.'/About'
        ]);
      }
    }


    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }


  function uploadImg(){
    $imgName = $_FILES['img_upload']['name'];
    $error = $_FILES['img_upload']['error'];
    $size = $_FILES['img_upload']['size'];
    $locationUp = $_FILES['img_upload']['tmp_name'];
    $formatFile = $_FILES['img_upload']['type'];
    
    $format = "";
    $formatFix = "";
    for ($i = strlen($imgName)-1; $i>=0; $i--){
      $format .= $imgName[$i];
      if ($imgName[$i] == ".") {
        break;
      }
    }
    for ($i=strlen($format)-1;$i>=0;$i--){
      $formatFix .= $format[$i];
    }
    
    $nameFix = ucwords($_SESSION['login']['email'].$formatFix);
    
    if ($error == 0 ){
      if ($size < 200000000000){
        // echo $formatFile;
        if($formatFile == 'image/jpeg' || $formatFile == 'image/png'){
          $path = realpath($_SERVER["DOCUMENT_ROOT"])."/Tempe-Crackers/public/img";
          move_uploaded_file($locationUp,$path.'/'.$nameFix);
          $this->model("User_model")->upload_gambar($nameFix,$_SESSION['login']['email']);
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Success",
            "message" => "Avatar Upload Successful",
            "url" => BASE_URL.'/About'
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "warning",
            "message" => "File format must be jpg/png",
            "url" => BASE_URL.'/About/edit'
          ]);
        }
      }
      else{
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => false,
          "title" => "warning",
          "message" => "File size is too big",
          "url" => BASE_URL.'/About/edit'
        ]);
      }
    }
    else{
      $this->view("Component/modal_redirect",$data_alert = [
        "type" => false,
        "title" => "warning",
        "message" => "File size is too big",
        "url" => BASE_URL.'/About/edit'
      ]);
    }
  }

}
?>
