<?php
class Database{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $password = DB_PASSWORD;
  private $name = DB_NAME;

  private $db_handler;
  private $query_statement;

  public function __construct()
  {
    $db_source_name = "mysql:host=".$this->host.";dbname=".$this->name;
    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
      $this->db_handler = new PDO($db_source_name,$this->user,$this->password,$option);
    } catch (PDOException $e) {
      die($e->getMessage());
    } 
  }



  public function query($query){
    $this->query_statement = $this->db_handler->prepare($query);
  }
  public function bind($param,$value,$type=null){
    if(is_null($type)){
      switch(true){
        case is_int($value) :$type = PDO::PARAM_INT; break;
        case is_bool($value) : $type = PDO::PARAM_BOOL;break;
        case is_null($value) : $type = PDO::PARAM_NULL;break;
        default : $type = PDO::PARAM_STR;
      }
    }
    
    $this->query_statement->bindValue($param,$value,$type);
  }
  public function execute(){
    $this->query_statement->execute();
  }
  public function result_set(){
    $this->execute();
    return $this->query_statement->fetchAll(PDO::FETCH_ASSOC);
  }
  public function single(){
    $this->execute();
    return $this->query_statement->fetch(PDO::FETCH_ASSOC);
  }
}

?>