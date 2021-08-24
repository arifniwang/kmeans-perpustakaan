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
			border : 0px solid #000;
			background : #cecece;
			color : #000;
			padding:0px;
		}
		table td{
			border : 1px solid #000;
		}
	</style>
</head>
<body>

<form action="" method="post">
  <fieldset>
    <legend>Isi Form Pinjaman Buku </legend>
    Masukkan Kode Member:<br>
    <input type="text" name="kode_member" value=""><br>
    Nama:<br>
    <input type="text" name="nama" value=""><br>
    Jenis Kelamin:<br>
    <select name="kelamin"> 
    	<option value="1">Perempuan</option>
    	<option value="2">Laki - Laki</option>
    </select><br>
    Usia:<br>
    <select name="usia"> 
    	<option value="1">7 - 15</option>
    	<option value="2">16 - 25</option>
    	<option value="3">26 - 30</option>
    	<option value="4">31 - 35</option>
    	<option value="6">>36</option>
    </select><br>
    Tanggal Sekarang:<br>
    <input type="text" name="tanggal_pinjam" value="<?= date('d-m-Y');?>"><br>
    Jumlah Buku:<br>
    <input type="text" id="jml" name="jumlah" placeholder="0" value=""><br>
    Tanggal Pengembalian:<br>
    <input type="text" name="tanggal_kembali" placeholder="<?= date('d-m-Y');?>" value=""><input type="hidden" class="kem" name="tanggal_maksimal" value=""><br> <!--1 buku peminjaman paling lama 1 minggu-->
    Buku Apa Saja:<br>
    <textarea id="kode_buku" name="kode_buku" placeholder="B-0011 B-0012 B-0013"></textarea><br><br> 

    	<div id="bukupinjaman"></div>
	
	<br> <br>
    <input type="submit" value="Proses Peminjaman Buku" name="proses"> 
  </fieldset>
</form>

</body>
</html>