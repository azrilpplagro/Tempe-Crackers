<?php
class User_model{

  private $table = "akun_mitra";
  private $db;
  
  public function __construct()
  {
    $this->db = new Database;
  }
  public function get_data_user($email){
    try {
      $query = "SELECT * FROM $this->table WHERE email = :email";
      $this->db->query($query);
      $this->db->bind('email',$email);
      return $this->db->single();
    } catch (\Throwable $th) {
      return "Error";
    }
  }
  public function get_data_admin(){
    $query = "SELECT * FROM admin";
    $this->db->query($query);
    return $this->db->single();
  }
  
  public function update_data($data){
    $query = "SELECT * FROM $this->table WHERE (username = :username  || no_telepon = :no_telepon) && email != :email ";
    $this->db->query($query);
    $this->db->bind('email',$data['email']);
    $this->db->bind('username',$data['username']);
    $this->db->bind('no_telepon',$data['no_telepon']);

    if ($this->db->single() == false ){
      try{
        $query = "UPDATE $this->table SET alamat = :alamat, username = :username ,no_telepon = :no_telepon, tanggal_lahir = :tanggal_lahir,jenis_kelamin_id = :jenis_kelamin,nama_lengkap= :nama_lengkap WHERE email= :email";
        $this->db->query($query);
        $this->db->bind('email',$data['email']);
        $this->db->bind('nama_lengkap',$data['nama_lengkap']);
        $this->db->bind('username',$data['username']);
        $this->db->bind('no_telepon',$data['no_telepon']);
        $this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
        $this->db->bind('tanggal_lahir',$data['tanggal_lahir']);
        $this->db->bind('alamat',$data['alamat']);
        
        $this->db->execute();
        return true;
      }
      catch (\Throwable $th) {
        return false;
      }
    }
    else{
      return $this->db->single();
    }
  }

  public function update_tempat($email,$data){
    $query = "UPDATE $this->table SET negara_id = :negara, provinsi_id = :provinsi, kabupaten_id = :kabupaten, kecamatan_id = :kecamatan, desa_id = :desa WHERE email = :email";
    $this->db->query($query);
    $this->db->bind('email',$email);
    $this->db->bind('negara',$data['negara']);
    $this->db->bind('provinsi',$data['provinsi']);
    $this->db->bind('kabupaten',$data['kabupaten']);
    $this->db->bind('kecamatan',$data['kecamatan']);
    $this->db->bind('desa',$data['desa']);
    $this->db->execute();
    return true;
  }




  public function login($email, $password){
    $query = "SELECT * FROM $this->table WHERE email = :email && password = :password && status_akun_id = 1";
    $this->db->query($query);
    $this->db->bind('email',$email);
    $this->db->bind('password',$password);
    return $this->db->single();
  }
  public function register($data){
    $query = "SELECT * FROM $this->table WHERE username = :username || email = :email || no_telepon = :no_telepon  ";
    $this->db->query($query);
    $this->db->bind('username',$data['username']);
    $this->db->bind('email',$data['email']);
    $this->db->bind('no_telepon',$data['no_telepon']);
    if ($this->db->single() == false ){
      // var_dump($data);
      // die();
      $query = "INSERT INTO $this->table VALUES(:email,:no_telepon,:username,:nama_lengkap,:alamat,0,0,0,0,0,:tanggal_lahir,:jenis_kelamin,:password,1,'')";
      $this->db->query($query);
      $this->db->bind('email',$data['email']);
      $this->db->bind('username',$data['username']);
      $this->db->bind('password',$data['password']);
      $this->db->bind('no_telepon',$data['no_telepon']);
      $this->db->bind('nama_lengkap',$data['nama_lengkap']);
      $this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
      $this->db->bind('alamat',$data['alamat']);
      $this->db->bind('tanggal_lahir',$data['tanggal_lahir']);
      $this->db->execute();
      return true;
    }
    else{
      return $this->db->single();
    }
  }


  public function get_spesifik_alamat($id_desa,$id_kecamatan,$id_kabupaten,$id_provinsi,$id_negara){
    // Desa
    $output = "";
    $query = "SELECT * FROM desa WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id',$id_desa);

    if(!is_bool($this->db->single())){
      $output .= ",".$this->db->single()['nama_desa'];
    }
    else{
      $output .= "";
    }
    $query = "SELECT * FROM kecamatan WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id',$id_kecamatan);
    if(!is_bool($this->db->single())){
      $output .= ",".$this->db->single()['nama_kecamatan'];
    }
    else{
      $output .= "";
    }
    $query = "SELECT * FROM kabupaten WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id',$id_kabupaten);
    if(!is_bool($this->db->single())){
      $output .= ",".$this->db->single()['nama_kabupaten'];
    }
    else{
      $output .= "";
    }
    $query = "SELECT * FROM provinsi WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id',$id_provinsi);
    if(!is_bool($this->db->single())){
      $output .= ",".$this->db->single()['nama_provinsi'];
    }
    else{
      $output .= "";
    }
    $query = "SELECT * FROM negara WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id',$id_negara);
    if(!is_bool($this->db->single())){
      $output .= ",".$this->db->single()['nama_negara'];
    }
    else{
      $output .= "";
    }
    $output = substr_replace($output, '', 0, 1);
    return $output;
  }


  public function get_data_desa(){
    $query = "SELECT * FROM desa";
    $this->db->query($query);
    return $this->db->result_set();
  }
  public function get_data_kecamatan(){
    $query = "SELECT * FROM kecamatan";
    $this->db->query($query);
    return $this->db->result_set();
  }
  public function get_data_kabupaten(){
    $query = "SELECT * FROM kabupaten";
    $this->db->query($query);
    return $this->db->result_set();
  }
  public function get_data_provinsi(){
    $query = "SELECT * FROM provinsi";
    $this->db->query($query);
    return $this->db->result_set();
  }
  public function get_data_negara(){
    $query = "SELECT * FROM negara";
    $this->db->query($query);
    return $this->db->result_set();
  }


  public function get_provinsi_by_negara($id_negara){
    $query = "SELECT * FROM provinsi WHERE id_negara = :id_negara";
    
    $this->db->query($query);
    $this->db->bind("id_negara",$id_negara);
    return $this->db->result_set();
  }
  public function get_kabupaten_by_provinsi($id_provinsi){
    $query = "SELECT * FROM kabupaten WHERE id_provinsi = :id_provinsi";
    
    $this->db->query($query);
    $this->db->bind("id_provinsi",$id_provinsi);
    return $this->db->result_set();
  }

  public function get_kecamatan_by_kabupaten($id_kabupaten){
    $query = "SELECT * FROM kecamatan WHERE id_kabupaten = :id_kabupaten";
    
    $this->db->query($query);
    $this->db->bind("id_kabupaten",$id_kabupaten);
    return $this->db->result_set();
  }

  public function get_desa_by_kecamatan($id_kecamatan){
    $query = "SELECT * FROM desa WHERE id_kecamatan = :id_kecamatan";
    
    $this->db->query($query);
    $this->db->bind("id_kecamatan",$id_kecamatan);
    return $this->db->result_set();
  }


  public function upload_gambar($name,$email){
    $query = "UPDATE $this->table SET profil = :profil WHERE email = :email";
    $this->db->query($query);
    $this->db->bind('profil',$name);
    $this->db->bind('email',$email);
    $this->db->execute();

  }
}

?>