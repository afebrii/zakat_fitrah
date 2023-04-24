<?php
require "functions.php";

$id = $_GET["id_mustahiklainnya"];

if (hapus($id) > 0) {
  echo "
    <script>
    alert ('Distribusi Zakat Berhasil Dihapus');
    document.location.href = 'index.php';
    </script>
    ";
} else {
  echo "
    <script>
    alert ('Distribusi Gagal Dihapus');
    document.location.href = 'index.php';
    </script>
    ";
}
