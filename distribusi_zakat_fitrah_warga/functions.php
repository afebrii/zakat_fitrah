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
  $nama_mustahikwarga = htmlspecialchars($data["nama_mustahikwarga"]);
  $kategori_mustahikwarga = $data["kategori_mustahikwarga"];
  $hak_mustahikwarga = $data["hak_mustahikwarga"];

  $query = "INSERT INTO mustahik_warga VALUES
            ('', '$nama_mustahikwarga', '$kategori_mustahikwarga', '$hak_mustahikwarga')
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function edit($data)
{
  global $conn;
  $id = $data["id_mustahikwarga"];
  $nama_mustahikwarga = htmlspecialchars($data["nama_mustahikwarga"]);
  $kategori_mustahikwarga = $data["kategori_mustahikwarga"];
  $hak_mustahikwarga = $data["hak_mustahikwarga"];

  $query = "UPDATE mustahik_warga SET
            nama_mustahikwarga = '$nama_mustahikwarga',
            kategori_mustahikwarga = '$kategori_mustahikwarga',
            hak_mustahikwarga = '$hak_mustahikwarga'
            WHERE id_mustahikwarga = $id;
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mustahik_warga WHERE id_mustahikwarga = $id");
  return mysqli_affected_rows($conn);
}
