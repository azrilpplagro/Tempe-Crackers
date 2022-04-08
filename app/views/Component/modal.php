
<div class="modal-background" style="background-color: rgba(128, 128, 128, 0.344);width:100%;height:120vh;position:fixed;z-index:300;backdrop-filter: blur(5px);">
  <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"><?= $data['title'] ?></h5>
          <button onclick="hideModal()" class="btn-close"aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= $data['message'] ?>
        </div>
      </div>
    </div>
  </div>
</div>