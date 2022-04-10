<div class="modal-background" style="background-color: rgba(128, 128, 128, 0.344);width:100%;height:120vh;position:fixed;z-index:300;backdrop-filter: blur(5px);">
  <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content"">
        <div class="modal-body" style="border-radius: 30px;">
          <center>
          <?php 
              if($data['type'] == true){ ?>
                <img src="<?= BASE_URL?>/icon/success.png" alt="">
              <?php
              } 
              else{ ?>
                <img src="<?= BASE_URL?>/icon/warning.png" alt="">
          <?php } ?>
          <br>
          
          <?= $data['message'] ?>

          <br><br>
          <a href="<?= $data['url'] ?>" class="btn btn-dark">Back</a>
          </center>
          
        </div>
      </div>
    </div>
  </div>
</div>