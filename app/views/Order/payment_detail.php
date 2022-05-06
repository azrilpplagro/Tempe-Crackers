<?php
date_default_timezone_set("Asia/Jakarta");
$now = new DateTime();
$future_date = new DateTime($data['detail_order']['batas_pembayaran'].'23:59:59');
$interval = $future_date->diff($now);
$time_remaining = ($interval->format("%a") * 24) + $interval->format("%h"). " hours". $interval->format(" %i minutes ") . $interval->format(" %s second ");
$data_admin = $this->model("User_model")->get_data_admin();
?>
<style>
  tr td{
    border-bottom: none;
  }
</style>

<?php $this->view("Navbar",[]); ?>

<div class="main">
  <div style="display: flex;justify-content:space-between;flex-wrap:wrap">
    <table class="table">
      <tr>
        <td>Buy Now</td>
        <td></td>
      </tr>
      <tr>
        <td>Total Payment</td>
        <td style="text-align: end;color:red">IDR <?= $data['detail_order']['total_pembayaran'] ?>,00</td>
      </tr>
      <tr>
        <td>Payment in</td>
        <td style="text-align: end;color:red"><?= $time_remaining ?></td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: end;color:grey">Due date on April, <?= $data['detail_order']['batas_pembayaran'] ?></td>
      </tr>
    </table>
  </div>
  <hr><br>

  <div>
    <h5>Account Number : </h5>
    <h1><?= $this->model("User_model")->get_data_admin()['no_rekening'] ?></h1>
    <h1><?= $this->model("User_model")->get_data_admin()['nama_lengkap'] ?></h1>
    <p>Order Time : <?= $data['detail_order']['tanggal_pesan'] ?></p>
    <h5>Note : </h5>
    <div style="width: 80%;">
      <p>
        if you don't make a payment within 1x24 hours, the system will automatically cancel the order that you have made
      </p>
    </div>
    <br><br>
    <div style="display: flex;flex-direction:column;align-items:flex-end;width: 100%">
      <a href="<?= BASE_URL ?>/Order/payment_validation/<?= $data['detail_order']['id'] ?>" class="btn btn-success">Payment Validation</a>
    </div>
  </div>

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

