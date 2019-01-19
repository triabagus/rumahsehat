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
	$gmb=$_FILES['image']['name'];
	$br=$_files['image']['tmp_name'];
  $updateSQL = sprintf("UPDATE tb_dokter SET nm_dokter=%s, spesialis=%s, alamat=%s, telp=%s, kd_plk=%s, tarif=%s, ket=%s, image=%s WHERE kd_dokter=%s",
                       GetSQLValueString($_POST['nm_dokter'], "text"),
                       GetSQLValueString($_POST['spesialis'], "text"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['telp'], "int"),
                       GetSQLValueString($_POST['kd_plk'], "int"),
                       GetSQLValueString($_POST['tarif'], "int"),
                       GetSQLValueString($_POST['ket'], "text"),
                       GetSQLValueString($gmb, "text"),
                       GetSQLValueString($_POST['kd_dokter'], "int"));
				copy($br,"../apoteker/image/".$gmb);
  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "dokter.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_dokter WHERE kd_dokter = ".$_GET['kd_dokter']."";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset2 = "SELECT * FROM tb_poliklinik";
$Recordset2 = mysql_query($query_Recordset2, $koneksi) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apoteker | Rumah Sehat</title>
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link href="css/css.css" rel="stylesheet"> 
</head>

<body>
<?php include"header-add.php"?>
<div class="content-admin" style="overflow-x:auto;">
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kd_dokter:</td>
      <td><?php echo $row_Recordset1['kd_dokter']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nm_dokter:</td>
      <td><input type="text" name="nm_dokter" value="<?php echo htmlentities($row_Recordset1['nm_dokter'], ENT_COMPAT, 'utf-8'); ?>" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Spesialis:</td>
      <td><input type="text" name="spesialis" value="<?php echo htmlentities($row_Recordset1['spesialis'], ENT_COMPAT, 'utf-8'); ?>" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alamat:</td>
      <td><input type="text" name="alamat" value="<?php echo htmlentities($row_Recordset1['alamat'], ENT_COMPAT, 'utf-8'); ?>" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telp:</td>
      <td><input type="text" name="telp" value="<?php echo htmlentities($row_Recordset1['telp'], ENT_COMPAT, 'utf-8'); ?>" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kd_plk:</td>
      <td><label for="select"></label>
        <select name="kd_plk" id="select">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['kd_plk']?>"><?php echo $row_Recordset2['nm_plk']?></option>
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
      <td nowrap="nowrap" align="right">Tarif:</td>
      <td><input type="text" name="tarif" value="<?php echo htmlentities($row_Recordset1['tarif'], ENT_COMPAT, 'utf-8'); ?>" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ket:</td>
      <td><input type="text" name="ket" value="<?php echo htmlentities($row_Recordset1['ket'], ENT_COMPAT, 'utf-8'); ?>" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Image:</td>
      <td><label for="fileField"></label>
      <input type="file" name="image" id="fileField" required/>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Ubah" />&nbsp; <a class="hapus" style="padding: 5px 17px;" href="dokter.php">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="kd_dokter" value="<?php echo $row_Recordset1['kd_dokter']; ?>" />
</form></div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
