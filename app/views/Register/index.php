<link rel="stylesheet" href="<?= BASE_URL ?>/style/css/Login.css">
<style>
  .card-container{
    width: 600px;
  }
  span{
    display: flex;
    align-items: flex-end;
  }
  span img{
    width: 25px;
    align-self: flex-start;
  }
  span h5{
    align-self: flex-end;
    margin: 0;
    padding: 0;
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
          <span>
            <img src="<?= BASE_URL ?>/icon/akun.png" alt="">
            <h5>Full Name</h5>
          </span>
          <input type="text" oninput="null_title_value('nama_lengkap')" placeholder="Nama Lengkap" name="nama_lengkap" class="form-control">
        </td>
        <td>
            <span>
              <img src="<?= BASE_URL ?>/icon/date-picker.png" alt="">
              <h5>Date of birth</h5>
            </span>
          <input type="date" name="tanggal_lahir" class="form-control">
        </td>
      </tr>
      <tr>
        <td>
          <span>
            <img src="<?= BASE_URL ?>/icon/gender.png" alt="">
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
        <span>
          <img src="<?= BASE_URL ?>/icon/home.png" alt="">
          <h5>Address</h5>
        </span>
        <input type="text" oninput="null_title_value('alamat')" placeholder="Alamat" name="alamat" class="form-control">
      </td>
      <td></td>
    </tr>
  
    

    <div style="width: 100%;">
      <span>
        <img src="<?= BASE_URL ?>/icon/phone.png" alt="">
        <h5>phone number</h5>
      </span>
      <input type="text" oninput="null_title_value('no_telepon')" placeholder="no telepon" name="no_telepon" class="form-control">

  
      <span>
        <img src="<?= BASE_URL ?>/icon/email.png" alt="">
        <h5>Email</h5>
      </span>
      <input type="email" oninput="null_title_value('email')" placeholder="email" name="email" class="form-control">


      <span>
        <img src="<?= BASE_URL ?>/icon/username.png" alt="">
        <h5>Username</h5>
      </span>
      <input type="text" oninput="null_title_value('username')" placeholder="username" name="username" class="form-control">

      <span>
        <img src="<?= BASE_URL ?>/icon/password.png" alt="">
        <h5>password</h5>
      </span>
      <input type="password" oninput="null_title_value('password')" placeholder="password" name="password" class="form-control">

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