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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['cari'])) {
  $colname_Recordset1 = $_POST['cari'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("SELECT * FROM tb_dokter WHERE nm_dokter LIKE %s", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
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
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="css/css.css" rel="stylesheet"> 
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include"header.php"?>
<div class="content-admin" style="overflow-x:auto;">
<div style="float:left;margin:15px;">
<a class="tambah" href="input-dokter.php"><i class="fa fa-plus-circle" style="color:white;"></i> Tambah</a>
</div>
<div style="float:right;margin:0px 19px;">
<form id="form1" name="form1" method="post" action="cari.php">
  <label for="textfield"></label>
  <input type="text" name="cari" id="textfield" />
  <input type="submit" name="search" id="button" value="Cari" />
</form>
</div>
<table width="100%" border="1">
  <tr>
    <th>Kode Dokter</th>
    <th>Nama Dokter</th>
    <th>Spesialis</th>
    <th>Alamat</th>
    <th>Telepon</th>
    <th>Kode Poli</th>
    <th>Tarif</th>
    <th>Keterangan</th>
    <th>Gambar</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['kd_dokter']; ?></td>
      <td><?php echo $row_Recordset1['nm_dokter']; ?></td>
      <td><?php echo $row_Recordset1['spesialis']; ?></td>
      <td><?php echo $row_Recordset1['alamat']; ?></td>
      <td><?php echo $row_Recordset1['telp']; ?></td>
      <td><?php echo $row_Recordset1['kd_plk']; ?></td>
      <td><?php echo $row_Recordset1['tarif']; ?></td>
      <td><?php echo $row_Recordset1['ket']; ?></td>
      <td><img src="../apoteker/image/<?php echo $row_Recordset1['image']; ?>" width="50" height="50" /></td>
      <td><a class="ubah" href="update-dokter.php?kd_dokter=<?php echo $row_Recordset1['kd_dokter']; ?>">Ubah</a></td>
      <td><a class="hapus" href="delete-dokter.php?kd_dokter=<?php echo $row_Recordset1['kd_dokter']; ?>">Hapus</a></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
