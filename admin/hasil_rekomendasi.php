<?php
session_start();
error_reporting(0);
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi
include "../config/helper.php";
$menu = 'hasil_rekomendasi';

$sql = "SELECT * FROM hasil";
$data = mysql_query($sql);

$total_1 = "SELECT COUNT(*) AS total FROM hasil WHERE cluster1 = 'Yes'";
$data_1 = mysql_fetch_assoc(mysql_query($total_1));

$total_2 = "SELECT COUNT(*) AS total FROM hasil WHERE cluster2 = 'Yes'";
$data_2 = mysql_fetch_assoc(mysql_query($total_2));

$total_3 = "SELECT COUNT(*) AS total FROM hasil WHERE cluster3 = 'Yes'";
$data_3 = mysql_fetch_assoc(mysql_query($total_3));

$total_data = $data_1['total'] + $data_2['total'] + $data_3['total'];
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
                        <h4 class="my-0 fw-normal text-center">Hasil Proses Clustering Algoritma K-Means Terhadap Data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Objek</th>
                                <th>Data 1</th>
                                <th>Data 2</th>
                                <th>Data 3</th>
                                <th>Data 4</th>
                                <th>Data 5</th>
                                <th>Data 6</th>
                                <th class="text-center">Cluster 1</th>
                                <th class="text-center">Cluster 2</th>
                                <th class="text-center">Cluster 3</th>
                            </tr>
                            <?php if (mysql_num_rows($data) > 0): ?>
                                <?php while ($row = mysql_fetch_assoc($data)): ?>
                                    <tr>
                                        <td><?php echo $row['object']; ?></td>
                                        <td><?php echo $row['data1']; ?></td>
                                        <td><?php echo $row['data2']; ?></td>
                                        <td><?php echo $row['data3']; ?></td>
                                        <td><?php echo $row['data4']; ?></td>
                                        <td><?php echo $row['data5']; ?></td>
                                        <td><?php echo $row['data6']; ?></td>
                                        <td class="text-center">
                                            <?php if ($row['cluster1'] == 'Yes'): ?>
                                                <span class="badge bg-success">OK</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">null</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['cluster2'] == 'Yes'): ?>
                                                <span class="badge bg-success">OK</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">null</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['cluster3'] == 'Yes'): ?>
                                                <span class="badge bg-success">OK</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">null</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto mt-5">
                <h3>Kluster 1</h3>
                <?php
                // query
                $sql_kelamin = "SELECT data1, COUNT(*) AS total FROM hasil WHERE cluster1 = 'Yes' GROUP BY data1 ORDER BY total DESC limit 1";
                $sql_usia = "SELECT data2, COUNT(*) AS total FROM hasil WHERE cluster1 = 'Yes' GROUP BY data2 ORDER BY total DESC limit 1";
                $sql_pinjaman = "SELECT SUM(data3) AS total FROM hasil WHERE cluster1 = 'Yes'";
                $sql_pengguna = "SELECT COUNT(*) AS total FROM hasil WHERE cluster1 = 'Yes'";

                // get data
                $data_kelamin = mysql_fetch_assoc(mysql_query($sql_kelamin));
                $data_usia = mysql_fetch_assoc(mysql_query($sql_usia));
                $data_pinjaman = mysql_fetch_assoc(mysql_query($sql_pinjaman));
                $data_pengguna = mysql_fetch_assoc(mysql_query($sql_pengguna));
                $persentase = number_format(($data_pengguna['total'] / $total_data) * 100, 2, '.', '.');
                ?>
                <ul>
                    <li>Rata-rata jenis kelamin : <b><?php echo kelamin($data_kelamin['data1']); ?></b></li>
                    <li>Rata-rata usia : <b><?php echo usia($data_usia['data2']); ?> </b></li>
                    <li>Rata-rata jumlah peminjaman : <b><?php echo $data_pinjaman['total']; ?> </b></li>
                    <li>Jumlah Pengguna : <b><?php echo $persentase; ?> %</b></li>
                    <li>Rekomendasi buku : <b>Sosial</b></li>
                </ul>
            </div>

            <div class="col-md-4 mx-auto mt-5">
                <h3>Kluster 2</h3>
                <?php
                // query
                $sql_kelamin = "SELECT data1, COUNT(*) AS total FROM hasil WHERE cluster2 = 'Yes' GROUP BY data1 ORDER BY total DESC limit 1";
                $sql_usia = "SELECT data2, COUNT(*) AS total FROM hasil WHERE cluster2 = 'Yes' GROUP BY data2 ORDER BY total DESC limit 1";
                $sql_pinjaman = "SELECT SUM(data3) AS total FROM hasil WHERE cluster2 = 'Yes'";
                $sql_pengguna = "SELECT COUNT(*) AS total FROM hasil WHERE cluster2 = 'Yes'";

                // get data
                $data_kelamin = mysql_fetch_assoc(mysql_query($sql_kelamin));
                $data_usia = mysql_fetch_assoc(mysql_query($sql_usia));
                $data_pinjaman = mysql_fetch_assoc(mysql_query($sql_pinjaman));
                $data_pengguna = mysql_fetch_assoc(mysql_query($sql_pengguna));
                $persentase = number_format(($data_pengguna['total'] / $total_data) * 100, 2, '.', '.');
                ?>
                <ul>
                    <li>Rata-rata jenis kelamin : <b><?php echo kelamin($data_kelamin['data1']); ?></b></li>
                    <li>Rata-rata usia : <b><?php echo usia($data_usia['data2']); ?></b></li>
                    <li>Rata-rata jumlah peminjaman : <b><?php echo $data_pinjaman['total']; ?></b></li>
                    <li>Jumlah Pengguna : <b><?php echo $persentase; ?> %</b></li>
                    <li>Rekomendasi buku : <b>Agama</b></li>
                </ul>
            </div>

            <div class="col-md-4 mx-auto mt-5">
                <h3>Kluster 3</h3>
                <?php
                // query
                $sql_kelamin = "SELECT data1, COUNT(*) AS total FROM hasil WHERE cluster3 = 'Yes' GROUP BY data1 ORDER BY total DESC limit 1";
                $sql_usia = "SELECT data2, COUNT(*) AS total FROM hasil WHERE cluster3 = 'Yes' GROUP BY data2 ORDER BY total DESC limit 1";
                $sql_pinjaman = "SELECT SUM(data3) AS total FROM hasil WHERE cluster3 = 'Yes'";
                $sql_pengguna = "SELECT COUNT(*) AS total FROM hasil WHERE cluster3 = 'Yes'";

                // get data
                $data_kelamin = mysql_fetch_assoc(mysql_query($sql_kelamin));
                $data_usia = mysql_fetch_assoc(mysql_query($sql_usia));
                $data_pinjaman = mysql_fetch_assoc(mysql_query($sql_pinjaman));
                $data_pengguna = mysql_fetch_assoc(mysql_query($sql_pengguna));
                $persentase = number_format(($data_pengguna['total'] / $total_data) * 100, 2, '.', '.');
                ?>
                <ul>
                    <li>Rata-rata jenis kelamin : <b><?php echo kelamin($data_kelamin['data1']); ?></b></li>
                    <li>Rata-rata usia : <b><?php echo usia($data_usia['data2']); ?> </b></li>
                    <li>Rata-rata jumlah peminjaman : <b><?php echo $data_pinjaman['total']; ?> </b></li>
                    <li>Jumlah Pengguna : <b><?php echo $persentase; ?> %</b></li>
                    <li>Rekomendasi buku : <b>Cerita</b></li>
                </ul>
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