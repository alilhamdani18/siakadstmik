<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "db_siakad";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn) {
  echo "Koneksi Gagal" . mysqli_connect_error($conn);
}

// Tambah Data Mahasiswa
if (isset($_POST['tambahDataMahasiswa'])) {
  $nim = $_POST['nim'];
  $nama_mahasiswa = $_POST['nama_mahasiswa'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "INSERT INTO tb_mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) 
  VALUES ('$nim','$nama_mahasiswa','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat')");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Disimpan\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Disimpan\')
        </script>';
  }
}

// Edit Data Mahasiswa
if (isset($_POST['editDataMahasiswa'])) {
  $nim = $_POST['nim'];
  $nama_mahasiswa = $_POST['nama_mahasiswa'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "UPDATE tb_mahasiswa SET nim = '$nim', nama_mahasiswa = '$nama_mahasiswa', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat' WHERE nim = '$nim'");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Diedit\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Diedit\')
        </script>';
  }
}

// Hapus Data Mahasiswa
if (isset($_POST['hapusDataMahasiswa'])) {
  $nim = $_POST['nim'];

  $query = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE nim = '$nim'");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Dihapus\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Dihapus\')
        </script>';
  }
}


// Tambah Data Dosen
if (isset($_POST['tambahDataDosen'])) {
  $nidn = $_POST['nidn'];
  $nama_dosen = $_POST['nama_dosen'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "INSERT INTO tb_dosen (nidn, nama_dosen, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) 
  VALUES ('$nidn','$nama_dosen','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat')");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Disimpan\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Disimpan\')
        </script>';
  }
}

// Edit Data Dosen
if (isset($_POST['editDataDosen'])) {
  $nidn = $_POST['nidn'];
  $nama_dosen = $_POST['nama_dosen'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "UPDATE tb_dosen SET nidn = '$nidn', nama_dosen = '$nama_dosen', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat' WHERE nidn = '$nidn'");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Diedit\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Diedit\')
        </script>';
  }
}

// Hapus Data Dosen
if (isset($_POST['hapusDataDosen'])) {
  $nidn = $_POST['nidn'];

  $query = mysqli_query($conn, "DELETE FROM tb_dosen WHERE nidn = '$nidn'");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Dihapus\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Dihapus\')
        </script>';
  }
}
