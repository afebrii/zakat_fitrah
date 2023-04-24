<?php
require "functions.php";

$mustahik = query("SELECT * FROM kategori_mustahik")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kategori Mustahik</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="">Mesjid Al-Amin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="../">Data Muzakki</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Data Kategori Mustahik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pengumpulan_zakat_fitrah">Pengumpulan Zakat Fitrah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Distribusi Zakat Fitrah
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../distribusi_zakat_fitrah_mustahik">Mustahik</a></li>
              <li><a class="dropdown-item" href="../distribusi_zakat_fitrah_warga">Warga</a></li>
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
    <h1 class="mt-4">Data Kategori Mustahik</h1>


    <div class="table-responsive">
      <table class="table align-middle table-bordered table-hover">
        <thead>
          <tr>
            <th>
              <center>No.</center>
            </th>
            <th>Nama Kategori</th>
            <th>Jumlah Hak</th>
          </tr>


          <?php $i = 1 ?>
          <?php foreach ($mustahik as $mtk) : ?>
        </thead>
        <tbody>
          <tr>
            <td>
              <center><?= $i; ?></center>
            </td>
            <td><?= $mtk["nama_kategori"]; ?></td>
            <td><?= $mtk["jumlah_hak"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>


  <script>
    window.print();
  </script>
</body>

</html>