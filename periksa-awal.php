<?php
session_start();
 require_once('Connections/koneksi.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $insertSQL = sprintf("INSERT INTO tb_daftar (no_daftar, tgldaftar, kd_pasien, biaya, ket) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['no_daftar'], "int"),
                       GetSQLValueString($_POST['tgldaftar'], "date"),
                       GetSQLValueString($_POST['kd_pasien'], "int"),
                       GetSQLValueString($_POST['biaya'], "int"),
                       GetSQLValueString($_POST['ket'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "tunggu-konfirmasi.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_pasien WHERE username = '". $_SESSION['MM_Username']."'";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rumah Sehat</title>
<link rel="icon" type="image/png" href="img/logo.png">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/css-periksa-awal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css">
</head>

<body>
<?php
	include"menu.php";
?>

<div class="awal txt-center">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">No Daftar </td>
      <td><input name="no_daftar" type="text" placeholder="Tidak Perlu Di isi" value="" size="32" readonly="readonly"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Tanggal Daftar </td>
      <td><input name="tgldaftar" type="text" value="<?php $tgl_daftar= date('Y/m/d');echo $tgl_daftar?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td><input type="hidden" name="kd_pasien" value="<?php echo $row_Recordset1['kd_pasien']; ?>" size="32" readonly="readonly"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Biaya Pendaftaran </td>
      <td><input type="hidden" name="biaya" value="10000" size="32" readonly="readonly" />Rp 10.000</td>
    </tr>
    <tr>
      <td nowrap="nowrap" align="left">Keluhanan </td>
      <td><label for="textarea"></label>
      <textarea name="ket" id="textarea" cols="32" rows="5" required></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Periksa" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>
<?php include"footer.php";?>
	<footer class="txt-container txt-center" style="background-color:black;color:white;">
			<p style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</p>
	</footer>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
