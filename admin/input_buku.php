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
    <title>BacaBuku! - Tambah Buku</title>

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
                <a class="navbar-brand" href="../index.php">
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
            <div class="container">
            <h4 class="text-center" style="text-transform: uppercase; letter-spacing: 2.5px;">Tambah Buku</h4>
                <form action="../proses.php?aksi=tambah" method="POST" enctype="multipart/form-data" class="mt-5">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" placeholder="Judul" class="form-control" id="judul" required>
                    </div>
                    <label for="penulis" class="form-label">Penulis</label>
                    <div class="input-group mb-3">
                        <select name="id_penulis" class="form-control" id="penulis">
                            <option>--Pilih Penulis--</option>
                            <?php
                            while ($data = mysqli_fetch_array($penulis)) {
                                echo "<option value='$data[id_penulis]'> $data[penulis] </option>";
                            }
                            ?>
                        </select>
                        <a href="input_penulis.php">
                            <button class="btn btn-outline-secondary mx-2" type="button">Tambah Penulis</button>
                        </a>
                        <a href="list_penulis.php">
                            <button class="btn btn-outline-secondary" type="button">Lihat Daftar</button>
                        </a>
                    </div>
                    <label for="kategori" class="form-label">Kategori</label>
                    <div class="input-group mb-3">
                        <select name="id_kategori" class="form-control" id="kategori">
                            <option>--Pilih Kategori--</option>
                            <?php
                            while ($data = mysqli_fetch_array($kategori)) {
                                echo "<option value='$data[id_kategori]'> $data[kategori] </option>";
                            }
                            ?>
                        </select>
                        <a href="input_kategori.php">
                            <button class="btn btn-outline-secondary mx-2" type="button">Tambah Kategori</button>
                        </a>
                        <a href="list_kategori.php">
                            <button class="btn btn-outline-secondary" type="button">Lihat Daftar</button>
                        </a>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_hlm" class="form-label">Jumlah Halaman</label>
                        <input type="text" name="jumlah_hlm" placeholder="Jumlah Halaman" class="form-control" id="jumlah_hlm" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Terbit</label>
                        <input type="year" name="tahun_terbit" placeholder="Tahun Terbit" class="form-control" id="tahun">
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <textarea name="sinopsis" placeholder="Sinopsis" class="form-control" id="sinopsis" rows="5" minlength="50" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_file" class="form-label">File PDF</label>
                        <div class="custom-file">
                            <input type="file" name="nama_file" value="Pilih File" class="custom-file-input" id="nama_file" required>
                            <label for="nama_file" class="custom-file-label">File PDF</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <div class="custom-file">
                            <input type="file" name="cover" value="Pilih File" class="custom-file-input" id="cover" required>
                            <label for="cover" class="custom-file-label">Cover</label>
                        </div>
                    </div>
                    <div class="my-4">
                        <button type="submit" class="btn btn-primary me-md-2">Upload Buku</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button class="btn btn-secondary" type="button" onclick="goBack()">Batal</button>
                    </div>
                </form>
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
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        // Memberi nama ketika memilih file di input box
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>