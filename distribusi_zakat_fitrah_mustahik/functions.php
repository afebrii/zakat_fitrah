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
  $nama_mustahiklainnya = htmlspecialchars($data["nama_mustahiklainnya"]);
  $kategori_mustahiklainnya = $data["kategori_mustahiklainnya"];
  $hak_mustahiklainnya = $data["hak_mustahiklainnya"];

  $query = "INSERT INTO mustahik_lainnya VALUES
            ('', '$nama_mustahiklainnya', '$kategori_mustahiklainnya', '$hak_mustahiklainnya')
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function edit($data)
{
  global $conn;
  $id = $data["id_mustahiklainnya"];
  $nama_mustahiklainnya = htmlspecialchars($data["nama_mustahiklainnya"]);
  $kategori_mustahiklainnya = $data["kategori_mustahiklainnya"];
  $hak_mustahiklainnya = $data["hak_mustahiklainnya"];

  $query = "UPDATE mustahik_lainnya SET
            nama_mustahiklainnya = '$nama_mustahiklainnya',
            kategori_mustahiklainnya = '$kategori_mustahiklainnya',
            hak_mustahiklainnya = '$hak_mustahiklainnya'
            WHERE id_mustahiklainnya = $id;
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mustahik_lainnya WHERE id_mustahiklainnya = $id");
  return mysqli_affected_rows($conn);
}
