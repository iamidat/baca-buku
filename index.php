<?php
include "koneksi.php";
$db = new Database();

$sql = "SELECT * FROM buku";
$d = mysqli_query(mysqli_connect('localhost', 'root', '', 'db'), $sql);
$jml = mysqli_num_rows($d);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>BacaBuku!</title>

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
        <div class="jumbotron">
            <section class="py-1 text-center container">
                <div class="row py-lg-5" id="head">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <img class="animate__animated animate__tada" src="img/logo.svg" alt="" height="80">
                        <p class="lead text-muted">Baca buku apa saja secara <span style="font-weight: 600;">gratis</span> disini.</p>
                        <p>
                        <form class="d-flex" action="index.php" method="get">
                            <input class="form-control mx-2" name="cari" type="search" placeholder="cari buku disini..." aria-label="Search" id="boxcari">
                            <button class="btn btn-outline-secondary" type="submit" id="cari">Cari</button>
                        </form>
                        </p>
                        <small class="text-muted">
                            Jumlah buku saat ini : <?php echo $jml; ?>
                        </small>

                    </div>
                </div>
            </section>
        </div>

        <div class="album py-4 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $no = 1;
                    // // memotong sinopsis
                    // function cutText($text, $length, $mode = 2)
                    // {
                    //     if ($mode != 1) {
                    //         $char = $text{
                    //             $length - 1};
                    //         switch ($mode) {
                    //             case 2:
                    //                 while ($char != ' ') {
                    //                     $char = $text{
                    //                         --$length};
                    //                 }
                    //         }
                    //     }
                    //     return substr($text, 0, $length);
                    // }

                    // Pagination
                    $batas = 6;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $total_halaman = ceil($jml / $batas);

                    $nomor = $halaman_awal + 1;
                    
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        // echo "<h4 class='text-center' style='text-transform: uppercase; letter-spacing: 2.5px;'>Hasil pencarian : " . $cari . "</h4>";
                        echo "<b>Hasil pencarian : " . $cari . "</b>";
                    }
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $data_buku = mysqli_query(mysqli_connect('localhost', 'root', '', 'db'), "SELECT * FROM buku JOIN penulis USING (id_penulis) JOIN kategori USING (id_kategori) WHERE judul LIKE '%" . $cari . "%'");
                    } else {
                        $data_buku = mysqli_query(mysqli_connect('localhost', 'root', '', 'db'), "SELECT * FROM buku JOIN penulis USING (id_penulis) JOIN kategori USING (id_kategori) ORDER BY id_buku DESC LIMIT $halaman_awal, $batas ");
                        
                    }
                    //Menampilkan data
                    while ($data = mysqli_fetch_array($data_buku)) {
                        
                    ?>
                        <div class="col" id="home">
                            <div class="card border-0 shadow-sm">

                                <?php
                                if ($data['cover'] == true) {
                                    echo "<img class='thumbnail' height='225' src='file/cover/$data[cover]'>";
                                } else { ?>
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                    </svg>

                                <?php
                                }
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data['judul'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['penulis'] ?></h6>
                                    <hr>
                                    <p class="card-text">
                                        <?php
                                        $text = $data['sinopsis'];
                                        // echo cutText($text, 180) . '...';
                                        ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-auto">
                                        <div class="btn-group">
                                            <a href="view.php?id_buku=<?php echo $data['id_buku']; ?>" class="mr-1"><button type="button" class="btn btn-sm btn-outline-primary">Baca Buku</button></a>
                                        </div>
                                        <small class="text-muted"><?php echo $data['jumlah_hlm'] ?> halaman</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation ">
                    <ul class="pagination justify-content-center mt-5 pagination-circle">
                        <li class="page-item <?php if ($halaman <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($halaman <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?halaman=" . $previous;
                                                        } ?>">Sebelumnya</a>
                        </li>

                        <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                            <li class="page-item <?php if ($halaman == $i) {
                                                        echo 'active';
                                                    } ?>">
                                <a class="page-link" href="index.php?halaman=<?= $i; ?>"> <?= $i; ?> </a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?php if ($halaman >= $total_halaman) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($halaman >= $total_halaman) {
                                                            echo '#';
                                                        } else {
                                                            echo "?halaman=" . $next;
                                                        } ?>">Selanjutnya</a>
                        </li>
                    </ul>
                </nav>
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

</body>

</html>