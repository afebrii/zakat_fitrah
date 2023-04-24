<?php
require "functions.php";
$muzakki = query("SELECT * FROM muzakki");
$bayarzakat = query("SELECT * FROM bayarzakat");




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
            <a class="nav-link" href="../data_kategori_mustahik">Data Kategori Mustahik</a>
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
              <li><a class="dropdown-item" href="../distribusi_zakat_fitrah_warga">Warga</a></li>
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
    <h1 class="mt-4">Laporan Pengumpulan Zakat Fitrah</h1>

    <div class="table-responsive">
      <table class="table align-middle table-bordered table-hover">
        <thead>
          <tr>
            <th>
              <center>No.</center>
            </th>
            <th>Nama</th>
            <th>Jumlah Tanggungan</th>
            <th>Jenis Bayar</th>
            <th>Jumlah Tanggungan Yang Dibayar </th>
            <th>Bayar Beras</th>
            <th>Bayar Uang</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1 ?>
          <?php $total_jiwa = 0 ?>
          <?php $total_beras = 0   ?>
          <?php $total_uang = 0 ?>
          <?php foreach ($bayarzakat as $bayar) : ?>
            <?php $total_jiwa += $bayar["jumlah_tanggunganyangdibayar"]; ?>
            <?php $total_beras += $bayar["bayar_beras"]; ?>
            <?php $total_uang += $bayar["bayar_uang"]; ?>
            <tr>
              <td>
                <center><?= $i; ?></center>
              </td>
              <td><?= $bayar["nama_KK"]; ?></td>
              <td><?= $bayar["jumlah_tanggungan"]; ?></td>
              <td><?= $bayar["jenis_bayar"]; ?></td>
              <td><?= $bayar["jumlah_tanggunganyangdibayar"]; ?></td>
              <td><?= $bayar["bayar_beras"]; ?>KG</td>
              <td>Rp.<?= number_format($bayar["bayar_uang"]); ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
          <tr style="text-align: center; font-weight: bold">
            <td colspan="4">Total</td>
            <td><?= $total_jiwa; ?> Jiwa</td>
            <td><?= $total_beras; ?>KG</td>
            <td>Rp.<?= number_format($total_uang);  ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <script>
    window.print();
  </script>
</body>

</html>