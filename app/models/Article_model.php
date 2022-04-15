<?php
class Article_model{

  private $table = "artikel";
  private $db;
  
  public function __construct()
  {
    $this->db = new Database;
  }

  public function get_all_article(){
    $query = "SELECT * FROM $this->table ORDER BY id DESC";
    $this->db->query($query);
    return $this->db->result_set();
  }

  public function get_article($id){
    $query = "SELECT * FROM $this->table WHERE id =:id";
    $this->db->query($query);
    $this->db->bind("id",$id[0]);
    return $this->db->single();
  }

}
?>