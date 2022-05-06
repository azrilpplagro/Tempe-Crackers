<?php
$data_user = $this->model("User_model")->get_data_user($data['detail_order']['mitra_email']);
$data_admin = $this->model("User_model")->get_data_admin();
?>

<?php $this->view("Navbar",[]); ?>
<div class="main">
  <h2>Shipping Detail</h2><br>
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
  <br>
  <h2>Delivery Status</h2>
  <h6>Orders have been shipped on <?= $data['detail_order']['tanggal_pengiriman'] ?> </h6>
  <h6>POS - <?= $data['detail_order']['no_resi'] ?></h6>

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

  <br><br><br>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $data['detail_order']['id'] ?>" >
    <button type="submit" name="tombol_confirm" style="position: fixed;bottom:20px;right:20px" class="btn btn-dark">Order Confirmation</button>
  </form>
  
</div>