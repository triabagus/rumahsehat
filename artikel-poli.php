<!DOCTYPE html>
<?php
		require_once('Connections/koneksi.php');
?>

<html>
<title>Rumah Sehat</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/png" href="img/logo.png">
<link href="css/css-periksa-awal.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<body style="background-color:#fff;">
<?php
	include"menu.php";
?>
<div style="width:100%;height:140px;"></div>
<div class="side-nav">
<nav class="txt-sidenav white" style="width:100%;right:0;">
  <br>
  <div style="margin:20px 20px;">
  <form id="form1" name="form1" method="post" action="cari-artikel.php">
      <label for="textfield"></label>
      <input type="text" name="cariartikel" placeholder="Cari Artikel" id="textfield" />
      <input type="submit" style="margin-top:7px;" name="button" id="button" value="Cari" />
    </form>
  </div>
<?php include"menu-artikel.php";?>
 <br>
  <?php 
		 mysql_select_db($database_koneksi, $koneksi);
$query_Recordset12 = "SELECT * FROM tb_artikel ";
$Recordset12 = mysql_query($query_Recordset12, $koneksi) or die(mysql_error());
$row_Recordset12 = mysql_fetch_assoc($Recordset12);
$totalRows_Recordset12 = mysql_num_rows($Recordset12);?>
  <div style="height:790px;background:#fff;border-radius:10px;border:2px solid #ff6600;">
	<div><center style="background:#ff6600;color:white;padding:20px 0px;">Sekilas Artikel</center></div>
	<marquee direction="down" height="675" width="320px" scrollamount="10" scrolldelay="12" onMouseOut="this.start()" onMouseOver="this.stop()" >
	<p align="center">
		<?php do { ?>
		<a style="text-decoration:none;" href="detail-artikel.php?kd=<?php echo $row_Recordset12['kd'];?>" ><div class="a" style="height:500px;">
      <img src="apoteker/image-artikel/<?php echo $row_Recordset12['gambar'];?>" alt="Norway" style="width:100%;height:223px;border:5px solid #ccc;border-radius:5px;">
      <div class="txt-container white">
        <h3 style="color:#009688;"><?php echo $row_Recordset12['judul'];?></h3>
        <p class="w3-opacity"><?php echo $row_Recordset12['sub_title'];?></p>
         
      </div>
    </div> </a><?php } while ($row_Recordset12 = mysql_fetch_assoc($Recordset12)); ?>
	</p>
	</marquee>
  </div>
</nav>
</div>
<?php 
		 mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_poliklinik ORDER BY kd_plk ASC LIMIT 6 ";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	?>
    <div style="float:left;width:75%;">
	<div class="row-padding">
     <?php do { ?><div class="txt-dewe txt-margin-bottom" style="height:500px;">
      <img src="apoteker/image-poli/<?php echo $row_Recordset1['image'];?>" alt="Norway" style="width:100%;height:223px;border:5px solid #ccc;border-radius:5px;">
      <div class="txt-container white">
        <h3 style="color:#009688;"><?php echo $row_Recordset1['nm_plk'];?></h3>
        <a style="text-decoration:none;" href="detail-poli.php?kd_plk=<?php echo $row_Recordset1['kd_plk'];?>" class="btn-bs"> Baca Selanjutnya </a>
      </div>
    </div> <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  	</div>
  </div>
  <div style="width:100%;height:10px;">
  </div>
	<footer class="txt-container txt-center" style="background-color:black;color:white;float:left;width:100%;">
			<p style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</p>
	</footer>
	</body>
</html>
