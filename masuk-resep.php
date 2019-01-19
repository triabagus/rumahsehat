<?php require_once('Connections/koneksi.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tb_daftar SET no_daftar=%s, no_resep=%s WHERE kd_pasien=%s",
                       GetSQLValueString($_POST['no_daftar'], "int"),
                       GetSQLValueString($_POST['no_resep'], "int"),
                       GetSQLValueString($_POST['kd_pasien'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "konfirmasi-resep.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_daftar WHERE kd_pasien=".$_GET['kd_pasien']."";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html>
<title>Rumah Sehat</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/resep.css" rel="stylesheet">
</head>

<body>
<?php
	include"menu.php";
?>

<div style="height:150px;width:100%;">
</div>
<div class="content-admin">

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">No Daftar:</td>
      <td><input name="no_daftar" type="text" value="<?php echo htmlentities($row_Recordset1['no_daftar'], ENT_COMPAT, ''); ?>" size="32" readonly="readonly"></td>
    </tr>
    
    <tr valign="baseline">
      <td nowrap align="right">Pasien:</td>
      <td><?php echo $row_Recordset1['kd_pasien']; ?></td>
    </tr>
	
    <tr valign="baseline">
      <td nowrap align="right">No resep:</td>
      <td><input name="no_resep" type="text" value="" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><center><input style="color:#fff;text-decoration:none;background:#3B5998;padding:10px 20px;border:0px;" type="submit" value="Konfirmasi"></center></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="kd_pasien" value="<?php echo $row_Recordset1['kd_pasien']; ?>">
</form>
<p>&nbsp;</p>
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