<link rel="stylesheet" href="<?= BASE_URL ?>/style/css/Login.css">
<style>
  .card-container{
    width: 70%;
  }
  @media screen and (max-width:576px) {
    .card-container{
      width: 100%;
    }
  }
</style>
<nav><img src="<?= BASE_URL ?>/icon/logo.png" alt="" style="width: 80px;margin:10px"></nav>

  
</body>
<div class="card-container">
  <center><img style="width: 300px;" src="<?= BASE_URL ?>/icon/WELCOME.png" alt=""></center>
  <br><br>
  <form action="" method="POST">
    <table class="table">
      <tr>
        <td>
          <span style="display: flex;align-items: flex-end;">
            <img style="width: 30px;" src="<?= BASE_URL ?>/icon/akun.png" alt="">
            <h5>Nama Lengkap</h5>
          </span>
          <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" class="form-control">
        </td>
        <td>
            <span style="display: flex;align-items: flex-end;">
              <img style="width: 30px;" src="<?= BASE_URL ?>/icon/date-picker.png" alt="">
              <h5>Tanggal Lahir</h5>
            </span>
          <input type="date" name="tanggal_lahir" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <span style="display: flex;align-items: flex-end;">
            <img style="width: 30px;" src="<?= BASE_URL ?>/icon/gender.png" alt="">
            <h5>Jenis Kelamin</h5>
          </span>
        </td>
      </tr>
      <tr>
          <td>
            <span style="display: flex;">
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="jenis_kelamin" value="1" checked>Laki-laki
                <label class="form-check-label" for="radio1"></label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="jenis_kelamin" value="2">Perempuan
                <label class="form-check-label" for="radio2"></label>
              </div>
            </span>
            
          </td>
      </tr>
    </table>
  
    <tr>
      <td>
        <span style="display: flex;align-items: flex-end;">
          <img style="width: 30px;" src="<?= BASE_URL ?>/icon/home.png" alt="">
          <h5>Alamat</h5>
        </span>
        <input type="text" placeholder="Alamat" name="alamat" class="form-control">
      </td>
      <td></td>
    </tr>
  
    <table class="table">
        <tr>
          <td>
            <label label label for="jenis_kelamin"><h5>Desa</h5></label>
            <span style="display: flex;">
              <select class="form-select" id="desa" name="desa" aria-label="Default select example">
                <?php
                  $data_desa = $this->model("User_model")->get_data_desa();
                  foreach ($data_desa as $desa) { ?>
                    <option value="<?= $desa['id'] ?>"><?= $desa['nama_desa'] ?></option>
                  <?php
                  }
                ?>
              </select>
            </span>
          </td>
          <td>
            <label for="jenis_kelamin"><h5>Kecamatan</h5></label>
            <span style="display: flex;">
              <select class="form-select" id="kecamatan" name="kecamatan" aria-label="Default select example">
                <?php
                  $kecamatan = $this->model("User_model")->get_data_kecamatan();
                  foreach ($kecamatan as $kecamatan) { ?>
                    <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
                  <?php
                  }
                ?>
              </select>
            </span>
          </td>
        </tr>
        
        <tr>
          <td>
              <label for="jenis_kelamin"><h5>Kabupaten</h5></label>
              <span style="display: flex;">
                <select class="form-select" id="kabupaten" name="kabupaten" aria-label="Default select example">
                  <?php
                    $data_kabupaten = $this->model("User_model")->get_data_kabupaten();
                    foreach ($data_kabupaten as $kabupaten) { ?>
                      <option value="<?= $kabupaten['id'] ?>"><?= $kabupaten['nama_kabupaten'] ?></option>
                    <?php
                    }
                  ?>
                </select>
              </span>
          </td>
          <td>
              <label for="jenis_kelamin"><h5>Provinsi</h5></label>
              <span style="display: flex;">
                <select class="form-select" id="provinsi" name="provinsi" aria-label="Default select example">
                  <?php
                    $data_provinsi = $this->model("User_model")->get_data_provinsi();
                    foreach ($data_provinsi as $provinsi) { ?>
                      <option value="<?= $provinsi['id'] ?>"><?= $provinsi['nama_provinsi'] ?></option>
                    <?php
                    }
                  ?>
                </select>
              </span>
          </td>
        </tr>

        <tr>
          <td>
              <label for="jenis_kelamin"><h5>Negara</h5></label>
              <span style="display: flex;">
                <select class="form-select" id="negara" name="negara" aria-label="Default select example">
                  <?php
                    $data_negara = $this->model("User_model")->get_data_negara();
                    foreach ($data_negara as $negara) { ?>
                      <option value="<?= $negara['id'] ?>"><?= $negara['nama_negara'] ?></option>
                    <?php
                    }
                  ?>
                </select>
              </span>
          </td>
          <td></td>
        </tr>
    </table>

    <div style="width: 100%;">
      <span style="display: flex;align-items: flex-end;">
        <img style="width: 20px;" src="<?= BASE_URL ?>/icon/phone.png" alt="">
        <h5>No Telepon</h5>
      </span>
      <input type="text" placeholder="no telepon" name="no_telepon" class="form-control">

  
      <span style="display: flex;align-items: flex-end;">
        <img style="width: 20px;" src="<?= BASE_URL ?>/icon/email.png" alt="">
        <h5>Email</h5>
      </span>
      <input type="email" placeholder="email" name="email" class="form-control">


      <span style="display: flex;align-items: flex-end;">
        <img style="width: 20px;" src="<?= BASE_URL ?>/icon/username.png" alt="">
        <h5>Username</h5>
      </span>
      <input type="text" placeholder="username" name="username" class="form-control">

      <span style="display: flex;align-items: flex-end;">
        <img style="width: 20px;" src="<?= BASE_URL ?>/icon/password.png" alt="">
        <h5>password</h5>
      </span>
      <input type="password" placeholder="password" name="password" class="form-control">

    </div>
    <br><br>
    <center>
      <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" value="register" name="register" style="width: 50%;" class="btn btn-dark">Register</button>
      <br><br>
      <a href="<?= BASE_URL ?>/Login" style="width: 50%;" class="btn btn-outline-dark">Login</a>
    </center>
    
  </form>
</div>
<br><br><br>