<?php
  include '../config/koneksi.php';
?>
<html>
<head>
	<style>
		table{
			border : 1px solid #000;
			text-align : center;
			font-family:tahoma;
			font-size:12px;
		}
		table tr th{
			border : 1px solid #000;
			background : #cecece;
			color : #000;
			padding:3px;
		}
		table tr td{
			border : 1px solid #000;
		}
	</style>
</head>
<body>

<form action="" method="post">
  <fieldset>
    <legend>Halaman History</legend>
    Masukkan Tanggal Pencarian History :<br>
    <input type="text" name="tanggal_pengambilan" placeholder="21-11-2019"><br><br> <!-- tampilan form tanggal -->
    
    <input type="submit" name="proses" value="Lihat History">  <!-- Ambil data di table "peminjaman" yang di tampilkan seperti di bawah ini-->
  </fieldset>
</form>

<br>
<hr>
<?php 
  if(isset($_POST['proses'])){
      $query=mysql_query("select * from pinjaman where tanggal_sekarang='".$_POST['tanggal_pengambilan']."'");
      echo'
            <table style="width:100%">
              <caption>Data History</caption>
              <tr>
                <th>Kode Member</th>
                <th>Tanggal</th>
                <th>Jumlah Buku</th>
                <th>Buku Yang Dipinjam</th>
                <th>Lamanya Dipinjam</th>
              </tr>';
      while($row=mysql_fetch_array($query)){
        $booking    =new DateTime($row['tanggal_pengembalian']);
        $today        =new DateTime($row['tanggal_sekarang']);
        $diff         =$today->diff($booking);
        
          echo'
              <tr>
                <td>'.$row['id_member'].'</td>
                <td>'.$row['tanggal_sekarang'].'</td>
                <td>'.$row['jumlah_buku_dipinjam'].'</td>
                <td>'.$row['buku_apa_saja'].'</td> <!-- Atau ditamppilkan kode buku juga tidak masalah-->
                <td>'.$diff->d.'</td>
              </tr>
          ';
      }
      echo'</table>';
  }
?>

</body>
</html>

