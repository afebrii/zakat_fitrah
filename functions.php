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
  $nama_muzakki = htmlspecialchars($data["nama_muzakki"]);
  $jumlah_tanggungan = $data["jumlah_tanggungan"];
  $keterangan = $data["keterangan"];

  $query = "INSERT INTO muzakki VALUES
            ('', '$nama_muzakki', '$jumlah_tanggungan', '$keterangan')
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}



function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM muzakki WHERE id_muzakki = $id");
  return mysqli_affected_rows($conn);
}




function edit($data)
{
  global $conn;
  $id = $data["id_muzakki"];
  $nama_muzakki = htmlspecialchars($data["nama_muzakki"]);
  $jumlah_tanggungan = $data["jumlah_tanggungan"];
  $keterangan = $data["keterangan"];

  $query = "UPDATE muzakki SET
            nama_muzakki = '$nama_muzakki',
            jumlah_tanggungan = '$jumlah_tanggungan',
            keterangan = '$keterangan'
            WHERE id_muzakki = $id;
          ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function registrasi($data)
{
  global $conn;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);


  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('username sudah terdaftar');
          </script>";
    return false;
  }


  // cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
    alert('konfirmasi password tidak sesuai');
          </script>";
    return false;
  }



  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

  return mysqli_affected_rows($conn);
}
