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
  $insertSQL = sprintf("INSERT INTO tb_obat (kd_obat, nm_obat, jenis_obat, kategori, harga, jumlah, ket, image ,no_resep,dosis) VALUES (%s, %s, %s, %s, %s, %s, %s, %s , %s, %s)",
                       GetSQLValueString($_POST['kd_obat'], "int"),
                       GetSQLValueString($_POST['nm_obat'], "text"),
                       GetSQLValueString($_POST['jenis_obat'], "text"),
                       GetSQLValueString($_POST['kategori'], "text"),
                       GetSQLValueString($_POST['harga'], "int"),
                       GetSQLValueString($_POST['jumlah'], "int"),
                       GetSQLValueString($_POST['ket'], "text"),
                       GetSQLValueString($gmb, "text"),
					   GetSQLValueString($_POST['no_resep'], "text"),
					   GetSQLValueString($_POST['dosis'], "text"));
					   
	copy($br,"../apoteker/image-obat/".$gmb);
  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "obat.php";
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

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
<?php include"header-add.php"?>
<div class="content-admin" style="overflow-x:auto;">
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kode Obat:</td>
      <td><input type="text" name="kd_obat" value="" size="32" placeholder="Tidak Perlu Di isi" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama Obat:</td>
      <td><input type="text" name="nm_obat" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jenis obat:</td>
      <td><p>
        <label>
          <input type="radio" name="jenis_obat" value="sirup" id="jenis_obat_0" required/>
          Sirup</label>
        
        <label>
          <input type="radio" name="jenis_obat" value="tablet" id="jenis_obat_1" required/>
          Tablet</label>
        <br />
      </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Kategori:</td>
      <td><select name="kategori" id="jumpMenu" >
        <option>Dewasa</option>
        <option>Remaja</option>
        <option>Anak</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Harga:</td>
      <td><input type="text" name="harga" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jumlah:</td>
      <td><input type="text" name="jumlah" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ket:</td>
      <td><label for="textarea"></label>
      <textarea name="ket" id="textarea" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Image:</td>
      <td><label for="fileField"></label>
      <input type="file" name="image" id="fileField" required/></td>
    </tr>
     <tr valign="baseline">
      <td nowrap="nowrap" align="right">No Resep:</td>
      <td><input type="text" name="no_resep" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dosis:</td>
      <td><input type="text" name="dosis" value="" size="32" required/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Tambah" />&nbsp; <a class="hapus" style="padding: 5px 17px;" href="obat.php">Batal</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form></div>
<p>&nbsp;</p>
</body>
</html>