<?php
require 'backend/function.php';
?>

<?php
include('src/head.php');
?>

<body style="background-color:#E1F7E8; font-family:Poppins;">
  <?php
  include('src/navbar.php');
  ?>
  <main class="p-lg-4 px-2 py-4 mt-5">
    <div class="container-lg mt-3 mb-2 px-lg-5">
      <h2 class="title fw-semibold" style="color:#0a660c;">Data Mahasiswa</h2>
    </div>
    <div class="container-lg px-lg-5 border-1 border-info">
      <p>Dibawah ini adalah tabel informasi untuk data mahasiswa.</p>
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary my-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#tambahData">
            <i class="fa-solid fa-file-circle-plus"></i> Tambah Data
          </button>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-hover table-striped align-middle text-center" style="font-size:14px">
            <thead class="table-dark align-middle">
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $batas = 5;
              $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
              $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

              $previous = $halaman - 1;
              $next = $halaman + 1;

              $ambil_data = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
              $jumlah_data = mysqli_num_rows($ambil_data);
              $total_halaman = ceil($jumlah_data / $batas);

              $data_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa ORDER BY nama_mahasiswa ASC LIMIT $halaman_awal, $batas");

              $nomor = $halaman_awal + 1;
              while ($data = mysqli_fetch_array($data_mahasiswa)) {
                $nim = $data['nim'];
                $nama_mahasiswa = $data['nama_mahasiswa'];
                $jenis_kelamin = $data['jenis_kelamin'];
                $tempat_lahir = $data['tempat_lahir'];
                $tanggal_lahir = $data['tanggal_lahir'];
                $alamat = $data['alamat'];
              ?>

                <tr>
                  <td><?= $nomor++ ?>.</td>
                  <td><?= $nim; ?></td>
                  <td><?= $nama_mahasiswa; ?></td>
                  <td><?= $jenis_kelamin; ?></td>
                  <td><?= $tempat_lahir; ?></td>
                  <td><?= $tanggal_lahir; ?></td>
                  <td><?= $alamat; ?></td>
                  <td>
                    <button class="btn btn-primary action my-1" style="font-size:10px" data-bs-toggle="modal" data-bs-target="#editData<?= $nim; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger action" style="font-size:10px" data-bs-toggle="modal" data-bs-target="#hapusData<?= $nim; ?>"><i class="fa-solid fa-trash-can"></i></button>
                  </td>
                </tr>

                <!-- Edit Data -->
                <div class="modal fade" id="editData<?= $nim; ?>">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content p-3">
                      <div class="modal-header py-2">
                        <h4 class="modal-title fw-bold">Edit Data Mahasiswa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="POST">
                          <input type="hidden" name="nim" value="<?= $nim; ?>">
                          <div class="row mb-3">
                            <label for="nama_mahasiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                              <input type="text" name="nama_mahasiswa" value="<?= $nama_mahasiswa; ?>" class="form-control bg-secondary-subtle" id="nama_mahasiswa">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                              <select class="form-select bg-secondary-subtle" name="jenis_kelamin">
                                <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                              <input type="text" name="tempat_lahir" value="<?= $tempat_lahir; ?>" class="form-control bg-secondary-subtle" id="tempat_lahir">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                              <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir; ?>" class="form-control bg-secondary-subtle" id="tanggal_lahir">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                              <textarea name="alamat" class="form-control bg-secondary-subtle" id="alamat" cols="" rows="3"><?php echo $alamat; ?></textarea>
                            </div>
                          </div>
                          <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="editDataMahasiswa" value="Edit Data">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Hapus Data -->
                <div class="modal fade" id="hapusData<?= $nim; ?>">
                  <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content p-3">
                      <div class="modal-header py-2">
                        <h4 class="modal-title fw-bold">Hapus Data Mahasiswa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post">
                          <h6>Apakah anda yakin ingin menghapus data <?= $nama_mahasiswa ?> ini ?</h6>
                          <input type="hidden" name="nim" value="<?= $nim; ?>">
                          <div class="d-flex justify-content-center my-3">
                            <button type="submit" class="btn btn-danger submit" name="hapusDataMahasiswa">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              <?php
              }
              ?>


            </tbody>
          </table>
          <nav>
            <ul class="pagination justify-content-end">
              <li class="page-item">
                <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='?halaman=$previous'";
                                      } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
              ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
              <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?halaman=$next'";
                                      } ?>>Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </main>
  <?php
  include('src/footer.php');
  ?>

  <!-- Modal -->
  <div class="modal fade" id="tambahData">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-3">
        <div class="modal-header py-2">
          <h4 class="modal-title fw-bold">Tambah Data Mahasiswa</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="row mb-3">
              <label for="nim" class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-9">
                <input type="text" name="nim" class="form-control bg-secondary-subtle" id="nim">
              </div>
            </div>
            <div class="row mb-3">
              <label for="nama_mahasiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
              <div class="col-sm-9">
                <input type="text" name="nama_mahasiswa" class="form-control bg-secondary-subtle" id="nama_mahasiswa">
              </div>
            </div>
            <div class="row mb-3">
              <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-select bg-secondary-subtle" name="jenis_kelamin">
                  <option value="">--Pilih Jenis kelamin--</option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
              <div class="col-sm-9">
                <input type="text" name="tempat_lahir" class="form-control bg-secondary-subtle" id="tempat_lahir">
              </div>
            </div>
            <div class="row mb-3">
              <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-9">
                <input type="date" name="tanggal_lahir" class="form-control bg-secondary-subtle" id="tanggal_lahir">
              </div>
            </div>
            <div class="row mb-3">
              <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="alamat" class="form-control bg-secondary-subtle" id="alamat" cols="" rows="3"></textarea>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <input type="submit" class="btn btn-primary" name="tambahDataMahasiswa" value="Tambah Data">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>