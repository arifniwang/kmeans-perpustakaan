<?php
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi
include "../config/helper.php";

if (isset($_POST['proses'])) {
    $kode_member = $_POST['kode_member'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $usia = $_POST['usia'];
    $kode_buku = $_POST['kode_buku'];
    $jumlah = $_POST['jumlah'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // calculate total
    $total_pinjam = totalHari($tanggal_pinjam, $tanggal_kembali);
    $arr_buku = explode(" ", $kode_buku);
    $total_buku = count($arr_buku);
    $pembayaran = $total_pinjam * 10000;

    // jumlah kategori
    $jumlah_kategori = jumlahKategori($kode_buku);
    $kategori_sosial = $jumlah_kategori['sosial'];
    $kategori_agama = $jumlah_kategori['agama'];
    $kategori_cerita = $jumlah_kategori['cerita'];
    $object_data = $kelamin . ',' . $usia . ',' . $total_buku . ',' . $kategori_sosial . ',' . $kategori_agama . ',' . $kategori_cerita;

    // get cluster
    $cluster_sosial = 'No';
    $cluster_agama = 'No';
    $cluster_cerita = 'No';
    $arr = ['Sosial' => $kategori_sosial, 'Agama' => $kategori_agama, 'Cerita' => $kategori_cerita];
    $max = 0;
    $cluster = '';
    $multiple = false;
    $multiple_list = [];
    foreach ($arr as $key => $value) {
        if ($max < $value) {
            $cluster = $key; // setup main cluster
            $max = $value; // change max

            // clear multiple list
            $multiple = false;
            $multiple_list = [];
            $multiple_list[] = $key;
        } else if ($max > 0 && $max == $value) {
            $multiple = true;
            $multiple_list[] = $key;
        }
    }

    if (!$multiple) {
        switch ($cluster) {
            case 'Sosial':
                $cluster_sosial = 'Yes';
                break;
            case 'Agama':
                $cluster_agama = 'Yes';
                break;
            case 'Cerita':
                $cluster_cerita = 'Yes';
                break;
        }
    } else {
        foreach ($multiple_list as $key => $cluster) {
            switch ($cluster) {
                case 'Sosial':
                    $cluster_sosial = 'Yes';
                    break;
                case 'Agama':
                    $cluster_agama = 'Yes';
                    break;
                case 'Cerita':
                    $cluster_cerita = 'Yes';
                    break;
            }
        }
    }

    // save buku dipinjam
    $sql = "INSERT INTO `buku_dipinjam` (`id_member`,`jenis_kelamin`,`usia`,`kode_buku`,`jumlah_buku_dipinjam`,`jumlah_kategori_sosial`,`jumlah_kategori_agama`,`jumlah_kategori_cerita`) 
    VALUES ('$kode_member','$kelamin','$usia','$kode_buku','$jumlah','$kategori_sosial','$kategori_agama','$kategori_cerita')";
    mysql_query($sql) or die(mysql_error());

    // save pinjaman
    $sql = "INSERT INTO `pinjaman`(`id_member`, `nama`, `jenis_kelamin`, `usia`, `tanggal_sekarang`, `jumlah_buku_dipinjam`, `total_bayar`, `tanggal_pengembalian`, `buku_apa_saja`) 
    VALUES ('$kode_member','$nama','$kelamin','$usia','$tanggal_pinjam','$jumlah','$pembayaran','$tanggal_kembali','$kode_buku')";
    mysql_query($sql) or die(mysql_error());

    // save object
    $sql = "INSERT INTO objek (`id_objek`, `nama_objek`, `data`) VALUES (null,'$nama','$object_data')";
    mysql_query($sql) or die(mysql_error());

    // save hasil k-means
    $sql = "INSERT INTO `hasil`(`object`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `cluster1`, `cluster2`, `cluster3`) 
    VALUES ('$kode_member','$kelamin','$usia','$total_buku','$kategori_sosial','$kategori_agama','$kategori_cerita','$cluster_sosial','$cluster_agama','$cluster_cerita')";
    mysql_query($sql) or die(mysql_error());

    echo "
        <script>
            window.alert('Data berhasil di input');
            window.location=('peminjaman.php');
        </script>
    ";
} else {
    echo "
        <script>
            window.alert('Input gagal!');
            window.location=('peminjaman.php');
        </script>
    ";
}

