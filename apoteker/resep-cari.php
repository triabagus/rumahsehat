<?php 
session_start();
require_once('../Connections/koneksi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['resep'])) {
  $colname_Recordset1 = $_POST['resep'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("SELECT kd_obat, nm_obat, harga, no_resep , dosis FROM tb_obat WHERE no_resep LIKE %s", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apoteker | Rumah Sehat</title>
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/css.css" rel="stylesheet">
	<script src="../js/jquery.min.js"></script>
</head>

<body>
<?php include"header-add.php";?>
<p></p>
<p>
<?php
	$kd=$_POST['kd'];
?></p>
<div class="jumlah-all">
<br><br>
<p style="color:#ff6600;font-size:19px;margin:30px 0px 0px 20px;"">MASUKKAN KODE RESEP DOKTER</p>
<form id="form1" name="form1" method="post" action="resep-cari.php" style="margin:0px 20px;"">
  <label for="textfield"></label>
  <input type="text" name="resep" id="textfield" required/>
  <input type="hidden" name="kd" id="textfield1" value="<?php echo $kd ?>"/>
  <input type="submit" name="button" id="button" value="Cari Resep Dokter" />
</form>
	
<p>&nbsp;</p>
<table border="1">
  <tr>
    <th>No Resep</th>
    <th>Kode Obat</th>
    <th>Nama Obat</th>
    <th>Harga</th>
    <th>Dosis</th>
    <th>Subtotal</th>
  </tr>
  
  
  <?php 
  
  do { 
		$kd_obat=$row_Recordset1['kd_obat'];
		$harga=$row_Recordset1['harga'];
		$dosis=$row_Recordset1['dosis'];
		$yay = $row_Recordset1['no_resep'];
		$total=0;
		$total =$harga*$dosis;	 
		@$sum += $total;
  ?>
    <tr>	
      <td><?php echo $row_Recordset1['no_resep']; ?></td>
      <td><?php echo $row_Recordset1['kd_obat']; ?></td>
      <td><?php echo $row_Recordset1['nm_obat']; ?></td>
      <td><?php echo $row_Recordset1['harga']; ?></td>
      <td><?php echo $row_Recordset1['dosis']; ?></td>
      <td><?php echo $total;?></td>
      <input class="data-obat" type="hidden" value="<?php echo $total; ?>">
	
    </tr>
    
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
	
	 ?>
    <tr>
    	<td colspan="5" style="background:#ff6600;color:#fff;"><b>Grand Total</b></td>
        <td><?php echo ".$sum." ?></td>
  </tr>
</table>
<?php
	mysql_select_db($database_koneksi, $koneksi);
	$query_Recordset4 = "SELECT * FROM tb_daftar WHERE kd_pasien = '".$kd."' ";
	$Recordset4 = mysql_query($query_Recordset4, $koneksi) or die(mysql_error());
	$row_Recordset4 = mysql_fetch_assoc($Recordset4);
	
	$dokter = $row_Recordset4['kd_dokter'];
	mysql_select_db($database_koneksi, $koneksi);
	$query_Recordset5 = "SELECT * FROM tb_dokter WHERE kd_dokter = '".$dokter."' ";
	$Recordset5 = mysql_query($query_Recordset5, $koneksi) or die(mysql_error());
	$row_Recordset5 = mysql_fetch_assoc($Recordset5);
	
	$tarif_dokter=$row_Recordset5['tarif'];
	$biaya_daftar=$row_Recordset4['biaya'];
	$biaya_total=$sum + $tarif_dokter + $biaya_daftar
?>
<form id="form2" name="form2" method="post" action="bayar.php">
  <p>
    <label for="textfield2"></label>
    <input type="hidden" name="kode" id="textfield2" value="<?php echo $Recordset1['no_resep'];?>"/>
  </p>
  <p>
    <label for="textfield3"></label>
    <input type="hidden" name="tgl" id="textfield3" value="<?php $tgl_daftar= date('Y/m/d');echo $tgl_daftar?>"/>
  </p>
  <p>
    <label for="textfield4"></label>
    <input type="hidden" name="kd_dokter" id="textfield4" value="<?php echo $row_Recordset4['kd_dokter']; ?>"/>
  </p>
  <p>
    <label for="textfield5"></label>
    <input type="hidden" name="kd_pasien" id="textfield5" value="<?php echo $row_Recordset4['kd_pasien']; ?>"/>
  </p>
  <p>
    <label for="textfield5"></label>
    <input type="hidden" name="kd_plk" id="textfield5" value="<?php echo $row_Recordset4['kd_plk']; ?>"/>
  </p>
 <center>
  <p>
    <label for="textfield5"></label>
    <input type="hidden"  name="total_harga" id="total_harga" value="<?php echo $biaya_total?>"/>Biaya Anda : <b>Rp. <?php echo number_format($biaya_total);?></b> * Termasuk Biaya Dokter dan Pendaftaran
  </p>
  <p>
    <label for="textfield5"></label>
    Bayar : <input type="text" name="bayar" id="bayar" />
  </p>
  <p>
    <label for="textfield5"></label>
    Kembali : <input type="text" name="kembali" id="kembali" />
  </p>
  <p>
    <label for="textfield5"></label>
    <input type="submit" name="simpan" id="button2" value="Simpan" />
  </p>
</form>
</center>
<button style="background-color:#009688;float:right;margin:-165px 0px 0px 0px;" onclick="bayar()" class="bayar_resep"><i class="fa fa-usd"></i> Bayar</button>
</div>
<script>
		function bayar(){
		var total = $('#total_harga').val();
		var bayar = $('#bayar').val();
		var kembali = bayar-total;
		
		if (bayar < total) {
			alert("Bayar Sesuai Biaya Yang Telah Ditentukan");
			$('#kembali').val('');
		}else{
			$('#kembali').val(kembali);
			alert("Pembayaran telah di terima");
		}
		}
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
