<!DOCTYPE html>
<html>
<title>Rumah Sehat</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/png" href="img/logo.png">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<body style="background-color:#fff;">

<?php
	include"menu.php";
?>
<div style="width:100%;margin:130px 0px;">

<center><img src="img/logo.png" width="100px" height="auto"><h2 style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</h2></center>
<center>
	Menjadi rumah sehat pilihan dengan menyediakan layanan perawatan kesehatan terbaik, aman, bermutu tinggi dan inovatif.<br>
	 <p>Menyediakan pelayanan secara utuh.</p><p>Konsisten dan terpadu berfokus pada pasien melalui praktek berbasis bukti yang sesuai dan pelayanan prima dengan komitmen.</p>
</center>

<div style="margin:50px 0px 0px 0px;">
<center>
	<a href="#" class="fa fa-facebook"></a>
	  <a href="#" class="fa fa-twitter"></a>
	  <a href="#" class="fa fa-android"></a>
      <a href="#" class="fa fa-instagram"></a>
	  <a href="#" class="fa fa-rss"></a>
</center>
</div>
</div>
<?php 
		 mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_poliklinik LIMIT 6 ";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	?>
<div style="width:100%;margin:100px 0px;">
<center><h2 style="color:#ff6600;">Poli Klinik</h2></center>
	<div class="row-padding">
     <?php do { ?><div class="txt-half txt-margin-bottom">
      <img src="apoteker/image-poli/<?php echo $row_Recordset1['image'];?>"  style="width:100%;height:223px;border:5px solid #ccc;border-radius:5px;">
      <div class="txt-container white">
        <center><h3 style="color:#3B5998;"><?php echo $row_Recordset1['nm_plk'];?></h3></center>
      </div>
    </div> <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  	</div>
</div>
<?php
	include"footer.php";
?>
	<footer class="txt-container txt-center" style="background-color:black;color:white;float:left;width:100%;">
			<p style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</p>
	</footer>
	</body>
</html>
