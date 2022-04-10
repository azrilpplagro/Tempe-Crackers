<div class="modal-background" style="background-color: rgba(128, 128, 128, 0.344);width:100%;height:120vh;position:absolute;z-index:300;backdrop-filter: blur(5px);">
  <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Kecamatan</h5>
          <form action="" method="POST">
            <button class="btn-close"aria-label="Close"></button>
          </form>
        </div>

        <form action="" method="POST">
          <input type="hidden" name="negara" value="<?= $data['negara'] ?>">
          <input type="hidden" name="provinsi" value="<?= $data['provinsi'] ?>">
          <input type="hidden" name="kabupaten" value="<?= $data['kabupaten'] ?>">
            <br>
            <center>
            <span style="display: flex;width:70%;">
              <select class="form-select" id="negara" name="kecamatan" aria-label="Default select example">
                <?php
                  
                  foreach ($data['data_kecamatan'] as $kecamatan) {  ?>
                    <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
                    <?php
                  }
                ?>
              </select>
            </span>
            </center>

            <br>
            <center><button type="submit" name="input_kecamatan" value="input_kecamatan" class="btn btn-primary container" style="width:50%;" >Next</button></center>
        </form>


      </div>
    </div>
  </div>
</div>