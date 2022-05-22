<?php
class History extends Controller{
  public function index(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    
    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "list_order" => $this->model("Pesanan_model")->pengiriman_selesai()
    ];

    
    if(isset($_POST['month_filter'])){
      if($_POST['month'] == 'all'){

      }
      else{
        $list_order = array();
        foreach ($data['list_order'] as $order) {
          $value = substr($order['tanggal_terima'], 5,2);
          if($value == $_POST['month']){
            array_push($list_order,$order);
          }
        }
        $data['list_order'] = $list_order;
      }
      
    }
    


    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");

    
  }
}