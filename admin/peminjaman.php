<?php
session_start();
error_reporting(0);
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi
$menu = 'peminjaman';
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
                        <h4 class="my-0 fw-normal">Isi Form Buku Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="peminjaman_proses.php">
                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Kode Member</span>
                                <input type="text" class="form-control" name="kode_member" placeholder="Masukan Kode Member" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Nama</span>
                                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Jenis Kelamin</span>
                                <select name="kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="2">Laki - Laki</option>
                                    <option value="1">Perempuan</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Usia</span>
                                <select name="usia" class="form-control" required>
                                    <option value="">Pilih Usia</option>
                                    <option value="1">7 - 15</option>
                                    <option value="2">16 - 25</option>
                                    <option value="3">26 - 30</option>
                                    <option value="4">31 - 35</option>
                                    <option value="5">&gt;36</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Tanggal Peminjaman</span>
                                <input type="date" class="form-control" name="tanggal_pinjam" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Jumlah Buku</span>
                                <input type="number" class="form-control" name="jumlah" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Tanggal Pengembalian</span>
                                <input type="date" class="form-control" name="tanggal_kembali" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text col-lg-2">Buku Apa Saja</span>
                                <textarea id="kode_buku" type="text" class="form-control" name="kode_buku" placeholder="B-0011 B-0012 B-0013"
                                          rows="5"></textarea>
                            </div>

                            <div id="bukupinjaman"></div>

                            <button type="submit" name="proses" class="btn btn-primary mt-5">Proses Peminjaman Buku</button>
                        </form>
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