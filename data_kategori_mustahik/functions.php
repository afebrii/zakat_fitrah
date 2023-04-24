<?php

$conn = mysqli_connect("localhost", "root", "", "zakatfitrah");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data)
{
  global $conn;
  $nama_kategori = htmlspecialchars($data["nama_kategori"]);
  $jumlah_hak = htmlspecialchars($data["jumlah_hak"]);

  $query = "INSERT INTO kategori_mustahik VALUES
            ('', '$nama_kategori', '$jumlah_hak')
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM kategori_mustahik WHERE id_kategori = $id");
  return mysqli_affected_rows($conn);
}

function edit($data)
{
  global $conn;
  $id = $data["id_kategori"];
  $nama_kategori = htmlspecialchars($data["nama_kategori"]);
  $jumlah_hak = htmlspecialchars($data["jumlah_hak"]);

  $query = "UPDATE kategori_mustahik SET
            nama_kategori = '$nama_kategori',
            jumlah_hak = '$jumlah_hak'
            WHERE id_kategori = $id;
          ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
