<?php
session_start();
error_reporting(0);
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi
include "../config/helper.php";
$menu = 'history';

$sql = "SELECT * FROM pinjaman";
$data = mysql_query($sql);
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

    <style>
    </style>
</head>
<body>

<?php include '../layout/template/navigasi.php'; ?>

<main>
    <section class="container">
        <div class="row py-lg-5">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal text-center">Data History</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Kode Member</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Lama Pinjaman</th>
                                <th>Jumlah Buku</th>
                                <th>Buku Yang Dipinjam</th>
                            </tr>
                            <?php if (mysql_num_rows($data) > 0): ?>
                                <?php while ($row = mysql_fetch_assoc($data)): ?>
                                    <tr>
                                        <td><?php echo $row['id_member']; ?></td>
                                        <td><?php echo $row['tanggal_sekarang']; ?></td>
                                        <td><?php echo $row['tanggal_pengembalian']; ?></td>
                                        <td><?php echo totalHari($row['tanggal_sekarang'], $row['tanggal_pengembalian']); ?></td>
                                        <td><?php echo $row['jumlah_buku_dipinjam']; ?></td>
                                        <td><?php echo $row['buku_apa_saja']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../layout/template/footer.php'; ?>

<?php include '../layout/template/js.php'; ?>

<script>
    $(document).ready(function () {
        $("#kode_buku").change(function () {
            let value = $(this).val();
            cariBuku(value);
        });
    });

    function cariBuku(kode) {
        $.get("cari_buku.php", {
            kodebuku: kode
        }, function (data, status) {
            $('#bukupinjaman').html(data);
        });
    }
</script>
</body>
</html>