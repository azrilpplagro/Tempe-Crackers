<?php
class Order extends Controller{
  public function __construct()
  {
    parent::__construct();
    $this->model("Pesanan_model")->delete_expired_payment();
  }


  public function index(){

    header("Location: ".BASE_URL."/Order/havent_paid");

    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->get_pesanan_by_email($_SESSION['login']['email'])
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function havent_paid(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->get_pesanan_belum_lunas($_SESSION['login']['email'])
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }
  
  public function packed(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];

    if(isset($_POST['tombol_confirm'])){
      $this->view("Component/confirm_shipping",["id"=>$_POST['tombol_confirm']]);
    }
    if(isset($_POST['confirm_shipping'])){
      $this->model("Pesanan_model")->confirm_shipping($_POST['id']);
      header("Location: ".BASE_URL."/Order/done");
    }


    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->get_pesanan_sedang_dikemas($_SESSION['login']['email'])
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }
  public function sent(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->get_pesanan_dikirim()
    ];

    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function detail_shipping(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    if(!isset($_SESSION['params'][0])){
      header("Location: ".BASE_URL."/Order/sent");
    }
    else{
      $params = $_SESSION['params'][0];
    }
    if(isset($_POST['tombol_confirm'])){
      $this->view("Component/confirm_shipping",["id"=>$_POST['id']]);
    }
    if(isset($_POST['confirm_shipping'])){
      $this->model("Pesanan_model")->confirm_shipping($_POST['id']);
      header("Location: ".BASE_URL."/Order/done");
    }
    if(isset($_POST['cancel'])){
      header("Location: ".BASE_URL."/Order/detail_shipping/$params");
    }

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "detail_order" => $this->model("Pesanan_model")->get_detail_pengiriman([
        "email" =>$_SESSION['login']['email'],
        "id"=> $params
      ])
    ];

    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function done(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->pengiriman_selesai()
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }
  public function detail_order_done(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    if(!isset($_SESSION['params'][0])){
      header("Location: ".BASE_URL."/Order/done");
    }
    else{
      $params = $_SESSION['params'][0];
    }
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "detail_order" => $this->model("Pesanan_model")->detail_pesanan_selesai([
        "email" =>$_SESSION['login']['email'],
        "id"=> $params
      ])
    ];

    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function canceled(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->get_pesanan_dibatalkan($_SESSION['login']['email'])
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }




  public function payment_detail(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    if(!isset($_SESSION['params'][0])){
      header("Location: ".BASE_URL."/Order");
    }
    else{
      $params = $_SESSION['params'][0];
    }

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "detail_order" => $this->model("Pesanan_model")->get_detail_pemesanan([
        "email" =>$_SESSION['login']['email'],
        "id" => $params
      ])
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }


  public function payment_validation(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    if(!isset($_SESSION['params'][0])){
      header("Location: ".BASE_URL."/Order");
    }
    else{
      $params = $_SESSION['params'][0];
    }

    if(isset($_POST['confirm']) && isset($_FILES['bukti_pembayaran'])){
      $this->uploadImg($params);
    }

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "detail_order" => $this->model("Pesanan_model")->get_detail_pemesanan([
        "email" =>$_SESSION['login']['email'],
        "id" => $params
      ]),
      
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  
  }
























  function uploadImg($id){
    $imgName = $_FILES['bukti_pembayaran']['name'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $size = $_FILES['bukti_pembayaran']['size'];
    $locationUp = $_FILES['bukti_pembayaran']['tmp_name'];
    $formatFile = $_FILES['bukti_pembayaran']['type'];
    
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
    
    $nameFix = ucwords($id.$formatFix);
    
    if ($error == 0 ){
      if ($size < 200000000000){
        // echo $formatFile;
        if($formatFile == 'image/jpeg' || $formatFile == 'image/png'){
          $path = realpath($_SERVER["DOCUMENT_ROOT"])."/Tempe-Crackers-admin/public/proof of payment";
          move_uploaded_file($locationUp,$path.'/'.$nameFix);
          $this->model("Pesanan_model")->upload_proof_of_payment($id,$nameFix);
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => true,
            "title" => "Success",
            "message" => "Payment Validation Sent Successfully!",
            "url" => BASE_URL.'/Order/'
          ]);
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "warning",
            "message" => "File format must be jpg/png",
            "url" => ''
          ]);
        }
      }
      else{
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => false,
          "title" => "warning",
          "message" => "File size is too big",
          "url" => ''
        ]);
      }
    }
    else{
      $this->view("Component/modal_redirect",$data_alert = [
        "type" => false,
        "title" => "warning",
        "message" => "File size is too big",
        "url" => ''
      ]);
    }
  }
}

?>