<?php
$months = [
  ['All','all'],
  ['January','01'],
  ['February','02'],
  ['March','03'],
  ['April','04'],
  ['May','05'],
  ['June','06'],
  ['July','07'],
  ['August','08'],
  ['September','09'],
  ['October',10],
  ['November',11],
  ['Desember',12]
]
?>
<link rel="stylesheet" href="<?= BASE_URL ?>/style/css/Order.css">
<style>
  .list-order{
    cursor: pointer;
    text-decoration: none;
    color: black;
    flex-wrap: wrap;
    /* height: auto; */
  }
  .list-order:hover{
    color: black;
  }
</style>

<?php $this->view("Navbar",[]); ?>
<div class="main">
  <h2>Order History</h2>
  <form action="" method="POST" style="display: flex;">
    <select class="form-select" name="month" aria-label="Default select example" style="width: 300px;background-color: #8A6345;">
      <?php
      if(isset($_POST['month'])){
        foreach ($months as $month) {  ?>
          ?>
            <?php
              if($month[1] == $_POST['month']){ ?>
                <option value="<?= $month[1] ?>" selected><?= $month[0] ?></option>
              <?php
              }
              else{ ?>
                <option value="<?= $month[1] ?>" ><?= $month[0] ?></option>
              <?php
              }
            ?>
            
          <?php }
        }
      else{ 
        foreach ($months as $month) {  ?>
          <option value="<?= $month[1] ?>"><?= $month[0] ?></option>
          <?php 
      } } ?>
     
    </select>
    <button class="btn btn-outline-dark" type="submit" name="month_filter">Ok</button>
  </form>
  <br>

  <?php
  foreach ($data['list_order'] as $order) { 
    $detail_product = $this->model("Product_model")->get_spesific_product($order['produk_id']);
    ?>
       <a href="<?= BASE_URL ?>/Order/detail_order_done/<?= $order['id'] ?>/history=true" class="list-order">
          <div style="width: 100%;">
            <h5><?= $order['tanggal_terima']  ?></h5>
          </div>
          <div class="img" style="background-image: url(<?=  BASE_URL?>/img/products/<?= $detail_product['gambar'] ?>);">
          </div>
          <div style="margin:20px;display:flex;flex-direction:column;justify-content:space-between">
            <div>
              <h5><?= $detail_product['nama_produk'] ?> | <?= $detail_product['berat'] ?>kg | <?= $order['metode_pembayaran'] ?> | <?= $order['jenis_pengiriman'] ?> </h5>
              <h6>x <?= $order['jumlah_pesanan'] ?> </h6>
              <h6>Total Pembayaran : IDR <?= $order['total_pembayaran'] ?></h6>
            </div>
            
          </div>
        </a>
      <?php
      }
  ?>
</div>