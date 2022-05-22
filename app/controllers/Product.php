<?php
class Product extends Controller{
  public function detail_product(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $params = $_SESSION['params'];


    if(count($params)<1){
      header("Location: ".BASE_URL."/Article");
    }


    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "detail_product"=> $this->model("Product_model")->get_spesific_product($params[0])
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }

  public function create_order(){
    $controller_name = $_SESSION['controller_name'];
    $method_name = $_SESSION['method_name'];
    $params = $_SESSION['params'];


    if(count($params)<1){
      header("Location: ".BASE_URL."/Article");
    }
    if(isset($_POST['create_payment_button'])){
      $data_post = $_POST;
      $detail_product = $this->model("Product_model")->get_spesific_product($_POST['product_id']);
      if($detail_product['stok'] < $data_post['order_count'] ){
        $this->view("Component/modal_redirect",$data_alert = [
          "type" => false,
          "title" => "Warning",
          "message" => "the number of orders exceeds the limit",
          "url" => ''
        ]);
      }
      else{
        if( $this->model("User_model")->get_data_user($_SESSION['login']['email'])['negara_id'] != 0 ){
          $total_weight = ($detail_product['berat'] * $_POST['order_count'] * 1000 );
          if($data_post['shipping_method'] == 'pickup' ){
            $data_post['shipping_cost'] = 0;
            $this->view("Component/verify_order",$data_post);
          }
          else{
            $data_ongkir = new RajaOngkir();
            foreach ($this->model("User_model")->get_data_kabupaten() as $kabupaten) {
              if($kabupaten['id'] == $this->model("User_model")->get_data_user($_SESSION['login']['email'])['kabupaten_id']){
                $kota = $data_ongkir->get_city();
                $kota_array = json_decode($kota,true);
                foreach ($kota_array['rajaongkir']['results'] as $kota) {
                  if($kabupaten['nama_kabupaten'] == $kota['city_name']){
                    $harga = json_decode($data_ongkir->get_cost(160,$kota['city_id'],$total_weight,"pos"),true);
                    if(isset($harga['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'])) {
                      $harga = ($harga['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']);
                      $data_post['shipping_cost'] = $harga;
                      $this->view("Component/verify_order",$data_post);
                    } else {
                      $this->view("Component/modal_redirect",$data_alert = [
                        "type" => false,
                        "title" => "Warning",
                        "message" => "the number of orders exceeds the limit",
                        "url" => ''
                      ]);
                    }
                    break;
                  }
                }
                break;
              }
            }
          }
        }
        else{
          $this->view("Component/modal_redirect",$data_alert = [
            "type" => false,
            "title" => "Warning",
            "message" => "Please fill in the residence data first",
            "url" => BASE_URL.'/About/edit'
          ]);
        }
        
        
      }
    }


    if(isset($_POST['order'])){
      $_POST['tanggal_pesan'] = date("Y-m-d");
      $_POST['batas_pembayaran'] = date('Y-m-d', strtotime("+1 day"));
      $this->model("Pesanan_model")->insert_pesanan($_POST);
      $this->view("Component/modal_redirect",$data_alert = [
        "type" => true,
        "title" => "Success",
        "message" => "order successfully made, account number : ". $this->model("User_model")->get_data_admin()['no_rekening']. " ".$this->model("User_model")->get_data_admin()['nama_lengkap'],
        "url" => BASE_URL.'/Order'
      ]);
    }

    $data = [
      "controller_name"=>$controller_name,
      "method_name"=> $method_name,
      "detail_product"=> $this->model("Product_model")->get_spesific_product($params[0]),
      "user_data"=>$this->model("User_model")->get_data_user($_SESSION['login']['email']),
    ];
    
    $this->view("header",$data['controller_name']);
    $this->view("$controller_name/$method_name",$data);
    $this->view("footer");
  }
}





class RajaOngkir{
  private $key = '702694e33910f1a0c1784e1614e5dc1c';
  private $city_url = '	https://api.rajaongkir.com/starter/city';
  private $cost_url = 'https://api.rajaongkir.com/starter/cost';

  function array_sort_by_collumn(&$arr, $col,$dir = SORT_DESC){
    $sort_col = [];
    foreach ($arr as $key => $value) {
      $sort_col[$key] = $value[$col];
    }
    array_multisort($sort_col,$dir,$arr);
  }

  function get_city(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  function get_cost($id_kota_asal,$id_kota_tujuan,$berat,$kurir){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->cost_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin={$id_kota_asal}&destination={$id_kota_tujuan}&weight={$berat}&courier={$kurir}",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: {$this->key}"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
}