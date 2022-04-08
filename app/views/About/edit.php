<?php $this->view("Navbar",[]); ?>


<div class="main" style="padding-left: 30px;">
  <form action="" method="POST">
    
    <table class="table" style="width: 500px;">
        <tr>
          <td><h1>Profile</h1></td>
          <td>
            <form action="" method="POST">
              <button class="btn" type="submit" name="tombol_photo">
                <img src="<?= BASE_URL ?>/icon/null_photo.png" style="width: 50px;cursor:pointer" alt="">
              </button>
            </form>
            
            
          </td>
        </tr>
        <input type="hidden" name="email" value="<?= $data['user_data']['email'] ?>">
        <tr>
          <td>Email</td>
          <td><input class="form-control" placeholder="email" value="<?= $data['user_data']['email'] ?>" disabled></td>
        </tr>
        <tr>
          <td>No Telepon</td>
          <td><input type="text" name="no_telepon" class="form-control" placeholder="no_telepon" value="<?= $data['user_data']['no_telepon'] ?>" ></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" class="form-control" placeholder="username" value="<?= $data['user_data']['username'] ?>" ></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input type="text" name="nama_lengkap" class="form-control" placeholder="nama_lengkap" value="<?= $data['user_data']['nama_lengkap'] ?>"></td>
        </tr>
        

        <!-- Alamat -->
        <tr>
          <td>Alamat</td>
          <td>
            <input class="form-control" type="text" name="alamat" value="<?= $data['user_data']['alamat'] ?>">
          </td>
        </tr>
        <tr>
          <td>Desa</td>
            <td>
            <span style="display: flex;">
              <select class="form-select" id="desa" name="desa" aria-label="Default select example">
                <?php
                  $data_desa = $this->model("User_model")->get_data_desa();
                  foreach ($data_desa as $desa) { 
                    if($desa['id'] == $data['user_data']['desa_id']){ ?>
                      <option value="<?= $desa['id'] ?>"  selected><?= $desa['nama_desa'] ?></option>
                    <?php
                    }
                    else{ ?>
                      <option value="<?= $desa['id'] ?>"><?= $desa['nama_desa'] ?></option>
                    <?php
                    }
                  }
                ?>
              </select>
            </span>
          </td>
        </tr>
        <tr>
          <td>Kecamatan</td>
            <td>
            <span style="display: flex;">
              <select class="form-select" id="kecamatan" name="kecamatan" aria-label="Default select example">
                <?php
                  $data_kecamatan = $this->model("User_model")->get_data_kecamatan();
                  foreach ($data_kecamatan as $kecamatan) { 
                    if($kecamatan['id'] == $data['user_data']['kecamatan_id']){ ?>
                      <option value="<?= $kecamatan['id'] ?>"  selected><?= $kecamatan['nama_kecamatan'] ?></option>
                    <?php
                    }
                    else{ ?>
                      <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
                    <?php
                    }
                  }
                ?>
              </select>
            </span>
          </td>
        </tr>
        <tr>
          <td>Kabupaten</td>
            <td>
            <span style="display: flex;">
              <select class="form-select" id="kabupaten" name="kabupaten" aria-label="Default select example">
                <?php
                  $kabupaten = $this->model("User_model")->get_data_kabupaten();
                  foreach ($kabupaten as $kabupaten) { 
                    if($kabupaten['id'] == $data['user_data']['kabupaten_id']){ ?>
                      <option value="<?= $kabupaten['id'] ?>"  selected><?= $kabupaten['nama_kabupaten'] ?></option>
                    <?php
                    }
                    else{ ?>
                      <option value="<?= $kabupaten['id'] ?>"><?= $kabupaten['nama_kabupaten'] ?></option>
                    <?php
                    }
                  }
                ?>
              </select>
            </span>
          </td>
        </tr>
        <tr>
          <td>Provinsi</td>
            <td>
            <span style="display: flex;">
              <select class="form-select" id="provinsi" name="provinsi" aria-label="Default select example">
                <?php
                  $provinsi = $this->model("User_model")->get_data_provinsi();
                  foreach ($provinsi as $provinsi) { 
                    if($provinsi['id'] == $data['user_data']['provinsi_id']){ ?>
                      <option value="<?= $provinsi['id'] ?>"  selected><?= $provinsi['nama_provinsi'] ?></option>
                    <?php
                    }
                    else{ ?>
                      <option value="<?= $provinsi['id'] ?>"><?= $provinsi['nama_provinsi'] ?></option>
                    <?php
                    }
                  }
                ?>
              </select>
            </span>
          </td>
        </tr>
        <tr>
          <td>Negara</td>
            <td>
            <span style="display: flex;">
              <select class="form-select" id="negara" name="negara" aria-label="Default select example">
                <?php
                  $negara = $this->model("User_model")->get_data_negara();
                  foreach ($negara as $negara) { 
                    if($negara['id'] == $data['user_data']['negara_id']){ ?>
                      <option value="<?= $negara['id'] ?>"  selected><?= $negara['nama_negara'] ?></option>
                    <?php
                    }
                    else{ ?>
                      <option value="<?= $negara['id'] ?>"><?= $negara['nama_negara'] ?></option>
                    <?php
                    }
                  }
                ?>
              </select>
            </span>
          </td>
        </tr>



        <!-- akhir alamat -->
        
        <tr>
          <td>Tanggal Lahir</td>
          <td>
          <input type="date" placeholder="tgl_lahir" value="<?= $data['user_data']['tanggal_lahir'] ?>" name="tanggal_lahir" class="form-control"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <span style="display: flex;">
      
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example">
              <?php 
                if($data['user_data']['jenis_kelamin_id'] == 1){echo '<option value="1" selected>Pria</option>
                  <option value="2">Wanita</option>';}else{echo '<option value="1">Pria</option>
                    <option value="2" selected>Wanita</option>';}  
              ?>
              
            </select>
          </span>
          </td>
        </tr>
        <tr>
          <td>Status Akun</td>
          <td><?php 
            if($data['user_data']['status_akun_id'] == 1){echo "Aktif";}else{echo "Tidak Aktif";}  
          ?>
          </td>
        </tr>
      </table>
    <button type="submit" name="edit" value="edit" class="btn btn-dark" style="width: 300px;">Simpan</button>
  </form>
</div>




