<?php
include "koneksi.php";

$id = $_GET['id_buku'];
$sql = "SELECT * FROM buku JOIN penulis USING (id_penulis) JOIN kategori USING (id_kategori) WHERE id_buku='$id'";
$db = mysqli_query(mysqli_connect('localhost', 'root', '', 'db'), $sql);
$data = mysqli_fetch_array($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>BacaBuku! - <?php echo $data['judul']; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link rel="icon" type="image/svg" href="img/fav.svg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Animasi -->
    <link rel="stylesheet" href="css/animate.min.css">

</head>

<body>
    <!-- navigation bar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #393E46;" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.svg" alt="" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../bacabuku/tentang.html">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- jumbotron -->
        <div class="jumbotron" id="view">
            <div class="jumbotron-background">
                <img src="file/cover/<?php echo $data['cover']; ?>" class="blur" width="100%">
            </div>
            <section class="py-5 text-center container">
                <div class="row py-lg-5" id="head">
                    <div class="col-lg-6 col-md-8 mx-auto text-white">
                        <h1 class="animate__animated animate__tada"><?php echo $data['judul']; ?></h1>
                        <h5>- <?php echo $data['penulis']; ?> -</h5>
                    </div>
                </div>
            </section>
        </div>

        <div class="album py-4 bg-light">
            <div class="container">
                <table class="table table-borderless">
                    <tr>
                        <td width="120"><b>Kategori</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $data['kategori']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tahun Terbit</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $data['tahun_terbit']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Sinopsis</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $data['sinopsis']; ?></td>
                    </tr>
                </table>

                <hr>
                <embed class="animate__animated animate__fadeInUp" src="file/buku/<?php echo $data['nama_file']; ?>" type="application/pdf" width="100%" height="1080px">

            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="text-muted py-5 shadow-sm">
        <div class="container">
            <p class="mb-1">Praktikum Pengembangan Berorientasi Objek</p>
            <p class="mb-0">Sekolah Tinggi Teknologi Garut &copy; 2021</p>
        </div>
    </footer>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

</body>

</html>