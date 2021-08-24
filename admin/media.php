<?php
  session_start();	
  error_reporting(0);
  include "../config/koneksi.php";
  include "../config/session_manager.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Clustering K-Means</title>
<link href="../layout/style.css" rel="stylesheet" type="text/css" />
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_gugun.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="../layout/js/moment.js"></script>
<script>
$(document).ready(function(){
    $("#jml").change(function(){
        // Getting the current value of textarea
        var currentText = $(this).val();
        
        // Setting the Div content
        $(".total").val(currentText*5000);
        var kode = $("#kode_buku").val();
        kembali();
    });
});

$(document).ready(function(){
    $("#kode_buku").change(function(){
        // Getting the current value of textarea
        var currentText = $(this).val();
        kode_buku(currentText);
    });
});

function kembali(){
	var future = new Date(); // get today date
	future.setDate(future.getDate() + 7); // add 7 days
	var finalDate = future.getDate() +'-'+ ((future.getMonth() + 1) < 10 ? '0' : '') + (future.getMonth() + 1) +'-'+ future.getFullYear();

	$(".kem").val(finalDate);
}

function kode_buku(a){
	
	var kode = a.split(' ');
	$.post("cari_buku.php",
    {
      kodenya: a
    },
    function(data,status){
      //alert("Data: " + data + "\nStatus: " + status);
      $('#bukupinjaman').html( data );
    });
}

$(document).ready(function(){
    $("#kode").change(function(){
        var kode = $(this).val();
        $.post("cari_kode.php",
        {
          kodenya: kode
        },
        function(data,status){
          var tgl = data.split('/');
          $('#tgl_p').val( tgl[1] );
          $('#tgl').val( tgl[0] );
          $('#biaya').val( tgl[2] );
          lama(tgl[0],tgl[1],tgl[2]);
          
        });
    });
  })

    function lama(awal,pengembalian,biaya){
        // Getting the current value of textarea
        var tanggal_awal = awal;
        var tanggal_pengembalian = pengembalian;
        var tanggal_sekarang = moment().format('DD-MM-YYYY');
       
        //rubah fortmat tanggal ke moment
        var tanggal_awal_moment = moment(tanggal_awal,'DD-MM-YYYY');
        var pengembalian= moment(tanggal_pengembalian,'DD-MM-YYYY');
        var tanggal_sekarang_moment = moment(tanggal_sekarang,'DD-MM-YYYY');

        var selisih_hari = pengembalian.diff(tanggal_awal_moment,'days');
        var selisih_denda = tanggal_sekarang_moment.diff(pengembalian,'days');
        
        $(".lama").val(selisih_hari);
        denda(selisih_denda,biaya);
    };

    function denda(a,b){
      var currentText = a;
        
        // Setting the Div content
        if(a<=0){
          currentText=0;
        }
        var total = parseInt(b)+parseInt(currentText*2000);
        $("#denda").val(currentText*2000);
        $("#total").val(total);
       
    }

</script>
</head>
<body>

<div id="container_wrapper">
	<div id="container">
  <div id="header">
      <div id="inner_header">
      </div>
  </div>
  
  	<div id="top"> 
		<span class="cpojer-links"> <center>
					<a href='home'>Home Page</a> 
					<a href='pinjaman.html'>Pinjaman</a>
					<a href='semua-data.html'>Inputan Data</a>
					<a href='hasil.html'>Hasil Rekomendasi</a>
					<a href='history.html'>History</a>
					<a href='../logout.php'>Logout</a> 					</center>
		</span>
	</div>
  
		<div id="left_column">
			<div class="text_area" align="justify">	
				<?php include "content.php"; ?>
					<br/>
			</div>
			<div style='clear:both;'></div>
		</div>
		<div id="footer">
		</div>

        
</div>
</div>
</body>
</html>