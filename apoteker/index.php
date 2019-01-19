<?php 
session_start();
require_once('../Connections/koneksi.php'); 
              
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apoteker | Rumah Sehat</title>
	<link rel="icon" type="image/png" href="..\img/logo.png">
	<link href="css/sidebar.css" rel="stylesheet"> 
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/css.css" rel="stylesheet">
	<link href="css/log-css.css" rel="stylesheet">
</head>
<body onload="myfun()">
<script>
	
</script>
<?php include"header.php";?>
<div style="width:100%;">
<div class="content-admin">
<div class="head-admin">
<center style="color:white;"><h3><i class="fa fa-desktop" style="font-size:25px;"></i> DASHBOARD</h3> <?php if (empty($_SESSION['MM_Username'])){ ?>
<p>Username :Data Belum Ada</p>
    <?php }else{ ?>
    	<div class="popup" onclick="myFunction()"><p style="color:#fff;">Selamat Datang <?php echo $_SESSION['MM_Username']; 
	}?></p><a onclick="return confirm('Apakah anda ingin Keluar');" href="<?php echo $logoutAction ?>"><span class="popuptext" id="myPopup">Keluar</span></a></div></center> 
	
</div>
	<?php 
	mysql_select_db($database_koneksi, $koneksi);
	$query_dokter = mysql_query("SELECT * FROM tb_dokter");
	$query_obat = mysql_query("SELECT * FROM tb_obat");
	$query_pasien = mysql_query("SELECT * FROM tb_pasien");
	$query_omzet = mysql_query("SELECT SUM(jmlbyr) FROM tb_pembayaran WHERE no_bayar");
	$query_artikel = mysql_query("SELECT * FROM tb_artikel");
	
	$jum_data1 = mysql_num_rows($query_dokter);
	$jum_data2 = mysql_num_rows($query_obat);
	$jum_data3 = mysql_num_rows($query_pasien);
	$jum_data4 = mysql_fetch_array($query_omzet);
	$jum_data5 = mysql_num_rows($query_artikel);
	
	?>
	</div>
	<div class="jumlah-all">
		<div class="jumlah1">
		<div style="width: 20%;float: left;height: 100%;padding: 20px 0px 26px 15px;">
			<i class="fa fa-user-md" style="font-size:50px"></i>
		</div>
	<div style="width:70%;float:left;">
			<h3 align="center">Jumlah Dokter</h3>
			<p align="center" style="font-weight:bold;font-size:20px;"><?php echo $jum_data1; ?></p>
		</div>
		</div>
		<div class="jumlah2">
		<div style="width: 20%;float: left;height: 100%;padding: 20px 0px 26px 15px;">
			<i class="fa fa-medkit" style="font-size:50px"></i>
		</div>
	<div style="width:70%;float:left;">
			<h3 align="center">Jumlah Obat</h3>
			<p align="center" style="font-weight:bold;font-size:20px;"><?php echo $jum_data2; ?></p>
		</div>
		</div>
		
		<div class="jumlah3">
		<div style="width: 20%;float: left;height: 100%;padding: 20px 0px 26px 15px;">
			<i class="fa fa-user" style="font-size:50px"></i>
		</div>
	<div style="width:70%;float:left;">
			<h3 align="center">Jumlah Pasien</h3>
			<p align="center" style="font-weight:bold;font-size:20px;"><?php echo $jum_data3; ?></p>
		</div>
		</div>
		
		<div class="jumlah4">
		<div style="width: 20%;float: left;height: 100%;padding: 20px 0px 26px 15px;">
			<i class="fa fa-usd" style="font-size:50px"></i>
		</div>
	<div style="width:70%;float:left;">
			<h3 align="center">Pendapatan</h3>
			<p align="center" style="font-weight:bold;font-size:20px;">Rp. <?php echo number_format($jum_data4['SUM(jmlbyr)']);?></p>
		</div>
		</div>
		
		<div class="jumlah5">
		<div style="width: 20%;float: left;height: 100%;padding: 20px 0px 26px 15px;">
		<i class="fa fa-file-text" style="font-size:50px"></i>
		</div>
	<div style="width:70%;float:left;">
			<h3 align="center">Artikel</h3>
			<p align="center" style="font-weight:bold;font-size:20px;"><?php echo $jum_data5; ?></p>
		</div>
		</div>
		</div>
		<section class="jumlah-all" >
            <header class="heading">
                <center style="color:#3B5998;"><h2>Pemberitahuan</h2></center>
            </header>
                <div class="panel-body" id="noti-box">
                    <?php
                         $tampil=mysql_query("select * from tb_pasien order by kd_pasien desc limit 1");
                            while($data2=mysql_fetch_array($tampil)){
                    ?>
                        <div class="jumlah-all alert alert-block alert-danger">
                        <strong><?php echo $data2['nm_pasien'];?></strong>, pasien baru di Rumah Sehat.
                         </div>
                    <?php } ?>
				</div>
				
				 <div class="panel-body" id="noti-box">
                    <?php
                         $tampil=mysql_query("select * from tb_dokter order by kd_dokter desc limit 1");
                            while($data2=mysql_fetch_array($tampil)){
                    ?>
                        <div class="jumlah-all alert alert-block alert-success">
                        <strong><?php echo $data2['nm_dokter'];?></strong>, dokter baru di Rumah Sehat.
                         </div>
                    <?php } ?>
				</div>
				
				<div class="panel-body" id="noti-box">
                    <?php
                         $tampil=mysql_query("select * from tb_apoteker order by kd_apoteker desc limit 1");
                            while($data2=mysql_fetch_array($tampil)){
                    ?>
                        <div class="jumlah-all alert alert-block alert-info">
                        <strong><?php echo $data2['username'];?></strong>, admin baru di Rumah Sehat.
                         </div>
                    <?php } ?>
				</div>
		</section>
</div>
</div>

<script>

function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
</body>
</html>

