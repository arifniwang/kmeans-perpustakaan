<?php
session_start();
error_reporting(0);
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi
$menu = 'home';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Kmeans GA">
    <title>Clustering K-Means - Home</title>

    <?php include '../layout/template/css.php'; ?>
</head>
<body>

<?php include '../layout/template/navigasi.php'; ?>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-md-10 mx-auto">
                <h1 class="fw-light mb-5">Selamat datang Di aplikasi Clustering Algoritma K-Means</h1>
                <p class="lead text-muted">
                    K-means clustering merupakan salah satu metode data clustering non-hirarki
                    yang mengelompokan data dalam bentuk satu atau lebih cluster/kelompok. Data-data
                    yang memiliki karakteristik yang sama dikelompokan dalam satu cluster/kelompok
                    dan data yang memiliki karakteristik yang berbeda dikelompokan dengan
                    cluster/kelompok yang lain sehingga data yang berada dalam satu cluster/kelompok
                    memiliki tingkat variasi yang kecil (Agusta, 2007).
                </p>
            </div>
        </div>
    </section>
</main>

<?php include '../layout/template/footer.php'; ?>

<?php include '../layout/template/js.php'; ?>

<script>
    $(document).ready(function () {
    });
</script>
</body>
</html>