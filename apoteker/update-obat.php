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
  $updateSQL = sprintf("UPDATE tb_obat SET nm_obat=%s, jenis_obat=%s, kategori=%s, harga=%s, jumlah=%s, ket=%s, image=%s , no_resep=%s, dosis=%s WHERE kd_obat=%s",
                       GetSQLValueString($_POST['nm_obat'], "text"),
                       GetSQLValueString($_POST['jenis_obat'], "text"),
                       GetSQLValueString($_POST['kategori'], "text"),
                       GetSQLValueString($_POST['harga'], "int"),
                       GetSQLValueString($_POST['jumlah'], "int"),
                       GetSQLValueString($_POST['ket'], "text"),
                       GetSQLValueString($gmb, "text"),
					   GetSQLValueString($_POST['no_resep'], "text"),
					    GetSQLValueString($_POST['dosis'], "text"),
                       GetSQLValueString($_POST['kd_obat'], "int"));
			
			copy($br,"../apoteker/image-obat/".$gmb);
  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "obat.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_obat WHERE kd_obat = ".$_GET['kd_obat']."";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

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
<?php include"header.php"?>
<div class="content-admin" style="overflow-x:auto;">
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Kode Obat:</td>
      <td><?php echo $row_Recordset1['kd_obat']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama Obat:</td>
      <td><input type="text" name="nm_obat" value="<?php echo htmlentities($row_Recordset1['nm_obat'], ENT_COMPAT, ''); ?>" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jenis Obat:</td>
      <td><p>
        <label>
          <input <?php if (!(strcmp($row_Recordset1['jenis_obat'],"sirup"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_obat" value="sirup" id="RadioGroup1_0">
          Sirup</label>
       
        <label>
          <input <?php if (!(strcmp($row_Recordset1['jenis_obat'],"tablet"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_obat" value="tablet" id="RadioGroup1_1">
          Tablet</label>
        <br>
      </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Kategori:</td>
      <td><select name="kategori" id="jumpMenu" >
        <option value="Dewasa" <?php if (!(strcmp("Dewasa", $row_Recordset1['kategori']))) {echo "selected=\"selected\"";} ?>>Dewasa</option>
        <option value="Remaja" <?php if (!(strcmp("Remaja", $row_Recordset1['kategori']))) {echo "selected=\"selected\"";} ?>>Remaja</option>
        <option value="Anak" <?php if (!(strcmp("Anak", $row_Recordset1['kategori']))) {echo "selected=\"selected\"";} ?>>Anak</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Harga:</td>
      <td><input type="text" name="harga" value="<?php echo htmlentities($row_Recordset1['harga'], ENT_COMPAT, ''); ?>" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jumlah:</td>
      <td><input type="text" name="jumlah" value="<?php echo htmlentities($row_Recordset1['jumlah'], ENT_COMPAT, ''); ?>" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ket:</td>
      <td><input type="text" name="ket" value="<?php echo htmlentities($row_Recordset1['ket'], ENT_COMPAT, ''); ?>" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Image:</td>
      <td><label for="fileField"></label>
      <input type="file" name="image" id="fileField" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">No Resep:</td>
      <td><input type="text" name="no_resep" value="<?php echo htmlentities($row_Recordset1['no_resep'], ENT_COMPAT, ''); ?>" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Dosis:</td>
      <td><input type="text" name="dosis" value="<?php echo htmlentities($row_Recordset1['dosis'], ENT_COMPAT, ''); ?>" size="32" required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Ubah">&nbsp; <a class="hapus" style="padding: 5px 17px;" href="obat.php">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="kd_obat" value="<?php echo $row_Recordset1['kd_obat']; ?>">
</form>
</div>
<p>&nbsp;</p>
</body>
</html>
