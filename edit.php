<?php

require "functions.php";

$id = $_GET["id_muzakki"];

$mzk = query("SELECT * FROM muzakki WHERE id_muzakki = $id")[0];

if (isset($_POST["submit"])) {
  if (edit($_POST) > 0) {
    echo "
    <script>
    alert ('Data Berhasil Diedit');
    document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert ('Data Gagal Diedit');
    document.location.href = 'index.php';
    </script>
    ";
  }
}

if (isset($_POST["batal"])) {
  echo "
    <script>
    alert ('Data Gagal Diedit');
    document.location.href = 'index.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zakat Fitrah</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.php">Mesjid Al-Amin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Data Muzakki</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_kategori_mustahik">Data Kategori Mustahik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengumpulan_zakat_fitrah">Pengumpulan Zakat Fitrah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Distribusi Zakat Fitrah
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="distribusi_zakat_fitrah_mustahik">Mustahik</a></li>
              <li><a class="dropdown-item" href="distribusi_zakat_fitrah_warga">Warga</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">Logout</i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <h1 class="mt-4">Edit Data Muzakki</h1>

    <form action="" method="post">
      <input type="hidden" name="id_muzakki" value="<?= $mzk["id_muzakki"]; ?>">
      <div class="mb-3 mt-4 row">
        <label for="nama_muzakki" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_muzakki" placeholder="Masukkan Nama" name="nama_muzakki" value="<?= $mzk["nama_muzakki"]; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jumlah_tanggungan" class="col-sm-2 col-form-label">Jumlah Tanggungan</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="jumlah_tanggungan" value="<?= $mzk["jumlah_tanggungan"]; ?>">
            <option selected>Pilih Jumlah Tanggungan</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jumlah_tanggungan" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="keterangan" value="<?= $mzk["keterangan"]; ?>">
            <option selected>Pilih Keterangan</option>
            <option value="Wajib Zakat">Wajib Zakat</option>
            <option value="Tidak Wajib Zakat">Tidak Wajib Zakat</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row mt-4">
        <div class="col">
          <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
          <button type="sunmit" name="batal" class="btn btn-danger"><i class="fa fa-reply"></i> Batal</button>
        </div>
      </div>
    </form>
  </div>




</body>

</html>