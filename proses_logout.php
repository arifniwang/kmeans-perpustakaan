<?php
session_start(); // mengambil sesi yang ada
session_destroy(); // mengahpus semua sesi
header('Location:index.php');
die();
?>