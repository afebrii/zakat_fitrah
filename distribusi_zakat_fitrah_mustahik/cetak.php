<?php
require "functions.php";
$mustahik = query("SELECT * FROM kategori_mustahik");

$mustahik_lainnya = query("SELECT * FROM mustahik_lainnya")
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
            <a class="nav-link" href="../data_kategori_mustahik/">Data Kategori Mustahik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pengumpulan_zakat_fitrah">Pengumpulan Zakat Fitrah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <h1 class="mt-4">Laporan Data Distribusi Mustahik Lainnya</h1>


    <div class="table-responsive">
      <table class="table align-middle table-bordered table-hover">
        <thead>
          <tr>
            <th>
              <center>No.</center>
            </th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Hak</th>
          </tr>


          <?php $i = 1 ?>
          <?php $total_hak = 0 ?>
          <?php foreach ($mustahik_lainnya as $mustahik_lain) : ?>
            <?php $total_hak += $mustahik_lain["hak_mustahiklainnya"]; ?>
        </thead>
        <tbody>
          <tr>
            <td>
              <center><?= $i; ?></center>
            </td>
            <td><?= $mustahik_lain["nama_mustahiklainnya"]; ?></td>
            <td><?= $mustahik_lain["kategori_mustahiklainnya"]; ?></td>
            <td><?= $mustahik_lain["hak_mustahiklainnya"]; ?>KG</td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
        <tr style="text-align: center; font-weight: bold">
          <td colspan="3">Total</td>
          <td><?= $total_hak;  ?>KG</td>
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