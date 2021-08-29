<?php
error_reporting(0);
include "config/koneksi.php";

// ambil parameter
$user = $_POST[id_user];
$pass = md5($_POST[password]);

// query cek data di database
$query = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";

$login = mysql_query($query); // jalankan query
$cocok = mysql_num_rows($login); // cek total data

if ($cocok > 0) {
    $row = mysql_fetch_array($login); // ambil data

    // buat session login
    session_start();
    $_SESSION[namauser] = $row[username];
    $_SESSION[namalengkap] = $row[nama_lengkap];
    $_SESSION[passuser] = $row[password];
    $_SESSION[leveluser] = $row[level];

    header('location:admin'); // redirect ke directory admin
} else {
    echo "
        <script>
            window.alert('Username atau Password anda salah.'); // notifikasi bahwa login gagal
            window.location=('index.php'); // redirect ke halaman login lagi
        </script>
    ";
}
?>