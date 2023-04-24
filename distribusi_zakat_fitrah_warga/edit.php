<?php
require "functions.php";
$mustahik = query("SELECT * FROM kategori_mustahik");

$id = $_GET["id_mustahikwarga"];

$warga = query("SELECT * FROM mustahik_warga WHERE id_mustahikwarga = $id")[0];

if (isset($_POST["submit"])) {
  if (edit($_POST) > 0) {
    echo "
    <script>
    alert ('Edit Distribusi Zakat Berhasil Diedit');
    document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert ('Edit Distribusi Zakat Gagal Diedit');
    document.location.href = 'index.php';
    </script>
    ";
  }
}

if (isset($_POST["batal"])) {
  echo "
    <script>
    alert ('Edit Distribusi Zakat Gagal Ditambahkan');
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
            <a class="nav-link" href="index.php">Data Muzakki</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_kategori_mustahik">Data Kategori Mustahik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengumpulan_zakat_fitrah">Pengumpulan Zakat Fitrah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Distribusi Zakat Fitrah
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="distribusi_zakat_fitrah_mustahik">Mustahik</a></li>
              <li><a class="dropdown-item" href="distribusi_zakat_fitrah_warga">Warga</a></li>
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
    <h1 class="mt-4">Edit Distribusi Warga</h1>

    <form action="" method="post">
      <input type="hidden" name="id_mustahikwarga" value="<?= $warga["id_mustahikwarga"] ?>">
      <div class="mb-3 mt-4 row">
        <label for="nama_mustahikwarga" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_mustahikwarga" placeholder="Masukkan Nama" name="nama_mustahikwarga" value="<?= $warga["nama_mustahikwarga"] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="kategori_mustahikwarga" value="<?= $warga["kategori_mustahikwarga"] ?>">
            <option selected>Pilih Kategori Mustahik</option>
            <?php foreach ($mustahik as $mtk) : ?>
              <option value="<?= $mtk["nama_kategori"]; ?>"><?= $mtk["nama_kategori"]; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jumlah_tanggungan" class="col-sm-2 col-form-label">Jumlah Hak</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="hak_mustahikwarga" value="<?= $warga["hak_mustahikwarga"] ?>">
            <option selected>Masukkan Jumlah Hak</option>
            <option value="3">3</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row mt-4">
        <div class="col">
          <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Tambah</button>
          <button type="sunmit" name="batal" class="btn btn-danger"><i class="fa fa-reply"></i> Batal</button>
        </div>
      </div>
    </form>
  </div>




</body>

</html>