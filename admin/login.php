<?php
// fungsi untuk memulai session
session_start();

// variabel kosong untuk menyimpan pesan error
$form_error = '';

// cek apakah tombol submit sudah di klik atau belum
if (isset($_POST['submit'])) {

  // menyimpan data yang dikirim dari metode POST ke masing-masing variabel
  $user = $_POST['username'];
  $password = $_POST['password'];

  // validasi login benar atau salah
  if ($user == 'admin' and $password == 'admin') {

    // jika login benar maka email akan disimpan ke session kemudian akan di redirect ke halaman profil
    $_SESSION['user'] = $user;
    header('Location: index.php');
  } else {

    // jika login salah maka variabel form_error diisi value seperti dibawah
    // nilai variabel ini akan ditampilkan di halaman login jika salah
    $form_error = '<p>Password atau email yang kamu masukkan salah</p>';
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>BacaBuku! - Admin</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
  <link rel="icon" type="image/svg" href="../img/fav.svg">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../css/admin.css">

  <!-- Animasi -->
  <link rel="stylesheet" href="../css/animate.min.css">

</head>

<body class="text-center">
  <main class="form-signin">
    <form action="login.php" method="POST">
      <img class="mb-4 animate__animated animate__tada" src="../img/logo.svg" alt="" height="80"> <br />
      <small class="text-muted">
        <?php echo $form_error; ?>
      </small>
      <input name="username" type="text" id="inputEmail" class="form-control mb-2" placeholder="Username" required>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="w-100 btn btn-lg btn-primary mt-4 mb-2" type="submit" name="submit"> Sign in</button>
      <a href="../index.php">
        <button class="w-100 btn btn-lg btn-secondary" type="button">Batal</button>
      </a>
      <p class="my-3 text-muted">&copy; 2021</p>
    </form>
  </main>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery-3.5.1.min.js"></script>


</body>

</html>