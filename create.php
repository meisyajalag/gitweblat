<?php
require "connect.php";
require "upload.php"; 

if(isset($_POST['batal'])){
    header("Location: read.php");
} elseif(isset($_POST['tambah'])){

    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    // upload gambar
    $foto = upload();

    if (!$foto) {
        return false;
    }

    
    $create = mysqli_query($conn, "INSERT INTO `mahasiswa`(`nim`,`nama`, `jurusan`, `foto`) VALUE ('$nim', '$nama', '$jurusan', '$foto')" );
  
    if($create){
        header("Location: read.php");
    }else{
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

    <title>Tambah Data</title>
</head>

<body>
    <!-- Heading -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="lead">Pelatihan CRUD PHP Native Bootcamp LUG 2019</p>
            <h1 class="display-4">Tambah Data Mahasiswa</h1>
        </div>
    </div>
    
    <div class="container">
        <!-- Form -->
        <form method="post" enctype="multipart/form-data">

            <!-- Input NIM -->
            <div class="form-group">
                <label>Nomor Induk Mahasiswa</label>
                <input type="number" class="form-control" required="required" placeholder="contoh : 1741010000" name="nim">
            </div>

            <!-- Input Nama -->
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" required="required" placeholder="contoh : Jhon Doe" name="nama">
            </div>

            <!-- Select Jurusan -->
            <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" name="jurusan">
                    <option>S1 Sistem Informasi</option>
                    <option>S1 Desain Komunikasi Visual</option>
                    <option>D3 Sistem Informasi</option>
                    <option>D4 Produksi Film dan TV</option>
                    <option>S1 Akuntansi</option>
                </select>
            </div>

            <!-- Input Foto -->
            

            <!-- Upload Foto -->
            <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" class="form-control-file"  name="uploadfoto">
            </div>


            <br><br>
            <!-- Button Batal -->
            <button type="submit" class="btn btn-danger" name="batal">Batal</button>
            <!-- Button Tambah -->
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="./bootstrap/jquery.js"></script>
    <script src="./bootstrap/popper.js"></script>
    <script src="./bootstrap/bootstrap.js"></script>
</body>

</html>