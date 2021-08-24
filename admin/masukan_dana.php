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
    <legend>Isi Form Pengembalian Buku </legend>
    Masukkan Kode Member:<br>
    <input type="text" id="kode" name="kode" placeholder="P-02" value=""><br>
    Tanggal Peminjaman:<br>
    <input type="text" id="tgl" name="tanggal_pinjaman" placeholder="17-11-2019" value=""><input type="hidden" id="tgl_p" name="tanggal_pengembalian" value=""><br>
    Lamanya Meminjam:<br>
    <input type="text" class="lama" name="lama" placeholder="4" value=""> Hari<br> 
    Biaya Pinjam:<br>
    <input type="text" id="biaya" name="biaya" placeholder="Rp.25.000" value=""><br>
    Tanggal Sekarang:<br>
    <input type="text" name="tanggal" value="<?= date('d-m-Y');?>"><br>
    Denda Pembayaran:<br>
    <input type="text" id="denda" name="denda" placeholder="Rp.0" value=""><br> <!-- denda pembayaran berlaku apabila pengembalian melebihi tanggal yang telah di tentukan saat peminjaman. 1 hari telat pengembalian denda = Rp.2000 ///berlaku kelipatan-->
    Total Pembayaran:<br>
    <input type="text" id="total" name="total" value=""><br><br> <!--Biaya Pinjam + Denda-->
    
    <input type="submit" name="pengembalian_buku" value="Proses Pengembalian"> <!-- Biaya "total pembayaran" Masuk kepada tabel "dana"->"Dana saat ini"-->
  </fieldset>
</form>
<?php
  if(isset($_POST['pengembalian_buku'])){
    $ambli=mysql_query("insert into dana (`dana_saat_ini`) VALUES ('".$_POST['total']."')");
    $hapus1=mysql_query("delete from buku_pinjaman where id_member='".$_POST['kode']."'");
    $hapus2=mysql_query("delete from pinjaman where id_member='".$_POST['kode']."'");
    if($ambil){
      echo'<meta http-equiv="refresh" content="0;url=" />';
    }
  }
?>
<br>
<hr>


  <fieldset>
    <legend>Form Rincian Dana Perpustakaan</legend>
    <p>Dana Saat Ini: <b>Rp.<?= $dana;?> </b> </p> <!-- Ambil tabel "dana"->"Dana saat ini"-->
    <p>Estimasi Dana Dari Peminjaman: <b>Rp.<?php echo $dana_pinjaman;?> </b></p> <!-- Jumlah seluruh dana peminjaman yang belum masuk di ambil dri tabel "peminjaman"->jumlah seluruh dana pada kolom "total bayar" -->
  </fieldset>



<br>
<hr>
Cari Member Yang meminjam:<br>
    <form action="" method="post">
    <input type="text" name="id" placeholder="Masukkan Kode Member">    
    <input type="submit" name="cari" value="Cari"> <!-- mencari member di table "peminjaman" berdasarkan kode or nama-->
    </form>
<table style="width:100%">
  <caption>Data Yang Belum Mengembalikan Peminjaman</caption>
  <tr>
    <th>Kode Member</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Pengembalian</th>
    <th>Estimasi Pembayaran</th>
  </tr>
  <?php 
    if(!isset($_POST['cari'])){
    while($row=mysql_fetch_array($rg)){

    ?>
    <tr>
      <td><?= $row['id_member'];?></td>
      <td><?= $row['tanggal_sekarang'];?></td>
      <td><?= $row['tanggal_pengembalian'];?></td>
      <td><?= $row['total_bayar'];?></td>
    </tr>
  <?php }}else{ $rg=mysql_query("select * from pinjaman where id_member='".$_POST['id']."'"); while($row=mysql_fetch_array($rg)){?>
    <tr>
      <td><?= $row['id_member'];?></td>
      <td><?= $row['tanggal_sekarang'];?></td>
      <td><?= $row['tanggal_pengembalian'];?></td>
      <td><?= $row['total_bayar'];?></td>
    </tr>
  <?php }};?>

</table>

</body>
</html>

