<?php
session_start();

// check apakah session email sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if (empty($_SESSION['user'])) {
    header('Location: login.php');
}

include '../koneksi.php';
$db = new database();
$con = mysqli_connect('localhost', 'root', '', 'db');
$penulis = mysqli_query($con, "SELECT * FROM penulis ORDER BY penulis ASC");
$kategori = mysqli_query($con, "SELECT * FROM kategori ORDER BY kategori ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>BacaBuku! - Tambah Kategori</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link rel="icon" type="image/svg" href="../img/fav.svg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Animasi -->
    <link rel="stylesheet" href="../css/animate.min.css">

</head>

<body>
    <!-- navigation bar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #393E46;" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/logo.svg" alt="" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../tentang.html">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/logout.php">
                            <button class="btn btn-primary" type="button" id="logout" style="height: auto; width:100px;">Keluar</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- jumbotron -->
        <div class="jumbotron">
            <section class="py-4 text-center container">
                <div class="row py-lg-5" id="head">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <img class="animate__animated animate__tada" src="../img/logo.svg" alt="" height="80">
                        <p class="lead text-muted">Baca buku apa saja secara <span style="font-weight: 600;">gratis</span> disini.</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="album py-5 bg-light">
            <div class="container-sm">
                <h4 class="text-center" style="text-transform: uppercase; letter-spacing: 2.5px;">Tambah Kategori</h4>
                <form action="../proses.php?aksi=tambah_kategori" method="POST" enctype="multipart/form-data" class="mt-5">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" placeholder="Kategori" class="form-control" id="kategori" required>
                    </div>
                    <div class="my-4">
                        <button type="submit" class="btn btn-primary me-md-2">Tambah Kategori</button>
                        <button class="btn btn-secondary" type="button" onclick="goBack()">Batal</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="text-muted py-5 shadow-sm fixed-bottom">
        <div class="container">
            <p class="mb-1">Praktikum Pengembangan Berorientasi Objek</p>
            <p class="mb-0">Sekolah Tinggi Teknologi Garut &copy; 2021</p>
        </div>
    </footer>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>