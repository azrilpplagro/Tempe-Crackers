<style>
  .list-order{
    cursor: pointer;
    text-decoration: none;
    color: black;
  }
  .list-order:hover{
    box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
    color: black;
  }
</style>

<?php $this->view("Navbar",[]); ?>
<div class="main">
  <div class="navbar-order">
    <a href="<?= BASE_URL ?>/Order/havent_paid" >
      <h6>haven’t paid yet</h6>
    </a>
    <a href="<?= BASE_URL ?>/Order/packed" >
      <h6>packed</h6>
    </a>
    <a href="<?= BASE_URL ?>/Order/sent" style="border-bottom: 3px solid white;" >
      <h6>sent</h6>
    </a>
    <a href="<?= BASE_URL ?>/Order/done">
      <h6>done</h6>
    </a>
    <a href="<?= BASE_URL ?>/Order/canceled">
      <h6>canceled</h6>
    </a>
  </div>

  <?php
  foreach ($data['list_order'] as $order) { 
    $detail_product = $this->model("Product_model")->get_spesific_product($order['produk_id']);
    ?>
       <a href="<?= BASE_URL ?>/Order/detail_shipping/<?= $order['id'] ?>" class="list-order">
          <div class="img" style="background-image: url(http://localhost/Tempe-Crackers/public/img/products/<?= $detail_product['gambar'] ?>);">
          </div>
          <div style="margin:20px;display:flex;flex-direction:column;justify-content:space-between">
            <div>
              <h5><?= $detail_product['nama_produk'] ?> | <?= $detail_product['berat'] ?>kg | <?= $order['metode_pembayaran'] ?> | <?= $order['jenis_pengiriman'] ?> </h5>
              <h6>x <?= $order['jumlah_pesanan'] ?> </h6>
              <h6>Total Pembayaran : Rp.<?= $order['total_pembayaran'] ?></h6>
            </div>
            
          </div>
        </a>
      <?php
      }
  ?>
</div>