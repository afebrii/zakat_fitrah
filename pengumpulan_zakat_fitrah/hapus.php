<?php
require "functions.php";

$id = $_GET["id_zakat"];

if (hapus($id) > 0) {
  echo "
    <script>
    alert ('Pengumpulan Berhasil Dihapus');
    document.location.href = 'index.php';
    </script>
    ";
} else {
  echo "
    <script>
    alert ('Pengumpulan Gagal Dihapus');
    document.location.href = 'index.php';
    </script>
    ";
}
