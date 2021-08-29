<?php
session_start();
error_reporting(0);
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi
$menu = 'inputan_data';

$sql = "SELECT * FROM objek";
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
        .input-group-text {
            align-items: top !important;
        }
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
                        <h4 class="my-0 fw-normal text-center">Data Object</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Objek</th>
                                <th>Data</th>
                                <th width="150px" class="text-center">Aksi</th>
                            </tr>
                            <?php if (mysql_num_rows($data) > 0): ?>
                                <?php while ($row = mysql_fetch_assoc($data)): ?>
                                    <tr>
                                        <td><?php echo $row['nama_objek']; ?></td>
                                        <td><?php echo $row['data']; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-danger" href="inputan_data_hapus.php?id=<?php echo $row['id_objek'] ?>">Hapus Data</a>
                                        </td>
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