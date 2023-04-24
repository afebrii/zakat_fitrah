<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

require "functions.php";

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      header("Location: index.php");
      exit;
    }
  }

  $error = true;
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
      <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic;">username / password salah</p>
      <?php endif; ?>
      <button class="btn btn-primary w-100" type="submit" name="login" id="submit">Login</button>
      <div class="col-lg text-center text-white pt-4 pb-2">
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
      </div>
    </form>
  </div>
</body>

</html>