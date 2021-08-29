<?php
$server = "localhost";
$username = "root";
$password = "root";
$database = "ta_kmeans_perpustakaan";

mysql_connect($server, $username, $password) or die ("Gagal");
mysql_select_db($database) or die ("Database tidak ditemukan");
?>