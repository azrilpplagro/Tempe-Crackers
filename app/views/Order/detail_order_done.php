<?php

$data_user = $this->model("User_model")->get_data_user($data['detail_order']['mitra_email']);
$detail_product = $this->model("Product_model")->get_spesific_product($data['detail_order']['produk_id']);
$data_admin = $this->model("User_model")->get_data_admin();
?>

<?php $this->view("Navbar",[]); ?>
<div class="main">
  <h2>Delivery Status</h2>
  <h6>Orders have been shipped on <?= $data['detail_order']['tanggal_pengiriman'] ?> </h6>
  <h6>POS - <?= $data['detail_order']['no_resi'] ?></h6>
  <hr>
  <span style="display: flex;margin:0;padding:0;align-items:flex-end">
    <img src="http://localhost/Tempe-Crackers/public/icon/location.png" style="width: 30px;" alt="">
    <h6>Address</h6>
  </span>
  <h4><?= $data_user['nama_lengkap'] ?></h4>
  <h6>
    <?= $data_user['alamat'] ?>, <?= 
      $this->model("User_model")->get_spesifik_alamat(
        $data_user['desa_id'], $data_user['kecamatan_id'], $data_user['kabupaten_id'], $data_user['provinsi_id'], $data_user['negara_id']); 
    ?>
  </h6>
  <h6>No Hp : <?= $data_user['no_telepon'] ?></h6>
  <hr>
  
  <div style="display: flex;flex-wrap:wrap">
    <div class="img" style=";margin-right:30px;width:300px;height:300px;background-image: url(<?= BASE_URL ?>/img/products/<?= $detail_product['gambar'] ?>);background-position: center;background-size:cover"></div>
    <div>
      <h2><?= $detail_product['nama_produk'] ?></h2><br><br>
      <table>
        <tr>
          <td>Weight</td>
          <td> : <?= $detail_product['berat'] ?> Kg</td>
        </tr>
        <tr>
          <td>Amount</td>
          <td> : <?= $data['detail_order']['jumlah_pesanan'] ?></td>
        </tr>
        <tr>
          <td>Expired</td>
          <td> : <?= $detail_product['expired'] ?></td>
        </tr>
        <tr>
          <td>Payment Method</td>
          <td> : <?= $data['detail_order']['metode_pembayaran'] ?></td>
        </tr>
        <tr>
          <td>Shipping Method</td>
          <td> : <?= $data['detail_order']['jenis_pengiriman'] ?></td>
        </tr>
      </table>
    </div>
  </div>
  <br><br>
  <h5>Description : </h5>
  <p><?= $detail_product['deskripsi'] ?></p>

  <span>
    <h5>Total Payment : </h5>
    <h5 style="color: red;">IDR <?= $data['detail_order']['total_pembayaran'] ?>,00</h5>
  </span>
  <br><hr>
  <?php if($data['detail_order']['status_diterima'] == "Dibatalkan"){ ?>
    <h5>Cancellation Detail</h5>
    <p style="color: red;">Cancellation details canceled automatically by the system for not making a payment within 1 x 24 hours</p>
    <hr>
  <?php }
   ?>

  <table class="table">
    <tr>
      <td>Order Time</td>
      <td style="text-align: right;"><?= $data['detail_order']['tanggal_pesan'] ?></td>
    </tr>
    <tr>
      <td>Payment Time</td>
      <td style="text-align: right;"><?= $data['detail_order']['tanggal_pembayaran'] ?></td>
    </tr>
    <tr>
      <td>Delivery Time</td>
      <td style="text-align: right;"><?= $data['detail_order']['tanggal_pengiriman'] ?></td>
    </tr><tr>
      <td>Order Confirmation Time</td>
      <td style="text-align: right;"><?= $data['detail_order']['tanggal_terima'] ?></td>
    </tr>
  </table>
  <br><br>


  <hr>
  <h2>Contact Information</h2>
  <table>
    <tr>
      <td style="padding-right: 20px;"><img src="http://localhost/Tempe-Crackers/public/icon/telephone.png" style="width: 30px;" alt=""></td>
      <td><?= $data_admin['no_telepon'] ?></td>
    </tr>
    <tr>
      <td style="padding-right: 20px;"><img src="http://localhost/Tempe-Crackers/public/icon/location.png" style="width: 30px;" alt=""></td>
      <td><?= $data_admin['alamat'] ?>, <?= 
          $this->model("User_model")->get_spesifik_alamat(
            $data_admin['desa_id'],$data_admin['kecamatan_id'], $data_admin['kabupaten_id'],$data_admin['provinsi_id'],$data_admin['negara_id']); 
        ?></td>
    </tr>
  </table>
  
</div>