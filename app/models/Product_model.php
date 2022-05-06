<?php
class Product_model{

  private $table = "produk";
  private $db;
  
  public function __construct()
  {
    $this->db = new Database;
  }

  public function get_all_product(){
    $query = "SELECT * FROM $this->table ORDER BY id DESC";
    $this->db->query($query);
    return $this->db->result_set();
  }

  public function get_spesific_product($id){
    $query = "SELECT * FROM $this->table WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id',$id[0]);
    return $this->db->single();
  }
}