<link rel="stylesheet" href="<?= BASE_URL ?>/style/css/Login.css">
<style>
  .card-container{
    width: 40%;
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
            <h5>Full Name</h5>
          </span>
          <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" class="form-control">
        </td>
        <td>
            <span style="display: flex;align-items: flex-end;">
              <img style="width: 30px;" src="<?= BASE_URL ?>/icon/date-picker.png" alt="">
              <h5>Date of birth</h5>
            </span>
          <input type="date" name="tanggal_lahir" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <span style="display: flex;align-items: flex-end;">
            <img style="width: 30px;" src="<?= BASE_URL ?>/icon/gender.png" alt="">
            <h5>Gender</h5>
          </span>
        </td>
      </tr>
      <tr>
          <td>
            <span style="display: flex;">
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="jenis_kelamin" value="1" checked>Male
                <label class="form-check-label" for="radio1"></label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="jenis_kelamin" value="2">Female
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
          <h5>Address</h5>
        </span>
        <input type="text" placeholder="Alamat" name="alamat" class="form-control">
      </td>
      <td></td>
    </tr>
  
    

    <div style="width: 100%;">
      <span style="display: flex;align-items: flex-end;">
        <img style="width: 20px;" src="<?= BASE_URL ?>/icon/phone.png" alt="">
        <h5>phone number</h5>
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