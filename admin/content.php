<?php
include "../config/session_manager.php";
if ($_GET[module]=='home'){
echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;'>Selamat datang Di aplikasi Clustering Algoritma K-Means</div>


<p>K-means clustering merupakan salah satu metode data clustering non-hirarki
yang mengelompokan data dalam bentuk satu atau lebih cluster/kelompok. Data-data
yang memiliki karakteristik yang sama dikelompokan dalam satu cluster/kelompok
dan data yang memiliki karakteristik yang berbeda dikelompokan dengan
cluster/kelompok yang lain sehingga data yang berada dalam satu cluster/kelompok
memiliki tingkat variasi yang kecil (Agusta, 2007).</p>";
}
elseif ($_GET[module]=='pinjaman'){
	include "pinjaman.php";
	function jumlah_kategori($data,$kategori){
		$arr=explode(" ",$data);
		$tap=0;
		$qwe=mysql_query("select * from buku");
		for($i=0;$i<count($arr);$i++){
			$dd=mysql_fetch_array($qwe);
			if($dd['id_buku']==$arr[$i]){
				if($kategori==$dd['kategori']){
					$tap+=1;
				}
			}
		}
		return $tap;
	}

	if(isset($_POST['proses'])){
		if($_POST['tanggal_maksimal']>=$_POST['tanggal_kembali']){
			$arr=explode(" ",$_POST['kode_buku']);
			$query=mysql_query("INSERT INTO `buku_dipinjam`(`id_member`, `jenis_kelamin`, `usia`, `kode_buku`, `jumlah_buku_dipinjam`, `jumlah_kategori_sosial`, `jumlah_kategori_agama`, `jumlah_kategori_cerita`) VALUES ('".$_POST['kode_member']."','".$_POST['kelamin']."','".$_POST['usia']."','".$_POST['kode_buku']."','".count($arr)."','".jumlah_kategori($_POST['kode_buku'],'Sosial')."','".jumlah_kategori($_POST['kode_buku'],'Agama')."','".jumlah_kategori($_POST['kode_buku'],'Cerita')."')");


			$query2= mysql_query("INSERT INTO `pinjaman`(`id_member`, `nama`, `jenis_kelamin`, `usia`, `tanggal_sekarang`, `jumlah_buku_dipinjam`, `total_bayar`, `tanggal_pengembalian`, `buku_apa_saja`) VALUES ('".$_POST['kode_member']."','".$_POST['nama']."','".$_POST['kelamin']."','".$_POST['usia']."','".$_POST['tanggal_pinjam']."','".count($arr)."','".$_POST['total']."','".$_POST['tanggal_kembali']."','".$_POST['kode_buku']."')");

			$data=$_POST['kelamin'].','.$_POST['usia'].','.count($arr).','.jumlah_kategori($_POST['kode_buku'],'Sosial').','.jumlah_kategori($_POST['kode_buku'],'Agama').','.jumlah_kategori($_POST['kode_buku'],'Cerita');
			$query3= mysql_query("INSERT INTO objek (`id_objek`, `nama_objek`, `data`) VALUES ('','".$_POST['nama']."','$data')");
		}
		
		if($query){
			echo'<script>alert("input sukses !")</script>';
		}else{
			echo'<script>alert("input Gagal !")</script>';
		}
	}

}
elseif ($_GET[module]=='hasil'){
	include "hasil.php";
}
elseif ($_GET[module]=='hapusdata'){
	mysql_query("TRUNCATE objek");
	echo "<script>window.alert('Sukses Menghapus Semua Data Objek');
			window.location=('semua-data.html')</script>";
}

/*elseif ($_GET[module]=='masukan_dana'){
	$dn=array();
	$dp=array();
	$rr=mysql_query("select * from dana");
	while($re=mysql_fetch_array($rr)){
		$dn[]=$re['dana_saat_ini'];
	}
	$dana=array_sum($dn);

	$ry=mysql_query("select * from pinjaman");
	$rg=mysql_query("select * from pinjaman");
	
	while($ra=mysql_fetch_array($ry)){
		$dp[]=$ra['total_bayar'];
	}
	$dana_pinjaman=array_sum($dp);

	include "masukan_dana.php";
}
*/
elseif ($_GET[module]=='history'){
	include "history.php";
}

elseif ($_GET[module]=='semuadata'){
	function data_buku($dat){
		$ry=mysql_fetch_array(mysql_query("select * from pinjaman where nama='$dat' order by tanggal_sekarang desc"));
		$ar=explode(" ",$ry['buku_apa_saja']);
		
		$tampung=array();
		for($i=0;$i<count($ar);$i++){
			$rx=mysql_fetch_array(mysql_query("select * from buku where id_buku='".$ar[$i]."'"));

			$tampung[]='<tr>
				<td>'.$rx['id_buku'].'</td>
				<td>'.$rx['judul_buku'].'</td>
				<td>'.$rx['kategori'].'</td>
			</tr>';
		}
		return implode(" ",$tampung);
		
	}
	include "data.php";
}

elseif ($_GET[module]=='prosesexcel'){
	include "proses_excel.php";
}
?>