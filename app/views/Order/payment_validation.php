<?php
$detail_product = $this->model("Product_model")->get_spesific_product($data['detail_order']['produk_id']);
$data_admin = $this->model("User_model")->get_data_admin();
?>
<?php $this->view("Navbar",[]); ?>
<style>
  .img{
    margin: 0;
  }
  span{
    display: flex;
    margin: 0;
    padding: 0;
  }
  span h5{
    margin-right: 20px;
  }
  span .btn{
    width: 150px;
  }
</style>
<div class="main">
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
  <br><hr><br>

  <span>
    <h5>Total Payment : </h5>
    <h5 style="color: red;">IDR <?= $data['detail_order']['total_pembayaran'] ?>,00</h5>
  </span>

  <?php
  if($data['detail_order']['bukti_pembayaran'] != '' ){ ?>
    <br>
    <table>
      <tr>
        <td><button class="btn btn-success" style="width:250px;margin-right:20px">Payment Status : </button></td>
        <?php
          if($data['detail_order']['status_pembayaran'] == "Belum Lunas"){ ?>
            <td style="color: yellow;background-color:rgb(200, 200, 200);border-radius:15px;padding:0px 20px">Waiting for payment confirmation</td>
          <?php }else if($data['detail_order']['status_pembayaran'] == "Dibatalkan"){  ?>
            <td style="color: red;background-color:rgb(200, 200, 200);border-radius:15px;padding:0px 20px">Payment validation declined, your proof of payment is invalid</td>
          <?php
          }
          else{ ?>
            <td style="color: green;background-color:rgb(200, 200, 200);border-radius:15px;padding:0px 20px">payment confirmed</td>
          <?php }
        ?>
      </tr>
    </table>

  <?php
  }else{ ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <span>
        <h5>Proof of Payment</h5>
        <input type="file" name="bukti_pembayaran" required>
      </span>

      <br><br><br>
      <span style="justify-content: space-between;margin:0">
        <a href="<?= BASE_URL ?>/Order/payment_detail/<?= $data['detail_order']['id'] ?>" class="btn btn-danger">Cancel</a>
        <button type="submit" name="confirm" class="btn btn-success">
          Confirm
        </button>

      </span>
    </form>  
  <?php
  }
  ?>

  <br>
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