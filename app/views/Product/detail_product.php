<?php
$data_product = $data['detail_product'];
?>
<style>
  .product-img{
    background-image: url("<?= BASE_URL ?>/img/products/<?= $data_product['gambar'] ?>");
    background-position: center;
    background-size: cover;
    width: 30vmax;
    height: 30vmax;
  }
</style>
<?php $this->view("Navbar",[]); ?>

<div class="main">
  <a href="../../">
    <img src="<?= BASE_URL ?>/icon/remove.png" style="width: 30px;position:fixed;right:20px" alt="">
  </a>  

  <center><h2><?= $data_product['nama_produk'] ?></h2></center><br>
  <center>
    <div class="product-img"></div>
  </center>
  <br><br>

  <h4>Description : </h4>
  <p><?= $data_product['deskripsi'] ?></p>
  <br>
  <table class="table" style="width:auto">
    <tr>
      <td><h4>Weight</h4></td>
      <td>: <?= $data_product['berat'] ?> Kg</td>
    </tr>
    <tr>
      <td><h4>Stock</h4></td>
      <td>: <?= $data_product['stok'] ?> </td>
    </tr>
    <tr>
      <td><h4>Expired</h4></td>
      <td>: <?= $data_product['expired'] ?></td>
    </tr>
    <tr>
      <td><h4>Price</h4></td>
      <td>: Rp.<?= $data_product['harga'] ?> /  <?= $data_product['berat'] ?> Kg</td>
    </tr>
  </table>
  <center>
    <a href="<?= BASE_URL ?>/Product/create_order/<?= $data_product['id'] ?>" class="btn btn-success">Buy Now</a>
  </center>
  <br><br>
  
</div>