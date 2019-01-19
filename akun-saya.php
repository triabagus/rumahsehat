<?php
	session_start();
	require_once('Connections/koneksi.php');

	if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login-user.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rumah Sehat</title>
<link rel="icon" type="image/png" href="img/logo.png">
<link rel="stylesheet" href="style.css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/resep.css" rel="stylesheet">
</head>

<body>
<?php
	include"menu.php";
?>
<div style="height:50px;width:100%;">
</div>

<center><h3>Akun Saya</h3></center>

<a class="fa fa-power-off" style="float:right;color:#fff;" onclick="return confirm('Apakah anda ingin Keluar');" href="<?php echo $logoutAction ?>"></a>
<div class="akun" style="margin:0px 0px 0px 0px;text-align:left;background-color:#ff6600;color:#fff;padding:20px 40px;float:left;width:100%;">
<div class="data">
<?php if (empty($_SESSION['MM_Username'])){ ?>
<p>Username :Data Belum Ada</p>
    <?php }else{ ?>
		<h2><b>Data Pasien</b></h2>
    	<p>Username : <?php echo $_SESSION['MM_Username']; ?>

<?php  mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_pasien WHERE username = '". $_SESSION['MM_Username']."'";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
	<p>Nama Lengkap : <?php echo $row_Recordset1['nm_pasien'];?></p>
	<p>Jenis Kelamin : <?php echo $row_Recordset1['gender'];?></p>
	<p>Umur : <?php echo $row_Recordset1['umur'];?></p>
	<p>Alamat : <?php echo $row_Recordset1['alamat'];?></p>
	<p>No Telp : 0<?php echo $row_Recordset1['telp'];?></p>
</div>
<?php
mysql_select_db($database_koneksi, $koneksi);
$kd = $row_Recordset1['kd_pasien'];
$query_Recordset2 = "SELECT * FROM tb_daftar WHERE kd_pasien = '$kd'";
$Recordset2 = mysql_query($query_Recordset2, $koneksi) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

$kddokter = $row_Recordset2['kd_dokter'];

$query_Recordset3 = "SELECT * FROM tb_dokter WHERE kd_dokter = '$kddokter'";
$Recordset3 = mysql_query($query_Recordset3, $koneksi) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);

$kdplk = $row_Recordset2['kd_plk'];
$query_Recordset4 = "SELECT * FROM tb_poliklinik WHERE kd_plk = '$kdplk'";
$Recordset4 = mysql_query($query_Recordset4, $koneksi) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
?>
<div class="konfirm">
	<center><h3 style="color:#3B5998;">Konfirmasi</h3></center>
	<?php
		$query_Recordset21 = "SELECT tgldatang,kd_dokter,kd_plk FROM tb_daftar WHERE kd_pasien = '$kd'";
		$Recordset21 = mysql_query($query_Recordset21, $koneksi) or die(mysql_error());
		$row_Recordset21 = mysql_fetch_assoc($Recordset21);
		$totalRows_Recordset21 = mysql_num_rows($Recordset21);
		$juml=$totalRows_Recordset21;
		
		$query_Recordset22 = "SELECT kd_pasien,jmlbyr FROM tb_pembayaran WHERE kd_pasien = '$kd'";
		$Recordset22 = mysql_query($query_Recordset22, $koneksi) or die(mysql_error());
		$row_Recordset22 = mysql_fetch_assoc($Recordset22);
		$totalRows_Recordset22 = mysql_num_rows($Recordset22);
		$jumls=$totalRows_Recordset22;
		
	if($juml == 0 ){
		echo"<center><p>Anda Harus Periksa Terlebih Dahulu</p></center>";
			
	}
	
	if($juml == 1 ){
		echo"<center><p>Anda Periksa Menurut Data Di bawah Ini atau Tunggu Konfirmasi Dari Kami</p></center>";
		?>	
	<?php}else{
	?>
        <p>Tanggal Datang : <?php echo $row_Recordset2['tgldatang'];?></p>
		<p>Dokter : <?php echo $row_Recordset3['nm_dokter'];?></p>
        <p>Poli Klinik : <?php echo	$row_Recordset4['nm_plk'];?></p>
		
		 <center><a onclick="return confirm('Masukkan No Resep Sesuai Anjuran Dokter !');" style="color:#fff;text-decoration:none;background:#3B5998;padding:10px 20px;" href="masuk-resep.php?kd_pasien=<?php echo $row_Recordset1['kd_pasien'];?>">Masukkan Resep</a></center><br>
   <?php }
   
 
	
   } ?>
 
  </div> 
</div>   

 
<?php include"footer.php";?> 
<footer class="txt-container txt-center" style="background-color:black;color:white;">
			<p style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</p>
	</footer>
</body>
</html>
