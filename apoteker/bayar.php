<?php
require_once('../Connections/koneksi.php');

        
        $tgl = $_POST['tgl'];
		$kd_dokter= $_POST['kd_dokter'];
		$kd_pasien=$_POST['kd_pasien'];
		$kd_plk = $_POST['kd_plk'];
        $total_harga = $_POST['total_harga'];
		$bayar= $_POST['bayar'];
		$kembali=$_POST['kembali'];

			$sql="INSERT INTO tb_resep (no_resep,tglresep,kd_dokter,kd_pasien,kd_plk,totalharga,bayar,kembali) VALUES
            ('','$tgl','$kd_dokter','$kd_pasien','$kd_plk','$total_harga','$bayar','$kembali')";
			$res=mysql_query($sql) or die (mysql_error());
			
	mysql_select_db($database_koneksi, $koneksi);
	$query_Recordset1 = "SELECT * FROM tb_resep WHERE kd_pasien=".$kd_pasien."";
	$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	
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
	<script src="../js/jquery.min.js"></script>
</head>

<body>
<?php include"header-add.php";?>
<p></p>
<div class="jumlah-all" style="overflow-x:auto;">

<center><p style="color:#ff6600;font-size:19px;">Data Pembayaran Resep</p></center>
<table border="1" width="100%">
  <tr>
    <th>No Resep</th>
    <th>Tanggal Resep</th>
    <th>Kode Dokter</th>
    <th>Kode Pasien</th>
    <th>Kode Poli</th>
	<th>Total Harga</th>
	<th>Bayar</th>
	<th>Kembali</th>
  </tr>
    <tr>
      <td><?php echo $row_Recordset1['no_resep']; ?></td>
      <td><?php echo $row_Recordset1['tglresep']; ?></td>
      <td><?php echo $row_Recordset1['kd_dokter']; ?></td>
      <td><?php echo $row_Recordset1['kd_pasien']; ?></td>
      <td><?php echo $row_Recordset1['kd_plk']; ?></td>
      <td><?php echo $row_Recordset1['totalharga']; ?></td>
      <td><?php echo $row_Recordset1['bayar']; ?></td>
      <td><?php echo $row_Recordset1['kembali']; ?></td>
    </tr>
</table>
<center>
<form id="form2" name="form2" method="post" action="pembayaran-akhir.php">
   <p>
    <label for="textfield5"></label>
    <input type="hidden" name="kd_pasien" id="textfield5" value="<?php echo $row_Recordset1['kd_pasien']; ?>"/>
  </p>
  <p>
    <label for="textfield3"></label>
    <input type="hidden" name="tgl" id="textfield3" value="<?php $tgl_daftar= date('Y/m/d');echo $tgl_daftar?>"/>
  </p>
  <p>
    <label for="textfield5"></label>
    <input type="hidden" name="total_harga" id="total_harga" value="<?php echo $row_Recordset1['totalharga']; ?>"/>
  </p>
  <p>
    <label for="textfield5"></label>
    <input type="submit" style="width:30%;padding:15px 0px;" name="simpan" id="button2" value="Simpan" />
  </p>
</form>
</center>
</div>
</body>
</html>