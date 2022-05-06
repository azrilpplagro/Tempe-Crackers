<?php
class Pesanan_model{

  private $table = "pesanan";
  private $db;
  
  public function __construct()
  {
    $this->db = new Database;
  }

  public function insert_pesanan($data){
    if($data['metode_pembayaran'] == 'transfer'){
      $status_pengiriman = "";
    }
    else if($data['metode_pembayaran'] == 'cod'){
      $status_pengiriman = "Sedang Dikemas";
    }
    $query = "INSERT into $this->table VALUES(0,:mitra_email,:produk_id,:jumlah_pesanan,:metode_pembayaran,'','Belum Lunas',:tanggal_pesan,:batas_pembayaran,Null,:jenis_pengiriman,Null,Null,'$status_pengiriman',Null,'Belum Diterima',:total_pembayaran)";
    $this->db->query($query);
    $this->db->bind('mitra_email',$data['mitra_email']);
    $this->db->bind('produk_id',$data['produk_id']);
    $this->db->bind('jumlah_pesanan',$data['jumlah_pesanan']);
    $this->db->bind('metode_pembayaran',$data['metode_pembayaran']);
    $this->db->bind('tanggal_pesan',$data['tanggal_pesan']);
    $this->db->bind('batas_pembayaran',$data['batas_pembayaran']);
    $this->db->bind('jenis_pengiriman',$data['jenis_pengiriman']);
    $this->db->bind('total_pembayaran',$data['total_pembayaran']);
    $this->db->execute();

    $query = "UPDATE produk set stok = stok-:jumlah_pesanan WHERE id = :produk_id";
    $this->db->query($query);
    $this->db->bind('produk_id',$data['produk_id']);
    $this->db->bind('jumlah_pesanan',$data['jumlah_pesanan']);
    $this->db->execute();

  }

  public function get_pesanan_by_email($email){
    $this->db->query(
      "SELECT * FROM $this->table WHERE mitra_email = :email ORDER BY id DESC"
    );
    $this->db->bind("email",$email);
    return $this->db->result_set();
  }

  public function get_pesanan_belum_lunas($email){
    $this->db->query(
      "SELECT * FROM $this->table WHERE mitra_email = :email AND status_pembayaran = 'Belum Lunas' AND batas_pembayaran >= CURRENT_DATE() AND status_pengiriman != 'Sedang Dikemas' AND status_pengiriman != 'Proses Pengiriman' AND status_diterima != 'diterima' ORDER BY id DESC"
    );
    $this->db->bind("email",$email);
    return $this->db->result_set();
  }
  public function get_pesanan_sedang_dikemas($email){
    $this->db->query(
      "SELECT * FROM $this->table WHERE mitra_email = :email AND status_pengiriman = 'Sedang Dikemas' ORDER BY id DESC"
    );
    $this->db->bind("email",$email);
    return $this->db->result_set();
  }
  public function get_pesanan_dibatalkan($email){
    $this->db->query(
      "SELECT * FROM $this->table WHERE mitra_email = :email AND status_pembayaran = 'Dibatalkan' AND status_pengiriman = 'Dibatalkan' AND status_diterima = 'Dibatalkan' ORDER BY id DESC"
    );
    $this->db->bind("email",$email);
    return $this->db->result_set();
  }



  public function get_detail_pemesanan($data){
    $this->db->query(
      "SELECT * FROM $this->table WHERE mitra_email = :email AND id = :id"
    );
    $this->db->bind("email",$data['email']);
    $this->db->bind("id",$data['id']);
    return $this->db->single();
  }
  public function get_pesanan_dikirim(){
    $this->db->query(
      "SELECT * FROM $this->table WHERE status_pengiriman = 'Proses Pengiriman' AND mitra_email = :email ORDER BY id DESC"
    );
    $this->db->bind('email',$_SESSION['login']['email']);
    return $this->db->result_set();
  }
  public function get_detail_pengiriman($data){
    $this->db->query(
      "SELECT * FROM $this->table WHERE status_pengiriman = 'Proses Pengiriman' AND id = :id AND mitra_email = :email"
    );
    $this->db->bind('email',$data['email']);
    $this->db->bind('id',$data['id']);
    return $this->db->single();
  }

  public function confirm_shipping($id){
    $tanggal_terima = date("Y-m-d");
    $this->db->query(
      "UPDATE $this->table set status_pengiriman = 'Sudah Dikirim', status_diterima = 'Diterima', tanggal_terima = :tanggal_terima WHERE id=:id AND mitra_email = :mitra_email"
    );
    $this->db->bind('id',$id);
    $this->db->bind('mitra_email',$_SESSION['login']['email']);
    $this->db->bind('tanggal_terima', $tanggal_terima);
    $this->db->execute();
  }

  public function pengiriman_selesai(){
    $this->db->query(
      "SELECT * FROM $this->table WHERE status_diterima  = 'Diterima'  AND mitra_email = :email AND tanggal_terima IS NOT NULL ORDER BY id DESC"
    );
    $this->db->bind('email',$_SESSION['login']['email']);
    return $this->db->result_set();
  }
  public function detail_pesanan_selesai($data){
    $this->db->query(
      "SELECT * FROM $this->table WHERE id = :id and mitra_email = :mitra_email"
    );
    $this->db->bind('id',$data['id']);
    $this->db->bind('mitra_email',$data['email']);
    return $this->db->single();
  }

  public function get_last_id(){
    $query = "SELECT id FROM $this->table ORDER BY id DESC LIMIT 1";
    $this->db->query($query);
    if(is_bool($this->db->single())){
      $last_id = 1;
    }
    else{
      $last_id = $this->db->single()['id'] + 1;
    }
    return $last_id;
  }

  public function upload_proof_of_payment($id,$name_of_file){
    $tanggal_pembayaran = date("Y-m-d");
    $this->db->query(
      "UPDATE $this->table set bukti_pembayaran = :bukti_pembayaran,tanggal_pembayaran = '$tanggal_pembayaran'  WHERE id = :id"
    );
    $this->db->bind('id',$id);
    $this->db->bind('bukti_pembayaran',$name_of_file);
    $this->db->execute();
  }

  public function delete_expired_payment(){
    $this->db->query(
      "DELETE FROM $this->table WHERE  batas_pembayaran < CURRENT_DATE() AND bukti_pembayaran = ''"
    );
    $this->db->execute();
  }
}