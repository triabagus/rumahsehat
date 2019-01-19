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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 7;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_pasien";
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apoteker | Rumah Sehat</title>
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link href="css/css.css" rel="stylesheet"> 
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include"header.php"?>
<div class="content-admin" style="overflow-x:auto;">
	<div style="float:left;margin:15px;">
   <a class="tambah" href="input-pasien.php"><i class="fa fa-plus-circle"></i> Tambah</a>
 </div>
<div style="float:right;margin:0px 19px;">
<form id="form1" name="form1" method="post" action="cari-pasien.php">
  <label for="textfield"></label>
  <input type="text" name="cari" id="textfield" />
  <input type="submit" name="button" id="button" value="Cari" />
</form>
</div>
<?php
function RandomString($length) {
    $original_string = array_merge(range(0,10), range('a','z'), range('A', 'Z'));
    $original_string = implode("", $original_string);
    return substr(str_shuffle($original_string), 0, $length);
}
?>
<table width="100%" border="1">
  <tr>
    <th>Kode Pasien</th>
    <th>Nama Pasien</th>
    <th>Alamat</th>
    <th>Gender</th>
    <th>Umur</th>
    <th>Telepon</th>
    <th>Username</th>
    <th>Password</th>
    <th colspan="4">Aksi</th>
  </tr>
  <?php do { ?>
    <tr>
      <td style="padding: 10px;"><?php echo $row_Recordset1['kd_pasien']; ?></td>
      <td style="padding: 10px;"><?php echo $row_Recordset1['nm_pasien']; ?></td>
      <td style="padding: 10px;"><?php echo $row_Recordset1['alamat']; ?></td>
      <td style="padding: 10px;"><?php echo $row_Recordset1['gender']; ?></td>
      <td style="padding: 10px;"><?php echo $row_Recordset1['umur']; ?></td>
      <td style="padding: 10px;">0<?php echo $row_Recordset1['telp']; ?></td>
      <td style="padding: 10px;"><?php echo $row_Recordset1['username']; ?></td>
      <td style="padding: 10px;"><?php echo RandomString(5); ?><?php echo $row_Recordset1['password']; ?><?php echo RandomString(5); ?></td>
      <td style="padding: 10px;"><a class="ubah" href="update-pasien.php?kd_pasien=<?php echo $row_Recordset1['kd_pasien']; ?>">Ubah</a></td>
      <td style="padding: 10px;"><a class="hapus" onclick="return confirm('Apakah anda ingin menghapus data ini');" href="delete-pasien.php?kd_pasien=<?php echo $row_Recordset1['kd_pasien']; ?>">Hapus</a></td>
       <td style="padding: 10px;"><a class="konfirm" href="konfirmasi.php?kd_pasien=<?php echo $row_Recordset1['kd_pasien']; ?>">Konfirmasi</a></td>
        <td style="padding: 10px;"><a  id="myDIV" class="selesai" href="beli-obat.php?kd_pasien=<?php echo $row_Recordset1['kd_pasien']; ?>">Beli</a>
		<a id="myDIVs" style="display:none;" class="selesai">SELESAI</a></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>
	<a class="pagination" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><i class="fa fa-arrow-circle-left"></i> Sebelum</a>
	<a class="pagination" href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
</p>
</div>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
