<?php
require "functions.php";
$muzakki = query("SELECT * FROM muzakki");

$id = $_GET["id_zakat"];

$bayar = query("SELECT * FROM bayarzakat WHERE id_zakat = $id")[0];

if (isset($_POST["submit"])) {
  if (edit($_POST) > 0) {
    echo "
    <script>
    alert ('Pengumpulan Berhasil Diedit');
    document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert ('Pengumpulan Gagal Diedit');
    document.location.href = 'index.php';
    </script>
    ";
  }
}

if (isset($_POST["batal"])) {
  echo "
    <script>
    alert ('Pengumpulan Gagal Diedit');
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
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
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
            <a class="nav-link" href="../index.php">Data Muzakki</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="data_kategori_mustahik">Data Kategori Mustahik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Pengumpulan Zakat Fitrah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Distribusi Zakat Fitrah
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../distribusi_zakat_fitrah_mustahik">Mustahik</a></li>
              <li><a class="dropdown-item" href="../distribusi_zakat_fitrah_warga/">Warga</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true">Logout</i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <h1 class="mt-4">Edit Pengumpulan Zakat Fitrah</h1>

    <form action="" method="post">
      <input type="hidden" name="id_zakat" value="<?= $bayar["id_zakat"] ?>">
      <div class="mb-3 mt-4 row">
        <label for="nama_KK" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_KK" placeholder="Masukkan nama_KK" name="nama_KK" value="<?= $bayar["nama_KK"] ?>">
        </div>
      </div>
      <div class="mb-3 mt-4 row">
        <label for="jumlah_tanggungan" class="col-sm-2 col-form-label">Jumlah Tanggungan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="jumlah_tanggungan" placeholder="Masukkan Jumlah Tanggungan" name="jumlah_tanggungan" value="<?= $bayar["jumlah_tanggungan"] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jenis_bayar" class="col-sm-2 col-form-label">Jenis Bayar</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="jenis_bayar" value="<?= $bayar["jenis_bayar"] ?>">
            <option selected>Pilih Jenis Bayar</option>
            <option value="Beras">Beras</option>
            <option value="Uang">Uang</option>
          </select>
        </div>
      </div>
      <div class="mb-3 mt-4 row">
        <label for="jumlah_tanggunganyangdibayar" class="col-sm-2 col-form-label">Jumlah Tanggungan Yang Dibayar</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="jumlah_tanggunganyangdibayar" placeholder="Masukkan Jumlah Tanggungan Yang Dibayar" name="jumlah_tanggunganyangdibayar" value="<?= $bayar["jumlah_tanggunganyangdibayar"] ?>">
        </div>
      </div>
      <div class="mb-3 mt-4 row">
        <label for="bayar_beras" class="col-sm-2 col-form-label">Bayar Beras</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="bayar_beras" placeholder="Masukkan bayar_beras" name="bayar_beras" value="<?= $bayar["bayar_beras"] ?>">
        </div>
      </div>
      <div class="mb-3 mt-4 row">
        <label for="bayar_uang" class="col-sm-2 col-form-label">Bayar Uang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="bayar_uang" placeholder="Masukkan bayar_uang" name="bayar_uang" value="<?= $bayar["bayar_uang"] ?>">
        </div>
      </div>



      <div class="mb-3 row mt-4">
        <div class="col">
          <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Edit</button>
          <button type="submit" name="batal" class="btn btn-danger"><i class="fa fa-reply"></i> Batal</button>
        </div>
      </div>
    </form>
  </div>




</body>

</html>