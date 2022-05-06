

<?php $this->view("Navbar",[]); ?>

<div class="main">
  <div class="navbar-order">
    <a href="<?= BASE_URL ?>/Order/havent_paid" >
      <h6>haven’t paid yet</h6>
    </a>
    <a href="<?= BASE_URL ?>/Order/packed" style="border-bottom: 3px solid white;" >
      <h6>packed</h6>
    </a>
    <a href="<?= BASE_URL ?>/Order/sent">
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

    <div class="list-order">
      <div class="img" style="background-image: url(<?= BASE_URL ?>/img/products/<?= $detail_product['gambar'] ?>);">
      </div>
      <div style="margin:20px;display:flex;flex-direction:column;justify-content:space-between">
        <div>
          <h5><?= $detail_product['nama_produk'] ?> | <?= $detail_product['berat'] ?>kg | <?= $order['metode_pembayaran'] ?> | <?= $order['jenis_pengiriman'] ?> </h5>
          <h6>x <?= $order['jumlah_pesanan'] ?> </h6>
          <h6>Total Payment : Rp.<?= $order['total_pembayaran'] ?>,00</h6>
        </div>

        <?php 
        if($order['metode_pembayaran'] != 'cod'){ ?>
          <div style="display: flex;">
            <a href="<?= BASE_URL ?>/Order/payment_validation/<?= $order['id'] ?>" style="width: 250px;font-size:15px" class="btn btn-success">Payment Status</a>
            <?php
            if( $order['status_pembayaran'] == "Lunas" && $order['jenis_pengiriman'] == 'pickup' ) { ?>
              <form action="" method="POST">
                <button type="submit" name="tombol_confirm" value="<?= $order['id'] ?>" style="margin-left:10px;width: 250px;font-size:15px" class="btn btn-dark">Order Confirmation</button>
              </form>
            <?php } ?>
          </div>
          
        <?php
        } ?>
        </div>
        
    </div>

    
  <?php
  }
  ?>
  
</div>