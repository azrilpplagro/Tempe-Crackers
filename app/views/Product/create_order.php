<?php
$data_product = $data['detail_product'];
?>
<style>
  .product-img{
    background-image: url("<?= BASE_URL ?>/img/products/<?= $data_product['gambar'] ?>");
    background-position: center;
    background-size: cover;
    width: 200px;
    height: 200px;
    margin-right: 30px;
  }
  .product-info{
    width: 500px;
  }
  span{
    display: flex;
    flex-wrap: wrap;
  }
</style>

<?php $this->view("Navbar",[]); ?>

<form action="" method="POST">

<div class="main">
  <h2>Buy Now</h2><br>
  <span style="display: flex;margin:0;padding:0;align-items:flex-end">
    <img src="<?= BASE_URL ?>/icon/location.png" style="width: 30px;" alt="">
    <h6>Address</h6>
  </span>
  <h4>
    <?= 
    $this->model("User_model")->get_data_user($_SESSION['login']['email'])['nama_lengkap']
    ?>
  </h4>
  <h6>
    <?= $data['user_data']['alamat'] ?>, <?= 
      $this->model("User_model")->get_spesifik_alamat(
        $data['user_data']['desa_id'], $data['user_data']['kecamatan_id'], $data['user_data']['kabupaten_id'], $data['user_data']['provinsi_id'], $data['user_data']['negara_id']); 
    ?>
  </h6>
  <br>
  <span>
    <div class="product-img"></div>
    <div class="product-info">
      <input type="hidden" name="product_id" value="<?= $data_product['id'] ?>">
      <input type="text" class="form-control" value="<?= $data_product['nama_produk'] ?>" disabled>
      <input type="text" class="form-control" value="Rp.<?= $data_product['harga'] ?> /  <?= $data_product['berat'] ?> Kg" disabled>
      <br>
      <div style="display: flex;">
        <p style="width: 200px;">Order Count : </p>
        <input type="number" min="1" max="" class="form-control" name="order_count" oninput="null_title_value('order_count')" required>

      </div>
      <br>

      <span>
        <h6>Payment Method</h6>
        <div style="margin-left: 30px;">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" value="transfer" id="payment_method1" checked>
            <label class="form-check-label" for="payment_method1">
              Transfer
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" value="cod" id="payment_method1">
            <label class="form-check-label" for="payment_method1">
              COD
            </label>
          </div>
        </div>
      </span>
      <br>


      <span>
        <h6>Shipping Method</h6>
        <div style="margin-left: 30px;">
          <div class="form-check">
              <input class="form-check-input" type="radio" name="shipping_method" value="expedition" id="payment_method1" checked>
              <label class="form-check-label" for="payment_method1">
                Expedition
              </label>
            </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="shipping_method" value="pickup" id="payment_method1">
            <label class="form-check-label" for="payment_method1">
              Pickup
            </label>
          </div>
          
        </div>
      </span>
      
      <br>
      <button type="submit" name="create_payment_button" class="btn btn-dark">Create Payment</button>
      
    </div>
  </span>
  
</div>

</form>