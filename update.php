<?php
require "connect.php";
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$mahasiswa = mysqli_fetch_assoc($result);

if(isset($_POST["batal"])){
  header("Location: read.php");
}
elseif(isset($_POST["simpan"])){
  $id = $_POST['id'];
  $nim = htmlspecialchars($_POST['nim']);
  $nama = htmlspecialchars($_POST['nama']);
  $jurusan = htmlspecialchars($_POST['jurusan']);

  $update = mysqli_query($conn, "UPDATE mahasiswa SET `nim`='$nim', `nama`='$nama', `jurusan`='$jurusan' WHERE id = $id");
if($update){
  header("Location: read.php");
}
else {
  $error = mysqli_error($conn);
}
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">

  <title>Update Data</title>
</head>

<body>

  <!-- Heading -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="lead">Pelatihan CRUD PHP Native Bootcamp LUG 2019</p>
      <h1 class="display-4">Update Data Mahasiswa</h1>
    </div>
  </div>

  <div class="container">
    <!-- Form -->
    <form method="post">

    <!-- Hidden ID -->
    <input type="hidden" name="id" value="<?= $mahasiswa['id']?>">

      <!-- Input NIM -->
      <div class="form-group">
        <label>Nomor Induk Mahasiswa</label>
        <input type="text" class="form-control" name="nim" value="<?= $mahasiswa['nim'] ?>">
      </div>

      <!-- Input Nama -->
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" placeholder="contoh : Jhon Doe" name="nama" value="<?= $mahasiswa['nama']?>">
      </div>

      <!-- Select Jurusan -->
      <?php $jurusan = $mahasiswa['jurusan'] ?>
      <div class="form-group">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan">
          <option value="S1 Sistem Informasi" <?php echo ($jurusan == 'S1 Sistem Informasi' ? 'selected' : '') ?>>S1 Sistem Informasi</option>
          <option value="S1 Desain Komunikasi Visual" <?php echo ($jurusan == 'S1 Desain Komunikasi Visual' ? 'selected' : '') ?>>S1 Desain Komunikasi Visual</option>
          <option value="D3 Sistem Informasi" <?php echo ($jurusan == 'D3 Sistem Informasi' ? 'selected' : '') ?>>D3 Sistem Informasi</option>
          <option value="D4 Produksi Film dan TV" <?php echo ($jurusan == 'D4 Produksi Film dan TV' ? 'selected' : '') ?>>D4 Produksi Film dan TV</option>
          <option value="S1 Akuntansi Informasi" <?php echo ($jurusan == 'S1 Akuntansi' ? 'selected' : '') ?>>S1 Akuntansi</option>
        </select>
      </div>


      <!-- Upload Foto -->
      <div class="form-group">
        <label>Ubah Foto</label><br>
        <img src="./foto-mhs/17410100000.jpg" width="150px;" alt="" srcset=""> <br><br> 
        <input type="file" class="form-control-file">
      </div>

      <br><br>
      <!-- Button Batal -->
      <button type="submit" class="btn btn-danger" name="batal">Batal</button>
      <!-- Button Tambah -->
      <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>

    </form>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="./bootstrap/jquery.js"></script>
  <script src="./bootstrap/popper.js"></script>
  <script src="./bootstrap/bootstrap.js"></script>
</body>

</html>