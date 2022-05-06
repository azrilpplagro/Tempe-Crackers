<?php
$detail_product = $this->model("Product_model")->get_spesific_product($data['product_id']);

?>

<div class="modal-background" style="background-color: rgba(128, 128, 128, 0.344);width:100%;height:120vh;position:absolute;z-index:300;backdrop-filter: blur(5px);">
  <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Order Verification</h5>
          <form action="" method="POST">
            <button class="btn-close"aria-label="Close"></button>
          </form>
        </div>

        <form action="" method="POST">
          <div class="modal-body">
            <table class="table">
              <tr>
                <td>Product Name</td>
                <td> : <?= $detail_product['nama_produk'] ?></td>
              </tr>
              <tr>
                <td>Total Weight</td>
                <td> : <?= $detail_product['berat'] * $data['order_count']  ?> Kg</td>
              </tr>
              <tr>
                <td>Payment Method</td>
                <td> : <?= $data['payment_method'] ?></td>
              </tr>
              <tr>
                <td>Shipping Method</td>
                <td> : <?= $data['shipping_method'] ?></td>
              </tr>
              <tr>
                <td>Item Price</td>
                <td> : Rp.<?= $detail_product['harga'] ?> / <?= $detail_product['berat'] ?> Kg</td>
              </tr>
              <tr>
                <td>Shipping Cost</td>
                <td> : Rp.<?= $data['shipping_cost'] ?></td>
              </tr>
              <tr>
                <td>Total Payment</td>
                <td> : <?= ($detail_product['harga'] * $data['order_count']) + $data['shipping_cost']  ?></td>
              </tr>
            </table>
            <input type="hidden" name="mitra_email" value="<?= $_SESSION['login']['email'] ?>">
            <input type="hidden" name="produk_id" value="<?= $data['product_id'] ?>">
            <input type="hidden" name="jumlah_pesanan" value="<?= $data['order_count'] ?>">
            <input type="hidden" name="metode_pembayaran" value="<?= $data['payment_method'] ?>">
            <input type="hidden" name="jenis_pengiriman" value="<?= $data['shipping_method'] ?>">
            <input type="hidden" name="total_pembayaran" value="<?= ($detail_product['harga'] * $data['order_count']) + $data['shipping_cost'] ?>">
          </div>
          <div  class="modal-footer" style="display: flex;">
              <button name="cancel_order" value="cancel_order" type="submit" class="btn btn-outline-dark">Back</button>
              <button name="order" value="order" type="submit" class="btn btn-dark">Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>