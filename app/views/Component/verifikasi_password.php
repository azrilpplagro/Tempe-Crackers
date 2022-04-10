<?php $_SESSION['form'] = $data ?>
<div class="modal-background" style="background-color: rgba(128, 128, 128, 0.344);width:100%;height:120vh;position:absolute;z-index:300;backdrop-filter: blur(5px);">
  <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Password Verification</h5>
          <form action="" method="POST">
            <button class="btn-close"aria-label="Close"></button>
          </form>
        </div>

        <form action="" method="POST">

          <div class="modal-body" style="display: flex;">
              <input class="form-control" type="password" name="password" placeholder="password" style="margin-right: 20px;">
              <button name="verifikasi_password" value="verifikasi_password" type="submit" class="btn btn-dark">Ok</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>