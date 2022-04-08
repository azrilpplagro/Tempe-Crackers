<?php $this->view("Navbar",[]); ?>



<div class="main" style="padding-left: 30px;">
  <form action="" method="POST">
    <h1>Profile</h1>
    <table class="table table-striped table-hover">
        <input type="hidden" name="email" value="<?= $data['user_data']['email'] ?>">
        <tr>
          <td>Email</td>
          <td><?= $data['user_data']['email'] ?></td>
        </tr>
        <tr>
          <td>No Telepon</td>
          <td><?= $data['user_data']['no_telepon'] ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?= $data['user_data']['username'] ?></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><?= $data['user_data']['nama_lengkap'] ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?= $data['user_data']['alamat'] ?>, <?= 
            $this->model("User_model")->get_spesifik_alamat(
              $data['user_data']['desa_id'],$data['user_data']['kecamatan_id'], $data['user_data']['kabupaten_id'],$data['user_data']['provinsi_id'],$data['user_data']['negara_id']); 
          ?></td>
        </tr>
        
        <tr>
          <td>Tanggal Lahir</td>
          <td><?= $data['user_data']['tanggal_lahir'] ?></td>
          
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td><?php 
                if($data['user_data']['jenis_kelamin_id'] == 1){echo 'Pria';}else{echo 'Wanita';}  
              ?>
          </td>
        </tr>
        <tr>
          <td>Status Akun</td>
          <td><?php if($data['user_data']['status_akun_id'] == 1){echo "Aktif";}else{echo "Tidak Aktif";}   ?></td>
        </tr>
      </table>
    <a href="<?= BASE_URL ?>/About/edit/" class="btn btn-dark" style="width: 300px;">Edit</a>
  </form>
</div>




