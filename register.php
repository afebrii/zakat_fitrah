<?php


require "functions.php";

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
    alert('user baru berhasil ditambahkan!');
    document.location.href = 'login.php';
          </script>";
  } else {
    mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Zakat Fitrah</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="login">
    <h1 class="text-center">Zakat Fitrah</h1>
    <form action="" method="post" class="need-validation">
      <div class="form-group was-validated">
        <label class="form-label" for="username">Username</label>
        <input class="form-control" type="text" id="username" name="username" placeholder="Masukkan Username" required>
      </div>
      <div class="form-group was-validated">
        <label class="form-label" for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan Password" required>
      </div>
      <div class="form-group was-validated">
        <label class="form-label" for="password2">Konfirmasi Password</label>
        <input class="form-control" type="password" id="password2" name="password2" placeholder="Masukkan Password" required>
      </div>
      <button class="btn btn-primary w-100" type="submit" name="register" id="submit">Daftar</button>
      <div class="col-lg text-center text-white pt-4 pb-2 copyright">
        <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
      </div>
    </form>
  </div>
</body>

</html>