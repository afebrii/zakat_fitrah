<?php
require "functions.php";

$id = $_GET["id_kategori"];

if (hapus($id) > 0) {
  echo "
    <script>
    alert ('Kategori Berhasil Dihapus');
    document.location.href = 'index.php';
    </script>
    ";
} else {
  echo "
    <script>
    alert ('Kategori Gagal Dihapus');
    document.location.href = 'index.php';
    </script>
    ";
}
