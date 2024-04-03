<?php
require 'backend/function.php';
require 'backend/cek-login.php';


?>

<!DOCTYPE html>
<html lang="en">
<?php
include('src/head.php');
?>
<style>
  body {
    position: relative;
  }

  .hero {
    height: 100vh;
  }

  .heros {
    background-image: url(assets/img/rf.png);
  }

  .link {
    color: #0A660C;
  }
</style>

<body style="background-color:#E1F7E8; font-family:Poppins;">
  <?php
  include('src/navbar.php');
  ?>

  <div class="heros">
    <div class="container-fluid">
      <div class="container px-5">
        <div class="row hero d-flex align-items-center">
          <div class="col-lg-12 text-danger text-light py-3 text-center">
            <img src="assets/img/logo.png" alt="logo stmik" class="img mt-5 pt-4 mb-3" width="250">
            <div class="h3">Selamat Datang</div>
            <div class="h5 fst-italic">di Website Non Resmi</div>
            <div class="h2 fw-semibold">STMIK SYAIKH ZAINUDDIN NW ANJANI</div>
            <div class="my-2">Kunjungi Website Resmi:</div>
            <a href="https://stmiksznw.ac.id/" target="_blank" class="btn btn-light rounded-5 px-5 link fw-semibold ">stmiksznw.ac.id</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  -->
  <div class="container-fluid">
    <div class="container p-4">
      <div class="row">
        <div class="col-12 text-center h2 text-danger fw-semibold  ">Apa itu ?</div>
        <div class="col-12 text-center h2">STMIK Syaikh Zainuddin NW Anjani</div>
      </div>
      <div class="row py-5">
        <div class="col-lg-8 col-12">
          <h3 class="text-danger fw-semibold ">Profil</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo fugiat deserunt expedita nostrum aperiam. Excepturi deserunt fugit repudiandae! Sapiente, suscipit obcaecati quas explicabo ipsum esse?</p>
        </div>
        <div class="col-lg-4 col-12">
          <h3 class="text-danger fw-semibold ">Daftar Program Studi</h3>
          <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-graduation-cap fa-2x"></i>
            <div>S1 Teknik Informatika</div>
          </div>
          <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-graduation-cap fa-2x"></i>
            <div> S1 Sistem Informasi</div>
          </div>
        </div>
      </div>
      <?php
      $ambilDataMahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
      $ambilDataDosen = mysqli_query($conn, "SELECT * FROM tb_dosen");
      $jumlah_mahasiswa = mysqli_num_rows($ambilDataMahasiswa);
      $jumlah_dosen = mysqli_num_rows($ambilDataDosen);
      ?>
      <div class="row">
        <div class="col-lg-6 col-12 offset-lg-3 ">
          <div class="row">
            <div class="col-lg-6 col-12 text-center p-2">
              <i class="fa-solid fa-graduation-cap fa-3x mb-3"></i>
              <div>Jumlah Mahasiswa :</div>
              <div class="fw-semibold fs-5"><?php echo $jumlah_mahasiswa; ?></div>
              <a href="mahasiswa.php" class="btn btn-success">Lihat Data</a>

            </div>
            <div class="col-lg-6 col-12 text-center p-2">
              <i class="fa-solid fa-graduation-cap fa-3x mb-3"></i>
              <div>Jumlah Dosen :</div>
              <div class="fw-semibold fs-5"><?php echo $jumlah_dosen; ?></div>
              <a href="dosen.php" class="btn btn-success">Lihat Data</a>
            </div>
          </div>

          <div class="col-4">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  -->
  <?php
  include('src/footer.php');
  ?>




  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>