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
  $nama_KK = htmlspecialchars($data["nama_KK"]);
  $jumlah_tanggungan = htmlspecialchars($data["jumlah_tanggungan"]);
  $jenis_bayar = $data["jenis_bayar"];
  $jumlah_tanggunganyangdibayar = htmlspecialchars($data["jumlah_tanggunganyangdibayar"]);
  $bayar_beras = htmlspecialchars($data["bayar_beras"]);
  $bayar_uang = htmlspecialchars($data["bayar_uang"]);

  $query = "INSERT INTO bayarzakat VALUES
            ('', '$nama_KK', '$jumlah_tanggungan', '$jenis_bayar', '$jumlah_tanggunganyangdibayar', '$bayar_beras', '$bayar_uang' )
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function edit($data)
{
  global $conn;
  $id = $data["id_zakat"];
  $nama_KK = htmlspecialchars($data["nama_KK"]);
  $jumlah_tanggungan = htmlspecialchars($data["jumlah_tanggungan"]);
  $jenis_bayar = $data["jenis_bayar"];
  $jumlah_tanggunganyangdibayar = htmlspecialchars($data["jumlah_tanggunganyangdibayar"]);
  $bayar_beras = htmlspecialchars($data["bayar_beras"]);
  $bayar_uang = htmlspecialchars($data["bayar_uang"]);

  $query = "UPDATE bayarzakat SET
            nama_KK = '$nama_KK',
            jumlah_tanggungan = '$jumlah_tanggungan',
            jenis_bayar = '$jenis_bayar',
            jumlah_tanggunganyangdibayar = '$jumlah_tanggunganyangdibayar',
            bayar_beras = '$bayar_beras',
            bayar_uang = '$bayar_uang'
            WHERE id_zakat = $id;
          ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM bayarzakat WHERE id_zakat = $id");
  return mysqli_affected_rows($conn);
}
