

<div class="modal-background" style="background-color: rgba(128, 128, 128, 0.344);width:100%;height:120vh;position:fixed;z-index:300;backdrop-filter: blur(5px);">
  <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content"">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $data['title'] ?></h5>
          <a href="" class="btn-close"aria-label="Close"></a>
        </div>
        <div class="modal-body" style="border-radius: 30px;">
          <form action="" method="POST" enctype="multipart/form-data">
              <input  type="file" name="img_upload" style="font-size: 16px;">
              <br><br>
              <center><button style="font-size: 14px;" type="submit" name="upload" class="btn btn-success container">Upload</button></center>
              
          </form>
        </div>
      </div>
    </div>
  </div>
</div>