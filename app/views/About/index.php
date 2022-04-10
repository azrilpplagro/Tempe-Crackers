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
          <td>Phone Number</td>
          <td><?= $data['user_data']['no_telepon'] ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?= $data['user_data']['username'] ?></td>
        </tr>
        <tr>
          <td>Full Name</td>
          <td><?= $data['user_data']['nama_lengkap'] ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?= $data['user_data']['alamat'] ?>, <?= 
            $this->model("User_model")->get_spesifik_alamat(
              $data['user_data']['desa_id'],$data['user_data']['kecamatan_id'], $data['user_data']['kabupaten_id'],$data['user_data']['provinsi_id'],$data['user_data']['negara_id']); 
          ?></td>
        </tr>
        
        <tr>
          <td>Date of Birth</td>
          <td><?= $data['user_data']['tanggal_lahir'] ?></td>
          
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php 
                if($data['user_data']['jenis_kelamin_id'] == 1){echo 'Male';}else{echo 'Female';}  
              ?>
          </td>
        </tr>
        <tr>
          <td>Account Status</td>
          <td><?php if($data['user_data']['status_akun_id'] == 1){echo "Active";}else{echo "Not Active";}   ?></td>
        </tr>
      </table>
    <a href="<?= BASE_URL ?>/About/edit/" class="btn btn-dark" style="width: 300px;">Edit</a>
  </form>
</div>




