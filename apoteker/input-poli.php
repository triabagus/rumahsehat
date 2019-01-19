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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$gmb=$_FILES['image']['name'];
	$br=$_FILES['image']['tmp_name'];
  $insertSQL = sprintf("INSERT INTO tb_poliklinik (kd_plk, nm_plk, ket, image) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['kd_plk'], "int"),
                       GetSQLValueString($_POST['nm_plk'], "text"),
                       GetSQLValueString($_POST['ket'], "text"),
                       GetSQLValueString($gmb, "text"));
		copy($br,"../apoteker/image-poli/".$gmb);
  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "polikklinik.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
      <td nowrap="nowrap" align="right">Kode Poli:</td>
      <td><input type="text" name="kd_plk" value="" size="32" placeholder="Tidak Perlu Di isi" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama Poli:</td>
      <td><input type="text" name="nm_plk" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ket:</td>
      <td>
        <label for="textarea3"></label>
        <textarea name="ket" id="textarea3" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Image:</td>
      <td><label for="fileField"></label>
      <input type="file" name="image" id="fileField" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Tambah" />&nbsp; <a class="hapus" style="padding: 5px 17px;" href="polikklinik.php">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form></div>
<p>&nbsp;</p>
</body>
</html>