<?php
session_start();
error_reporting(0);
include "../config/koneksi.php"; // koneksi database
include "../config/session_manager.php"; // validasi sesi

// main variable
$id = $_GET['id'];

// delete data object
$sql = "DELETE FROM objek WHERE id_objek = $id";
mysql_query($sql) or die(mysql_error());

// delete data hasil
$sql = "DELETE FROM hasilgi WHERE objek_id = $id";
mysql_query($sql) or die(mysql_error());

echo "
        <script>
            window.alert('Data berhasil di hapus');
            window.location=('inputan_data.php');
        </script>
    ";