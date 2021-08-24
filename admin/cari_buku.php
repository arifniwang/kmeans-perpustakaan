<?php
	include '../config/koneksi.php';
	$data=$_POST['kodenya'];
	$arr=explode(" ",$data);
	
	echo '<table style="width:100%">
		  <caption><b>Buku yang Dipinjam</b><br><br></caption>
		  <tr>
		    <th>Kode Buku</th>
		    <th>Judul Buku</th>
		    <th>Kategori</th>
		  </tr>';

	for($i=0;$i<count($arr);$i++){
		$qwe=mysql_fetch_array(mysql_query("select * from buku where id_buku='".$arr[$i]."'"));
			echo'
				<tr>
				   <td>'.$qwe['id_buku'].'</td>
				   <td>'.$qwe['judul_buku'].'</td>
				   <td>'.$qwe['kategori'].'</td>
				</tr>
			';
	}
	
	echo '</table>';
