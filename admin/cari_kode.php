<?php
	include '../config/koneksi.php';
	$data=$_POST['kodenya'];
	$qwe=mysql_fetch_array(mysql_query("select * from pinjaman where id_member='".$data."'"));
	echo $qwe['tanggal_sekarang'].'/'.$qwe['tanggal_pengembalian'].'/'.$qwe['total_bayar'];
			
