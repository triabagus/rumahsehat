<?php require_once('../Connections/koneksi.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apoteker | Rumah Sehat</title>
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/css.css" rel="stylesheet">
</head>

<body>
<?php include"header-add.php";?>
<p></p>

 <?php
	mysql_select_db($database_koneksi, $koneksi);
	$query_Recordset1 = "SELECT * FROM tb_pasien WHERE kd_pasien=".$_GET['kd_pasien']."";
	$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	
	$query_Recordset2 = "SELECT * FROM tb_daftar WHERE kd_pasien=".$_GET['kd_pasien']."";
	$Recordset2 = mysql_query($query_Recordset2, $koneksi) or die(mysql_error());
	$row_Recordset2 = mysql_fetch_assoc($Recordset2);
?>
<div class="jumlah-all">
<br><br>
<p style="color:#ff6600;font-size:19px;margin:30px 0px 0px 20px;">Masukkan No Resep dari Dokter</p>
<form id="form1" name="form1" method="post" action="resep-cari.php" style="margin:0px 20px;">
  <label for="textfield"></label>
  <input type="text" name="resep" id="textfield" value="<?php echo $row_Recordset2['no_resep'];?>" readonly="readonly" required/>
  <input type="hidden" name="kd" id="textfield1" value="<?php echo $row_Recordset1['kd_pasien']; ?>"/>
  <input class="resep" type="submit" name="button" id="button" value="Cari Resep Dokter" />
</form>
</div>
</body>
</html>