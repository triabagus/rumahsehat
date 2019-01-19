<?php require_once('../Connections/koneksi.php'); ?>
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
  $updateSQL = sprintf("UPDATE tb_daftar SET no_daftar=%s, tgldaftar=%s, tgldatang=%s, kd_dokter=%s, kd_plk=%s, biaya=%s, ket=%s WHERE kd_pasien=%s",
                       GetSQLValueString($_POST['no_daftar'], "int"),
                       GetSQLValueString($_POST['tgldaftar'], "date"),
                       GetSQLValueString($_POST['tgldatang'], "date"),
                       GetSQLValueString($_POST['kd_dokter'], "int"),
                       GetSQLValueString($_POST['kd_plk'], "int"),
                       GetSQLValueString($_POST['biaya'], "int"),
                       GetSQLValueString($_POST['ket'], "text"),
                       GetSQLValueString($_POST['kd_pasien'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "pasien.php";
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


$query_Recordset2 = "SELECT * FROM tb_dokter";
$Recordset2 = mysql_query($query_Recordset2, $koneksi) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);


$query_Recordset3 = "SELECT * FROM tb_poliklinik";
$Recordset3 = mysql_query($query_Recordset3, $koneksi) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);


?>
<html>
<title>Apoteker | Rumah Sehat</title>
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link href="css/css.css" rel="stylesheet"> 
</head>

<body>
<?php include"header.php"?>
<div class="content-admin">

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">No Daftar:</td>
      <td><input name="no_daftar" type="text" value="<?php echo htmlentities($row_Recordset1['no_daftar'], ENT_COMPAT, ''); ?>" size="32" readonly></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tangal Daftar:</td>
      <td><input name="tgldaftar" type="text" value="<?php echo htmlentities($row_Recordset1['tgldaftar'], ENT_COMPAT, ''); ?>" size="32" readonly></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal Datang:</td>
      <td><label for="textfield"></label>
      <input type="date" name="tgldatang" id="textfield"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Dokter:</td>
      <td><label for="select2"></label>
        <select name="kd_dokter" id="select2">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['kd_dokter']?>"><?php echo $row_Recordset2['nm_dokter'] ?> - Spesialis <?php echo $row_Recordset2['spesialis'] ?></option>
          <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pasien:</td>
      <td><?php echo $row_Recordset1['kd_pasien']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Poli Klinik:</td>
      <td><label for="select3"></label>
        <select name="kd_plk" id="select3">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset3['kd_plk']?>"><?php echo $row_Recordset3['nm_plk']?></option>
          <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Biaya:</td>
      <td><input type="text" readonly name="biaya" value="<?php echo htmlentities($row_Recordset1['biaya'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ket:</td>
      <td><label for="textarea"></label>
      <textarea name="ket" id="textarea" cols="45" rows="5"><?php echo htmlentities($row_Recordset1['ket'], ENT_COMPAT, ''); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Konfirmasi"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="kd_pasien" value="<?php echo $row_Recordset1['kd_pasien']; ?>">
</form>
<p>&nbsp;</p>
</div>
</body>
</html>
<?php 
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>