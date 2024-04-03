<?php
require 'backend/function.php';

// cek login, terdaftar atau tidak
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cocokkan dengan database
  $cekdatabase = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' and password = '$password'");

  // hitung jumlah data
  $hitung = mysqli_num_rows($cekdatabase);

  if ($hitung > 0) {
    $_SESSION['log'] = 'True';
    header('location:index.php');
  } else {
    header('location:login.php');
  }
}

if (!isset($_SESSION['log'])) {
} else {
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('src/head.php');
?>

<body>
  <div class="container mt-5 mx-auto p-3">
    <div class="row justify-content-center">
      <div class="col-md-10 login-page col-lg-6 col-sm-12 col-12 right bg-white shadow-lg rounded-5">
        <div class="container p-3 pb-4 col-md-12 mx-auto">
          <div class="row justify-content-center mt-2 text-center">
            <div class="col-12">
              <img src="assets/img/logo.png" width="100" alt="" />
              <div class="fw-bold fs-2 mt-3 text-success">Masuk ke <span class="">SIAKAD</span></div>
              <div class="fw-semibold text-success">Sistem Informasi Akademik (Non Resmi)</div>
              <div class="fw-semibold text-success">STMIK Syaikh Zainuddin NW Anjani</div>
            </div>
          </div>
          <form class="row justify-content-center" method="post">
            <div class="col-12 col-md-12 col-lg-12 p-2">
              <div class="mb-3 form-group ">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" />
              </div>
              <div class="mb-3 form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" />
              </div>
            </div>
            <div class="row d-flex flex-column align-items-center justify-content-center">
              <button class="btn btn-primary col-12 col-md-12 col-lg-12 fw-semibold fs-5" name="login">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>