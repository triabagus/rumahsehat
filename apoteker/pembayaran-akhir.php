<?php
require_once('../Connections/koneksi.php');

        $tgl = $_POST['tgl'];
		$kd_pasien=$_POST['kd_pasien'];
        $total_harga = $_POST['total_harga'];

			$sql="INSERT INTO tb_pembayaran (no_bayar,kd_pasien,tglbyr,jmlbyr) VALUES
            ('','$kd_pasien','$tgl','$total_harga')";
			$res=mysql_query($sql) or die (mysql_error());
			$del="DELETE FROM tb_daftar WHERE kd_pasien='$kd_pasien'";
			$res=mysql_query($del) or die (mysql_error());
			
			
	header('location:terimakasih.php');		
?>
