<?php 
$photo = $this->model("User_model")->get_data_user($_SESSION['login']['email'])['profil'];
?>

<section class="mb-3">
  <nav class="navbar fixed-top navbar-light">
    <div class="container-fluid">
      <a href="<?= BASE_URL ?>/About" style=";text-decoration:none;color:black;cursor:pointer;display:flex;justify-content:center;align-items: center;">
        <div style="display:flex;flex-direction:column;justify-content:space-between;margin-right:10px">
          <h6 style="margin-top: auto;margin-bottom: auto"><?= $this->model("User_model")->get_data_user($_SESSION['login']['email'])['nama_lengkap'] ?></h6>
          <p style="margin-top: auto;margin-bottom: auto">mitra</p>
        </div>
        <img style="width: 40px;" src="<?= BASE_URL ?>/icon/akun.png" alt="">
      </a>
      <div style="display: flex; justify-content:center">
        <div class="navbar-toggler first-button"  data-mdb-toggle="collapse"
          data-mdb-target="#navbarToggleExternalContent9"
          aria-controls="navbarToggleExternalContent9" aria-expanded="false"
          aria-label="Toggle navigation">
          <div class="animated-icon1"><span></span><span></span><span></span></div>
        </div>
        <form action="" method="POST">
          <button type="submit" name="tombol_logout" class="btn"><img src="<?= BASE_URL ?>/icon/logout.png" style="width: 30px;margin-left:20px" alt=""></button>
        </form>
      </div>
    </div>
  </nav>
</section>

<div class="side-bar">
  <div class="logo">
    <img src="<?= BASE_URL ?>/icon/logo.png" alt="">
  </div>
  
  <a href="<?= BASE_URL ?>/Article" <?php if($_SESSION['controller_name'] == "Article" ) echo 'style="background-color: rgba(128, 128, 128, 0.315);' ?>">
    <img src="<?= BASE_URL ?>/icon/Dashboard.png" alt="">
    <h4>Dashboard</h4>
  </a>
  <a href="<?= BASE_URL ?>/Order" <?php if($_SESSION['controller_name'] == "Order" &&  !isset($_SESSION['params'][1])) echo 'style="background-color: rgba(128, 128, 128, 0.315);' ?>">
    <img src="<?= BASE_URL ?>/icon/keranjang.png" alt="">
    <h4>My Order</h4>
  </a>
  <a href="<?= BASE_URL ?>/History" <?php if($_SESSION['controller_name'] == "History" || ( $_SESSION['controller_name'] == "Order" &&  isset($_SESSION['params'][1])  ) ) echo 'style="background-color: rgba(128, 128, 128, 0.315);' ?>">
    <img src="<?= BASE_URL ?>/icon/history.png" alt="">
    <h4>Order History</h4>
  </a>
  <br>
  
</div>

<div id="nav">
  <h6></h6>
  <div style="display: flex;justify-content:center;align-items: flex-end;">
    <a href="<?= BASE_URL ?>/About" style="text-decoration:none;color:black;cursor:pointer;display:flex;justify-content:center;align-items: center;">
      <div style="display:flex;flex-direction:column;justify-content:space-between;margin-right:10px">
        <h6 style="margin-top: auto;margin-bottom: auto"><?= $this->model("User_model")->get_data_user($_SESSION['login']['email'])['nama_lengkap'] ?></h6>
        <p style="margin-top: auto;margin-bottom: auto">mitra</p>
      </div>
      <?php
      if($photo == ""){ ?>
        <img style="border-radius: 50%;width:40px;height:40px;object-fit: cover;" src="<?= BASE_URL ?>/icon/akun.png" alt="">
      <?php  
      }else{ ?>
        <img style="border-radius: 50%;width:40px;height:40px;object-fit: cover;" src="<?= BASE_URL ?>/img/<?= $photo ?>?<?php echo time(); ?>" alt="">
      <?php
      }
      ?>
    </a>
    <!-- <img style="cursor:pointer" src="<?= BASE_URL ?>/icon/dropdown.png" alt=""> -->
    

    <form action="" method="POST">
      <button type="submit" name="tombol_logout" class="btn"><img src="<?= BASE_URL ?>/icon/logout.png" style="width: 30px;margin-left:20px;padding-left:0px" alt=""></button>
    </form>
    
  </div>
  
</div id="nav">